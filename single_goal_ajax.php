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
//   echo "hiii";
//   die();
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
      $markup = '   <div class="container">
      <div class="card mt-3">
        <div class="card-body">
          <form class="row">
            <div class="mb-3 col-6">
              <label for="email" class="form-label">Email</label>
              <input
                type="text"
                class="form-control form-control-sm"
                id="email"
                value="' . $row['email'] . '"
                disabled              />
            </div>
            <div class="mb-3 col-6">
              <label for="goal" class="form-label">Goal</label>
              <input
                type="text"
                class="form-control form-control-sm"
                id="goal"
                value="' . $row['goal'] . '"
                disabled
              />
            </div>
            <div class="mb-3 col-6">
              <label for="carName" class="form-label">Car Name</label>
              <input
                type="text"
                class="form-control form-control-sm"
                id="carName"
                value="' . $decode['carname'] . '"
                disabled
              />
            </div>
            <div class="mb-3 col-6">
              <label for="futureYear" class="form-label">Future Year</label>
              <input
                type="number"
                class="form-control form-control-sm"
                id="futureYear"
                value="' . $decode['futureyear'] . '"
              />
            </div>
            <div class="mb-3 col-6">
              <label for="currentCost" class="form-label">Current Cost</label>
              <input
                type="number"
                class="form-control form-control-sm"
                id="currentCost"
                value="' . $decode['current'] . '"
              />
            </div>
            <div class="mb-3 col-6">
              <label for="inflation" class="form-label">Inflation Rate</label>
              <input
                type="number"
                class="form-control form-control-sm"
                id="inflation"
                value="' . $decode['inflacar'] . '"
              />
            </div>
            <div class="mb-3 col-6">
              <label for="futureValue" class="form-label">Future Value</label>
              <input
                type="number"
                class="form-control form-control-sm"
                id="futureValue"
                value="' . $decode['ansinputs'] . '"
              />
            </div>
            <div class="mb-3 col-6">
              <label for="sipValue" class="form-label">Sip Value</label>
              <input
                type="number"
                class="form-control form-control-sm"
                id="sipValue"
                value="' . $decode['sipvalue'] . '"
              />
            </div>
            <div class="mb-3 col-6">
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
    if ($row['goal'] == 'house') {
      $markup = '   <div class="container">
      <div class="card mt-3">
        <div class="card-body">
          <form class="row">
            <div class="mb-3 col-6">
              <label for="email" class="form-label">Email</label>
              <input
                type="text"
                class="form-control form-control-sm"
                id="email"
                value="' . $row['email'] . '"
                disabled             
                 />
            </div>
            <div class="mb-3 col-6">
              <label for="goal" class="form-label">Goal</label>
              <input
                type="text"
                class="form-control form-control-sm"
                id="goal"
                value="' . $row['goal'] . '"
                disabled
              />
            </div>
            <div class="mb-3 col-6">
              <label for="carName" class="form-label">City Name</label>
              <input
                type="text"
                class="form-control form-control-sm"
                id="carName"
                value="' . $decode['city'] . '"
                disabled
              />
            </div>
            <div class="mb-3 col-6">
              <label for="futureYear" class="form-label">Future Age</label>
              <input
                type="number"
                class="form-control form-control-sm"
                id="futureYear"
                value="' . $decode['futureage'] . '"
              />
            </div>
            <div class="mb-3 col-6">
              <label for="currentCost" class="form-label">Current Cost</label>
              <input
                type="number"
                class="form-control form-control-sm"
                id="currentCost"
                value="' . $decode['currentcost'] . '"
              />
            </div>
            <div class="mb-3 col-6">
              <label for="inflation" class="form-label">Inflation Rate</label>
              <input
                type="number"
                class="form-control form-control-sm"
                id="inflation"
                value="' . $decode['inflation'] . '"
              />
            </div>
            <div class="mb-3 col-6">
              <label for="futureValue" class="form-label">Future Value</label>
              <input
                type="number"
                class="form-control form-control-sm"
                id="futureValue"
                value="' . $decode['ansinputs'] . '"
              />
            </div>
            <div class="mb-3 col-6">
              <label for="sipValue" class="form-label">Sip Value</label>
              <input
                type="number"
                class="form-control form-control-sm"
                id="sipValue"
                value="' . $decode['sipvalue'] . '"
              />
            </div>
            <div class="mb-3 col-6">
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
    if ($row['goal'] == 'education') {
      $markup = '   <div class="container">
      <div class="card mt-3">
        <div class="card-body">
          <form class="row">
            <div class="mb-3 col-6">
              <label for="email" class="form-label">Email</label>
              <input
                type="text"
                class="form-control form-control-sm"
                id="email"
                value="' . $row['email'] . '"
                disabled              />
            </div>
            <div class="mb-3 col-6">
              <label for="goal" class="form-label">Goal</label>
              <input
                type="text"
                class="form-control form-control-sm"
                id="goal"
                value="' . $row['goal'] . '"
                disabled
              />
            </div>
            <div class="mb-3 col-6">
              <label for="carName" class="form-label">Child Name</label>
              <input
                type="text"
                class="form-control form-control-sm"
                id="carName"
                value="' . $decode['childname'] . '"
                disabled
              />
            </div>
           
            <div class="mb-3 col-6">
              <label for="currentCost" class="form-label">Future Age</label>
              <input
                type="number"
                class="form-control form-control-sm"
                id="currentCost"
                value="' . $decode['futureages'] . '"
              />
            </div>
            <div class="mb-3 col-6">
              <label for="currentCost" class="form-label">Career</label>
              <input
                type="number"
                class="form-control form-control-sm"
                id="currentCost"
                value="' . $decode['carrer'] . '"
              />
            </div>
            <div class="mb-3 col-6">
              <label for="currentCost" class="form-label">Current Cost</label>
              <input
                type="number"
                class="form-control form-control-sm"
                id="currentCost"
                value="' . $decode['currentcost'] . '"
              />
            </div>
            <div class="mb-3 col-6">
              <label for="inflation" class="form-label">Inflation Rate</label>
              <input
                type="number"
                class="form-control form-control-sm"
                id="inflation"
                value="' . $decode['inflation'] . '"
              />
            </div>
            <div class="mb-3 col-6">
              <label for="futureValue" class="form-label">Future Value</label>
              <input
                type="number"
                class="form-control form-control-sm"
                id="futureValue"
                value="' . $decode['ansinputs'] . '"
              />
            </div>
            <div class="mb-3 col-6">
              <label for="sipValue" class="form-label">Sip Value</label>
              <input
                type="number"
                class="form-control form-control-sm"
                id="sipValue"
                value="' . $decode['sipvalue'] . '"
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
    }
    echo $markup;
  }
}
