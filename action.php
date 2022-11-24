<?php
if (!isset($_POST["submit"])) {
  header("Location: ./");
}
session_start();

use PHPMailer\PHPMailer\PHPMailer;

require './vendor/autoload.php';
// $dompdf = new Dompdf();
$_SESSION['goal'] = $_POST["goal_txt"];
$goal = $_POST["goal_txt"];
$_SESSION['state'] = $_POST["state"];
$state = $_POST["state"];
$_SESSION['city'] = $_POST["city"];
$city = $_POST["city"];
$_SESSION['pin'] = $_POST["pincode"];
$pin = $_POST["pincode"];
$_SESSION['ccost'] = $_POST["currentcost"];
$ccost = $_POST["currentcost"];
$_SESSION['time'] = $_POST["timehorizon"];
$time = $_POST["timehorizon"];
$_SESSION['inf'] = $_POST["inflation"];
$inf = $_POST["inflation"];
$_SESSION['f_v'] = $_POST["futurevalue"];
$f_v = $_POST["futurevalue"];
$_SESSION['a_g'] = $_POST["achive_goal"];
$a_g = $_POST["achive_goal"];
$_SESSION['gen'] = $_POST["gender"];
$gen =  $_POST["gender"];
$_SESSION['mobile'] = $_POST["mobileno"];
$mobile =  $_POST["mobileno"];
$_SESSION['dec'] = $_POST["decision"];
$dec =  $_POST["decision"];

$mail_data = '<div class="card-body ">
<h3 class="bg-secondary text-white rounded p-2">Goal</h3>
 <p class="fs-3 ">Your Goal :- <span class="text-primary">' . $goal . '</span></p>
 <h3 class="bg-secondary text-white rounded p-2">House Details</h3>
 <p class="fs-3 ">State :- <span class="text-primary">' . $state . '</span></p>

 <p class="fs-3 ">city :- <span class="text-primary">' . $city . '</span></p>
 <p class="fs-3 ">Pincode :- <span class="text-primary">' . $pin . '</span></p>
 <h3 class="bg-secondary text-white rounded p-2">Valuation Details</h3>
 <p class="fs-3 ">Current Cost of House in City :- <span class="text-primary">' . $ccost . '</span></p>
 <p class="fs-3 ">Time Horizon (In Years) :- <span class="text-primary">' . $time . '</span></p>
 <p class="fs-3 ">Property Inflation :- <span class="text-primary">' . $inf . '</span></p>
 <p class="fs-3 ">Future Value :- <span class="text-primary">' . $f_v . '</span></p>
 <p class="fs-3 ">Goal Type(Monthaly/Lumpsum) :- <span class="text-primary">' . $a_g . '</span></p>
 <h3 class="bg-secondary text-white rounded p-2">Personal Details</h3>
 <p class="fs-3 ">Gender :- <span class="text-primary">' . $gen . '</span></p>
 <p class="fs-3 ">Mobile :- <span class="text-primary">' . $mobile . '</span></p>
 <p class="fs-3 ">Financial Decision :- <span class="text-primary">' . $dec . '</span></p>
 </div>';

$mail = new PHPMailer();
// $mail->SMTPDebug  = 3;
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
$mail->Password = "tasspkncpojppqgj";
// $mail->SMTPSecure = "tls";
$mail->SMTPSecure = "STARTTLS";
// sets GMAIL as the SMTP server
$mail->Host = "smtp.gmail.com";

// set the SMTP port for the GMAIL server
$mail->Port = 587;
// $mail->From = 'wishky955@gmail.com';
$mail->From = 'customercare@swarajfinpro.com';
// $mail->FromName = 'your_name';
$mail->AddAddress("help.swarajfinpro@gmail.com", "Swaraj Finpro");
$mail->Subject =  'AI Form';
$mail->IsHTML(true);
$mail->Body = $mail_data;
if ($mail->Send()) {
  // $_SESSION["m_status"]=true;
  // echo "Check Your Email and Click on the link sent to your email";
} else {
  echo "Mail Error - >" . $mail->ErrorInfo;
}

// $dompdf->loadHtml('<div class="card-body ">
//   <h3 class="bg-secondary text-white rounded p-2">Goal</h3>
//   <p class="fs-3 ">Your Goal :- <span class="text-primary">' . $goal . '</span></p>
//   <h3 class="bg-secondary text-white rounded p-2">House Details</h3>
//   <p class="fs-3 ">State :- <span class="text-primary">' . $state . '</span></p>
//   <p class="fs-3 ">city :- <span class="text-primary">' . $city . '</span></p>
//   <p class="fs-3 ">Pincode :- <span class="text-primary">' . $pin . '</span></p>
//   <h3 class="bg-secondary text-white rounded p-2">Valuation Details</h3>
//   <p class="fs-3 ">Current Cost of House in City :- <span class="text-primary">' . $ccost . '</span></p>
//   <p class="fs-3 ">Time Horizon (In Years) :- <span class="text-primary">' . $time . '</span></p>
//   <p class="fs-3 ">Property Inflation :- <span class="text-primary">' . $inf . '</span></p>
//   <p class="fs-3 ">Future Value :- <span class="text-primary">' . $f_v . '</span></p>
//   <p class="fs-3 ">Goal Type(Monthaly/Lumpsum) :- <span class="text-primary">' . $a_g . '</span></p>
//   <h3 class="bg-secondary text-white rounded p-2">Personal Details</h3>
//   <p class="fs-3 ">Gender :- <span class="text-primary">' . $gen . '</span></p>
//   <p class="fs-3 ">Mobile :- <span class="text-primary">' . $mobile . '</span></p>
//   <p class="fs-3 ">Financial Decision :- <span class="text-primary">' . $dec . '</span></p>
//   </div>');
// $dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
// $dompdf->render();

// Output the generated PDF to Browser
// $dompdf->stream();ddd
// $dompdf->stream("Details.pdf", array("Attachment" => false));
// exit(0);



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <title>Document</title>
</head>

<body>
  <div class="row mt-5">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <div class="container col-sm-12 ">
        <div class="card shadow p-3 mb-5 bg-body rounded">
          <div class="card-body ">
            <h3 class="bg-secondary text-white rounded p-2">Goal</h3>
            <p class="fs-3 ">Your Goal :- <span class="text-primary"><?php echo $_POST['goal_txt'] ?></span></p>
            <h3 class="bg-secondary text-white rounded p-2">House Details</h3>
            <p class="fs-3 ">State :- <span class="text-primary"><?php echo $_POST['state'] ?></span></p>
            <p class="fs-3 ">city :- <span class="text-primary"><?php echo $_POST['city'] ?></span></p>
            <p class="fs-3 ">Pincode :- <span class="text-primary"><?php echo $_POST['pincode'] ?></span></p>
            <h3 class="bg-secondary text-white rounded p-2">Valuation Details</h3>
            <p class="fs-3 ">Current Cost of House in City :- <span class="text-primary"><?php echo $_POST['currentcost'] ?></span></p>
            <p class="fs-3 ">Time Horizon (In Years) :- <span class="text-primary"><?php echo $_POST['timehorizon'] ?></span></p>
            <p class="fs-3 ">Property Inflation :- <span class="text-primary"><?php echo $_POST['inflation'] ?></span></p>
            <p class="fs-3 ">Future Value :- <span class="text-primary"><?php echo $_POST['futurevalue'] ?></span></p>
            <p class="fs-3 ">Goal Type(Monthaly/Lumpsum) :- <span class="text-primary"><?php echo $_POST['achive_goal'] ?></span></p>
            <h3 class="bg-secondary text-white rounded p-2">Personal Details</h3>
            <p class="fs-3 ">Gender :- <span class="text-primary"><?php echo $_POST['gender'] ?></span></p>
            <p class="fs-3 ">Mobile :- <span class="text-primary"><?php echo $_POST['mobileno'] ?></span></p>

            <p class="fs-3 ">Financial Decision :- <span class="text-primary"><?php echo $_POST['decision'] ?></span></p>
            <a class="btn btn-danger rounded fs-4" href="show.php" target="_blank">Generate Pdf</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4"></div>

  </div>

</body>

</html>