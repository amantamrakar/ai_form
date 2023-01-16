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
            border-bottom: 2px solid rgb(189, 194, 194);
            text-align: center;
        }

        .input_style:focus {
            outline: none;
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

        .declare-container {
            position: fixed;
            right: 27px;
            bottom: 0px;
            text-align: center;
            width: 80px;
            z-index: 5;
        }

        .goal-img {
            text-align: center;
            align-self: center;
        }

        .goal-img span {
            display: block;
        }

        .goal-img img {
            width: 70px;
        }

        .g-table {
            text-align:center;
            background: #eff5ff;
            border-radius: 10px;
            padding: 2px;
        }
        .g-table .sub-heading{
            justify-content: center;
        }
        .g-table .sub-heading p{
            background-color:#bababa;
            border: 2px solid #fff;
            border-radius: 10px;
            padding: 10px;
            font-weight: 500;
        }

        .tipDiv {
            background-color: #00beff;
            color: white;
            padding: 1px 10px;
            border-radius: 5px;
            display: inline;
            margin-left: 5%;
        }

        h5 {
            margin-top: 7px;
        }

        .tipText {
            font-size: 14px;
        }
        .g-head{
            color:#fff;
            font-size: 14px;
            font-weight: bold;
            border: 2px solid #ffffff;
            border-radius: 10px;
            padding: 10px;
            margin:0;
           
        }
        .g-table .col-span{
            margin-top: 20px;
            font-weight: bold;
            font-size: 18px;
            display: inline-block;
        }
        .resp_table td.g-head {
            background-color:#e1e1e1;
            color:#111111;
        }
        @media (min-width: 576px) {
            .modal-dialog {
                max-width: 950px;
            }
        }
        
    @media screen and (max-width: 600px) {
  .resp_table {
    border: 0;
  }

  .resp_table caption {
    font-size: 1.3em;
  }
  
  .resp_table thead {
    border: none;
    clip: rect(0 0 0 0);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
  }
  
  .resp_table tr {
    border-bottom: 3px solid #ddd;
    display: block;
    margin-bottom: .625em;
  }
  
  .resp_table td {
    border-bottom: 1px solid #ddd;
    display: block;
    font-size: .8em;
    text-align: right;
  }
  
  .resp_table td::before {
   
    content: attr(data-label);
    float: left;
    font-weight: bold;
    text-transform: uppercase;
  }
  
  .resp_table td:last-child {
    border-bottom: 0;
  }
}
    </style>
</head>

<body>
    <?php include("./header.php"); ?>
    <div class="container-fluid mt-2">
    <div class="goals_table">
    </div>
    <div class="mt-5 mb-4" style="text-align:center;">
        <a class="btn btn-primary" href="dashboard.php">Previous</a>
        <button type="button" class="btn btn-success" id="topUpSave">
        <!-- <a class="text-light text-decoration-none" href="./question.php"> -->
            View Recommendation
        <!-- </a> -->
    </button>
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
                        <table class="resp_table">
                        <thead class='text-center'><tr><th class='text-center' scope='col' data-label='Funds Type'>Funds Type</th> <th class='text-center' scope='col' data-label='Invested Amount'>Invested Amount</th> <th class='text-center' scope='col' data-label='Duration'>Duration</th><th class='text-center' scope='col' data-label='Interest'>Interest</th></tr></thead>
                        <tbody  id='list_fund'>
                        <!-- <div class="row" class="fund_data" id='list_fund'> -->
                            <?php
                            foreach ($fundwise_data as $key => $value){

                                $markup = "<tr><td scope='row' data-label='Assets Type' ><label for='' class=''>$key</label></td>";
                                if (count($value) > 0) {
                                    $markup .= "<td data-label='Invested Amount'><input type='hidden' name='fund_deposit[]' value='$key'>
                                    <input type='text' class=' input_style pre_value' id='invetment_amt' value='{$value["investment_amt"]}'  placeholder='₹ Enter Value' name='fund_amt[]' ></td>
                                    <td data-label='Duration'><input type='text' class=' input_style dur_per' value='{$value["duration"]}'  placeholder='Duration (No. of Year)' name='duration[]'></td>
                                    <td data-label='Interest'><input type='text' class=' input_style rate_per' value='{$value["percent"]}' placeholder='Intreset %' name='percent[]'></td></tr>";
                                } else {
                                    $markup .= "<td data-label='Invested Amount'><input type='hidden' name='fund_deposit[]' value='$key'>
                                    <input type='text' class=' input_style pre_value' value=''  placeholder='₹ Enter Value' name='fund_amt[]' ></td>
                                    <td data-label='Duration'><input type='text' class=' input_style dur_per' value=''  placeholder='Duration (No. of Year)' name='duration[]'></td>
                                    <td data-label='Interest'><input type='text' class=' input_style rate_per' value='' placeholder='Intreset %' name='percent[]'></td></tr>";
                                }

                                echo $markup;
                            }
                            ?>
                            </tbody>
                        </table>
                        <button class="btn btn-primary" onclick="add_fund()"> Add Funds</button>
                            <!-- // $markup .= '<div><label class="col-2">Add Asset</label></div>'; -->
                        <!-- <div class="foot" ></div> -->
                    </div>
                    <div class="modal-footer">
                        <!-- <button class="btn btn-primary" onclick="fetch_data()"> Show Value</button> -->
                        
                        <button class="btn btn-primary" type="submit" data-bs-toggle="modal" id="showAllgoal" data-bs-target="#fundAllocate" >Save and Continue</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
    <div class="declare-container hidden-sm hidden-xs">
        <a type="button" class="btn1 btn-default1 declear_existing_investment" data-bs-toggle="modal" data-bs-target="#myModal" value="add" id="moredrop_dowp" style="float:right">
            <i class="fa fa-plus-circle fa-3x"></i>
            <p>DECLARE<br>EXISTING<br>ASSETS</p>
        </a>
    </div>

    <div class="modal fade" id="fundAllocate" role="dialog">
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
                                <p>You may allocate your existing assets to your goals below. <br> Your total Top-up SIP
                                    will be updated as you allocate the funds. Currently,</p>
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
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Allocate More Fund</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="./assets/bootstrap.bundle.min.js"></script>
<script>
    let showGid=null;
    $("#topUpSave").click(function(e){
        $(this).attr("disabled",true);
const data={};
$("input#mothly_sip").each((i,el)=>{
    data[el.dataset.sgid]={"sip":el.value};
    data[el.dataset.sgid]["lup"]=$(`input#lumpsum_sip[data-lgid="${el.dataset.sgid}"]`).val()
});
        $.ajax({
            type: "post",
            url: "./UserData.php",
            data: {"save_all_plan":data},
            dataType: "json",
            success: function (res) {
                $("#topUpSave").attr("disabled",false);
                if(res["status"]){
                   window.location.href="./question.php";
                }else{
                   alert("Invalid Data");
                }
            }
        });
    });
    function showAllocation(d) {
        let markup = `<div class="accordion" id="accordionExample">`;
        const allFinds = fetch_data();
        console.log(allFinds);
        let fundMarkup = "";
        let allocation = "";
        let allocatedFund ={}
        allFinds.forEach(fd => {
            const alAmount=fd.investment_amt - fd.allocate_amount;
            if(alAmount>0){
                fundMarkup += `<option data-id="${fd.id}" value="${fd.fund_type}" data-amt="${alAmount}">${fd.fund_type}</option>`
            }
                for (const k in fd.allocate_goals) {
                    // fvOfFund=
                    // <button><i class="fa-solid fa-pen-to-square"></i></button>
                    if(allocatedFund[k]){
                        allocatedFund[k]["markup"]+=`<tr data-interest="${fd["percent"]}" data-famt="${fd.allocate_goals[k]["amt"]}"><td>${fd.fund_type}</td><td>${fd.allocate_goals[k]["amt"]}</td><td><button type="button" onclick="deleteAllocation(this)" data-fid="${fd.id}"><i class="fa-solid fa-trash-can"></i></button></td></tr>`;
                        allocatedFund[k]["total"] += +fd.allocate_goals[k]["amt"]
                    }else{
                        allocatedFund[k]={};
                        allocatedFund[k]["markup"]=`<tr data-interest="${fd["percent"]}" data-famt="${fd.allocate_goals[k]["amt"]}"><td>${fd.fund_type}</td><td>${fd.allocate_goals[k]["amt"]}</td><td><button type="button" onclick="deleteAllocation(this)" data-fid="${fd.id}"><i class="fa-solid fa-trash-can"></i></button></td></tr>`;
                        allocatedFund[k]["total"]= +fd.allocate_goals[k]["amt"];
                    }
                }
        });
        d.forEach(el => {
           
            const amt = +el["goal_data"]["ansinputs"].replaceAll(",", "");
            const pAmt = amt.toLocaleString("en-IN", {
                style: "currency",
                currency: "INR",
                maximumFractionDigits: 0
            });
            // console.log(allocatedFund[el["id"]],el["id"]);
            markup += `<div class="accordion-item" id="a-item-${el["id"]}">
                    <h2 class="accordion-header" id="heading">
                    <button class="accordion-button collapsed text-capitalize" type="button" data-bs-toggle="collapse" style="color:var(--${el["goal"]})" data-bs-target="#collapse${el["id"]}" aria-expanded="false" aria-controls="collapse${el["id"]}">${el["goal"]} - ${pAmt}</button>
                    </h2>
                    <div id="collapse${el["id"]}" class="accordion-collapse collapse" aria-labelledby="heading" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                    <form class="saveAllocation" id="s-allocation-${el["id"]}">
                    <input type='hidden' name='goal' value='${el["id"]}'>
                    <input type='hidden' id="allocate-aFund-${el["id"]}" name='fund' value=''>
                    <input type='hidden' id="plan-lamp-${el["id"]}" name='planLamp' value=''>
                    <input type='hidden' id="plan-sip-${el["id"]}" name='planSip' value=''>
                    <div class="row">
                            <div class="col-md-4">
                                <p>Reinvest Lumpsum Amount:</p>
                                <h5 data-additionallumpsumapi="0"><i class="fa fa-inr"></i><span class="getAllFund-${el["id"]}">${(allocatedFund[el["id"]]?.total)?allocatedFund[el["id"]]?.total:0}</span></h5>
                            </div>
                            <div class="col-md-4">
                                <p>Reinvest SIP Amount:</p>
                                <h5 data-additionalsipapi="0"><i class="fa fa-inr"></i><span class="additionalSip">0</span></h5>
                            </div>
                            <div class="col-md-4">
                                <p>Top-up Required:</p>
                                <h5><i class="fa fa-inr"></i><span class="topup" data-gid="${el["id"]}" data-needAmt="0">0</span></h5>
                            </div>
                        </div>
                    <div class="row">
                      <div class="col-md-4">
                          <div class="form-group is-empty"><label class="control-label" for="gender">&nbsp;</label>
                            <select class="form-control select_investment" name="investmentClass" id="aFund-${el["id"]}" onchange="setFundAmt(this)">
                                  <option>Select Fund</option>
                                  ${fundMarkup}
                              </select>
                          </div>
                      </div>
                      <div class="col-md-4 allocation_lumsum_div  allocation_lumsum">
                          <div class="form-group is-empty">
                              <div class="rupee-amount-text"><label class="control-label" for="email">Enter Lumpsum</label><i class="fa fa-inr"></i><input class="form-control mandatory inrFormat lumpsumAmtAllocated" value="0" id="addLump-${el.id}" data-inputId="${el.id}" oninput="allocateFund(this)" name="lumpsumAmtAllocated" placeholder="Enter Amount To Allocate" type="number" data-action="add"></div>
                              <p class="declare-help">Available Amount: <i class="fa fa-inr"></i>
                                  <span class="output" data-aFund="aFund-${el["id"]}" ></span></p></div>
                      </div></div><div class="text-center"><button type="button" onclick="saveAllocation(this)" data-form="s-allocation-${el["id"]}" class="btn btn-info col-md-4">Apply</button></div>
                                   `;
                                    if(allocatedFund[el["id"]]){
                                        markup +=`<table class="text-capitalize my-2" data-allogid="${el["id"]}"><thead><tr>
                                        <th>fund type</th>
                                        <th>lump sam amount</th>
                                        <th>action</th>
                                        </tr></thead>${allocatedFund[el["id"]].markup}</table>`
                                    }
                    markup +=` </form></div></div></div>`
        });
        markup += `</div>`;
        $("#investment_list").html(markup);
        d.forEach(el=>{
            top_up_sip(el["id"]);
        });
        if(showGid !== "all"){
            $(".accordion-item").hide()
            $(`.accordion-item#a-item-${showGid}`).show()
            $(`.accordion-item#a-item-${showGid} button.collapsed`)[0]?.click();
        }
        $(".style_input").on("click",function(e){
            if($(this).val() == 0)$(this).val("")
        });
    }
    $("#showAllgoal").click(function(){
        $(".totalTopUpSip").html($(`#top-up-req`).html())
        $(".accordion-item").show()
    });
    function deleteAllocation(e){
        const fdata=$(`button[data-fid='${e.dataset.fid}']`).parents("form");
        let data=fdata.serialize().replace("fund=",`fund=${e.dataset.fid}`);
        console.log(data);
        $.ajax({
            type: "post",
            url: "./UserData.php",
            data: {"allocationFund":data},
            dataType: "json",
            success: function (res) {
                if(res["status"]){
                    alert(res.message);
                    setGoalData();
                  
                }else{
                    alert(res.message)
                }
            }
        });
    }
    function saveAllocation(e){
        e.setAttribute("disabled",true);
        const fEl=$(`form#${e.dataset["form"]}`);
        fdata=fEl.serialize();
        $.ajax({
            type: "post",
            url: "./UserData.php",
            data: {"allocationFund":fdata},
            dataType: "json",
            success: function (res) {
                e.setAttribute("disabled",false);
                if(res["status"]){
                    alert(res.message);
                    setGoalData();
                  
                }else{
                    alert(res.message)
                }
            }
        });
    }
    function setFundAmt(e) {
        const setFund=document.querySelector(`.output[data-aFund='${e.id}']`)
        // console.dir($(`#${e.id} option:selected`));
        const setOp=$(`#${e.id} option:selected`)[0];
        const amt=setOp.dataset["amt"];
        $(`#allocate-${e["id"]}`).val(setOp.dataset["id"])
        setFund.textContent = amt;
        setFund.dataset["amt"] = amt;
        setFund.dataset["fid"]=setOp.dataset["id"] //?allocation to get control of all option 
    }
    function allocateFund(e){
        const availFund=$(`.output[data-aFund='aFund-${e.dataset["inputid"]}']`)
        const allocateFund= e.value;
        let showAmt= +availFund[0].dataset["amt"] - allocateFund;
        if(showAmt < 0){
            alert("do you to want to add full amount")
            showAmt=0;
            e.value=availFund[0].dataset["amt"]
        }
        availFund.html(showAmt)
        $(`.saveAllocation option[data-id='${availFund.data("fid")}']`).attr("data-amt",showAmt);
    }
    $(document).on("click", "#cust_btn", function() {
        $("#fundAllocate").modal("toggle");
    })
    $('form#fund-table').bind('submit', function() {
        const fdata=$('form').serialize()
        $.ajax({
            type: 'post',
            url: './UserData.php',
            data: {
                add_user_fund: fdata
            },
            success: function() {
                // alert('form was submitted');
                // fetchval()
                showGid="all";
                setGoalData()
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
    function get_rate(N) {
      let rate = 12 / 100;
      if (N <= 3 && N > 1) {
        rate = 10 / 100;
      } else if (N == 1) {
        rate = 8 / 100;
      }
      return rate;
    }
    function top_up_sip(id) {

        //fv_of_sip
        let P = $(`#goal-id-${id} #mothly_sip`).val().replaceAll(",", "");
        (P==null)?P=0:P=P;
        let rate = 12;
        let years = $(`#goal-id-${id} .f-age`).html();
        let Rss = ((rate / 100) / 12);
        let Y = years * 12;
        let d = P * (((1 + Rss) ** Y) - 1);
        let e = 1 + Rss;
        let f = d * e;
        let ans = f / Rss;
        $(`#goal-id-${id} #sip-answer`).val(ans.toFixed(0));


        // fv_of_lumpsum
        let pv = $(`#goal-id-${id} #lumpsum_sip`).val().replaceAll(",", "");
        (pv==null)?pv=0:pv=pv;
        let rates = 12;
        let Rs = (rates / 100);
        let n = +$(`#goal-id-${id} .f-age`).html();
        let rs = (1 + Rs) ** n;
        let answer = pv * rs;
        $(`#goal-id-${id} #lumpsum-answer`).val(answer.toFixed(0));
        // console.log(answer);

        // top_up_sip_required        
        sip = ans;
        lumpsum = answer;
        total_planinv = (sip + lumpsum);
        // let asset = +$(`.getAllFund-${id}`).html();
        let asset = 0;
        const fsEl=$(`#a-item-${id} tr[data-interest]`);
        if(fsEl.length>0){
            fsEl.each(el=>{
                let itr= +fsEl[el].dataset.interest;
                let famt= +fsEl[el].dataset.famt;
                asset += cal_fv(famt,years,itr)
            })
        }
        total_asset = (total_planinv + asset);
        fv = $(`#goal-id-${id}`).closest("div").find("span").attr("data-fv") - total_asset;
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
        $(`#goal-id-${id} #total-value`).val(S);
        $(`.topup[data-gid="${id}"]`).html(S)
        $(`#plan-lamp-${id}`).val(pv)
        $(`#plan-sip-${id}`).val(P)
        let plan_sip = 0;
        let plan_lumpsum = 0;
        let tTopSip = 0;
        document.querySelectorAll("#mothly_sip").forEach(el => {
            plan_sip += +el.value
        })
        $("#plan_m_sip").html(plan_sip)
        document.querySelectorAll("#lumpsum_sip").forEach(el => {
            plan_lumpsum += +el.value

        })
        $("#plan_l_sip").html(plan_lumpsum)
        document.querySelectorAll("#total-value").forEach(el => {
            tTopSip += +el.value
        })
        $("#top-up-req").html(tTopSip)
    }
    function cal_fv(pre, rates_per, n_per) {
        //fixed_asset_fv
        let Rs_per = (rates_per / 100);
        let r_per = (1 + Rs_per) ** n_per;
        let ans_per = pre * r_per;
        let ans = Math.round(ans_per);
        return ans;

    }
    $(document).on('input', ".pre_value, .dur_per , .rate_per", function() {
        // console.log($(this).parent().find(".fd_fv_value"));
        let a = +$(this).parent().find(".pre_value").val()
        let d = +$(this).parent().find(".dur_per").val()
        let r = +$(this).parent().find(".rate_per").val()
        let ans = cal_fv(a, d, r);
        $(this).parent().find(".fd_fv_value").val(ans);
    })
    $("document").ready(function() {
        setGoalData()
    });
    function setGoalData(){
        $.ajax({
            method: "post",
            url: "./UserData.php",
            data: {
                // id: update_note
                get_user_data: "all"
            },
            dataType: "json",
            success: function(data) {
                console.log("goal",data);
                let markup = '';
                let total_sip = 0;
                let total_lumpsum = 0;
                data.forEach(el => {
                    
                    if (el["goal"] || el["goal_data"]["futureage"] || (el["goal_data"]["ansinputs"]) || (el["goal_data"]["sipvalue"]) || el["goal_data"]["inflation"]) {
                        let temp = +el["goal_data"]["ansinputs"].replaceAll(",", "")
                        let tamps = temp.toLocaleString("en-IN", {
                            style: "currency",
                            currency: "INR",
                            maximumFractionDigits: 0
                        });
                        let lump= +cal_lumpsum(temp, el["goal_data"]["futureage"])
                        lump=lump.toLocaleString("en-IN", {
                            currency: "INR",
                            maximumFractionDigits: 0
                        });
                        const sipAmt= +el["goal_data"]["sipvalue"].replaceAll(",", "");
                        sipAmtS =sipAmt.toLocaleString("en-IN", {
                            currency: "INR",
                            maximumFractionDigits: 0
                        });
                    markup += `<div class="row mt-3 g-table mx-2 mx-xm-4 " id='goal-id-${el["id"]}'>
                    <div class="col-4 col-lg-1 col-sm-4  goal-img"><img src="./images/${el["goal"]}.svg"> <span data-fv="${temp}">${(tamps)}</span> </div>
                    <div class="col-4 col-lg-1 col-sm-4  p-0 m-0 text-capitalize"><p class="g-head ${el["goal"]} ">Goal Name</p><spam class="col-span">${el["goal"]}</spam></div>
                    <div class="col-4 col-lg-1 col-sm-4  p-0 m-0"><p class="g-head ${el["goal"]}">Tenure</p> <span class="col-span f-age">${el["goal_data"]["futureage"]}</span></div>  
                    <div class="col-lg-3 col-md-6 col-sm-12 p-0 m-0"><p class="g-head ${el["goal"]}">AMOUNT REQUIRED</p><div class="d-flex sub-heading"><span><p>MONTHLY </p><i class="fa fa-rupee-sign"></i><input class="style_input" disabled type="text" value=" ${sipAmtS}" /></span><span><p>LUMPSUM </p><i class="fa fa-rupee-sign"></i><input class="style_input" type="text" disabled value=" ${lump}" /></span></span></div></div> 
                    <div class="col-lg-3 col-md-6 col-sm-12 p-0 m-0"><p class="g-head ${el["goal"]}">PLAN THE AMOUNT YOU CAN INVEST</p><div class="d-flex sub-heading"><span><p>MONTHLY </p><i class="fa fa-rupee-sign"></i><input class="style_input" type="number" id="mothly_sip" min='500' value="${ +el["plan_sip"] + 0}" data-sgid='${el["id"]}' oninput="top_up_sip('${el["id"]}')"></span><span><p >LUMPSUM </p><i class="fa fa-rupee-sign"></i><input class="style_input" value="${ +el["plan_lumpsum"] + 0}" max='1000' type="number" id="lumpsum_sip" oninput="top_up_sip('${el["id"]}')" data-lgid='${el["id"]}'></span></div></div>
                    <div class="col-lg-2 col-md-12 col-sm-12 p-0 m-0"><p class="g-head ${el["goal"]}">Top UP SIP Required</p><span><p>Monthly SIP needs to be increased every year by:</p></span><input class="text" readonly id="total-value" value="0"  /></div>
                    <div class="col-12 my-2 text-start"><span class="tipDiv">TIP</span><span class="tipText">If you have already made any other investments, you can allocate them to your goal using <a href="#a-item-${el["id"]}" data-bs-toggle="modal" data-bs-target="#fundAllocate" onclick="shoeExistingFund(this)" data-target="${el["id"]}" class="btn1 btn-default1 existing_investment">Existing Assets. </a></span></div>`;

                        total_sip += +el["goal_data"]["sipvalue"].replaceAll(",", "")
                        total_lumpsum += temp;
                    }
                    markup += "</div>";
                });
                markup += `<table class="resp_table mt-3 text-center" id="total_goal" style="font-size:12px;width:80%;position:relative;margin:auto;"><thead ><tr>
                <th class="g-head" style="background-color:#707070;" scope="col" data-label="Monthly SIP Required">Monthly SIP Required</th>
                <th class="g-head" style="background-color:#707070;" scope="col" data-label="Lumpsum SIP Required">Lumpsum SIP Required</th>
                <th class="g-head" style="background-color:#707070;" scope="col" data-label="Monthly Plan SIP">Monthly Plan SIP</th>
                <th class="g-head" style="background-color:#707070;" scope="col" data-label="Monthly Plan Lumpsum">Monthly Plan Lumpsum</th>
                <th class="g-head" style="background-color:#707070;" scope="col" data-label="Total Top Up SIP">Total Top Up SIP</th></tr></thead>
                <tbody><tr>
                <td class="g-head"  scope="row" data-label="Monthly SIP Required">${total_sip.toLocaleString("en-IN",{ maximumFractionDigits: 0})}</td>
                <td class="g-head" data-label="Lumpsum SIP Required">${total_lumpsum.toLocaleString("en-IN",{ maximumFractionDigits: 0})}</td>
                <td class="g-head" id="plan_m_sip" data-label="Monthly Plan Lumpsum"></td>
                <td class="g-head" id="plan_l_sip" data-label="Monthly Plan Lumpsum"></td>
                <td class="g-head" id="top-up-req" data-label="Total Top Up SIP"></td>
                </tr></tbody></table>`
                $(".goals_table").html(markup);
                showAllocation(data)
            }
        });
    }
    // function setGoalData2(){
    //     $.ajax({
    //         method: "post",
    //         url: "./UserData.php",
    //         data: {
    //             // id: update_note
    //             get_user_data: "all"
    //         },
    //         dataType: "json",
    //         success: function(data) {
    //             // console.log(data);
    //             let markup = '';
    //             let total_sip = 0;
    //             let total_lumpsum = 0;
    //             data.forEach(el => {
    //                 markup += `<div class="goal-box table-responsive"> <table class="table mt-3" style=" font-size:12px;width: 85%;position: relative;" id='goal-id-${el["id"]}'><thead><tr class="${el["goal"]} "><th style="width:10%;color:white;font-size: 14px;text-align: center;">Goal Name</th><th  style="color:white;font-size: 14px;text-align: center;width:8%;">Tenure</th>  <th colspan="2" style="width:30%;color:white;font-size: 14px;text-align: center;">AMOUNT REQUIRED</th> <th colspan="2" style="width:40%;color:white;font-size: 14px;text-align: center;">PLAN THE AMOUNT YOU CAN INVEST</th><th colspan="2" style="width:40%;color:white;font-size: 14px;text-align: center;">Top UP SIP Required</th></tr> </thead>   `;

    //                 if (el["goal"] || el["goal_data"]["futureage"] || (el["goal_data"]["ansinputs"]) || (el["goal_data"]["sipvalue"]) || el["goal_data"]["inflation"]) {
    //                     let temp = +el["goal_data"]["ansinputs"].replaceAll(",", "")
    //                     let tamps = temp.toLocaleString("en-IN", {
    //                         style: "currency",
    //                         currency: "INR",
    //                         maximumFractionDigits: 0
    //                     });
    //                     let lump= +cal_lumpsum(temp, el["goal_data"]["futureage"])
    //                     lump=lump.toLocaleString("en-IN", {
    //                         currency: "INR",
    //                         maximumFractionDigits: 0
    //                     });
    //                     const sipAmt= +el["goal_data"]["sipvalue"].replaceAll(",", "");
    //                     sipAmtS =sipAmt.toLocaleString("en-IN", {
    //                         currency: "INR",
    //                         maximumFractionDigits: 0
    //                     });
    //                     markup += `<tr > <div class="col-1 goal-img"><img src="./images/${el["goal"]}.svg">
    //                         <span data-fv="${temp}">${(tamps)}</span></div>
    //                         <th rowspan="2" class="th_style">${el["goal"]}</th ><th rowspan="2" class="th_style f-age">${el["goal_data"]["futureage"]}</th><th class="col-md-2" style="background-color: #bababa;text-align: center;vertical-align: middle;">MONTHLY </th><th class="col-md-2" style="background-color: #bababa;text-align: center;vertical-align: middle;">LUMPSUM</th><th class="col-md-2" style="background-color: #bababa;text-align: center;vertical-align: middle;">MONTHLY </th><th class="col-md-2" style="background-color: #bababa;text-align: center;vertical-align: middle;">LUMPSUM</th><th><p style="height:6px;animation-delay: 1ms;" class="w3-center w3-animate-left">Monthly SIP needs to be increased every year by: </p></th></tr><tr><td><i class="fa fa-rupee-sign"></i><input class="style_input" disabled type="text" value=" ${sipAmtS}" </td><td><i class="fa fa-rupee-sign"></i><input class="style_input" type="text" disabled value=" ${lump}" </td><td><i class="fa fa-rupee-sign"></i><input class="style_input" type="number" id="mothly_sip" value="${ +el["plan_sip"] + 0}"  oninput="top_up_sip('${el["id"]}')"></td><td><i class="fa fa-rupee-sign"></i><input class="style_input" value="${ +el["plan_lumpsum"] + 0}" type="number" id="lumpsum_sip" oninput="top_up_sip('${el["id"]}')"></td><td><input class="text" readonly id="total-value" value="0"  /></td>
    //                         </tr>
    //                         <tr class="tip_62739 hidden-xs hidden-sm"><td colspan="5" class="tipContainer"><div class="col-md-1 tipDiv" style="float: left;"><h5>TIP</h5></div><div class="tipText"><p>If you have already made any other investments, you can allocate them to your goal using <a href="#a-item-${el["id"]}" data-bs-toggle="modal" data-bs-target="#fundAllocate" onclick="shoeExistingFund(this)" data-target="${el["id"]}" class="btn1 btn-default1 existing_investment">Existing Assets. </a></p></div></td></tr>`
    //                     total_sip += +el["goal_data"]["sipvalue"].replaceAll(",", "")
    //                     total_lumpsum += temp;
    //                 }
    //                 markup += "</table> </div>";
    //             });
    //             markup += `<table class="table mt-3 table-bordered " id="total_goal" style=" font-size:12px;width: 80%;position: relative;margin:auto;"><thead style="background-color:gray;"><tr><th style="font-size: 14px;text-align: center;">Monthly SIP Required</th><th style="font-size: 14px;text-align: center;">Lumsup SIP Required</th><th style="font-size: 14px;text-align: center;width:20%;"  >Monthly Plan SIP</th><th style="font-size: 14px;text-align: center;width:16%;">Monthly Plan Lumpsum</th><th style="font-size: 14px;text-align: center;width:16%;">Total Top Up SIP</th></tr></thead><tbody><tr style="background-color:#f3f3f3;"><th class="col-2 " style="font-size: 14px; text-align: center;">${total_sip.toLocaleString()}</th><th class="col-2 " style="font-size: 14px;text-align: center;">${total_lumpsum.toLocaleString()}</th class="col-2 " style="font-size: 14px;text-align: center;"><th id="plan_m_sip" style="text-align: center;"></th><th style="text-align: center;" id="plan_l_sip"></th><th style="text-align: center;" id="top-up-req"></th></tr></tbody></table>`
    //             $(".goals_table").html(markup);
    //             showAllocation(data)
    //         }
    //     });
    // }
    function shoeExistingFund(e){
        $(".accordion-item").hide()
        $(`.accordion-item#a-item-${e.dataset.target}`).show();
        $(".totalTopUpSip").html($(`#goal-id-${e.dataset.target} #total-value`).val())
        showGid=e.dataset.target;
        const bt=$(`.accordion-item button[data-bs-target='#collapse${e.dataset.target}'].collapsed`);
        bt[0]?.click();

    }
    function add_fund() {
        markup = `<tr>
        <td data-label='Assets Type'><input type='text' name='fund_deposit[]' class='input_style' placeholder="Assets Type"></td>
        <td data-label='Invested Amount'> <input type='text' class='input_style pre_value' value=''  placeholder='₹ Enter Value' name='fund_amt[]' ></td>
        <td data-label='Duration'><input type='text' class='input_style dur_per' value=''  placeholder='Duration (No. of Year)' name='duration[]'></td>
        <td data-label='Interest'><input type='text' class='input_style rate_per' value='' placeholder='Interest %' name='percent[]'></td>
        </tr>`
        $("#list_fund").append(markup);

    };


    function fetch_data() {
        let data
        $.ajax({
            method: "POST",
            url: "./UserData.php",
            data: {
                get_user_fund: "all"
            },
            dataType: "json",
            async: false,
            success: function(response) {
                $("#pre_value").val(response['data']['investment_amt']);
                $("#dur_per").val(response['data']['duration']);
                $("#rate_per").val(response['data']['percent']);
                data = response.data
            }
        });
        return data;
    }
</script>
</body>

</html>