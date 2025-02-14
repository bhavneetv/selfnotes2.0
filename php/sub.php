<?php

// $db = new mysqli("localhost", "root", "", "self_notes");require("../../../php/data.php");
require("data.php");
session_start();

if ($db->connect_error) {

    echo "Connection Lost";

} else {

    if(empty($_SESSION["User"])) {
        // echo '<script>window.location.href = "../login-signup/login-sign.php";</script>';


    }
    else{

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $user = $_SESSION['User'];
           
        // echo $user;

        $q = "SELECT * FROM `self_notes` WHERE email = '$user' ";
        
        $r = $db->query($q);
        if ($r->num_rows > 0) {
            $row = $r->fetch_assoc();
            print_r($row['subject']);

        }
        else{
            echo '';
        }
    } 
    else {
        echo '<script>alert("Try Again")</script>';

    }

}

}



?>