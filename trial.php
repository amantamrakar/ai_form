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
$res = array();

if (!isset($_POST["f_type"])) {
    $res["status"] = false;
    $res["message"] = "bad request";
    die(json_encode($res));
}

if ($_POST["f_type"] == "register") {

    $email = $_POST['email'];
    $goal = $_POST['goal'];
    $_SESSION['goal'] = $goal;
    $pwd = $_POST['sdata']['password'];
    $pwd = password_hash($pwd, PASSWORD_BCRYPT);
    $mobile = $_POST['sdata']['mobile'];
    $name = $_POST['sdata']['username'];
    unset($_POST['sdata']['password']);

    if (isset($_POST['sdata'])) {

        $sgoal = json_encode($_POST['sdata']);
        $target = json_decode($sgoal, true);
        $_SESSION['data'] = $target;
    }
    $datasaved = "SELECT * FROM `registered_user` WHERE email = '$email' and phone_no='$mobile'";
    $run = mysqli_query($conn, $datasaved);
    if (mysqli_num_rows($run) > 0) {
        $data = mysqli_fetch_array($run);
        $res["status"] = false;
        $res["message"] = "Duplicate Entry";
        // echo 'alert("Already have")';
        echo json_encode($res);
    } else {

        $reguser = "INSERT INTO `registered_user`(`full_name`, `email`, `pws`, `phone_no`,`status`)
                VALUES ('$name','$email','$pwd','$mobile','active')";

        $run = mysqli_query($conn, $reguser);
        // $data = mysqli_fetch_array($run);
        // echo mysqli_error($conn);
        if ($run) {
            $_SESSION['goaluser'] = $email;
            $sql = "INSERT INTO `user_goal`( `email`, `goal`, `goal_data`) VALUES ('$email','$goal','$sgoal')";
            $result =  mysqli_query($conn, $sql);
            $res["status"] = true;
            echo json_encode($res);
        } else {
            $res["status"] = true;
            $res["message"] = "invalid data";
            echo json_encode($res);
        }
    }
}





if ($_POST["f_type"] == "login") {
    $email = $_POST["email"];
    $pass = $_POST["l_pass"];

    $sql = "SELECT * from `registered_user` WHERE email = '$email'";
    // echo $sql;
    $result =  mysqli_query($conn, $sql);
    $data = $result->fetch_assoc();
    // var_dump($data);
    if ($data != null) {
        if (password_verify($pass, $data["pws"])) {
            $_SESSION["goaluser"] = $data["email"];
            echo json_encode(["status" => true]);
        } else {
            echo json_encode(["status" => false, "message" => "Invalid username and Password"]);
        }
    } else {
        echo json_encode(["status" => false, "message" => "Invalid Username"]);
    }
}







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


// if (isset($_POST["auth-sign-in"])) {
//     $req = $_POST["auth-sign-in"];
//     // $sql = "UPDATE `registered_user` SET `user_status` = 'yes' ,`last_login`='$date',`device`='$device' WHERE `registered_user`.`email` = '{$_SESSION["user"]}'";
//     // $result = mysqli_query($conn, $sql);
//     if (filter_var($req["email"], FILTER_VALIDATE_EMAIL) == false) {
//         http_response_code(401);
//         die(json_encode(["status" => false, "error" => "invalid email"]));
//     }
//     $pass = $req["p=assword"];
//     unset($req["password"]);
//     $data = get_data_by_ref("registered_user", "email,pws,full_name", $req);
//     // my_DD($data);
//     if (isset($data["error"])) {
//         http_response_code(401);
//         die(json_encode($data));
//     }
//     if (password_verify($pass, $data[0]["pws"])) {
//         // session_start();
//         $_SESSION["user"] = $data[0]["email"];
//         $_SESSION["name"] = explode(" ", $data[0]["full name"])[0];
//         setcookie(session_name(), session_id(), time() + $sessionTime, "/");
//         // my_DD($_SESSION);
//         // header("Location: 'http://localhost/swaraj%20app/appswaraj/code/'");
//         echo json_encode(["status" => true, "url" => "../main.php"]);
//     } else {
//         http_response_code(401);
//         echo json_encode(["status" => false, "error" => "invalid username and password"]);
//     }
// }

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