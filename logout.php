<?php
session_start();

unset($_SESSION["goaluser"]);
session_destroy();
header("location: ./index.php");


?>