<?php

session_start();
// $db = new mysqli("localhost", "root", "", "self_notes");
require("../../../php/data.php");






if(empty($_SESSION['User'])){
//     header('../../login-signup/login-sign.php');
    


// header("Location: ../../login-signup/login-sign.php");
echo '<script>window.location.href = "../../login-signup/login-sign.php";</script>';
}




else{

    $name = $_POST['name'];
    // echo $name;
    $pass = md5( $_POST['pass']);
    $c = $_SESSION['User'];
    $ex_name = "UPDATE `self_notes` SET `Full_name`='$name' , `password`='$pass' WHERE email = '$c'";
    $res = $db->query($ex_name);
    if($res){
        echo "<script>alert('Data Uptaded')</script>";
        echo '<script>window.location.href = "../account.php";</script>';

    }
    else{
        echo "<script>alert('Failed')</script>";
    }
}











?>