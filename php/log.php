<?php
session_start();

require("data.php");


$v = $_SESSION["User"];

setcookie('User', "" , time() - 3600 ,"/");
unset($_SESSION["User"]);
header("Location:../index.php");





?>