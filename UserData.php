<?php
session_start();
require_once("./connect.php");

if (isset($_POST['details'])) {
    parse_str($_POST['details'], $req);
    // var_dump($req);
    $address = array(
        "home_address" => $req['home_address'],
        "state" => $req['state']
    );
    $bank_details = array(
        "bank_name" => $req['bank_name'],
        "bank_ifsc" => $req['ifci_num'],
        "bank_acc_no" => $req['ac_num'],
        "bank_acc_type" => $req['account_type'],
        "bank_branch" => $req['branch_name'],
        "bank_city" => $req['bank_city']
    );
    $additional_details = array(
        "birth_place" => $req['place_birth'],
        "birth_country" => $req['birth_country'],
        "occupation" => $req['occupation'],
        "annual_income" => $req['annual_income'],
        "father_name" => $req['father_name'],
        "mother_name" => $req['mother_name']
    );

    $bank_details = json_encode($bank_details);
    $address = json_encode($address);
    $additional_details = json_encode($additional_details);
    $sql = "INSERT INTO `client_details` (`pan`,`name`,`email`,`mobile`,`bank_details`,`address`,`pin_code`,`city`,`martial_status`,`dob`,`additional_details`) VALUES ('{$req['pan_num']}','{$req['f_name']}','{$req["email"]}','{$req['mob_no']}','$bank_details','$address','{$req['pin_code']}','{$req['city']}','{$req['martial_status']}','{$req['dob']}','$additional_details') ";
    if (mysqli_query($conn, $sql)) {
        // echo "Sucess";        
        echo  json_encode(array("message" => "Success"));
    } else {
        echo mysqli_error($conn);
        echo "Not Inserted";
    }
}

if (isset($_POST['holder_detail'])) {
    parse_str($_POST['holder_detail'], $req);
    var_dump($req);
    $personal_detail = array(
        "name" => $req['f_name'],
        "dob" => $req['dob'],
        "gender" => $req['gender'],
        "martial_status" => $req['martial_status'],
        "mob_no" => $req['mob_no'],
        "email" => $req['email']
    );
    $address_detail = array(
        "address" => $req['home_address'],
        "city" => $req['city'],
        "state" => $req['state'],
        "pin_code" => $req['pin_code']
    );
    $additional_detail = array(
        "birth_place" => $req['place_birth'],
        "birth_country" => $req['birth_country'],
        "occupation" => $req['occupation'],
        "annual_income" => $req['annual_income'],
        "father_name" => $req['father_name'],
        "mother_name" => $req['mother_name']
    );
    $personal_detail = json_encode($personal_detail);
    $address_detail = json_encode($address_detail);
    $additional_detail = json_encode($additional_detail);
    $sql = "INSERT into `joint_holder` (`investor_email`,`pan`,`personal_detail`,`address_detail`,`additional_detail`) values ('{$_SESSION['goaluser']}','{$req['pan_num']}','$personal_detail','$address_detail', '$additional_detail') ";
    if (mysqli_query($conn, $sql)) {
        // echo "Sucess";        
        echo  json_encode(array("message" => "Success"));
    } else {
        echo mysqli_error($conn);
        echo "Not Inserted";
    }
}
if(isset($_POST['nominee_details'])){
    parse_str($_POST['nominee_details'], $req);
    var_dump($req);
    $nominee_details = array(
        "name" => $req['nominee_first_name'],
        "relation" => $req['nominee_relation'],
        "DOB" => $req['nominee_DOB'],
        "address" => $req['nominee_address'],
        "city" => $req['nominee_city'],
        "pin_code" => $req['nominee_pan'],
        "email" => $req['nominee_email'],
        "PAN" => $req['nominee_pan'],
        "name2" => $req['nominee2_name'],
        "email2" => $req['nominee2_email'],
        "PAN2" => $req['nominee2_pan'],
        "DOB2" => $req['nominee2_DOB'],
        "address2" => $req['nominee2_address'],
        "city2" => $req['nominee2_city'],
        "pin_code2" => $req['nominee2_pin'],
        "relation2" => $req['nominee2_relation']
    );
    $nominee_details = json_encode($nominee_details);
    $sql = "UPDATE `client_details` SET `nominee_details`='[$nominee_details]' WHERE email = '{$_SESSION['goaluser']}' ";
    // $sql = "UPDATE into `client_details` SET `nominee_details` = {'$nominee_details'} WHERE email ='{$_SESSION['goaluser']}' ";
    if (mysqli_query($conn, $sql)) {
        // echo "Sucess";        
        echo  json_encode(array("message" => "Success"));
    } else {
        echo mysqli_error($conn);
        echo "Not Inserted";
    }
}
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
    $show_message = array("status" => true, "message" => "Allocation Successful");
    $sf_data = mysqli_fetch_assoc($sf->get_result());
    // $req["lumpsumAmtAllocated"]=$sf_data["allocate_amount"];
    $all_allocations = json_decode($sf_data["allocate_goals"], true);
    if (isset($all_allocations[$req["goal"]])) {
        // $sf_data["allocate_amount"] = +$sf_data["allocate_amount"] - +$all_allocations[$req["goal"]]["amt"];
        $all_allocations[$req["goal"]]["amt"] = $req["lumpsumAmtAllocated"] + +$all_allocations[$req["goal"]]["amt"];
        if ($req["lumpsumAmtAllocated"] == 0) { //delete allocation
            $req["lumpsumAmtAllocated"] = -$all_allocations[$req["goal"]]["amt"];
            unset($all_allocations[$req["goal"]]);
            $show_message["message"] = "Allocation Deleted";
        }
    } else {
        $allocate_goal = array();
        $allocate_goal["amt"] = $req["lumpsumAmtAllocated"];
        $all_allocations[$req["goal"]] = $allocate_goal;
    }
    $req["totalAllocated"] = +$sf_data["allocate_amount"] + +$req["lumpsumAmtAllocated"];
    if ($req["totalAllocated"] > $sf_data["investment_amt"]) {
        die(json_encode(array("status" => true, "message" => "lump sum Amount Allocated greater than investment amount")));
    } else if ($req["totalAllocated"] < 0) {
        die(json_encode(array("status" => true, "message" => "invalid Allocation")));
    }
    $sql = "UPDATE user_fund SET allocate_amount= ? ,allocate_goals= ? WHERE user_email='{$_SESSION['goaluser']}' && `id`=?";
    $smt = mysqli_prepare($conn, $sql);
    $all_json = json_encode($all_allocations);
    $smt->bind_param("sss", $req["totalAllocated"], $all_json, $req["fund"]);
    $smt->execute();

    //?save plan sip&lump
    $upa = mysqli_prepare($conn, "UPDATE user_goal SET plan_sip=?, plan_lumpsum=? WHERE email='{$_SESSION['goaluser']}' && `id`=?");
    $upa->bind_param("sss", $req["planSip"], $req["planLamp"], $req["goal"]);
    $upa->execute();

    echo json_encode($show_message);
}
if (isset($_POST["save_all_plan"])) {
    $data = $_POST["save_all_plan"];
    $upa = mysqli_prepare($conn, "UPDATE user_goal SET plan_sip=?, plan_lumpsum=? WHERE email='{$_SESSION['goaluser']}' && `id`=?");
    foreach ($data as $key => $d) {
        $upa->bind_param("sss", $d["sip"], $d["lup"], $key);
        $upa->execute();
    }
    echo json_encode(array("status" => true));
}
