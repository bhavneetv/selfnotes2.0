<?php

// $db = new mysqli("localhost", "root", "", "self_notes");require("../../../php/data.php");
require("../../../php/data.php");
session_start();
if ($db->connect_error) {


    echo "Connection Lost";
} else {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        // echo $_SERVER['REQUEST_METHOD'];
        $l = $_POST['otp'];
        $lp = $_POST['mail'];
        date_default_timezone_set('Asia/kolkata');
        $code_e = date('Y-m-d');

        $m = $_SESSION['forgot_pass'];
        $q = "SELECT email FROM `self_notes` WHERE email = '$lp' AND forgot_code = '$l' AND code_expire = '$code_e'";
        $r = $db->query($q);
        if ($r->num_rows > 0) {
            echo "yes";

        } else {
            echo "Worng OTP";
        }

    } else {
        echo '<script>alert("Try Again")</script>';

    }









}











?>