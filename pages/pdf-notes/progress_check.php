<?php
session_start();
require("../../php/data.php");



if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (empty($_SESSION["User"])) {
        echo"Guest";
        // echo '<script>window.location.href = "../login-signup/login-sign.php";</script>';
        



    } else {

        $v = $_SESSION['User'];
        $ex_name = "SELECT * FROM self_notes WHERE email = '$v' ";
        $res = $db->query($ex_name);
        if ($res->num_rows > 0) {
            $row = $res->fetch_assoc();
            print_r($row['my_progress']);

        } else {
            echo "Error";
        }
    }
} else {

    echo "Guest";
}










?>