<?php
use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';

require 'phpmailer/src/PHPMailer.php';

require 'phpmailer/src/SMTP.php';

require 'vendor/autoload.php';

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
    $mail->isSMTP(); //Send using SMTP
    $mail->Host = 'smtp.example.com'; //Set the SMTP server to send through
    $mail->SMTPAuth = true; //Enable SMTP authentication
    $mail->Username = 'covidreport132@gmail.com'; //SMTP username
    $mail->Password = 'covidreport132?>'; //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
    $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('covidreport132@gmail.com', 'Mailer');
    $mail->addAddress($_POST["email"],'JOEMAMA'); //Add a recipient
    $mail->addAddress($_POST["email"]); //Name is optional

    //Content
    $mail->isHTML(true); //Set email format to HTML
    $mail->Subject = $_POST["subject"];
    $mail->Body = $_POST["reply"];
    $mail->AltBody = 'Thanks for sharing inovative ideas';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}



?>