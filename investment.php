<?php
session_start();
require_once("./connect.php");
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="./assets/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/style.css">
    <title>Investment</title>

    <style>
        .card-header {
            background-color: lightgray;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td {
            border: 1px solid #fff;
            text-align: left;
            background-color: #fff;
            padding: 8px;
        }

        th {
            background-color: #dddddd;
            padding: 8px;
            text-align: left;
        }

        .li_style {
            list-style-type: none;
        }

        .input_style {
            border: none;
            /* box-sizing: border-box; */
            border-bottom: 2px solid rgb(189, 194, 194);
            width: 20%;
            text-align: center;
        }

        .input_style:focus {
            outline: none;
        }

        @media (min-width: 576px) {
            .modal-dialog {
                max-width: 950px;
            }
        }

        .style_input {
            border: none;
            border-bottom: 1px solid black;
            text-align: center;
            font-size: 15px;
            width: 86%;
        }

        .style_input:focus {
            /* background-color: red; */
            outline: none;
        }

        .goals_table table thead tr th {
            border: 3px solid #ffffff;
            border-radius: 10px;
            padding: 10px;
        }

        #total_goal thead tr th {
            border: 3px solid #ffffff;

        }

        .goals_table table tbody tr th {
            border: 2px solid #fff;
            border-radius: 12px;
        }

        .th_style {
            vertical-align: middle;
            text-align: center;
            font-size: 19px;
            text-transform: capitalize;
        }

        .declare-container {
            position: fixed;
            right: 27px;
            bottom: 0px;
            text-align: center;
            width: 80px;
            z-index: 5;
        }

        .declare-container p {
            font-size: 12px;
            font-weight: 600;
        }

        .goal-box {
            position: relative;
            display: flex;
            flex-wrap: nowrap;
            align-items: center;
        }

        .goal-img {
            text-align: center;
        }

        .goal-img span {
            display: block;
        }

        .goal-img img {
            width: 70px;
        }




        .accordionItem {
            float: left;
            display: block;
            width: 100%;
            box-sizing: border-box;
            font-family: 'Open-sans', Arial, sans-serif;
        }

        .tipDiv {
            float: left;
            text-align: center;
            background-color: #00beff;
            color: white;
            padding: 0px 4px;
        }

        h5 {
            margin-top: 7px;
        }

        .tipText {
            font-size: 14px;
            margin-top: 7px;
            margin-left: 10%;
        }
    </style>
</head>

<body>
    <?php include("./header.php"); ?>
    <div class="container-fluid mt-5 ">
        <div class="card">

            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Accordion Item #1

                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="panel-body">
                                <?php
                                $query = "SELECT * FROM `user_fund`  where user_email='{$_SESSION['goaluser']}'";
                                $result = $conn->query($query);
                                if ($result->num_rows > 0) {
                                    // $options = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                    // var_dump($options);
                                    $options = mysqli_fetch_all($result, MYSQLI_ASSOC);  // $arr =....
                                    $fundwise_data = array();
                                    $fundwise_data["Fixed Deposit"] = array();
                                    $fundwise_data["Recurring Deposit"] = array();
                                    $fundwise_data["Mutual Fund"] = array();
                                    $fundwise_data["Equity"] = array();
                                    $fundwise_data["Gold"] = array();

                                    foreach ($options as $key => $value) {
                                        $fundwise_data[$value["fund_type"]] = $value;
                                    }
                                }


                                ?>
                                <div class="existingInvestments_block02 existingInvestments_block02_62752">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group is-empty"><label class="control-label" for="gender">&nbsp;</label>
                                                <!-- <select class="form-control select_investment" name="investmentClass"> -->
                                                <select class="form-control select_investment" name="investmentClass" onchange="getOption()">
                                                    <option>Select Course</option>
                                                    <?php
                                                    foreach ($options as $option) {
                                                    ?>
                                                        <option value="<?php echo $option['investment_amt']?>"><?php echo $option['fund_type']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                                <!-- </select><span class="material-input"></span> -->
                                            </div>
                                        </div>

                                        <div class="col-md-3 allocation_lumsum_div  allocation_lumsum_62752">
                                            <div class="form-group is-empty">
                                                <div class="rupee-amount-text"><label class="control-label" for="email">Enter Lumpsum</label><i class="fa fa-inr"></i><input class="form-control mandatory inrFormat lumsumamtAllocatedAmount" value="" id="userLumsumamt_62752" name="lumsumamtAllocatedAmount" placeholder="" type="text" data-action="add"></div>
                                                <p class="declare-help">Available Amount: <i class="fa fa-inr"></i>
                                                <span class="output"></span>
                                                    <?php
                                                    // foreach ($fundwise_data as $key => $value) {
                                                    //     // var_dump($value);
                                                    //     $markup = "<span class='sipAvailableAmt'>
                                                    // <label for='' class='col-2'>$key</label>";
                                                    //     if (count($value) > 0) {
                                                    //         $markup .= "<input type='text' class='col-3 input_style pre_value' id='invetment_amt' value='{$value["investment_amt"]}' >
                                                    //     </span>";
                                                    //     }
                                                    //     echo $markup;
                                                    // }
                                                    ?>


                                                <!-- </p><span class="material-input"></span> -->
                                            </div>
                                        </div>

                                        <script type="text/javascript">
                                            function getOption() {
                                                selectElement = document.querySelector('.select_investment');
                                                output = selectElement.value;
                                                document.querySelector('.output').textContent = output;
                                            }
                                        </script>

                                    </div>
                                    <div class="col-md-3 allocation_encash_div allocation_encash_62752" "><div class=" form-group">
                                        <div class="checkbox chkboxMargin"><label class="control-label"><input type="checkbox" id="encashCheckbox_62752" data-extinvestpk="20385" data-action="add" data-plangoalpk="62752" value="1"><span class="checkbox-material"><span class="check"></span></span> Encash and Re-Invest</label></div>
                                    </div>
                                </div>
                                <div class="existingInvestments_block01">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p>Reinvest Lumpsum Amount:</p>
                                            <h5 data-additionallumpsumapi="0"><i class="fa fa-inr"></i><span class="additionalLumpsum_62752">0</span></h5>
                                        </div>
                                        <div class="col-md-3">
                                            <p>Reinvest SIP Amount:</p>
                                            <h5 data-additionalsipapi="0"><i class="fa fa-inr"></i><span class="additionalSip_62752">0</span></h5>
                                        </div>
                                        <div class="col-md-3">
                                            <p>Top-up Required:</p>
                                            <h5><i class="fa fa-inr"></i><span class="topup_62752" data-changedtopupsip="672">672</span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row allocation_apply_div allocation_apply_62752" "><div class=" col-md-12">
                                <div class="declare-help  text-center"><button type="button" href="javascript:void(0)" class="btn btn-raised btn-primary allocationApplybtn" id="allocationApplybtn_62752" data-plngoalpk="62752">APPLY</button></div>
                            </div>
                        </div>
                    </div><input type="hidden" class="" value="0">
                    <div class="existingInvestments_block03 allocatedClasses_62752">
                        <div class="row allocatedClassHeading allocatedClassCount_62752" style="display:none">
                            <div class="col-md-3">
                                <h4>Investment class</h4>
                            </div>
                            <div class="col-md-3">
                                <h4>Lumpsum Amount</h4>
                            </div>
                            <div class="col-md-2">
                                <h4>SIP Amount</h4>
                            </div>
                            <div class="col-md-2">
                                <h4>Reinvest</h4>
                            </div>
                            <div class="col-md-2">
                                <h4>Action</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Accordion Item #2
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Accordion Item #3
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                </div>
            </div>
        </div>


    </div>
    </div>




    <div class="goals_table">

    </div>

    <div class="mt-5 mb-4" style="text-align:center;">
        <a class="btn btn-primary" href="dashboard.php">Previous</a>
        <button type="button" class="btn btn-success" id="btn_web" style="width:14%;" onclick="topupsip()">View Recommandation</button>
    </div>





    </div>
    </div>

    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog  modal-lg ">
            <div class="modal-content">
                <div class="modal-header" style="background-color: darkred;color: #fff;">
                    <h4 class="modal-title" style="font-size: 25px;font-family: auto;">Exsiting Asset</h4>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <?php
                $sql = "SELECT * FROM `user_fund` where user_email='{$_SESSION['goaluser']}'";
                $result = mysqli_query($conn, $sql);
                $arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
                // var_dump($arr);
                $fundwise_data = array();
                $fundwise_data["Fixed Deposit"] = array();
                $fundwise_data["Recurring Deposit"] = array();
                $fundwise_data["Mutual Fund"] = array();
                $fundwise_data["Equity"] = array();
                $fundwise_data["Gold"] = array();

                // var_dump($fundwise_data);
                foreach ($arr as $key => $value) {
                    $fundwise_data[$value["fund_type"]] = $value;
                }
                // var_dump($fundwise_data);


                ?>
                <form id="fund-table" action="">
                    <div class="modal-body">
                        <div class="row" class="fund_data">
                            <?php
                            foreach ($fundwise_data as $key => $value) {
                                $markup = "<div class='form-group'>
                            <label for='' class='col-2'>$key</label>";
                                if (count($value) > 0) {
                                    $markup .= "<input type='hidden' name='fund_deposit[]' value='$key'>
                                <input type='text' class='col-3 input_style pre_value' id='invetment_amt' value='{$value["investment_amt"]}'  placeholder='₹ Enter Value' name='fund_amt[]' >
                                <input type='text' class='col-3 input_style dur_per' value='{$value["duration"]}'  placeholder='Duration (No. of Year)' name='duration[]'>
                                <input type='text' class='col-3 input_style rate_per' value='{$value["percent"]}' placeholder='Intreset %' name='percent[]'>
                                <input type='text' class='fd_fv_value d-none'>
                                </div>";
                                } else {
                                    $markup .= "<input type='hidden' name='fund_deposit[]' value='$key'>
                                <input type='text' class='col-3 input_style pre_value' value=''  placeholder='₹ Enter Value' name='fund_amt[]' >
                                <input type='text' class='col-3 input_style dur_per' value=''  placeholder='Duration (No. of Year)' name='duration[]'>
                                <input type='text' class='col-3 input_style rate_per' value='' placeholder='Intreset %' name='percent[]'>
                                <input type='text' class='fd_fv_value d-none'>
                                </div>";
                                }
                                echo $markup;
                            }
                            ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <button class="btn btn-primary" onclick="fetch_data()"> Show Value</button> -->
                        <button class="btn btn-primary" type="submit" data-bs-toggle="modal" data-bs-target="#myModal1">Save and
                            Contine</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
    <div class="declare-container hidden-sm hidden-xs">
        <a type="button" class="btn1 btn-default1 declear_existing_investment" data-bs-toggle="modal" data-bs-target="#myModal" value="add" id="moredrop_dowp" style="float:right" ;>
            <i class="fa fa-plus-circle fa-3x"></i>
            <p>DECLARE<br>EXISTING<br>ASSETS</p>
        </a>
    </div>

    <div class="modal fade" id="myModal1" role="dialog">
        <div class="modal-dialog" style="width:69%;">
            <div class="modal-content">
                <div class="modal-header" style="background-color: gray;color: #fff;">
                    <h4 class="modal-title" style="font-size: 25px;font-family: auto;">ALLOCATE EXISTING ASSETS</h4>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- <form action="#" method="post"> -->
                    <div class="row">
                        <div class="col-md-12" style="text-align:center;">
                            <div class="topup_note">
                                <p>You may allocate your existing assets to your goals below. <br> Your total Top-up SIP will be updated as you allocate the funds. Currently,</p>
                                <h3>Total Top-up SIP Required:<br><i class="fa fa-inr"></i><span id="mothly-plan" style="color:black;" class="totalTopUpSip" data-totaltopup=""></span></h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12" id="investment_list">


                        </div>
                    </div>
                    <!-- </form> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</body>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="./assets/bootstrap.bundle.min.js"></script>
<script>
    function fetchval() {

        const markup = `<div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Accordion Item #1
                   
                </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Accordion Item #2
                </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Accordion Item #3
                </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.</div>
                </div>
            </div>
            </div>`

        document.getElementById("investment_list").innerHTML += markup;
    }

    // var instment = document.getElementById("invetment_amt").value;

    // document.getElementById("investment").innerHTML = instment;

    $(document).on("click", "#cust_btn", function() {

        $("#myModal1").modal("toggle");

    })


    function removeel(value) {
        console.dir(value.parentElement.remove());

    }

    $('form#fund-table').bind('submit', function() {
        $.ajax({
            type: 'post',
            url: './UserData.php',
            data: {
                add_user_fund: $('form').serialize()
            },
            success: function() {
                // alert('form was submitted');
                // fetchval()
            }
        });
        return false;
    });

    function cal_lumpsum(amount, year) {
        let fv = amount
        let a = ((1 + (12 / 100)) ** year);
        let b = fv / a;
        let c = b.toFixed(0);
        return c
    }


    function top_up_sip(id) {

        //fv_of_sip
        let P = $(`#goal-id-${id} #mothly_sip`).val();
        let rate = 12;
        let years = $(`#goal-id-${id} .f-age`).html();
        let Rss = ((rate / 100) / 12);
        let Y = years * 12;
        let d = P * (((1 + Rss) ** Y) - 1);
        let e = 1 + Rss;
        let f = d * e;
        let ans = f / Rss;
        $(`#goal-id-${id} #sip-answer`).val(ans.toFixed(0));
        // console.log(ans);


        // fv_of_lumpsum
        let pv = $(`#goal-id-${id} #lumpsum_sip`).val();
        let rates = 12;
        let Rs = (rates / 100);
        let n = $(`#goal-id-${id} .f-age`).html();
        let rs = (1 + Rs) ** n;
        let answer = pv * rs;
        $(`#goal-id-${id} #lumpsum-answer`).val(answer.toFixed(0));
        // console.log(answer);

        // top_up_sip_required        
        sip = ans;
        lumpsum = answer;
        total_planinv = (sip + lumpsum);
        asset = 100000;
        total_asset = (total_planinv + asset);
        fv = $(`#goal-id-${id}`).closest("div").find("span").attr("data-fv") - total_asset;
        // console.log( fv,total_asset);

        // let fv = 100000;
        // let rate  = 12 ;
        let G = (10 / 100);
        let G1 = G + 0.00001;
        // let n = 15 ;
        let R = rate / 100;
        let a = ((1 + R) ** (1 / 12) - 1);
        let r1 = (a * 12);
        let r = r1 / 12;

        if (R == G) {
            c = fv * (R - G1);
            z = ((1 + R) ** (n));
            y = ((1 + G1) ** (n));
            x = z - y;
            X = c / x;
            ans = X;

        } else {
            c = fv * (R - G);
            z = ((1 + R) ** (n));
            y = ((1 + G) ** (n));
            x = z - y;
            X = c / x;
            ans = X;
        }

        let aa = (r * ans);
        let s = ((1 + r) ** 12);
        let ss = ((s - 1) * (1 + r));
        let s2 = aa / ss;
        let S = s2.toFixed(0);
        console.log(S); //ans = C  




        $(`#goal-id-${id} #total-value`).val(S);
        let plan_sip = 0;
        let plan_lumpsum = 0;
        document.querySelectorAll("#mothly_sip").forEach(el => {
            plan_sip += +el.value

        })
        $("#plan_m_sip").html(plan_sip)
        document.querySelectorAll("#lumpsum_sip").forEach(el => {
            plan_lumpsum += +el.value

        })

        $("#mothly-plan").html(plan_sip);
        $("#plan_l_sip").html(plan_lumpsum)
    }


    function cal_fv(pre, rates_per, n_per) {
        //fixed_asset_fv
        let Rs_per = (rates_per / 100);
        let r_per = (1 + Rs_per) ** n_per;
        let ans_per = pre * r_per;
        let ans = ans_per.toLocaleString(0);
        return ans;

    }

    $(document).on('input', " .pre_value, .dur_per , .rate_per", function() {
        // console.log($(this).parent().find(".fd_fv_value"));
        let a = +$(this).parent().find(".pre_value").val()
        let d = +$(this).parent().find(".dur_per").val()
        let r = +$(this).parent().find(".rate_per").val()
        let ans = cal_fv(a, d, r);
        $(this).parent().find(".fd_fv_value").val(ans);
    })

    $("document").ready(function() {
        $.ajax({
            method: "post",
            url: "./UserData.php",
            data: {
                // id: update_note
                get_user_data: "all"
            },
            dataType: "json",
            success: function(data) {
                // console.log(data);
                let markup = '';
                let total_sip = 0;
                let total_lumpsum = 0;
                data.forEach(el => {
                    markup += `<div class="goal-box"> <table class="table mt-3 table-responsive " style=" font-size:12px;width: 85%;position: relative;" id='goal-id-${el["id"]}'><thead><tr class="' ${el["goal"]} '"><th style="width:10%;color:white;font-size: 14px;text-align: center;">Goal Name</th><th  style="color:white;font-size: 14px;text-align: center;width:8%;">Tenure</th>  <th colspan="2" style="width:30%;color:white;font-size: 14px;text-align: center;">AMOUNT REQUIRED</th> <th colspan="2" style="width:40%;color:white;font-size: 14px;text-align: center;">PLAN THE AMOUNT YOU CAN INVEST</th><th colspan="2" style="width:40%;color:white;font-size: 14px;text-align: center;">Top UP SIP Required</th></tr> </thead>   `;

                    if (el["goal"] || el["goal_data"]["futureage"] || (el["goal_data"]["ansinputs"]) || (el["goal_data"]["sipvalue"]) || el["goal_data"]["inflation"]) {
                        let temp = +el["goal_data"]["ansinputs"].replaceAll(",", "")
                        let tamps = temp.toLocaleString("en-IN", {
                            style: "currency",
                            currency: "INR",
                            maximumFractionDigits: 0
                        });
                        markup += `<tr > <div class="col-1 goal-img"><img src="../ai_form/images/${el["goal"]}.svg">
                            <span data-fv="${temp}">${(tamps)}</span></div>
                            <th rowspan="2" class="th_style">${el["goal"]}</th ><th rowspan="2" class="th_style f-age">${el["goal_data"]["futureage"]}</th><th class="col-md-2" style="background-color: #bababa;text-align: center;vertical-align: middle;">MONTHLY </th><th class="col-md-2" style="background-color: #bababa;text-align: center;vertical-align: middle;">LUMPSUM</th><th class="col-md-2" style="background-color: #bababa;text-align: center;vertical-align: middle;">MONTHLY </th><th class="col-md-2" style="background-color: #bababa;text-align: center;vertical-align: middle;">LUMPSUM</th><th><p style="height:6px;animation-delay: 1ms;" class="w3-center w3-animate-left">Monthly SIP needs to be increased every year by: </p></th></tr><tr><td><i class="fa fa-rupee-sign"></i><input class="style_input" disabled type="text" value=" ${el["goal_data"]["sipvalue"]}" </td><td><i class="fa fa-rupee-sign"></i><input class="style_input" type="text"  value=" ${cal_lumpsum(temp, el["goal_data"]["futureage"])}" </td><td><i class="fa fa-rupee-sign"></i><input class="style_input" type="number" id="mothly_sip" value="" oninput="top_up_sip('${el["id"]}')"></td><td><i class="fa fa-rupee-sign"></i><input class="style_input" type="number" id="lumpsum_sip" oninput="top_up_sip('${el["id"]}')"></td><td><input class="text" oninput="top_up_sip('${el["id"]}')" id="total-value" value="0"  </td>
                            </tr>
                            <tr class="tip_62739 hidden-xs hidden-sm"><td colspan="5" class="tipContainer"><div class="col-md-1 tipDiv" style="float: left;"><h5>TIP</h5></div><div class="tipText"><p>If you have already made any other investments, you can allocate them to your goal using <a type="button" data-bs-toggle="modal" data-bs-target="#myModal1"  class="btn1 btn-default1 existing_investment">Existing Assets. </a></p></div></td></tr>`
                        total_sip += +el["goal_data"]["sipvalue"].replaceAll(",", "")
                        total_lumpsum += temp
                    }
                    markup += "</table> </div>";
                });
                markup += `<table class="table mt-3 table-bordered " id="total_goal" style=" font-size:12px;width: 80%;position: relative;margin:auto;"><thead style="background-color:gray;"><tr><th style="font-size: 14px;text-align: center;">Monthly SIP Required</th><th style="font-size: 14px;text-align: center;">Lumsup SIP Required</th><th style="font-size: 14px;text-align: center;width:20%;"  >Monthly Plan SIP</th><th style="font-size: 14px;text-align: center;width:16%;">Monthly Plan Lumpsum</th></tr></thead><tbody><tr style="background-color:#f3f3f3;"><th class="col-2 " style="font-size: 14px; text-align: center;">${total_sip.toLocaleString()}</th><th class="col-2 " style="font-size: 14px;text-align: center;">${total_lumpsum.toLocaleString()}</th class="col-2 " style="font-size: 14px;text-align: center;"><th id="plan_m_sip" style="text-align: center;"></th><th style="text-align: center;" id="plan_l_sip"></th></tr></tbody></table>`
                $(".goals_table").html(markup);
            }
        });

    });


    function fetch_data() {
        $.ajax({
            method: "POST",
            url: "./UserData.php",
            data: {
                get_user_fund: "all"
            },
            dataType: "json",
            success: function(response) {
                console.log(response, (response['data']['investment_amt']));
                $("#pre_value").val(response['data']['investment_amt']);
                $("#dur_per").val(response['data']['duration']);
                $("#rate_per").val(response['data']['percent']);
            }

        });
    }
</script>
</body>

</html>