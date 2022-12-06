<?php
// session_start();
require_once("./connect.php");


if (isset($_SESSION["goaluser"])) {
    $email = $_SESSION["goaluser"];
    $goal = $_POST['goal'];
    $_SESSION['goal'] = $goal;
    $sgoal = json_encode($_POST["sdata"]);
    $sql = "INSERT INTO `user_goal`( `email`, `goal`, `goal_data`) VALUES ('$email','$goal','$sgoal')";
    $result =  mysqli_query($conn, $sql);
    $res["status"] = true;
    echo json_encode($res);
}


?>