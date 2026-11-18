<?php
/* =====================================================================
   contact_handler.php - processing logic for the All-in-One contact form.

   index.php loads this file on its very first line, so the SAME page both
   shows the form and processes it (an "All-in-One" form). This file:
     1. reads the submitted values from the $_POST autoglobal
     2. validates them on the server
     3. stores the submission in the MySQL database
     4. emails a copy of the message back to the sender (PHPMailer + Gmail)
     5. redirects back to the page with a confirmation message
   ===================================================================== */

require __DIR__ . '/config.php';
require __DIR__ . '/PHPMailer/Exception.php';
require __DIR__ . '/PHPMailer/PHPMailer.php';
require __DIR__ . '/PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception as MailException;

/* ---------- Default values (keep the form "sticky" after an error) ---------- */
$name    = '';
$email   = '';
$subject = '';
$message = '';
$errors  = [];   // list of error messages to show above the form

/* ---------- Confirmation after the redirect (read from the $_GET autoglobal) ---------- */
$success = '';
$mailNote = '';
if (isset($_GET['sent'])) {
    $success = 'Thank you! Your message was received and saved.';
    if (isset($_GET['mail']) && $_GET['mail'] === '1') {
        $mailNote = 'A copy of your message was emailed to you. Check your spam folder if you don\'t see it.';
    } else {
        $mailNote = 'Your message was saved, but the copy could not be emailed to you.';
    }
}

/* =====================================================================
   PROCESSING: runs only when the form was submitted.
   $_SERVER['REQUEST_METHOD'] is an autoglobal telling us how the page
   was requested; "POST" means the Submit button was pressed.
   ===================================================================== */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    /* ---- Step 1: receive input from the $_POST autoglobal ---- */
    // trim() removes extra spaces; ?? '' avoids errors if a field is missing.
    $name    = trim($_POST['name'] ?? '');
    $email   = trim($_POST['email'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');

    /* ---- Step 2: validate (never trust the browser's "required" alone) ---- */
    if ($name === '') {
        $errors[] = 'Please enter your name.';
    } elseif (mb_strlen($name) > 100) {
        $errors[] = 'Name must be 100 characters or fewer.';
    }

    if ($email === '') {
        $errors[] = 'Please enter your email address.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Please enter a valid email address, like name@example.com.';
    }

    if ($subject === '') {
        $errors[] = 'Please enter a subject.';
    } elseif (mb_strlen($subject) > 150) {
        $errors[] = 'Subject must be 150 characters or fewer.';
    }

    if ($message === '') {
        $errors[] = 'Please enter a message.';
    } elseif (mb_strlen($message) > 2000) {
        $errors[] = 'Message must be 2000 characters or fewer.';
    }

    /* ---- Steps 3-5: only if every field is valid ---- */
    if (empty($errors)) {
        try {
            /* ---- Step 3: store the submission in MySQL ---- */
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // errors become exceptions
            $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            $conn->set_charset('utf8mb4');

            // Prepared statement: the ? placeholders keep user input separate
            // from the SQL, which prevents SQL injection.
            $stmt = $conn->prepare(
                'INSERT INTO contact_messages (name, email, subject, message) VALUES (?, ?, ?, ?)'
            );
            $stmt->bind_param('ssss', $name, $email, $subject, $message);
            $stmt->execute();
            $newId = $conn->insert_id;
            $stmt->close();

            /* ---- Step 4: email a copy back to the sender ---- */
            $mailSent = sendCopyToSender($name, $email, $subject, $message);

            // Record in the database whether the email went out
            if ($mailSent) {
                $conn->query('UPDATE contact_messages SET email_sent = 1 WHERE id = ' . (int) $newId);
            }
            $conn->close();

            // Testing mode: stop here so the Gmail log printed above stays on screen
            if (MAIL_DEBUG) {
                echo '<p><strong>Saved to database. Email sent: ' . ($mailSent ? 'YES' : 'NO') . '</strong></p>';
                exit;
            }

            /* ---- Step 5: redirect so refreshing doesn't submit twice ---- */
            header('Location: ' . $_SERVER['PHP_SELF'] . '?sent=1&mail=' . ($mailSent ? '1' : '0') . '#contact');
            exit;

        } catch (mysqli_sql_exception $e) {
            // Log the technical details privately; show the visitor a plain message.
            error_log('Contact form database error: ' . $e->getMessage());
            $errors[] = 'Sorry, your message could not be saved right now. Please try again later.';
        }
    }
}

/* =====================================================================
   Sends the sender a copy of their message through Gmail's SMTP server.
   Returns true if Gmail accepted the email, false otherwise.
   ===================================================================== */
function sendCopyToSender($name, $email, $subject, $message)
{
    // --- Build the email text once ---
    $mailSubject = 'Copy of your message: ' . $subject;
    $body  = "Hi $name,\n\n";
    $body .= 'Thank you for contacting ' . SITE_NAME . ". Here is a copy of your message:\n\n";
    $body .= "Name:    $name\n";
    $body .= "Email:   $email\n";
    $body .= "Subject: $subject\n";
    $body .= 'Sent:    ' . date('F j, Y, g:i a') . "\n\n";
    $body .= "Message:\n$message\n";

    // Look up Gmail's IPv4 address. Many shared servers have no IPv6,
    // so connecting by name can fail with "Network is unreachable".
    $gmailIp = gethostbyname('smtp.gmail.com');

    // Connection methods to try, in order: port 587 (STARTTLS), then 465 (SSL)
    $attempts = [
        [587, PHPMailer::ENCRYPTION_STARTTLS],
        [465, PHPMailer::ENCRYPTION_SMTPS],
    ];

    foreach ($attempts as [$port, $security]) {
        $mail = new PHPMailer(true);   // true = throw exceptions on errors
        try {
            // --- Connect to Gmail's mail server ---
            $mail->isSMTP();
            $mail->Host       = $gmailIp;
            $mail->SMTPAuth   = true;
            $mail->Username   = GMAIL_ADDRESS;
            $mail->Password   = GMAIL_APP_PASSWORD;
            $mail->SMTPSecure = $security;
            $mail->Port       = $port;
            $mail->CharSet    = 'UTF-8';
            $mail->Timeout    = 10;     // don't let the page hang if the server is blocked
            // We connect by IP, so tell the security check which name to expect
            $mail->SMTPOptions = ['ssl' => ['peer_name' => 'smtp.gmail.com']];
            if (MAIL_DEBUG) {
                $mail->SMTPDebug = 2;   // prints the server conversation (testing only)
                echo "<p><strong>Trying Gmail at $gmailIp, port $port...</strong></p>";
            }

            // --- Who it's from and to ---
            $mail->setFrom(GMAIL_ADDRESS, SITE_NAME);
            $mail->addAddress($email, $name);   // the sender gets their copy
            $mail->Subject = $mailSubject;
            $mail->Body    = $body;

            $mail->send();
            return true;                        // success, stop trying

        } catch (MailException $e) {
            error_log("Contact form email error (port $port): " . $mail->ErrorInfo);
        }
    }

    // --- Last resort: the hosting server's own mail system ---
    if (MAIL_DEBUG) {
        echo '<p><strong>Gmail unreachable. Trying the server\'s built-in mail()...</strong></p>';
    }
    $headers  = 'From: ' . SITE_NAME . ' <' . GMAIL_ADDRESS . ">\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $safeTo   = str_replace(["\r", "\n"], '', $email);   // block header injection
    return @mail($safeTo, $mailSubject, $body, $headers);
}
