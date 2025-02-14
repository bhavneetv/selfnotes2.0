<?php

// $db = new mysqli("localhost", "root", "", "self_notes");require("../../../php/data.php");
require("../../../php/data.php");
session_start();

if ($db->connect_error) {

    echo "Connection Lost";

} else {

    if(empty($_SESSION["User"])) {
        // echo '<script>window.location.href = "../login-signup/login-sign.php";</script>';

        echo "user";

    }
    else{

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $user = $_SESSION['User'];
        // $note = $_POST["note_name"];
             $inp = md5($_POST["inputs"]);
            //  echo $inp;
        // echo $user;

        $q = "SELECT note_1_pass FROM self_notes WHERE email = '$user' AND note_1_pass = '$inp' ";
        
        $r = $db->query($q);
        if ($r->num_rows > 0) {
            echo'yes';
          

        }
        else{
            echo 'Wrong Password';
        }
    } 
    else {
        echo '<script>alert("Try Again")</script>';

    }

}

}



?>