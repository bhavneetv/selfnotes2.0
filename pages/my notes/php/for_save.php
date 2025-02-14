<?php

// $db = new mysqli("localhost", "root", "", "self_notes");require("../../../php/data.php");
require("../../../php/data.php");
session_start();

if ($db->connect_error) {

    echo "Connection Lost";

} else {

    if (empty($_SESSION["User"])) {
        echo 'guest';


    } else {

        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $user = $_SESSION['User'];
            $inp = $_POST['inputs'];
            $note_name = $_POST['note_name'];
            // echo $note_name ;
            $q = "UPDATE `self_notes` SET `$note_name` =  '$inp' WHERE email = '$user' ";
            $r = $db->query($q);
            
            if ($r) {
                echo "yes";
               
    
            } 
            else {
                echo "Failed";
            }

        } else {
            echo '<script>alert("Try Again")</script>';

        }

    }

}



?>