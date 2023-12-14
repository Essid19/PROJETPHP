<?php
session_start(); 
$email = $_SESSION['email'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

// Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();                         // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                // Enable SMTP authentication
    $mail->Username   = 'yessin.essid@gmail.com';  // SMTP username
    $mail->Password   = 'yyav gesg obpm mmzv';    // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;  // Enable implicit TLS encryption
    $mail->Port       = 465;                 // TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    // Recipients
    $mail->setFrom('from@example.com', 'MEDIPLUS');
    $mail->addAddress($email);   

    // Attachments

    // Content
    $mail->isHTML(true);                    
    $randomNumber = mt_rand(1000, 9999);    
    $mail->Subject = 'Your Verification Code';
    $mail->Body    = 'Your verification code is: ' . $randomNumber;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $_SESSION['code'] = $randomNumber;
    $mail->send();
  
    
    echo 'Message has been sent';
    echo '<script>window.location.href = "verifcode.php";</script>';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
