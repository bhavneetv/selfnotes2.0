<?php

require("../../../php/data.php");
session_start();

if ($db->connect_error) {


    echo " Lost";
} else {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        

        $room = $_POST['input'];
        $type = $_POST['types'];
        $user = $_SESSION['User'];
        

       

      

       


       
            $get_id_qu = "SELECT * FROM `self_notes` WHERE email = '$user'";
            $res = $db->query($get_id_qu);
            if ($res->num_rows > 0) {
                $row = $res->fetch_assoc();
                $user_id = $row["id"];
                $user_n = $row["Full_name"];
                $con = $user_n.' '.$type.' the room';
                $con = base64_encode($con);
                





                $value_add = "INSERT INTO msgs(room_name,sender,msg_text)
            VALUE(
            '$room',
            'alert',
            '$con'
            )";

                if ($db->query($value_add)) {
                    // echo '<script>window.location = ../chat-box.php?room_name='.$name.' </script>';
                    // header()
                    echo 'yes';

                } else {
                    echo 'Failed';
                }

            }
        
    } else {

        echo 'User Not Authorised';
    }



}



?>