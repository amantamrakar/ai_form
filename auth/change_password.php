<?php
if(isset($_GET["key"]) && isset($_GET["token"])){
    require_once("../modules/connect.php");
    if(filter_var($_GET["key"], FILTER_VALIDATE_EMAIL) == false){
        $_SESSION["message"]="invalid email";
        die();
    }
    $g_email = mysqli_real_escape_string($user_con,$_GET["key"]);
    $g_token = mysqli_real_escape_string($user_con,$_GET["token"]);
    $sql = "SELECT `token`,`email` FROM `client_register` WHERE email = '$g_email'";
    $res = mysqli_query($user_con, $sql);
    $count = mysqli_num_rows($res);
    if ($count == 1) {
        $res = mysqli_fetch_assoc($res);
        // my_DD($res);
        $email = $res["email"];
        $token=$res["token"];
        if($token !== $g_token){
            header("Location: sign_up.php");
            die("check token");
        }
        if(isset($_POST["change-password"])){
            if($_POST["p_password"]!==$_POST["re_password"]){
                $_SESSION["message"]="password and re-password not match";
            }else{
                $pws=password_hash($_POST["p_password"],PASSWORD_DEFAULT);
                $update = mysqli_query($user_con, "UPDATE client_register set  token='changed',pws='".$pws."' WHERE email='" . $email . "'");
                if($update){
                    $_SESSION["message"]="your password is changed <a href='./sign_in.php'>go to</a>";
                }
            }
        }   
    }else{
        header("Location: sign_up.php");
        die("check count");
        }
}else{
    header("Location: sign_up.php");
    die("check valid");
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
    <link rel="stylesheet" type="text/css" href="../styles/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../styles/fonts/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="../styles/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500;600;700;800&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="manifest" href="../_manifest.json">
    <meta id="theme-check" name="theme-color" content="#FFFFFF">
    <link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png">
</head>

<body class="theme-light">

    <div id="preloader">
        <div class="spinner-border color-highlight" role="status"></div>
    </div>
    <?php
    // include_once "../layout/alert-message.php";
    // if(isset($_SESSION["error"])){

    //     // echo "<script>alert('".$_SESSION['error']."')</script>";
    //     unset($_SESSION['error']);
    // }

    ?>
    <div id="page">
        <div class="message"></div>
        <a data-toast="toast-1" href="#" id="show-message"></a>
        <div class="jquery"></div>
        <!-- Your Page Content Goes Here-->
        <div class="page-content pb-0 mb-0">
            <div class="card card-style m-0 bg-transparent shadow-0 bg-10 rounded-0" data-card-height="cover">
                <div class="card-center">
                    <div class="card card-style">
                        <div class="content">
                            <form id="change-password" method="post">
                                <h1 class="text-center font-800 font-25 mb-2">Change Password</h1>
                                <!-- <p class="text-center font-13 mt-n2 mb-3">Create your Account</p> -->
                                <div class="form-custom form-label form-icon mb-3">
                                    <i class="bi bi-at font-16"></i>
                                    <input type="password" class="form-control rounded-xs" id="password" placeholder="Password " name="p_password" required>
                                    <label for="password" class="color-theme">Password</label>
                                    <span>(required)</span>
                                </div>
                                <div class="form-custom form-label form-icon mb-3">
                                    <i class="bi bi-at font-16"></i>
                                    <input type="password" class="form-control rounded-xs" id="password" placeholder="Re-password " name="re_password" required>
                                    <label for="password" class="color-theme">Re-password</label>
                                    <span>(required)</span>
                                </div>
                                <input type="hidden" name="key" value="<?=$_GET["key"]?>">
                                <input type="hidden" name="token" value="<?=$_GET["token"]?>">
                                <?php
                                 if(isset($_SESSION["message"])){
                                       
                                    echo ' <div class="alert alert-dismissible color-red-dark rounded-s fade show" role="alert">
                                    <strong>Info</strong> - '.$_SESSION["message"].'
                                    <button type="button" class="btn-close opacity-20 font-11 pt-3 mt-1" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                                    unset($_SESSION["message"]);
                                }
                                ?>
                                <button type="submit" class='btn rounded-sm btn-m gradient-blue text-uppercase font-700 mt-4 mb-3 btn-full shadow-bg shadow-bg-s' id="change-password" name="change-password">change Password</button>
                                <!-- <div class="d-flex">
                                    <div>
                                        <a href="sign_in.php" class="color-theme opacity-30 font-12">Login Account</a>
                                    </div>
                                    <div class="ms-auto">
                                        <a href="sign_up.php" class="color-theme opacity-30 font-12">Create Account</a>
                                    </div>
                                </div> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../scripts/bootstrap.min.js"></script>
    <script src="../scripts/custom.js"></script>
</body>

</html>