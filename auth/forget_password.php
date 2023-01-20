<?php

use PHPMailer\PHPMailer\PHPMailer;
session_start();
$_SESSION["m_status"]=false;
// $_SESSION['message'] = "Invalid Email";
// $_SESSION["user"]="test@gmail.com";
// $_SESSION["name"]="test";
if (isset($_SESSION["user"])) {
    header("Location: ./index.php");
}
if (isset($_POST["forget-password"])) {
    require_once("../modules/connect.php");
    if(filter_var($_POST["p_email"], FILTER_VALIDATE_EMAIL) == false){
        $_SESSION["message"]="invalid email";
    }else{
        $email = mysqli_real_escape_string($user_con, $_POST['p_email']);
        $sql = "SELECT * FROM `client_register` WHERE email = '$email'";
        $res = mysqli_query($user_con, $sql);
        $count = mysqli_num_rows($res);
        if ($count === 1) {
            $res = mysqli_fetch_assoc($res);
            // my_DD($res);
            $emailId = $res["email"];
            $name = $res["full_name"];
            // $token=$res["token"];
            $token = md5($emailId) . rand(10, 9999);
    
            $expFormat = mktime(
                date("H"),
                date("i"),
                date("s"),
                date("m"),
                date("d") + 1,
                date("Y")
            );
    
            $expDate = date("Y-m-d H:i:s", $expFormat);
    
            // $update = mysqli_query($user_con,"UPDATE client_register set  password='" . $password . "', reset_link_token='" . $token . "' ,exp_date='" . $expDate . "' WHERE email='" . $emailId . "'");
            $update = mysqli_query($user_con, "UPDATE client_register set  token='" . $token . "' WHERE email='" . $emailId . "'");
            if($_SERVER["SERVER_NAME"] === "swarajfinpro.com"){
                $path="https://swarajfinpro.com/application/";
              }else{
                $path="http://localhost/main_app/";
              }
            $link = "<a href='{$path}auth/change_password.php?key=" . $emailId . "&token=" . $token . "'>Click To Reset password</a>";
            // $link = "<a href='{$path}auth/change_password.php?key=" . $emailId . "&token=" . $token . "'>Click To Reset password</a>";
            // require ;
    
            require_once('../vendor/autoload.php');
    
            $mail = new PHPMailer();
            // $mail->SMTPDebug  = 3;
            // $mail->SMTPDebug=SMTP::DEBUG_SERVER;
            $mail->CharSet = "utf-8";
            $mail->IsSMTP();
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            $mail->Mailer = "smtp";
            // enable SMTP authentication
            $mail->SMTPAuth = true;
            // GMAIL username
            // $mail->Username = "wishky955@gmail.com";
            $mail->Username = "help.swarajfinpro@gmail.com";
            // GMAIL password
            $mail->Password = "yuqbuycngtugrnfl";
            $mail->SMTPSecure = "tls";
            $mail->Port = 587;
            // $mail->SMTPSecure = "STARTTLS";
            // sets GMAIL as the SMTP server
            $mail->Host = "smtp.gmail.com";
            // $mail->Host = "outlook.office365.com";

            // set the SMTP port for the GMAIL server
            // $mail->From = 'wishky955@gmail.com';
            $mail->From = $emailId;
            // $mail->FromName = 'your_name';
            $mail->AddAddress($emailId, "Swaraj Finpro");
            $mail->Subject =  'Reset Password';
            $mail->IsHTML(true);
            $mail->Body = 'Click On This Link to Reset Password ' . $link . '';
            if ($mail->Send()) {
                $_SESSION["m_status"]=true;
                $_SESSION["message"]="Check Your Email and Click on the link sent to your email";
            } else {
                $_SESSION["message"]="Mail Error - >" . $mail->ErrorInfo;
            }
            // mail("arpit@swarajfinpro.com","reset password", "$link");
            // $_SESSION["message"]="Send email to user with password";
        } else {
            $_SESSION["message"]="User name does not exist in database";
        }
    }
}
?>
<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <title>swaraj finpro</title>
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500;600;700;800&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
   
    <meta id="theme-check" name="theme-color" content="#FFFFFF">
    <link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png">
</head>
<style>
      .container {
        max-width: 430px;
    margin: 5vh auto 0 auto;
    padding: 30px;
    box-shadow: 0px 0px 29px 8px rgb(153 153 153);
    }

</style>
<body class="theme-light">

    <div id="page">
        <!-- <div class="mes  -->
        <!-- Your Page Content Goes Here-->
        <!-- <div class="page-content pb-0 mb-0">
            <div class="card card-style m-0 bg-transparent shadow-0 bg-10 rounded-0" data-card-height="cover">
                <div class="card-center">
                    <div class="card card-style">
                        <div class="content"> -->
                            <div class="head text-center mt-2"><img src="../images/swalogo.png" alt="" style="width:20%;"></div>
                            <form id="forget-password" method="post">
                                <div class="container">
                                <div class="col-12 col-lg-12 col-md-6 col-sm-12">
                                <div class='col-12' style="display:flex;justify-content:center;">
                                <img src="../images/confused_Kid.png" alt="" style="width:36%">
                                </div>
                                <h4 class="text-center font-800 font-25 ">Forget password?</h4>
                                <p class="text-center " style="font-size:11px;">Enter your email address to retrieve your password</p>
                                <!-- <p class="text-center font-13 mt-n2 mb-3">Create your Account</p> -->
                                <div class="form-custom form-label form-icon mb-3" style="display: flex; justify-content: center;">
                                    <input type="email" class="form-control w-75" id="email" placeholder="Email Address" name="p_email" required>
                                    <!-- <label for="email" class="color-theme">Email Address</label>
                                    <span>(required)</span> -->
                                </div>
                                <?php

                                    if(isset($_SESSION["message"])){
                                       if($_SESSION["m_status"]){
                                        echo ' <div class="alert alert-dismissible rounded-s fade show" role="alert" style="color: #ff0c0c;
                                        text-align: center;">
                                        <strong>Error</strong> - '.$_SESSION["message"].'
                                        <button type="button" class="btn-close opacity-40 font-11 pt-3 mt-1" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';
                                       }else{
                                           echo ' <div class="alert alert-dismissible color-red-dark rounded-s fade show" role="alert">
                                           <strong>Info</strong> - '.$_SESSION["message"].'
                                           <button type="button" class="btn-close opacity-20 font-11 pt-3 mt-1" data-bs-dismiss="alert" aria-label="Close"></button>
                                       </div>';
                                       }
                                        unset($_SESSION["message"]);
                                        unset($_SESSION["m_status"]);
                                    }
                                ?>
                                <div class="text-center">
                                <button type="submit" class='btn rounded-sm mb-4 btn-primary' id="forget-password" name="forget-password">Forget Password</button>
                                </div></div>
                            </form>
                        </div>
                    <!-- </div>
                </div>
            </div>
        </div>
    </div> -->
    </div>
    <script src="../assets/bootstrap.min.js"></script>
</body>

</html>