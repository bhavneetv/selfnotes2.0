<?php
session_start();
require("../../php/data.php");



if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (empty($_SESSION["User"])) {
        // echo '<script>window.location.href = "../login-signup/login-sign.php";</script>';



    } else {

        $v = $_SESSION['User'];
        $empty  = '';
        $ex_name = "UPDATE `self_notes` SET `my_progress`= '$empty' WHERE email = '$v'";
        $res = $db->query($ex_name);
        if ($res) {
            
              echo"yes";

        } else {
            echo "Error";
        }
    }
} else {

    echo "Guest";
}










?>