<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer autoload
require_once __DIR__ . '/../../vendor/autoload.php';

// Load email configuration
$config = require __DIR__ . '/../bdd/email_config.php';

function sendEmail($to, $subject, $body, $altBody = '') {
    global $config;
    $mail = new PHPMailer(true);

    try {
        // SMTP settings
        $mail->isSMTP();
        $mail->Host = $config['host'];
        $mail->SMTPAuth = true;
        $mail->Username = $config['username'];
        $mail->Password = $config['password'];
        $mail->SMTPSecure = $config['encryption'];
        $mail->Port = $config['port'];

        // Email content
        $mail->setFrom($config['from_email'], $config['from_name']);
        $mail->addAddress($to); // Recipient email
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AltBody = $altBody; // Plain text version (optional)

        // Send email
        $mail->send();
        return true;
    } catch (Exception $e) {
        return "Error: {$mail->ErrorInfo}";
    }
}
