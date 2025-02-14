<?php

session_start();
// $db = new mysqli("localhost", "root", "", "self_notes");
require("../../../php/data.php");

if(empty($_SESSION['User'])){
    echo "Guest";
}
else{
    $c = $_SESSION['User'];
    $ex_name = "SELECT * FROM self_notes WHERE email = '$c' ";
    $res = $db->query($ex_name);
    if($res->num_rows > 0){
        $row = $res->fetch_assoc();
        print_r($row['Full_name']);

    }
}











?>