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
            <ins><h2 style="text-align:center;">My Dream Car</h2></ins>
            
              <label class="col-5 labels">Goal Name</label>
              <input class="col-5 mb-3" style="padding: 6px;text-align: center;text-transform: capitalize;font-size: 19px;border:none;" id="goal" value="' . $row['goal'] . '" disabled  />
           
              <label class="col-5 labels">My Car</label>
              <input class=" col-5 mb-3" style="padding: 6px;text-align: center;text-transform: capitalize;font-size: 19px;border:none;" id="carName" value="' . $decode['carname'] . '" disabled />

              <label class="col-5 labels">Future Year</label>
              <input class="col-5 mb-3 imp" type="number" name="future_car" id="futureYearcar"  name="future_car" value="' . $decode['futureyear'] . '"  />
           

              <label class="col-5 labels">Current Cost</label>
              <input class="col-5 mb-3 imp" type="number" name="car_current" id="currentCostcar" value="' . $decode['current'] . '"  />
       

              <label class="col-5 labels">Inflation Rate</label>
              <input class="col-5 mb-5 imp" type="number" name="car_inflation" id="inflationcar" value="' . $decode['inflacar'] . '" />
     

            <div class="mb-3 col-5" style="margin-left:8%;">
            <h3 class="inputans">Future Value</h3>
              <input type="text" name="car_value" class="form-control form-control-sm" style="font-size:19px;text-align: center;" id="futureValuecar" name="car_value" value="' . $decode['ansinputs'] . '" readonly="true" />
            </div>

            <div class="mb-3 col-5">
            <h3 class="inputans">SIP Required</h3>
              <input type="text" name="car_sip" class="form-control form-control-sm" style="font-size:19px;text-align: center;" name="car_sip" id="sipValuecar" value="' . $decode['sipvalue'] . '" readonly="true" />
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
          <ins><h2 style="text-align:center;">My Dream House</h2></ins>


              <label class="col-5 labels"> Goal</label>
              <input  class="col-5 imp_disabled" type="text"  id="goal" value="' . $row['goal'] . '" disabled />


      
             <label class="col-5 labels"> City Name</label>
              <input  class="col-5 mb-3 imp_disabled" type="text"  id="carName" value="' . $decode['city'] . '" disabled   />
  

       
              <label class="col-5 labels"> Future Age</label>
              <input  class="col-5 mb-3 imp" type="number"  name="house_age"id="futureYearhouse" value="' . $decode['futureage'] . '"  />
     

      
              <label class="col-5 labels"> Current Cost</label>
              <input  class="col-5 mb-3 imp" type="number"  name="house_current" id="currentCosthouse" value="' . $decode['currentcost'] . '"  />
      

       
              <label class="col-5 labels"> Inflation Rate</label>
              <input  class="col-5 mb-5 imp" type="number"  name="house_inflation" id="inflationhouse" value="' . $decode['inflation'] . '" />
          

              <div class="mb-3 col-5" style="margin-left:8%;">
                <h3 class="inputans">Future Value</h3>
                <input type="text" class="form-control form-control-sm" style="font-size:19px;text-align: center;" id="futureValuehouse" name="house_value" value="' . $decode['ansinputs'] . '" readonly="true" />
              </div>

              <div class="mb-3 col-5">
                <h3 class="inputans">SIP Requiredd</h3>
                <input type="text" style="font-size:19px;text-align: center;" class="form-control form-control-sm" id="sipValuehouse" name="house_sip" value="' . $decode['sipvalue'] . '" readonly="true" />
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

            <ins><h2 style="text-align:center;">Education Detail</h2></ins>
              
              <label class="col-5 labels">Goal Name</h3></label>
              <input type="text" class="col-5 mb-3 imp_disabled"  id="goal" value="' . $row['goal'] . '" disabled />
            
              <label class="col-5 labels">Child Name</label>
              <input type="text" class="col-5 mb-3 imp_disabled"  value="' . $decode['childname'] . '" disabled />
     
              <label class="col-5 labels">Current Age</label>
              <input type="text" class="col-5 mb-3 imp_disabled" id="currentAgeEdu" value="' . $decode['age'] . '" disabled />
             
            
              <label class="col-5 labels"> Future Age</label>
              <input type="number" class="col-5 mb-3 imp" id="futureAgeEdu" value="' . $decode['futureages'] . '" />
                  
              <label class="col-5 labels"> Career</label>
              <input type="text" class="col-5 mb-3 imp" id="carrerEdu" value="' . $decode['carrer'] . '" />
             
              <label class="col-5 labels"> Current Cost</label>
              <input type="number" class="col-5 mb-3 imp" id="currentCostEdu" value="' . $decode['currentcost'] . '" />
                       
              <label class="col-5 labels" > Inflation Rate</label>
              <input type="number" class="col-5 mb-5 imp" id="inflationEdu" value="' . $decode['inflation'] . '"  />
           

                <div class="mb-3 col-5" style="margin-left:8%;">
                  <h3 class="inputans">Future Value</h3>
                  <input type="text" style="font-size:19px;text-align: center;" class="form-control form-control-sm" id="futureValueEdu" value="' . $decode['ansinputs'] . '" readonly="true" />
                </div>

                <div class="mb-3 col-5">
                  <h3 class="inputans">SIP Requiredd</h3>
                  <input type="text" style="font-size:19px;text-align: center;" class="form-control form-control-sm" id="sipValuehouse" name="house_sip" value="' . $decode['sipvalue'] . '" readonly="true" />
                </div>';
              if (array_key_exists('secondchildname', $decode) && array_key_exists('secondchildage', $decode) && array_key_exists('secondfutureage', $decode) && array_key_exists('secondcurrentcost', $decode) && array_key_exists('secondinflation', $decode) && array_key_exists('secondchildSIP', $decode)) {
                $markup .= '<ins><h4>Second Child</h4></ins>
                <label class="col-5 labels"> Name</label>
                  <input type="text" class="col-5 mb-3 imp_disabled" id="nameEdu" value="' . $decode['secondchildname'] . '" readonly="true" />


                  <label class="col-5 labels"> Age</label>
                  <input type="number" class="col-5 mb-3 imp" id="ageEdu" value="' . $decode['secondchildage'] . '" />

                  <label class="col-5 labels">Future Age</label>
                  <input type="number" class="col-5 mb-3 imp" id="secfutureageEdu" value="' . $decode['secondfutureage'] . '" />


                  <label class="col-5 labels"> Current Cost</label>
                  <input type="text" class="col-5 mb-3 imp" id="seccurrentEdu" value="' . $decode['secondcurrentcost'] . '" />
              
            
                  <label class="col-5 labels">Future Inflation</label>
                  <input type="text" class="col-5 mb-5 imp" id="secinflationEdu" value="' . $decode['secondinflation'] . '" />
                
                  <div class="mb-3 col-5" style="margin-left:8%;">
                    <h3 class="inputans">Future Value</h3>
                    <input type="text" style="font-size:19px;text-align: center;" class="form-control form-control-sm" id="secfuturevalueEdu" value="' . $decode['secondchildfuturevalue'] . '" />
                  </div>

                  <div class="mb-3 col-5">
                    <h3 class="inputans">SIP Required</h3>
                    <input type="text" style="font-size:19px;text-align: center;" class="form-control form-control-sm" id="SIPsecond" value="' . $decode['secondchildSIP'] . '" readonly="true" />
                  </div>';
              }

                  $markup .= '  <div class="mb-3 col-6">
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
                <ins><h2 style="text-align:center;">My Vacation Planning</h2></ins>

                         
                  <label class="col-5 labels">My Goal</label>
                  <input type="text"  class="col-5 mb-3 imp_disabled" id="goal" value= "' . $row['goal'] . '"  disabled readonly>
                                
                  <label class="col-5 labels">My Dream Place</label>
                  <input type="text" class="col-5 mb-3 imp_disabled" name="dream_place" id="dream_place" value= "' . $decode['vacationplace'] . '"  disabled readonly>

                  <label class="col-5 labels">Future Year</label>
                  <input type="text" class="col-5 mb-3 imp" name="vacation_future" id="future_years" value= "' . $decode['futureyear'] . '">
                                
                  <label class="col-5 labels">Current Cost</label>
                  <input type="text" class="col-5 mb-3 imp" name="vacation_current" id="c_cost" value= "' . $decode['current'] . '">
                
                  <label class="col-5 labels">Inflation Rate</label>
                  <input type="text" class="col-5 mb-5 imp" id="in_rate" name="vacation_inflation" value= "' . $decode['infla'] . '">
                

                <div class="mb-3 col-5" style="margin-left:8%;">
                <h3 class="inputans">Future Cost</h3>
                  <input type="text" style="font-size:19px;text-align: center;" class="form-control form-control-sm" id="future_value"  name="vacation_value"value= "' . $decode['ansinputs'] . '"readonly="true"> 
                </div>

                <div class="mb-3 col-5">
                <h3 class="inputans">SIP Required</h3>
                  <input type="text" style="font-size:19px;text-align: center;" class="form-control form-control-sm" id="sip_value" name="vacation_sip" value= "' . $decode['sipvalue'] . '"  readonly="true">
                </div>
              
                <div class="mb-3 col-6">
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
                    <ins><h2 style="text-align:center;">My Dream Marriage</h2></ins>

                        
                    <label class="col-5 labels">My Goal</label>
                    <input type="text" class="col-5 mb-3 imp_disabled" id="goal" value= "' . $row['goal'] . '" disabled readonly>
                        

                        
                    <label class="col-5 labels">Child Name</label>
                          <input type="text" class="col-5 mb-3 imp_disabled" id="child_name" value= "' . $decode['childname'] . '" disabled readonly>
                        

                        
                          <label class="col-5 labels">Child Age</label>
                          <input type="text" class="col-5 mb-3 imp" name="current_age" id="child_age" value= "' . $decode['currentagechild'] . '">
                        
                      
                        
                          <label class="col-5 labels">Future Age</label>
                          <input type="text" class="col-5 mb-3 imp" name="marraige_age" id="future_ageMar" value= "' . $decode['futureage'] . '">
                        
                      

                        
                        
                          <label class="col-5 labels">Marriage Type</label>
                          <input type="text" class="col-5 mb-3 imp" name="marrraige_type" id="marrraige_type" value= "' . $decode['mariage'] . '"readonly="true">
                       

                        
                          <label class="col-5 labels">Current Cost</label>
                          <input type="text" class="col-5 mb-3 imp" name="marriage_current" id="current_costMar" value= "' . $decode['currentcost'] . '">
                       

                        <label class="col-5 labels">Inflation Rate</label>
                        <input type="text" class="col-5 mb-5 imp" name="marriage_inflation" id="inflationMar" value= "' . $decode['inflation'] . '" >
                      

                        <div class="mb-3 col-5" style="margin-left:8%;">
                          <h3 class="inputans">Future Value</h3>
                          <input type="text" style="font-size:19px;text-align: center;" class="form-control form-control-sm mb-3" name="marraige_value" id="furture_valueMar" value= "' . $decode['ansinputs'] . '" disabled>
                        </div>

                        <div class="mb-3 col-5">
                          <h3 class="inputans">SIP Required</h3>
                          <input type="text" style="font-size:19px;text-align: center;" class="form-control form-control-sm mb-3" name="marriage_sip" id="sip_valueMar" value= "' . $decode['sipvalue'] . '" disabled>
                        </div>';
      if (array_key_exists('secondchildage-mar', $decode) && array_key_exists('secondfutureage-mar', $decode) && array_key_exists('currentcost-mar', $decode) && array_key_exists('inflation-mar', $decode) && array_key_exists('sipvalueMar', $decode) && array_key_exists('ansinputsMar', $decode) && array_key_exists('mariagetype', $decode)) {
        $markup .= '<ins><h4>Second Child</h4></ins><br>
       
           <label class="col-5 labels"> Second Child Name</label>
           <input type="text"  class="col-5 mb-3 imp_disabled"  value="' . $decode['secondchildname-mar'] . '" readonly="true" />
       
       
           <label class="col-5 labels">Second Child Age</label>
           <input type="number" class="col-5 mb-3 imp" id="sec_marri_age" value="' . $decode['secondchildage-mar'] . '" readonly="true" />
       
           <label class="col-5 mb-3 labels">Marriage Type of second child</label>
           <input type="text" class="col-5 mb-3 imp" class="form-control form-control-sm" id="sec_marri_martype" value="' . $decode['mariagetype'] . '" readonly="true" />
       
           <label class="col-5 labels">Future Age</label>
           <input type="number" class="col-5 mb-3 imp" id="sec_marri_future_age" value="' . $decode['secondfutureage-mar'] . '" />
      
           
        <label class="col-5 labels">Current Cost</label>
           <input type="number" class="col-5 mb-3 imp" id="sec_marri_current" value="' . $decode['currentcost-mar'] . '" />
       
       
        <label class="col-5 labels">Future Inflation</label>
           <input type="number" class="col-5 mb-5 imp" id="sec_marri_inflation" value="' . $decode['inflation-mar'] . '" />
       
        <div class="mb-3 col-5" style="margin-left:8%;">
         <h3 class="inputans">Future Value</h3>
           <input type="text" style="font-size:19px;text-align: center;" class="form-control form-control-sm" id="sec_marri_future" value="' . $decode['ansinputsMar'] . '" readonly="true" />
        </div>

        <div class="mb-3 col-5">
         <h3 class="inputans">SIP Required</h3>
           <input type="text" style="font-size:19px;text-align: center;" class="form-control form-control-sm" id="sec_marri_sip" value="' . $decode['sipvalueMar'] . '" readonly="true" />
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
                <ins><h2 style="text-align:center;">My Retirement</h2></ins>
                    
                    <label class="col-5 labels">My Goal</label>
                      <input type="text" class="col-5 mb-3 imp_disabled" id="goal" value= "' . $row['goal'] . '" disabled readonly>
                    

                    
                        <label class="col-5 labels">Current Age</label>
                      <input type="text" class="col-5 mb-3 imp" id="present_age" value= "' . $decode['currentage'] . '">
                    

                  
                    <label class="col-5 labels">Retirement Age</label>
                    <input type="text" class="col-5 mb-3 imp" name="retire_age" id="retirement_age" value= "' . $decode['retirementage'] . '">
                  

                  
                    <label class="col-5 mb-3 labels">Rate of Return After Retirement</label>
                    <input type="text" class="col-5 mb-3 imp" name="retire_rate" id="rateofRet" value= "' . $decode['rateretire'] . '" >
                  

                    
                      <label class="col-5 labels">Life Expectancy</label>
                      <input type="text" class="col-5 mb-3 imp" name="retire_exp" id="lifeexp" value= "' . $decode['lifeexp'] . '">
                    
                    
                       <label class="col-5 labels">Monthly Expenses</label>
                      <input type="text" class="col-5 mb-3 imp" name="retire_expense" id="monthlyexp" value= "' . $decode['monthlyexp'] . '">
                    
                  
                    
                       <label class="col-5 labels">Inflation Rate</label>
                      <input type="text" class="col-5 mb-5 imp" name="retire_inflation" id="inflationRet" value= "' . $decode['inflation'] . '">
                    

                    <div class="mb-3 col-5" style="margin-left:8%;">
                      <h3 class="inputans"> Future Value</h3>
                      <input type="text" class="form-control form-control-sm" style="font-size:19px;text-align: center;" name="retire_value" id="furture_valueRet" value= "' . $decode['ansinputs'] . '" disabled>
                    </div>

                    <div class="mb-3 col-5">
                      <h3 class="inputans"> SIP Required</h3>            
                      <input type="text" class="form-control form-control-sm" style="font-size:19px;text-align: center;" name="retire_sip" id="sip_valueRet" value= "' . $decode['sipvalue'] . '" disabled>
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
      $markup = '<div class="card "><div class="card-body" style="border:1px solid #232366;">
      <ins><h3 style="text-align:center;">Our Finscription</h3></ins>
      <p class="fs-6 "><span class="text-primary">' . $_SESSION["user_full_name"] . '</span></p>
      <h5 class="text-white rounded p-0" style="background-color: #232366;text-align: center;">Goal Details</h5>
      <p class="fs-6 ">Goal Name:- My <span class="text-primary">' . $row['goal'] . '</span></p>
      <p class="fs-6 ">Years to Achieve :- <span class="text-primary">' . $show_decode['futureyear'] . '</span></p>
      <h5 class="text-white rounded p-0" style="background-color: #232366;text-align: center;"> Your input about Car</h5>
      <p class="fs-6 ">Name Of Car :- <span class="text-primary">' . $show_decode['carname'] . '</span></p>
      <p class="fs-6 ">Current Cost of Car :- <span class="text-primary">' . $show_decode['current'] . '</span></p>
      <p class="fs-6 ">Inflation :- <span class="text-primary">' . $show_decode['inflacar'] . '</span></p>
      <h5 class="text-white rounded p-0" style="background-color: #232366;text-align: center;">Result</h5>
      <p class=" " style="font-size:21px;">You need to Acumulate :- ₹<span class="text-primary">' . $show_decode['ansinputs'] . '</span></p>
      <p class=" " style="font-size:21px;">To achieve your Goal Start SIP of :- ₹<span class="text-primary">' . $show_decode['sipvalue'] . '</span></p>
      <p style="font-size:16px;text-align:center;">Worried About the <b>NUMBERS ?</b> <br> Please Don"t be <br>  <b>Contact Us:- 9999999999</b> </p>
      </div></div>';
      echo $markup;
    }
    if ($row['goal'] == "vacation") {
      $markup = '<div class="card"><div class="card-body " style="border:1px solid #232366;">
      <ins><h3 style="text-align:center;">Our Finscription</h3></ins>
      <p class="fs-6 "><span class="text-primary">' . $_SESSION["user_full_name"] . '</span></p>
      <h5 class="text-white rounded p-0" style="background-color: #232366;text-align: center;">Goal Details</h5>
      <p class="fs-6 ">Goal Name :-My <span class="text-primary">' . $row['goal'] . '</span></p>
      <p class="fs-6 ">Vacation City :- <span class="text-primary" style="text-transform:capitalize;">' . $show_decode['vacationplace'] . '</span></p>
      <h5 class="text-white rounded p-0" style="background-color: #232366;text-align: center;"> Vacation Details</h5>
      <p class="fs-6 ">Current Cost of Vacation :- <span class="text-primary">' . $show_decode['current'] . '</span></p>
      <p class="fs-6 ">Years To Achieve :- <span class="text-primary">' . $show_decode['futureyear'] . '</span></p>
      <p class="fs-6 ">Inflation :- <span class="text-primary">' . $show_decode['infla'] . '</span></p>
      <h5 class="text-white rounded p-0" style="background-color: #232366;text-align: center;">Result</h5>
      <p class=" " style="font-size:21px;">You need to Acumulate :- ₹<span class="text-primary">' . $show_decode['ansinputs'] . '</span></p>
      <p class=" " style="font-size:21px;">To achieve your Goal Start SIP of :- ₹<span class="text-primary">' . $show_decode['sipvalue'] . '</span></p>
      <p style="font-size:16px;text-align:center;">Worried About the <b>NUMBERS ?</b> <br> Please Don"t be <br>  <b>Contact Us:- 9999999999</b> </p>

      </div></div>';
      echo $markup;
    }
    if ($row['goal'] == "house") {
      $markup = '<div class="card"><div class="card-body " style="border:1px solid #232366;">
      <ins><h3 style="text-align:center;">Our Finscription</h3></ins>
      <p class="fs-6 "><span class="text-primary">' . $_SESSION["user_full_name"] . '</span></p>
      <h5 class="text-white rounded p-0" style="background-color: #232366;text-align: center;">Goal Details</h5>
      <p class="fs-6 ">Goal Name:-My <span class="text-primary">' . $row['goal'] . '</span></p>
      <p class="fs-6 ">House City :- <span class="text-primary" style="text-transform: capitalize;">' . $show_decode['city'] . '</span></p>
      <h5 class="text-white rounded p-0" style="background-color: #232366;text-align: center;">House Details</h5>
      <p class="fs-6 ">Current Cost of House :- <span class="text-primary">' . $show_decode['currentcost'] . '</span></p>
      <p class="fs-6 ">Years to Achieve :- <span class="text-primary">' . $show_decode['futureage'] . '</span></p>
      <p class="fs-6 ">Inflation :- <span class="text-primary">' . $show_decode['inflation'] . '</span></p>
      <h5 class="text-white rounded p-0" style="background-color: #232366;text-align: center;">Result</h5>
      <p class=" " style="font-size:21px;">You need to Acumulate :- ₹<span class="text-primary">' . $show_decode['ansinputs'] . '</span></p>
      <p class=" " style="font-size:21px;">To achieve your Goal Start SIP of :- ₹<span class="text-primary">' . $show_decode['sipvalue'] . '</span></p>
      <p style="font-size:16px;text-align:center;">Worried About the <b>NUMBERS ?</b> <br> Please Don"t be <br>  <b>Contact Us:- 9999999999</b> </p>

      </div></div>';
      echo $markup;
    }
    if ($row['goal'] == "retirement") {
      $markup = '<div class="card"><div class="card-body " style="border:1px solid #232366;">
      <ins><h3 style="text-align:center;">Our Finscription</h3></ins>
      <p class="fs-6 "><span class="text-primary">' . $_SESSION["user_full_name"] . '</span></p>
      <h5 class="text-white rounded p-0" style="background-color: #232366;text-align: center;">Goal Details</h5>
      <p class="fs-6 ">Goal Name:-My <span class="text-primary">' . $row['goal'] . '</span></p>
      <h5 class="text-white rounded p-0" style="background-color: #232366;text-align: center;">House Details</h5>
      <p class="fs-6 ">Current Age :- <span class="text-primary">' . $show_decode['currentage'] . '</span></p>
      <p class="fs-6 ">Retirement Age :- <span class="text-primary">' . $show_decode['retirementage'] . '</span></p>
      <p class="fs-6 ">Life Expectancy :- <span class="text-primary">' . $show_decode['lifeexp'] . '</span></p>
      <p class="fs-6 ">Monthaly Expenses :- <span class="text-primary">' . $show_decode['monthlyexp'] . '</span></p>
      <p class="fs-6 ">Rate of Retire :- <span class="text-primary">' . $show_decode['rateretire'] . '</span></p>
      <p class="fs-6 ">Inflation :- <span class="text-primary">' . $show_decode['inflation'] . '</span></p>
      <h5 class="text-white rounded p-0" style="background-color: #232366;text-align: center;">Result</h5>
      <p style="font-size:21px;">You need to Acumulate :- ₹<span class="text-primary">' . $show_decode['ansinputs'] . '</span></p>
      <p class=" " style="font-size:21px;">To achieve your Goal Start SIP of :- ₹<span class="text-primary">' . $show_decode['sipvalue'] . '</span></p>
      <p style="font-size:16px;text-align:center;">Worried About the <b>NUMBERS ?</b> <br> Please Don"t be <br>  <b>Contact Us:- 9999999999</b> </p>

      </div></div>';
      echo $markup;
    }
    if ($row['goal'] == "marriage") {
      $markup = '<div class="card"><div class="card-body" style="border:1px solid #232366;">
      <ins><h3 style="text-align:center;">Our Finscription</h3></ins>
      <p class="fs-6 "><span class="text-primary">' . $_SESSION["user_full_name"] . '</span></p>
      <h5 class="text-white rounded p-0" style="background-color: #232366;text-align: center;">Goal Details</h5>
        <p class="fs-6 ">Goal Name:- <span class="text-primary">' . $row['goal'] . '</span></p>
        <h5 class="text-white rounded p-0" style="background-color: #232366;text-align: center;">Marriage Details</h5>
        <p class="fs-6 ">Child Name :- <span class="text-primary">' . $show_decode['childname'] . '</span></p>
        <p class="fs-6 ">Current Age :- <span class="text-primary">' . $show_decode['currentagechild'] . '</span></p>
        <p class="fs-6 ">Marraige Age :- <span class="text-primary">' . $show_decode['futureage'] . '</span></p>
        <p class="fs-6 ">Marraige Type :- <span class="text-primary">' . $show_decode['mariage'] . '</span></p>
        <p class="fs-6 ">Current Cost :- <span class="text-primary">' . $show_decode['currentcost'] . '</span></p>
        <p class="fs-6 ">Inflation :- <span class="text-primary">' . $show_decode['inflation'] . '</span></p>
        <h5 class="text-white rounded p-0" style="background-color: #232366;text-align: center;">Result</h5>
        <p style="font-size:21px;">You need to Acumulate :- ₹<span class="text-primary">' . $show_decode['ansinputs'] . '</span></p>
        <p style="font-size:21px;">To achieve your Goal Start SIP of :- ₹<span class="text-primary">' . $show_decode['sipvalue'] . '</span></p>
        <p style="font-size:16px;text-align:center;">Worried About the <b>NUMBERS ?</b> <br> Please Don"t be <br>  <b>Contact Us:- 9999999999</b> </p>';

          if (array_key_exists('secondchildage-mar', $show_decode) && array_key_exists('secondfutureage-mar', $show_decode) && array_key_exists('currentcost-mar', $show_decode) && array_key_exists('inflation-mar', $show_decode) && array_key_exists('sipvalueMar', $show_decode) && array_key_exists('ansinputsMar', $show_decode)) {
            $markup .= '<h5 class="bg-secondary rounded p-0" style="background-color: #232366;text-align: center;">Second Child Details</h5>
            <h5 class="text-white rounded p-0" style="background-color: #232366;text-align: center;">Goal Details</h5>
            <p class="fs-6 "> Current Age:- <span class="text-primary">' . $show_decode['secondchildage-mar'] . '</span></p>
            <p class="fs-6 ">Marriage Age :- <span class="text-primary">' . $show_decode['secondfutureage-mar'] . '</span></p>
            <p class="fs-6 ">CurrentCost :- <span class="text-primary">' . $show_decode['currentcost-mar'] . '</span></p>
            <p class="fs-6 ">Inflation :- <span class="text-primary">' . $show_decode['inflation-mar'] . '</span></p>
            <h5 class="text-white rounded p-0" style="background-color: #232366;text-align: center;">Result</h5>
            <p style="font-size:21px;">You need to Acumulate :- ₹<span class="text-primary">' . $show_decode['ansinputsMar'] . '</span></p>
            <p style="font-size:21px;">To achieve your Goal Start SIP of :- ₹<span class="text-primary">' . $show_decode['sipvalueMar'] . '</span></p>
            <p style="font-size:16px;text-align:center;">Worried About the <b>NUMBERS ?</b> <br> Please Don"t be <br>  <b>Contact Us:- 9999999999</b> </p>

            </div></div>';
            }
            echo $markup;
    }
    if ($row['goal'] == "education") {
      $markup = '<div class="card"><div class="card-body " style="border:1px solid #232366;">
      <ins><h3 style="text-align:center;">Our Finscription</h3></ins>
      <p class="fs-6 "><span class="text-primary">' . $_SESSION["user_full_name"] . '</span></p>
      <h5 class="text-white rounded p-0" style="background-color: #232366;text-align: center;">Goal Details</h5>
      <p class="fs-6 ">Goal Name:-My <span class="text-primary">' . $row['goal'] . '</span></p>
     <h5 class="text-white rounded p-0" style="background-color: #232366;text-align: center;"> Retirement Details</h5>
      <p class="fs-6 ">Child Name :- <span class="text-primary">' . $show_decode['childname'] . '</span></p>
      <p class="fs-6 ">Current Age :- <span class="text-primary">' . $show_decode['age'] . '</span></p>
      <p class="fs-6 ">Future Age :- <span class="text-primary">' . $show_decode['futureages'] . '</span></p>
      <p class="fs-6 ">Current Cost :- <span class="text-primary">' . $show_decode['currentcost'] . '</span></p>
      <p class="fs-6 ">Inflation :- <span class="text-primary">' . $show_decode['inflation'] . '</span></p>
      <h5 class="text-white rounded p-0" style="background-color: #232366;text-align: center;">Result</h5>
      <p style="font-size:21px;">You need to Acumulate :- ₹<span class="text-primary">' . $show_decode['ansinputs'] . '</span></p>
      <p style="font-size:21px;">To achieve your Goal Start SIP of :- ₹<span class="text-primary">' . $show_decode['sipvalue'] . '</span></p>
      <p style="font-size:16px;text-align:center;">Worried About the <b>NUMBERS ?</b> <br> Please Don"t be <br>  <b>Contact Us:- 9999999999</b> </p>

      ';
      if (array_key_exists('secondchildname', $show_decode) && array_key_exists('secondchildage', $show_decode) && array_key_exists('secondfutureage', $show_decode) && array_key_exists('secondcurrentcost', $show_decode)) {
        $markup .= '<h5 class="bg-secondary rounded p-0" style="background-color: #232366;text-align: center;">Second Child Details</h5>
        <h5 class="text-white rounded p-0" style="background-color: #232366;text-align: center;">Goal Details</h5>
        <p class="fs-6 ">Child Name :- <span class="text-primary">' . $show_decode['secondchildname'] . '</span></p>
        <p class="fs-6 ">Current Age :- <span class="text-primary">' . $show_decode['secondchildage'] . '</span></p>
        <p class="fs-6 ">Future Age :- <span class="text-primary">' . $show_decode['secondfutureage'] . '</span></p>
        <p class="fs-6 ">Current Cost :- <span class="text-primary">' . $show_decode['secondcurrentcost'] . '</span></p>
        <p style="font-size:21px;">You need to Acumulate :- ₹<span class="text-primary">' . $show_decode['secondchildfuturevalue'] . '</span></p>
        <p style="font-size:21px;">To achieve your Goal Start SIP of :- ₹<span class="text-primary">' . $show_decode['SIPsecond'] . '</span></p>
        <p style="font-size:16px;text-align:center;">Worried About the <b>NUMBERS ?</b> <br> Please Don"t be <br>  <b>Contact Us:- 9999999999</b> </p>

        </div></div>';
      }
      echo $markup;
    }
    if ($row['goal'] == "others") {
      $markup = '<div class="card"><div class="card-body " style="border:1px solid #232366;">
      <ins><h3 style="text-align:center;">Our Finscription</h3></ins>
      <p class="fs-6 "><span class="text-primary">' . $_SESSION["user_full_name"] . '</span></p>
      <h5 class="text-white rounded p-0" style="background-color: #232366;text-align: center;">Goal Details</h5>
      <p class="fs-6 ">Goal Name:- <span class="text-primary">' . $show_decode['goalname'] . '</span></p>
      <h5 class="text-white rounded p-0" style="background-color: #232366;text-align: center;">Other Details</h5>
      <p class="fs-6 ">Current Cost of your Goal :- <span class="text-primary">' . $show_decode['currentcost'] . '</span></p>
      <p class="fs-6 ">How many time you want to achieve :- <span class="text-primary">' . $show_decode['futureage'] . '</span></p>
      <p class="fs-6 ">Inflation :- <span class="text-primary">' . $show_decode['inflation'] . '</span></p>
      <h5 class="text-white rounded p-0" style="background-color: #232366;text-align: center;">Result</h5>
      <p  style="font-size:21px;">You need to Acumulate :- ₹<span class="text-primary">' . $show_decode['ansinputs'] . '</span></p>
      <p style="font-size:21px;">To achieve your Goal Start SIP of :- ₹<span class="text-primary">' . $show_decode['sipvalue'] . '</span></p>
      <p style="font-size:16px;text-align:center;">Worried About the <b>NUMBERS ?</b> <br> Please Don"t be <br>  <b>Contact Us:- 9999999999</b> </p>

      </div></div>';
            echo $markup;
    }
  }
}
