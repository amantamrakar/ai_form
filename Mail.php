<?php
require_once('mail/vendor/autoload.php');

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
$mail->Username = "customercare@swarajfinpro.com";
// GMAIL password
// $mail->Password = "Mycustomer@123";
$mail->Password = "tasspkncpojppqgj";
$mail->SMTPSecure = "tls";
// $mail->SMTPSecure = "STARTTLS";
// sets GMAIL as the SMTP server
// $mail->Host = "smtp.gmail.com";
$mail->Host = "smtp.gmail.com";
// set the SMTP port for the GMAIL server
$mail->Port = 587;
// $mail->From = 'wishky955@gmail.com';
$mail->From = 'customercare@swarajfinpro.com';
// $mail->FromName = 'your_name';
$mail->AddAddress("nikhilp1099@gmail.com", "Swaraj Finpro");
$mail->Subject =  'Reset Password';
$mail->IsHTML(true);
$mail->Body = 'This is it i am breakup with you';
if ($mail->Send()) {
  echo "Check Your Email and Click on the link sent to your email";
} else {
  echo "Mail Error - >" . $mail->ErrorInfo;
}

echo "yeeee";
