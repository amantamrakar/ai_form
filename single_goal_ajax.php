<?php
session_start();
// echo phpinfo();
// die();
if ($_SERVER["SERVER_NAME"] === "swarajfinpro.in") {
  $conn = mysqli_connect("localhost", "swarajfi_softwareuser", "Qh8c.40yBBxe", "swarajfi_software");
} else {
  $conn = mysqli_connect("localhost", "root", "", "ai_form");
}
echo mysqli_error($conn);
if (!$conn) {
  die("db not connected");
}
// $sql = "UPDATE `user_goal` SET `goal_data` = '{\"carname\":\"dezire\",\"currentyear\":\"0\",\"futureyear\":\"10\",\"current\":\"1000000\",\"inflacar\":\"7\",\"ansinputs\":\"2009665\",\"sipvalue\":\"8650\",\"username\":\"swarajfinpro@gmail.com\",\"email\":\"arpit@gmail.com\",\"mobile\":\"9876543256\",\"passwords\":\"123\"}' WHERE `user_goal`.`id` = 17";
// $result = mysqli_query($conn, $sql);
// if ($result) {
//   // echo "hiii";
//   // die();
// }

if (isset($_POST['key'])) {
  $id = mysqli_real_escape_string($conn, $_POST['key']);
  $sql = "SELECT * FROM `user_goal` WHERE `id`= '$id'";
  $result = mysqli_query($conn, $sql);
  // $markup = '';
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $decode = json_decode($row['goal_data'], true);
    if ($row['goal'] == 'car') {
      $markup = '   <div class="container">
      <div class="card mt-3">
        <div class="card-body">
          <form class="row" id="car_form">
          <input type="hidden" name="id" value="' . $id . '">  

            <div class="mb-3 col-6">
              <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Email</h3>
              <input type="text" class="form-control form-control-sm" id="email" value="' . $row['email'] . '" disabled  />
            </div>
            
            <div class="mb-3 col-6">
              <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Goal</h3>
              <input style="font-weight:bold;font-size:16px;text-transform: capitalize;" class="form-control form-control-sm" id="goal" value="' . $row['goal'] . '" disabled  />
            </div>

            <div class="mb-3 col-6">
              <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Car Name</h3>
              <input style="font-size:19px;" class="form-control form-control-sm" id="carName" value="' . $decode['carname'] . '" disabled />
            </div>

            <div class="mb-3 col-6">
              <h3 for="futureYear" class="form-label" style="background-color: gray;text-align:center;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Future Year</h3>
              <input type="number" style="font-size:16px;" class="form-control form-control-sm" id="futureYearcar" value="' . $decode['futureyear'] . '"  />
            </div>

            <div class="mb-3 col-6">
              <h3 for="currentCost" class="form-label" style="background-color: gray;text-align:center;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Current Cost</h3>
              <input type="number" style="font-size:16px;" class="form-control form-control-sm" id="currentCostcar" value="' . $decode['current'] . '"  />
            </div>

            <div class="mb-3 col-6">
            <h3 for="inflation" class="form-label" style="background-color: gray;text-align:center;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Inflation Rate</h3>
              <input  type="number" style="font-size:16px;" class="form-control form-control-sm" id="inflationcar" value="' . $decode['inflacar'] . '" />
            </div>

            <div class="mb-3 col-6">
            <h3 for="futureValue" class="form-label" style="background-color: gray;text-align:center;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Future Value</h3>
              <input type="number" class="form-control form-control-sm" style="font-size:19px;" id="futureValuecar" value="' . $decode['ansinputs'] . '" disabled />
            </div>

            <div class="mb-3 col-6">
            <h3 for="futureValue" class="form-label" style="background-color: gray;text-align:center;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">SIP Required</h3>
              <input type="number" class="form-control form-control-sm" style="font-size:19px;" id="sipValuecar" value="' . $decode['sipvalue'] . '" disabled />
            </div>

            <div class="mb-3 col-6">
              <button type="submit" class="btn btn-success btn-sm ">Update</button>
              <button class="btn btn-secondary btn-sm">Pdf</button>
              <button class="btn btn-danger btn-sm">Delete</button>
            </div>
          </form>
          </div>
        </div>
      </div>';
      echo $markup;
    }
    if ($row['goal'] == 'house') {
      $markup = '   <div class="container">
      <div class="card mt-3">
        <div class="card-body">
          <form class="row" id="house_form">
          <input type="hidden" name="id" value="' . $id . '">  
            <div class="mb-3 col-6">
             <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Email</h3>
             <input type="text" class="form-control form-control-sm" id="email" value="' . $row['email'] . '" disabled />
            </div>

            <div class="mb-3 col-6">
               <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Goal</h3>
              <input type="text" style="font-weight:bold;font-size:16px;text-transform: capitalize;" class="form-control form-control-sm" id="goal" value="' . $row['goal'] . '" disabled />
            </div>

            <div class="mb-3 col-6">
              <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">City Name</h3>
              <input type="number" style="font-size:16px;text-transform: capitalize;" class="form-control form-control-sm" id="carName" value="' . $decode['city'] . '" disabled   />
             </div>

            <div class="mb-3 col-6">
            <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Future Age<h3>
            <input type="number" style="font-size:16px;text-transform: capitalize;" class="form-control form-control-sm" id="futureYearhouse" value="' . $decode['futureage'] . '"  />
            </div> 

            <div class="mb-3 col-6">
            <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Current Cost<h3>
              <input type="number" style="font-size:16px;text-transform: capitalize;" class="form-control form-control-sm" id="currentCosthouse" value="' . $decode['currentcost'] . '"  />
            </div>

            <div class="mb-3 col-6">
            <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Inflation Rate</h3>
              <input type="number" style="font-size:16px;text-transform: capitalize;" class="form-control form-control-sm" id="inflationhouse" value="' . $decode['inflation'] . '" />
            </div>

            <div class="mb-3 col-6">
            <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Future Value</h3>
             <input type="number" class="form-control form-control-sm" style="font-size:19px;" id="futureValuehouse" value="' . $decode['ansinputs'] . '" disabled />
            </div>

            <div class="mb-3 col-6">
            <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">SIP Requiredd</h3>
              <input type="number" style="font-size:19px;" class="form-control form-control-sm" id="sipValuehouse" value="' . $decode['sipvalue'] . '" disabled />
            </div>

            <div class="mb-3 col-6">
              <button type="submit" class="btn btn-success btn-sm">Update</button>
              <button class="btn btn-secondary btn-sm">Pdf</button>
              <button class="btn btn-danger btn-sm">Delete</button>
            </div>
          </form>
        </div>
      </div>
    </div>';
      echo $markup;
    }
    if ($row['goal'] == 'education') {
      $markup = '   <div class="container">
      <div class="card mt-3">
        <div class="card-body">
          <form class="row">

            <div class="mb-3 col-6">
              <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Email</h3>
              <input type="text" class="form-control form-control-sm" id="email" value="' . $row['email'] . '" disabled />
            </div>

            <div class="mb-3 col-6">
            <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Goal</h3>
              <input type="text" style="font-weight:bold;font-size:16px;text-transform: capitalize;" class="form-control form-control-sm" id="goal" value="' . $row['goal'] . '" disabled />
            </div>

            <div class="mb-3 col-6">
            <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Child Name</h3>
              <input type="text" style="font-size:16px;text-transform: capitalize;" class="form-control form-control-sm" id="childName" value="' . $decode['childname'] . '" disabled />
            </div>

            <div class="mb-3 col-6">
              <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Current Age</h3>
              <input type="text" style="font-size:16px;" class="form-control form-control-sm" id="currentAgeEdu" value="' . $decode['age'] . '" disabled />
             </div>

            <div class="mb-3 col-6">
            <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Future Age</h3>
              <input type="number" style="font-size:16px;" class="form-control form-control-sm" id="futureAgeEdu" value="' . $decode['futureages'] . '" />
            </div>

            <div class="mb-3 col-6">
              <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Career</h3>
              <input type="number" style="font-size:16px;" class="form-control form-control-sm" id="carrerEdu" value="' . $decode['carrer'] . '" />
            </div>

            <div class="mb-3 col-6">
            <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Current Cost</h3>
              <input type="number" style="font-size:16px;" class="form-control form-control-sm" id="currentCostEdu" value="' . $decode['currentcost'] . '" />
            </div>

            <div class="mb-3 col-6">
               <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Inflation Rate</h3>
               <input type="number" style="font-size:16px;" class="form-control form-control-sm" id="inflationEdu" value="' . $decode['inflation'] . '"  />
            </div>

            <div class="mb-3 col-6">
            <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Future Value</h3>
               <input type="number" style="font-size:19px;" class="form-control form-control-sm" id="futureValueEdu" value="' . $decode['ansinputs'] . '" disabled />
            </div>
            <div class="mb-3 col-6">
              <label for="sipValue" class="form-label">Sip Value</label>
              <input
                type="number"
                class="form-control form-control-sm"
                id="sipValueEdu"
                value="' . $decode['sipvalue'] . '"
                disabled
              />
            </div>
            <div class="mb-3 col-12">
              <button class="btn btn-success btn-sm">Update</button>
              <button class="btn btn-secondary btn-sm">Pdf</button>
              <button class="btn btn-danger btn-sm">Delete</button>
            </div>
          </form>
        </div>
      </div>
    </div>';
      echo $markup;
    }

    if ($row['goal'] == 'vacation') {
      $markup = '
      <div class="container">
      <div class="card">
      <div class="card-body">

      <div class = row>
      <form id="vacation_form">
      <div class = "col-md-6">
      <div class="mb-3">
      <input type="hidden" name="id" value="' . $id . '">  

      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control form-control-sm" id="email" value= "' . $row['email'] . '"  disabled readonly>
            </div>
              <div class="mb-3">
              <label for="goal" class="form-label">Goal</label>
              <input type="text" class="form-control form-control-sm" id="goal" value= "' . $row['goal'] . '"  disabled readonly>
            </div>
              <div class="mb-3">
              <label for="future_years" class="form-label">Future years</label>
              <input type="text" class="form-control form-control-sm" name="vacation_future" id="future_years" value= "' . $decode['0'] . '">
            </div>
              <div class="mb-3">
              <label for="c_cost" class="form-label">Current Cost</label>
              <input type="text" class="form-control form-control-sm" name="vacation_current" id="c_cost" value= "' . $decode['current'] . '">
            </div>
            </div>
            <div class = "col-md-6">

              <div class="mb-3">
              <label for="in_rate"" class="form-label">Inflation Rate</label>
              <input type="text" class="form-control form-control-sm" id="in_rate" name="vacation_inflation" value= "' . $decode['infla'] . '">
            </div>
              <div class="mb-3">
              <label for="future_value"" class="form-label">Future Cost</label>
              <input type="text" class="form-control form-control-sm" id="future_value"  name="vacation_value"value= "' . $decode['ansinputs'] . '"readonly="true"> 
            </div>
              <div class="mb-3">
              <label for="sip_value" class="form-label">SIP Required</label>
              <input type="text" class="form-control form-control-sm" id="sip_value" name="vacation_sip" value= "' . $decode['sipvalue'] . '"  readonly="true">
            </div>
              <div class="mb-3">
              <label for="mobile" class="form-label">Mobile</label>
              <input type="text" class="form-control form-control-sm" id="mobile" value= "' . $decode['mobile'] . '"  disabled readonly>
            </div>
            </div>
        <div class="col-md-8">
        <button type="submit" class = "mt-3 btn btn-primary btn-sm" id="updation">Update</button>
        <button class = "mt-3 btn btn-success btn-sm" id="pdf_download">PDF</button>
        <button class = "mt-3 btn btn-danger btn-sm" id="delete">Delete</button>
        </div>
        </form>
              </div> 
              </div> 
              </div> 
      
      ';
      echo $markup;
    }
    if ($row['goal'] == 'marriage') {
      $markup = '
      <div class="container">
      <div class="card">
      <div class="card-body">

      <div class = row>
      <form id="marriage_form">
      <div class = "col-md-6">
      <div class="mb-3">
      <input type="hidden" name="id" value="' . $id . '">  
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control form-control-sm" id="email" value= "' . $row['email'] . '" disabled readonly>
              </div>
                <div class="mb-3">
                <label for="goal" class="form-label">Goal</label>
                <input type="text" class="form-control form-control-sm" id="goal" value= "' . $row['goal'] . '" disabled readonly>
              </div>
                <div class="mb-3">
                <label for="child_name" class="form-label">Child Name</label>
                <input type="text" class="form-control form-control-sm" id="child_name" value= "' . $decode['childname'] . '" disabled readonly>
              </div>
                <div class="mb-3">
                <label for="child_age" class="form-label">Child Age </label>
                <input type="text" class="form-control form-control-sm" name="current_age" id="child_age" value= "' . $decode['currentagechild'] . '">
              </div>
              <div class="mb-3">
                <label for="future_ageMar" class="form-label">Future Age</label>
                <input type="text" class="form-control form-control-sm"  name="marraige_age" id="future_ageMar" value= "' . $decode['futureage'] . '">
              </div>
              
              </div>
              <div class = "col-md-6">

              <div class="mb-3">
              <label for="inflationMar"" class="form-label">Inflation Rate</label>
              <input type="text" class="form-control form-control-sm" name="marriage_inflation" id="inflationMar" value= "' . $decode['inflation'] . '" >
            </div>

                <div class="mb-3">
                <label for="marrraige_type"" class="form-label">Marriage Type</label>
                <input type="text" class="form-control form-control-sm" id="marrraige_type" value= "' . $decode['mariage'] . '"readonly="true">
              </div>
                <div class="mb-3">
                <label for="current_cost"" class="form-label">Current Cost</label>
                <input type="text" class="form-control form-control-sm" name="marriage_current" id="current_costMar" value= "' . $decode['currentcost'] . '">
              </div>
                <div class="mb-3">
                <label for="furture_value" class="form-label">Future Value</label>
                <input type="text" class="form-control form-control-sm" name="marraige_value" id="furture_valueMar" value= "' . $decode['ansinputs'] . '" readonly="true">
              </div>
                <div class="mb-3">
                <label for="sip_value" class="form-label">SIP Value</label>
                <input type="text" class="form-control form-control-sm" name="marriage_sip" id="sip_valueMar" value= "' . $decode['sipvalue'] . '" readonly="true">
              </div>
              </div>
          <div class="col-md-8">
          <button  type="submit" class = "mt-3 btn btn-primary btn-sm" id="updation">Update</button>
          <button class = "mt-3 btn btn-success btn-sm" id="pdf_download">PDF</button>
          <button class = "mt-3 btn btn-danger btn-sm" id="delete">Delete</button>
          </div>
          </form>
       </div> 
       </div> 
       </div>';
      echo $markup;
    }
    if ($row['goal'] == 'retirement') {
      $markup = '
      <div class="container">
      <div class="card">
      <div class="card-body">

      <div class = row>
      <form id="retirement_form">
      <div class = "col-md-6">
      <div class="mb-3">
      <input type="hidden" name="id" value="' . $id . '">  
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control form-control-sm" id="email" value= "' . $row['email'] . '" disabled readonly>
          </div>
            <div class="mb-3">
            <label for="goal" class="form-label">Goal</label>
            <input type="text" class="form-control form-control-sm" id="goal" value= "' . $row['goal'] . '" disabled readonly>
          </div>
            <div class="mb-3">
            <label for="current_age" class="form-label">Current Age</label>
            <input type="text" class="form-control form-control-sm" id="present_age" value= "' . $decode['currentage'] . '" disabled readonly>
          </div>
          <div class="mb-3">
          <label for="retirement_age" class="form-label">Retirement Age </label>
          <input type="text" class="form-control form-control-sm" name="retire_age" id="retirement_age" value= "' . $decode['retirementage'] . '">
          </div>
          <div class="mb-3">
          <label for="mobile" class="form-label">Rate of Return After Retirement</label>
          <input type="text" class="form-control form-control-sm" name="retire_rate" id="rateofRet" value= "' . $decode['rateretire'] . '" >
        </div>
          </div>
          <div class = "col-md-6">

            <div class="mb-3">
            <label for="lifeexp"" class="form-label">Life</label>
            <input type="text" class="form-control form-control-sm" name="retire_exp" id="lifeexp" value= "' . $decode['lifeexp'] . '">
          </div>
            <div class="mb-3">
            <label for="monthlyexp"" class="form-label">Monthly Expenses</label>
            <input type="text" class="form-control form-control-sm" name="retire_expense" id="monthlyexp" value= "' . $decode['monthlyexp'] . '">
          </div>
            <div class="mb-3">
            <label for="furture_value" class="form-label">Future Value</label>
            <input type="text" class="form-control form-control-sm" name="retire_value" id="furture_valueRet" value= "' . $decode['ansinputs'] . '" readonly="true">
          </div>
          <div class="mb-3">
          <label for="inflationRet" class="form-label">Inflation Rate</label>
          <input type="text" class="form-control form-control-sm" name="retire_inflation" id="inflationRet" value= "' . $decode['inflation'] . '">
        </div>
            <div class="mb-3">
            <label for="sip_value" class="form-label">SIP Value</label>
            <input type="text" class="form-control form-control-sm" name="retire_sip" id="sip_valueRet" value= "' . $decode['sipvalue'] . '" readonly="true">
          </div>
          </div>
      <div class="col-md-8">
      <button class = "mt-3 btn btn-primary btn-sm" id="updation">Update</button>
      <button class = "mt-3 btn btn-success btn-sm" id="pdf_download">PDF</button>
      <button class = "mt-3 btn btn-danger btn-sm" id="delete">Delete</button>
      </div>
      </form>
       </div> 
       </div> 
       </div>';
      echo $markup;
    }

    if ($row['goal'] == 'others') {
      $markup = '
      <div class="container">
      <div class="card">
      <div class="card-body">

      <div class = row>
      <form id="others_form">
      <div class = "col-md-6">
      <div class="mb-3">
      <input type="hidden" name="id" value="' . $id . '">  
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control form-control-sm" id="email" value= "' . $row['email'] . '" disabled readonly>
          </div>
            <div class="mb-3">
            <label for="goal" class="form-label">Goal</label>
            <input type="text" class="form-control form-control-sm" id="goal" value= "' . $row['goal'] . '" disabled readonly>
          </div>
            <div class="mb-3">
            <label for="current_age" class="form-label">Goal you want to Achieve</label>
            <input type="text" class="form-control form-control-sm" id="goalname" value= "' . $decode['goalname'] . '" disabled readonly>
          </div>
          <div class="mb-3">
          <label for="retirement_age" class="form-label">Future Year</label>
          <input type="text" class="form-control form-control-sm" name="other_future" id="future_yearOther" value= "' . $decode['futureage'] . '">
          </div>
          </div>
          <div class = "col-md-6">

          <div class="mb-3">
          <label for="mobile" class="form-label">Current Cost</label>
          <input type="text" class="form-control form-control-sm" name="other_current" id="current_costOther" value= "' . $decode['currentcost'] . '" >
        </div>
            <div class="mb-3">
            <label for="lifeexp"" class="form-label">Expected Inflation</label>
            <input type="text" class="form-control form-control-sm" name="other_inflation" id="inflation_other" value= "' . $decode['inflation'] . '">
          </div>
            <div class="mb-3">
            <label for="furture_value" class="form-label">Future Value</label>
            <input type="text" class="form-control form-control-sm" name="other_value" id="furture_valueother" value= "' . $decode['ansinputs'] . '" readonly="true">
          </div>
            <div class="mb-3">
            <label for="sip_value" class="form-label">SIP Value</label>
            <input type="text" class="form-control form-control-sm" name="other_sip" id="sip_valueOther" value= "' . $decode['sipvalue'] . '" readonly="true"> 
          </div>
          </div>
      <div class="col-md-8">
      <button class = "mt-3 btn btn-primary btn-sm" id="updation">Update</button>
      <button class = "mt-3 btn btn-success btn-sm" id="pdf_download">PDF</button>
      <button class = "mt-3 btn btn-danger btn-sm" id="delete">Delete</button>
      </div>
      </form>
       </div> 
       </div> 
       </div>';
      echo $markup;
    }
  }
}

if (isset($_POST['update_car'])) {
  parse_str($_POST['update_car'], $car_data);
  $id = mysqli_real_escape_string($conn, $car_data['id']);
  $year = mysqli_real_escape_string($conn, $car_data['future_car']);
  $current = mysqli_real_escape_string($conn, $car_data['car_current']);
  $inflation = mysqli_real_escape_string($conn, $car_data['car_inflation']);
  $value = mysqli_real_escape_string($conn, $car_data['car_value']);
  $sip = mysqli_real_escape_string($conn, $car_data['car_sip']);

  $sql = "UPDATE `user_goal` SET `goal_data` = '{\"carname\":\"$id\",\"currentyear\":\"0\",\"futureyear\":\"$year\",\"current\":\"$current\",\"inflacar\":\"$inflation\",\"ansinputs\":\"$value\",\"sipvalue\":\"$sip\",\"username\":\"swarajfinpro@gmail.com\",\"email\":\"arpit@gmail.com\",\"mobile\":\"9876543256\",\"passwords\":\"123\"}' WHERE `user_goal`.`id` = $id";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    echo json_encode(array("status" => true, "message" => "updated successfully"));
  } else {
    echo json_encode(array("status" => true, "message" => "updated failed"));
  }
}
if (isset($_POST['update_house'])) {
  parse_str($_POST['update_house'], $house_data);
  $id = mysqli_real_escape_string($conn, $house_data['id']);
  $year = mysqli_real_escape_string($conn, $house_data['house_age']);
  $current = mysqli_real_escape_string($conn, $house_data['house_current']);
  $inflation = mysqli_real_escape_string($conn, $house_data['house_inflation']);
  $value = mysqli_real_escape_string($conn, $house_data['house_value']);
  $sip = mysqli_real_escape_string($conn, $house_data['house_sip']);

  $sql = "UPDATE `user_goal` SET `goal_data` = '{\"city\":\"chennai\",\"currentcost\":\"$current\",\"futureage\":\"$year\",\"inflation\":\"$inflation \",\"ansinputs\":\"$value\",\"sipvalue\":\"$sip\",\"username\":\"vishal@123\",\"email\":\"ajaynema2022@gmail.com\",\"mobile\":\"admin@gmai\",\"passwords\":\"123456\"}' WHERE `user_goal`.`id` = $id";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    echo json_encode(array("status" => true, "message" => "updated successfully"));
  } else {
    echo json_encode(array("status" => true, "message" => "updated failed"));
  }
}
if (isset($_POST['update_vacation'])) {
  parse_str($_POST['update_vacation'], $vacation_data);
  $id = mysqli_real_escape_string($conn, $vacation_data['id']);
  $year = mysqli_real_escape_string($conn, $vacation_data['vacation_future']);
  $current = mysqli_real_escape_string($conn, $vacation_data['vacation_current']);
  $inflation = mysqli_real_escape_string($conn, $vacation_data['vacation_inflation']);
  $value = mysqli_real_escape_string($conn, $vacation_data['vacation_value']);
  $sip = mysqli_real_escape_string($conn, $vacation_data['vacation_sip']);

  $sql = "UPDATE `user_goal` SET `goal_data` = '{\"username\":\"anku\",\"0\":\"$year\",\"current\":\"$current\",\"infla\":\"$inflation\",\"ansinputs\":\"$value\",\"anss\":\"$sip\",\"email\":\"anku@gmail.com\",\"mobile\":\"1234567890\",\"passwords\":\"dfghjk\"}' WHERE `user_goal`.`id` =$id";;
  $result = mysqli_query($conn, $sql);
  if ($result) {
    echo json_encode(array("status" => true, "message" => "updated successfully"));
  } else {
    echo json_encode(array("status" => true, "message" => "updated failed"));
  }
}
if (isset($_POST['update_marriage'])) {
  parse_str($_POST['update_marriage'], $marriage_data);
  $id = mysqli_real_escape_string($conn, $marriage_data['id']);
  $c_a = mysqli_real_escape_string($conn, $marriage_data['current_age']);
  $year = mysqli_real_escape_string($conn, $marriage_data['marraige_age']);
  $current = mysqli_real_escape_string($conn, $marriage_data['marriage_current']);
  $inflation = mysqli_real_escape_string($conn, $marriage_data['marriage_inflation']);
  $value = mysqli_real_escape_string($conn, $marriage_data['marraige_value']);
  $sip = mysqli_real_escape_string($conn, $marriage_data['marriage_sip']);

  $sql = "UPDATE `user_goal` SET `goal_data` = '{\"childname\":\"akshaj\",\"currentagechild\":\"$c_a\",\"futureage\":\"$year\",\"mariage\":\"rich\",\"currentcost\":\"$current\",\"inflation\":\"$inflation\",\"ansinputs\":\"$value\",\"0\":\"$sip\",\"username\":\"nisha\",\"email\":\"nishswaraj@gmail.com\",\"mobile\":\"1234567890\"}' WHERE `user_goal`.`id` = $id";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    echo json_encode(array("status" => true, "message" => "updated successfully"));
  } else {
    echo json_encode(array("status" => true, "message" => "updated failed"));
  }
}
if (isset($_POST['update_other'])) {
  parse_str($_POST['update_other'], $other_data);
  $id = mysqli_real_escape_string($conn, $other_data['id']);
  $year = mysqli_real_escape_string($conn, $other_data['other_future']);
  $current = mysqli_real_escape_string($conn, $other_data['other_current']);
  $inflation = mysqli_real_escape_string($conn, $other_data['other_inflation']);
  $value = mysqli_real_escape_string($conn, $other_data['other_value']);
  $sip = mysqli_real_escape_string($conn, $other_data['other_sip']);

  $sql = "UPDATE `user_goal` SET `goal_data` = '{\"goalname\":\"ar\",\"futureage\":\"$year\",\"currentcost\":\"$current\",\"inflation\":\"$inflation\",\"$value\":\"10576438\",\"sipvalue\":\"$sip\",\"0\":\"1234\",\"username\":\"cvzf\",\"email\":\"admin123@gmail.com\",\"mobile\":\"8762384587\"}' WHERE `user_goal`.`id` = $id";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    echo json_encode(array("status" => true, "message" => "updated successfully"));
  } else {
    echo json_encode(array("status" => true, "message" => "updated failed"));
  }
}
if (isset($_POST['update_retirement'])) {
  parse_str($_POST['update_retirement'], $retire_data);
  $id = mysqli_real_escape_string($conn, $retire_data['id']);
  $r_age = mysqli_real_escape_string($conn, $retire_data['retire_age']);
  $_rate = mysqli_real_escape_string($conn, $retire_data['retire_rate']);
  $r_exp = mysqli_real_escape_string($conn, $retire_data['retire_exp']);
  $r_expense = mysqli_real_escape_string($conn, $retire_data['retire_expense']);
  $inflation = mysqli_real_escape_string($conn, $retire_data['retire_inflation']);
  $value = mysqli_real_escape_string($conn, $retire_data['retire_value']);
  $sip = mysqli_real_escape_string($conn, $retire_data['retire_sip']);

  $sql = "UPDATE `user_goal` SET `goal_data` = '{\"currentage\":\"40\",\"retirementage\":\"$r_age\",\"lifeexp\":\"$r_exp\",\"monthlyexp\":\" $r_expense\",\"inflation\":\"$inflation\",\"rateretire\":\"$_rate\",\"ansinputs\":\"$value\",\"sipvalue\":\"$sip\",\"username\":\"mmmm\",\"email\":\"poojadhameja36@gmail.com\",\"mobile\":\"9981153638\",\"time\":\"Choose Time\"}' WHERE `user_goal`.`id` = $id";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    echo json_encode(array("status" => true, "message" => "updated successfully"));
  } else {
    echo json_encode(array("status" => true, "message" => "updated failed"));
  }
}
if (isset($_POST['deleteId'])) {
  $id =  $_POST['deleteId'];
  $sql = "DELETE FROM `user_goal` WHERE `user_goal`.`id` = $id";
  $result = mysqli_query($conn, $sql);
  if (mysqli_affected_rows($conn)) {
    echo json_encode(array("status" => true, "message" => "Deleted successfully"));
  } else {
    echo json_encode(array("status" => true, "message" => "Deletion Failed"));
  }
}
