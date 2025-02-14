<?php

require("../../../php/data.php");
session_start();

if ($db->connect_error) {


    echo " Lost";
} else {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        $name = $_POST['inp'];
        $user = $_SESSION['User'];


        if (strlen($name) > 14 or strlen($name) < 3) {
            echo 'Enter Room name between 3 to 14 characher';

        } else {

            $check_u = "SELECT room_name FROM room_check WHERE room_name = '$name'";
            $response = $db->query($check_u);
            if ($response->num_rows > 0) {
                echo 'Room already created';

            } else {
                $value_add = "INSERT INTO room_check(room_name,owner)
            VALUE(
            '$name',
            '$user'
            
            
            )";

                if ($db->query($value_add)) {
                    // echo '<script>window.location = ../chat-box.php?room_name='.$name.' </script>';
                    // header()
                    echo 'yes';

                } else {
                    echo 'Failed';
                }
            }
        }
    } else {
   
        echo 'User Not Authorised';
    }



}



?>