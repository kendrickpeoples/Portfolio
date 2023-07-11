<?php

$name = $_POST["name"];
$subject = $_POST["subject"];
$email = $_POST["email"];
$msg = $_POST["msg"];

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->Username = "business@kendrickpeoples.dev";
$mail->Password = "K3ys3cr3t!!";

$mail->setFrom($email, $name);
$mail->addAddress("business@kendrickpeoples.dev", "Kendrick");

$mail->Subject = $subject;
$mail->Body = $msg;

$mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}