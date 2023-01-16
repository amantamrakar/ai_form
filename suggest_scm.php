<?php
require_once('connect.php');
require_once('header.php');
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
    @media (min-width: 992px){

    .col-lg-1{
        width:10%;
    }
    .col-lg-5{
        width:45%;
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
    .btn_style:focus{
        background-color: aliceblue;
    color: black;
    border: 1px solid;
    }
</style>

<body>
    <div class="container-fluid" style="padding: 35px;">
        <p class="head">Here are our Recommendations. Please confirm and proceed to invest</p><br>

        <?php
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
                
                $total_sip += $row['plan_sip'];
                $total_lump += $row['plan_lumpsum'];
                    if($row['plan_sip'] == 0 &&  $row['plan_lumpsum'] == 0) {
                        continue;
                    }
                echo "<div class='row mt-3 g-table mx-2 mx-xm-4' style='background-color:var(--{$row["goal"]})' data-gid='{$row['id']}'>
                                <div class=' col-lg-1 col-sm-12  t_boarder' style='padding:10px;'>                              
                                    <p>Goal</p>
                                    <span>{$row['goal']}</span><br>
                                    <img src='./images/{$row["goal"]}.svg' style='width: 70px;margin-top: 10px;'>
                                </div>
                                <div class='col-lg-5 col-md-6 col-sm-12 p-0 m-0 t_boarder' colspan='2'>
                                    <p class='t_boarder'>Plan SIP Amount {$row['plan_sip']}</p> 
                                    <div class='d-flex t_head'>
                                    <span class='col-6'><p>Scheme Name</p>
                                    <input type='text' id='schemeS{$row['id']}' class='op w-75' style='color:black;text-align: center; font-size: 16px;' value='P2P Fund'><br>";
                if ($get_ut["user_type"] == "Conservative") {
                    echo "<div class='dropdown'><br>
                    <button type='button' class='btn btn-primary mb-2' data-bs-toggle='collapse' data-bs-target='#demo-{$row['id']}'>See Another Products</button><br>                
                           <div class='dropdown-content'>
                            <select  class='w-75 s1 collapse' id='demo-{$row['id']}' onchange='checkPrice(this)' data-sid='schemeS{$row['id']}'>
                                <option value='Debt Fund 1'>Debt Fund 1</option>
                                <option value='Debt Fund 2'>Debt Fund 2</option>
                                <option value='Debt Fund 3'>Debt Fund 3</option>
                            </select>
                        </div>
                                </div>  
                                </span> <span class='col-6' style='border-left: 1px solid #999393;'><p>Amount</p>"; 
                                if($row['plan_sip'] >= 2000){
            
                                    $suggest_amt = $row['plan_sip'] / 2 ;
                                  echo   "<input type='number' name='suggest_sip' oninput='total_amt()' class='op w-75 value='$suggest_amt'</span>";      
                                  echo   "<input type='number' name='suggest_sip' oninput='total_amt()' class='op w-75 value='$suggest_amt'</span>";      
                                } else{
                                    echo   "<input type='number' name='suggest_sip' oninput='total_amt()' class='op w-75' value='{$row['plan_sip']}'</span>";      
            
                                }       
                       echo "</div></div>
                       <div class='col-lg-5 col-md-6 col-sm-12 p-0 m-0 t_boarder' colspan='2'>
                       <p class='t_boarder'>Plan LUMPSUM Amount {$row['plan_lumpsum']}</p>
                       <div class='d-flex t_head'>
                       <span class='col-6'><p>Scheme Name</p>
                           <input type='text' id='schemeL{$row['id']}' class='op1 w-75' style='color:black;text-align: center; font-size: 16px;' value='Multi Asset'><br>
                               <div class='dropdown'><br>
                               <button type='button' class='btn btn-primary mb-2' data-bs-toggle='collapse' data-bs-target='#DEMO1-{$row['id']}'>See Another Products</button><br>
                                       <div class='dropdown-content'>
                                           <select  class='w-75 s2 collapse' id='DEMO1-{$row['id']}' onchange='checkPrice(this)' data-sid='schemeL{$row['id']}'>
                                           <option value='P2P Fund 1'>P2P Fund 1</option>
                                           <option value='P2P Fund 2'>P2P Fund 2</option>
                                           <option value='Debt Fund'>Debt Fund</option>
                                           </select>
                                       </div>
                                       </div>
                           </span>
                           <span class='col-6' style='border-left: 1px solid #999393;'><p>Amount</p>";
                           if($row['plan_lumpsum'] >= 10000){

                               $suggest_amt = $row['plan_lumpsum'] / 2 ;
                             echo   "<input type='number' name='suggest_lump' oninput='total_amt()' class='op w-75' value='$suggest_amt'</span>";      
                             echo   "<input type='number' name='suggest_lump' oninput='total_amt()' class='op w-75' value='$suggest_amt'</span>";      
                           } else{
                               echo   "<input type='number' name='suggest_lump' oninput='total_amt()' class='op w-75' value='{$row['plan_lumpsum']}'</span>";      

                           }
                   echo "</div></div></div>";
                } else if ($get_ut["user_type"] == "Modrate") {
                    echo "<div class='dropdown'><br>
                    <button type='button' class='btn btn-primary mb-2' data-bs-toggle='collapse' data-bs-target='#demo-{$row['id']}'>See Another Products</button><br>
                        <div class='dropdown-content'>
                            <select  class='w-75 s1 collapse' id='demo-{$row['id']}' onchange='checkPrice(this)' data-sid='schemeS{$row['id']}'>
                                <option value='P2P Fund'>P2P Fund</option>
                                <option value='Hybrid Fund'>Hybrid Fund</option>
                            </select>
                        </div>
                        </div>  
                    </span> <span class='col-6' style='border-left: 1px solid #999393;'><p>Amount</p>"; 
                    if($row['plan_sip'] >= 2000){
            
                        $suggest_amt = $row['plan_sip'] / 2 ;
                      echo   "<input type='number' name='suggest_sip' oninput='total_amt()' class='op w-75 value='$suggest_amt'</span>";      
                      echo   "<input type='number' name='suggest_sip' oninput='total_amt()' class='op w-75 value='$suggest_amt'</span>";      
                    } else{
                        echo   "<input type='number' name='suggest_sip' oninput='total_amt()' class='op w-75' value='{$row['plan_sip']}'</span>";      

                    }  
                        echo "</div></div>
                        <div class='col-lg-5 col-md-6 col-sm-12 p-0 m-0 t_boarder' colspan='2'>
                            <p class='t_boarder'>Plan LUMPSUM Amount {$row['plan_lumpsum']}</p>
                            <div class='d-flex t_head'>
                            <span class='col-6'><p>Scheme Name</p>
                                <input type='text' id='schemeL{$row['id']}' class='op1 w-75' style='color:black;text-align: center; font-size: 16px;' value='Multi Asset'><br>
                                    <div class='dropdown'><br>
                                    <button type='button' class='btn btn-primary mb-2' data-bs-toggle='collapse' data-bs-target='#DEMO1-{$row['id']}'>See Another Products</button><br>
                                            <div class='dropdown-content'>
                                                <select  class='w-75 s2 collapse' id='DEMO1-{$row['id']}' onchange='checkPrice(this)' data-sid='schemeL{$row['id']}'>
                                                    <option value='P2P Fund'>P2P</option>
                                                    <option value='Hybrid Fund'>Hybrid Fund</option>
                                                    <option value='Multi Asset Fund'>Multi Asset Fund</option>
                                                    <option value='Life Insurance'>Life Insurance</option>
                                                    <option value='Balanced Advantage Fund'>BAF</option>
                                                </select>
                                            </div>
                                            </div>
                                </span>
                                <span class='col-6' style='border-left: 1px solid #999393;'><p>Amount</p>";
                                if($row['plan_lumpsum'] >= 10000){

                                    $suggest_amt = $row['plan_lumpsum'] / 2 ;
                                  echo   "<input type='number' name='suggest_lump' oninput='total_amt()' class='op w-75' value='$suggest_amt'</span>";      
                                  echo   "<input type='number' name='suggest_lump' oninput='total_amt()' class='op w-75' value='$suggest_amt'</span>";      
                                } else{
                                    echo   "<input type='number' name='suggest_lump' oninput='total_amt()' class='op w-75' value='{$row['plan_lumpsum']}'</span>";      
     
                                }
                        echo "</div></div></div>";
                } else if ($get_ut["user_type"] == "Aggressive") {
                    echo "<div class='dropdown'><br>
                                <button type='button' class='btn btn-primary mb-2' data-bs-toggle='collapse' data-bs-target='#demo-{$row['id']}'>See Another Products</button><br>
                                <div class='dropdown-content'>
                                        <select  class='w-75 s1 collapse' id='demo-{$row['id']}'  onchange='checkPrice(this)' data-sid='schemeS{$row['id']}' style='font-size:15px;'><br>
                                        <option value='Equity Fund'>Equity Fund</option>
                                        <option value='Large Cap'>Large Cap</option>
                                        <option value='Mid Cap'>Mid Cap</option>
                                        <option value='Flexi Cap'>Flexi Cap</option>
                                        <option value='Stocks'>Stocks</option>
                                        <option value='Unit Linked Insurance Plan'>ULIP</option>
                                        <option value='P2P Combo'>P2P Combo</option>
                                        </select>
                              </div>
                                </div>  
                            </span> <span class='col-6' style='border-left: 1px solid #999393;'><p>Amount</p>"; 
                            if($row['plan_sip'] >= 2000){

                                $suggest_amt = $row['plan_sip'] / 2 ;
                              echo   "<input type='number' name='suggest_sip' oninput='total_amt()' class='op w-75' value='$suggest_amt'</span>";      
                              echo   "<input type='number' name='suggest_sip' oninput='total_amt()' class='op w-75' value='$suggest_amt'</span>";      
                            } else{
                                echo   "<input type='number' name='suggest_sip' oninput='total_amt()' class='op w-75' value='{$row['plan_sip']}'</span>";      
 
                            }


                       echo  "</div></div>
                        <div class='col-lg-5 col-md-6 col-sm-12 p-0 m-0 t_boarder' colspan='2'>
                            <p class='t_boarder'>Plan LUMPSUM Amount {$row['plan_lumpsum']}</p>
                            <div class='d-flex t_head'>
                            <span class='col-6'><p>Scheme Name</p>
                                <input type='text' id='schemeL{$row['id']}' class='op1 w-75' style='color:black;text-align: center; font-size: 16px;' value='Equity Fund'><br>
                                    <div class='dropdown'><br>
                                    <button type='button' class='btn btn-primary mb-2' data-bs-toggle='collapse' data-bs-target='#DEMO1-{$row['id']}'>See Another Products</button><br>
                                    <div class='dropdown-content'>
                                                <select  class='w-75 s2 collapse' id='DEMO1-{$row['id']}' onchange='checkPrice(this)' data-sid='schemeL{$row['id']}' >
                                                    <option value='Equity Fund'>Equity Fund</option>
                                                    <option value='Large Cap'>Large Cap</option>
                                                    <option value='Mid Cap'>Mid Cap</option>
                                                    <option value='Flexi Cap'>Flexi Cap</option>
                                                    <option value='Stocks'>Stocks</option>
                                                    <option value='Unit Linked Insurance Plan'>ULIP</option>
                                                    <option value='P2P Combo'>P2P Combo</option>
                                                </select>
                                            </div>
                                            </div>
                                            </span><span class='col-6' style='border-left: 1px solid #999393;'><p>Amount</p>";
                                            if($row['plan_lumpsum'] >= 10000){

                                                $suggest_amt = $row['plan_lumpsum'] / 2 ;
                                              echo   "<input type='number' name='suggest_lump' oninput='total_amt()' class='op w-75' value='$suggest_amt'</span>";      
                                              echo   "<input type='number' name='suggest_lump' oninput='total_amt()' class='op w-75' value='$suggest_amt'</span>";      
                                            } else{
                                                echo   "<input type='number' name='suggest_lump' oninput='total_amt()' class='op w-75' value='{$row['plan_lumpsum']}'</span>";      
                 
                                            }
                
                           echo  "</div></div></div> ";
                }
            }
        }
        echo "<div class='row mt-5 mx-5'>
        <div class='col-6 div_head'>SIP AMOUNT TO INVEST<br>
        <div class='div_body' id='total_sip'>$total_sip</div></div>

        <div class='col-6 div_head'>LUMPSUM AMOUNT TO INVEST<br>
        <div class='div_body' id='total_lump'>$total_lump</div></div><br>
       
       
        </div><br><br>
        <div style='text-align: center;'><a href='investment.php'><button class='btn  btn-primary'>BACK</button></a>&nbsp;&nbsp;<button class='btn btn-success btn_style'>PROCEED</button></div>";
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
    function total_amt(){

            var sip_value = 0;
            var lump_value= 0;

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