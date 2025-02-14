<?php

// $db = new mysqli("localhost", "root", "", "self_notes");require("../../../php/data.php");
require("../../php/data.php");
session_start();

if ($db->connect_error) {

    echo "Connection Lost";

} else {

    if (empty($_SESSION["User"])) {
        echo"Guest";

    } else {

        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $user = $_SESSION['User'];
            $ch = $_POST['ch_name'];

            $ex_name = "SELECT * FROM self_notes WHERE email = '$user' ";
            $res = $db->query($ex_name);
            if ($res->num_rows > 0) {
                $row = $res->fetch_assoc();
                $a = $row['my_progress'];

                if ($a == '') {

                    $next_q = " UPDATE `self_notes` SET `my_progress` =  '$ch'  WHERE email = '$user'";
                    $up = $db->query($next_q);
                    if ($up) {
                        echo "yes";
                    } else {
                        echo "error";
                    }



                } else {

                    $ch_get_q = "SELECT * FROM `self_notes` WHERE email = '$user'";
                    $upp = $db->query($ch_get_q);

                    if ($upp->num_rows > 0) {

                        $row = $upp->fetch_assoc();
                        $chf = $row['my_progress'];

                        $ch_new  =  $chf . ',' . $ch;


                        $next_qq = " UPDATE `self_notes` SET `my_progress` =  '$ch_new'  WHERE email = '$user'";
                        $upp = $db->query($next_qq);
                        if ($upp) {
                            echo "yes";
                        } else {

                                echo "error";

                        }

                    } else {
                        echo 'error';
                    }

                }


            }
            else{
                echo 'error';
            }


        } else {
            echo '<script>alert("Try Again")</script>';

        }


    }


}


?>