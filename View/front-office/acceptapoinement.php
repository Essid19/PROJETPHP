<?php
include '../../Controller/config.php';
include '../../Controller/appoinmentC.php';
include '../../Controller/usersC.php';
$id = $_GET['id'];
$id_patient = $_GET['id_patient'];
$c = new apppoinementC();
$rdv = $c->accept($id);
$user = new usersC();
$patient = $user->readall($id_patient);
$r = $c->readrdv($id);




$email = $_GET['email'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';



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


    $mail->isHTML(true);
    $randomNumber = mt_rand(1000, 9999);
    $mail->Subject = 'appoinement accepted';
    $mail->Body    = 'Bonjour chèr(e)  ' . $patient[0]['nom'] . ' ' . $patient[0]['prenom'] . ' votre rendez-vous pour la date  ' . $r[0]['date'] . ' a été accepter , Merci pour votre confiance , à très bientot.';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->send();


    echo 'Message has been sent';
    echo '<script>window.location.href = "dashdoctor.php";</script>';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
