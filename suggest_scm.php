<?php
require_once('connect.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="./assets/bootstrap.min.css"> -->
    <title>Suggestion of Scheme's</title>
</head>
<style>
    body {
        background-color: #c4c4c4;
    }

    table {
        /* border-collapse: collapse; */
        width: 100%;
        border: 1px solid #ddd;
    }

    .t_boarder {
        background-color: #1b1956;
        color: #fff;
        text-align: center;
        text-transform: uppercase;
    }

    .t_head {
        padding: 4px;
        text-align: center;
        background-color: #fff;
        color: black;
        font-size: 20px;
    }

    .list_dp {
        width: 82%;
        border: none;
        overflow: unset;
        text-align: center;
        padding: 6px;

    }

    .head {
        text-align: center;
        font-size: 19px;
        text-decoration: underline;
        font-family: cursive;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 160px;
        overflow: auto;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown a:hover {
        background-color: #ddd;
    }

    .show {
        display: block;
    }

    .dropbtn {
        border: none;
        background-color: #c4c4c4;
        color: #13799a;
        width: 100%;
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
        <table border="2">
            <thead>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {


                        echo "<tr>
                            <th class='t_boarder' style='padding:10px;'>Goal</th>
                            <th class='t_boarder' colspan='2'>Plan SIP Monthly {$row['plan_sip']}</th>
                            <th class='t_boarder' colspan='2'>Plan Lumpsum Amount {$row['plan_lumpsum']} </th>
                            </tr>
                            </thead>
                            <tbody>";
                        echo "<tr>
                            <td class='t_boarder' style='padding: 4px;text-align: center;'></td>
                            <td class='t_head'>Scheme Name</td>
                            <td class='t_head'>Amount</td>
                            <td class='t_head'>Scheme Name</td>
                            <td class='t_head'>Amount</td>
                            </tr>
                            <tr>
                            <td class='t_boarder'>{$row['goal']}</td>
                                <td style='text-align: center;'>
                                    <input type='text' class='op' style='padding: 8px;color:black;'><br>";
                        if ($get_ut["user_type"] == "Conservative") {
                            echo "<select id='s1' onchange='checkPrice()' value='See another alternative Brands'>
                                    <option value='P2P'>cons one</option>
                                    <option value='Debt'>cons two</option>
                                    <option value='Equity'>cons three</option>
                                </select>
                                <td style='text-align:center;'>{$row['plan_sip']}</td>
                                    <td style='text-align: center;'>
                                        <input type='text' class='op' style='padding: 8px;color:black;'><br>
                                            <select id='s1' onchange='checkPrice()' value='See another alternative Brands'>
                                                <option value='P2P'>cons lum 1</option>
                                                <option value='Debt'>cons lum 2</option>
                                                <option value='Equity'>cons lum 3</option>
                                            </select>
                                    </td>
                                <td style='text-align:center;'>{$row['plan_lumpsum']}</td>";
                        } else if ($get_ut["user_type"] == "Modrate") {
                            echo "<select id='s1' onchange='checkPrice()' value='See another alternative Brands'>
                                                <option value='P2P'>mod one </option>
                                                <option value='Debt'>mod two</option>
                                                <option value='Equity'>mod three</option>
                                            </select>
                                            <td style='text-align:center;'>{$row['plan_sip']}</td>
                                                <td style='text-align: center;'>
                                                    <input type='text' class='op' style='padding: 8px;color:black;'><br>
                                                        <select id='s1' onchange='checkPrice()' value='See another alternative Brands'>
                                                            <option value='P2P'>mod lum 1</option>
                                                            <option value='Debt'>mod lum 2</option>
                                                            <option value='Equity'>mod lum 3</option>
                                                        </select>
                                </td>
                            <td style='text-align:center;'>{$row['plan_lumpsum']}</td>";
                        } else if ($get_ut["user_type"] == "Aggressive") {
                            echo "<select id='s1' onchange='checkPrice()' value='See another alternative Brands'>
                                            <option value='P2P'>agg one</option>
                                            <option value='Debt'>agg two</option>
                                            <option value='Equity'>agg three</option>
                                        </select>
                                        <td style='text-align:center;'>{$row['plan_sip']}</td>
                                        <td style='text-align: center;'>
                                            <input type='text' class='op' style='padding: 8px;color:black;'><br>
                                                <select id='s1' onchange='checkPrice()' value='See another alternative Brands'>
                                                    <option value='P2P'>agg lum 1</option>
                                                    <option value='Debt'>agg lum 2</option>
                                                    <option value='Equity'>agg lum 3</option>
                                                </select>
                                        </td>
                                    <td style='text-align:center;'>{$row['plan_lumpsum']}</td>
                                    </tr> <br>
                           </tbody>
                           </table>";
                        }                         
                        
                    }
                }
                ?>
            
        </div>

        <footer>
        <?php
                // if (mysqli_num_rows($result) > 0) {
                //     while ($row = mysqli_fetch_assoc($result)) {

                //     }
                // }
                        ?>
        </footer>





</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="./assets/bootstrap.bundle.min.js"></script>
<script>
    function checkPrice() {
        selEl = document.querySelector('#s1');
        op = selEl.value;
        document.querySelector('.op').value = op;
    }
</script>

</html>