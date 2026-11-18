-- Run this in phpMyAdmin: select your database on the left,
-- open the SQL tab, paste this in, and click Go.
CREATE TABLE contact_messages (
    id           INT AUTO_INCREMENT PRIMARY KEY,
    name         VARCHAR(100)  NOT NULL,
    email        VARCHAR(255)  NOT NULL,
    subject      VARCHAR(150)  NOT NULL,
    message      TEXT          NOT NULL,
    email_sent   TINYINT(1)    NOT NULL DEFAULT 0,   -- 1 if the copy reached Gmail's server
    submitted_at TIMESTAMP     DEFAULT CURRENT_TIMESTAMP
);
