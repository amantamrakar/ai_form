<?php
session_start();
// echo phpinfo();
// die();
require_once("./connect.php");
// $sql = "UPDATE `user_goal` SET `goal_data` = '{\"carname\":\"dezire\",\"currentyear\":\"0\",\"futureyear\":\"10\",\"current\":\"1000000\",\"inflacar\":\"7\",\"ansinputs\":\"2009665\",\"sipvalue\":\"8650\",\"username\":\"swarajfinpro@gmail.com\",\"email\":\"arpit@gmail.com\",\"mobile\":\"9876543256\",\"passwords\":\"123\"}' WHERE `user_goal`.`id` = 17";
// $result = mysqli_query($conn, $sql);
// if ($result) {
//   // echo "hiii";
//   // die();
// }
// echo "hii";
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
              <input type="number" name="future_car" style="font-size:16px;" class="form-control form-control-sm" id="futureYearcar"  name="future_car" value="' . $decode['futureyear'] . '"  />
            </div>

            <div class="mb-3 col-6">
              <h3 for="currentCost" class="form-label" style="background-color: gray;text-align:center;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Current Cost</h3>
              <input type="number" name="car_current" style="font-size:16px;" class="form-control form-control-sm" id="currentCostcar" name="car_current" value="' . $decode['current'] . '"  />
            </div>

            <div class="mb-3 col-6">
            <h3 for="inflation" class="form-label" style="background-color: gray;text-align:center;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Inflation Rate</h3>
              <input  type="number" name="car_inflation" style="font-size:12px;" class="form-control form-control-sm" id="inflationcar" name="car_inflation" value="' . $decode['inflacar'] . '" />
            </div>

            <div class="mb-3 col-6">
            <h3 for="futureValue" class="form-label" style="background-color: gray;text-align:center;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Future Value</h3>
              <input type="number" name="car_value" class="form-control form-control-sm" style="font-size:19px;" id="futureValuecar" name="car_value" value="' . $decode['ansinputs'] . '" readonly="true" />
            </div>

            <div class="mb-3 col-6">
            <h3 for="futureValue" class="form-label" style="background-color: gray;text-align:center;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">SIP Required</h3>
              <input type="number" name="car_sip" class="form-control form-control-sm" style="font-size:19px;" name="car_sip" id="sipValuecar" value="' . $decode['sipvalue'] . '" readonly="true" />
            </div>

            <div class="mb-3 col-6">
              <button type="submit" class="btn btn-success btn-sm ">Update</button>
              <button class="btn btn-secondary btn-sm">Pdf</button>
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
            <input type="number" style="font-size:16px;text-transform: capitalize;" class="form-control form-control-sm" name="house_age"id="futureYearhouse" value="' . $decode['futureage'] . '"  />
            </div> 

            <div class="mb-3 col-6">
            <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Current Cost<h3>
              <input type="number" style="font-size:16px;text-transform: capitalize;" class="form-control form-control-sm" name="house_current" id="currentCosthouse" value="' . $decode['currentcost'] . '"  />
            </div>

            <div class="mb-3 col-6">
            <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Inflation Rate</h3>
              <input type="number" style="font-size:16px;text-transform: capitalize;" class="form-control form-control-sm" name="house_inflation" id="inflationhouse" value="' . $decode['inflation'] . '" />
            </div>

            <div class="mb-3 col-6">
            <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Future Value</h3>
             <input type="number" class="form-control form-control-sm" style="font-size:19px;" id="futureValuehouse" name="house_value" value="' . $decode['ansinputs'] . '" readonly="true" />
            </div>

            <div class="mb-3 col-6">
            <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">SIP Requiredd</h3>
              <input type="number" style="font-size:19px;" class="form-control form-control-sm" id="sipValuehouse" name="house_sip" value="' . $decode['sipvalue'] . '" readonly="true" />
            </div>

            <div class="mb-3 col-6">
              <button type="submit" class="btn btn-success btn-sm">Update</button>
              <button class="btn btn-secondary btn-sm">Pdf</button>
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
              <input type="text" style="font-size:16px;text-transform:capitalize;" class="form-control form-control-sm" id="carrerEdu" value="' . $decode['carrer'] . '" />
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
               <input type="number" style="font-size:19px;" class="form-control form-control-sm" id="futureValueEdu" value="' . $decode['ansinputs'] . '" readonly="true" />
            </div>

            <div class="mb-3 col-6">
            <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">SIP Required</h3>
              <input
                type="number"
                class="form-control form-control-sm"
                id="sipValueEdu"
                value="' . $decode['sipvalue'] . '"
                readonly="true"
              />
            </div>';
      if (array_key_exists('secondchildname', $decode) && array_key_exists('secondchildage', $decode) && array_key_exists('secondfutureage', $decode) && array_key_exists('secondcurrentcost', $decode) && array_key_exists('secondinflation', $decode) && array_key_exists('secondchildSIP', $decode)) {
        $markup .= '<h4>Second</h4><div class="mb-3 col-6">
        <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;"> Name</h3>
           <input type="text" style="font-size:19px;" class="form-control form-control-sm" id="nameEdu" value="' . $decode['secondchildname'] . '" readonly="true" />
        </div>
        <div class="mb-3 col-6">
        <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Age</h3>
           <input type="number" style="font-size:19px;" class="form-control form-control-sm" id="ageEdu" value="' . $decode['secondchildage'] . '" readonly="true" />
        </div>
        <div class="mb-3 col-6">
        <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Future Age</h3>
           <input type="number" style="font-size:19px;" class="form-control form-control-sm" id="futureageEdu" value="' . $decode['secondfutureage'] . '" readonly="true" />
        </div>
        <div class="mb-3 col-6">
        <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Current Cost</h3>
           <input type="number" style="font-size:19px;" class="form-control form-control-sm" id="currentEdu" value="' . $decode['secondcurrentcost'] . '" readonly="true" />
        </div>
        <div class="mb-3 col-6">
        <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Future Value</h3>
           <input type="number" style="font-size:19px;" class="form-control form-control-sm" id="futurevalueEdu" value="' . $decode['secondchildfuturevalue'] . '" readonly="true" />
        </div>
        <div class="mb-3 col-6">
        <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Future Inflation</h3>
           <input type="number" style="font-size:19px;" class="form-control form-control-sm" id="inflationEdu" value="' . $decode['secondinflation'] . '" readonly="true" />
        </div>
        <div class="mb-3 col-6">
        <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">SIP Required</h3>
           <input type="number" style="font-size:19px;" class="form-control form-control-sm" id="SIPsecond" value="' . $decode['secondchildSIP'] . '" readonly="true" />
        </div>';
      }

      $markup .= '  <div class="mb-3 col-12">
          <button class="btn btn-success btn-sm">Update</button>
          <button class="btn btn-secondary btn-sm">Pdf</button>
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
              <form class = "row">
                <input type="hidden" name="id" value="' . $id . '"> 

                <div class="mb-3 col-6">
                  <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Email</h3>
                  <input type="email" class="form-control form-control-sm" id="email" value= "' . $row['email'] . '"  disabled readonly>
                </div>

                <div class="mb-3 col-6">
                  <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Goal</h3>
                  <input type="text" style="font-weight:bold;font-size:16px;text-transform: capitalize;" class="form-control form-control-sm" id="goal" value= "' . $row['goal'] . '"  disabled readonly>
                </div>

                <div class="mb-3 col-6">
                  <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Future Year</h3>
                  <input type="text" class="form-control style="font-size:16px;" form-control-sm" name="vacation_future" id="future_years" value= "' . $decode['futureyear'] . '">
                </div>

                <div class="mb-3 col-6">
                  <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Current Cost</h3>
                  <input type="text" class="form-control style="font-size:16px;" form-control-sm" name="vacation_current" id="c_cost" value= "' . $decode['current'] . '">
                </div>
            

                <div class="mb-3 col-6">
                  <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Inflation Rate</h3>
                  <input type="text" class="form-control form-control-sm" style="font-size:16px;" id="in_rate" name="vacation_inflation" value= "' . $decode['infla'] . '">
                </div>

                <div class="mb-3 col-6">
                  <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Future Cost</h3>
                  <input type="text" class="form-control form-control-sm" style="font-size:16px;" id="future_value"  name="vacation_value"value= "' . $decode['ansinputs'] . '"readonly="true"> 
                </div>

                <div class="mb-3 col-6">
                  <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">SIP Required</h3>
                  <input type="text" class="form-control form-control-sm" style="font-size:16px;" id="sip_value" name="vacation_sip" value= "' . $decode['sipvalue'] . '"  readonly="true">
                </div>
              
                <div class="mb-3 col-12">
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
                  <form class = "row">
                    <input type="hidden" name="id" value="' . $id . '">  

                        <div class="mb-3 col-6">
                          <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Email</h3>
                          <input type="email" class="form-control form-control-sm" style="font-size:16px;" id="email" value= "' . $row['email'] . '" disabled readonly>
                        </div>

                        <div class="mb-3 col-6">
                          <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Goal</h3>
                          <input type="text" class="form-control form-control-sm" style="font-size:16px;text-transform: capitalize;" id="goal" value= "' . $row['goal'] . '" disabled readonly>
                        </div>

                        <div class="mb-3 col-6">
                          <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Child Name</h3>
                          <input type="text" class="form-control form-control-sm" style="font-size:16px;" id="child_name" value= "' . $decode['childname'] . '" disabled readonly>
                        </div>

                        <div class="mb-3 col-6">
                          <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Child Age</h3>
                          <input type="text" class="form-control form-control-sm" style="font-size:16px;" name="current_age" id="child_age" value= "' . $decode['currentagechild'] . '">
                        </div>
                      
                        <div class="mb-3 col-6">
                          <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Future Age</h3>
                          <input type="text" class="form-control form-control-sm" style="font-size:16px;" name="marraige_age" id="future_ageMar" value= "' . $decode['futureage'] . '">
                        </div>
                      

                        <div class="mb-3 col-6">
                          <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Inflation Rate</h3>
                          <input type="text" class="form-control form-control-sm" style="font-size:16px;" name="marriage_inflation" id="inflationMar" value= "' . $decode['inflation'] . '" >
                        </div>

                        <div class="mb-3 col-6">
                          <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Marriage Type</h3>
                          <input type="text" class="form-control form-control-sm" style="font-size:16px;" name="marrraige_type" id="marrraige_type" value= "' . $decode['mariage'] . '"readonly="true">
                        </div>

                        <div class="mb-3 col-6">
                          <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Current Cost</h3>
                          <input type="text" class="form-control form-control-sm" style="font-size:16px;" name="marriage_current" id="current_costMar" value= "' . $decode['currentcost'] . '">
                        </div>

                        <div class="mb-3 col-6">
                          <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Future Value</h3>
                          <input type="text" class="form-control form-control-sm" style="font-size:16px;" name="marraige_value" id="furture_valueMar" value= "' . $decode['ansinputs'] . '" disabled>
                        </div>

                        <div class="mb-3 col-6">
                          <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">SIP Required</h3>
                          <input type="text" class="form-control form-control-sm" style="font-size:16px;" name="marriage_sip" id="sip_valueMar" value= "' . $decode['sipvalue'] . '" disabled>
                        </div>';
      if (array_key_exists('secondchildage-mar', $decode) && array_key_exists('secondfutureage-mar', $decode) && array_key_exists('currentcost-mar', $decode) && array_key_exists('inflation-mar', $decode) && array_key_exists('sipvalueMar', $decode) && array_key_exists('ansinputsMar', $decode)) {
        $markup .= '<h4>Second</h4><div class="mb-3 col-6">
        <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;"> Second Child Name</h3>
           <input type="text" style="font-size:19px;" class="form-control form-control-sm"  value="' . $decode['secondchildname-mar'] . '" readonly="true" />
        </div>
        <div class="mb-3 col-6">
        <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Second Child Age</h3>
           <input type="number" style="font-size:19px;" class="form-control form-control-sm" id="sec_marri_age" value="' . $decode['secondchildage-mar'] . '" readonly="true" />
        </div>
        <div class="mb-3 col-6">
        <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Future Age</h3>
           <input type="number" style="font-size:19px;" class="form-control form-control-sm" id="sec_marri_future_age" value="' . $decode['secondfutureage-mar'] . '" readonly="true" />
        </div>
        <div class="mb-3 col-6">
        <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Current Cost</h3>
           <input type="number" style="font-size:19px;" class="form-control form-control-sm" id="sec_marri_current" value="' . $decode['currentcost-mar'] . '" readonly="true" />
        </div>
        <div class="mb-3 col-6">
        <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Future Value</h3>
           <input type="number" style="font-size:19px;" class="form-control form-control-sm" id="sec_marri_future" value="' . $decode['ansinputsMar'] . '" readonly="true" />
        </div>
        <div class="mb-3 col-6">
        <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Future Inflation</h3>
           <input type="number" style="font-size:19px;" class="form-control form-control-sm" id="sec_marri_inflation" value="' . $decode['inflation-mar'] . '" readonly="true" />
        </div>
        <div class="mb-3 col-6">
        <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">SIP Required</h3>
           <input type="number" style="font-size:19px;" class="form-control form-control-sm" id="sec_marri_sip" value="' . $decode['sipvalueMar'] . '" readonly="true" />
        </div>';
      }

      $markup .= ' <div class="col-md-8">
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
              <form class="row" id="retirement_form">
                <input type="hidden" name="id" value="' . $id . '">  

                  <div class="mb-3 col-6">
                    <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Email</h3>
                    <input type="email" class="form-control form-control-sm"style="font-size:16px" id="email" value= "' . $row['email'] . '" disabled readonly>
                  </div>

                    <div class="mb-3 col-6">
                    <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Goal</h3>
                      <input type="text" class="form-control form-control-sm" style="font-size:16px;text-transform: capitalize;" id="goal" value= "' . $row['goal'] . '" disabled readonly>
                    </div>

                    <div class="mb-3 col-6">
                        <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Current Age</h3>
                      <input type="text" class="form-control form-control-sm" style="font-size:16px;" id="present_age" value= "' . $decode['currentage'] . '" disabled readonly>
                    </div>

                  <div class="mb-3 col-6">
                    <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Retirement Age</h3>
                    <input type="text" class="form-control form-control-sm" style="font-size:16px;" name="retire_age" id="retirement_age" value= "' . $decode['retirementage'] . '">
                  </div>

                  <div class="mb-3 col-6">
                    <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Rate of Return After Retirement</h3>
                    <input type="text" class="form-control form-control-sm" style="font-size:16px;" name="retire_rate" id="rateofRet" value= "' . $decode['rateretire'] . '" >
                  </div>

                    <div class="mb-3 col-6">
                      <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Life Expectancy</h3>
                      <input type="text" class="form-control form-control-sm" style="font-size:16px;" name="retire_exp" id="lifeexp" value= "' . $decode['lifeexp'] . '">
                    </div>
                    <div class="mb-3 col-6">
                      <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Monthly Expenses</h3>
                      <input type="text" class="form-control form-control-sm" style="font-size:16px;" name="retire_expense" id="monthlyexp" value= "' . $decode['monthlyexp'] . '">
                    </div>
                  
                    <div class="mb-3 col-6">
                      <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Inflation Rate</h3>
                      <input type="text" class="form-control form-control-sm" style="font-size:16px;" name="retire_inflation" id="inflationRet" value= "' . $decode['inflation'] . '">
                    </div>

                    <div class="mb-3 col-6">
                      <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Future Value</h3>
                      <input type="text" class="form-control form-control-sm" style="font-size:16px;" name="retire_value" id="furture_valueRet" value= "' . $decode['ansinputs'] . '" disabled>
                    </div>
                    <div class="mb-3 col-6">
                      <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">SIP Required</h3>            
                      <input type="text" class="form-control form-control-sm" style="font-size:16px;" name="retire_sip" id="sip_valueRet" value= "' . $decode['sipvalue'] . '" disabled>
                    </div>
                    <div class="col-md-8">
                      <button class = "mt-3 btn btn-primary btn-sm" id="updation">Update</button>
                      <button class = "mt-3 btn btn-success btn-sm" id="pdf_download">PDF</button>
                      <button class = "mt-3 btn btn-danger btn-sm" id="delete">Delete</button>
                    </div>
              </form>
          </div> 
        </div>';
      echo $markup;
    }

    if ($row['goal'] == 'others') {
      $markup = '
      <div class="container">
      <div class="card">
      <div class="card-body">

      <form class="row" id="others_form">
            <input type="hidden" name="id" value="' . $id . '">  
              <div class="mb-3 col-6">
                <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Email</h3>
                <input type="email" class="form-control form-control-sm" style="font-size:16px;" id="email" value= "' . $row['email'] . '" disabled readonly>
              </div>

              <div class="mb-3 col-6">
                <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Goal</h3>
                <input type="text" class="form-control form-control-sm" id="goal" style="font-size:16px;text-transform: capitalize;" value= "' . $row['goal'] . '" disabled readonly>
              </div>

              <div class="mb-3 col-6">
                <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Goal you want to Achieve</h3>
                <input type="text" class="form-control form-control-sm" style="font-size:16px;" id="goalname" value= "' . $decode['goalname'] . '" disabled readonly>
              </div>

              <div class="mb-3 col-6">
                <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Future Year</h3>
                <input type="text" class="form-control form-control-sm" style="font-size:16px;" name="other_future" id="future_yearOther" value= "' . $decode['futureage'] . '">
              </div>

              <div class="mb-3 col-6">
                <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Current Cost</h3>
                <input type="text" class="form-control form-control-sm" style="font-size:16px;" name="other_current" id="current_costOther" value= "' . $decode['currentcost'] . '" >
              </div>
                <div class="mb-3 col-6">
                <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Expected Inflation</h3>
                <input type="text" class="form-control form-control-sm" style="font-size:16px;" name="other_inflation" id="inflation_other" value= "' . $decode['inflation'] . '">
              </div>
              <div class="mb-3 col-6">
                <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">Future Value</h3>
                <input type="text" class="form-control form-control-sm" style="font-size:16px;" name="other_value" id="furture_valueother" value= "' . $decode['ansinputs'] . '" disabled>
              </div>
              <div class="mb-3 col-6">
                <h3 style="background-color: gray;text-align:center;padding:6px;border-radius:5px;padding:6px;border-radius:5px;color:white; border: 1px solid black;font-size:22px;">SIP Value</h3>
                <input type="text" class="form-control form-control-sm" style="font-size:16px;" name="other_sip" id="sip_valueOther" value= "' . $decode['sipvalue'] . '" disabled> 
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

if (isset($_POST['showId'])) {
  $id = $_POST['showId'];
  $sql = "SELECT * FROM `user_goal` WHERE `id`=$id";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $show_decode = json_decode($row['goal_data'], true);
    if ($row['goal'] == "car") {
      $markup = '<div class="card "><div class="card-body ">
<h6 class="bg-secondary text-white rounded p-2">Goal</h6>
 <p class="fs-6 ">Your Goal :- <span class="text-primary">' . $row['goal'] . '</span></p>
 <h6 class="bg-secondary text-white rounded p-2"> Car Details</h6>
 <p class="fs-6 ">Name Of Car :- <span class="text-primary">' . $show_decode['carname'] . '</span></p>
 <h6 class="bg-secondary text-white rounded p-2">Valuation Details</h6>
 <p class="fs-6 ">Current Cost of Car :- <span class="text-primary">' . $show_decode['current'] . '</span></p>
 <p class="fs-6 ">Time Horizon (In Years) :- <span class="text-primary">' . $show_decode['futureyear'] . '</span></p>
 <p class="fs-6 ">Inflation :- <span class="text-primary">' . $show_decode['inflacar'] . '</span></p>
 <p class="fs-6 ">Future Value :- <span class="text-primary">' . $show_decode['ansinputs'] . '</span></p>
 <p class="fs-6 ">Sip Value :- <span class="text-primary">' . $show_decode['sipvalue'] . '</span></p>
 </div></div>';
      echo $markup;
    }
    if ($row['goal'] == "vacation") {
      $markup = '<div class="card"><div class="card-body ">
<h6 class="bg-secondary text-white rounded p-2">Goal</h6>
 <p class="fs-6 ">Your Goal :- <span class="text-primary">' . $row['goal'] . '</span></p>
 <h6 class="bg-secondary text-white rounded p-2"> Vacation Details</h6>
 <p class="fs-6 ">Vacation City :- <span class="text-primary">' . $show_decode['vacationplace'] . '</span></p>
 <h6 class="bg-secondary text-white rounded p-2">Valuation Details</h6>
 <p class="fs-6 ">Current Cost of Vacation :- <span class="text-primary">' . $show_decode['current'] . '</span></p>
 <p class="fs-6 ">Time Horizon (In Years) :- <span class="text-primary">' . $show_decode['futureyear'] . '</span></p>
 <p class="fs-6 ">Inflation :- <span class="text-primary">' . $show_decode['infla'] . '</span></p>
 <p class="fs-6 ">Future Value :- <span class="text-primary">' . $show_decode['ansinputs'] . '</span></p>
 <p class="fs-6 ">Sip Value :- <span class="text-primary">' . $show_decode['sipvalue'] . '</span></p>
 </div></div>';
      echo $markup;
    }
    if ($row['goal'] == "house") {
      $markup = '<div class="card"><div class="card-body ">
<h6 class="bg-secondary text-white rounded p-2">Goal</h6>
 <p class="fs-6 ">Your Goal :- <span class="text-primary">' . $row['goal'] . '</span></p>
 <h6 class="bg-secondary text-white rounded p-2">House Details</h6>
 <p class="fs-6 ">House City :- <span class="text-primary">' . $show_decode['city'] . '</span></p>
 <h6 class="bg-secondary text-white rounded p-2">Valuation Details</h6>
 <p class="fs-6 ">Current Cost of Vacation :- <span class="text-primary">' . $show_decode['currentcost'] . '</span></p>
 <p class="fs-6 ">Time Horizon (In Years) :- <span class="text-primary">' . $show_decode['futureage'] . '</span></p>
 <p class="fs-6 ">Inflation :- <span class="text-primary">' . $show_decode['inflation'] . '</span></p>
 <p class="fs-6 ">Future Value :- <span class="text-primary">' . $show_decode['ansinputs'] . '</span></p>
 <p class="fs-6 ">Sip Value :- <span class="text-primary">' . $show_decode['sipvalue'] . '</span></p>
 </div></div>';
      echo $markup;
    }
    if ($row['goal'] == "retirement") {
      $markup = '<div class="card"><div class="card-body ">
<h6 class="bg-secondary text-white rounded p-2">Goal</h6>
 <p class="fs-6 ">Your Goal :- <span class="text-primary">' . $row['goal'] . '</span></p>
 <h6 class="bg-secondary text-white rounded p-2"> Retirement Details</h6>
 <p class="fs-6 ">Current Age :- <span class="text-primary">' . $show_decode['currentage'] . '</span></p>
 <p class="fs-6 ">Retirement Age :- <span class="text-primary">' . $show_decode['retirementage'] . '</span></p>
 <p class="fs-6 ">Life Expectancy :- <span class="text-primary">' . $show_decode['lifeexp'] . '</span></p>
 <p class="fs-6 ">Monthaly Expenses :- <span class="text-primary">' . $show_decode['monthlyexp'] . '</span></p>
 <h6 class="bg-secondary text-white rounded p-2">Valuation Details</h6>
 <p class="fs-6 ">Rate of Retire :- <span class="text-primary">' . $show_decode['rateretire'] . '</span></p>
 <p class="fs-6 ">Inflation :- <span class="text-primary">' . $show_decode['inflation'] . '</span></p>
 <p class="fs-6 ">Future Value :- <span class="text-primary">' . $show_decode['ansinputs'] . '</span></p>
 <p class="fs-6 ">Sip Value :- <span class="text-primary">' . $show_decode['sipvalue'] . '</span></p>
 </div></div>';
      echo $markup;
    }
    if ($row['goal'] == "marriage") {
      $markup = '<div class="card"><div class="card-body ">
<h6 class="bg-secondary text-white rounded p-2">Goal</h6>
 <p class="fs-6 ">Your Goal :- <span class="text-primary">' . $row['goal'] . '</span></p>
 <h6 class="bg-secondary text-white rounded p-2"> Marraige Details</h6>
 <p class="fs-6 ">Child Name :- <span class="text-primary">' . $show_decode['childname'] . '</span></p>
 <p class="fs-6 ">Current Age :- <span class="text-primary">' . $show_decode['currentagechild'] . '</span></p>
 <p class="fs-6 ">Marraige Age :- <span class="text-primary">' . $show_decode['futureage'] . '</span></p>
 <p class="fs-6 ">Marraige Type :- <span class="text-primary">' . $show_decode['mariage'] . '</span></p>
 <h6 class="bg-secondary text-white rounded p-2">Valuation Details</h6>
 <p class="fs-6 ">Current Cost :- <span class="text-primary">' . $show_decode['currentcost'] . '</span></p>
 <p class="fs-6 ">Inflation :- <span class="text-primary">' . $show_decode['inflation'] . '</span></p>
 <p class="fs-6 ">Future Value :- <span class="text-primary">' . $show_decode['ansinputs'] . '</span></p>
 <p class="fs-6 ">Sip Value :- <span class="text-primary">' . $show_decode['sipvalue'] . '</span></p>';
      if (array_key_exists('secondchildage-mar', $show_decode) && array_key_exists('secondfutureage-mar', $show_decode) && array_key_exists('currentcost-mar', $show_decode) && array_key_exists('inflation-mar', $show_decode) && array_key_exists('sipvalueMar', $show_decode) && array_key_exists('ansinputsMar', $show_decode)) {
        $markup .= '<h6 class="bg-secondary text-white rounded p-2">Second Child Details</h6>
 <p class="fs-6 "> Current Age:- <span class="text-primary">' . $show_decode['secondchildage-mar'] . '</span></p>
 <p class="fs-6 ">Marriage Age :- <span class="text-primary">' . $show_decode['econdfutureage-mar'] . '</span></p>
 <p class="fs-6 ">CurrentCost :- <span class="text-primary">' . $show_decode['currentcost-mar'] . '</span></p>
 <p class="fs-6 ">Inflation :- <span class="text-primary">' . $show_decode['inflation-mar'] . '</span></p>
 <p class="fs-6 ">Future Value :- <span class="text-primary">' . $show_decode['ansinputsMar'] . '</span></p>
 <p class="fs-6 ">Sip :- <span class="text-primary">' . $show_decode['sipvalueMar'] . '</span></p>
 </div></div>';
      }
      echo $markup;
    }
    if ($row['goal'] == "education") {
      $markup = '<div class="card"><div class="card-body ">
<h6 class="bg-secondary text-white rounded p-2">Goal</h6>
 <p class="fs-6 ">Your Goal :- <span class="text-primary">' . $row['goal'] . '</span></p>
 <h6 class="bg-secondary text-white rounded p-2"> Retirement Details</h6>
 <p class="fs-6 ">Child Name :- <span class="text-primary">' . $show_decode['childname'] . '</span></p>
 <p class="fs-6 ">Current Age :- <span class="text-primary">' . $show_decode['age'] . '</span></p>
 <p class="fs-6 ">Future Age :- <span class="text-primary">' . $show_decode['futureages'] . '</span></p>
 <h6 class="bg-secondary text-white rounded p-2">Valuation Details</h6>
 <p class="fs-6 ">Current Cost :- <span class="text-primary">' . $show_decode['currentcost'] . '</span></p>
 <p class="fs-6 ">Inflation :- <span class="text-primary">' . $show_decode['inflation'] . '</span></p>
 <p class="fs-6 ">Future Value :- <span class="text-primary">' . $show_decode['ansinputs'] . '</span></p>
 <p class="fs-6 ">Sip Value :- <span class="text-primary">' . $show_decode['sipvalue'] . '</span></p>
';
      if (array_key_exists('secondchildname', $show_decode) && array_key_exists('secondchildage', $show_decode) && array_key_exists('secondfutureage', $show_decode) && array_key_exists('secondcurrentcost', $show_decode)) {
        $markup .= '<h6 class="bg-secondary text-white rounded p-2">Second Child Details</h6>
        <p class="fs-6 ">Child Name :- <span class="text-primary">' . $show_decode['secondchildname'] . '</span></p>
        <p class="fs-6 ">Current Age :- <span class="text-primary">' . $show_decode['secondchildage'] . '</span></p>
        <p class="fs-6 ">Future Age :- <span class="text-primary">' . $show_decode['secondfutureage'] . '</span></p>
        <p class="fs-6 ">Current Cost :- <span class="text-primary">' . $show_decode['secondcurrentcost'] . '</span></p>
        <p class="fs-6 ">Future Value :- <span class="text-primary">' . $show_decode['secondchildfuturevalue'] . '</span></p>
        <p class="fs-6 ">Sip Required :- <span class="text-primary">' . $show_decode['secondchildSIP'] . '</span></p>
        </div></div>';
      }
      echo $markup;
    }
  }
}
