<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail =  new PHPMailer(true);
$name = $_POST['name'];
$surname = $_POST['name'];
$mail->SMTPDebug = 2;
$mail->isSMTP();
$mail->Host = 'smtp.mailtrap.io';
$mail->SMTPAuth = "true";
$mail->SMTPSecure = "tls";
$mail->Port = 2525;
$mail->Username = '4b4f48f1dfda19';
$mail->Password = '77ba1bf500d113';

$mail->setFrom('zakaz-retona@yandex.ru');

$mail->addAddress("mnosov622@gmail.com");
$mail->Subject = 'Buyign staff';

$mailContent = `You are trying to buy the whole service, here is your name: + ${name} + ${surname}`;

$mail->Body = $mailContent;


if($mail->Send()) {
    echo "Email Sent...!";
}

else {
    echo "error";
}

$mail->smtpClose()

?>