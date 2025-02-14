<?php
session_start();

// $db = new mysqli("localhost", "root", "", "self_notes");
require("../../../php/data.php");


$v = $_SESSION["User"];

setcookie("User",$v,time() + 4);
unset($_SESSION["User"]);
header("Location:../index.php");





?>