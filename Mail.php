<?php
require_once('./vendor/autoload.php');

use PHPMailer\PHPMailer\PHPMailer;

$mail = new PHPMailer();
$mail->SMTPDebug  = 3;
// $mail->SMTPDebug=SMTP::DEBUG_SERVER;
$mail->CharSet = "utf-8";
$mail->IsSMTP();
$mail->Mailer = "smtp";
// enable SMTP authentication
$mail->SMTPAuth = true;
// GMAIL username
// $mail->Username = "wishky955@gmail.com";
$mail->Username = "help.swarajfinpro@gmail.com";
// GMAIL password
// $mail->Password = "Mycustomer@123";
$mail->Password = "yuqbuycngtugrnfl";
$mail->SMTPSecure = "tls";
$mail->Port = 587;
// $mail->SMTPSecure = "STARTTLS";
// sets GMAIL as the SMTP server
// $mail->Host = "smtp.gmail.com";
$mail->Host = "smtp.gmail.com";
// set the SMTP port for the GMAIL server
// $mail->From = 'wishky955@gmail.com';
$mail->From = 'arpit@swarajfinpro.com';
// $mail->FromName = 'your_name';
$mail->AddAddress("arpit@swarajfinpro.com", "Swaraj Finpro");
$mail->Subject =  'Reset Password';
$mail->IsHTML(true);
$mail->Body = 'test mail';
if ($mail->Send()) {
  echo "Check Your Email and Click on the link sent to your email";
} else {
  echo "Mail Error - >" . $mail->ErrorInfo;
}

echo "yeeee";
