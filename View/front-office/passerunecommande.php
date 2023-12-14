<?php
include '../../Controller/commandeC.php';
include '../../Controller/config.php';
include '../../Controller/usersC.php';
session_start();
$id = $_GET['id'];
$email = $_GET['email'];
$controller = new cmdC();
$res = $controller->readAllUser($id);

$controller2 = new pannC();
$user = new usersC();
$patient = $user->readall($id);

try {
    $pdo = config::getConnexion();
    $pdo->exec('SET foreign_key_checks = 0');
    if (!isset($_SESSION['dates'])) {
        $_SESSION['dates'] = array();
    }
    $date = date('Y-m-d H:i:s');
    array_push($_SESSION['dates'], $date);
    foreach ($res as $row) {
        $controller2->addPan($row['id_cmd'], $row['id_med'], $row['qte_cmd'], $id, $date);

        $controller->deleteCmd($row['id_cmd']);
    }

    $pdo->exec('SET foreign_key_checks = 1');
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'phpmailer/src/SMTP.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/Exception.php';

//session_start();

// Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);



try {
    // Server settings
    $mail->isSMTP();                                          // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                  // Enable SMTP authentication
    $mail->Username   = 'yessin.essid@gmail.com';               // SMTP username (your email)
    $mail->Password   = 'yyav gesg obpm mmzv';                // SMTP password (your email password)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           // Enable implicit TLS encryption
    $mail->Port       = 465;                                  // TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    // Recipients
    $mail->setFrom('from@example.com', 'MEDIPLUS');        // Set the sender's email address
    $mail->addAddress($email);          // Add a recipient email address

    // Content
    $mail->isHTML(true);                                      // Set email format to HTML
    $mail->Subject = 'commande confirmee';
    $mail->Body    =  'Bonjour chèr(e)  ' . $patient[0]['nom'] . ' ' . $patient[0]['prenom'] . ' Nous préparons l\'envoi de votre commande. Nous vous informerons quand celle-ci aura été envoyée , Merci pour votre confiance , à très bientot.';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    // Send the email
    $mail->send();
    echo '<script>window.location.href = "dashpatient.php";</script>';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
