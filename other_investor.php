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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <title>Other Investor</title>
</head>
<style>
    body {
        background-color: #f9f9f9;
    }

    .head {
        text-align: center;
        padding: 10px 5px;
        color: #fff;
        background-color: #263787;
        font-size: 23px;
        font-weight: 500;
    }

    .top_row {
        background-color: #f9f9f9;
        border: 1px solid #c7c7c7;
        box-shadow: 0px 0px 9px 1px;
        width: 100%;
        margin-left: 0;
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
    }

    .underline {
        position: absolute;
        height: 2px;
        transform: scaleX(0);
        width: 100%;
        background-color: purple;
        transition: all 0.5s cubic-bezier(0.47, 0.05, 0.47, 1.4);
    }

    .form-group {
        position: relative;
        /* background-color: #f6f6f6; */
    }

    .form-control:focus {
        border: none;
        outline: none;
        box-shadow: none;

    }

    label {
        font-weight: 600;
    }

    select.borbottom {
        /* border: 1px solid #ccc; */
        background: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='100' height='100' fill='%2326749a'><polygon points='0,0 100,0 50,50'/></svg>") no-repeat;
        /* background-color: #ccc; */
    }

    select.borbottom {
        background-size: 16px;
        background-position: calc(100% - 20px) 17px;
        background-repeat: no-repeat;
    }
</style>

<body>
    <?php include("./header.php"); ?>
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center">Add Investor Details</h5>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal"></button> -->
                </div>
                <div class="modal-body">
                    <div class="mb-4 text-center">Do you want to add a Joint investor OR Nominee?</div>
                    <div style="text-align:center;">
                        <button class="btn btn-primary" id="jointer" data-bs-dismiss="modal">Joint Holder</button>
                        <button class="btn btn-primary nominee" data-bs-dismiss="modal">Nominee</button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container joint_page mt-4 d-none">
        <div class="head mt-5">Joint Holder</div>
        <div class="row top_row mt-3">
            <div class="col-md-12" style="position:relative;margin-left:13px;">
                <form action="" method="post" id="joint_h_detail">
                    <div class="form-group mt-4">
                        <label class="control-label que_col" for="name">Are you a resident of USA/Canada?</label> &nbsp;&nbsp;
                        <input type="radio" class="start_radio" value="yes_box" id="yes_id" name="radio1">&nbsp;<label for="yes_id" style="cursor:pointer;">Yes</label>
                        <input type="radio" class="start_radio" value="no_box" id="no_id" name="radio1" style="margin-left: 5%;">&nbsp;<label for="no_id" style="cursor:pointer;">No</label>
                    </div><br>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="" class="que_col">Enter PAN </label>
                            <input type="text" class="borbottom form-control rounded-xs" name="pan_num" id="pannum" style="border: none;border-bottom: 1px solid #b7b7b7;" onfocusout="destroyline(this)" onfocus="createline(this)" required>
                            <span class="underline" data-id='pannum'></span>
                        </div>
                    </div><br>
                    <!-- personal detail -->
                    <div class="form-group">
                        <h4>Personal Details</h4>

                        <div class="row">
                            <label for="" class="que_col" style="padding:16px;">Name (as in PAN)</label>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="">&nbsp;</label><br>
                                    <input type="text" class="borbottom form-control rounded-xs" name="f_name_joint" style="border: none;border-bottom: 1px solid #b7b7b7;" id="f_name" placeholder="First Name" onfocusout="destroyline(this)" onfocus="createline(this)" required>
                                    <span class="underline" data-id='f_name'></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="">&nbsp;</label><br>
                                    <input type="text" class="borbottom form-control rounded-xs" id="m_name" name="m_name_joint" placeholder="Middle Name" onfocusout="destroyline(this)" onfocus="createline(this)">
                                    <span class="underline" data-id='m_name'></span>
                                </div>
                            </div>
                            <div class="col-12  col-md-3">
                                <div class="form-group">
                                    <label for="">&nbsp;</label><br>
                                    <input type="text" class="borbottom form-control rounded-xs" id="l_name" name="l_name_joint" placeholder="Last Name" onfocusout="destroyline(this)" onfocus="createline(this)" required>
                                    <span class="underline" data-id='l_name'></span>
                                </div>
                            </div>

                        </div><br>
                        <div class="row">
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="" class="que_col">Date of Birth</label><br>
                                    <input type="text" class="borbottom form-control mb-2 mt-2 w-100" name="dob_joint" id="dob" placeholder="Date" onfocusout="destroyline(this)" onfocus="createline(this)" required>
                                    <span class="underline" data-id='dob'></span>
                                </div>
                            </div>
                            <div class="col-12 mb-2 col-md-3">
                                <div class="form-group">
                                    <label for="" class="que_col">Gender</label><br>
                                    <select class="borbottom m-auto form-control mt-2 mb-2 w-100 my-1" id="gender" name="gender_joint" onfocusout="destroyline(this)" onfocus="createline(this)" required>
                                        <option></option>
                                        <option>Male</option>
                                        <option>Female</option>
                                        <option>Other</option>
                                    </select>
                                    <span class="underline" data-id='gender'></span>
                                </div>
                            </div>
                            <div class="col-12  col-md-3">
                                <div class="form-group">
                                    <label for="" class="que_col">Marital Status</label><br>
                                    <select class="borbottom form-control m-auto w-100 my-1" id="mar_status" name="martial_status_joint" onfocusout="destroyline(this)" onfocus="createline(this)" required>
                                        <option></option>
                                        <option>Single</option>
                                        <option>Married</option>
                                        <option>Separated</option>
                                        <option>Widowed</option>
                                        <option>Divorced</option>
                                    </select>
                                    <span class="underline" data-id='mar_status'></span>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-12 mb-2 col-md-3">
                                <div class="form-group">
                                    <label for="" class="que_col">Mobile Number</label>
                                    <input type="text" class="borbottom form-control mt-2 mb-2 w-100" name="mob_no_joint" id="mob_num" placeholder="Mobile number" onfocusout="destroyline(this)" onfocus="createline(this)" required>
                                    <span class="underline" data-id='mob_num'></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="" class="que_col">Email</label>
                                    <input type="text" class="borbottom mt-2 form-control w-100" name="email_joint" id="email" placeholder="Enter Email" onfocusout="destroyline(this)" onfocus="createline(this)" required>
                                    <span class="underline" data-id='email'></span>
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <!-- address detail -->
                    <div class="form-group">
                        <h4>Address Details</h4>
                        <div class="row mt-4">
                            <div class="col-12 mb-4 col-md-6">
                                <div class="form-group">
                                    <label for="" class="que_col">Contact Address</label>
                                    <input type="text" class="borbottom form-control mt-2 w-100" id="contact" name="home_address_joint" placeholder="Flat/Building/Street Name" onfocusout="destroyline(this)" onfocus="createline(this)" required>
                                    <span class="underline" data-id='contact'></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="" class="que_col">Postal Code</label>
                                    <input type="text" class="borbottom form-control mt-2 " name="pin_code_joint" id="pincode" placeholder="pincode" onfocusout="destroyline(this)" onfocus="createline(this)">
                                    <span class="underline" data-id='pincode'></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3"></div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="" class="que_col">City</label>
                                    <input class="borbottom form-control my-1" id="city" name="city_joint" onfocusout="destroyline(this)" onfocus="createline(this)" readonly>
                                    <!-- <select class="borbottom mt-2 form-control mb-4  my-1" id="city" name="city" onfocusout="destroyline(this)" onfocus="createline(this)" required>
                                        <option>Select</option>
                                        <option>Indore</option>
                                        <option>Jabalpur</option>
                                        <option>Udaipur</option>
                                        <option>Pune</option>
                                    </select> -->
                                    <span class="underline" data-id='city'></span>
                                </div>
                            </div>

                            <div class="col-12 mb-2 col-md-3">
                                <div class="form-group">
                                    <label for="" class="que_col">State</label>
                                    <input class="borbottom form-control  my-1" id="state" name="state_joint" onfocusout="destroyline(this)" onfocus="createline(this)" readonly>
                                    <!-- <select class="borbottom mt-2 form-control  my-1" id="state" name="state" onfocusout="destroyline(this)" onfocus="createline(this)" required>
                                        <option>Select</option>
                                        <option>Assam</option>
                                        <option>Bihar</option>
                                        <option>Madhya Pradesh</option>
                                        <option>Maharashtra</option>
                                    </select> -->
                                    <span class="underline" data-id='state'></span>
                                </div>
                            </div>


                        </div>
                    </div>
                    <!-- additional detail -->
                    <div class="form-group mb-4">
                        <h4>Additional Details</h4>
                        <div class="row mt-5">
                            <div class="col-12  col-md-3">
                                <div class="form-group">
                                    <label for="" class="que_col mb-2">Place of Birth</label>
                                    <input type="text" class="borbottom form-control w-100" name="place_birth_joint" id="birth_place" placeholder="Birth Place" onfocusout="destroyline(this)" onfocus="createline(this)" required>
                                    <span class="underline" data-id='birth_place'></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="" class="que_col mb-2">Country of Birth</label>
                                    <select class="borbottom form-control m-auto w-100 my-1" name="birth_country_joint" id="birth_con" onfocusout="destroyline(this)" onfocus="createline(this)" required>
                                        <option>India</option>
                                        <option>Pakistan</option>
                                        <option>Nepal</option>
                                        <option>Iraq</option>
                                    </select>
                                    <span class="underline" data-id='birth_con'></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="" class="que_col mb-2">Occupation</label>
                                    <select class="borbottom form-control m-auto w-100 my-1" id="occupation" name="occupation_joint" onfocusout="destroyline(this)" onfocus="createline(this)" required>
                                        <option value="">Select</option>
                                        <option value="230">Agriculture</option>
                                        <option value="225">Business</option>
                                        <option value="232">Housewife</option>
                                        <option value="236">Others</option>
                                        <option value="224">Professional</option>
                                        <option value="231">Retired</option>
                                        <option value="229">Service</option>
                                        <option value="233">Student</option>
                                    </select>
                                    <span class="underline" data-id='occupation'></span>
                                </div>
                            </div>
                            <div class="col-12 mb-3 col-md-3">
                                <div class="form-group">
                                    <label for="" class="que_col mb-2">Gross annual income</label>
                                    <select class="borbottom form-control my-1" id="GAI" name="annual_income_joint" onfocusout="destroyline(this)" onfocus="createline(this)">
                                        <option value="">Select</option>
                                        <option value="237">Below 1 Lac</option>
                                        <option value="238">1 to 5 Lac</option>
                                        <option value="239">5 to 10 Lac</option>
                                        <option value="240">10 to 25 Lac</option>
                                        <option value="241">25 Lac to 1 Cr.</option>
                                        <option value="242">Above 1 Cr.</option>
                                    </select>
                                    <span class="underline" data-id='GAI'></span>
                                </div>
                            </div>
                            <!-- <div class="col-12"> -->
                            <div class="form-group">
                                <div class="row">
                                    <label for="" class="que_col mb-0">Father / Spouse Name</label>
                                    <div class="col-12 col-md-3">
                                        <div class="form-group">
                                            <label for="">&nbsp;</label><br>
                                            <input type="text" class="borbottom form-control w-100" name="father_name_joint" id="father_name" placeholder="First Name" onfocusout="destroyline(this)" onfocus="createline(this)" required>
                                            <span class="underline" data-id='father_name'></span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <div class="form-group">
                                            <label for="">&nbsp;</label><br>
                                            <input type="text" class="borbottom form-control w-100" id="father_Mname" placeholder="Middle Name" onfocusout="destroyline(this)" onfocus="createline(this)">
                                            <span class="underline" data-id='father_Mname'></span>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-2 col-md-3">
                                        <div class="form-group">
                                            <label for="">&nbsp;</label><br>
                                            <input type="text" class="borbottom form-control mb-3 w-100" id="father_Lname" placeholder="Last Name" onfocusout="destroyline(this)" onfocus="createline(this)" required>
                                            <span class="underline" data-id='father_Lname'></span>
                                        </div>
                                    </div>
                                    <label for="" class="que_col mb-0">Mother</label>
                                    <div class="col-12 col-md-3">
                                        <div class="form-group">
                                            <label for="">&nbsp;</label><br>
                                            <input type="text" class="borbottom form-control w-100" name="mother_name_joint" id="mother_name" placeholder="First Name" onfocusout="destroyline(this)" onfocus="createline(this)" required>
                                            <span class="underline" data-id='mother_name'></span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <div class="form-group">
                                            <label for="">&nbsp;</label><br>
                                            <input type="text" class="borbottom form-control w-100" id="mother_Mname" placeholder="Middle Name" onfocusout="destroyline(this)" onfocus="createline(this)">
                                            <span class="underline" data-id='mother_Mname'></span>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3 col-md-3">
                                        <div class="form-group">
                                            <label for="">&nbsp;</label><br>
                                            <input type="text" class="borbottom form-control w-100" id="mother_Lname" placeholder="Last Name" onfocusout="destroyline(this)" onfocus="createline(this)" required>
                                            <span class="underline" data-id='mother_Lname'></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <a href="investorkyc.php"><button type="button" class="btn btn-primary ">Back</button></a>
                        <button type="text" class="btn btn-success nominee">Add Nominee</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- </div> -->

    <div class="container nominee_page mt-4 d-none">
        <div class="panel panel-default nominee-panel" style="display: block;">
            <div class="kyc-title">
                <div class="head mt-5">Nominee</div>
            </div>
            <div>
                <div class="panel-body nominee-panel-body">
                    <div class="invest-form-left nomineeMDiv">
                        <!-- nominee start -->
                        <div class="kyc-info">
                            <div class="personal-details">
                                <input type="hidden" id="isDuplicate">
                                <div style="padding: 5px; box-shadow: rgb(204, 204, 204) 5px 5px 5px; border: 1px solid rgb(187, 187, 187); display: block;" id="nominee_div_1" class="nominee_div_class">
                                    <form action="" method="post" id="nominee_detail">
                                        <div class="row" style="text-align: center;display: flex;justify-content: center;padding:15px;">
                                            <div class="col-md-3">
                                                <div class="form-group is-empty">
                                                    <label class="control-label mb-1" for="name">Full Name</label>
                                                    <input class="form-control mb-3" data-maxlength="25" id="nominee_first_name1" data-nominee="1" name="nominee_first_name" placeholder="Name" type="text">
                                                    <span class="material-input"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group is-empty">
                                                    <label class="control-label mb-1" for="name">Email</label>
                                                    <input class="form-control" name="nominee_email" placeholder="abc@gmail.com" type="text">
                                                    <span class="material-input"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group is-empty">
                                                    <label class="control-label mb-1" for="name">PAN</label>
                                                    <input class="form-control restricted-size capitalizepan panValidation nomineePan" name="nominee_pan" placeholder="e.g. AAAPM1234X" type="text">
                                                    <span class="material-input"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group is-empty">
                                                    <label class="control-label mb-1" for="name">%</label>
                                                    <input class="form-control" name="nominee_per" placeholder="%" type="text">
                                                    <span class="material-input"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group is-empty">
                                                    <label class="control-label mb-1" for="pan">Date of Birth </label>
                                                    <input type="text" class="form-control" name="nominee_DOB" placeholder="dd/mm/yyyy">
                                                    <input type="hidden" name="minor1" id="minor1">
                                                    <span class="material-input"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group is-empty">
                                                    <label class="control-label mb-1" for="name">Address</label>
                                                    <input class="form-control" placeholder="" type="text" name="nominee_address">
                                                    <span class="material-input"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group is-empty">
                                                    <label class="control-label mb-1">City</label>
                                                    <!-- <input class="form-control" placeholder="" type="text"> -->
                                                    <select class="borbottom mt-2 form-control mb-4  my-1" id="city" name="nominee_city" onfocusout="destroyline(this)" onfocus="createline(this)">
                                                        <option>Select</option>
                                                        <option>Indore</option>
                                                        <option>Jabalpur</option>
                                                        <option>Udaipur</option>
                                                        <option>Pune</option>
                                                    </select>
                                                    <span class="material-input"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group is-empty">
                                                    <label class="control-label mb-1">Pincode</label>
                                                    <input class="form-control" placeholder="" type="text" name="nominee_pin">
                                                    <span class="material-input"></span>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group is-empty">
                                                    <label class="control-label mb-1" for="nominee_relation1">Relationship with Investor</label>
                                                    <select class="form-control" id="nominee_relation1" name="nominee_relation">
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
                                                    </select>
                                                    <span class="material-input"></span>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="d-none" id="sec_nominee">
                                            <div class="kyc-title">
                                                <div class="head mt-5">Nominee 2</div>
                                            </div>
                                            <div class="row" style="text-align: center;display: flex;justify-content: center;padding:15px;">
                                                <div class="col-md-3">
                                                    <div class="form-group is-empty">
                                                        <label class="control-label mb-1" for="name">Full Name</label>
                                                        <input class="form-control mb-3" data-nominee="1" name="nominee2_name" placeholder="Name" type="text">
                                                        <span class="material-input"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group is-empty">
                                                        <label class="control-label mb-1" for="name">Email</label>
                                                        <input class="form-control" name="nominee2_email" placeholder="abc@gmail.com" type="text">
                                                        <span class="material-input"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group is-empty">
                                                        <label class="control-label mb-1" for="name">PAN</label>
                                                        <input class="form-control" name="nominee2_pan" placeholder="e.g. AAAPM1234X" type="text">
                                                        <span class="material-input"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="form-group is-empty">
                                                        <label class="control-label mb-1" for="name">%</label>
                                                        <input class="form-control" name="nominee2_per" placeholder="%" type="text">
                                                        <span class="material-input"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group is-empty">
                                                        <label class="control-label mb-1" for="pan">Date of Birth </label>
                                                        <input type="text" class="form-control" name="nominee2_DOB" placeholder="dd/mm/yyyy">
                                                        <input type="hidden" name="minor1" id="minor1">
                                                        <span class="material-input"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group is-empty">
                                                        <label class="control-label mb-1" for="name">Address</label>
                                                        <input class="form-control" placeholder="" type="text" name="nominee2_address">
                                                        <span class="material-input"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group is-empty">
                                                        <label class="control-label mb-1">City</label>
                                                        <!-- <input class="form-control" placeholder="" type="text"> -->
                                                        <select class="borbottom mt-2 form-control mb-4  my-1" id="city" name="nominee2_city" onfocusout="destroyline(this)" onfocus="createline(this)">
                                                            <option>Select</option>
                                                            <option>Indore</option>
                                                            <option>Jabalpur</option>
                                                            <option>Udaipur</option>
                                                            <option>Pune</option>
                                                        </select>
                                                        <span class="material-input"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group is-empty">
                                                        <label class="control-label mb-1">Pincode</label>
                                                        <input class="form-control" placeholder="" type="text" name="nominee2_pin">
                                                        <span class="material-input"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group is-empty">
                                                        <label class="control-label mb-1" for="nominee_relation1">Relationship with Investor</label>
                                                        <select class="form-control" id="nominee_relation1" name="nominee2_relation">
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
                                                        </select>
                                                        <span class="material-input"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-none" id="third_nominee">
                                            <div class="kyc-title">
                                                <div class="head mt-5">Nominee 3</div>
                                            </div>
                                            <div class="row" style="text-align: center;display: flex;justify-content: center;padding:15px;">
                                                <div class="col-md-3">
                                                    <div class="form-group is-empty">
                                                        <label class="control-label mb-1" for="name">Full Name</label>
                                                        <input class="form-control mb-3" data-nominee="1" name="nominee3_name" placeholder="Name" type="text">
                                                        <span class="material-input"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group is-empty">
                                                        <label class="control-label mb-1" for="name">Email</label>
                                                        <input class="form-control" name="nominee3_email" placeholder="abc@gmail.com" type="text">
                                                        <span class="material-input"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group is-empty">
                                                        <label class="control-label mb-1" for="name">PAN</label>
                                                        <input class="form-control" name="nominee3_pan" placeholder="e.g. AAAPM1234X" type="text">
                                                        <span class="material-input"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="form-group is-empty">
                                                        <label class="control-label mb-1" for="name">%</label>
                                                        <input class="form-control" name="nominee3_per" placeholder="%" type="text">
                                                        <span class="material-input"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group is-empty">
                                                        <label class="control-label mb-1" for="pan">Date of Birth </label>
                                                        <input type="text" class="form-control" name="nominee3_DOB" placeholder="dd/mm/yyyy">
                                                        <input type="hidden" name="minor1" id="minor1">
                                                        <span class="material-input"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group is-empty">
                                                        <label class="control-label mb-1" for="name">Address</label>
                                                        <input class="form-control" placeholder="" type="text" name="nominee3_address">
                                                        <span class="material-input"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group is-empty">
                                                        <label class="control-label mb-1">City</label>
                                                        <!-- <input class="form-control" placeholder="" type="text"> -->
                                                        <select class="borbottom mt-2 form-control my-1" id="city" name="nominee3_city" onfocusout="destroyline(this)" onfocus="createline(this)">
                                                            <option>Select</option>
                                                            <option>Indore</option>
                                                            <option>Jabalpur</option>
                                                            <option>Udaipur</option>
                                                            <option>Pune</option>
                                                        </select>
                                                        <span class="material-input"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group is-empty">
                                                        <label class="control-label mb-1">Pincode</label>
                                                        <input class="form-control" placeholder="pin_code" type="text" name="nominee3_pin">
                                                        <span class="material-input"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group is-empty">
                                                        <label class="control-label mb-1">Relationship with Investor</label>
                                                        <select class="form-control" name="nominee3_relation">
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
                                                        </select>
                                                        <span class="material-input"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <div class="pull-right" id="addnominee" style="display: flex;justify-content: end;cursor: pointer;">
                                            <a class="add_nominee" style="text-decoration: underline;"><i class="fa fa-plus-circle"></i>Add Nominee</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        <div class="text-center">
                                            <button type="button" class="btn btn-danger">CANCEL</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </div>
                                </form>

                                <div class="clearfix">&nbsp;</div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            Note:
                                            <ul>
                                                <li>Nominee name as in PAN</li>
                                                <li>Nominee/Guardian name cannot be same as Primary Holder</li>
                                                <li>If any details are changed for Nominee, the Opt in/out nomination forms will need to be provided again</li>
                                                <li>Nominee details will not get updated in existing folios. To update in already existing folios, kindly write to <a href="mailto:support@happynessfactory.in">support@happynessfactory.in</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    $(window).on('load', function() {
        $('#myModal').modal('show');
    });
    $("#jointer").click(function() {
        $('.joint_page').removeClass('d-none');
        $('.nominee_page').addClass('d-none');
    });

    $("#pincode").on("input", function(e) {
        if ($(this).val() > 5) {
            $("#pincode").trigger("change");
        }
    });
    $("#pincode").change(function(e) {
        const data = $(this).val();
        fetch(`https://api.postalpincode.in/pincode/${data}`)
            .then((res) => res.json())
            .then((d) => {
                if (d[0]["Status"] === "Success") {
                    $("#city").val(d[0]["PostOffice"][0]["District"]);
                    $("#state").val(d[0]["PostOffice"][0]["State"]);
                    // $("#f-submit").attr("disabled", false);
                    $("#btn-2").removeAttr("disabled");
                } else {
                    $("#city").val("");
                    $("#state").val("");
                    //  $("#f-submit").attr("disabled", true);
                }
            });
    })
    $(".nominee").click(function() {
        $('.nominee_page').removeClass('d-none');
        $('.joint_page').addClass('d-none');
    });
    $("#addnominee").click(function() {
        $('#sec_nominee').removeClass('d-none');
        $('#third_nominee').removeClass('d-none');
    })
    $("#joint_h_detail").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        // console.log(data);
        $.ajax({
            method: "post",
            url: "./UserData.php",
            data: {
                "holder_detail": data
            },
            dataType: "json",
            success: function(data) {
                // console.log(pan_num); window.location.href="./question.php";
                // window.location.href = "./other_investor.php";
            }
        });
    })

    $("#nominee_detail").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            method: "post",
            url: "./UserData.php",
            data: {
                "nominee_details": data
            },
            dataType: "json",
            success: function(data) {
                console.log("hello");
                // console.log(pan_num); window.location.href="./question.php";
                // window.location.href = "./other_investor.php";
            }
        });
    })

    function createline(e) {
        document.querySelector(`.underline[data-id="${e.id}"]`).style.transform = 'scaleX(1)';
    }

    function destroyline(e) {
        document.querySelector(`.underline[data-id="${e.id}"]`).style.transform = 'scaleX(0)';
    }
</script>

</html>