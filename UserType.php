<?php
session_start();
require_once("./connect.php");
if (isset($_POST['type_sub'])) {
    // $email = 'pooja@gmail.com';
    $email = $_SESSION["goaluser"];
    $capacity = $_POST['capcity'];
    $willingness = $_POST['willingness'];
    $user_type = '';
    if ($capacity >= 0 && $capacity <= 10 && $willingness >= 0 && $willingness <= 99) {
        // var_dump("Portfolio No:- 1");
        $user_type = 'Conservative';
        // $("#portfolio").text("Conservative")
    } else if ($capacity >= 11 && $capacity <= 20) {
        if ($willingness >= 0 && $willingness <= 80) {
            // var_dump("portfolio no:- 2");
            $user_type = 'Conservative';
            // $("#portfolio").text("Conservative");
        } else if ($willingness >= 81 && $willingness <= 100) {
            // var_dump("portfolio no:-3");
            $user_type = 'Conservative';
            // $("#portfolio").text("Conservative");
        }
    } else if ($capacity >= 21 && $capacity <= 30) {
        if ($willingness >= 0 && $willingness <= 50) {
            // var_dump("portfolio no:-3");
            $user_type = 'Conservative';
            // $("#portfolio").text("Conservative");
        } else if ($willingness >= 51 && $willingness <= 90) {
            // var_dump("portfolio no:- 4");
            $user_type = 'Moderate';
            // $("#portflio").text("Moderate");
        } else if ($willingness >= 91 && $willingness <= 100) {
            // var_dump("portfolio no:-5");
            $user_type = 'Moderate';
            // $("#portflio").text("Moderate");
        }
    } else if ($capacity >= 31 && $capacity <= 40) {
        if ($willingness >= 0 && $willingness <= 10) {
            // var_dump("portfolio no:- 3");
            $user_type = 'Conservative';
            // $("#portfolio").text("Conservative");
        } else if ($willingness >= 11 && $willingness <= 60) {
            // var_dump("portfolio no:- 4");
            $user_type = 'Conservative';
            // $("#portfolio").text("Conservative");
        } else if ($willingness >= 61 && $willingness <= 100) {
            // var_dump("portfolio ni:-5");
            $user_type = 'Moderate';
            // $("#portflio").text("Moderate");
        }
    } else if ($capacity >= 41 && $capacity <= 80) {
        if ($willingness >= 0 && $willingness <= 40) {
            // var_dump("portfolio no :- 4");
            $user_type = 'Conservative';
            // $("#portfolio").text("Conservative");
        } else if ($willingness >= 41 && $willingness <= 80) {
            // var_dump("portfolio no:- 5");
            $user_type = 'Moderate';
            // $("#portflio").text("Moderate");
        } else if ($willingness >= 81 && $willingness <= 100) {
            // var_dump("portfolio no:- 6");
            $user_type = 'Moderate';
            // $("#portflio").text("Moderate");
        }
    } else if ($capacity >= 51 && $capacity <= 60) {
        if ($willingness >= 0 && $willingness <= 40) {
            // var_dump("portfolio no:-5");
            $user_type = 'Moderate';
            // $("#portflio").text("Moderate");
        } else if ($willingness >= 41 && $willingness <= 80) {
            // var_dump("portfolio no :- 6");
            $user_type = 'Moderate';
            // $("#portflio").text("Moderate");
        } else if ($willingness >= 81 && $willingness <= 100) {
            // var_dump("portfolio no:- 7");
            $user_type = 'Moderate';
            // $("#portflio").text("Moderate");
        }
    } else if ($capacity >= 61 && $capacity <= 70) {
        if ($willingness >= 0 && $willingness <= 20) {
            // var_dump("portfolio no :-5");
            $user_type = 'Moderate';
            // $("#portflio").text("Moderate");
        } else if ($willingness >= 21 && $willingness <= 50) {
            // var_dump("portfolio no :-6");
            $user_type = 'Moderate';
            // $("#portflio").text("Moderate");
        } else if ($willingness >= 51 && $willingness <= 70) {
            // var_dump("portfolio no:- 7");
            $user_type = 'Moderate';
            // $("#portflio").text("Moderate");
        } else if ($willingness >= 71 && $willingness <= 90) {
            // var_dump("portfolio no:- 8");
            $user_type = 'Moderate';
            // $("#portflio").text("Moderate");
        } else if ($willingness >= 91 && $willingness <= 100) {
            // var_dump("portfolio no :-9");
            $user_type = 'Aggressive';
            // $("#portfolio").text("Aggressive");
        }
    } else if ($capacity >= 71 && $capacity <= 80) {
        if ($willingness >= 0 && $willingness <= 30) {
            // var_dump("posrtfolio no:- 6");
            $user_type = 'Moderate';
            // $("#portflio").text("Moderate");
        } else if ($willingness >= 31 && $willingness <= 60) {
            // var_dump("portfolio no :-7");
            $user_type = 'Moderate';
            // $("#portflio").text("Moderate");
        } else if ($willingness >= 61 && $willingness <= 70) {
            // var_dump("postfolio no:- 8");
            $user_type = 'Moderate';
            // $("#portflio").text("Moderate");
        } else if ($willingness >= 71 && $willingness <= 80) {
            // var_dump("portfolio no :-9");
            $user_type = 'Aggressive';
            // $("#portfolio").text("Aggressive");
        } else if ($willingness >= 81 && $willingness <= 100) {
            // var_dump("portfolio no :- 10");
            $user_type = 'Aggressive';
            // $("#portfolio").text("Aggressive");
        }
    } else if ($capacity >= 81 && $capacity <= 90) {
        if ($willingness >= 0 && $willingness <= 20) {
            // var_dump("portfolio no:- 7");
            $user_type = 'Moderate';
            // $("#portflio").text("Moderate");
        } else if ($willingness >= 21 && $willingness <= 50) {
            // var_dump("portfolio no:- 8");
            $user_type = 'Moderate';
            // $("#portflio").text("Moderate");
        } else if ($willingness >= 51 && $willingness <= 60) {
            // var_dump("portfolio no:- 9");
            $user_type = 'Aggressive';
            // $("#portfolio").text("Aggressive");
        } else if ($willingness >= 61 && $willingness <= 80) {
            // var_dump("portfolio no :-10");
            $user_type = 'Aggressive';
            // $("#portfolio").text("Aggressive");
        } else if ($willingness >= 81 && $willingness <= 90) {
            // var_dump("portfolio no:-11");
            $user_type = 'Aggressive';
            // $("#portfolio").text("Aggressive");
        } else if ($willingness >= 91 && $willingness <= 100) {
            // var_dump("portfolio no:- 12");
            $user_type = 'Aggressive';
            // $("#portfolio").text("Aggressive");
        }
    } else if ($capacity >= 91 && $capacity <= 100) {
        if ($willingness >= 0 && $willingness <= 20) {
            // var_dump("portfolio no:- 8");
            $user_type = 'Moderate';
            // $("#portflio").text("Moderate");
        } else if ($willingness >= 21 && $willingness <= 50) {
            // var_dump("portfolio no :- 9");
            $user_type = 'Aggressive';
            // $("#portfolio").text("Aggressive");
        } else if ($willingness >= 51 && $willingness <= 60) {
            // var_dump("portfolio no :- 10");
            $user_type = 'Aggressive';
            // $("#portfolio").text("Aggressive");
        } else if ($willingness >= 61 && $willingness <= 80) {
            // var_dump("portfolio no :- 11");
            $user_type = 'Aggressive';
            // $("#portfolio").text("Aggressive");
        } else if ($willingness >= 81 && $willingness <= 100) {
            // var_dump("portfolio no :- 12");
            $user_type = 'Aggressive';
            // $("#portfolio").text("Aggressive");
        }
    }

    $sql = "INSERT INTO `user_type`( `user_email`, `risk_capacity`,`risk_willigness`,`user_type`) VALUES ('$email','$capacity','$willingness','$user_type')";
    $result =  mysqli_query($conn, $sql);
    if ($result) {
        echo $user_type;
    } else {
        echo "Failed";
    }
}
