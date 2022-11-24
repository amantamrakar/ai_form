<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ai_form";
if ($_SERVER["SERVER_NAME"] === "swarajfinpro.com" || $_SERVER["SERVER_NAME"] === "www.swarajfinpro.com") {
    $conn = mysqli_connect("localhost", "swaracom_appuser", "6]#oxA5cD3oX", "swaracom_appdb");
} else {
    $conn = mysqli_connect($servername, $username, "", $dbname);
}
// echo mysqli_error($conn);
if (!$conn) {
    die(json_encode(array("error" => "server not connect please try again later", "status" => 0)));
}

// echo "connected";


//     $name =$_POST['name'];
//     $email =$_POST['email'];
//     $password =$_POST['password'];
//     $mob = $_POST['mob'];
//     $goal_txt = $_POST['goal_txt'];
//     $childname = $_POST['childname'];
//     $invest =$_POST['invest'];
//     $sip_req = $_POST['sip'];


//   $sql ="INSERT INTO per_record (`name`,`email`,`password`,`mob`,`goal`,`childname`,`invest`,`sip_req`)
//  VALUES('$name','$email','$password','$mob','$goal_txt','$childname','$invest','$sip')";
// var_dump($_POST);

$email = $_POST['email'];
$goal = $_POST['goal'];
$_SESSION['goal'] = $goal;

$pwd = $_POST['sdata']['password'];
$pwd = password_hash($pwd, PASSWORD_BCRYPT);
$mobile = $_POST['sdata']['mobile'];
$name = $_POST['sdata']['username'];
unset($_POST['sdata']['password']);

// echo $pwd ;

if (isset($_POST['sdata'])) {
    $sgoal = json_encode($_POST['sdata']);
    $target = json_decode($sgoal, true);
    $_SESSION['data'] = $target;
}

$sql = "INSERT INTO `user_goal`( `email`, `goal`, `goal_data`) VALUES ('$email','$goal','$sgoal')";

$result =  mysqli_query($conn, $sql);

// echo mysqli_error($conn);
$reguser = "INSERT INTO `registered_user`(`full_name`, `email`, `pws`, `phone_no`,`status`)
 VALUES ('$name','$email','$pwd','$mobile','active')";

// $result =  mysqli_query($conn, $reguser);

$_SESSION['goaluser'] = $email;
$res = array();
$res["status"] = true;
echo json_encode($res);
// echo mysqli_error($conn);


// if (isset($_POST['auth'])) {
//   $loguser = "INSERT INTO `per_record` WHERE  `email` = '" . $email . "' ";
//   if ($passwords == $data["password"]) {
//     echo "match";
//     $_SESSION['authuser'] = $email;
//   } else {
//     echo "not match";
//   }

//   $result =  mysqli_query($conn, $loguser);
// }
