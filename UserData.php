<?php
session_start();
require_once("./connect.php");
if(isset($_POST["get_user_data"])){
    // echo "select * from user_goal where email={$_SESSION['goaluser']}";
    $res=mysqli_query($conn,"select * from user_goal where email='{$_SESSION['goaluser']}'");
    $data=$res->fetch_all(MYSQLI_ASSOC);
    foreach($data as $key=>$d){
        $a=json_decode($d["goal_data"]);
        $data[$key]["goal_data"]=$a;
    }
    echo json_encode($data);
}
?>