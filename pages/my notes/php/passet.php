<?php

// $db = new mysqli("localhost", "root", "", "self_notes");require("../../../php/data.php");
require("../../../php/data.php");
session_start();

if ($db->connect_error) {

    echo "Connection Lost";

} else {

    if(empty($_SESSION["User"])) {
        echo 'guest';


    }
    else{

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $user = $_SESSION['User'];
        // $note = $_POST["note_name"];
        $inp = md5($_POST["input"]);
        // echo $inp;

        $q = "UPDATE `self_notes` SET `note_1_pass` = '$inp' WHERE email = '$user' ";
        
        $r = $db->query($q);
        if ($r) {
            echo'Password Set';
          

        }
        else{
            echo 'Failed';
        }
    } 
    else {
        echo '<script>alert("Try Again")</script>';

    }

}

}



?>