<?php

// $db = new mysqli("localhost", "root", "", "self_notes");
require("../../../php/data.php");
session_start();
if ($db->connect_error) {


    echo "Connection Lost";
} else {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        // echo $_SERVER['REQUEST_METHOD'];
        $m = $_POST['mail'];
        $password = md5($_POST['pass']);
        

        // $m = $_SESSION['forgot_pass'];
        $q = "UPDATE `self_notes` SET `password` =  '$password' WHERE email = '$m'";
        $r = $db->query($q);
        if ($r) {
            echo "yes";
            unset($_SESSION["forgot_pass"]);

        } else {
            echo "Failed ";
        }

    } else {
        echo '<script>alert("Try Again")</script>';

    }









}











?>