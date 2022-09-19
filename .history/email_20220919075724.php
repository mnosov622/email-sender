<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail =  new PHPMailer(true);
$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$mail->SMTPDebug = 2;
$mail->isSMTP();
$mail->Host = 'smtp.mailtrap.io';
$mail->SMTPAuth = "true";
$mail->SMTPSecure = "tls";
$mail->Port = 2525;
$mail->Username = '4b4f48f1dfda19';
$mail->Password = '77ba1bf500d113';

$mail->setFrom('zakaz-reton@yandex.ru');

$mail->addAddress($email);
$mail->Subject = 'Zayavka s sayta autn01.ru';

$mailContent = $name . $surname;

$mail->Body = $mailContent;


if($mail->Send()) {
    echo "Email Sent...!";
    // echo '<meta HTTP-EQUIV="REFRESH" content="0; url=thanks.html">';

    header('Location: thanks.html');

    exit;

}

else {
    echo "error";
}

$mail->smtpClose();

?>