<style>
    button.btn.user-btn:hover {
        background-color: #00f;
    }

    .user-btn:hover svg {
        fill: #fff;
    }

    .a_style {
        font-size: 16px;
        color: black;
        font-weight: 500;
    }
</style>
<nav class="navbar navbar-expand-sm" style="justify-content: space-between;background-color:#fff;border-radius:0px 0px 10px 10px;">
    <img src="images\swalogo.png" style="height: 44px;" alt="">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent"> -->
    <ul class="navbar-nav mx-2  justify-content-end collapse navbar-collapse" id="navbarSupportedContent">

        <?php
        if (isset($_SESSION["goaluser"])) {
            echo "<li class='nav-item mx-2 my-2 my-sm-0'><span class='text-capitalize' style=' padding-right:10px;'>{$_SESSION["user_full_name"]}</span></li>";
            echo ' <li class="nav-item my-2 my-sm-0"><a class="btn btn-outline-primary a_style" href="dashboard.php">Dashboard</a> </li>';
        } else {
            echo ' <li class="nav-item my-2 my-sm-0"><a class="btn btn-outline-primary" data-bs-target="#staticBackdrop" data-bs-toggle="modal" type="button">LogIn</a> </li>';
        }
        ?>

        <?php
        if (isset($_SESSION["goaluser"])) {
        ?>

            <li class="nav-item mx-2 my-2 my-sm-0">
                <a class="btn btn-outline-primary a_style" href="index.php">New Goal</a>
            </li>
            <li class="nav-item dropdown mx-2 my-2 my-sm-0">
                <button class="btn dropdown-toggle user-btn" href="#" id="navbardrop" data-bs-toggle="dropdown" style="width: 80px;" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" style="max-height: 20px;">
                        <path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0S96 57.3 96 128s57.3 128 128 128zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                    </svg>
                </button>
                <ul class="dropdown-menu dropdown-menu-sm-end position-absolute">

                    <li class="dropdown-item">
                        <a class="nav-link text-primary" href="dashboard.php">Dashboard</a>
                    </li>
                    <!-- <a class="dropdown-item" href="#">Setting</a> -->
                    <li class="dropdown-item">
                        <a class="nav-link text-primary" href="logout.php">Logout</a>
                    </li>
                </ul>
            </li>
        <?php
        }
        ?>
    </ul>
    <!-- </div> -->
</nav> 
