 <?php
  // session_start();
  // var_dump($_SESSION);

  ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


   <style type="text/css">
   

     fieldset {
       padding: 0 5%;
     }

     #regiration_form {
       transition: all .5s linear;
       height: auto;
     }

     label {
       position: relative;
     }

     label.action::after {
       bottom: 12px;
       content: "";
       width: 99%;
       position: absolute;
       height: 99%;
       background-color: #0d6efd61;
       border: 1px solid white;
       top: -9px;
       left: 0%;
       z-index: -1;
       border-radius: 14px;
     }

     .goals {
       display: block;
       height: 0;
     }


     body {
       background-color: #f8fbfc;
       color: #060404;
     }

     .funimg {
       height: 135px;
       width: 135px;
     }

     .mylable {
       padding: .4%
     }

     #mybutton {
       background-color: #ffab00;
       padding: 3px 17px;
       border-radius: 10px;
       font-size: 20px;
       color: #fbfbfb;
       font-weight: 500;
       box-shadow: 2px 2px 7px #06243a;
       border: none;
     }

     img.selectedIMG {
       border: 2px solid blue;
     }

     /* HIDE RADIO */
     .hiddenradio [type=radio] {
       position: absolute;
       opacity: 0;
       width: 0;
       height: 0;
     }

     .form-control input-selector {
       display: block;
       width: 100%;
       padding: 0.375rem 0.75rem;
       font-size: 1rem;
       font-weight: 400;
       line-height: 1.5;
       color: #212529;
       background-color: #c0d2ece3;
       background-clip: padding-box;
       border: 1px solid #ced4da;
       appearance: none;
       border-radius: 0.25rem;
       transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
     }

     /* IMAGE STYLES */
     .hiddenradio [type=radio]+img {
       cursor: pointer;
     }

     /* CHECKED STYLES */
     .hiddenradio [type=radio]:checked+img {
       outline: 2px solid #f00;
     }

     .parent {
       display: block;
       position: relative;
       float: left;
       line-height: 30px;
       background-color: #4FA0D8;
       border-right: #CCC 1px solid;
     }

     .parent a {
       margin: 10px;
       color: #FFFFFF;
       text-decoration: none;
     }

     .parent:hover>ul {
       display: block;
       position: absolute;
     }

     .child {
       display: none;
     }

     .child li {
       background-color: #E4EFF7;
       line-height: 30px;
       border-bottom: #CCC 1px solid;
       border-right: #CCC 1px solid;
       width: 100%;
     }

     .child li a {
       color: #000000;
     }

     ul {
       list-style: none;
       margin: 0;
       padding: 0px;
       min-width: 10em;
     }

     ul ul ul {
       left: 100%;
       top: 0;
       margin-left: 1px;
     }

     li:hover {
       background-color: #95B4CA;
     }

     .parent li:hover {
       background-color: #F0F0F0;
     }

     .expand {
       font-size: 12px;
       float: right;
       margin-right: 5px;
     }

     .nisha {
       pointer-events: none;
     }

     .borderhigh:focus {
       border-color: black;
       border: 3px solid black;
     }

     .hoverimg:focus {
       border: 5px solid black;
       border-color: black;
     }

     .form-carrier {
       height: 80%;
       width: 55%;
       /* border: 6px solid #413f3f; */
       border-radius: 5px;
       top: 30%;
       background-color: black;
       padding: 45px;
       margin-left: 21%;
     }

     .container {
       display: block;
       margin: auto;

       height: fit-content;

     }

     @import url('https://fonts.googleapis.com/css?family=Source+Code+Pro:200,900');

     :root {
       --text-color: hsla(210, 50%, 85%, 1);
       --shadow-color: hsla(210, 40%, 52%, .4);
       --btn-color: hsl(210, 80%, 42%);
       --bg-color: #141218;
     }

     * {
       box-sizing: border-box;
     }


     .btnss {
       position: relative;
       padding: 10px 20px;
       border: none;
       cursor: pointer;
       font-family: "Source Code Pro";
       font-weight: 600;
       background-color: #0d334f;
       font-size: 21px;
       color: hsl(0deg 4% 88%);
       box-shadow: solid black 8px 16px 72px;
       border-radius: 20px;
       z-index: 0;
       overflow: hidden;
     }

     .btnss:focus {
       outline-color: transparent;
       box-shadow: var(--btn-color) 2px 2px 22px;
     }

     .betten {
       position: relative;
       padding: 10px 20px;
       border: none;
       cursor: pointer;
       font-family: "Source Code Pro";
       font-weight: 600;
       background-color: #0d334f;
       font-size: 21px;
       color: hsl(0deg 4% 88%);
       box-shadow: solid black 8px 16px 72px;
       border-radius: 20px;
       z-index: 0;
       margin-top: -9%;
       width: 34%;
       left: 18%;
       background-color: dodgerblue;
       overflow: hidden;
     }

     .right::after,
     .ghost::after {
       content: var(--content);
       display: block;
       position: absolute;
       white-space: nowrap;
       padding: 40px 40px;
       pointer-events: none;
     }

     .ghost::after {
       font-weight: 200;
       top: -30px;
       left: -20px;
     }

     .right,
     .left {
       position: absolute;
       width: 100%;
       height: 100%;
       top: 0;
     }

     .right {
       left: 66%;
     }

     .left {
       right: 66%;
     }




     .vacacity {
       background-color: #0d2836;
       font-size: 22px;
       border-radius: 10px;
       padding: 13px;
       text-align: center;
       display: block;
       font-family: monospace;
       color: white;
     }

     .vacacity:hover {
       background-color: white;
       color: black;
       border: 2px solid black;
     }

     .vacradio {
       display: none;
     }

     .log-in-containers {
       left: 14px;
     }

     .sign-up-containers {
       left: 10px;
     }
   </style>

   <style>
     .allinput {
       border: 1px solid black;
     }

     .alllabel {
       font-weight: 500;
       font-size: larger;
     }

     .allimg {
       font-weight: 700;
       font-size: 17px;
     }

     .glow-on-hover {
       width: 130px;
       height: 50px;
       border: none;
       outline: none;
       color: #fff;
       background: #111;
       cursor: pointer;
       position: relative;
       z-index: 0;
       border-radius: 10px;
     }

     .glow-on-hover:before {
       content: '';
       background: linear-gradient(45deg, #ff0000, #ff7300, #fffb00, #48ff00, #00ffd5, #002bff, #7a00ff, #ff00c8, #ff0000);
       position: absolute;
       top: -2px;
       left: -2px;
       background-size: 400%;
       z-index: -1;
       filter: blur(5px);
       width: calc(100% + 4px);
       height: calc(100% + 4px);
       animation: glowing 20s linear infinite;
       opacity: 0;
       transition: opacity .3s ease-in-out;
       border-radius: 10px;
     }

     .glow-on-hover:active {
       color: #000
     }

     .glow-on-hover:active:after {
       background: transparent;
     }

     .glow-on-hover:hover:before {
       opacity: 1;
     }

     .glow-on-hover:after {
       z-index: -1;
       content: '';
       position: absolute;
       width: 100%;
       height: 100%;
       background: #111;
       left: 0;
       top: 0;
       border-radius: 10px;
     }

     @keyframes glowing {
       0% {
         background-position: 0 0;
       }

       50% {
         background-position: 400% 0;
       }

       100% {
         background-position: 0 0;
       }
     }

     .loader {
       /* position: fixed; */
       left: 0px;
       top: 0px;
       width: 100%;
       height: 100%;
       z-index: 9999;
       background: url('http://i.imgur.com/KUJoe.gif') 50% 50% no-repeat rgb(249, 249, 249);
       ;
       /* background: url('https://www.google.com/search?q=blue%20loading%20gif&tbm=isch&cs=1&hl=en&sa=X&ved=0CCwQtI8BKAJqFwoTCIiv-8eQt_sCFQAAAAAdAAAAABAH&biw=1366&bih=617&dpr=1#imgrc=S4qOLUxg8nx6uM&imgdii=N4vs4LwnGWt_JM') 50% 50% no-repeat rgb(249, 249, 249); */
       /* width: 100px;
       height: 100px; */
       position: fixed;
       /* top: 50%;
       left: 50%; */
     }

     .icon {
       padding: 20px;
       background: dodgerblue;
       color: white;
       min-width: 50px;
     }

     .input-field {
       width: 100%;
       left: 13%;
       padding: 16px;
       height: 13%;
       position: relative;
       outline: none;
       font-size: 16px;
       top: -56px;
     }
   </style>

   <style>
     @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

     * {
       box-sizing: border-box;
     }

     .bady {
       margin: auto;
     }

     .htag {
       font-weight: bold;
       margin: 0;
       font-size: 140%;
       color: black;
     }

     .htag1 {
       font-weight: bold;
       margin: 0;
       color: white;
     }

     /* h2 {
            text-align: center;
        } */
     .ptag {
       font-size: 14px;
       font-weight: 500;
       line-height: 20px;
       letter-spacing: 0.5px;
       margin: 20px 0 30px;
     }

     .spans {
       font-size: 12px;
       color: black;
     }

     /* a {
            color: #333;
            font-size: 14px;
            text-decoration: none;
            margin: 15px 0;
        } */
     .bottonss {
       border-radius: 20px;
       border: none;
       background-color: #0E4A75;
       color: #FFFFFF;
       font-size: 12px;
       font-weight: bold;
       padding: 12px 45px;
       letter-spacing: 1px;
       text-transform: uppercase;
       transition: transform 80ms ease-in;
     }

     .bottonss:active {
       transform: scale(0.95);
     }

     .bottonss:focus {
       outline: none;
     }

     .bottonss.ghost {
       background-color: transparent;
       border: 1px solid #FFFFFF;
       transition: 0.5s;
     }

     .bottonss.ghost:hover {
       background-color: #FFFFFF;
       color: #223C86;
       cursor: pointer;
     }

     .sameform {
       background-color: #FFFFFF;
       display: flex;
       align-items: center;
       justify-content: center;
       flex-direction: column;
       padding: 0px 48px;
       height: 100%;
       width: 94%;
       text-align: center;
     }

     .inputss {
       background-color: #eee;
       border: none;
       padding: 12px 49px;
       margin: 8px 0;
       width: 100%;
     }

     .inputss:focus {
       border: 2px solid black;
     }

     .containers {
       background-color: #fff;
       border-radius: 10px;
       box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25),
         0 10px 10px rgba(0, 0, 0, 0.22);
       position: relative;
       overflow: hidden;
       width: 768px;
       max-width: 100%;
       min-height: 480px;
     }

     .form-containers {
       position: absolute;
       top: 0;
       height: 100%;
       transition: all 0.6s ease-in-out;
     }

     .log-in-container {
       left: 0;
       width: 50%;
       z-index: 2;
     }

     .containers.right-panel-active .log-in-containers {
       transform: translateX(100%);
     }

     .sign-up-container {
       left: 0;
       width: 50%;
       opacity: 0;
       z-index: 1;
     }

     .containers.right-panel-active .sign-up-containers {
       transform: translateX(100%);
       opacity: 1;
       z-index: 5;
       animation: show 0.6s;
     }

     @keyframes show {

       0%,
       49.99% {
         opacity: 0;
         z-index: 1;
       }

       50%,
       100% {
         opacity: 1;
         z-index: 5;
       }
     }

     .overlay-container {
       position: absolute;
       top: 0;
       left: 50%;
       width: 50%;
       height: 100%;
       overflow: hidden;
       transition: transform 0.6s ease-in-out;
       z-index: 100;
     }

     .containers.right-panel-active .overlay-container {
       transform: translateX(-100%);
     }

     .overlay {
       background: #0B2149;
       /* background: linear-gradient(142.18deg, #1E186D 0%, #186981 98.85%); */
       background-repeat: no-repeat;
       background-size: cover;
       background-position: 0 0;
       color: #FFFFFF;
       position: relative;
       left: -100%;
       height: 100%;
       width: 200%;
       transform: translateX(0);
       transition: transform 0.6s ease-in-out;
     }

     .containers.right-panel-active .overlay {
       transform: translateX(50%);
     }

     .overlay-panel {
       position: absolute;
       display: flex;
       align-items: center;
       justify-content: center;
       flex-direction: column;
       padding: 0 40px;
       text-align: center;
       top: 0;
       height: 100%;
       width: 50%;
       transform: translateX(0);
       transition: transform 0.6s ease-in-out;
     }

     .overlay-left {
       transform: translateX(-20%);
     }

     .containers.right-panel-active .overlay-left {
       transform: translateX(0);
     }

     .overlay-right {
       right: 0;
       transform: translateX(0);
     }

     .containers.right-panel-active .overlay-right {
       transform: translateX(20%);
     }

     .allinput {
       border: 1px solid black;
     }

     .alllabel {
       font-weight: 500;
       font-size: larger;
     }

     .allimg {
       font-weight: 700;
       font-size: 17px;
     }

     @media only screen and (max-width: 720px) {}
   </style>

   <title>Swaraj FinPro AI Form</title>
 </head>

 <body>

   <div class="loader">

   </div>
   <div class="container overflow-hidden " style="height:auto;">

     <h1 style="padding-bottom:10px; border-bottom:4px solid #FC0;">Welcome back, Let's know you better to give you best!</h1></br />
     <button class="glow-on-hover mb-4" type="button">Log In</button>
     <div class="progress">
       <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
     </div>

     <form id="regiration_form" action="action.php" method="post" class="d-flex ">

       <!--  ----------------------1----------------------->
       <?php include("one.php") ?>

       <!-- --------------------2--------------------->
       <?php include("two.php") ?>

       <!-- ----------------3-------------------->

       <?php include("three.php") ?>

       <!--   --------------------4------------------------->
       <?php
        if (!isset($_SESSION["authuser"])) {
          include("four.php");
        }
        ?>

       <!-- ------------------------5-------------------------->

       <?php //include("five.php") 
        ?>

       <!--  -----------------------------6---------------------------->

       <?php //include("six.php") 
        ?>
       <!--  -----------------------------7---------------------------->
       <?php //include("seven.php") 
        ?>
       <!--  -----------------------------8---------------------------->
       <?php // include("eight.php") 
        ?>
       <!--  -----------------------------6---------------------------->
     </form>


     <!-- <div id="id01" class="w3-modal w3-animate-opacity">
       <div class="w3-modal-content w3-card-4">
         <header class="w3-container w3-teal">
           <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-large w3-display-topright">&times;</span>
           <h2>Modal Header</h2>
         </header>
         <div class="w3-container">
           <p>Some text..</p>
           <p>Some text..</p>
         </div>
         <footer class="w3-container w3-teal">
           <p>Modal Footer</p>
         </footer>
       </div>
     </div> -->
   </div>
   <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
   <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> -->

   <script type="text/javascript">
     var current = 1;
     let g_id;
     const myselection = {};
     $(window).load(function() {
       $(".loader").fadeOut("slow");
     });
     $(document).ready(function() {
       $(".loader").fadeIn("normal");
       // $("body").show();
       housecal();
       var current_step, next_step, steps;
       steps = $("fieldset").length;
       const container = document.querySelector(".container");
       // console.dir(container);
       $("fieldset").css("min-width", container.clientWidth + "px");
       window.addEventListener("resize", function(e) {
         $("fieldset").css("min-width", container.clientWidth + "px");
         setProgressBar(current)
       })
       $("input[name='goal_txt']").change(function(e) {
         $("#mybutton").removeAttr("disabled");
         //  $(".next")[current - 1].click();
         g_id = e.target.id.toLowerCase();
         $(".goals").hide();
         $(`.goals[data-goal='${g_id}']`).show();

         $(`.goals[data-goal='${g_id}']`).css("height", "auto");
         $(`.goals:not([data-goal='${g_id}']) .input-selector[required]`).each(function(i, el) {
           console.log(el);
           el.setAttribute("disabled", true);
           // el.remoAttribute("disabled",true);
         })
       });
       $(".myimg").click(function() {
         console.log("g_id", current);

         $(`label[data-filed='${current}']`).removeClass("action")
         $(this).parent(`label[data-filed='${current}']`).addClass("action");
         $("#mybutton").trigger("hover");
         $('#buttons').trigger("hover");
       })


       $(".next").click(function() {
         //  console.log("current next", current);
         $("#default-form").attr("data-goal", g_id);
         if ($(this).id == "mybutton") {
           //  const g_id=$("input[name='goal_txt']:checked").id.toLowerCase();
           $(".goals").hide();
           $(`.goals[data-goal='${g_id}']`).show();
         }
         current_step = $(this).parent().parent();
         next_step = $(this).parent().parent().next();
         next_step.show();
         //  current_step.hide();
         setProgressBar(++current);
       });

       $(".previous").click(function() {
         current_step = $(this).parent().parent();
         next_step = $(this).parent().parent().prev();
         next_step.show();
         //  current_step.hide();
         setProgressBar(--current);
       });

       setProgressBar(current);
       // Change progress bar action
       function setProgressBar(curStep) {
         var percent = parseFloat(100 / steps) * curStep;
         percent = percent.toFixed();
         $(".progress-bar")
           .css("width", percent + "%")
           .html(percent + "%");
         const da = $("#regiration_form")[0].scrollWidth / steps;
         $("#regiration_form").css("transform", "translateX(" + -((curStep - 1) * da + 10) + "px)")
       }
     });




     function meeting() {


       var allinput = document.querySelectorAll(`div[data-goal='${g_id}'] .input-selector`);

       allinput.forEach(el => {
         if (el.value != "" && el.type != "radio") {
           myselection[el.name] = el.value;
         }
         if (el.type == "radio" && el.checked == true) {
           myselection[el.name] = el.value;
         }
       })

       //  document.querySelector(`div[data-goal='${g_id}'] #p-name`).innerHTML = myselection["username"];
       //  document.querySelector(`div[data-goal='${g_id}'] #p-ansinput`).innerHTML = myselection["ansinputs"];
       //  document.querySelector(`div[data-goal='${g_id}'] #p-sipans`).innerHTML = myselection["sipvalue"];
       //  document.querySelector(`div[data-goal='${g_id}'] #p-other`).innerHTML = myselection["goalname"];

     }


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
     $("#city1").click(function() {
       $("#btn-2").removeAttr("disabled")
     })
     $(".calculatehouse").on("input", function(e) {
       //  console.dir(e)
       housecal();
     })
     $("#mobileno").on("input", function(e) {
       const valNum = /^[+#*\(\)\[\]]*([0-9][ ext+-pw#*\(\)\[\]]*){10,15}$/;
       if (valNum.test($(this).val())) {
         $("#btn-phone").removeAttr("disabled");
         //  $("#mobileno")[0].setCustomValidity("Phone Number not valid");
       } else $("#btn-phone").attr("disabled", true);
     })
     $("#mar-email").change(function() {
       $("#fourmarriage").removeAttr("disabled");
     })

     $(".time").change(function() {
       $("#submit_data").removeAttr("disabled");
     })

     $(".two-btn").change(function() {
       $("#btn-2").removeAttr("disabled");
     })

     $(".three-btn").click(function() {
       $("#buttons").removeAttr("disabled");
     })

     $(".three-btns").change(function() {
       $("#buttons").removeAttr("disabled");
     })

     $(".ttip").change(function(e) {
       const re_mail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
       if (e.target.id == "mar-email") {
         if (re_mail.test(e.target.value)) {
           e.target.style.border = "green solid 2px";
           $("#register").attr("disabled", false);
           //  meeting()
         } else {
           e.target.style.border = "red solid 3px";
           $("#register").attr("disabled", true);
         }
       }
     });

     function validate() {
       meeting()
       //  var form_marriage = document.getElementById("mar-email");

       //  if (re.test(form_marriage.value)) {
       //    meeting()
       //    $(".next")[0].click();
       //    $("#register").attr("disabled", false);
       //    return true;
       //  } else {
       //    form_marriage.style.border = "red solid 3px";
       //    $("#register").attr("disabled", true);
       //    return false;
       //  }
     }

     function housecal() {
       fva = document.getElementById("currentcost").value;
       inflation = document.getElementById("inflation").value,
         timehorizon = document.getElementById("timehorizon").value;
       IsEmpty()
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

       document.getElementById("futurevalue").value = m.toFixed(0);
       document.getElementById("set8").innerHTML = m.toFixed(0);
       document.getElementById("set8house").value = anshouse.toFixed(0);
       document.getElementById("house-year").innerHTML = timehorizon;

       var data = $("#regiration_form").serialize();
       //  console.log(data);

     }

     function houseother() {
       var chouse = document.getElementById("houseother");
       if (chouse.style.display === "none") {
         chouse.style.display = "block";

       } else {
         chouse.style.display = "none";
       }
     }

     function educationone() {
       //  var name = document.getElementById("name").value;
       age = document.getElementById("age").value;
       FA = document.getElementById("futureage").value;
       fva = document.getElementById("current").value;
       //  Rate = document.getElementById("rate").value;
       infla = document.getElementById("infla").value;
       IsEmpty()
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

       console.log(fvb, n, ans, cal, next, num, f);

       document.getElementById("set6").value = fvb.toFixed(0);
       document.getElementById("set0").innerHTML = fvb.toFixed(0);
       document.getElementById("set11").innerHTML = N;
       document.getElementById("set11edu").innerHTML = N;
       document.getElementById("nish").value = ans.toFixed(0);
     }

     function marriageone() {
       agemar = document.getElementById("agemar").value;
       fa = document.getElementById("futureagemar").value;
       FVA = document.getElementById("currentcostly").value;
       inflaa = document.getElementById("expinfla").value;
       IsEmpty()
       let rates = 12 / 100;
       //  r = Rate / 100;
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


       console.log(FVB, m, FVA, anssip);

       document.getElementById("set2").value = FVB.toFixed(0);
       document.getElementById("set12").innerHTML = FVB.toFixed(0);
       document.getElementById("mar-year").innerHTML = M;
       document.getElementById("mar-years").innerHTML = M;
       document.getElementById("pooja").value = anssip.toFixed(0);
     }

     function vacationone() {
       //  var name = document.getElementById("name").value;
       let agevac = document.getElementById("vcurrentyear").value;
       let FAvac = document.getElementById("vfutureyear").value;
       let fvavac = document.getElementById("currentvac").value;
       let inflavac = document.getElementById("inflavac").value;
       IsEmpty()
       let ratesvac = 12 / 100;

       // let r = Rate / 100;
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
       console.log(anssipvac);


       document.getElementById("set6vac").value = fvbvac.toFixed(0);
       document.getElementById("setvaca").innerHTML = fvbvac.toFixed(0);
       document.getElementById("anssipvac").value = anssipvac.toFixed(0);
       document.getElementById("vacyear").innerHTML = Nvac.toFixed(0);
     }

     function retirementcal() {
       let retpresent = document.getElementById("presentret").value; //Pa
       let retretire = document.getElementById("retireret").value; //Ra
       let lifeexp = document.getElementById("lifeexp").value; //Le
       let inflatioret = document.getElementById("inflaret").value; //I
       let Ex = document.getElementById("monthlyret").value; //Ex
       let rateretire = document.getElementById("retrate").value;
       IsEmpty()
       let Np = retretire - retpresent; //Np
       console.log(Np);
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

       //sip required

       let sip = (iiret * r2);
       let csip = (1 + r2);
       dsip = (csip ** (Np * 12));
       esip = (dsip - 1);
       fsip = esip * csip;
       gsip = sip / fsip;





       console.log(Er, rr);


       document.getElementById("setretire").value = iiret.toFixed(0);
       document.getElementById("set6ans").innerHTML = iiret.toFixed(0);
       document.getElementById("demoretire").value = gsip.toFixed(0);

       document.getElementById("set6year").innerHTML = Np;
       document.getElementById("setyearret").innerHTML = Np;
       //  document.getElementById("set6infla").innerHTML = inflatioret;

     }

     function carone() {

       let agecar = document.getElementById("currentageyear").value;
       let FAcar = document.getElementById("futureyearcar").value;
       let fvacar = document.getElementById("currentcar").value;
       let inflacar = document.getElementById("inflacar").value;
       let ratescars = 12 / 100;
       IsEmpty()
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


       document.getElementById("set6car").value = fvbcar.toFixed(0);
       document.getElementById("car6").innerHTML = fvbcar.toFixed(0);
       document.getElementById("democar").value = anscar.toFixed(0);
       document.getElementById("caryear").innerHTML = Ncar;
     }

     function othergoalcal() {
       age = document.getElementById("age").value;
       FA = document.getElementById("futureage").value;
       fva = document.getElementById("current").value;
       //  Rate = document.getElementById("rate").value;
       infla = document.getElementById("infla").value;


       IsEmpty()
       currentage = document.getElementById("currentother").value;
       Futureval = document.getElementById("futureval").value;
       currentval = document.getElementById("currentvalue").value;
       //  Rate = document.getElementById("rate").value;
       inflaother = document.getElementById("inflaother").value;
       let rateother = 12 / 100;

       //  r = Rate / 100;
       Nother = Futureval - currentage; // 16
       nother = Nother * 12; //192
       rother = rateother / 12; // 1%
       iother = inflaother / 100; //5%
       jother = iother / 12; //.41
       fvbother = currentval * ((1 + jother) ** nother);

       fother = fvbother * rother;
       numother = (((1 + rother) ** nother) - 1);
       nextother = (1 + rother);
       calother = numother * nextother;
       ansother = fother / calother;

       document.getElementById("set6other").value = fvbother.toFixed(0);
       document.getElementById("set0other").innerHTML = fvbother.toFixed(0);
       document.getElementById("set11other").innerHTML = Nother;
       //  document.getElementById("set11edu").innerHTML = Nother;
       document.getElementById("anssipother").value = ansother.toFixed(0);
       document.getElementById("p-sipans").value = innerHTML.toFixed(0);
       // document.getElementById("inflaother").innerHTML = infla;

     }
     ///////////Education for child one////////////////////

     function IsEmpty() {
       let inflations = document.getElementById("infla").value;
       let houseyears = document.getElementById("timehorizon").value;
       let houseinfla = document.getElementById("inflation").value;
       let marrinfla = document.getElementById("expinfla").value;
       let caryear = document.getElementById("futureyearcar").value;
       let carinfla = document.getElementById("inflacar").value;
       let vacyear = document.getElementById("vfutureyear").value;
       let vacinfla = document.getElementById("inflavac").value;
       let retireinfla = document.getElementById("inflaret").value;
       let retireyear = document.getElementById("retireret").value;
       let otherinfla = document.getElementById("inflaother").value;

       //  console.log(carinfla);

       //  document.getElementById("edu-infla").innerHTML = inflations;
       //  document.getElementById("house-sipyear").innerHTML = houseyears;
       //  document.getElementById("house-infla").innerHTML = houseinfla;
       //  document.getElementById("mar-infla").innerHTML = marrinfla;
       //  document.getElementById("car-year").innerHTML = caryear;
       //  document.getElementById("car-infla").innerHTML = carinfla;
       //  document.getElementById("vac-year").innerHTML = vacyear;
       //  document.getElementById("vac-infla").innerHTML = vacinfla;
       //  document.getElementById("ret-infla").innerHTML = retireinfla;
       //  document.getElementById("other-infla").innerHTML = otherinfla;
       //  document.getElementById("ret-year").innerHTML = retireyear;

     }

     function namebtn() {
       let names = document.getElementById("name").value;
       let snames = document.getElementById("sname").value;
       let goalnames = document.getElementById("nameother").value;

       document.getElementById("set5").innerHTML = names;
       document.getElementById("set9").innerHTML = snames;
       document.getElementById("p-other").innerHTML = goalnames;

     }





     $("#meetingtimeset").click(function(e) {
       $("#meetingtime").removeClass("d-none");
     })
     $("#housemeeting").click(function(e) {
       $("#meetingtimehouse").removeClass("d-none");
     })
     $("#marriagemeeting").click(function(e) {
       $("#meetingtimemarriage").removeClass("d-none");
     })
     $("#carmeeting").click(function(e) {
       bottons
       $("#meetingtimecar").removeClass("d-none");
     })
     $("#vacationmeeting").click(function(e) {
       $("#meetingtimevacation").removeClass("d-none");
     })
     $("#retiremeeting").click(function(e) {
       $("#meetingtimeretire").removeClass("d-none");
     })
     $("#meetingtimesetother").click(function(e) {
       $("#meetingtimeother").removeClass("d-none");
     })


     $("#mbbsother").click(function() {
       $("#mbbss").hide();
     });





     $('#MBBSCOLLEGE').change(function(e) {
       $('#current').val($('#MBBSCOLLEGE option:selected').attr('data-fee'));
       if ($('#MBBSCOLLEGE option:selected')[0].id == "mbbsother") {
         $('#othereduone').removeClass('d-none');
         $("#MBBSCOLLEGE").hide();
         $("#carrername").hide();
       }
       educationone();
     })

     $('#ENGCOLLEGE').change(function(e) {
       $('#current').val($('#ENGCOLLEGE option:selected').attr('data-fee'));
       if ($('#ENGCOLLEGE option:selected')[0].id == "engother") {
         $('#otheredutwo').removeClass('d-none');
         $("#ENGCOLLEGE").hide();
         $("#engcarrer").hide();
       }
       educationone();
     })


     $('#ARCHITECTCOLLEGE').change(function(e) {

       $('#current').val($('#ARCHITECTCOLLEGE option:selected').attr('data-fee'));

       if ($('#ARCHITECTCOLLEGE option:selected')[0].id == "archiother") {
         $('#othereduthree').removeClass('d-none');
         $("#arccarrer").hide();
         $("#ARCHITECTCOLLEGE").hide();
       }

       educationone();
     })

     $('#MBACOLLEGE').change(function(e) {
       $('#current').val($('#MBACOLLEGE option:selected').attr('data-fee'));
       if ($('#MBACOLLEGE option:selected')[0].id == "mbaother") {
         $('#otheredufour').removeClass('d-none');
         $("#mbacarrer").hide();
         $("#MBACOLLEGE").hide();
       }
       educationone();
     })

     //Education for child second/////////////////////////////////////

     function seducation() {
       //  var name = document.getElementById("name").value;
       let ages = document.getElementById("sage").value;
       let FAs = document.getElementById("sfutureage").value;
       let fvas = document.getElementById("scurrent").value;
       // let Rate = document.getElementById("rate").value;
       let inflas = document.getElementById("sinfla").value;

       // let r = Rate / 100;
       let Ns = FAs - ages;
       let ns = Ns * 12;
       let is = inflas / 100;
       let js = is / 12;
       let fvbs = fvas * ((1 + js) ** ns);
       //  console.log(fvb, n);

       document.getElementById("set1").value = fvbs.toFixed(0);
     }

     //  var xs = document.getElementById("smyDIV");
     //  var ys = document.getElementById("seng");
     //  var as = document.getElementById("sarchitect");
     //  var bs = document.getElementById("smba");
     //  var cs = document.getElementById("sother");
     //  var ds = document.getElementById("sallfun");

     function selectCarrer(carrer) {
       $("#allfun").show()
       $(".colleges").hide()
       $(`#${carrer} select`).show().prop('selectedIndex', 0);
       $('.colleges .box').hide()
       $('.colleges .labs').show()
       $(`.colleges#` + carrer).show();

     }
     $(".colleges select").change(function() {
       if ($(this).val() == "other") {
         $('.colleges .box').removeClass('d-none').show();
       } else {
         $('.colleges .box').addClass('d-none');
       }
     })



     var h = document.getElementById("second");
     var imgchild = document.getElementById("imgchild");


     function select2Carrer(carrertwo) {
       $("#sallfun").show()
       $(".collegfortwo").show()
       $(`#${carrertwo} select`).show().prop('selectedIndex', 0);
       $('.collegfortwo .boxes').hide()
       $('.collegfortwo .labels').show()
       $(`.collegfortwo#` + carrertwo).show();

     }
     $(".collegfortwo select").change(function() {
       if ($(this).val() == "twoothers") {
         $('.collegfortwo .boxes').removeClass('d-none').show();
       } else {
         $('.collegfortwo .boxes').addClass('d-none');
       }
     })



     //  function smyFunction() {
     //    //  var x = document.getElementById("myDIV");
     //    if (xs.style.display === "none") {
     //      xs.style.display = "block";
     //      ys.style.display = "none";
     //      as.style.display = "none";
     //      bs.style.display = "none";
     //      cs.style.display = "none";
     //      ds.style.display = "block";
     //    } else {
     //      xs.style.display = "none";
     //    }
     //  }

     //  function seng() {
     //    //  var y = document.getElementById("eng");
     //    if (ys.style.display === "none") {
     //      ys.style.display = "block";
     //      xs.style.display = "none";
     //      as.style.display = "none";
     //      bs.style.display = "none";
     //      cs.style.display = "none";
     //      ds.style.display = "block";
     //    } else {
     //      ys.style.display = "none";
     //    }
     //  }

     //  function sarchitect() {
     //    //  var a = document.getElementById("architect");
     //    if (as.style.display === "none") {
     //      as.style.display = "block";
     //      ys.style.display = "none";
     //      xs.style.display = "none";
     //      bs.style.display = "none";
     //      cs.style.display = "none";
     //      ds.style.display = "block";

     //    } else {
     //      as.style.display = "none";
     //    }
     //  }

     //  function smasterba() {
     //    //  var c = document.getElementById("other");
     //    if (bs.style.display === "none") {
     //      bs.style.display = "block";
     //      as.style.display = "none";
     //      ys.style.display = "none";
     //      xs.style.display = "none";
     //      cs.style.display = "none";
     //      ds.style.display = "block";

     //    } else {
     //      bs.style.display = "none";
     //    }
     //  }

     //  function sotherclg() {
     //    //  var c = document.getElementById("other");
     //    if (cs.style.display === "none") {
     //      cs.style.display = "block";
     //      as.style.display = "none";
     //      ys.style.display = "none";
     //      xs.style.display = "none";
     //      bs.style.display = "none";
     //      ds.style.display = "block";

     //    } else {
     //      cs.style.display = "none";
     //    }
     //    seducation();
     //  }

     function sallfun() {
       if (d.style.display === "none") {
         d.style.display = "block";
       } else {
         d.style.display = "none";
       }
     }

     function secondedu() {
       var z = document.getElementById("secondedu");
       if (z.style.display === "none") {
         z.style.display = "block";
         imgchild.style.display = "none";
         h.style.display = "block";
         $("#second input").addClass("input-selector")
       } else {
         z.style.display = "none";
         h.style.display = "none";
         $("#imgchild").show();
         $("#second input").removeClass("input-selector")
       }
     }




     $('#sMBBSCOLLEGE').change(function(e) {
       $('#scurrent').val($('#sMBBSCOLLEGE option:selected').attr('data-fee'));
       if ($('#sMBBSCOLLEGE option:selected')[0].id == "smbbsother") {
         $('#sothereduone').removeClass('d-none');
       }
       seducation();
     })

     $('#sENGCOLLEGE').change(function(e) {
       $('#scurrent').val($('#sENGCOLLEGE option:selected').attr('data-fee'));
       if ($('#sENGCOLLEGE option:selected')[0].id == "sengother") {
         $('#sotheredutwo').removeClass('d-none');
       }
       seducation();
     })

     $('#sARCHITECTCOLLEGE').change(function(e) {
       $('#scurrent').val($('#sARCHITECTCOLLEGE option:selected').attr('data-fee'));
       if ($('#sARCHITECTCOLLEGE option:selected')[0].id == "sarchiother") {
         $('#sothereduthree').removeClass('d-none');
       }
       seducation();
     })


     $('#sMBACOLLEGE').change(function(e) {
       $('#scurrent').val($('#sMBACOLLEGE option:selected').attr('data-fee'));
       if ($('#sMBACOLLEGE option:selected')[0].id == "smbaother") {
         $('#sotheredufour').removeClass('d-none');
       }
       seducation();
     })



     /////////////// Marriage function//////////////////



     var p = document.getElementById("nrmlmar");
     var q = document.getElementById("richmar");
     var r = document.getElementById("luxmar");
     var s = document.getElementById("destmar");
     var t = document.getElementById("dive");




     $('#normalother').click(function(e) {
       console.dir(e.target);
       $('#othernormal-marriage').removeClass('d-none');

     })
     $('#richother').click(function(e) {
       console.dir(e.target);
       $('#otherrich-marriage').removeClass('d-none');

     })
     $('#luxuryother').click(function(e) {
       console.dir(e.target);
       $('#otherluxury-marriage').removeClass('d-none');

     })
     $('#destother').click(function(e) {
       console.dir(e.target);
       $('#otherdest-marriage').removeClass('d-none');

     })




     function nrmlmar() {
       if (p.style.display === "none") {
         p.style.display = "block";
         r.style.display = "none";
         s.style.display = "none";
         q.style.display = "none";
         t.style.display = "block";
       } else {
         p.style.display = "none";
       }
     }

     function richmar() {
       if (q.style.display === "none") {
         q.style.display = "block";
         p.style.display = "none";
         r.style.display = "none";
         s.style.display = "none";
         t.style.display = "block";
       } else {
         q.style.display = "none";
       }
     }

     function luxmar() {
       if (r.style.display === "none") {
         r.style.display = "block";
         p.style.display = "none";
         q.style.display = "none";
         s.style.display = "none";
         t.style.display = "block";
       } else {
         r.style.display = "none";
       }
     }

     function destmar() {
       if (s.style.display === "none") {
         s.style.display = "block";
         p.style.display = "none";
         q.style.display = "none";
         r.style.display = "none";
         t.style.display = "block";
       } else {
         s.style.display = "none";
       }
     }

     function dive() {
       if (t.style.display === "none") {
         t.style.display = "block";
       } else {
         t.style.display = "none";
       }
     }

     $('.marriage-place').click(function(e) {
       console.dir(e.target);
       $('#currentcostly').val($(this)[0].dataset.fees);
       marriageone();
     })

     $('.rich-tier').click(function(e) {
       console.dir(e.target);
       $('#currentcostly').val($(this)[0].dataset.fees);
       marriageone();
     })

     $('.luxury-tier').click(function(e) {
       console.dir(e.target);
       $('#currentcostly').val($(this)[0].dataset.fees);
       marriageone();
     })
     $('.luxury-tier').click(function(e) {
       console.dir(e.target);
       $('#currentcostly').val($(this)[0].dataset.fees);
       marriageone();
     })
     $('.andaman').click(function(e) {
       console.dir(e.target);
       $('#currentcostly').val($(this)[0].dataset.fees);
       marriageone();
     })

     function valueans() {
       let answer = document.getElementById("futurevalue").value;
       console.log(answer);
       document.getElementById("set3").innerHTML = answer;
     }

     //  datasaved


     $('.btnidprfl').click(function(e) {
       meeting();
       const email = myselection['email'];
       //  delete myselection['passwords'];
       const s_data = myselection
       $.ajax({
         method: "post",
         url: "./trial.php",
         data: {
           "email": email,
           "goal": g_id,
           "sdata": s_data
         },
         dataType:"json",
         success: function(data) {
          if(data.status){
            window.location.href="./dashboard.php"
          }
         }
       });
     })




     ////VACATION///////////////////



     $('#vacone').click(function(e) {
       $("#vaccalculation").removeClass("d-none");
       $('#currentvac').val($('#vacone').attr('detaset'));
       vacationone();
     })
     $('#vactwo').click(function(e) {
       $("#vaccalculation").removeClass("d-none");
       $('#currentvac').val($('#vactwo').attr('detaset'));
       vacationone();
     })
     $('#vacthree').click(function(e) {
       $("#vaccalculation").removeClass("d-none");
       $('#currentvac').val($('#vacthree').attr('detaset'));
       vacationone();
     })
     $('#vacfour').click(function(e) {
       $("#vaccalculation").removeClass("d-none");
       $('#currentvac').val($('#vacfour').attr('detaset'));
       vacationone();
     })
     $('#vacfive').click(function(e) {
       $("#vaccalculation").removeClass("d-none");
       $('#currentvac').val($('#vacfive').attr('detaset'));
       vacationone();
     })
     $('#vacsix').click(function(e) {
       $("#vaccalculation").removeClass("d-none");
       $('#currentvac').val($('#vacsix').attr('detaset'));
       vacationone();
     })

     const signUpButtonmarriage = document.getElementById('signUpsmarriage');
     const logInButtonmarriage = document.getElementById('logInsmarriage');
     const containersmarriage = document.getElementById('containersmarriage');


     signUpButtonmarriage.addEventListener('click', () => {
       containersmarriage.classList.add("right-panel-active");
     });
     logInButtonmarriage.addEventListener('click', () => {
       containersmarriage.classList.remove("right-panel-active");
     });


     const email = document.querySelector("#mar-email");
     const error = document.querySelector(".error-text");
     const btn = document.querySelector("#fourmarriage");
     let regExp = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

     function check() {
       if (email.value.match(regExp)) {

       } else {
         alert("Error").style.borderColor = "red";
       }
     }

     //////CAR /////////////////
   </script>
 </body>

 </html>