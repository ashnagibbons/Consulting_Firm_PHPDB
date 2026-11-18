# Infinite IT Consulting: PHP Contact Platform

A PHP website for a fictional IT consulting company, with an All-in-One contact form that validates visitor input and saves every submission to a MySQL database.

**Live site:** http://ashnagibbons.atwebpages.com/index.php
**Contact form:** http://ashnagibbons.atwebpages.com/index.php#contact

**Author:** Ashna Gibbons

---

## Contents

1. [Features](#features)
2. [Project structure](#project-structure)
3. [Requirements](#requirements)
4. [Setup instructions](#setup-instructions)
5. [Using the platform](#using-the-platform)
6. [How the form works](#how-the-form-works)
7. [Data validation](#data-validation)
8. [Database connection](#database-connection)
9. [Security measures](#security-measures)
10. [Known limitations](#known-limitations)
11. [Credits](#credits)

---

## Features

- **All-in-One form.** One page (`index.php`) both displays the form and processes it. The form submits back to itself using `$_SERVER['PHP_SELF']`.
- **Server-side validation** of every field, with clear error messages shown above the form.
- **"Sticky" form.** If validation fails, the visitor's input stays in the fields so they only have to fix the mistake, not retype everything.
- **MySQL storage** of every valid submission, with a timestamp added automatically by the database.
- **Prepared statements** for every database write, which prevents SQL injection.
- **Settings kept out of the code.** Database and email credentials live in a separate `config.php` file that is never uploaded to GitHub.
- **No duplicate submissions on refresh.** After saving, the page redirects (the Post/Redirect/Get pattern), so pressing refresh can't submit the same message twice.
- **Confirmation copy to the sender.** The platform tries to email the visitor a copy of their message, trying three connection methods in turn, and records in the database whether it succeeded. (See [Known limitations](#known-limitations).)
- **Built-in testing mode.** Setting `MAIL_DEBUG` to `true` prints a step-by-step log of the email attempts, which makes hosting problems easy to diagnose.
- **Coursework dropdown** in the navigation bar, built with CSS only (no JavaScript library needed), linking to each assignment page.

---

## Project structure

```
infinite-it-platform/
├── index.php              Home page: site content + the contact form (the "view")
├── contact_handler.php    Form processing: validation, database insert, email (the "logic")
├── config.example.php     Template for private settings (copy to config.php)
├── create_table.sql       SQL that creates the contact_messages table
├── loop_assignment.php    Assignment 1: PHP loops
├── PHPMailer/             Email library (PHPMailer 7.2.0, LGPL license)
├── .gitignore             Keeps config.php (passwords) out of the repository
└── README.md              This file
```

The page design also uses the template's asset folders (`css/`, `js/`, `img/`, `fontawesome-5.5/`, `slick/`, `magnific-popup/`), which sit alongside these files.

---

## Requirements

- A web host with **PHP 8.0 or newer** (developed and tested on PHP 8.4) and the `mysqli` extension
- **MySQL 8.0** (or MariaDB) and access to phpMyAdmin or another SQL tool
- An FTP/SFTP client such as FileZilla, to upload the files
- *Optional, for the email copy:* a Gmail account with 2-Step Verification turned on

The live version is hosted on LaRomanaHost's free plan.

---

## Setup instructions

### 1. Create the database

In your hosting control panel, open the MySQL database manager and create a new database. Write down the four values it shows: the **database host**, **database name**, **username**, and **password**. On many shared hosts the database host is *not* `localhost`, so copy it exactly.

### 2. Create the table

Open phpMyAdmin, select your new database, go to the **SQL** tab, paste in the contents of `create_table.sql`, and click **Go**. This creates the `contact_messages` table:

| Column         | Type           | Purpose                                              |
|----------------|----------------|------------------------------------------------------|
| `id`           | INT, auto-increment, primary key | Unique number for each submission  |
| `name`         | VARCHAR(100)   | Sender's full name                                    |
| `email`        | VARCHAR(255)   | Sender's email address                                |
| `subject`      | VARCHAR(150)   | Subject line                                          |
| `message`      | TEXT           | Message body                                          |
| `email_sent`   | TINYINT(1)     | `1` if the confirmation copy was sent, otherwise `0`  |
| `submitted_at` | TIMESTAMP      | Filled in automatically with the date and time        |

The column lengths match the limits the PHP validation enforces, so valid input always fits.

### 3. Create your config file

Make a copy of `config.example.php` and name it `config.php`. Open `config.php` and fill in:

```php
define('DB_HOST', 'your_database_host');
define('DB_USER', 'your_database_user');
define('DB_PASS', 'your_database_password');
define('DB_NAME', 'your_database_name');
```

For the optional email copy, also fill in `GMAIL_ADDRESS` and `GMAIL_APP_PASSWORD`. The app password is a 16-character code created at [myaccount.google.com/apppasswords](https://myaccount.google.com/apppasswords), not your normal Gmail password.

### 4. Upload the files

Upload everything (including `config.php` and the `PHPMailer` folder) to your site's web folder on the host. Do not upload the repository folder itself; upload the files inside it, so the address ends in `/index.php`.

### 5. Test

Open `index.php`, scroll to **Contact Us**, and submit the form. You should see a green confirmation message, and a new row should appear in the `contact_messages` table in phpMyAdmin.

**Troubleshooting:**

- *"Your message could not be saved"*: one of the four `DB_` values in `config.php` is wrong. Check the database host first.
- *"Saved, but the copy could not be emailed"*: the database works but the email didn't send. Set `MAIL_DEBUG` to `true` in `config.php`, submit again, and read the log on screen. Set it back to `false` afterward.

---

## Using the platform

1. Go to the **Contact** section of the home page (or choose **Coursework → Assignment 2: Contact Form**).
2. Fill in **Name**, **Email**, **Subject**, and **Message**, then click **Submit**.
3. If something is missing or invalid, a red box lists what to fix, and your other answers are kept.
4. When the submission is valid, the page reloads with a green confirmation, and the submission is stored in the database.

To view submissions, open phpMyAdmin, select the database, and click the `contact_messages` table.

---

## How the form works

The platform is split into four parts, each with one job:

| Part                  | Role                                                                 |
|-----------------------|----------------------------------------------------------------------|
| `index.php`           | Shows the page and the form, plus any error or confirmation messages |
| `contact_handler.php` | Reads, validates, and saves the submission                           |
| `config.php`          | Stores the database and email credentials                            |
| MySQL database        | Permanently stores each submission as a row in `contact_messages`    |

### Step by step

1. **The visitor submits the form.** The form uses `method="POST"` and its `action` is the page itself:
   ```php
   <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>#contact">
   ```
   The browser sends the four fields to `index.php`, labelled by each input's `name` attribute (`name`, `email`, `subject`, `message`).

2. **The handler runs before any HTML.** The first line of `index.php` is:
   ```php
   <?php require "contact_handler.php"; ?>
   ```
   The handler checks `$_SERVER['REQUEST_METHOD']`. If it is `POST`, a form was submitted. On a normal visit it is `GET`, and the handler skips processing.

3. **The input is read from the `$_POST` autoglobal** and cleaned with `trim()`, then validated (see [Data validation](#data-validation)).

4. **If any field is invalid**, nothing is saved. The handler fills an `$errors` array, and `index.php` displays those errors and refills the form.

5. **If everything is valid**, the handler connects to MySQL and inserts the row (see [Database connection](#database-connection)).

6. **The handler tries to email the sender a copy** and records the result in the `email_sent` column.

7. **The page redirects** to `index.php?sent=1&mail=1#contact` (or `mail=0`). The second page load reads `$_GET['sent']` and shows the confirmation message. Because this load is a normal GET request, refreshing the page cannot resubmit the form.

---

## Data validation

Validation happens in two layers.

### Layer 1: In the browser (convenience)

The HTML inputs use `required`, `type="email"`, and `maxlength`, so the browser catches obvious mistakes before sending anything. This layer is easy to bypass (for example, by editing the page or sending a request directly), so the platform never relies on it.

### Layer 2: On the server (the real check)

`contact_handler.php` checks every field again on the server, whatever the browser did:

| Field     | Rules                                                                 | Error shown if it fails |
|-----------|-----------------------------------------------------------------------|-------------------------|
| Name      | Required; at most 100 characters                                      | "Please enter your name." / "Name must be 100 characters or fewer." |
| Email     | Required; must be a valid address, checked with `filter_var($email, FILTER_VALIDATE_EMAIL)` | "Please enter your email address." / "Please enter a valid email address, like name@example.com." |
| Subject   | Required; at most 150 characters                                      | "Please enter a subject." / "Subject must be 150 characters or fewer." |
| Message   | Required; at most 2000 characters                                     | "Please enter a message." / "Message must be 2000 characters or fewer." |

How it works:

- **Every value is trimmed** with `trim()`, so a field containing only spaces counts as empty.
- **Missing fields can't cause errors.** Each value is read as `$_POST['name'] ?? ''`, which falls back to an empty string if the field wasn't sent at all.
- **Lengths are counted with `mb_strlen()`**, which counts characters correctly even for accented letters and other non-English text.
- **All errors are collected before anything is saved.** The visitor sees every problem at once instead of one at a time, and the database is only touched when the `$errors` array is empty.
- **Displayed values are escaped.** When the form is refilled after an error, each value goes through `htmlspecialchars()`. If someone types HTML or JavaScript into a field, it is shown as plain text instead of running on the page (this prevents cross-site scripting, or XSS).

---

## Database connection

### Where the credentials come from

The database host, username, password, and database name are defined as constants in `config.php`:

```php
define('DB_HOST', '...');
define('DB_USER', '...');
define('DB_PASS', '...');
define('DB_NAME', '...');
```

`contact_handler.php` loads this file with `require`. Keeping credentials in one separate file means they appear nowhere else in the code, can be changed in one place, and can be excluded from GitHub (see `.gitignore`).

### Opening the connection

The connection only opens after validation passes, so invalid submissions never reach the database:

```php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$conn->set_charset('utf8mb4');
```

- `mysqli_report(...)` makes any database problem (wrong password, missing table, server down) throw an exception, so errors can be caught and handled in one place instead of failing silently.
- `new mysqli(...)` connects to the MySQL server using the four values from `config.php`.
- `set_charset('utf8mb4')` makes sure names and messages in any language, including emoji, are stored correctly.

### Saving the data with a prepared statement

```php
$stmt = $conn->prepare(
    'INSERT INTO contact_messages (name, email, subject, message) VALUES (?, ?, ?, ?)'
);
$stmt->bind_param('ssss', $name, $email, $subject, $message);
$stmt->execute();
```

The SQL is sent to MySQL with `?` placeholders first, and the visitor's values are attached separately by `bind_param` (`'ssss'` means all four are strings). MySQL treats those values purely as data, never as part of the SQL command. This is what prevents **SQL injection**: even if someone types SQL code into the message box, it is stored as ordinary text.

MySQL fills in `id` and `submitted_at` automatically. The handler then reads the new row's `id` with `$conn->insert_id`, uses it to set `email_sent = 1` if the confirmation email went out, and closes the connection.

### Handling connection errors

All database work is wrapped in a `try / catch (mysqli_sql_exception $e)` block. If anything fails:

- the technical details are written to the server's private error log with `error_log()`, where the site owner can read them;
- the visitor sees only a plain message, *"Sorry, your message could not be saved right now. Please try again later."*

This keeps internal details, such as the database host or table names, hidden from the public, while still telling the visitor something went wrong.

---

## Security measures

| Risk                         | Protection                                                        |
|------------------------------|-------------------------------------------------------------------|
| SQL injection                | Prepared statements with `bind_param`                              |
| Cross-site scripting (XSS)   | All user input shown on the page is escaped with `htmlspecialchars()` |
| Leaked passwords             | Credentials kept in `config.php`, which `.gitignore` keeps off GitHub |
| Invalid or oversized data    | Server-side validation; column sizes match the validation limits   |
| Exposed error details        | Errors go to the server log; visitors see a generic message        |
| Duplicate submissions        | Post/Redirect/Get redirect after each save                         |
| Email header injection       | Line breaks are stripped from the address before the fallback `mail()` call |
| `PHP_SELF` injection         | The form's `action` is escaped with `htmlspecialchars()`           |

---

## Known limitations

- **The confirmation email does not send on the LaRomanaHost free plan.** The host blocks outgoing mail connections: Gmail's SMTP server is refused on both port 587 and port 465, and the server's built-in `mail()` function does not deliver either. The code handles this gracefully. The submission is still saved, `email_sent` is recorded as `0`, and the visitor is told their message was saved but the copy could not be emailed. On a host that allows outgoing mail, the same code sends the copy without changes.
- **The site uses HTTP, not HTTPS**, because the free plan's subdomain has no SSL certificate. On a production site, form data should be sent over HTTPS.
- **There is no admin page.** Submissions are viewed in phpMyAdmin.

---

## Credits

- Page design based on the **Infinite Loop** template by [Tooplate](https://www.tooplate.com/view/2117-infinite-loop).
- Email sending uses [PHPMailer](https://github.com/PHPMailer/PHPMailer) (LGPL 2.1), included unmodified in the `PHPMailer/` folder.
- Form-handling patterns adapted from the course textbook and the W3Schools PHP Form Handling and Form Validation guides.
