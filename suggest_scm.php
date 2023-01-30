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
    <link rel="stylesheet" href="./assets/style.css">
    <title>Suggestion of Scheme's</title>
</head>
<style>
    body {
        background-color: #f2f2f2;
    }

    table {
        /* border-collapse: collapse; */
        width: 100%;
        border: 1px solid #ddd;
    }

    .t_boarder {
        /* background-color: #1b1956; */
        color: #fff;
        text-align: center;
        font-weight: bold;
        /* border: 1px solid #949393; */
        padding: 7px;
        /* text-transform: uppercase; */
    }

    .t_head {
        padding: 4px;
        text-align: center;
        background-color: #fff;
        color: black;
        border: 1px solid #000000;
        font-size: 19px;
        font-family: auto;
    }


    .head {
        text-align: center;
        font-size: 19px;
        text-decoration: underline;
        font-family: cursive;
    }

    @media (min-width: 992px) {

        .col-lg-1 {
            width: 10%;
        }

        .col-lg-5 {
            width: 45%;
        }
    }

    .div_head {
        color: #fff;
        padding: 13px;
        font-size: 18px;
        background-color: #01987a;
        border: 1px solid #c4c4c4;
        text-align: center;
        font-weight: 500;
        font-family: math;
        border-radius: 11px;
        text-decoration: underline;
    }

    .div_body {
        padding: 6px;
        border: 1px solid #c4c4c4;
        font-size: 19px;
        background-color: #fff;
        font-weight: 600;
        text-align: center;
        border-radius: 11px;
        color: black;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }



    /* .btn_style {
        padding: 5px 32px;
    border-radius: 15px;
    background-color: #198754;
    color: #fff;
    font-weight: 500;
    border: none;
    } */
    /* .btn_style:hover{
        background-color: #1b1956;
        color: #fff;
    } */
    .btn_style:focus {
        background-color: aliceblue;
        color: black;
        border: 1px solid;
    }
</style>

<body>
    <?php
    require_once('header.php');
    ?>
    <div class="container-fluid" style="padding: 35px;">
        <p class="head">Here are our Recommendations. Please confirm and proceed to invest</p>

        <?php
        
        $sugg_scheme=array();
        $sugg_scheme["Conservative"]=array(
            "sip"=>["s1","s2","s3","s4"],
            "lump"=>['Equity Fund','Large Cap','Mid Cap','Flexi Cap','Stocks','Unit Linked Insurance Plan','P2P Combo']);
        $sugg_scheme["Modrate"]=array(
            "sip"=>["s4","s5","s6"],
            "lump"=>['Equity Fund','Large Cap','Mid Cap','Flexi Cap','Stocks','Unit Linked Insurance Plan','P2P Combo']);
        $sugg_scheme["Aggressive"]=array(
            "sip"=>["s7","s8","s9"],
            "lump"=>['Equity Fund','Large Cap','Mid Cap','Flexi Cap','Stocks','Unit Linked Insurance Plan','P2P Combo']);
            function generate_option($user_type,$invest_type){
                $ss=$GLOBALS["sugg_scheme"][$user_type][$invest_type];
                $markup="<option >choose scheme</option>";
                foreach($ss as $s){
                    $markup .="<option value='{$s}'>{$s}</option>";
                }
                    return $markup;
            }
            function handle_amt($invest_type,$amt){
                $markup="";
                if($invest_type=="sip"){
                    // if ($amt >= 2000) {

                    //     $suggest_amt = $amt/ 2;
                    //     echo   "<input type='number' name='suggest_sip' oninput='total_amt()' class='op w-75 my-1' value='{$suggest_amt}' >";
                    //     echo   "<input type='number' name='suggest_sip' oninput='total_amt()' class='op w-75 my-1' value='{$suggest_amt}' >";
                    // } else {
                    // }
                    echo   "<input type='number' name='suggest_sip[]' oninput='total_amt()' data-type='sip' data-amt='{$amt}' class='form-control m-auto op w-75 my-1' value='{$amt}'>";
                }else{

                    echo   "<input type='number' name='suggest_lump[]' oninput='total_amt()' data-type='lump' data-amt='{$amt}' class='form-control m-auto op w-75 my-1' value='{$amt}'>";
                }
                return $markup;
            }
        $sql = "SELECT * FROM `user_goal` where email='{$_SESSION['goaluser']}'";
        $get_ut = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `user_type` from `user_type` where user_email='{$_SESSION['goaluser']}'"));
        echo mysqli_error($conn);
        $result = mysqli_query($conn, $sql);
        // var_dump($get_ut);

        ?>
        <!-- <table border="2">
            <thead> -->
        <?php

        if (mysqli_num_rows($result) > 0) {
            $total_sip = 0;
            $total_lump = 0;
            while ($row = mysqli_fetch_array($result)) {
                $goal_data  = json_decode($row["goal_data"], true);
                // var_dump($goal_data);
                    $futureage=0;
                    if ($row["goal"] == "education") {
                        $futureage = $goal_data["futureages"] - $goal_data["age"];
                    }
                    if ($row["goal"] == "vacation" || $row["goal"] == "car" ) {
                        $futureage = $goal_data["futureyear"];
                    }
                    if ($row["goal"] == "retirement") {
                        $futureage = $goal_data["retirementage"] - $goal_data["currentage"];
                    }
                    if ($row["goal"] == "marriage") {
                        $futureage = $goal_data["futureage"] - $goal_data["currentagechild"];
                    }
                    if ($row["goal"] == "house"){
                        $futureage =$goal_data["futureage"];
                    }
                $total_sip += $row['plan_sip'];
                $total_lump += $row['plan_lumpsum'];
                if ($row['plan_sip'] == 0 &&  $row['plan_lumpsum'] == 0) {
                    continue;
                }
                $amt=$goal_data["ansinputs"];
                echo "<div class='row rounded mt-3 g-table mx-2 mx-xm-4' style='background-color:var(--{$row["goal"]})' data-gid='{$row['id']}'>
                                <div class='col-lg-1 col-sm-12  text-capitalize  t_boarder' style='padding:10px;'>                              
                                    <p >Goal</p>
                                    <span>{$row['goal']}</span><br>
                                    <img src='./images/{$row["goal"]}.svg' style='width: 70px;margin-top: 10px;'>
                                    <span class='show-r-amt'>{$amt}</span>
                                    <p >$futureage years</p>
                                    </div>
                                <div class=' col-lg-5 col-md-6 col-sm-12 p-0 m-0'>
                                    <p class='t_boarder'>Plan SIP Amount {$row['plan_sip']}</p> 
                                    <div class='rounded d-flex t_head t_boarder'>
                                    <span class='col-6 '><p>Scheme Type</p>
                                        <select  class='form-control m-auto w-75 s1 my-1' id='demos-{$row['id']}' onchange='checkPrice(this)' data-sid='schemeS{$row['id']}' name='s-{$row['id']}[]'>";
                                        echo generate_option($get_ut["user_type"],"sip");
                                        echo " </select>
                                    </span>
                                        <span class='col-6' style='border-left: 1px solid #999393;'><p>Amount</p> ";
                                        echo handle_amt("sip",$row['plan_sip']);
                    
                    echo "<button type='button' id='ss-{$row['id']}' class='btn btn-success splitAmt' data-sel='demos-{$row['id']}' data-atype='sip'>Split Amount</button></span>
                    </div></div>
                    <div class=' col-lg-5 col-md-6 col-sm-12 p-0 m-0 t_boarder'>
                       <p class='t_boarder'>Plan LUMPSUM Amount {$row['plan_lumpsum']}</p>
                       <div class='rounded d-flex t_head'>
                       <span class='col-6'><p>Scheme Type</p>
                                           <select  class='form-control m-auto w-75 s2 my-1' id='demol-{$row['id']}' onchange='checkPrice(this)' data-sid='schemeL{$row['id']}' name='id='l-{$row['id']}[]'>";
                                         echo  generate_option($get_ut["user_type"],"lump");
                                      echo "</select>
                           </span>
                           <span class='col-6' style='border-left: 1px solid #999393;'><p>Amount</p>";
                           echo handle_amt("lump",$row['plan_lumpsum']);

                    echo "<button type='button' id='sl-{$row['id']}' class='btn btn-success splitAmt' data-atype='lump' data-sel='demol-{$row['id']}'>Split Amount</button></span></div></div></div>";
                } 
            }
        echo "<div class='row mt-5 mx-5'>
        <div class='col-6 div_head'>SIP AMOUNT TO INVEST<br>
        <div class='div_body' id='total_sip'>$total_sip</div></div>

        <div class='col-6 div_head'>LUMPSUM AMOUNT TO INVEST<br>
        <div class='div_body' id='total_lump'>$total_lump</div></div><br>
       
       
        </div><br><br>
        <div style='text-align: center;'><a href='investment.php'><button class='btn btn-primary'>BACK</button></a>&nbsp;&nbsp;
        <button class='btn btn-success btn_style'>PROCEED</button></div>";
        ?>

    </div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="./assets/bootstrap.bundle.min.js"></script>
<script>
    function checkPrice(e) {
        document.querySelector(`input#${e.dataset.sid}`).value = e.value;
        // $(`input#${e.dataset.sid}`).val(e.value);

    }
    $(".show-r-amt").each(function(i,el){
        console.log(el);
        temp= +el.innerHTML.replaceAll(",", "")
        el.innerHTML=temp.toLocaleString("en-IN",{style: 'currency', currency: 'INR', maximumFractionDigits: 0});

        // el.toLocaleString("en-IN",{ maximumFractionDigits: 0});
    });
    $(".splitAmt").click(function(e){
        const allIn=$(e.target).siblings("input")
        const inp=allIn.last();
        // allIn.each((i,el)=>{
        //     el.value = el.dataset.amt/(allIn.length +1);
        // })
        // console.log(inp);
        const b=5;
        let amt1=Math.round(inp.val()*(2/b));
        let amt2=Math.round(inp.val()*(3/b));
        let rem=amt2%1000;
        let amt=amt1+rem;
        if(amt <= 2000 && e.target.dataset.atype=="sip"){
            return;
        }else if(amt <= 5000 && e.target.dataset.atype=="lump"){
            return;
        }
        inp.val(amt);
        const markup=inp.clone()[0];
        markup.value = Math.round(amt2-rem);
        const mat=$(`select#${e.target.dataset.sel}`).last().clone();
        // mat.attr("name",e.target.dataset.sel+'[]');
        markup.id=e.target.dataset.sel+"-"+allIn.length
        // markup.name=e.target.dataset.sel+"amt[]"
        console.log(mat);
        $(`select#${e.target.dataset.sel}`).last().after(mat);
        $(e.target).before(markup)
    })
    function total_amt() {

        var sip_value = 0;
        var lump_value = 0;

        $('input[name="suggest_sip"]').each(function() {
            sip_value += +this.value;
            console.log(sip_value);
        });
        document.getElementById('total_sip').innerHTML = sip_value;

        $('input[name="suggest_lump"]').each(function() {
            lump_value += +this.value;
            console.log(lump_value);
        });
        document.getElementById('total_lump').innerHTML = lump_value;

        var sip = document.getElementById('')
    };
</script>

</html>