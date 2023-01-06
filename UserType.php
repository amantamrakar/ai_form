<?php
session_start();
require_once("./connect.php");
if(isset($_POST['type_sub']))
{
    // $email = 'pooja@gmail.com';
    $email = $_SESSION["goaluser"];
    $capacity =$_POST['capcity'];
    $willingness =$_POST['willingness'];
    $sql = "INSERT INTO `user_type`( `user_email`, `risk_capacity`, `risk_willigness`) VALUES ('$email','$capacity','$willingness')";
    $result =  mysqli_query($conn, $sql);
    if($result){
        echo "Data Saved";
    } else{
        echo "Failed";
    }
}

?>