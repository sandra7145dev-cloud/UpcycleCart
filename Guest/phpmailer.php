<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com'; // SMTP server address
    $mail->SMTPAuth   = true;                // Enable SMTP authentication
    $mail->Username   = 'sandraes2835@gmail.com';  // SMTP username
    $mail->Password   = 'ktwt ezqz ihvh fegl';     // SMTP password
    $mail->SMTPSecure = 'ssl';               // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 465;                 // TCP port to connect to
    $mail->setFrom('sandraes2835@gmail.com');
    $mail->addAddress($mailtoaddress);
    $mail->Subject = '"Welcome to UpcycleCart!"';
    $mail->Body    = $bodyContent;
    $mail->send();
    echo"<script> alert('Registered Successfully'); window.location='index.php';</script>";
} catch (Exception $e) {
    echo 'Email could not be sent. Error: ', $mail->ErrorInfo;
}
?>
