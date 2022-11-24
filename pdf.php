<?php
session_start();

if ($_SESSION['goal'] == "car") {
  $data = '<div class="card-body ">
   <h3 style="background-color: gray;text-align:center;color:white; border: 1px solid black;font-size:22px;">Goal</h3>
    <p style="font-size:18px;">Your Goal :- <span style="font-weight:bold;font-style: italic;font-size:21px;">' . $_SESSION['goal'] . '</span></p>
    <h3 style="background-color: gray;text-align:center;color:white; border: 1px solid black;font-size:22px;">Car Details</h3>
    <p style="font-size:18px;">Name of the Car you Wish :- <span style="font-weight:bold;font-style: italic;font-size:21px;">' . $_SESSION['data']['carname'] . '</span></p>
    <p style="font-size:18px;">After how many years you want to purchase your Dream Car:- <span style="font-weight:bold;font-style: italic;font-size:21px;">' . $_SESSION['data']['futureyear'] . '</span></p>
    <h3 style="background-color: gray;text-align:center;color:white; border: 1px solid black;font-size:22px;">Valuation Details</h3>
    <p style="font-size:18px;">Current cost of Car(approx.) :- <span style="font-weight:bold;font-style: italic;font-size:21px;">' . $_SESSION['data']['current'] . '</span></p>
    <p style="font-size:18px;">Expected Rate of Inflation :- <span style="font-weight:bold;font-style: italic;font-size:21px;">' . $_SESSION['data']['inflacar'] . '</span></p>
    <p style="font-size:18px;">Future Cost of car(approx) :- <span style="font-weight:bold;font-style: italic;font-size:21px;">' . $_SESSION['data']['ansinputs'] . '</span></p>
    <p style="font-size:25px;font-weight:700;">SIP Required :- <span style="font-weight:bold;color:red;font-style: italic;font-size:28px;">' . $_SESSION['data']['sipvalue'] . '</span></p>
    <p style="font-size:18px;color:darkgreen;">Worried About Numbers?</p>
    <p style="font-size:18px;text-align:center;">Please Don`t be<br>Contact us For Further Planning Our Team will call you soon </p>
    <p style="font-size:14px;text-align:center;">belive us your can achieve your goal</p>
    </div>';
}
if ($_SESSION['goal'] == "vacation") {
  $data = '<div class="card-body ">
   <h3 style="background-color: gray;text-align:center;color:white; border: 1px solid black;font-size:22px;">Goal</h3>
    <p style="font-size:18px;">Your Goal :- <span style="font-weight:bold;font-style: italic;font-size:21px;">' . $_SESSION['goal'] . '</span></p>
    <h3 style="background-color: gray;text-align:center;color:white; border: 1px solid black;font-size:22px;">Vacation Details</h3>
    <p style="font-size:18px;">After how much time you wish for your Vacation :- <span  style="font-weight:bold;font-style: italic;font-size:21px;">' . $_SESSION['data']['futureyear'] . '</span></p>
    <p style="font-size:18px;">Place you want to go  :- <span style="font-weight:bold;font-style: italic;font-size:21px;">' . $_SESSION['data']['vacationplace'] . '</span></p>
    <h3 style="background-color: gray;text-align:center;color:white; border: 1px solid black;font-size:22px;">Valuation Details</h3>
    <p style="font-size:18px;">Current cost of Vacation(approx.) :- <span style="font-weight:bold;font-style: italic;font-size:21px;">' . $_SESSION['data']['current'] . '</span></p>
    <p style="font-size:18px;">Expected Rate of Inflation :- <span style="font-weight:bold;font-style: italic;font-size:21px;">' . $_SESSION['data']['infla'] . '</span></p>
    <p style="font-size:18px;">Future Cost of Vacation(approx) :- <span style="font-weight:bold;font-style: italic;font-size:21px;">' . $_SESSION['data']['ansinputs'] . '</span></p>
    <p style="font-size:25px;font-weight:700;">SIP Required :- <span style="font-weight:bold;color:red;font-style: italic;font-size:28px;">' . $_SESSION['data']['sipvalue'] . '</span></p>
    <p style="font-size:18px;color:darkgreen;">Worried About Numbers?</p>
    <p style="font-size:18px;text-align:center;">Please Don`t be<br>Contact us For Further Planning Our Team will call you soon </p>
    <p style="font-size:14px;text-align:center;">belive us your can achieve your goal</p>
    </div>';
}
if ($_SESSION['goal'] == "marriage") {
  $data = '<div class="card-body ">
   <h3 style="background-color: gray;text-align:center;color:white; border: 1px solid black;font-size:22px;">Goal</h3>
    <p style="font-size:18px;">Your Goal :- <span style="font-weight:bold;font-style: italic;font-size:21px;">' . $_SESSION['goal'] . '</span></p>
    <h3 style="background-color: gray;text-align:center;color:white; border: 1px solid black;font-size:22px;">Marriage Details</h3>
    <p style="font-size:18px;">Name of Your Child :- <span style="font-weight:bold;font-style: italic;font-size:21px;">' . $_SESSION['data']['childname'] . '</span></p>
    <p style="font-size:18px;">Current age of Child:- <span style="font-weight:bold;font-style: italic;font-size:21px;">' . $_SESSION['data']['currentagechild'] . '</span></p>
    <p style="font-size:18px;">Age at which child Gets Married:- <span style="font-weight:bold;font-style: italic;font-size:21px;">' . $_SESSION['data']['futureage'] . '</span></p>
    <p style="font-size:18px;">Marraige Type:- <span style="font-weight:bold;font-style: italic;font-size:21px;">' . $_SESSION['data']['mariage'] . '</span></p>
    <h3 style="background-color: gray;text-align:center;color:white; border: 1px solid black;font-size:22px;">Valuation Details</h3>
    <p style="font-size:18px;">Current cost of Marriage(approx.) :- <span style="font-weight:bold;font-style: italic;font-size:21px;">' . $_SESSION['data']['currentcost'] . '</span></p>
    <p style="font-size:18px;">Expected Rate of Inflation:- <span style="font-weight:bold;font-style: italic;font-size:21px;">' . $_SESSION['data']['inflation'] . '</span></p>
    <p style="font-size:18px;">Future Cost of car(approx) :- <span style="font-weight:bold;font-style: italic;font-size:21px;">' . $_SESSION['data']['ansinputs'] . '</span></p>
    <p style="font-size:25px;font-weight:700;">SIP Required :- <span style="font-weight:bold;color:red;font-style: italic;font-size:28px;">' . $_SESSION['data']['sipvalue'] . '</span></p>
    <p style="font-size:18px;color:darkgreen;">Worried About Numbers?</p>
    <p style="font-size:18px;text-align:center;">Please Don`t be<br>Contact us For Further Planning Our Team will call you soon </p>
    <p style="font-size:14px;text-align:center;">belive us your can achieve your goal</p>
    </div>';
}
if ($_SESSION['goal'] == "retirement") {
  $data = '<div class="card-body ">
   <h3 style="background-color: gray;text-align:center;color:white; border: 1px solid black;font-size:22px;">Goal</h3>
    <p style="font-size:18px;">Your Goal :- <span style="font-weight:bold;font-style: italic;font-size:21px;">' . $_SESSION['goal'] . '</span></p>
    <h3 style="background-color: gray;text-align:center;color:white; border: 1px solid black;font-size:22px;">Retirement Details</h3>
    <p style="font-size:18px;">Current Age :- <span style="font-weight:bold;font-style: italic;font-size:21px;">' . $_SESSION['data']['currentage'] . '</span></p>
    <p style="font-size:18px;">Retirement Age:- <span style="font-weight:bold;font-style: italic;font-size:21px;">' . $_SESSION['data']['retirementage'] . '</span></p>
    <p style="font-size:18px;">Life Expectency:- <span style="font-weight:bold;font-style: italic;font-size:21px;">' . $_SESSION['data']['lifeexp'] . '</span></p>
    <h3 style="background-color: gray;text-align:center;color:white; border: 1px solid black;font-size:22px;">Valuation Details</h3>
    <p style="font-size:18px;">Current Monthly Expenses:- <span style="font-weight:bold;font-style: italic;font-size:21px;">' . $_SESSION['data']['monthlyexp'] . '</span></p>
    <p style="font-size:18px;">Expected Inflation after Retirement :- <span style="font-weight:bold;font-style: italic;font-size:21px;">' . $_SESSION['data']['inflation'] . '</span></p>
    <p style="font-size:18px;">Expected Rate of Return after Retirement :- <span style="font-weight:bold;font-style: italic;font-size:21px;">' . $_SESSION['data']['rateretire'] . '</span></p>
    <p style="font-size:25px;font-weight:700;">SIP Required :- <span style="font-weight:bold;color:red;font-style: italic;font-size:28px;">' . $_SESSION['data']['sipvalue'] . '</span></p>
    <p style="font-size:18px;color:darkgreen;">Worried About Numbers?</p>
    <p style="font-size:18px;text-align:center;">Please Don`t be<br>Contact us For Further Planning Our Team will call you soon </p>
    <p style="font-size:14px;text-align:center;">belive us your can achieve your goal</p>
  
    </div>';
}
if ($_SESSION['goal'] == "house") {
  $data = '<div class="card-body ">
   <h3 style="background-color: gray;text-align:center;color:white; border: 1px solid black;font-size:22px;">Goal</h3>
    <p style="font-size:18px;">Your Goal :- <span style="font-weight:bold;font-style: italic;font-size:21px;">' . $_SESSION['goal'] . '</span></p>
    <h3 style="background-color: gray;text-align:center;color:white; border: 1px solid black;font-size:22px;">House Details</h3>
    <p style="font-size:18px;">City :- <span style="font-weight:bold;font-style: italic;font-size:21px;">' . $_SESSION['data']['city'] . '</span></p>
    <p style="font-size:18px;">In What Time you want to own your House(In Years):- <span style="font-weight:bold;font-style: italic;font-size:21px;">' . $_SESSION['data']['futureage'] . '</span></p>
    <h3 style="background-color: gray;text-align:center;color:white; border: 1px solid black;font-size:22px;">Valuation Details</h3>
    <p style="font-size:18px;">Current Cost of House in City (approx.) :- <span style="font-weight:bold;font-style: italic;font-size:21px;">' . $_SESSION['data']['currentcost'] . '</span></p>
    <p style="font-size:18px;">Expected Inflation rate in Properties :- <span style="font-weight:bold;font-style: italic;font-size:21px;">' . $_SESSION['data']['inflation'] . '</span></p>
    <p style="font-size:18px;">Future Cost of car(approx) :- <span style="font-weight:bold;font-style: italic;font-size:21px;">' . $_SESSION['data']['ansinputs'] . '</span></p>
    <p style="font-size:25px;font-weight:700;">SIP Required :- <span style="font-weight:bold;color:red;font-style: italic;font-size:28px;">' . $_SESSION['data']['sipvalue'] . '</span></p>
    <p style="font-size:18px;color:darkgreen;">Worried About Numbers?</p>
    <p style="font-size:18px;text-align:center;">Please Don`t be<br>Contact us For Further Planning Our Team will call you soon </p>
    <p style="font-size:14px;text-align:center;">belive us your can achieve your goal</p>
    </div>';
}
if ($_SESSION['goal'] == "education") {
  $data = '<div class="card-body ">
   <h3 style="background-color: gray;text-align:center;color:white; border: 1px solid black;font-size:22px;">Goal</h3>
    <p style="font-size:18px;">Your Goal :- <span style="font-weight:bold;font-style: italic;font-size:21px;">' . $_SESSION['goal'] . '</span></p>
    <h3 style="background-color: gray;text-align:center;color:white; border: 1px solid black;font-size:22px;">Education Details</h3>
    <p style="font-size:18px;">Name of Your Child :- <span style="font-weight:bold;font-style: italic;font-size:21px;">' . $_SESSION['data']['childname'] . '</span></p>
    <p style="font-size:18px;">Current age of Child:- <span style="font-weight:bold;font-style: italic;font-size:21px;">' . $_SESSION['data']['age'] . '</span></p>
    <p style="font-size:18px;">Age at which child go to Higher Education:- <span style="font-weight:bold;font-style: italic;font-size:21px;">' . $_SESSION['data']['futureages'] . '</span></p>
    <p style="font-size:18px;">Carrer Option for your child:- <span style="font-weight:bold;font-style: italic;font-size:21px;">' . $_SESSION['data']['carrer'] . '</span></p>
    <h3 style="background-color: gray;text-align:center;color:white; border: 1px solid black;font-size:22px;">Valuation Details</h3>
    <p style="font-size:18px;">Current cost of Higher Education(approx.) :- <span style="font-weight:bold;font-style: italic;font-size:21px;">' . $_SESSION['data']['currentcost'] . '</span></p>
    <p style="font-size:18px;">Expected Rate of Inflation :- <span style="font-weight:bold;font-style: italic;font-size:21px;">' . $_SESSION['data']['inflation'] . '</span></p>
    <p style="font-size:18px;">Future Cost of car(approx) :- <span style="font-weight:bold;font-style: italic;font-size:21px;">' . $_SESSION['data']['ansinputs'] . '</span></p>
    <p style="font-size:25px;font-weight:700;">SIP Required :- <span style="font-weight:bold;color:red;font-style: italic;font-size:28px;">' . $_SESSION['data']['sipvalue'] . '</span></p>
    <p style="font-size:18px;color:darkgreen;">Worried About Numbers?</p>
    <p style="font-size:18px;text-align:center;">Please Don`t be<br>Contact us For Further Planning Our Team will call you soon </p>
    <p style="font-size:14px;text-align:center;">belive us your can achieve your goal</p>
    </div>';
}
if ($_SESSION['goal'] == "others") {
  $data = '<div class="card-body ">
   <h3 style="background-color: gray;text-align:center;color:white; border: 1px solid black;font-size:22px;">Goal</h3>
    <p style="font-size:18px;">Your Goal :- <span style="font-weight:bold;font-style: italic;font-size:21px;">' . $_SESSION['goal'] . '</span></p>
    <h3 style="background-color: gray;text-align:center;color:white; border: 1px solid black;font-size:22px;">Goal Details</h3>
    <p style="font-size:18px;">Name of Your Goal :- <span style="font-weight:bold;font-style: italic;font-size:21px;">' . $_SESSION['data']['goalname'] . '</span></p>
    <h3 style="background-color: gray;text-align:center;color:white; border: 1px solid black;font-size:22px;">Valuation Details</h3>
    <p style="font-size:18px;">At what time you want to achieve this Goal:- <span style="font-weight:bold;font-style: italic;font-size:21px;">' . $_SESSION['data']['futureage'] . '</span></p>
    <p style="font-size:18px;">Current Cost of your Goal:- <span style="font-weight:bold;font-style: italic;font-size:21px;">' . $_SESSION['data']['currentcost'] . '</span></p>
    <p style="font-size:18px;">Expected Rate of Inflation:- <span style="font-weight:bold;font-style: italic;font-size:21px;">' . $_SESSION['data']['inflation'] . '</span></p>   
    <p style="font-size:18px;">Future Cost  :- <span style="font-weight:bold;font-style: italic;font-size:21px;">' . $_SESSION['data']['ansinputs'] . '</span></p>
    <p style="font-size:25px;font-weight:700;">SIP Required :- <span style="font-weight:bold;color:red;font-style: italic;font-size:28px;">' . $_SESSION['data']['sipvalue'] . '</span></p>
    <p style="font-size:18px;color:darkgreen;">Worried About Numbers?</p>
    <p style="font-size:18px;text-align:center;">Please Don`t be<br>Contact us For Further Planning Our Team will call you soon </p>
    <p style="font-size:14px;text-align:center;">belive us your can achieve your goal</p>
    </div>';
}

require 'vendor/autoload.php';

use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($data);
// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');
// Render the HTML as PDF
$dompdf->render();
// Output the generated PDF to Browser
// $dompdf->stream();
$dompdf->stream("dompdf_out.pdf", array("Attachment" => false));
