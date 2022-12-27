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
            background: linear-gradient(185deg, #546cdd, #12162f);
            /* background-repeat: no-repeat; */
            height: 100%;
        }

        .container-fluid {
            border-radius: 35px;
            padding: 8%;
            border: 1px solid #ffffff3d;
            color: white;
        }

        .que_h4 {
            float: left;
            margin-right: 10px;
        }

        .que_p {
            display: flex;
            font-size: 22px;
            font-weight: 700;
        }

        label {
            font-size: 17px;
            text-transform: capitalize;
            font-family: emoji;
        }

        /* .w3-button {
            padding: 3px 10px;
        } */
    </style>
</head>

<body>
    <?php include("./header.php"); ?>
    <!-- <div class="container"> -->
    <div>
        <div class="w3-bar w3-black" style="text-align: center;margin-top: 4%;">
            <button class="w3-bar-item w3-button" onclick="openCity('1')">1</button>
            <button class="w3-bar-item w3-button" onclick="openCity('2')">2</button>
            <button class="w3-bar-item w3-button" onclick="openCity('3')">3</button>
            <button class="w3-bar-item w3-button" onclick="openCity('4')">4</button>
            <button class="w3-bar-item w3-button" onclick="openCity('5')">5</button>
        </div><br>
        <div class="container-fluid">
            <div id="1" class="w3-container city">
                <h4 class="que_h4">Q.1</h4>
                <p class="que_p">What is your goal for this account?</p>
                <input type="radio" id="1a" name="que_1" value="HTML">
                <label for="1a">prepare for retirement.</label><br>
                <input type="radio" id="1b" name="que_1" value="HTML">
                <label for="1b">save for major upcoming expenses (education, health bills, etc.).</label><br>
                <input type="radio" id="1c" name="que_1" value="HTML">
                <label for="1c">save for something special (vacation, new car, etc.).</label><br>
                <input type="radio" id="1d" name="que_1" value="HTML">
                <label for="1d">build a rainy day fund for emergencies.</label><br>
                <input type="radio" id="1e" name="que_1" value="HTML">
                <label for="1e">generate income for expenses.</label><br>
                <input type="radio" id="1f" name="que_1" value="HTML">
                <label for="1f">build long term wealth.</label><br>
            </div>

            <div id="2" class="w3-container city" style="display:none">
                <h4 class="que_h4">Q.2</h4>
                <p class="que_p">What is your understanding of stocks, bonds, and ETFs?</p>
                <input type="radio" id="2a" name="que_2" value="HTML">
                <label for="2a">no</label><br>
                <input type="radio" id="2b" name="que_2" value="HTML">
                <label for="2b">some</label><br>
                <input type="radio" id="2c" name="que_2" value="HTML">
                <label for="2c">good</label><br>
                <input type="radio" id="2d" name="que_2" value="HTML">
                <label for="2d">extensive</label><br>
            </div>

            <div id="3" class="w3-container city" style="display:none">
                <h4 class="que_h4">Q.3</h4>
                <p class="que_p">When you hear “risk” related to your finances, what is the first thought that comes to mind?</p>
                <input type="radio" id="3a" name="que_3" value="HTML">
                <label for="3a">I worry I could be left with nothing.</label><br>
                <input type="radio" id="3b" name="que_3" value="HTML">
                <label for="3b">I understand that it`s an inherent part of the investing process.</label><br>
                <input type="radio" id="3c" name="que_3" value="HTML">
                <label for="3c">I see opportunity for great returns.</label><br>
                <input type="radio" id="3d" name="que_3" value="HTML">
                <label for="3d">I think of the thrill of investing.</label><br>
            </div>

            <div id="4" class="w3-container city" style="display:none">
            <h4 class="que_h4">Q.4</h4>
                <p class="que_p">Have you ever experienced a 20% or more decline in the value of your investments in one year?</p>
                <input type="radio" id="4a" name="que_4" value="HTML">
                <label for="4a">Yes</label><br>
                <input type="radio" id="4b" name="que_4" value="HTML">
                <label for="4b">No</label><br>
            </div>

            <div id="5" class="w3-container city" style="display:none">
                <h2>asas</h2>
                <p>Tokyo is the capital of Japan.</p>
            </div>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<script>
    function openCity(cityName) {
        var i;
        var x = document.getElementsByClassName("city");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        document.getElementById(cityName).style.display = "block";
    }
</script>

</html>