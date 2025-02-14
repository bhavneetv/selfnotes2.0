<?php
session_start();

require("../../../php/data.php");


$v = $_SESSION["User"];

$q = "DELETE  FROM `self_notes` WHERE email= '$v'";

$r = mysqli_query($db, $q);

if ($r) {
    setcookie("User", "" ,time() - 3600 ,"/");
    unset($_SESSION["User"]);
    echo"Account Deleted";
    header("Location:../../../index.php");
}

else{
    echo "Failed";
}






?>