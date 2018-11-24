<?php
use PHPMailer\PHPMailer\PHPMailer;
require_once __DIR__."/vendor/autoload.php";
$mail = new PHPMailer;
//$mail->SMTPDebug = 3;                               // Enable verbose debug output
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host = "smtp.mail.ru";
$mail->Username = "sadasddddddddddddddd111@mail.ru";
$mail->Password = 'qwerty1234';
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to
$mail->setFrom('sadasddddddddddddddd111@mail.ru', 'E-mail с сайта');
$mail->addAddress('itvrd2@yandex.ru', 'Получатель');     // Add a recipient
//$mail->addCC($_POST['email'], $_POST['name']);
$mail->addAttachment('composer.json');
$mail->addReplyTo('sadasddddddddddddddd111@mail.ru', 'Robot');
$mail->CharSet = 'UTF-8';
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = 'Письмо с сайта ' . date('d.m.Y H:i:s', time());
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
if (!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}