<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'padaniyash0007@gmail.com';
$mail->Password = 'vwqt igsi weub fdvh';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->setFrom('padaniyash0007@gmail.com', 'INFINITY BANK');
$mail->addAddress($email);

$mail->Subject = "Account Details";
$mail->Body = $body;

$mail->SMTPOptions = array(
'ssl' => array(
'verify_peer' => false,
'verify_peer_name' => false,
'allow_self_signed' => true
)
);

$mail->send();
?>