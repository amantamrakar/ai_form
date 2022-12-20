<?php
session_start();
require_once("./connect.php");
if(isset($_POST["get_user_data"])){
    // echo "select * from user_goal where email={$_SESSION['goaluser']}";
    $res=mysqli_query($conn,"select * from user_goal where email='{$_SESSION['goaluser']}'");
    $data=$res->fetch_all(MYSQLI_ASSOC);
    foreach($data as $key=>$d){
        $a=json_decode($d["goal_data"],true);
        $data[$key]["goal_data"]=$a;
        // var_dump($data[$key]["goal_data"]);
        if($data[$key]["goal"] == "education"){
            $data[$key]["goal_data"]["futureage"]= $data[$key]["goal_data"]["futureages"]-$data[$key]["goal_data"]["age"];
        }
        if($data[$key]["goal"] == "vacation" || ($data[$key]["goal"] == "car")){ 
            $data[$key]["goal_data"]["futureage"]= $data[$key]["goal_data"]["futureyear"];
        }
        if($data[$key]["goal"] == "retirement"){ 
            $data[$key]["goal_data"]["futureage"]= $data[$key]["goal_data"]["lifeexp"]-$data[$key]["goal_data"]["retirementage"];
        }
    
    }
    echo mysqli_error($conn);
    echo json_encode($data);
}


if(isset($_POST["add_user_fund"])){
    // var_dump($_POST["get_user_fund"]);
    parse_str($_POST["add_user_fund"],$req);
    var_dump($req);
    $email = $_SESSION["goaluser"];
    // $fundtype = $req["fund_deposit"];
    // $investment_amt = $req["fund_amt"];
    // $duration = $req["duration"];
    // $percent = $req["percent"];
    // $json = json_encode($fundtype,$investment_amt,$duration,$percent); 
    // echo($json); 
    for ($i=0; $i < count($req["fund_deposit"]) ; $i++) { 
       if (empty( $req['fund_deposit'][$i]) || empty( $req["duration"][$i]) || empty( $req["fund_amt"][$i]) || empty( $req["percent"][$i])){
      echo "Not Fill";
    }
    else{
        $sql = "INSERT INTO `user_fund`(`user_email`,`fund_type`,`duration`,`investment_amt`,`percent`) VALUES ('$email','{$req['fund_deposit'][$i]}','{$req["duration"][$i]}','{$req["fund_amt"][$i]}','{$req["percent"][$i]}')";
        $result =  mysqli_query($conn, $sql);
        echo $result; 
        echo mysqli_error($conn);
    }        }
    echo count($req);
}

