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
            $ex_name = "SELECT * FROM self_notes WHERE email = '$user' ";
            $res = $db->query($ex_name);
            if($res->num_rows > 0){
                $row = $res->fetch_assoc();
                $ll =$row['note_1_pass'];


                if($ll == 'no'){
                   echo'no';
                }

                else{

                }


                
              }

            else{
            }


        } else {
            echo '<script>alert("Try Again")</script>';

        }

    }

}



?>