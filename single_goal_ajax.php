<?php
session_start();
// echo phpinfo();
// die();
if ($_SERVER["SERVER_NAME"] === "swarajfinpro.in") {
  $conn = mysqli_connect("localhost", "swarajfi_softwareuser", "Qh8c.40yBBxe", "swarajfi_software");
} else {
  $conn = mysqli_connect("localhost", "root", "", "user_goal");
}
echo mysqli_error($conn);
if (!$conn) {
  die("db not connected");
}
// $sql = "UPDATE `user_goal` SET `goal_data` = '{\"carname\":\"dezire\",\"currentyear\":\"0\",\"futureyear\":\"10\",\"current\":\"1000000\",\"inflacar\":\"7\",\"ansinputs\":\"2009665\",\"sipvalue\":\"8650\",\"username\":\"swarajfinpro@gmail.com\",\"email\":\"arpit@gmail.com\",\"mobile\":\"9876543256\",\"passwords\":\"123\"}' WHERE `user_goal`.`client_id` = 17";
// $result = mysqli_query($conn, $sql);
// if ($result) {
//   // echo "hiii";
//   // die();
// }

if (isset($_POST['key'])) {
  $id = mysqli_real_escape_string($conn, $_POST['key']);
  $sql = "SELECT * FROM `user_goal` WHERE `client_id`= '$id'";
  $result = mysqli_query($conn, $sql);
  // $markup = '';
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $decode = json_decode($row['goal_data'], true);
    if ($row['goal'] == 'car') {
      $markup = '<form>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>';
    }

    if ($row['goal'] == 'vacation') {
      $markup = '
      <div class="container">
      <div class="card">
      <div class="card-body">

      <div class = row>
      <div class = "col-md-6">
      <form>
      <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control form-control-sm" id="email" value= "' . $row['email'] . '"  disabled readonly>
    </div>
      <div class="mb-3">
      <label for="goal" class="form-label">Goal</label>
      <input type="text" class="form-control form-control-sm" id="goal" value= "' . $row['goal'] . '"  disabled readonly>
    </div>
      <div class="mb-3">
      <label for="future_years" class="form-label">Future years</label>
      <input type="text" class="form-control form-control-sm" id="future_years" value= "' . $decode['futureyear'] . '">
    </div>
      <div class="mb-3">
      <label for="c_cost" class="form-label">Current Cost</label>
      <input type="text" class="form-control form-control-sm" id="c_cost" value= "' . $decode['current'] . '">
    </div>
    </div>
    <div class = "col-md-6">

      <div class="mb-3">
      <label for="in_rate"" class="form-label">Inflation Rate</label>
      <input type="text" class="form-control form-control-sm" id="in_rate" value= "' . $decode['infla'] . '">
    </div>
      <div class="mb-3">
      <label for="future_value"" class="form-label">SIP Required</label>
      <input type="text" class="form-control form-control-sm" id="future_value" value= "' . $decode['ansinputs'] . '">
    </div>
      <div class="mb-3">
      <label for="sip_value" class="form-label">Inflation Rate</label>
      <input type="text" class="form-control form-control-sm" id="sip_value" value= "' . $decode['sipvalue'] . '">
    </div>
      <div class="mb-3">
      <label for="mobile" class="form-label">Mobile</label>
      <input type="text" class="form-control form-control-sm" id="mobile" value= "' . $decode['mobile'] . '"  disabled readonly>
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
       </div> 
      
      ';
    }
    if ($row['goal'] == 'marriage') {
      $markup = '
      <div class="container">
      <div class="card">
      <div class="card-body">

      <div class = row>
      <div class = "col-md-6">
      <form>
      <div class="mb-3">
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
      <input type="text" class="form-control form-control-sm" id="child_age" value= "' . $decode['currentagechild'] . '">
    </div>
    </div>
    <div class = "col-md-6">

      <div class="mb-3">
      <label for="marrraige_type"" class="form-label">Marriage Type</label>
      <input type="text" class="form-control form-control-sm" id="marrraige_type" value= "' . $decode['mariage'] . '" disabled readonly>
    </div>
      <div class="mb-3">
      <label for="current_cost"" class="form-label">Current Cost</label>
      <input type="text" class="form-control form-control-sm" id="current_cost" value= "' . $decode['currentcost'] . '">
    </div>
      <div class="mb-3">
      <label for="furture_value" class="form-label">Future Value</label>
      <input type="text" class="form-control form-control-sm" id="furture_value" value= "' . $decode['ansinputs'] . '">
    </div>
      <div class="mb-3">
      <label for="sip_value" class="form-label">SIP Value</label>
      <input type="text" class="form-control form-control-sm" id="sip_value" value= "' . $decode['sipvalue'] . '">
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
    }
    if ($row['goal'] == 'retirement') {
      $markup = '
      <div class="container">
      <div class="card">
      <div class="card-body">

      <div class = row>
      <div class = "col-md-6">
      <form>
      <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control form-control-sm" id="email" value= "' . $row['email'] . '" disabled readonly>
    </div>
      <div class="mb-3">
      <label for="goal" class="form-label">Goal</label>
      <input type="text" class="form-control form-control-sm" id="goal" value= "' . $row['goal'] . '" disabled readonly>
    </div>
      <div class="mb-3">
      <label for="current_age" class="form-label">Current Age</label>
      <input type="text" class="form-control form-control-sm" id="current_age" value= "' . $decode['currentage'] . '" disabled readonly>
    </div>
    <div class="mb-3">
    <label for="retirement_age" class="form-label">Retirement Age </label>
    <input type="text" class="form-control form-control-sm" id="retirement_age" value= "' . $decode['retirementage'] . '">
    </div>
    <div class="mb-3">
    <label for="mobile" class="form-label">Mobile</label>
    <input type="text" class="form-control form-control-sm" id="mobile" value= "' . $decode['mobile'] . '" disabled readonly>
  </div>
    </div>
    <div class = "col-md-6">

      <div class="mb-3">
      <label for="lifeexp"" class="form-label">Life</label>
      <input type="text" class="form-control form-control-sm" id="lifeexp" value= "' . $decode['lifeexp'] . '">
    </div>
      <div class="mb-3">
      <label for="monthlyexp"" class="form-label">Monthly Expenses</label>
      <input type="text" class="form-control form-control-sm" id="monthlyexp" value= "' . $decode['monthlyexp'] . '">
    </div>
      <div class="mb-3">
      <label for="furture_value" class="form-label">Future Value</label>
      <input type="text" class="form-control form-control-sm" id="furture_value" value= "' . $decode['ansinputs'] . '">
    </div>
    <div class="mb-3">
    <label for="sip_value" class="form-label">Inflation Rate</label>
    <input type="text" class="form-control form-control-sm" id="sip_value" value= "' . $decode['inflation'] . '">
  </div>
      <div class="mb-3">
      <label for="sip_value" class="form-label">SIP Value</label>
      <input type="text" class="form-control form-control-sm" id="sip_value" value= "' . $decode['sipvalue'] . '">
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
    }
    echo $markup;
  }
}
