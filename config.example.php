<?php
/* =====================================================================
   config.example.php - TEMPLATE for the private settings file.

   SETUP: make a copy of this file named config.php, then fill in your
   own values in config.php. The real config.php is listed in .gitignore,
   so your passwords are never uploaded to GitHub. Keep the placeholder
   values in THIS file.
   ===================================================================== */

/* ---------- MySQL database (laromanahost: Hosting Tools > Database Manager) ---------- */
// Copy these exactly as the Database Manager shows them.
// The host is usually NOT "localhost" on this kind of hosting; the panel
// lists a separate database server name, so use that.
define('DB_HOST', 'your_database_host');
define('DB_USER', 'your_database_user');
define('DB_PASS', 'your_database_password');
define('DB_NAME', 'your_database_name');

/* ---------- Gmail account used to send the confirmation copy ---------- */
// GMAIL_APP_PASSWORD is a 16-character app password from
// myaccount.google.com/apppasswords - NOT your normal Gmail password.
define('GMAIL_ADDRESS', 'your.address@gmail.com');
define('GMAIL_APP_PASSWORD', 'abcdefghijklmnop');   // paste without spaces

/* ---------- Site details shown in the email ---------- */
define('SITE_NAME', 'Infinite IT Consulting');

// Set to true only while testing: the email step will print a detailed
// log of the conversation with Gmail's server, which helps find problems.
define('MAIL_DEBUG', false);
