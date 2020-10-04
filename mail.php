<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer/src/Exception.php';
require 'PHPMailer/PHPMailer/src/PHPMailer.php';
require 'PHPMailer/PHPMailer/src/SMTP.php';

if ( isset($_GET["report"])){
//PHPMailer Object
$mail = new PHPMailer(true); //Argument true in constructor enables exceptions
echo $_GET["report"];
echo $_POST["OldRes"];

$ma=$_POST["email"];
echo $ma;
//From email address and name
$mail->From = "Ashish@Overlord.com";
$mail->FromName = "Ashish Salve";

//To address and name
$mail->addAddress($ma);
//$mail->addAddress("recepient1@example.com"); //Recipient name is optional

//Address to which recipient will reply
//$mail->addReplyTo("reply@yourdomain.com", "Reply");

//CC and BCC
$mail->addCC("a.r.salve@hotmail.com");
//$mail->addBCC("bcc@example.com");

//Send HTML or Plain Text email
$mail->isHTML(true);

$mail->Subject = "Word Game Results";
$mail->Body = "<i>Your Current Score</i>".$_GET["report"]."<br>Privious result are<br>".$_POST["OldRes"];
$mail->AltBody = "HAPPY HUNTING";

try {
    $mail->send();
    echo "Message has been sent successfully";
} catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
}
    }
