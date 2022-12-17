<?php
session_start();
if (!isset($_SESSION["goaluser"])) {
    header("location: ./index.php");
}
require_once("./connect.php");

// $_SESSION["goaluser"] = "nikhil1@gmail.com";
// $_SESSION["goal"] = "vacation";
$data = array();
// if (!isset($_SESSION["goaluser"])) {
//     echo "you are not auth";
//     die();
// } else {
if (!isset($_SESSION["goal"])) {
    $_SESSION["goal"] = "pass"; //?to pass all the letter or notation
}
$sql = "SELECT * FROM `user_goal` WHERE `email`='{$_SESSION["goaluser"]}' AND `goal`='{$_SESSION["goal"]}' ORDER BY `id`  DESC";
// echo $sql;
$resgister_sql = "SELECT `full_name` FROM `registered_user` WHERE `email`='{$_SESSION["goaluser"]}'";
$register_result = mysqli_query($conn, $resgister_sql);
if (mysqli_num_rows($register_result) > 0) {
    $row = mysqli_fetch_assoc($register_result);
    $user_name = $row['full_name'];
    $_SESSION["user_full_name"] = $row['full_name'];
}
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result)) {
    $row = mysqli_fetch_assoc($result);
    array_push($data, $row);
} else {
    $status = true;
    // die();
}
// }
?>
<style>
    .bottons {
        border-radius: 20px;
        border: none;
        background-color: #0E4A75;
        padding: 10px 16px;
        color: #FFFFFF;
        font-size: 15px;
        font-weight: bold;
        letter-spacing: 1px;
        text-transform: capitalize;
    }

    .bottons:active {
        transform: scale(0.95);
    }

    .bottons:focus {
        outline: none;
    }

    .bottons:hover {
        background-color: #FFFFFF;
        color: #223C86;
        cursor: pointer;
    }

    .labels {
        font-size: 20px;
        color: black;
        text-align: center;
        font-weight: 500;
    }

    .inputans {
        background-color: #1a1b50;
        text-align: center;
        padding: 6px;
        border-radius: 5px;
        color: white;
        border: 1px solid black;
        font-size: 22px;
    }

    .imp {
        padding: 6px;
        text-align: center;
        text-transform: capitalize;
        font-size: 19px;
    }

    .imp_disabled {
        padding: 6px;
        text-align: center;
        text-transform: capitalize;
        font-size: 19px;
        border: none;
    }

    /* for road map */
    body {
        overflow-x: hidden;
    }

    .road-map {
        display: flex;
        justify-content: center;
    }

    #g-path {
        min-width: 900px;
    }

    .goal-box {
        cursor: pointer;
        position: relative;
        transform-origin: center;
        animation: box 1s ease-in 1;
    }

    @keyframes box {
        0% {
            transform: scaleX(0);
        }

        100% {
            transform: scaleX(1);
        }
    }

    #g-path rect {
        fill: transparent;
        stroke-width: 2;
        stroke: #4949ff;
        stroke-opacity: 1;
        width: 80px;
        height: 42px;
    }

    #g-path rect:hover {
        stroke-width: 3;
        fill: #eeeeff;
    }

    #g-path #h-line {
        fill: none;
        stroke: #000000;
        stroke-width: 2.5;
        stroke-linecap: butt;
        stroke-linejoin: miter;
        stroke-opacity: 1;
        stroke-miterlimit: 4;
    }

    #g-path .v-line {
        fill: none;
        stroke: #000000;
        stroke-width: 2.5;
        stroke-linecap: butt;
        stroke-linejoin: miter;
        stroke-opacity: 1;
        stroke-miterlimit: 4;
        stroke-dasharray: none
    }

    #g-path text {
        pointer-events: none;
        text-transform: capitalize;
        font-size: 8px;
        line-height: 1.25;
        font-family: sans-serif;
        fill: #ffffff;
        fill-opacity: 1;
        stroke: none;
        stroke-width: 0.264583;
        stroke-opacity: 1
    }

    #cybox {
        width: 100%;
        height: 50px;
        text-align: center;
    }

    #cybox #current-year {
        color: #ffffff;
        background-color: #6868ff;
    }

    .box-action {
        width: 20px;
    }

    .a-btn {
        display: flex;
        flex-wrap: nowrap;
        height: 100%;
        flex-direction: column;
        justify-content: space-between;
    }

    .box-action img {
        box-sizing: content-box;
        vertical-align: baseline;
        width: 10px;
        height: 10px;
        background-color: white;
        border: 2px solid #4949ff;
        border-radius: 25px;
        padding: 10%;
    }
    /* #g-path text.goal-text{
        
} */
    .box-action img:hover {
        background-color: pink;
    }
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
        #show-goal-table {
            display: none
        }
        .road-year{
            fill: red;
            text-anchor: middle;
        }
    </style>
</head>

<body>
    <fieldset>
        <a href="logout.php"><button type="text" style="font-size: 19px;background-color: antiquewhite;padding: 6px 9px;border-radius: 5px;font-weight: 500;float: right;margin-top: 12px;margin-right: 18px;">Logout</button></a>
        <!-----------------------------Education----------------------------------------------->
        <?php
        if ($_SESSION["goal"] == 'education') {
            $value = json_decode($data[0]['goal_data'], true);
            $age = $value['futureages'] - $value['age'];
        ?>
            <div class="goals" data-goal="education"><br />
                <div class="container">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4" style="display:flex;">
                                    <img src="images/userprofile.png" class="" alt="Avatar" style="height: 70px;width:66px;margin-top: 11px;margin-left: 15px;">
                                    <p style="color: black;margin-left: 12px;margin-top: 40px;margin-right: 120px;font-weight: 700;">Hello </p>

                                </div>
                            </div>
                            <div class="col-12" style="color:black;font-size:21px;font-family: serif;">
                                <p class="ml-5" style="color:black;">
                                    Dear <span id="p-name"><?php echo $user_name ?></span>,<br></p>
                                <blockquote style="margin-left:50px;margin-right:30px;" align="justify"> Give your <b>children</b> the <b><i>Education</i></b> they deserve and do provide them a better education.
                                    We are happy to see that you are <b> passionate </b> about your life goals and understand the value of <b>investing</b> to accomplish your <b>goals.</b><br>
                                    <span style="position:relative;left:40px;"> To Achieve this Goal you need to Accumulate <span id="p-ansinput" style="color: green;font-weight: 700;font-size: 21px;"><?php echo $value['ansinputs'] ?></span>
                                        within <span id="set11edu" style="color: green;font-weight: 700;font-size: 21px;"><?php echo $age ?></span> Years,
                                        <span style="color:orange;"> SIP REQUIRED </span> is ₹ <span id="p-sipans" style="color: red;font-weight: 700;font-size: 22px;"><?php echo $value['sipvalue'] ?></span> per month.</span><br>
                                    Worried about the above numbers? <b>Please don’t be.</b><br>
                                    Feel free to contact us for further <b>financial planning</b><br>
                                    We have sent the details to you on your email Address. <b> Please do check </b>

                                </blockquote>
                            </div>

                            <div class="row">
                                <div class="col-12" style="text-align: center;justify-content: space-evenly;">
                                    <button type="button" class="bottons btnss from-left" style="margin-left:-30px;" onclick="location.href='./pdf.php'">Download PDF</button>
                                    <button type="button" class="bottons btnss from-left" style="margin-left:34px;" onclick="location.href='./index.php'">Plan Another Goal</button>
                                    <button type="button" class="bottons btnss from-left" id="meetingtimeset" style="margin-left:32px;">Schedule a meeting</button>
                                    <p style="color: black;margin-top: 20px;margin-right: 80px;font-weight: 700;margin-bottom: 1px;">Thank you !!</p><br><br>
                                </div>
                            </div>
                            <div class="goals row" data-goal="education">
                                <div align="center" class="form-group row row-cols-2 d-none" id="meetingtime" style="margin-bottom:45px;display:flex;justify-content:center;">
                                    <div class="col" style="width:40%">
                                        <input type="date" class="form-control input-selector col" style="border:1px solid black;" name="date" id="date" placeholder="Select Date">
                                    </div>
                                    <div class="col" style="width:40%">
                                        <select name="time" id="sctime" class="form-control input-selector time" style="border:1px solid black;">
                                            <option value="Choose Time"></option>
                                            <option value="10:30AM to 12:30PM">10:30AM to 12:30PM</option>
                                            <option value="12:30PM to 2:30PM">12:30PM to 2:30PM</option>
                                            <option value="3PM to 5PM">3PM to 5PM</option>
                                            <option value="5PM to 6:30PM">5PM to 6:30PM</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        <?php  }
        ?>
        <!-----------------------------House----------------------------------------------->

        <?php
        if ($_SESSION["goal"] == 'house') {
            $value = json_decode($data[0]['goal_data'], true);
        ?>
            <div class="goals" data-goal="house"><br />
                <div class="container">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4" style="display:flex;">
                                    <img src="images/userprofile.png" class="" alt="Avatar" style="height: 70px;width: 66px;margin-top: 11px;margin-left: 15px;">
                                    <p style="color: black;margin-left: 12px;margin-top: 40px;margin-right: 120px;font-weight: 700;">Hello </p>
                                </div>
                            </div>
                            <div class="col-12" style="color:black;font-size:21px;font-family: serif;">
                                <p class="ml-5" style="color:black;">
                                    Dear <span id="p-name"><?php echo $user_name ?></span>,<br></p>
                                <blockquote style="margin-left:50px;margin-right:30px;" align="justify"> A place that we call <b><i>HOME</b></i> is one of life's most essential <b>needs</b>. We're glad you're planning on it and you
                                    have a <b>determination</b> towards your goals, what you have to achieve and you understand the value of <b>investments.</b><br>
                                    <span style="position:relative;left:40px;"> To Achieve this Goal you need to Accumulate <span id="p-ansinput" style="color: blue;font-weight: 700;font-size: 21px;"><?php echo $value['ansinputs'] ?>
                                            within </span> <span id="house-sipyear" style="color: blue;font-weight: 700;font-size: 21px;"><?php echo $value['futureage'] ?></span>
                                        Years,<span style="color:orange;"> SIP REQUIRED </span> is <span id="p-sipans" style="color: red;font-weight: 900;font-size: 24px;"><?php echo $value['sipvalue'] ?></span> per month.<br></span>
                                    Worried about the above numbers? <b>Please don’t be.</b><br>
                                    Feel free to <b>contact</b> us for further financial planning<br>
                                    We have sent the details to you on your <b>email</b> Address. <b>Please do check</b>

                                </blockquote>
                            </div>
                            <div class="row">
                                <div class="col-12" style="text-align: center;justify-content: space-evenly;">
                                    <button type="button" class="bottons from-left" style="margin-left:-30px;" onclick="location.href='./pdf.php'">Download PDF</button>
                                    <button type="button" class="bottons from-left" style="margin-left:34px;" onclick="location.href='./index.php'">Plan Another Goal</button></a>
                                    <button type="button" class="bottons from-left" id="housemeeting" style="margin-left:32px;">Schedule a meeting</button>
                                    <p style="color: black;margin-top: 20px;margin-right: 80px;font-weight: 700;margin-bottom: 1px;">Thank you !!</p><br><br>
                                </div>
                            </div>
                            <div class="goals row" data-goal="house">
                                <div align="center" class="form-group row row-cols-2 d-none" id="meetingtimehouse" style="margin-bottom:45px;display:flex;justify-content:center;">

                                    <div class="col" style="width:40%">
                                        <input type="date" class="form-control input-selector col" style="border:1px solid black;" name="date" id="date" placeholder="Select Date">
                                    </div>
                                    <div class="col" style="width:40%">
                                        <select name="time" id="sctime" class="form-control input-selector time" style="border:1px solid black;">
                                            <option value="Choose Time" placeholder="Set Time"></option>
                                            <option value="10:30AM to 12:30PM">10:30AM to 12:30PM</option>
                                            <option value="12:30PM to 2:30PM">12:30PM to 2:30PM</option>
                                            <option value="3PM to 5PM">3PM to 5PM</option>
                                            <option value="5PM to 6:30PM">5PM to 6:30PM</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php  }
        ?>

        <!-----------------------------Retirement----------------------------------------------->


        <?php
        if ($_SESSION["goal"] == 'retirement') {
            $value = json_decode($data[0]['goal_data'], true);
            // $values = json_decode($data[0]['lifeexp']) - json_decode($data[0]['retirementage']);
            // var_dump($value);
            $age = $value['lifeexp'] -$value['retirementage'] ;
        ?>
            <div class="goals" data-goal="retirement"><br>
                <div class="container">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4" style="display:flex;">
                                    <img src="images/userprofile.png" class="" alt="Avatar" style="height: 70px;width: 66px;margin-top: 11px;margin-left: 15px;">
                                    <p style="color: black;margin-left: 12px;margin-top: 40px;margin-right: 120px;font-weight: 700;">Hello </p>
                                </div>
                            </div>
                            <div class="col-12" style="color:black;font-size:21px;font-family: serif;">
                                <p class="ml-5" style="color:black;">
                                    Dear <span id="p-name"><?php echo $user_name ?></span>,<br></p>

                                <blockquote style="margin-left:50px;margin-right:30px;" align="justify"> <b><i> Retirement </i></b> is not the end of the road. It is the beginning of a
                                    <b> new inning.</b> We are glad to see you are <b>planning</b> on it and that you are
                                    <b>committed</b> to your life goals. Believe us, to lead a comfortable and
                                    joyful retirement life early investment is the best planning.
                                    To Achieve this Goal you need to Accumulate <span id="p-ansinput" style="color: green;font-weight: 700;font-size: 21px;"><?php echo $value['ansinputs'] ?></span>
                                    within <span id="setyearret" style="color: green;font-weight: 700;font-size: 21px;"><?php echo $age ?></span> Years, SIP ₹
                                    REQUIRED is <span id="p-sipans" style="color: red;font-weight: 700;font-size: 22px;"><?php echo $value['sipvalue'] ?></span> per month.₹
                                    Worried about the above numbers? Please don’t be.
                                    Feel free to contact us for further financial planning
                                    We have sent the details to you on your email Address. Please do check
                                </blockquote>
                            </div>
                            <div class="row">
                                <div class="col-12" style="text-align: center;justify-content: space-evenly;">
                                    <button type="button" class="bottons from-left" style="margin-left:-30px;" onclick="location.href='./pdf.php'">Download PDF</button>
                                    <button type="button" class="bottons from-left" style="margin-left:34px;" onclick="location.href='./index.php'">Plan Another Goal</button>
                                    <button type="button" class="bottons from-left" id="retiremeeting" style="margin-left:32px;">Schedule a meeting</button>
                                    <p style="color: black;margin-top: 20px;margin-right: 80px;font-weight: 700;margin-bottom: 1px;">Thank you !!</p><br><br>
                                </div>
                            </div>
                            <div class="goals row" data-goal="retirement">
                                <div align="center" class="form-group row row-cols-2 d-none" id="meetingtimeretire" style="margin-bottom:45px;display:flex;justify-content:center;">

                                    <div class="col" style="width:40%">
                                        <input type="date" class="form-control input-selector col" style="border:1px solid black;" name="date" id="date" placeholder="Select Date">
                                    </div>
                                    <div class="col" style="width:40%">
                                        <select name="time" id="sctime" class="form-control input-selector time" style="border:1px solid black;">
                                            <option value="Choose Time"></option>
                                            <option value="10:30AM to 12:30PM">10:30AM to 12:30PM</option>
                                            <option value="12:30PM to 2:30PM">12:30PM to 2:30PM</option>
                                            <option value="3PM to 5PM">3PM to 5PM</option>
                                            <option value="5PM to 6:30PM">5PM to 6:30PM</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php  }
        ?>
        <!-----------------------------Merriage----------------------------------------------->
        <?php
        if ($_SESSION["goal"] == 'marriage') {
            $value = json_decode($data[0]['goal_data'], true);
            $age = $value['futureage'] - $value['currentagechild'];
            // print_r($value);
        ?>
            <div class="goals" data-goal="marriage"><br /><br />
                <div class="container">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4" style="display:flex;">
                                    <img src="images/userprofile.png" class="" alt="Avatar" style="height: 70px;width: 66px;margin-top: 11px;margin-left: 15px;">
                                    <p style="color: black;margin-left: 12px;margin-top: 40px;margin-right: 120px;font-weight: 700;">Hello </p>
                                </div>
                            </div>
                            <div class="col-12" style="color:black;font-size:21px;font-family: serif;">
                                <p class="ml-5" style="color:black;">
                                    Dear <span id="p-name"><?php echo $user_name ?></span>,</p>
                                <blockquote style="margin-left:50px;margin-right:30px;" align="justify"> A <b><i>WEDDING</i></b> is a big day in one’s life and a
                                    <b> lifetime</b> event. We're <b> delighted</b> to see you thinking & <b>planning</b> on it and that you're committed to your goals.
                                    and we are sure, you know the importance of investments.<br>
                                    <span style="position:relative;left:40px;"> To Achieve this Goal you need to Accumulate <span id="p-ansinput" style="color: blue;font-weight: 700;font-size: 21px;"><?php echo $value['ansinputs'] ?></span>
                                        within <span id="mar-years" style="color: blue;font-weight: 700;font-size: 21px;"><?php echo $age ?></span> Years, <span style="color:orange;"> SIP REQUIRED is</span>
                                        <span id="p-sipans" style="color: red;font-weight: 700;font-size: 24px;"><?php echo $value['sipvalue'] ?></span> per month. </span> Worried about the above numbers? <b> Please don’t be.</b><br>
                                    Feel free to contact us for further <b>financial planning </b><br>
                                    We have sent the details to you on your email Address. <b>Please do check</b>

                                </blockquote>
                            </div>
                            <div class="row">
                                <div class="col-12" style="text-align: center;justify-content: space-evenly;">
                                    <button type="button" class="bottons from-left" style="margin-left:-30px;" onclick="location.href='./pdf.php'">Download PDF</button>
                                    <button type="button" class="bottons from-left" style="margin-left:34px;" onclick="location.href='./index.php'">Plan Another Goal</button>
                                    <button type="button" class="bottons from-left" id="marriagemeeting" style="margin-left:32px;">Schedule a meeting</button>
                                    <p style="color: black;margin-top: 20px;margin-right: 80px;font-weight: 700;margin-bottom: 1px;">Thank you !!</p><br><br>
                                </div>
                            </div>
                            <div class="goals row" data-goal="marriage">
                                <div align="center" class="form-group row row-cols-2 d-none" id="meetingtimemarriage" style="margin-bottom:45px;display:flex;justify-content:center;">

                                    <div class="col" style="width:40%">
                                        <input type="date" class="form-control input-selector col" style="border:1px solid black;" name="date" id="date" placeholder="Select Date">
                                    </div>
                                    <div class="col" style="width:40%">
                                        <select name="time" id="sctime" class="form-control input-selector time" style="border:1px solid black;">
                                            <option value=""></option>
                                            <option value="10:30AM to 12:30PM">10:30AM to 12:30PM</option>
                                            <option value="12:30PM to 2:30PM">12:30PM to 2:30PM</option>
                                            <option value="3PM to 5PM">3PM to 5PM</option>
                                            <option value="5PM to 6:30PM">5PM to 6:30PM</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php  }
        ?>
        <!-----------------------------car----------------------------------------------->
        <?php
        if ($_SESSION["goal"] == 'car') {
            $value = json_decode($data[0]['goal_data'], true);
        ?>
            <div class="goals" data-goal="car"><br><br>
                <div class="container">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-4" style="display:flex;">
                                <img src="images/userprofile.png" class="" alt="Avatar" style="height: 70px;width: 66px;margin-top: 11px;margin-left: 15px;">
                                <p style="color: black;margin-left: 12px;margin-top: 40px;margin-right: 120px;font-weight: 700;">Hello </p>
                            </div>
                            <div class="container" style="color:black;font-size:21px;font-family: serif;">
                                <p class="ml-5" style="color:black;">
                                    Dear <span id="p-name"><?php echo $user_name ?></span>,</p>
                                <blockquote style="margin-left:50px;margin-right:30px;color:black;" align="justify">Buying a <b><i>Car</i></b> is a dream of many and for <b> a comfortable journey </b>, you must have a good car.
                                    <b>Dreams</b> are what <b>motivate</b> us,
                                    and we are thrilled to see that you want to own a car and you are planning on it. <b>Believe us, investment</b> is the best route to <b>accomplish</b> your dream.<br>
                                    <span style="position:relative;left:40px;"> To Achieve this Goal you need to Accumulate <span id="p-ansinput" style="color: blue;font-weight: 700;font-size: 21px;"><?php echo $value['ansinputs'] ?></span>
                                        within <span id="car-year" style="color: blue;font-weight: 700;font-size: 21px;"><?php echo $value['futureyear'] ?></span> Years, <span style="color:orange;"> SIP REQUIRED </span> is <span id="p-sipans" style="color: red;font-weight: 700;font-size: 22px;"><?php echo $value['sipvalue'] ?></span> per month.</span><br>
                                    Worried about the above numbers? <b>Please don’t be. </b><br>
                                    Feel free to contact us for further <b> financial planning </b> <br>
                                    We have sent the details to you on your Email Address. Please do check

                                    <br>
                                    <!-- <h4 style="color:black;">Thank you !!</h4> -->
                                </blockquote>
                            </div>
                            <div class="row">
                                <div class="col-12" style="text-align: center;justify-content: space-evenly;">
                                    <button type="button" class="bottons from-left" style="margin-left:-30px;" onclick="location.href='./pdf.php'">Download PDF</button>
                                    <button type="button" class="bottons from-left" style="margin-left:34px;" onclick="location.href='./index.php'">Plan Another Goal</button>
                                    <button type="button" class="bottons from-left" id="carmeeting" style="margin-left:32px;">Schedule a meeting</button>
                                    <p style="color: black;margin-top: 20px;margin-right: 80px;font-weight: 700;margin-bottom: 1px;">Thank you !!</p><br><br>
                                </div>
                            </div>
                            <div class="goals row" data-goal="car">
                                <div align="center" class="form-group row row-cols-2 d-none" id="meetingtimecar" style="margin-bottom:45px;display:flex;justify-content:center;">

                                    <div class="col" style="width:40%">
                                        <input type="date" class="form-control input-selector col" style="border:1px solid black;" name="date" id="date" placeholder="Select Date">
                                    </div>
                                    <div class="col" style="width:40%">
                                        <select name="time" id="sctime" class="form-control input-selector time" style="border:1px solid black;">
                                            <option value=""></option>
                                            <option value="10:30AM to 12:30PM">10:30AM to 12:30PM</option>
                                            <option value="12:30PM to 2:30PM">12:30PM to 2:30PM</option>
                                            <option value="3PM to 5PM">3PM to 5PM</option>
                                            <option value="5PM to 6:30PM">5PM to 6:30PM</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php  }
        ?>
        <!-----------------------------vacation----------------------------------------------->
        <?php
        if ($_SESSION["goal"] == 'vacation') {
            $value = json_decode($data[0]['goal_data'], true);
        ?>
            <div class="goals" data-goal="vacation"><br> <br>
                <div class="container">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-4" style="display:flex;">
                                <img src="images/userprofile.png" class="" alt="Avatar" style="height: 70px;width: 66px;margin-top: 11px;margin-left: 15px;">
                                <p style="color: black;margin-left: 12px;margin-top: 40px;margin-right: 120px;font-weight: 700;">Hello </p>
                            </div>
                            <div class="col-12" style="color:black;font-size:21px;font-family: serif;">
                                <p class="ml-5" style="color:black;">

                                    Dear <span id="p-name"><?php echo $user_name ?></span>,</p>
                                <blockquote style="margin-left:50px;margin-right:30px;" align="justify">Sometimes a <b>break</b> from regular life is essential to have fun and <b>enjoy yourself</b> and a <b><i>Vacation</i></b> is all you need .
                                    We are <b>pleased</b> that you have a <b>passion</b> towards your life goals and you know the importance of investment in <b>achieving your goals.</b><br>
                                    <span style="position:relative;left:40px;"> To Achieve this Goal you need to Accumulate <span id="p-ansinput" style="color: green;font-weight: 700;font-size: 21px;"><?php echo $value['ansinputs'] ?></span>
                                        within <span id="vac-year" style="color: green;font-weight: 700;font-size: 21px;"><?php echo $value['futureyear'] ?></span> Years, <span style="color:orange;"> SIP REQUIRED is</span> <span id="p-sipans" style="color: red;font-weight: 700;font-size: 22px;"><?php echo $value['sipvalue'] ?></span> per month.</span><br>
                                    Worried about the above numbers? <b> Please don’t be. </b><br>
                                    Feel free to contact us for further <b>financial planning</b><br>
                                    We have sent the details to you on your email Address. <b>Please do check</b>

                                </blockquote>
                            </div>
                            <div class="row">
                                <div class="col-12" style="text-align: center;justify-content: space-evenly;">
                                    <button type="button" class="bottons from-left" style="margin-left:-30px;" onclick="location.href='./pdf.php'">Download PDF</button>
                                    <button type="button" class="bottons from-left" style="margin-left:34px;" onclick="location.href='./index.php'">Plan Another Goal</button>
                                    <button type="button" class="bottons from-left" id="vacationmeeting" style="margin-left:32px;">Schedule a meeting</button>
                                    <p style="color: black;margin-top: 20px;margin-right: 80px;font-weight: 700;margin-bottom: 1px;">Thank you !!</p><br><br>
                                </div>
                            </div>
                            <div class="goals row" data-goal="vacation">
                                <div align="center" class="form-group row row-cols-2 d-none" id="meetingtimevacation" style="margin-bottom:45px;display:flex;justify-content:center;">

                                    <div class="col" style="width:40%">
                                        <input type="date" class="form-control input-selector col" style="border:1px solid black;" name="date" id="date" placeholder="Select Date">
                                    </div>
                                    <div class="col" style="width:40%">
                                        <select name="time" id="sctime" class="form-control input-selector time" style="border:1px solid black;">
                                            <option value=""></option>
                                            <option value="10:30AM to 12:30PM">10:30AM to 12:30PM</option>
                                            <option value="12:30PM to 2:30PM">12:30PM to 2:30PM</option>
                                            <option value="3PM to 5PM">3PM to 5PM</option>
                                            <option value="5PM to 6:30PM">5PM to 6:30PM</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php  }
        ?>
        <!-----------------------------Tax Saving ----------------------------------------------->
        <?php
        if ($_SESSION["goal"] == 'tax-saving') {
        ?>
            <div class="goals" data-goal="tax-saving"><br><br>
                <div class="card">
                    <div class="col-4" style="display:flex;">
                        <img src="images/userprofile.png" class="" alt="Avatar" style="height: 71px;width: 24%;margin-top: 11px;margin-left: 15px;">
                        <p style="color: black;margin-left: 12px;margin-top: 40px;margin-right: 120px;font-weight: 700;">Hello </p>
                    </div>
                    <div class="container">
                        <p style="color:black;font-size:21px;font-weight:700;">
                            <br>
                        <h4 style="color:black;">Thank you !!</h4>
                        </p>
                    </div>
                </div>
            </div>
        <?php  }
        ?>
        <!-----------------------------others----------------------------------------------->
        <?php
        if ($_SESSION["goal"] == 'others') {
        ?>
            <div class="goals" data-goal="others"><br><br>
                <div class="container">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-4" style="display:flex;">
                                <img src="images/userprofile.png" class="" alt="Avatar" style="height: 70px;width: 66px;margin-top: 11px;margin-left: 15px;">
                                <p style="color: black;margin-left: 12px;margin-top: 40px;margin-right: 120px;font-weight: 700;">Hello </p>
                            </div>
                            <div class="container">
                                <p style="color:black;font-size:21px;font-weight:700;">
                                    <br>
                                <h4 style="color:black;">Thank you !!</h4>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php  }
        ?>
        <!-- <div style="text-align:center" class="mt-2">
            <input type="button" name="previous" class="previous btn btn-secondary" value="Previous" />
            <input type="submit" name="submit" class="submit btn btn-success" value="Submit" onclick="location.href='six.php'" id="submit_data" />
        </div> -->

        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content" style="width: 50%;left: 24%;">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="modal_gaol_id">
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="val_show">
                    </div>
                </div>
            </div>
        </div>

    </fieldset>
    <button id="toggle-sgoal" class="btn btn-primary m-2 p-1">show in table</button>
    <div class="container mt-3" id="show-goal-table">
        <div class="card">
            <div class="card-body table-responsive">
                <table class="table table-bordered" style="width:100%;padding:0;" id="data_table" cellspacing="0">
                    <thead style="background-color:#222f3f;color:white;">
                        <tr>
                            <th class="text-center" style="font-weight: 500;font-size:14px;">S.No</th>
                            <th class="text-center" style="font-weight: 500;font-size:14px;">Goal</th>
                            <th class="text-center" style="font-weight: 500;font-size:14px;">Time Allocated(Yr)</th>
                            <th class="text-center" style="font-weight: 500;font-size:14px;">Current Value</th>
                            <th class="text-center" style="font-weight: 500;font-size:14px;">Future Value</th>
                            <th class="text-center" style="font-weight: 500;font-size:14px;">SIP Required</th>
                            <th class="text-center" style="font-weight: 500;font-size:14px;">Action</th>
                        </tr>
                    </thead>
                    <tbody style="font-size:13.5px;">
                        <?php
                        $select = "SELECT * FROM `user_goal` WHERE `email` = '{$_SESSION['goaluser']}'";
                        // echo $select;
                        $select_result = mysqli_query($conn, $select);
                        if (mysqli_num_rows($select_result) > 0) {
                            $k = 1;
                            while ($data = mysqli_fetch_assoc($select_result)) {
                                if ($data["goal_data"] == "" || $data["goal"] == "") continue;
                                $decode =  json_decode($data['goal_data'], true);
                        ?>
                                <tr>
                                    <td class="text-center"><?php echo $k  ?></td>
                                    <td class="text-center"><?php echo $data['goal']  ?></td>
                                    <?php if ($data['goal'] == "car") {
                                    ?>
                                        <td class="text-center"><?php echo $decode['futureyear']  ?></td>
                                        <td class="text-center"><?php echo $decode['current']  ?></td>
                                    <?php
                                    } ?>
                                    <?php if ($data['goal'] == "house") {
                                    ?>
                                        <td class="text-center"><?php echo $decode['futureage']  ?></td>
                                        <td class="text-center"><?php echo $decode['currentcost']  ?></td>
                                    <?php
                                    } ?>
                                    <?php if ($data['goal'] == "retirement") {
                                        $retire_year = $decode['retirementage'] - $decode['currentage'];
                                    ?>
                                        <td class="text-center"><?php echo $retire_year ?></td>
                                        <td class="text-center">N/A</td>
                                    <?php
                                    } ?>
                                    <?php if ($data['goal'] == "marriage") {
                                        $marriage_year = $decode['futureage'] - $decode['currentagechild'];
                                    ?>
                                        <td class="text-center"><?php echo $marriage_year ?></td>
                                        <td class="text-center"><?php echo $decode['currentcost']  ?></td>

                                    <?php
                                    } ?>
                                    <?php if ($data['goal'] == "vacation") {
                                    ?>
                                        <td class="text-center"><?php echo $decode['futureyear']  ?></td>
                                        <td class="text-center"><?php echo $decode['current']  ?></td>
                                    <?php
                                    } ?>
                                    <?php if ($data['goal'] == "education") {
                                        $education_year = $decode['futureages'] - $decode['age'];
                                    ?>
                                        <td class="text-center"><?php echo  $education_year ?></td>
                                        <td class="text-center"><?php echo $decode['currentcost']  ?></td>
                                    <?php
                                    } ?>
                                    <?php if ($data['goal'] == "others") {
                                    ?>
                                        <td class="text-center"><?php echo  $decode['futureage'] ?></td>
                                        <td class="text-center"><?php echo  $decode['currentcost'] ?></td>
                                    <?php
                                    } ?>
                                    <td class="text-center"><?php echo $decode['ansinputs']  ?></td>
                                    <td class="text-center"><?php echo $decode['sipvalue']  ?></td>
                                    <td style="width:10%">
                                        <div class="btn-group btn-group-sm" style="padding:0;" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-success me-1 showing_goals style=" font-size:12px ;" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-id='<?php echo $data['id'] ?>'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                </svg></button>
                                            <button type="button" class="btn btn-secondary me-1 show_btn" data-bs-toggle="modal" data-bs-target="#exampleModal" id="'<?php echo $data['id'] ?>'"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                </svg></button>
                                            <button type="button" class="btn btn-danger delete_btn" data-gid="'<?php echo $data['id'] ?>'"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                </svg></button>

                                        </div>
                                    </td>
                                </tr>
                        <?php
                                $k++;
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- <div class="text-center"><a class="btn btn-primary m-2 p-2 btn-lg" href="roadMap.php">Road Map</a></div> -->
    </div>
    <div class="road-map">
        <svg id="g-path" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 400" preserveAspectRatio="xMidYMin meet">
            <foreignObject id="cybox">

                <div href='#' id="current-year"></div>
            </foreignObject>
            <g id="goals">
                <path d="M 26,26 V 500" id="h-line" />

            </g>
        </svg>
    </div>
    <div class="text-center"><a class="btn btn-primary m-2 p-2 btn-lg" href="investment.php">Next</a></div>
    <div class="text-center"><a class="btn btn-primary m-2 p-2 btn-lg" href="index.php">Plan Another Goal</a></div>


    <div class="modal fade" id="show-goal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="./road_map.js"></script>
    <script>
        $("#toggle-sgoal").click(function(e) {
            $("#show-goal-table").toggle(1000)
            $(".road-map").toggle(1000)
            if ($(this).html() == "show in table") {
                $(this).html("show in map")
            } else {
                $(this).html("show in table")
                init();
            }
        })
        $('.showing_goals').click(function() {
            var key = $(this).data('id');
            $.ajax({
                type: "post",
                url: "./single_goal_ajax.php",
                data: {
                    key: key
                },
                dataType: "html",
                success: function(data) {
                    $('#modal_gaol_id').html(data);
                }
            });
        })


        $(document).on('change', "#futureYearcar,#currentCostcar,#inflationcar", function() {
            // alert("hii");
            let agecar = 0;
            let FAcar = document.getElementById("futureYearcar").value;
            let fvacar = document.getElementById("currentCostcar").value;
            let inflacar = document.getElementById("inflationcar").value;
            let ratescars = 12 / 100;
            Ncar = FAcar - agecar; // 16
            ncar = Ncar * 12; //192
            rcar = ratescars / 12; // 1%
            icar = inflacar / 100; //5%
            jcar = icar / 12; //.41
            fvbcar = fvacar * ((1 + jcar) ** ncar);

            fcar = fvbcar * rcar;
            numcar = (((1 + rcar) ** ncar) - 1);
            nextcar = (1 + rcar);
            calcar = numcar * nextcar;
            anscar = fcar / calcar;

            console.log(fvbcar);
            $("#sipValuecar").val(anscar.toLocaleString(0));
            $("#futureValuecar").val(fvbcar.toLocaleString(0));
        })
        $(document).on('change', "#futureYearhouse,#currentCosthouse,#inflationhouse", function() {
            // alert("hello");
            fva = document.getElementById("currentCosthouse").value;
            inflation = document.getElementById("inflationhouse").value,
                timehorizon = document.getElementById("futureYearhouse").value;
            rhouse = 12 / 100;
            i = inflation / 100;
            rcal = rhouse / 12;
            l = i / 12;
            j = (1 + l);
            nhouse = timehorizon * 12;
            k = Math.pow(j, nhouse);
            m = fva * k;

            fhouse = m * rcal;
            numhouse = (((1 + rcal) ** nhouse) - 1);
            nexthouse = (1 + rcal);
            calhouse = numhouse * nexthouse;
            anshouse = fhouse / calhouse;

            console.log(m, anshouse);
            $("#futureValuehouse").val(m.toLocaleString(0));
            $("#sipValuehouse").val(anshouse.toLocaleString(0));
        })
        $(document).on('change', "#futureAgeEdu,#currentCostEdu,#inflationEdu,#currentAgeEdu", function() {

            age = document.getElementById("currentAgeEdu").value;
            FA = document.getElementById("futureAgeEdu").value;
            fva = document.getElementById("currentCostEdu").value;
            infla = document.getElementById("inflationEdu").value;
            let rate = 12 / 100;

            //  r = Rate / 100;
            N = FA - age; // 16
            n = N * 12; //192
            r = rate / 12; // 1%
            i = infla / 100; //5%
            j = i / 12; //.41
            fvb = fva * ((1 + j) ** n);

            f = fvb * r;
            num = (((1 + r) ** n) - 1);
            next = (1 + r);
            cal = num * next;
            ans = f / cal;

            $("#sipValueEdu").val(ans.toLocaleString(0));
            $("#futureValueEdu").val(fvb.toLocaleString(0));

        })
        $(document).on('change', "#future_years,#c_cost,#in_rate", function() {
            let agevac = 0;
            let FAvac = document.getElementById("future_years").value;
            let fvavac = document.getElementById("c_cost").value;
            let inflavac = document.getElementById("in_rate").value;
            let ratesvac = 12 / 100;
            let Nvac = FAvac - agevac;
            let nvac = Nvac * 12;
            rsvac = ratesvac / 12;
            let ivac = inflavac / 100;
            let jvac = ivac / 12;
            let fvbvac = fvavac * ((1 + jvac) ** nvac);

            fsvac = fvbvac * rsvac;
            numsvac = (((1 + rsvac) ** nvac) - 1);
            nextsvac = (1 + rsvac);
            calsvac = numsvac * nextsvac;
            anssipvac = fsvac / calsvac;
            // console.log(anssipvac);

            $("#future_value").val(fvbvac.toLocaleString(0));
            $("#sip_value").val(anssipvac.toLocaleString(0));

        })
        $(document).on('change', "#child_age,#future_ageMar,#current_costMar,#inflationMar", function() {
            agemar = document.getElementById("child_age").value;
            fa = document.getElementById("future_ageMar").value;
            FVA = document.getElementById("current_costMar").value;
            inflaa = document.getElementById("inflationMar").value;
            let rates = 12 / 100;
            M = fa - agemar;
            m = M * 12;
            rs = rates / 12;
            I = inflaa / 100;
            J = I / 12;
            FVB = FVA * ((1 + J) ** m);

            fs = FVB * rs;
            nums = (((1 + rs) ** m) - 1);
            nexts = (1 + rs);
            cals = nums * nexts;
            anssip = fs / cals;

            $("#furture_valueMar").val(FVB.toLocaleString(0));
            $("#sip_valueMar").val(anssip.toLocaleString(0));
        })
        $(document).on('change', "#present_age,#retirement_age,#lifeexp,#inflationRet,#monthlyexp,#rateofRet", function() {
            let retpresent = document.getElementById("present_age").value; //Pa
            let retretire = document.getElementById("retirement_age").value; //Ra
            let lifeexp = document.getElementById("lifeexp").value; //Le
            let inflatioret = document.getElementById("inflationRet").value; //I
            let Ex = document.getElementById("monthlyexp").value; //Ex
            let rateretire = document.getElementById("rateofRet").value;
            let Np = retretire - retpresent; //Np
            let r2 = (12 / (100 * 12));
            let r1 = rateretire / 100; //r1
            let r1ret = r1 / 12;
            let bret = (r1 + 1); //R/100(R%)
            let iret = inflatioret / 100; // i
            let cret = (iret + 1); // I/100(I%)
            let RR = ((bret / cret) - 1); //RR
            let Nr = lifeexp - retretire //Nr
            //  aret = Ex * (( 1 + iret) ** n )     //Er
            let n = Np; //n
            Er = Ex * ((1 + iret) ** n); //Er
            rr = (RR / 12); //rr
            dret = (1 + rr);
            eret = (dret ** (Nr * 12));
            fret = (1 / eret);
            gret = ((1 - fret) * dret);
            hret = (gret * Er);
            iiret = hret / rr;
            //sip amount calculated
            let sip = (iiret * r2);
            let csip = (1 + r2);
            dsip = (csip ** (Np * 12));
            esip = (dsip - 1);
            fsip = esip * csip;
            gsip = sip / fsip;

            $("#furture_valueRet").val(iiret.toLocaleString(0));
            $("#sip_valueRet").val(gsip.toLocaleString(0));

        })
        $(document).on('change', "#future_yearOther,#current_costOther,#inflation_other", function() {

            currentage = 0;
            Futureval = document.getElementById("future_yearOther").value;
            currentval = document.getElementById("current_costOther").value;
            inflaother = document.getElementById("inflation_other").value;
            let rateother = 12 / 100;
            Nother = Futureval - currentage; // 16
            nother = Nother * 12; //192
            rother = rateother / 12; // 1%
            iother = inflaother / 100; //5%
            jother = iother / 12; //.41
            fvbother = currentval * ((1 + jother) ** nother);
            // sip calculations
            fother = fvbother * rother;
            numother = (((1 + rother) ** nother) - 1);
            nextother = (1 + rother);
            calother = numother * nextother;
            ansother = fother / calother;


            $("#furture_valueother").val(fvbother.toLocaleString(0));
            $("#sip_valueOther").val(ansother.toLocaleString(0));

        });
        $(document).on('change', "#ageEdu,#secfutureageEdu,#currentEdu,#secinflationEdu", function() {
            let secages = document.getElementById("ageEdu").value;
            let secFAs = document.getElementById("secfutureageEdu").value;
            let secfvas = document.getElementById("seccurrentEdu").value;
            let secinflas = document.getElementById("secinflationEdu").value;
            let secrates = 12 / 100;

            // let r = Rate / 100;
            let secNs = secFAs - secages;
            let secns = secNs * 12;
            secrs = secrates / 12; // 1%s
            let secis = secinflas / 100;
            let secjs = secis / 12;
            let secfvbs = secfvas * ((1 + secjs) ** secns);

            secfs = secfvbs * secrs;
            secnums = (((1 + secrs) ** secns) - 1);
            secnexts = (1 + secrs);
            seccals = secnums * secnexts;
            secanssecond = secfs / seccals;

            $("#secfuturevalueEdu").val(fvbs.toLocaleString(0));
            $("#SIPsecond").val(anssecond.toLocaleString(0));

        })


        $(document).on('change', " #secondchildage-mar,#secondfutureage-mar,#currentcost-mar,#inflation-mar ", function() {
            secagemar = document.getElementById("secondchildage-mar").value;
            secfa = document.getElementById("secondfutureage-mar").value;
            secFVA = document.getElementById("currentcost-mar").value;
            secinflaa = document.getElementById("inflation-mar").value;

            let secrates = 12 / 100;
            secM = secfa - secagemar;
            secm = secM * 12;
            secrs = secrates / 12;
            secI = secinflaa / 100;
            secJ = secI / 12;
            secFVB = secFVA * ((1 + secJ) ** secm);
            // sip value
            secfs = secFVB * secrs;
            secnums = (((1 + secrs) ** secm) - 1);
            secnexts = (1 + secrs);
            seccals = secnums * secnexts;
            secanssip = secfs / seccals;

            $("#ansinputsMar").val(secFVB.toLocaleString(0));
            $("#sipvalueMar").val(secanssip.toLocaleString(0));
        })



        $(document).on('submit', '#car_form', function(e) {
            e.preventDefault();
            let data = $(this).serialize()
            $.ajax({
                type: "post",
                url: "./single_goal_ajax.php",
                data: {
                    update_car: data
                },
                dataType: "json",
                success: function(response) {
                    if (response['status']) {
                        alert(response['message'])
                    }
                }
            });

        })
        $(document).on('submit', '#house_form', function(e) {
            e.preventDefault();
            let data = $(this).serialize()
            console.log(data);
            $.ajax({
                type: "post",
                url: "./single_goal_ajax.php",
                data: {
                    update_house: data
                },
                dataType: "json",
                success: function(response) {
                    if (response['status']) {
                        alert(response['message'])
                    }
                }
            });

        })
        $(document).on('submit', '#vacation_form', function(e) {
            e.preventDefault();
            let data = $(this).serialize()
            console.log(data);
            $.ajax({
                type: "post",
                url: "./single_goal_ajax.php",
                data: {
                    update_vacation: data
                },
                dataType: "json",
                success: function(response) {
                    if (response['status']) {
                        alert(response['message'])
                    }
                }
            });

        })
        $(document).on('submit', '#marriage_form', function(e) {
            e.preventDefault();
            let data = $(this).serialize()
            console.log(data);
            $.ajax({
                type: "post",
                url: "./single_goal_ajax.php",
                data: {
                    update_marriage: data
                },
                dataType: "json",
                success: function(response) {
                    if (response['status']) {
                        alert(response['message'])
                    }
                }
            });

        })
        $(document).on('submit', '#others_form', function(e) {
            e.preventDefault();
            let data = $(this).serialize()
            console.log(data);
            $.ajax({
                type: "post",
                url: "./single_goal_ajax.php",
                data: {
                    update_other: data
                },
                dataType: "json",
                success: function(response) {
                    if (response['status']) {
                        alert(response['message'])
                    }
                }
            });
        })
        $(document).on('submit', '#retirement_form', function(e) {
            e.preventDefault();
            let data = $(this).serialize()
            console.log(data);
            $.ajax({
                type: "post",
                url: "./single_goal_ajax.php",
                data: {
                    update_retirement: data
                },
                dataType: "json",
                success: function(response) {
                    if (response['status']) {
                        alert(response['message'])
                    }
                }
            });

        })
        $(document).on("click", ".delete_btn", function() {
            const id = $(this).attr("data-gid");
            if (confirm("Confirm to delete your goal")) {
                if($(this).attr("data-callback")){
                    deleteGoal(id);
                }else{
                    $(this).closest('tr').remove()
                }
                $.ajax({
                    type: "post",
                    url: "./single_goal_ajax.php",
                    data: {
                        deleteId: id
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response['status']) {}

                    }
                });
            }
        })
        $(document).on("click", ".show_btn", function() {
            const id = $(this).attr("id");
            $.ajax({
                type: "post",
                url: "./single_goal_ajax.php",
                data: {
                    showId: id
                },
                dataType: "html",
                success: function(response) {
                    $("#val_show").html(response);
                }
            });
        })
    </script>
</body>

</html>
<?php
if (isset($_SESSION["goal"])) {
    unset($_SESSION["goal"]);
}
?>