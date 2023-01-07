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
            padding: 5%;
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

        .modal_style {
            border: 1px solid #c2c2c2;
            border-radius: 12px;
            padding: 30px;
            font-family: cursive;
            font-style: italic;
        }

        .nav-tabs {
            border-bottom: none;
            margin-top: 14px;
            display: flex;
            justify-content: center;
        }

        .modal-title {
            color: #1a165f;
            width: 100%;
            text-align: center;
            font-size: 28px;
            font-family: fangsong;
            text-decoration: underline;
        }

        .btnNext:hover,
        .btnPrevious:hover {
            background-color: #ffffff;
            color: #1a165f;
        }

        /* .btnNext:focus{
            background-color: #ffffff;
            color: #313f80;
        } */
    </style>
</head>

<body>
    <?php include("./header.php"); ?>
    <!-- <div class="container"> -->

    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item"><a class="num nav-link active show" role="tab button">1</a></li>
            <li class="nav-item"><a class="num nav-link" role="tab button">2</a></li>
            <li class="nav-item"><a class="num nav-link" role="tab button">3</a></li>
            <li class="nav-item"><a class="num nav-link" role="tab button">4</a></li>
            <li class="nav-item"><a class="num nav-link" role="tab button">5</a></li>
            <li class="nav-item"><a class="num nav-link" role="tab button">6</a></li>
            <li class="nav-item"><a class="num nav-link" role="tab button">7</a></li>
            <li class="nav-item"><a class="num nav-link" role="tab button">8</a></li>
            <li class="nav-item"><a class="num nav-link" role="tab button">9</a></li>
            <li class="nav-item"><a class="num nav-link" role="tab button">10</a></li>
        </ul><br>

        <div class="tab-content container-fluid">
            <div id="a1" class="tab-pane fade active show" role="tabpanel">
                <h4 class="que_h4">Q.1</h4>
                <p class="que_p">What is your goal for this account?</p><br>
                <div class="row">
                    <div class="col-6">
                        <div class="box">
                            <input type="radio" id="1a" class="que1b radi risk_cap" name="que_1" value="20" onclick="que1();">
                            <label for="1a" class="small_text ques1">prepare for retirement.</label><br>
                        </div><br>
                        <div class="box">
                            <input type="radio" id="1f" class="que1b radi risk_cap" name="que_1" value="25" onclick="que1();">
                            <label for="1f" class="small_text ques1 ">build long term wealth.</label><br>
                        </div>
                        <br>
                        <div class="box">
                            <input type="radio" id="1c" class="que1b radi risk_cap" name="que_1" value="20" onclick="que1();">
                            <label for="1c" class="small_text ques1">save for something special (vacation, new car, etc.).</label><br>
                        </div><br>
                    </div>
                    <div class="col-6">
                        <div class="box">
                            <input type="radio" id="1d" class="que1a radi risk_cap" name="que_1" value="11" onclick="que1();">
                            <label for="1d" class="small_text ques1">build a rainy day fund for emergencies.</label><br>
                        </div><br>
                        <div class="box">
                            <input type="radio" id="1e" class="que1a radi risk_cap" name="que_1" value="0" onclick="que1();">
                            <label for="1e" class="small_text ques1">generate income for expenses.</label><br>
                        </div><br>
                        <div class="box">
                            <input type="radio" id="1b" class="que1b radi risk_cap" name="que_1" value="10" onclick="que1();">
                            <label for="1b" class="small_text ques1">save for major upcoming expenses (education, health bills, etc.).</label><br>
                        </div><br>
                    </div>
                </div>
            </div>
            <div id="a2" class="tab-pane fade" role="tabpanel">
                <h4 class="que_h4">Q.2</h4>
                <p class="que_p">What is your understanding of stocks, bonds, and ETFs?</p>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-2">
                        <div class="box">
                            <input type="radio" class="radi risk_will" id="2a" name="que_2" value="0">
                            <label for="2a" class="small_text ques2">no</label><br>
                        </div><br>
                        <div class="box">
                            <input type="radio" class="radi risk_will" id="2b" name="que_2" value="7">
                            <label for="2b" class="small_text ques2">some</label><br>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="box">
                            <input type="radio" class="radi risk_will" id="2c" name="que_2" value="11">
                            <label for="2c" class="small_text ques2">good</label><br>
                        </div><br>
                        <div class="box">
                            <input type="radio" class="radi risk_will" id="2d" name="que_2" value="15">
                            <label for="2d" class="small_text ques2">extensive</label><br>
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
                            <label for="3c" class="small_text">I see opportunity for great alerts.</label><br>
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
            </div>
            <div id="a5" class="tab-pane fade" role="tabpanel">
                <div id="5a" style="display:none;">
                    <h4 class="que_h4">Q.5</h4>
                    <p class="que_p m-0"> What did you do when you experienced a 20% decline Scoring in the value of your investments?</p>
                    <div class="row">
                        <div class="col-6">
                            <div class="box">
                                <input type="radio" class="radi risk_will" id="5aa" name="que_5_a" value="0">
                                <label for="5aa" class="small_text">sold everything.</label>
                            </div><br>
                            <div class="box">
                                <input type="radio" class="radi risk_will" id="5ab" name="que_5_a" value="10">
                                <label for="5ab" class="small_text">sold some.</label>
                            </div><br>
                        </div>
                        <div class="col-6">
                            <div class="box">
                                <input type="radio" class="radi risk_will" id="5ac" name="que_5_a" value="5">
                                <label for="5ac" class="small_text">did nothing.</label>
                            </div><br>
                            <div class="box">
                                <input type="radio" class="radi risk_will" id="5ad" name="que_5_a" value="20">
                                <label for="5ad" class="small_text">reallocated my investments.</label>
                            </div><br>
                            <div class="box">
                                <input type="radio" class="radi risk_will" id="5ae" name="que_5_a" value="40">
                                <label for="5ae" class="small_text">bought more.</label>
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
                            <label for="6c" class="small_text">I confidently make decisions and don’t look back.</label>
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


            </div>

            <!-- starting modal -->
            <div class="modal" id="myModal">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content modal-xl">

                        <div class="modal-header">
                            <h4 class="modal-title">Your Investment Outlook</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>


                        <div class="modal-body" style="color:black;">
                            <div class="container-fluid" style="color:black;text-align:center;">
                                <h5 style="font-style: italic;font-size: 20px;">Before you get recommendations, let's understand your Investment Mind</h5><br>
                                <div class="row">
                                    <div class="col-5">
                                        <img src="./images/RISH TOLERANCE.png" alt="" class="w-75">
                                    </div>
                                    <div class="col-6 modal_style">
                                        <p> What is Investment Mind</p>
                                        <p>Your Investment Mind helps us to recommend appropriate investment suitable to your goals.</p>
                                        <p>Understand your Investment Mind takes into account</p>
                                        <ol>
                                            <li>Risk Capacity - Risk you can AFFORD to take based on your life situation</li>
                                            <li>Risk Tolerance - Risk you are COMFORTABLE to take whilw investing</li>
                                            <li>Risk Need - Risk you NEED to take to meet your financial goals.</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Continue</button>
                        </div>

                    </div>
                </div>
            </div>



            <!-- last modal -->
            <div class="modal" id="myModal1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content modal-lg">

                        <div class="modal-header">
                            <h4 class="modal-title">Your Investment Mind Is:-</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="hideModal()"></button>
                        </div>


                        <div class="modal-body" style="color:black;">
                            <div class="container-fluid" style="color:black;text-align:center;">
                                <div class="row">
                                    <div class="col-6 col-sm-5">
                                        <img src="./images/GRAPH 2.png" alt="" class="w-75">
                                    </div>
                                    <div class="col-6 col-sm-5" style="border:1px solid black;border-radius: 33px; padding: 17px;">
                                        <p>As per Your Question Analysis Your Risk Apetite is</p>
                                        <p style="font-size: 25px; font-style: italic; font-family: system-ui;font-weight: 600;"><span id="portfolio">Modrate</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <p>CLick Next To View Recommandation </p>               
                            <button type="button" class="btn btn-primary" data-bs-dismiss="#myModal1" onclick="hideModal()">Next</button>
                        </div>

                    </div>
                </div>
            </div>

            <div id="Capacitys" class="d-none"></div>
            <div id="Willingnesss" class="d-none"></div>

        </div>
        <div style="text-align: center;margin-top: 4%;">
            <!-- <p id="portfolio"></p> -->
            <button type="button" class="btn btn-light prevtab">Previous</button>
            <button type="button" data-nid="a1" class="btn btn-light nexttab">Next</button>
            <button type="submit" class="btn btn-light d-none" id="type_sub" onclick="displayRadioValue();" >Submit</button>
        </div>
    </div>


    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="./assets/bootstrap.bundle.min.js"></script>


<script>
    let current = 1;

    function bootstrapTabControl() {
        var i, items = $('#myTab .nav-link'),
            pane = $('.tab-pane');
        $('.nexttab').on('click', function() {
            for (i = 0; i < items.length; i++) {
                if ($(items[i]).hasClass('active') == true) {
                    break;
                }
            }

            if (i < items.length - 1) {
                $(items[i]).removeClass('active');
                $(items[i + 1]).addClass('active');
                $(pane[i]).removeClass('show active');
                $(pane[i + 1]).addClass('show active');
            }

        });
        $('.prevtab').on('click', function() {
            for (i = 0; i < items.length; i++) {
                if ($(items[i]).hasClass('active') == true) {
                    break;
                }
            }
            if (i != 0) {
                $(items[i]).removeClass('active');
                $(items[i - 1]).addClass('active');
                $(pane[i]).removeClass('show active');
                $(pane[i - 1]).addClass('show active');
            }
            current--;
            checkVal();
        });
    }
    bootstrapTabControl();

function hideModal(){
    $("#myModal1").modal({backdrop: 'static', keyboard: false}).hide(); 
}


    $(".nexttab").on('click', function() {
        current++;
        checkVal();
        if(current == 10){
            $(this).addClass('d-none');
            $("#type_sub").removeClass('d-none');
        } 
    });

    $(window).on('load', function() {
        $(".nexttab").attr("disabled", true);
        $('#myModal').modal('show');
        checkVal();
    });

    $("#type_sub").click(function() {
        var capcity = $("#Capacitys").html();
        var willingness = $("#Willingnesss").html();
        $.ajax({
            type: "post",
            url: "./UserType.php",
            data: {
                'type_sub': 'type_sub',
                'capcity': capcity,
                'willingness': willingness,
            },
            dataType: "text",
            success: function(data) {
                // console.log(data);
                // alert(data);
                $("#myModal1").modal({backdrop: 'static', keyboard: false}).show(); 
                // data-bs-toggle="modal" data-bs-target="#myModal1" data-backdrop="static" data-keyboard="false"
            }

        });
    });


    function checkVal() {
        $(".nexttab").attr("data-nid", "a" + current)
        $(`#a${current} input[type="radio"]`).on('change', function(e) {
            $(".nexttab").attr("disabled", false);
        });
        if ($(`#a${current} input[type="radio"]:checked`).length > 0) {
            $(`.nexttab[data-nid="a${current}"]`).attr("disabled", false);
        } else {
            $(`.nexttab[data-nid="a${current}"]`).attr("disabled", true);
        }
    }

    // document.getElementById('portfolio').innerHTML = displayRadioValue();

    function displayRadioValue() {
        var capacity = 0;
        var willingness = 0;

        $('input[type="radio"].risk_cap:checked').each(function() {
            capacity += +this.value;
        });
        document.getElementById('Capacitys').innerHTML = capacity;

        $('input[type="radio"].risk_will:checked').each(function() {
            willingness += +this.value;
        });
        document.getElementById('Willingnesss').innerHTML = willingness;

        var risk_cap = +$("#Capacitys").html();
        var risk_will = +$("#Willingnesss").html();

        if (risk_cap >= 0 && risk_cap <= 10 && risk_will >= 0 && risk_will <= 99) {
            alert("Portfolio No:- 1");
            $("#portfolio").text("Conservative")
        } else if (risk_cap >= 11 && risk_cap <= 20) {
            if (risk_will >= 0 && risk_will <= 80) {
                alert("portfolio no:- 2");
                $("#portfolio").text("Conservative");
            } else if (risk_will >= 81 && risk_will <= 100) {
                alert("portfolio no:-3");
                $("#portfolio").text("Conservative");
            }
        } else if (risk_cap >= 21 && risk_cap <= 30) {
            if (risk_will >= 0 && risk_will <= 50) {
                alert("portfolio no:-3");
                $("#portfolio").text("Conservative");
            } else if (risk_will >= 51 && risk_will <= 90) {
                alert("portfolio no:- 4");
                $("#portflio").text("Modrate");
            } else if (risk_will >= 91 && risk_will <= 100) {
                alert("portfolio no:-5");
                $("#portflio").text("Modrate");
            }
        } else if (risk_cap >= 31 && risk_cap <= 40) {
            if (risk_will >= 0 && risk_will <= 10) {
                alert("portfolio no:- 3");
                $("#portfolio").text("Conservative");
            } else if (risk_will >= 11 && risk_will <= 60) {
                alert("portfolio no:- 4");
                $("#portfolio").text("Conservative");
            } else if (risk_will >= 61 && risk_will <= 100) {
                alert("portfolio ni:-5");
                $("#portflio").text("Modrate");
            }
        } else if (risk_cap >= 41 && risk_cap <= 80) {
            if (risk_will >= 0 && risk_will <= 40) {
                alert("portfolio no :- 4");
                $("#portfolio").text("Conservative");
            } else if (risk_will >= 41 && risk_will <= 80) {
                alert("portfolio no:- 5");
                $("#portflio").text("Modrate");
            } else if (risk_will >= 81 && risk_will <= 100) {
                alert("portfolio no:- 6");
                $("#portflio").text("Modrate");
            }
        } else if (risk_cap >= 51 && risk_cap <= 60) {
            if (risk_will >= 0 && risk_will <= 40) {
                alert("portfolio no:-5");
                $("#portflio").text("Modrate");
            } else if (risk_will >= 41 && risk_will <= 80) {
                alert("portfolio no :- 6");
                $("#portflio").text("Modrate");
            } else if (risk_will >= 81 && risk_will <= 100) {
                alert("portfolio no:- 7");
                $("#portflio").text("Modrate");
            }
        } else if (risk_cap >= 61 && risk_cap <= 70) {
            if (risk_will >= 0 && risk_will <= 20) {
                alert("portfolio no :-5");
                $("#portflio").text("Modrate");
            } else if (risk_will >= 21 && risk_will <= 50) {
                alert("portfolio no :-6");
                $("#portflio").text("Modrate");
            } else if (risk_will >= 51 && risk_will <= 70) {
                alert("portfolio no:- 7");
                $("#portflio").text("Modrate");
            } else if (risk_will >= 71 && risk_will <= 90) {
                alert("portfolio no:- 8");
                $("#portflio").text("Modrate");
            } else if (risk_will >= 91 && risk_will <= 100) {
                alert("portfolio no :-9");
                $("#portfolio").text("Aggressive");
            }
        } else if (risk_cap >= 71 && risk_cap <= 80) {
            if (risk_will >= 0 && risk_will <= 30) {
                alert("posrtfolio no:- 6");
                $("#portflio").text("Modrate");
            } else if (risk_will >= 31 && risk_will <= 60) {
                alert("portfolio no :-7");
                $("#portflio").text("Modrate");
            } else if (risk_will >= 61 && risk_will <= 70) {
                alert("postfolio no:- 8");
                $("#portflio").text("Modrate");
            } else if (risk_will >= 71 && risk_will <= 80) {
                alert("portfolio no :-9");
                $("#portfolio").text("Aggressive");
            } else if (risk_will >= 81 && risk_will <= 100) {
                alert("portfolio no :- 10");
                $("#portfolio").text("Aggressive");
            }
        } else if (risk_cap >= 81 && risk_cap <= 90) {
            if (risk_will >= 0 && risk_will <= 20) {
                alert("portfolio no:- 7");
                $("#portflio").text("Modrate");
            } else if (risk_will >= 21 && risk_will <= 50) {
                alert("portfolio no:- 8");
                $("#portflio").text("Modrate");
            } else if (risk_will >= 51 && risk_will <= 60) {
                alert("portfolio no:- 9");
                $("#portfolio").text("Aggressive");
            } else if (risk_will >= 61 && risk_will <= 80) {
                alert("portfolio no :-10");
                $("#portfolio").text("Aggressive");
            } else if (risk_will >= 81 && risk_will <= 90) {
                alert("portfolio no:-11");
                $("#portfolio").text("Aggressive");
            } else if (risk_will >= 91 && risk_will <= 100) {
                alert("portfolio no:- 12");
                $("#portfolio").text("Aggressive");
            }
        } else if (risk_cap >= 91 && risk_cap <= 100) {
            if (risk_will >= 0 && risk_will <= 20) {
                alert("portfolio no:- 8");
                $("#portflio").text("Modrate");
            } else if (risk_will >= 21 && risk_will <= 50) {
                alert("portfolio no :- 9");
                $("#portfolio").text("Aggressive");
            } else if (risk_will >= 51 && risk_will <= 60) {
                alert("portfolio no :- 10");
                $("#portfolio").text("Aggressive");
            } else if (risk_will >= 61 && risk_will <= 80) {
                alert("portfolio no :- 11");
                $("#portfolio").text("Aggressive");
            } else if (risk_will >= 81 && risk_will <= 100) {
                alert("portfolio no :- 12");
                $("#portfolio").text("Aggressive");
            }
        }

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