<?php
session_start();

use Dompdf\Dompdf;

$goal = $_SESSION['goal'];
$state = $_SESSION['state'];
$city = $_SESSION['city'];
$pin = $_SESSION['pin'];
$ccost = $_SESSION['ccost'];
$time = $_SESSION['time'];
$inf = $_SESSION['inf'];
$f_v = $_SESSION['f_v'];
$a_g = $_SESSION['a_g'];
$gen = $_SESSION['gen'];
$mobile = $_SESSION['mobile'];
$dec = $_SESSION['dec'];
require './vendor/autoload.php';
$dompdf = new Dompdf();
// $dompdf->loadHtml("<h1>" . $goal . "</h1>");
$markup='<div class="card-body ">
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
$dompdf->loadHtml($markup);
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
// $dompdf->stream();ddd
$dompdf->stream("Details.pdf", array("Attachment" => false));
exit(0);
