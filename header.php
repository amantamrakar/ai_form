
    <nav class="navbar navbar-expand-sm " style="justify-content: space-between;background-color:#fff;border-radius:0px 0px 10px 10px;">
        <img src="images\swalogo.png" style="height: 44px;" alt="">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link a_style" href="index.php">Dashboard</a>
            </li>
            <img src="images\userprofile.png" style="width:51px;" alt="">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle a_style" href="#" id="navbardrop" data-toggle="dropdown">
                    Already Registered ?
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item"> <?php
                    if (isset($_SESSION["goaluser"])) {
                        echo '<a href="dashboard.php"><button class="mb-2 ml-3 login-btn">Dashboard</button></a>';
                    } else {
                        echo '<button class="mb-2 login-btn" data-bs-target="#staticBackdrop" data-bs-toggle="modal" type="button">Log In</button>';
                    }
                    ?></a>
                    <!-- <a class="dropdown-item" href="#">Setting</a> -->
                    <a class="dropdown-item" href="#"><?php
                    if (isset($_SESSION["goaluser"])) {
                        echo '<a href="logout.php"><button class="mb-2 ml-4 login-btn">Logout</button></a>';
                    } else {
                        echo '<button class="mb-2 login-btn" data-bs-target="#staticBackdrop" data-bs-toggle="modal" type="button"></button>';
                    }
                    ?></a>
                </div>
            </li>
        </ul>
    </nav>