<?php
require_once('connect.php');
session_start();
if (!isset($_SESSION["goaluser"])) {
    header("location: ./index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <title>My Profile</title>
</head>
<style>
    .container {
        background-color: #ffffff;
    }

    .que_col {
        color: #223577;
        font-weight: 600;
        font-family: math;
        font-size: 16px;
    }

    h4 {
        color: #33a119;
        font-weight: bolder;
        font-family: cursive;
        font-style: italic;
    }

    .borbottom {
        border: 0;
        border-bottom: 1px solid gray;
        font-family: none;
        text-transform: capitalize;
    }

    .nav-a {
        color: black;
        font-weight: 500;
        font-size: 18px;
    }

    /* .nav-a.active{
        transform: translate3d(0, -.8em , 0);
    } */

    /* .nav-li {
        background-color: darkgrey;
        border-radius: 16px;
        border: 2px solid white;
    } */
    .nav-li {
        background-color: beige;
        border-top: 5px solid #d36b7d;
        border-top-right-radius: 21px;
        /* border-left: 5px solid red; */
        border-left: outset;
    }

    /* .nav-li:hover{
    background-color: beige;
    outline: none;
    border-top: 5px solid #d36b7d;
    border-top-right-radius: 21px;
    border-left: 5px solid red;
    border-bottom: ;
    border-left: outset;
    height: 56px;

} */
</style>

<body>
    <?php include("./header.php"); ?>
    <form action="" method="POST">
        <div class="container">

            <?php

            $sql = "SELECT * FROM client_register INNER JOIN client_details  on client_register.email = client_details.email INNER JOIN joint_holder on client_register.email = joint_holder.investor_email where client_register.email = '{$_SESSION['goaluser']}'";
            $query = mysqli_query($conn, $sql);
            if (mysqli_num_rows($query) > 0) {
                foreach ($query as $row) {
                    // echo $row['full_name'];
                    $address = json_decode($row['address'], true);  // investor
                    $additional_details = json_decode($row['additional_details'], true);   //investor
                    $personal_detail = json_decode($row['personal_detail'], true);   //joint holder
                    $address_detail = json_decode($row['address_detail'], true);     //joint holder
                    $additional_detail = json_decode($row['additional_detail'], true);     //joint holder
                    $nominee_details = json_decode($row['nominee_details'], true)[0];   // nominee
                    $bank_details = json_decode($row['bank_details'], true);   // bank detail
                    // var_dump($bank_details);
            ?>

                    <div class="container mt-0 pt-0 ">
                        <h3>My Profile</h3>
                        <ul class="nav nav-tabs mt-0 pt-0 pb-0 mb-0 " role="tablist">
                            <li class="nav-item nav-li">
                                <a class="nav-link nav-a active" data-bs-toggle="tab" href="#investor">Investor Information</a>
                            </li>
                            <li class="nav-item nav-li">
                                <a class="nav-link nav-a" data-bs-toggle="tab" href="#joint">Joint Holder</a>
                            </li>
                            <li class="nav-item nav-li">
                                <a class="nav-link nav-a" data-bs-toggle="tab" href="#nominee">Nominee Details</a>
                            </li>
                            <li class="nav-item nav-li">
                                <a class="nav-link nav-a" data-bs-toggle="tab" href="#bank">Bank Details</a>
                            </li>
                            <li class="nav-item nav-li">
                                <a class="nav-link nav-a" data-bs-toggle="tab" href="#contact_detail">Contact Details</a>
                            </li>
                            <li class="nav-item nav-li">
                                <a class="nav-link nav-a" data-bs-toggle="tab" href="#chnge_pass">Change Password</a>
                            </li>

                        </ul>

                        <div class="tab-content mt-5 pt-0 pb-0 mb-0">
                            <form action="" method="post" id="update_all">

                                <div id="investor" class="container tab-pane active mt-0 pt-0">
                                    <h4>Investor Details</h4>
                                    <h5><?php echo $row['full_name'] ?></h5>
                                    <div class="row mb-3">
                                        <label for="" class="que_col" style="padding:16px;">Name (as in PAN)</label>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="">&nbsp;</label><br>
                                                <input type="text" value="<?php echo $row['full_name'] ?>" class="borbottom mb-2 form-control rounded-xs" name="f_name" style="border: none;border-bottom: 1px solid #b7b7b7;" id="f_name" placeholder="First Name">
                                                <!-- <span class="underline" data-id='f_name'></span> -->
                                            </div>
                                        </div>
                                        <div class="col-12  col-md-4">
                                            <div class="form-group">
                                                <label for="">&nbsp;</label><br>
                                                <input type="text" class="borbottom form-control rounded-xs mb-2" id="l_name" name="l_name" placeholder="Last Name">
                                                <!-- <span class="underline" data-id='l_name'></span> -->
                                            </div>
                                        </div>
                                        <div class="col-12  col-md-4">
                                            <div class="form-group">
                                                <label for="" class="que_col">PAN</label><br>
                                                <input type="text" value="<?php echo $row['pan'] ?>" class="borbottom form-control rounded-xs" id="l_name" name="pan_num" placeholder="Last Name">
                                                <!-- <span class="underline" data-id='l_name'></span> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="" class="que_col">Date of Birth</label><br>
                                                <input type="text" value="<?php echo $row['dob'] ?>" class="borbottom form-control mb-2 mt-2 w-100" name="dob" id="dob" placeholder="Date" required>
                                                <!-- <span class="underline" data-id='dob'></span> -->
                                            </div>
                                        </div>
                                        <div class="col-12 mb-2 col-md-4">
                                            <div class="form-group">
                                                <label for="" class="que_col">Gender</label><br>
                                                <input type="text" class="borbottom m-auto form-control mt-2 mb-2 w-100 my-1" name="gender" id="gender" value="<?php echo $row['gender'] ?>">
                                                <!-- <select  class="borbottom m-auto form-control mt-2 mb-2 w-100 my-1" id="gender" name="gender">
                                                <option>Select</option>
                                                <option>Male</option>
                                                <option>Female</option>
                                                <option>Other</option>
                                            </select> -->
                                                <!-- <span class="underline" data-id='gender'></span> -->
                                            </div>
                                        </div>
                                        <div class="col-12  col-md-4">
                                            <div class="form-group">
                                                <label for="" class="que_col">Marital Status</label><br>
                                                <input type="text" value="<?php echo $row['martial_status'] ?>" name="martial_status" class="borbottom form-control m-auto w-100 my-1">
                                                <!-- <select value="" class="borbottom form-control m-auto w-100 my-1" id="mar_status" name="martial_status"> <i class="fa-solid fa-arrow-down" style="color:red;font-size:18px;"></i>
                                                <option>Select</option>
                                                <option>Single </option>
                                                <option>Married</option>
                                                <option>Separated</option>
                                                <option>Widowed</option>
                                                <option>Divorced</option>
                                            </select> -->
                                                <!-- <span class="underline" data-id='mar_status'></span> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-12 mb-2 col-md-4">
                                            <div class="form-group">
                                                <label for="" class="que_col">Mobile Number</label>
                                                <input type="text" value="<?php echo $row['phone_no'] ?>" class="borbottom form-control mt-2 mb-2 w-100" name="mob_no" id="mob_num" placeholder="Mobile number">
                                                <span class="underline" data-id='mob_num'></span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="" class="que_col">Email</label>
                                                <input type="text" value="<?php echo $row['email'] ?>" class="borbottom mt-2 form-control w-100" name="email" id="email" placeholder="Enter Email">
                                                <span class="underline" data-id='email'></span>
                                            </div>
                                        </div>
                                        <div class="col-12  col-md-4">
                                            <div class="form-group">
                                                <label for="" class="que_col mb-2">Place of Birth</label>
                                                <input type="text" value="<?php echo $additional_details['birth_place'] ?>" class="borbottom form-control w-100" name="place_birth" id="birth_place" placeholder="Birth Place" required>
                                                <span class="underline" data-id='birth_place'></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-12 col-md-6 mb-3">
                                            <div class="form-group">
                                                <label for="" class="que_col">Contact Address</label>
                                                <input type="text" class="borbottom form-control mt-2 w-100" value="<?php echo $address['home_address'] ?>" id="contact" name="home_address" placeholder="Flat/Building/Street Name" required>
                                                <span class="underline" data-id='contact'></span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4 mb-3">
                                            <div class="form-group">
                                                <label for="" class="que_col">Postal Code</label>
                                                <input type="text" value="<?php echo $row['pin_code'] ?>" class="borbottom form-control" name="pin_code" id="pincode" placeholder="pincode">
                                                <span class="underline" data-id='pincode'></span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-2"></div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="" class="que_col">City</label>
                                                <input class="borbottom form-control" value="<?php echo $row['city'] ?>" id="city" name="city" readonly><br><br>
                                                <span class="underline" data-id='city'></span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="" class="que_col">State</label>
                                                <input class="borbottom form-control" value="<?php echo $address['state'] ?>" id="state" name="state" readonly>
                                                <span class="underline" data-id='state'></span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4"></div>
                                        <!-- <div class="col-12 col-md-3"></div> -->
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="" class="que_col">Father / Spouse Name</label>
                                                <input type="text" value="<?php echo $additional_details['father_name'] ?>" class="borbottom form-control w-100" name="father_name" id="father_name" placeholder="First Name" required>
                                                <span class="underline" data-id='father_name'></span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <!-- <label for="">&nbsp;</label><br> -->
                                                <label for="" class="que_col">Mother</label>
                                                <input type="text" value="<?php echo $additional_details['mother_name'] ?>" class="borbottom form-control w-100" name="mother_name" id="mother_name" placeholder="First Name" required>
                                                <span class="underline" data-id='mother_name'></span>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div id="joint" class="container tab-pane fade mt-0 pt-0">
                                    <h4>Joint Holder</h4>
                                    <h5><?php echo $personal_detail['name_joint'] ?></h5>
                                    <div class="row mb-3">
                                        <label for="" class="que_col" style="padding:16px;">Name (as in PAN)</label>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="">&nbsp;</label><br>
                                                <input type="text" value="<?php echo $personal_detail['name_joint'] ?>" class="borbottom mb-2 form-control rounded-xs" name="f_name" style="border: none;border-bottom: 1px solid #b7b7b7;" id="f_name" placeholder="First Name">
                                                <!-- <span class="underline" data-id='f_name'></span> -->
                                            </div>
                                        </div>
                                        <div class="col-12  col-md-4">
                                            <div class="form-group">
                                                <label for="">&nbsp;</label><br>
                                                <input type="text" class="borbottom form-control rounded-xs mb-2" id="l_name" name="l_name" placeholder="Last Name">
                                                <!-- <span class="underline" data-id='l_name'></span> -->
                                            </div>
                                        </div>
                                        <div class="col-12  col-md-4">
                                            <div class="form-group">
                                                <label for="" class="que_col">PAN</label><br>
                                                <input type="text" class="borbottom form-control rounded-xs" value="<?php echo $row['joint_holder_pan'] ?>" name="pan_num" placeholder="Last Name">
                                                <!-- <span class="underline" data-id='l_name'></span> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="" class="que_col">Date of Birth</label><br>
                                                <input type="text" class="borbottom form-control mb-2 mt-2 w-100" value="<?php echo $personal_detail['dob_joint'] ?>" name="dob" id="dob" placeholder="Date" required>
                                                <!-- <span class="underline" data-id='dob'></span> -->
                                            </div>
                                        </div>
                                        <div class="col-12 mb-2 col-md-4">
                                            <div class="form-group">
                                                <label for="" class="que_col">Gender</label><br>
                                                <input type="text" class="borbottom m-auto form-control mt-2 mb-2 w-100 my-1" value="<?php echo $personal_detail['gender_joint'] ?>" id="gender" name="gender">
                                                <!-- <select class="borbottom m-auto form-control mt-2 mb-2 w-100 my-1" id="gender" name="gender">
                                                <option>Select</option>
                                                <option>Male</option>
                                                <option>Female</option>
                                                <option>Other</option>
                                            </select> -->
                                                <!-- <span class="underline" data-id='gender'></span> -->
                                            </div>
                                        </div>
                                        <div class="col-12  col-md-4">
                                            <div class="form-group">
                                                <label for="" class="que_col">Marital Status</label><br>
                                                <input type="text" class="borbottom m-auto form-control mt-2 mb-2 w-100 my-1" value="<?php echo $personal_detail['martial_status_joint'] ?>" id="gender" name="gender">
                                                <!-- <select class="borbottom form-control m-auto w-100 my-1" id="mar_status" name="martial_status"> <i class="fa-solid fa-arrow-down" style="color:red;font-size:18px;"></i>
                                                <option>Select</option>
                                                <option>Single </option>
                                                <option>Married</option>
                                                <option>Separated</option>
                                                <option>Widowed</option>
                                                <option>Divorced</option>
                                            </select>
                                            <span class="underline" data-id='mar_status'></span> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-12 mb-2 col-md-4">
                                            <div class="form-group">
                                                <label for="" class="que_col">Mobile Number</label>
                                                <input type="text" value="<?php echo $personal_detail['mob_no_joint'] ?>" class="borbottom form-control mt-2 mb-2 w-100" name="mob_no" id="mob_num" placeholder="Mobile number">
                                                <span class="underline" data-id='mob_num'></span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="" class="que_col">Email</label>
                                                <input type="text" value="<?php echo $personal_detail['email_joint'] ?>" class="borbottom mt-2 form-control w-100" name="email" id="email" placeholder="Enter Email">
                                                <span class="underline" data-id='email'></span>
                                            </div>
                                        </div>
                                        <div class="col-12  col-md-4">
                                            <div class="form-group">
                                                <label for="" class="que_col mb-2">Place of Birth</label>
                                                <input type="text" class="borbottom form-control w-100" value="<?php echo $additional_detail['birth_place_joint'] ?>" name="place_birth" id="birth_place" placeholder="Birth Place" required>
                                                <span class="underline" data-id='birth_place'></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-12 col-md-6 mb-3">
                                            <div class="form-group">
                                                <label for="" class="que_col">Contact Address</label>
                                                <input type="text" class="borbottom form-control mt-2 w-100" value="<?php echo $address_detail['address_joint'] ?>" id="contact" name="home_address" placeholder="Flat/Building/Street Name" required>
                                                <span class="underline" data-id='contact'></span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4 mb-3">
                                            <div class="form-group">
                                                <label for="" class="que_col">Postal Code</label>
                                                <input type="text" class="borbottom form-control" value="<?php echo $address_detail['pin_code_joint'] ?>" name="pin_code" id="pincode" placeholder="pincode">
                                                <span class="underline" data-id='pincode'></span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-2"></div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="" class="que_col">City</label>
                                                <input class="borbottom form-control" value="<?php echo $address_detail['city_joint'] ?>" id="city" name="city" readonly><br><br>
                                                <span class="underline" data-id='city'></span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="" class="que_col">State</label>
                                                <input class="borbottom form-control" value="<?php echo $address_detail['state_joint'] ?>" id="state" name="state" readonly>
                                                <span class="underline" data-id='state'></span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4"></div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="" class="que_col mb-0">Father / Spouse Name</label>
                                                <input type="text" class="borbottom form-control w-100" value="<?php echo $additional_detail['father_name_joint'] ?>" name="father_name" id="father_name" placeholder="First Name" required>
                                                <span class="underline" data-id='father_name'></span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <!-- <label for="">&nbsp;</label><br> -->
                                                <label for="" class="que_col mb-0">Mother</label>
                                                <input type="text" class="borbottom form-control w-100" value="<?php echo $additional_detail['mother_name_joint'] ?>" name="mother_name" id="mother_name" placeholder="First Name" required>
                                                <span class="underline" data-id='mother_name'></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="nominee" class="container tab-pane fade mt-0 pt-0">
                                    <h4>Nominee Details</h4>
                                    <?php foreach ($nominee_details as $nd) {
                                    ?>
                                        <div style="padding: 5px; box-shadow: rgb(204, 204, 204) 5px 5px 5px; border: 1px solid rgb(187, 187, 187); display: block;" id="nominee_div_1" class="nominee_div_class">
                                            <div class="row" style="text-align: center;display: flex;justify-content: center;padding:15px;">
                                                <div class="col-md-3">
                                                    <div class="form-group is-empty">
                                                        <label class="control-label mb-1" for="name">Full Name</label>
                                                        <input class="form-control mb-3" value="<?= $nd['name_nominee'] ?>" data-maxlength="25" id="nominee_first_name1" data-nominee="1" name="nominee_first_name" placeholder="Name" type="text">
                                                        <span class="material-input"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group is-empty">
                                                        <label class="control-label mb-1" for="name">Email</label>
                                                        <input class="form-control" value="<?= $nd['email_nominee'] ?>" name="nominee_email" placeholder="abc@gmail.com" type="text">
                                                        <span class="material-input"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group is-empty">
                                                        <label class="control-label mb-1" for="name">PAN</label>
                                                        <input class="form-control" value="<?= $nd['PAN_nominee'] ?>" name="nominee_pan" placeholder="e.g. AAAPM1234X" type="text">
                                                        <span class="material-input"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="form-group is-empty">
                                                        <label class="control-label mb-1" for="name">%</label>
                                                        <input class="form-control" value="<?= $nd['percent_nominee'] ?>" name="nominee_per" placeholder="%" type="text">
                                                        <span class="material-input"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group is-empty">
                                                        <label class="control-label mb-1" for="pan">Date of Birth </label>
                                                        <input type="text" class="form-control" value="<?= $nd['DOB_nominee'] ?>" name="nominee_DOB" placeholder="dd/mm/yyyy">
                                                        <input type="hidden" name="minor1" id="minor1">
                                                        <span class="material-input"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group is-empty">
                                                        <label class="control-label mb-1" for="name">Address</label>
                                                        <input class="form-control" value="<?= $nd['address_nominee'] ?>" placeholder="" type="text" name="nominee_address">
                                                        <span class="material-input"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group is-empty">
                                                        <label class="control-label mb-1">City</label>
                                                        <input class="borbottom mt-2 form-control mb-4  my-1" value="<?= $nd['city_nominee'] ?>" id="city" name="nominee_city">
                                                        <!-- <select class="borbottom mt-2 form-control mb-4  my-1" id="city" name="nominee_city" onfocusout="destroyline(this)" onfocus="createline(this)">
                                                <option>Select</option>
                                                <option>Indore</option>
                                                <option>Jabalpur</option>
                                                <option>Udaipur</option>
                                                <option>Pune</option>
                                                        </select> -->
                                                        <span class="material-input"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group is-empty">
                                                        <label class="control-label mb-1">Pincode</label>
                                                        <input class="form-control" value="<?= $nd['pin_code_nominee'] ?>" type="text" name="nominee_pin">
                                                        <span class="material-input"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group is-empty">
                                                        <label class="control-label mb-1" for="nominee_relation1">Relationship with Investor</label>
                                                        <input class="form-control" value="<?= $nd['relation_nominee'] ?>" type="text">
                                                        <!-- <select class="form-control" id="nominee_relation1" name="nominee_relation">
                                                <option value="">Select</option>
                                                <option value="Father">Father</option>
                                                <option value="Mother">Mother</option>
                                                <option value="Spouse">Spouse</option>
                                                <option value="Son">Son</option>
                                                <option value="Daughter">Daughter</option>
                                                <option value="Brother">Brother</option>
                                                <option value="Sister">Sister</option>
                                                <option value="Aunt">Aunt</option>
                                                <option value="Uncle">Uncle</option>
                                                <option value="Niece">Niece</option>
                                                <option value="Nephew">Nephew</option>
                                                <option value="Grand Father">Grand Father</option>
                                                <option value="Grand Mother">Grand Mother</option>
                                                <option value="Others">Others</option>
                                                    </select> -->
                                                        <span class="material-input"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>

                                <div id="bank" class="container tab-pane fade mt-0 pt-0">
                                    <!-- <h4>Bank Details</h4> -->
                                    <div class="form-group">
                                        <h4>Bank Account Details</h4>
                                        <div class="row mt-4 mb-2">
                                            <div class="col-12  col-md-3">
                                                <div class="form-group">
                                                    <label for="" class="que_col">IFSC</label><br>
                                                    <input type="text" value="<?= $bank_details['bank_ifsc'] ?>" class="ifsc borbottom form-control mt-2 w-100" id="ifsc" name="ifci_num" placeholder="IFSC Number" onfocusout="destroyline(this)" onfocus="createline(this)" required>
                                                    <span class="underline" data-id='ifsc'></span>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-2 col-md-3">
                                                <div class="form-group">
                                                    <label for="" class="que_col">Bank Name</label>
                                                    <input type="text" class="borbottom m-auto form-control w-100 my-1" value="<?= $bank_details['bank_name'] ?>" id="bank_name" name="bank_name" onfocusout="destroyline(this)" onfocus="createline(this)" required>
                                                    <!-- <select class="borbottom m-auto form-control mb-2 w-100 my-1" id="bank_name" name="bank_name" onfocusout="destroyline(this)" onfocus="createline(this)" required>
                                                     <option></option>
                                                    <option>Indusind Bank</option>
                                                    <option>Bank of Maharashtra</option>
                                                    <option>Bank of India</option>
                                                    <option>Bank of Baroda</option>
                                                    <option>ICICI</option>
                                                </select> -->
                                                    <!-- <span class="underline" data-id='bank_name'></span> -->
                                                </div>
                                            </div>
                                            <div class="col-12 mb-2 col-md-3">
                                                <div class="form-group">
                                                    <label for="" class="que_col">City</label><br>
                                                    <input type="text" class="borbottom form-control m-auto mt2 w-100 my-1" value="<?= $bank_details['bank_city'] ?>" id="bank_city" name="bank_city" onfocusout="destroyline(this)" onfocus="createline(this)">
                                                    <!-- <select class="borbottom form-control m-auto mt2 w-100 my-1" id="bank_city" name="bank_city" onfocusout="destroyline(this)" onfocus="createline(this)">
                                            <option>Select City</option>
                                            <option>Jabalpur</option>
                                            <option>Nagpur</option>
                                            <option>Jaipur</option>
                                            <option>Indore</option>
                                            <option>Bangalore</option>
                                        </select> -->
                                                    <!-- <span class="underline" data-id='bank_city'></span> -->
                                                </div>
                                            </div>
                                            <div class="col-12 mb-2 col-md-3">
                                                <div class="form-group">
                                                    <label for="" class="que_col">Branch Address</label><br>
                                                    <input type="text" class="borbottom form-control mt-2 w-100" value="<?= $bank_details['bank_branch'] ?>" id="bank_branch" name="branch_name" placeholder="Branch Address" onfocusout="destroyline(this)" onfocus="createline(this)" required>
                                                    <!-- <span class="underline" data-id='bank_branch'></span> -->
                                                </div>
                                            </div>
                                            <div class="col-12 mb-2 col-md-3 mb-3">
                                                <div class="form-group">
                                                    <label for="" class="que_col">Account Type</label>
                                                    <select class="borbottom form-control mt-2 w-100" value="<?= $bank_details['bank_acc_type'] ?>" id="acc_type" name="account_type" onfocusout="destroyline(this)" onfocus="createline(this)" required>
                                                        <!-- <option>Select</option> -->
                                                        <option>Saving</option>
                                                        <option>Current</option>
                                                    </select>
                                                    <!-- <span class="underline" data-id='acc_type'></span> -->
                                                </div>
                                            </div>
                                            <div class="col-12 mb-2 col-md-3">
                                                <div class="form-group">
                                                    <label for="" class="que_col">Account Number</label><br>
                                                    <input type="text" class="borbottom form-control mt-2 my-2" value="<?= $bank_details['bank_acc_no'] ?>" id="acc_num" name="ac_num" placeholder="Account Number" onfocusout="destroyline(this)" onfocus="createline(this)" required>
                                                    <!-- <span class="underline" data-id='acc_num'></span> -->
                                                </div>
                                            </div>

                                        </div><br>
                                    </div>
                                </div>

                                <div id="contact_detail" class="container tab-pane fade mt-0 pt-0">
                                    <h4>Contact Details</h4>
                                    <div class="form-group">
                                        <div class="row" style="text-align: center;display: flex;justify-content: center;padding:15px;">
                                            <div class="col-12 mb-2 col-md-3">
                                                <div class="form-group">
                                                    <label for="" class="que_col mt-2">Registered Login Id</label><br>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-2 col-md-4">
                                                <div class="form-group">
                                                    <input type="text" value="<?php echo $row['email'] ?>" class="form-control" placeholder="Email Number" readonly>
                                                    <!-- <span class="underline" data-id='acc_num'></span> -->
                                                </div>
                                            </div>
                                            <div class="col-md-5"></div>
                                            <div class="col-12 mb-2 col-md-3">
                                                <div class="form-group">
                                                    <label for="" class="que_col mt-2">Mobile Number</label><br>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-2 col-md-4">
                                                <div class="form-group">
                                                    <input type="text" value="<?php echo $row['mobile'] ?>" class="form-control" placeholder="Phone num" name="mob_no" id="mob_no">
                                                    <!-- <span class="underline" data-id='acc_num'></span> -->
                                                    <!-- <div style="color: blue;cursor: pointer;">Update Mobile Number</div> -->
                                                </div>
                                            </div>
                                            <div class="col-md-5"></div>
                                            <button type="button" id="update_mob" class="btn btn-primary w-25">Update Mobile Number</button>
                                        </div>
                                    </div>
                                </div>

                                <div id="chnge_pass" class="container tab-pane fade mt-0 pt-0">
                                    <h4>Change Password</h4>
                                    <div class="row">
                                        <div class="col-12 col-md-4">
                                            <div class="form-group is-empty">
                                                <label class="control-label mb-1 que_col">Enter Current Password</label>
                                                <input class="form-control mb-3" name="old_pass" type="text">
                                                <span class="material-input"></span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group is-empty">
                                                <label class="control-label mb-1 que_col">Enter New Password</label>
                                                <input class="form-control mb-3" name="new_pass" type="text">
                                                <span class="material-input"></span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group is-empty">
                                                <label class="control-label mb-1 que_col">Re-Enter New Password</label>
                                                <input class="form-control mb-3" name="re-new_pass" type="text">
                                                <span class="material-input"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center mt-5 mb-4">
                                    <button type="submit" class="btn btn-primary ">Save Changes</button>
                                </div>


                            </form>
                        </div>

                    </div>


            <?php
                }
                // var_dump($query->fetch_assoc());
            } else {
                echo "No Record Found";
            }

            ?>
        </div>
    </form>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="./assets/bootstrap.bundle.min.js"></script>
<script>
    $("#update_mob").click(function(e) {
        $.ajax({
            method: "POST",
            url: "./UserData.php",
            data: {
                mob_no: $('#mob_no').val(),
            },
            dataType: "json",
            success: function(data) {
                console.log("mob_no");
            }
        });
    })

    $("#update_all").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            method: "post",
            url: "./UserData.php",
            data: {
                "MyProfile": data
            },
            dataType: "json",
            success: function(data) {
                console.log("hello");
                // console.log(pan_num); window.location.href="./question.php";
                // window.location.href = "./other_investor.php";
            }
        });
    })
</script>

</html>