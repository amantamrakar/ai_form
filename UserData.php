<?php
session_start();
require_once("./connect.php");

if (isset($_POST["get_user_fund"])) {
    $sql = "SELECT * FROM `user_fund` where user_email='{$_SESSION['goaluser']}'";
    $result = mysqli_query($conn, $sql) or die("Query Failed");
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // while( $row = mysqli_fetch_array($result)){
    //     echo $row['duration'] . " " . $row['investment_amt'] . " " . $row['percent']. "<br>";
    // }
    $data = array_map(function ($e) {
        $e["allocate_goals"] = json_decode($e["allocate_goals"], true);
        return $e;
    }, $data);
    echo json_encode(array('statue' => true, 'data' => $data));
}
if (isset($_POST["get_user_data"])) {
    // echo "select * from user_goal where email={$_SESSION['goaluser']}";
    $res = mysqli_query($conn, "select `email`,`goal`,`goal_data`,`id`,`plan_lumpsum`,`plan_sip` from user_goal where email='{$_SESSION['goaluser']}'");
    $data = $res->fetch_all(MYSQLI_ASSOC);
    foreach ($data as $key => $d) {
        $a = json_decode($d["goal_data"], true);
        $data[$key]["goal_data"] = $a;
        // var_dump($data[$key]["goal_data"]);
        if ($data[$key]["goal"] == "education") {
            $data[$key]["goal_data"]["futureage"] = $data[$key]["goal_data"]["futureages"] - $data[$key]["goal_data"]["age"];
        }
        if ($data[$key]["goal"] == "vacation" || ($data[$key]["goal"] == "car")) {
            $data[$key]["goal_data"]["futureage"] = $data[$key]["goal_data"]["futureyear"];
        }
        if ($data[$key]["goal"] == "retirement") {
            $data[$key]["goal_data"]["futureage"] = $data[$key]["goal_data"]["retirementage"] - $data[$key]["goal_data"]["currentage"];
        }
        if ($data[$key]["goal"] == "marriage") {
            $data[$key]["goal_data"]["futureage"] = $data[$key]["goal_data"]["futureage"] - $data[$key]["goal_data"]["currentagechild"];
        }
    }
    echo mysqli_error($conn);
    echo json_encode($data);
}
if (isset($_POST["add_user_fund"])) {
    parse_str($_POST["add_user_fund"], $req);
    // var_dump($req);
    $sql = "SELECT fund_type FROM `user_fund` where user_email='{$_SESSION['goaluser']}'";
    $result = mysqli_query($conn, $sql) or die("Query Failed");
    $allfund = mysqli_fetch_all($result);
    // var_dump($allfund);
    $in_funds = array_map(function ($e) {
        return $e[0];
    }, $allfund);
    $email = $_SESSION["goaluser"];
    for ($i = 0; $i < count($req["fund_deposit"]); $i++) {
        if (empty($req['fund_deposit'][$i]) || empty($req["duration"][$i]) || empty($req["fund_amt"][$i]) || empty($req["percent"][$i])) {
            echo "Not Fill";
        } elseif (in_array($req["fund_deposit"][$i], $in_funds)) {
            $sql = "UPDATE `user_fund` SET `duration` = '{$req['duration'][$i]}',`investment_amt` ='{$req['fund_amt'][$i]}',`percent` = '{$req['percent'][$i]}'  WHERE user_email ='{$_SESSION['goaluser']}' && `fund_type` = '{$req['fund_deposit'][$i]}'";
            $result =  mysqli_query($conn, $sql);
            echo $result;
            echo mysqli_error($conn);
        } else {
            $sql = "INSERT INTO `user_fund`(`user_email`,`fund_type`,`duration`,`investment_amt`,`percent`) VALUES ('$email','{$req['fund_deposit'][$i]}','{$req["duration"][$i]}','{$req["fund_amt"][$i]}','{$req["percent"][$i]}')";
            $result =  mysqli_query($conn, $sql);
            echo $result;
            echo mysqli_error($conn);
        }
    }
    // echo count($req);
}
if (isset($_POST["allocationFund"])) {
    parse_str($_POST["allocationFund"], $req);
    $sf = mysqli_prepare($conn, "SELECT allocate_amount,allocate_goals,investment_amt FROM `user_fund` where user_email='{$_SESSION['goaluser']}' && `id`=?");
    $sf->bind_param("s", $req["fund"]);
    $sf->execute();
    $show_message=array("status" => true, "message" => "Allocation Successful");
    $sf_data = mysqli_fetch_assoc($sf->get_result());
    // $req["lumpsumAmtAllocated"]=$sf_data["allocate_amount"];
    $all_allocations = json_decode($sf_data["allocate_goals"], true);
    if (isset($all_allocations[$req["goal"]])) {
        // $sf_data["allocate_amount"] = +$sf_data["allocate_amount"] - +$all_allocations[$req["goal"]]["amt"];
        $all_allocations[$req["goal"]]["amt"] = $req["lumpsumAmtAllocated"] + +$all_allocations[$req["goal"]]["amt"];
        if($req["lumpsumAmtAllocated"] == 0){ //delete allocation
            $req["lumpsumAmtAllocated"]= -$all_allocations[$req["goal"]]["amt"];
            unset($all_allocations[$req["goal"]]);
            $show_message["message"]="Allocation Deleted";
        }
    } else {
        $allocate_goal = array();
        $allocate_goal["amt"] = $req["lumpsumAmtAllocated"];
        $all_allocations[$req["goal"]] = $allocate_goal;
    }
    $req["totalAllocated"] = +$sf_data["allocate_amount"] + +$req["lumpsumAmtAllocated"];
    if ($req["totalAllocated"] > $sf_data["investment_amt"]) {
        die(json_encode(array("status" => true, "message" => "lump sum Amount Allocated greater than investment amount")));
    }else if($req["totalAllocated"] < 0){
        die(json_encode(array("status" => true, "message" => "invalid Allocation")));
    }
    $sql = "UPDATE user_fund SET allocate_amount= ? ,allocate_goals= ? WHERE user_email='{$_SESSION['goaluser']}' && `id`=?";
    $smt = mysqli_prepare($conn, $sql);
    $all_json = json_encode($all_allocations);
    $smt->bind_param("sss", $req["totalAllocated"], $all_json, $req["fund"]);
    $smt->execute();

    //?save plan sip&lump
    $upa=mysqli_prepare($conn,"UPDATE user_goal SET plan_sip=?, plan_lumpsum=? WHERE email='{$_SESSION['goaluser']}' && `id`=?");
    $upa->bind_param("sss",$req["planSip"],$req["planLamp"],$req["goal"]);
    $upa->execute();

    echo json_encode($show_message);
}
if(isset($_POST["save_all_plan"])){
    $data=$_POST["save_all_plan"];
    $upa=mysqli_prepare($conn,"UPDATE user_goal SET plan_sip=?, plan_lumpsum=? WHERE email='{$_SESSION['goaluser']}' && `id`=?");
    foreach($data as $key=>$d){
        $upa->bind_param("sss",$d["sip"],$d["lup"],$key);
        $upa->execute();
    }
    echo json_encode(array("status" => true));
}
if(isset($_POST["suggest_scheme"])){
    $ss=$_POST["suggest_scheme"];
    $sc="";
    foreach($ss as $k=>$s){
        if($k>=1)$sc.=" or ";
        $sc.="FIND_IN_SET('$s', suggest_years)";
    }
    $sql="SELECT scheme_type as st,id,scheme_names,suggest_years from `suggest_scheme` where ". $sc;
    // echo $sql;
    $schemes=mysqli_query($conn,$sql)->fetch_all(MYSQLI_ASSOC);
    foreach($schemes as $k=>$s){
         $sn=json_decode($s["scheme_names"],true);
         if(count($sn['sip'])==0){
             $schemes[$k]["sip_s"]="";
         }else{
             $schemes[$k]["sip_s"]=$sn['sip'][rand(0,count($sn['sip'])-1)];
         }
         $schemes[$k]["lump_s"]=$sn['lump'][rand(0,count($sn['lump'])-1)];
         $schemes[$k]["sugg"]=array_values(array_intersect(explode(",",$s["suggest_years"]),$ss));
         unset($schemes[$k]["scheme_names"]);
         unset($schemes[$k]["suggest_years"]);
    }
    echo json_encode($schemes);
}