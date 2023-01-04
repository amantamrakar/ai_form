<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/bootstrap.min.css">

    <title>Question Bank</title>
    <style>
        html {
            height: 100%;
        }

        body {
            /* background: linear-gradient(185deg, #546cdd, #12162f); */
            /* background-repeat: no-repeat; */
            height: 100%;
            background-color: #313f80;
        }

        .container-fluid {

            color: white;
        }

        .que_h4 {
            float: left;
            margin-right: 10px;
            font-weight: 700;
            /* font-size: 20px; */
        }

        .que_p {
            display: flex;
            font-size: 21px;
            font-weight: 700;
            margin-top: 6px;
        }

        label {
            font-size: 17px;
            text-transform: capitalize;
            font-family: emoji;
        }

        /* .w3-button {
            padding: 3px 10px;
        } */
        .tab-content {
            border-radius: 35px;
            padding: 6%;
            border: 1px solid #ffffff3d;
        }

        .nav-pills {
            display: flex;
            justify-content: center;
        }

        .num {
            color: white;
            font-size: 19px;
        }

        .box label {
            border: 1px solid white;
            border-radius: 15px;
            padding: 11px;
        }

        input[type="radio"] {
            display: none;
        }

        input[type="radio"]:checked~label {
            background-color: #ffffff;
            color: #313f80;

        }


        label:hover {
            background-color: #ffffff7a;
            color: black;
        }

        button {
            padding: 9px;
            color: white;
            font-size: 17px;
            border-radius: 6px;
            background-color: #313f80;
            border: 2px solid;
            text-transform: capitalize;
        }

        .small_text {
            width: 100%;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php include("./header.php"); ?>
    <!-- <div class="container"> -->

    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item  "><a data-bs-toggle="tab" class="num nav-link" role="tab button" data-bs-target="#a1">1</a></li>
            <li class="nav-item"><a data-bs-toggle="tab" class="num nav-link" role="tab button" data-bs-target="#a2">2</a></li>
            <li class="nav-item"><a data-bs-toggle="tab" class="num nav-link" role="tab button" data-bs-target="#a3">3</a></li>
            <li class="nav-item"><a data-bs-toggle="tab" class="num nav-link" role="tab button" data-bs-target="#a4">4</a></li>
            <li class="nav-item"><a data-bs-toggle="tab" class="num nav-link" role="tab button" data-bs-target="#a5">5</a></li>
            <li class="nav-item"><a data-bs-toggle="tab" class="num nav-link" role="tab button" data-bs-target="#a6">6</a></li>
            <li class="nav-item"><a data-bs-toggle="tab" class="num nav-link" role="tab button" data-bs-target="#a7">7</a></li>
            <li class="nav-item"><a data-bs-toggle="tab" class="num nav-link" role="tab button" data-bs-target="#a8">8</a></li>
            <li class="nav-item"><a data-bs-toggle="tab" class="num nav-link" role="tab button" data-bs-target="#a9">9</a></li>
            <li class="nav-item"><a data-bs-toggle="tab" class="num nav-link" role="tab button" data-bs-target="#a10">10</a></li>
        </ul><br>

        <div class="tab-content container-fluid">
            <div id="a1" class="tab-pane fade  " role="tabpanel">
                <h4 class="que_h4">Q.1</h4>
                <p class="que_p">What is your goal for this account?</p><br>
                <div class="row">
                    <div class="col-6">
                        <div class="box">
                            <input type="radio" id="1a" class="que1b radi risk_cap" name="que_1" value="20" onclick="que1();">
                            <label for="1a" class="small_text">prepare for retirement.</label><br>
                        </div><br>
                        <div class="box">
                            <input type="radio" id="1f" class="que1b radi risk_cap" name="que_1" value="25" onclick="que1();">
                            <label for="1f" class="small_text">build long term wealth.</label><br>
                        </div>
                        <br>
                        <div class="box">
                            <input type="radio" id="1c" class="que1b radi risk_cap" name="que_1" value="20" onclick="que1();">
                            <label for="1c" class="small_text">save for something special (vacation, new car, etc.).</label><br>
                        </div><br>
                    </div>
                    <div class="col-6">
                        <div class="box">
                            <input type="radio" id="1d" class="que1a radi risk_cap" name="que_1" value="0" onclick="que1();">
                            <label for="1d" class="small_text">build a rainy day fund for emergencies.</label><br>
                        </div><br>
                        <div class="box">
                            <input type="radio" id="1e" class="que1a radi risk_cap" name="que_1" value="0" onclick="que1();">
                            <label for="1e" class="small_text">generate income for expenses.</label><br>
                        </div><br>
                        <div class="box">
                            <input type="radio" id="1b" class="que1b radi risk_cap" name="que_1" value="10" onclick="que1();">
                            <label for="1b" class="small_text">save for major upcoming expenses (education, health bills, etc.).</label><br>
                        </div><br>
                    </div>
                </div>
                        <!-- <button><a data-bs-target="#a2">Next    </a></button> -->
            </div>
            <div id="a2" class="tab-pane fade" role="tabpanel">
                <h4 class="que_h4">Q.2</h4>
                <p class="que_p">What is your understanding of stocks, bonds, and ETFs?</p>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-2">
                        <div class="box">
                            <input type="radio" class="radi risk_will" id="2a" name="que_2" value="0">
                            <label for="2a" class="small_text">no</label><br>
                        </div><br>
                        <div class="box">
                            <input type="radio" class="radi risk_will" id="2b" name="que_2" value="7">
                            <label for="2b" class="small_text">some</label><br>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="box">
                            <input type="radio" class="radi risk_will" id="2c" name="que_2" value="11">
                            <label for="2c" class="small_text">good</label><br>
                        </div><br>
                        <div class="box">
                            <input type="radio" class="radi risk_will" id="2d" name="que_2" value="15">
                            <label for="2d" class="small_text">extensive</label><br>
                        </div>
                    </div>
                </div>
            </div>
            <div id="a3" class="tab-pane fade" role="tabpanel">
                <h4 class="que_h4">Q.3</h4>
                <p class="que_p">When you hear “risk” related to your finances, what is the first thought that comes to mind?</p><br>
                <div class="row">
                    <div class="col-6">
                        <div class="box">
                            <input type="radio" class="radi risk_will" id="3a" name="que_3" value="0">
                            <label for="3a" class="small_text">I worry I could be left with nothing.</label><br>
                        </div><br>
                        <div class="box">
                            <input type="radio" class="radi risk_will" id="3b" name="que_3" value="3">
                            <label for="3b" class="small_text">I understand that it`s an inherent part of the investing process.</label><br>
                        </div><br>
                    </div>
                    <div class="col-6">
                        <div class="box">
                            <input type="radio" class="radi risk_will" id="3c" name="que_3" value="7">
                            <label for="3c" class="small_text">I see opportunity for great returns.</label><br>
                        </div><br>
                        <div class="box">
                            <input type="radio" class="radi risk_will" id="3d" name="que_3" value="10">
                            <label for="3d" class="small_text">I think of the thrill of investing.</label><br>
                        </div>
                    </div>
                </div>
            </div>
            <div id="a4" class="tab-pane fade" role="tabpanel">
                <h4 class="que_h4">Q.4</h4>
                <p class="que_p">Have you ever experienced a 20% or more decline in the value of your investments in one year?</p><br>
                <div class="row"><br>
                    <div class="col-6 box">
                        <input type="radio" class="radi risk_will" id="4a" name="que_4" value="0" onclick="javascript:yesCheck();">
                        <label for="4a" style="width: 50%;text-align: center;">Yes</label><br>
                    </div>
                    <div class="col-6 box">
                        <input type="radio" class="radi risk_will" id="4b" name="que_4" value="0" onclick="javascript:noCheck();">
                        <label for="4b" style="width: 50%;text-align: center;">No</label><br>
                    </div><br>
                </div><br>
            </div><br>
            <div id="a5" class="tab-pane fade" role="tabpanel">
                <div id="5a" style="display:none;">
                    <h4 class="que_h4">Q.5</h4>
                    <p class="que_p m-0"> What did you do when you experienced a 20% decline Scoring in the value of your investments?</p>
                    <div class="row">
                        <div class="col-6">
                            <div class="box">
                                <input type="radio" class="radi risk_will" id="5aa" name="que_5_a" value="0">
                                <label for="5aa" class="small_text">sell everything.</label>
                            </div><br>
                            <div class="box">
                                <input type="radio" class="radi risk_will" id="5ab" name="que_5_a" value="10">
                                <label for="5ab" class="small_text">sell some.</label>
                            </div><br>
                        </div>
                        <div class="col-6">
                            <div class="box">
                                <input type="radio" class="radi risk_will" id="5ac" name="que_5_a" value="5">
                                <label for="5ac" class="small_text">do nothing.</label>
                            </div><br>
                            <div class="box">
                                <input type="radio" class="radi risk_will" id="5ad" name="que_5_a" value="20">
                                <label for="5ad" class="small_text">reallocate my investments.</label>
                            </div><br>
                            <div class="box">
                                <input type="radio" class="radi risk_will" id="5ae" name="que_5_a" value="40">
                                <label for="5ae" class="small_text">buy more.</label>
                            </div>
                        </div><br>
                    </div>
                </div>
                <div id="5b" style="display:none;">
                    <h4 class="que_h4">Q.5</h4>
                    <p class="que_p">If you were ever to experience a 20% decline or more in the value of your investments in one year, what would you do?</p><br>
                    <div class="row">
                        <div class="col-6">
                            <div class="box">
                                <input type="radio" class="radi risk_will" id="5ba" name="que_5_b" value="0">
                                <label for="5ba" class="small_text">sell everything.</label>
                            </div><br>
                            <div class="box">
                                <input type="radio" class="radi risk_will" id="5bb" name="que_5_b" value="10">
                                <label for="5bb" class="small_text">sell some.</label>
                            </div><br>
                        </div>
                        <div class="col-6">
                            <div class="box">
                                <input type="radio" class="radi risk_will" id="5bc" name="que_5_b" value="5">
                                <label for="5bc" class="small_text">do nothing.</label>
                            </div><br>
                            <div class="box">
                                <input type="radio" class="radi risk_will" id="5bd" name="que_5_b" value="15">
                                <label for="5bd" class="small_text">reallocate my investments.</label>
                            </div><br>
                            <div class="box">
                                <input type="radio" class="radi risk_will" id="5be" name="que_5_b" value="20">
                                <label for="5be" class="small_text">buy more.</label>
                            </div><br>
                        </div><br>
                    </div>
                </div>
            </div>
            <div id="a6" class="tab-pane fade" role="tabpanel">
                <h4 class="que_h4">Q.6</h4>
                <p class="que_p">How would you describe your approach to making important financial decisions?</p>
                <div class="row">
                    <div class="col-6">
                        <div class="box">
                            <input type="radio" class="radi risk_will" id="6a" name="que_6" value="0">
                            <label for="6a" class="small_text">I try to avoid making decisions.</label>
                        </div><br>
                        <div class="box">
                            <input type="radio" class="radi risk_will" id="6b" name="que_6" value="6">
                            <label for="6b" class="small_text">I reluctantly make decisions.</label>
                        </div><br>
                        <div class="box">
                            <input type="radio" class="radi risk_will" id="6c" name="que_6" value="15">
                            <label for="6c" class="small_text">I reluctantly make decisions.</label>
                        </div><br>
                    </div>
                </div>
            </div>
            <div id="a7" class="tab-pane fade" role="tabpanel">
                <h4 class="que_h4">Q.7</h4>
                <p class="que_p">How much do you want to invest to get started?</p>
                <div class="row">
                    <div class="col-6">
                        <div class="box">
                            <input type="radio" class="radi risk_cap" id="7a" name="que_7" value="5">
                            <label for="7a" class="small_text">₹1,000 to ₹10,00,000</label>
                        </div><br>
                    </div>
                    <div class="col-6">
                        <div class="box">
                            <input type="radio" class="radi risk_cap" id="7b" name="que_7" value="10">
                            <label for="7b" class="small_text">> ₹10,00,000</label>
                        </div>
                    </div><br>
                </div>
            </div>
            <div id="a8" class="tab-pane fade" role="tabpanel">
                <h4 class="que_h4">Q.8</h4>
                <p class="que_p">How much investment value fluctuation would you be comfortable Scoring with 1 year from now?</p>
                <div class="row">
                    <div class="col-6">
                        <div class="box">
                            <input type="radio" class="radi risk_will" id="8a" name="que_8" value="0">
                            <label for="8a" class="small_text ">−10% to 15%</label>
                        </div><br>
                        <div class="box">
                            <input type="radio" class="radi risk_will" id="8b" name="que_8" value="5">
                            <label for="8b" class="small_text ">−15% to 25%</label>
                        </div><br>
                        <div class="box">
                            <input type="radio" class="radi risk_will" id="8c" name="que_8" value="8">
                            <label for="8c" class="small_text ">−25% to 35%</label>
                        </div><br>
                    </div>
                    <div class="col-6">
                        <div class="box">
                            <input type="radio" class="radi risk_will" id="8d" name="que_8" value="10">
                            <label for="8d" class="small_text ">−30% to 45%</label>
                        </div><br>
                        <div class="box">
                            <input type="radio" class="radi risk_will" id="8e" name="que_8" value="13">
                            <label for="8e" class="small_text ">−35% to 50%</label>
                        </div><br>
                        <div class="box">
                            <input type="radio" class="radi risk_will" id="8f" name="que_8" value="17">
                            <label for="8f" class="small_text ">−40% to 55%</label>
                        </div><br>
                    </div>
                    <div class="col-6">
                        <div class="box">
                            <input type="radio" class="radi risk_will" id="8g" name="que_8" value="20">
                            <label for="8g" class="small_text">−45% to 60%</label>
                        </div>
                    </div><br>
                </div><br>
            </div>
            <div id="a9" class="tab-pane fade" role="tabpanel">
                <h4 class="que_h4">Q.9</h4>
                <p class="que_p">How much do you want to contribute each month?</p>
                <div class="row">
                    <div class="col-6 box">
                        <input type="radio" class="radi risk_cap" id="9a" name="que_9" value="5">
                        <label for="9a" class="small_text">Monthly Contribution / Initial Investment < 10%</label>
                    </div><br>
                    <div class="col-6 box">
                        <input type="radio" class="radi risk_cap" id="9b" name="que_9" value="10">
                        <label for="9b" class="small_text">Monthly Contribution / Initial Investment ≥ 10%</label><br>
                    </div>
                </div><br>
            </div>
            <div id="a10" class="tab-pane fade" role="tabpanel">
                <div id="10a" style="display:none;">
                    <h4 class="que_h4">Q.10</h4>
                    <p class="que_p ">How long do you need the income to last?</p>
                    <div class="row">
                        <div class="col-6">
                            <div class="box">
                                <input type="radio" class="radi risk_cap" id="10aa" name="que_10_a" value="0">
                                <label for="10aa" class="small_text">1 to 4 years</label>
                            </div><br>
                            <div class="box">
                                <input type="radio" class="radi risk_cap" id="10ab" name="que_10_a" value="5">
                                <label for="10ab" class="small_text">5 to 9 years</label>
                            </div><br>
                        </div>
                        <div class="col-6">
                            <div class="box">
                                <input type="radio" class="radi risk_cap" id="10ac" name="que_10_a" value="20">
                                <label for="10ac" class="small_text">10 to 19 years</label>
                            </div><br>
                            <div class="box">
                                <input type="radio" class="radi risk_cap" id="10ad" name="que_10_a" value="35">
                                <label for="10ad" class="small_text">Over 19 years</label>
                            </div>
                        </div>
                    </div><br>
                </div>
                <div id="10b" style="display:none;">
                    <h4 class="que_h4">Q.10</h4>
                    <p class="que_p ">When will you need to start withdrawing funds from this account? </p>
                    <div class="row">
                        <div class="col-6">
                            <div class="box">
                                <input type="radio" class="radi risk_cap" id="10ba" name="que_10_b" value="0">
                                <label for="10ba" class="small_text">1 year</label>
                            </div><br>
                            <div class="box">
                                <input type="radio" class="radi risk_cap" id="10bb" name="que_10_b" value="5">
                                <label for="10bb" class="small_text">2 to 5 years</label>
                            </div><br>
                        </div>
                        <div class="col-6">
                            <div class="box">
                                <input type="radio" class="radi risk_cap" id="10bc" name="que_10_b" value="30">
                                <label for="10bc" class="small_text">6 to 10 years</label>
                            </div><br>
                            <div class="box">
                                <input type="radio" class="radi risk_cap" id="10bd" name="que_10_b" value="55">
                                <label for="10bd" class="small_text">More than 10 years from now</label>
                            </div>
                        </div>
                    </div><br>
                </div>


                <button type="button" onclick="displayRadioValue();">
                    Submit
                </button>

                <div id="Capacity" value="Risk Capacity:- "> </div>
                <div id="Willingness" value="Risk Willingnedd :-"> </div>



            </div>
            <!-- <div style="text-align: center;">
                <button type="button" class="btnPrevious">previous</button>
                <button type="button"class="btnNext">next</button>
            </div> -->
        </div>
    </div>


    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="./assets/bootstrap.bundle.min.js"></script>


<script>
    // $('.btnNext').click(function() {
    //     $('.nav-item > tab-pane.active show').parent().next('li').find('a').trigger('click');
    // });

    // $('.btnPrevious').click(function() {
    //     $('.nav-item > tab-pane.active show').parent().prev('li').find('a').trigger('click');
    // });

    function displayRadioValue() {
        var capacity = 0;
        var willingness = 0;
        $('input[type="radio"].risk_cap:checked').each(function() {
            capacity += +this.value;
            // console.log(capacity);
        });
        $("#Capacity").html(capacity);

        $('input[type="radio"].risk_will:checked').each(function() {
            willingness += +this.value;
            // console.log(capacity);
        });
        $("#Willingness").html(willingness);
    }



    function yesCheck() {
        yesnoCheck();
        if (document.getElementById('4a').checked) {
            document.getElementById('5a').style.display = 'block';
            document.getElementById('5b').style.display = 'none';
        }
    }

    function noCheck() {
        yesnoCheck();
        if (document.getElementById('4b').checked) {
            document.getElementById('5b').style.display = 'block';
            document.getElementById('5a').style.display = 'none';

        }
    }

    function yesnoCheck() {
        var z = document.getElementById("5a");
        var h = document.getElementById("5b");
        if (z.style.display === "none") {
            z.style.display = "block";
            h.style.display = "none";
        } else {
            z.style.display = "none";
            h.style.display = "block";
        }
    }

    function que1() {
        quesol();
        if (document.getElementsByClassName('que1a').checked) {
            document.getElementById('10a').style.display = 'block';
            document.getElementById('10b').style.display = 'none';
        }

    }

    function quesol() {
        var cc = document.getElementById("10a");
        var ccc = document.getElementById("10b");
        if (cc.style.display === "none") {
            cc.style.display = "block";
            ccc.style.display = "none";
        } else {
            cc.style.display = "none";
            ccc.style.display = "block";
        }
    }
</script>

</html>