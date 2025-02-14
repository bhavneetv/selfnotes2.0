<?php
session_start();
require("data.php");



    if(isset($_SESSION['User']) && isset($_COOKIE['User']) ){
        
       
        
        $v = $_SESSION['User'];
       
        

       
            $ex_name = "SELECT * FROM self_notes WHERE email = '$v' ";
            $res = $db->query($ex_name);
            if($res->num_rows > 0){
                $row = $res->fetch_assoc();
                print_r($row['Full_name']);

              }
            else{
                echo "Error";
            }
           
    
    } 
    elseif(!empty($_SESSION['User']) && empty($_COOKIE['User']) ){
        
       
        
        $v = $_SESSION['User'];
        

       
            $ex_name = "SELECT * FROM self_notes WHERE email = '$v' ";
            $res = $db->query($ex_name);
            if($res->num_rows > 0){
                $row = $res->fetch_assoc();
                print_r($row['Full_name']);

              }
            else{
                echo "Error";
            }
           
    
    } 
    elseif(!empty($_COOKIE['User']) && empty($_SESSION['User'])){
        
       
        $v = $_COOKIE['User'];
        $_SESSION['User'] = $v;
        

       
            $ex_name = "SELECT * FROM self_notes WHERE email = '$v' ";
            $res = $db->query($ex_name);
            if($res->num_rows > 0){
                $row = $res->fetch_assoc();
                print_r($row['Full_name']);

              }
            else{
                echo "Error";
            }
           
    
    } 

    


else{
    
    echo "Guest"   ;
}










?>