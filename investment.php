<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="./assets/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/style.css">
    <title>Document</title>
</head>
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
</style>

<body>
    <div class="container-fluid mt-5 ">
        <div class="card">

            <div class="declare-container hidden-sm hidden-xs">
                <a type="button" class="btn1 btn-default1 declear_existing_investment" data-bs-toggle="modal" data-bs-target="#myModal" value="add" id="moredrop_dowp" style="float:right" ;>
                    <i class="fa fa-plus-circle fa-3x"></i>
                    <p>DECLARE<br>EXISTING<br>ASSETS</p>
                </a>
            </div>
            <div class="goals_table">

            </div>

            <div class="" style="text-align:center;">
                <a class="btn btn-primary" href="dashboard.php">Previous</a>
                <button type="button" class="btn btn-success" id="btn_web" style="width:14%;" onclick="topup_cal()">View Recommandation</button>
            </div>





        </div>
    </div>

    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog  modal-lg ">
            <div class="modal-content">
                <div class="modal-header" style="background-color: darkred;color: #fff;">
                    <button type="button" class="close" data-bs-dismiss="modal" style="position: fixed; ">&times;</button>
                    <h4 class="modal-title" style="font-size: 25px;font-family: auto;">Exsiting Asset</h4>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" id="fund_form">
                        <div class="row">
                            <div class="form-group">
                                <label for="" class="col-2">Fixed Deposit</label>
                                <input type="hidden" name="fund_deposit[]" value="Fixed Deposit">
                                <input type="text" class="col-3 input_style pre_value" id="pre_value" value="" name="fund_amt[]" placeholder="₹ Enter Value">
                                <input type="text" class="col-3 input_style dur_per" value="" id="dur_per" placeholder="Duration (No. of Year)" name="duration[]">
                                <input type="text" class="col-3 input_style rate_per" id="rate_per" value="" placeholder="Intreset %" name="percent[]">
                                <input type="text" class="fd_fv_value">
                            </div>
                            <div class="form-group">
                                <label for="" class="col-2">Recurring Deposit</label>
                                <input type="hidden" name="fund_deposit[]" value="Recurring Deposit">
                                <input type="text" class="col-3 input_style pre_value" value="" id="pre_value" placeholder="₹ Enter Value" name="fund_amt[]">
                                <input type="text" class="col-3 input_style dur_per" value="" id="dur_per" placeholder="Duration (No. of Year)" name="duration[]">
                                <input type="text" class="col-3 input_style rate_per" id="rate_per" value="" placeholder="Intreset %" name="percent[]">
                                <input type="text" class="fd_fv_value">
                            </div>
                            <div class="form-group">
                                <label for="" class="col-2">Mutual Fund</label>
                                <input type="hidden" name="fund_deposit[]" value="mutual fund">
                                <input type="text" class="col-3 input_style pre_value" value="" placeholder="₹ Enter Value" name="fund_amt[]">
                                <input type="text" class="col-3 input_style dur_per" value="" placeholder="Duration (No. of Year)" name="duration[]">
                                <input type="text" class="col-3 input_style rate_per" value="" placeholder="Intreset %" name="percent[]">
                                <input type="text" class="fd_fv_value">
                            </div>
                            <div class="form-group">
                                <label for="" class="col-2">Equity</label>
                                <input type="hidden" name="fund_deposit[]" value="Equity">
                                <input type="text" class="col-3 input_style pre_value" value="" placeholder="₹ Enter Value" name="fund_amt[]">
                                <input type="text" class="col-3 input_style dur_pre" value="" placeholder="Duration (No. of Year)" name="duration[]">
                                <input type="text" class="col-3 input_style rate_per" value="" placeholder="Intreset %" name="percent[]">
                                <input type="text" class="fd_fv_value">
                            </div>
                            <div class="form-group">
                                <label for="" class="col-2" c>Gold</label>
                                <input type="hidden" name="fund_deposit[]" value="Gold">
                                <input type="text" class="col-3 input_style pre_value" value="" placeholder="₹ Enter Value" name="fund_amt[]">
                                <input type="text" class="col-3 input_style dur_pre" value="" placeholder="Duration (No. of Year)" name="duration[]">
                                <input type="text" class="col-3 input_style rate_per" value="" placeholder="Intreset %" name="percent[]">
                                <input type="text" class="fd_fv_value">
                            </div>
                        </div>


                        <!-- <button type="button" id="remove" onclick="removeel(this)">Remove</button> -->

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="submit_funddata">Save and
                        Contine</button>
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                </div>
                </form>
                
            </div>
            
        </div>
    </div>
    <div class="declare-container hidden-sm hidden-xs">
        <a type="button" class="btn1 btn-default1 declear_existing_investment" data-bs-toggle="modal" data-bs-target="#myModal" value="add" id="moredrop_dowp" style="float:right";>
            <i class="fa fa-plus-circle fa-3x"></i>
            <p>DECLARE<br>EXISTING<br>ASSETS</p>
        </a>
    </div>



</body>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="./assets/bootstrap.min.js"></script>
<script>
    // function adddp() {
    //     const markup = `  <div type="text" id="myDropdown"> Your Investment's


    //                         <select name="fundsname[]" >
    //                                 <option value=""></option>
    //                                 <option value="fd" class="invest" >FD</option>
    //                                 <option value="rd" class="invest"  >RD</option>
    //                                 <option value="nps" class="invest" >NPS</option>
    //                                 <option value="p2p" class="invest" >P2P</option>
    //                                 <option value="mf" class="invest" >MF</option>
    //                                 <option value="equity" class="invest" >Equity</option>
    //                                 <option value="gold" class="invest" >Gold</option>
    //                             </select>

    //                                 <label>Duration</label>
    //                                 <input type="text" name="duration[]">
    //                                 <label>Intrest of return (%)</label>
    //                                 <input type="text" name="percent[]">
    //                                 <button type="button" id="remove" onclick="removeel(this)">Remove</button>
    //                                 </div>  `

    //     document.getElementById("investment_list").innerHTML += markup;


    // }

    function removeel(value) {
        console.dir(value.parentElement.remove());

    }

    $(function() {
        $('form').bind('submit', function() {
            $.ajax({
                type: 'post',
                url: './UserData.php',
                data: {
                    add_user_fund: $('form').serialize()
                },
                success: function() {
                    alert('form was submitted');
                }
            });
            return false;
        });
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
        let R = ((rate / 100) / 12);
        let Y = years * 12;
        let d = P * (((1 + R) ** Y) - 1);
        let e = 1 + R;
        let f = d * e;
        let ans = f / R;
        $(`#goal-id-${id} #sip-answer`).val(ans.toFixed(0));


        // fv_of_lumpsum
        let pv = $(`#goal-id-${id} #lumpsum_sip`).val();
        let rates = 12;
        let Rs = (rates / 100);
        let n = $(`#goal-id-${id} .f-age`).html();
        let r = (1 + Rs) ** n;
        let answer = pv * r;
        $(`#goal-id-${id} #lumpsum-answer`).val(answer.toFixed(0));


        // top_up_sip_required        
        sip = ans;
        lumpsum = answer;
        //  console.log(sip,ans,answer,lumpsum);
        total_planinv = (sip + lumpsum);
        fv = $(`#goal-id-${id}`).closest("div").find("span").attr("data-fv") - total_planinv;


        $(`#goal-id-${id} #total-value`).val(fv.toFixed(0));
        let plan_sip = 0;
        let plan_lumpsum = 0;
        document.querySelectorAll("#mothly_sip").forEach(el => {
            plan_sip += +el.value

        })
        $("#plan_m_sip").html(plan_sip)
        document.querySelectorAll("#lumpsum_sip").forEach(el => {
            plan_lumpsum += +el.value

        })
        $("#plan_l_sip").html(plan_lumpsum)
    }


    // function topup_cal(){
    //     let fv_sip = document.getElementById("mothly_sip").value;
    //     let fv_lump = document.getElementById("lumpsum_sip").value;
    //     let fv_asset = ((fv_sip + fv_lump) + 100000);
    //     console.log(fv_asset);

    // }




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
                // let plan_sip = 0;
                // let plan_lumpsum = 0;
                // let ansinputs = ["goal_data"]["ansinputs"].toLocaleString(2);
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
                            <th rowspan="2" class="th_style">${el["goal"]}</th ><th rowspan="2" class="th_style f-age">${el["goal_data"]["futureage"]}</th><th class="col-md-2" style="background-color: #bababa;text-align: center;">MONTHLY </th><th class="col-md-2" style="background-color: #bababa;text-align: center;">LUMPSUM</th><th class="col-md-2" style="background-color: #bababa;text-align: center;">MONTHLY </th><th class="col-md-2" style="background-color: #bababa;text-align: center;">LUMPSUM</th></tr><tr><td><i class="fa fa-rupee-sign"></i><input class="style_input" disabled type="text" value=" ${el["goal_data"]["sipvalue"]}" </td><td><i class="fa fa-rupee-sign"></i><input class="style_input" type="text"  value=" ${cal_lumpsum(temp, el["goal_data"]["futureage"])}" </td><td><i class="fa fa-rupee-sign"></i><input class="style_input" type="number" id="mothly_sip" oninput="top_up_sip('${el["id"]}')"></td><td><i class="fa fa-rupee-sign"></i><input class="style_input" type="number" id="lumpsum_sip" oninput="top_up_sip('${el["id"]}')"></td><td><input class="text" oninput="top_up_sip('${el["id"]}')" id="total-value" </td>
                                </tr>`
                        total_sip += +el["goal_data"]["sipvalue"].replaceAll(",", "")
                        total_lumpsum += temp
                    }
                    markup += "</table> </div>";
                    // src="../ai_form/images/car.jpg"
                    // src="../ai_form/images/vacation.jpg"
                    // src="../ai_form/images/house.jpg"
                    // if () markup += `<tr> ${el["goal_data"]["futureage"]}</td></tr>`
                    // if(el["goal_data"]["inflation"])markup+=`<tr><td>inflation</td> <td> ${el["goal_data"]["inflation"]}</td></tr>`
                    // if(el["goal_data"]["ansinputs"])markup+=`<tr><td>investment value</td> <td> ${el["goal_data"]["ansinputs"]}</td></tr>`
                    // if(el["goal_data"]["sipvalue"])markup+=`<tr><td>sip value</td> <td> ${el["goal_data"]["sipvalue"]}</td></tr>`
                });
                markup += `<table class="table mt-3 table-bordered " style=" background-color:gray;font-size:12px;width: 80%;position: relative;left: 11%;"><thead><tr><th style="font-size: 14px;text-align: center;">Monthly SIP Required</th><th style="font-size: 14px;text-align: center;">Lumsup SIP Required</th><th style="font-size: 14px;text-align: center;width:20%;">Monthly Plan SIP</th><th style="font-size: 14px;text-align: center;width:16%;">Monthly Plan Lumpsum</th></tr></thead><tbody><tr style="background-color:#f3f3f3;"><th class="col-2 " style="font-size: 14px;text-align: center;">${total_sip.toLocaleString()}</th><th class="col-2 " style="font-size: 14px;text-align: center;">${total_lumpsum.toLocaleString()}</th class="col-2 " style="font-size: 14px;text-align: center;"><th id="plan_m_sip"></th><th id="plan_l_sip"></th></tr></tbody></table>`




                $(".goals_table").html(markup);
            }
        });

    })

    function ds(s, t) {
        console.log(arguments)
    }
</script>

</html>