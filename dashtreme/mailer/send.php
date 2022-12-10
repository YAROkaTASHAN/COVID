<?php
use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';

require 'phpmailer/src/PHPMailer.php';

require 'phpmailer/src/SMTP.php';


if(isset($_POST['save']))
{
    $mail=new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->SMTPAuth=true;
    $mail->Username='covidreport132@gmail.com';
    $mail->Password='covidreport132?>';
    $mail->SMTPSecure='ssl';
    $mail->Port=465;
    $mail->setFrom('covidreport132@gmail.com');
    $mail->addAddress($_POST["email"]);
    $mail->isHTML(true);
    $mail->Subject=$_POST["subject"];
    $mail->Body=$_POST["reply"];
    $mail->send();

    echo "<script> alert('Done');  
    document.location.href='dashtreme/messages.php';
    
    </script>"
    
    
    
    
    ;




}






?>