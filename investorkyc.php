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
    <title>Investor KYC</title>
</head>
<style>
    body {
        background-color: #f9f9f9;
    }

    #ui-datepicker-div {
        display: none;
        background-color: #fff;
        box-shadow: 0 0.125rem 0.5rem rgba(0, 0, 0, 0.1);
        margin-top: 0.25rem;
        border-radius: 0.5rem;
        padding: 0.5rem;
    }

    .ui-datepicker-calendar tbody td a {
        display: block;
        border-radius: 0.25rem;
        line-height: 2rem;
        transition: 0.3s all;
        color: #546E7A;
        font-size: 0.875rem;
        text-decoration: none;
    }

    .ui-datepicker-calendar tbody td a:hover {
        background-color: #E0F2F1;
    }

    .ui-datepicker-calendar tbody td a.ui-state-active {
        background-color: #009688;
        color: white;
    }

    .ui-datepicker-header a.ui-corner-all {
        cursor: pointer;
        position: absolute;
        top: 0;
        width: 2rem;
        height: 2rem;
        margin: 0.5rem;
        border-radius: 0.25rem;
        transition: 0.3s all;
    }

    .ui-datepicker-header a.ui-corner-all:hover {
        background-color: #ECEFF1;
    }

    .ui-datepicker-header a.ui-datepicker-prev {
        left: 0;
        background: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMyIgaGVpZ2h0PSIxMyIgdmlld0JveD0iMCAwIDEzIDEzIj48cGF0aCBmaWxsPSIjNDI0NzcwIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik03LjI4OCA2LjI5NkwzLjIwMiAyLjIxYS43MS43MSAwIDAgMSAuMDA3LS45OTljLjI4LS4yOC43MjUtLjI4Ljk5OS0uMDA3TDguODAzIDUuOGEuNjk1LjY5NSAwIDAgMSAuMjAyLjQ5Ni42OTUuNjk1IDAgMCAxLS4yMDIuNDk3bC00LjU5NSA0LjU5NWEuNzA0LjcwNCAwIDAgMS0xLS4wMDcuNzEuNzEgMCAwIDEtLjAwNi0uOTk5bDQuMDg2LTQuMDg2eiIvPjwvc3ZnPg==");
        background-repeat: no-repeat;
        background-size: 0.5rem;
        background-position: 50%;
        transform: rotate(180deg);
    }

    .ui-datepicker-header a.ui-datepicker-next {
        right: 0;
        background: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMyIgaGVpZ2h0PSIxMyIgdmlld0JveD0iMCAwIDEzIDEzIj48cGF0aCBmaWxsPSIjNDI0NzcwIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik03LjI4OCA2LjI5NkwzLjIwMiAyLjIxYS43MS43MSAwIDAgMSAuMDA3LS45OTljLjI4LS4yOC43MjUtLjI4Ljk5OS0uMDA3TDguODAzIDUuOGEuNjk1LjY5NSAwIDAgMSAuMjAyLjQ5Ni42OTUuNjk1IDAgMCAxLS4yMDIuNDk3bC00LjU5NSA0LjU5NWEuNzA0LjcwNCAwIDAgMS0xLS4wMDcuNzEuNzEgMCAwIDEtLjAwNi0uOTk5bDQuMDg2LTQuMDg2eiIvPjwvc3ZnPg==');
        background-repeat: no-repeat;
        background-size: 10px;
        background-position: 50%;
    }

    .ui-datepicker-header a>span {
        display: none;
    }

    .ui-datepicker-title {
        text-align: center;
        line-height: 2rem;
        margin-bottom: 0.25rem;
        font-size: 0.875rem;
        font-weight: 500;
        padding-bottom: 0.25rem;
    }

    .ui-datepicker-week-col {
        color: #78909C;
        font-weight: 400;
        font-size: 0.75rem;
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

    .d-none {
        display: none;
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
    <!-- <div class="container"> -->
    <div class="container mt-4">
        <div class="head mt-5">Investor Information</div>
        <div class="row top_row mt-3">
            <div class="col-md-12" style="position:relative;margin-left:13px;">
                <div class="form-group mt-4">
                    <label class="control-label que_col" for="name">Are you a resident of USA/Canada?</label> &nbsp;&nbsp;
                    <input type="radio" class="start_radio" value="yes_box" id="yes_id" name="radio1">&nbsp;<label for="yes_id" style="cursor:pointer;">Yes</label>
                    <input type="radio" class="start_radio" value="no_box" id="no_id" name="radio1" style="margin-left: 5%;">&nbsp;<label for="no_id" style="cursor:pointer;">No</label>
                </div><br>
                <div style="padding: 20px;" class="d-none yes_box">
                    <p style=" font-size: 17px;font-weight: 600;font-family: math;width: 90%; margin: auto;">The Regulatory framework does not allow USA/Canada residents to transact online in mutual funds. We hope that changes in regulations in the future would enable you to transact as well through Swaraj Wealth.</p>
                </div>
                <form action="" method="post" id="sub_data">
                    <div class="d-none no_box">
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="" class="que_col">Enter PAN </label>
                                <input type="text" class="borbottom w-100 form-control rounded-xs" name="pan_num" id="pannum" style="border: none;border-bottom: 1px solid #b7b7b7;" onfocusout="destroyline(this)" onfocus="createline(this)" required>
                                <span class="underline" data-id='pannum'></span>
                            </div>
                        </div><br>
                        <div class="form-group">
                            <h4>Personal Details</h4>
                            <?php
                            $sql = "SELECT * FROM `client_register` WHERE email = '{$_SESSION['goaluser']}' ";
                            $query = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($query) > 0) {
                                foreach ($query as $row) {
                                    // echo $row['full_name'];
                                }
                            } else {
                                echo "No Record Found";
                            }
                            
                            ?>
                            <div class="row">
                                <label for="" class="que_col" style="padding:16px;">Name (as in PAN)</label>
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label for="">&nbsp;</label><br>
                                        <input type="text" value="<?php echo $row['full_name'] ?>" class="borbottom form-control rounded-xs" name="f_name" style="border: none;border-bottom: 1px solid #b7b7b7;" id="f_name" placeholder="First Name" onfocusout="destroyline(this)" onfocus="createline(this)">
                                        <span class="underline" data-id='f_name'></span>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label for="">&nbsp;</label><br>
                                        <input type="text" class="borbottom form-control rounded-xs" id="m_name" name="m_name" placeholder="Middle Name" onfocusout="destroyline(this)" onfocus="createline(this)">
                                        <span class="underline" data-id='m_name'></span>
                                    </div>
                                </div>
                                <div class="col-12  col-md-3">
                                    <div class="form-group">
                                        <label for="">&nbsp;</label><br>
                                        <input type="text" class="borbottom form-control rounded-xs" id="l_name" name="l_name" placeholder="Last Name" onfocusout="destroyline(this)" onfocus="createline(this)">
                                        <span class="underline" data-id='l_name'></span>
                                    </div>
                                </div>

                            </div><br>
                            <div class="row">
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label for="" class="que_col">Date of Birth</label><br>
                                        <input type="text" class="borbottom form-control mb-2 mt-2 w-100" name="dob" id="dob" placeholder="Date" onfocusout="destroyline(this)" onfocus="createline(this)" required>
                                        <span class="underline" data-id='dob'></span>
                                    </div>
                                </div>
                                <div class="col-12 mb-2 col-md-3">
                                    <div class="form-group">
                                        <label for="" class="que_col">Gender</label><br>
                                        <select class="borbottom m-auto form-control mt-2 mb-2 w-100 my-1" id="gender" name="gender" onfocusout="destroyline(this)" onfocus="createline(this)">
                                            <option>Select</option>
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
                                        <select class="borbottom form-control m-auto w-100 my-1" id="mar_status" name="martial_status" onfocusout="destroyline(this)" onfocus="createline(this)"> <i class="fa-solid fa-arrow-down" style="color:red;font-size:18px;"></i>
                                            <option>Select</option>
                                            <option>Single </option>
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
                                        <input type="text" value="<?php echo $row['phone_no'] ?>" class="borbottom form-control mt-2 mb-2 w-100" name="mob_no" id="mob_num" placeholder="Mobile number" onfocusout="destroyline(this)" onfocus="createline(this)">
                                        <span class="underline" data-id='mob_num'></span>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label for="" class="que_col">Email</label>
                                        <input type="text" value="<?php echo $row['email'] ?>" class="borbottom mt-2 form-control w-100" name="email" id="email" placeholder="Enter Email" onfocusout="destroyline(this)" onfocus="createline(this)">
                                        <span class="underline" data-id='email'></span>
                                    </div>
                                </div>
                            </div>
                        </div><br><br>
                        <div class="form-group">
                            <h4>Address Details</h4>
                            <div class="row mt-4">
                                <div class="col-12 mb-4 col-md-6">
                                    <div class="form-group">
                                        <label for="" class="que_col">Contact Address</label>
                                        <input type="text" class="borbottom form-control mt-2 w-100" id="contact" name="home_address" placeholder="Flat/Building/Street Name" onfocusout="destroyline(this)" onfocus="createline(this)" required>
                                        <span class="underline" data-id='contact'></span>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label for="" class="que_col">Postal Code</label>
                                        <input type="text" class="borbottom form-control" name="pin_code" id="pincode" placeholder="pincode" onfocusout="destroyline(this)" onfocus="createline(this)">
                                        <span class="underline" data-id='pincode'></span>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3"></div>
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label for="" class="que_col">City</label>
                                        <input class="borbottom form-control my-1" id="city" name="city" onfocusout="destroyline(this)" onfocus="createline(this)" readonly>

                                        <!-- <select class="borbottom mt-2 form-control mb-4  my-1" id="city" name="city" onfocusout="destroyline(this)" onfocus="createline(this)">
                                            <option>Select</option>
                                            <option>Indore</option>
                                            <option>Jabalpur</option>
                                            <option>Udaipur</option>
                                            <option>Pune</option>
                                        </select> -->
                                        <span class="underline" data-id='city'></span>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label for="" class="que_col">State</label>
                                        <input class="borbottom form-control  my-1" id="state" name="state" onfocusout="destroyline(this)" onfocus="createline(this)" readonly>
                                        <!-- <select class="borbottom mt-2 form-control  my-1" id="state" name="state" onfocusout="destroyline(this)" onfocus="createline(this)">
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
                        <div class="form-group">
                            <h4>Bank Account Details</h4>
                            <div class="row mt-4 mb-2">
                                <div class="col-12  col-md-3">
                                    <div class="form-group">
                                        <label for="" class="que_col">IFSC</label><br>
                                        <input type="text" class="ifsc borbottom form-control mt-2 w-100" id="ifsc" name="ifci_num" placeholder="IFSC Number" onfocusout="destroyline(this)" onfocus="createline(this)" required>
                                        <span class="underline" data-id='ifsc'></span>
                                    </div>
                                </div>
                                <div class="col-12 mb-2 col-md-3">
                                    <div class="form-group">
                                        <label for="" class="que_col">Bank Name</label>
                                        <input type="text" class="borbottom m-auto form-control w-100 my-1" id="bank_name" name="bank_name" onfocusout="destroyline(this)" onfocus="createline(this)" required>
                                        <!-- <select class="borbottom m-auto form-control mb-2 w-100 my-1" id="bank_name" name="bank_name" onfocusout="destroyline(this)" onfocus="createline(this)" required>
                                            <option></option>
                                            <option>Indusind Bank</option>
                                            <option>Bank of Maharashtra</option>
                                            <option>Bank of India</option>
                                            <option>Bank of Baroda</option>
                                            <option>ICICI</option>
                                        </select> -->
                                        <span class="underline" data-id='bank_name'></span>
                                    </div>
                                </div>
                                <div class="col-12 mb-2 col-md-3">
                                    <div class="form-group">
                                        <label for="" class="que_col">City</label><br>
                                        <input type="text" class="borbottom form-control m-auto mt2 w-100 my-1" id="bank_city" name="bank_city" onfocusout="destroyline(this)" onfocus="createline(this)">
                                        <!-- <select class="borbottom form-control m-auto mt2 w-100 my-1" id="bank_city" name="bank_city" onfocusout="destroyline(this)" onfocus="createline(this)">
                                            <option>Select City</option>
                                            <option>Jabalpur</option>
                                            <option>Nagpur</option>
                                            <option>Jaipur</option>
                                            <option>Indore</option>
                                            <option>Bangalore</option>
                                        </select> -->
                                        <span class="underline" data-id='bank_city'></span>
                                    </div>
                                </div>
                                <div class="col-12 mb-2 col-md-3">
                                    <div class="form-group">
                                        <label for="" class="que_col">Branch Address</label><br>
                                        <input type="text" class="borbottom form-control mt-2 w-100" id="bank_branch" name="branch_name" placeholder="Branch Address" onfocusout="destroyline(this)" onfocus="createline(this)" required>
                                        <span class="underline" data-id='bank_branch'></span>
                                    </div>
                                </div>
                                <div class="col-12 mb-2 col-md-3 mb-3">
                                    <div class="form-group">
                                        <label for="" class="que_col">Account Type</label>
                                        <select class="borbottom form-control mt-2 w-100 " id="acc_type" name="account_type" onfocusout="destroyline(this)" onfocus="createline(this)" required>
                                            <!-- <option>Select</option> -->
                                            <option>Saving</option>
                                            <option>Current</option>
                                        </select>
                                        <span class="underline" data-id='acc_type'></span>
                                    </div>
                                </div>
                                <div class="col-12 mb-2 col-md-3">
                                    <div class="form-group">
                                        <label for="" class="que_col">Account Number</label><br>
                                        <input type="text" class="borbottom form-control mt-2 my-2" id="acc_num" name="ac_num" placeholder="Account Number" onfocusout="destroyline(this)" onfocus="createline(this)" required>
                                        <span class="underline" data-id='acc_num'></span>
                                    </div>
                                </div>

                            </div><br>
                        </div>
                        <div class="form-group">
                            <h4>Additional Details</h4>
                            <div class="row mt-5">
                                <div class="col-12  col-md-3">
                                    <div class="form-group">
                                        <label for="" class="que_col mb-2">Place of Birth</label>
                                        <input type="text" class="borbottom form-control w-100" name="place_birth" id="birth_place" placeholder="Birth Place" onfocusout="destroyline(this)" onfocus="createline(this)" required>
                                        <span class="underline" data-id='birth_place'></span>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label for="" class="que_col mb-2">Country of Birth</label>
                                        <select class="borbottom form-control m-auto w-100 my-1" name="birth_country" id="birth_con" onfocusout="destroyline(this)" onfocus="createline(this)" required>
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
                                        <select class="borbottom form-control m-auto w-100 my-1" id="occupation" name="occupation" onfocusout="destroyline(this)" onfocus="createline(this)">
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
                                        <select class="borbottom m-auto w-75 form-control my-1" id="GAI" name="annual_income" onfocusout="destroyline(this)" onfocus="createline(this)">
                                            <option value="">Select</option> <i class="fa-solid fa-arrow-down"></i>
                                            <option value="237">Below 1 Lac</option>
                                            <option value="238">1 Lac to 2.5 Lac</option>
                                            <option value="239">2.5 Lac to 5 Lac</option>
                                            <option value="240">5 Lac to 10 Lac</option>
                                            <option value="241">10 Lac to 15 Lac</option>
                                            <option value="241">15 Lac to 20 Lac</option>
                                            <option value="241">20 Lac to 25 Lac</option>
                                            <!-- <option value="242">Above 1 Cr.</option> -->
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
                                                <input type="text" class="borbottom form-control w-100" name="father_name" id="father_name" placeholder="First Name" onfocusout="destroyline(this)" onfocus="createline(this)" required>
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
                                                <input type="text" class="borbottom form-control mb-3 w-100" id="father_Lname" placeholder="Last Name" onfocusout="destroyline(this)" onfocus="createline(this)">
                                                <span class="underline" data-id='father_Lname'></span>
                                            </div>
                                        </div>
                                        <label for="" class="que_col mb-0">Mother</label>
                                        <div class="col-12 col-md-3">
                                            <div class="form-group">
                                                <label for="">&nbsp;</label><br>
                                                <input type="text" class="borbottom form-control w-100" name="mother_name" id="mother_name" placeholder="First Name" onfocusout="destroyline(this)" onfocus="createline(this)" required>
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
                                                <input type="text" class="borbottom form-control w-100" id="mother_Lname" placeholder="Last Name" onfocusout="destroyline(this)" onfocus="createline(this)">
                                                <span class="underline" data-id='mother_Lname'></span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- <div class="form-group mt-4">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="" class="que_col">Are you a tax resident of a country other than India?</label><br>
                                        <select class="borbottom m-auto mb-3 col-md-6 form-control my-1" id="residence" onchange="tax_detail(this)" onfocusout="destroyline(this)" onfocus="createline(this)">
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                    </div>
                                </div><br>
                                <div class="col-12 col-md-12 d-none" id="tax_detils">
                                    <label for="" class="que_col">Tax residency information of countries other than India</label><br>
                                    <div class="row">
                                        <div class="col-12 mb-2 col-md-6 text-center">
                                            <select class="borbottom w-75 mb-3 col-md-6 m-auto my-1">
                                                <option value=""></option>
                                                <option value="">Pakistan</option>
                                                <option value="">Iraq</option>
                                                <option value="">Nepal</option>
                                            </select>
                                            <select class="borbottom w-75  mb-4 m-auto col-md-6 my-1">
                                                <option value="">Social Security Number</option>
                                                <option value=""></option>
                                                <option value=""></option>
                                                <option value=""></option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-6 text-center">
                                            <select class="borbottom w-75 mb-3 col-md-6 m-auto my-1">
                                                <option value=""></option>
                                                <option value="">Pakistan</option>
                                                <option value="">Iraq</option>
                                                <option value="">Nepal</option>
                                            </select>
                                            <select class="borbottom w-75 mb-2 m-auto col-md-6 my-1">
                                                <option value="">Social Security Number</option>
                                                <option value=""></option>
                                                <option value=""></option>
                                                <option value=""></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="./assets/bootstrap.bundle.min.js"></script>
<script>
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

    // $(".ifsc").change(function() {

    // });

    $("#ifsc").change(function(e) {
        const data = $(this).val();
        if (data != "") {
            fetch(`https://ifsc.razorpay.com/${data}`)
                .then((res) => res.json())
                .then((d) => {
                    $("#bank_name").val(d["BANK"]);
                    $("#bank_city").val(d["CITY"]);
                    $("#bank_branch").val(d["ADDRESS"]);
                    // console.log(d);
                });
        }
        var inputvalues = $(this).val();
        var reg = /[A-Z|a-z]{4}[0][a-zA-Z0-9]{6}$/;
        if (inputvalues.match(reg)) {
            return true;
        } else {
            $("#ifsc").val("");
            alert("You entered invalid IFSC code");
            //document.getElementById("txtifsc").focus();    
            return false;
        }
    });

    $(function() {
        $("#dob").datepicker({
            dateFormat: "dd-mm-yy",
            duration: "fast"
        });
    });
    $("#sub_data").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        console.log(data);
        $.ajax({
            method: "post",
            url: "./UserData.php",
            data: {
                "details": data
            },
            dataType: "json",
            success: function(data) {
                // console.log(pan_num); window.location.href="./question.php";
                window.location.href = "./other_investor.php";
            }
        });
    })
    $("#yes_id").click(function() {
        $('.yes_box').removeClass('d-none');
        $('.no_box').addClass('d-none');
    })
    $("#no_id").click(function() {
        $('.no_box').removeClass('d-none');
        $('.yes_box').addClass('d-none');
    })

    function tax_detail(answer) {
        console.log(answer.value);
        if (answer.value == 1) {
            document.getElementById("tax_detils").classList.remove('d-none');
        } else {
            document.getElementById("tax_detils").classList.add('d-none');
        }
    }

    function createline(e) {
        document.querySelector(`.underline[data-id="${e.id}"]`).style.transform = 'scaleX(1)';
    }

    function destroyline(e) {
        document.querySelector(`.underline[data-id="${e.id}"]`).style.transform = 'scaleX(0)';
    }
</script>

</html>