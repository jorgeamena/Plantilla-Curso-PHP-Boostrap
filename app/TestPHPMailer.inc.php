<?php
use PHPMailer\PHPMailer\PHPMailer;
require 'vendor/autoload.php';
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->Host = 'correo.das.gtm';
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = 'jorge.mena';
$mail->Password = 'Jorge123';
$mail->setFrom('jorge.mena@correo.das.gtm', 'Jorge');
$mail->addReplyTo('jorge.mena@correo.das.gtm', 'Jorge A');
$mail->addAddress('zuilan@correo.das.gtm', 'Receiver Name');
$mail->Subject = 'Testing PHPMailer';
$mail->msgHTML(file_get_contents('message.html'), __DIR__);
$mail->Body = 'This is a plain text message body';
$mail->addAttachment('Correo.inc.php');
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'The email message was sent.';
}
?>