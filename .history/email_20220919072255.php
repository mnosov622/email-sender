<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require 'vendor/autoload.php'

$mail =  new PHPMailer();

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = "true";
$mail->SMTPSecure = "tls";
$mail->Port = 2525;
$mail->Username = 'mnosov622@gmail.com';
$mail->Password = 'stephencurry2002_16';

$mail->setFrom('mnosov622@gmail.com');

$mail->addAddress("mnosov622@gmail.com");
$mail->Subject = 'Test Email via Mailtrap SMTP using PHPMailer';

$mailContent = "<h1>Send HTML Email using SMTP in PHP</h1>
    <p>This is a test email I’m sending using SMTP mail server with PHPMailer.</p>";
$mail->Body = $mailContent;


if($mail->Send()) {
    echo "Email Sent...!";

}

else {
    echo "error";
}

$mail->smtpClose()

?>