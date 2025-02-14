
<?php

// $db = new mysqli("localhost","root","","self_notes");
require("../../php/data.php");
session_start();
if ($db -> connect_error) {
   

    echo "Connection Lost";
}
else{
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        // echo $_SERVER['REQUEST_METHOD'];
        // $name = $_POST['full_name'];
        $email = $_POST['email'];
        $pass = md5($_POST['password']);

     
      
       
        $check_u = "SELECT email FROM self_notes WHERE email = '$email' ";
        $response = $db->query($check_u);
        if($response->num_rows > 0){
            $check_p = "SELECT email FROM self_notes WHERE email = '$email' AND password = '$pass' ";
            $responses = $db->query($check_p);
            if($responses->num_rows > 0){
                
                if(isset($_POST['keep'])){

                    echo '<script>alert("on")</script>';
                    $_SESSION['User'] = $email;
                    setcookie("User" ,  $email ,time() + 60*60*24*14 , "/");
                    header("Location:../../index.php");
                    echo '<script>window.location.href = "../../index.php";</script>';
                    
                }
                else{
                    
                    $_SESSION['User'] = $email;
                    // echo '<script>alert('.$_POST['keep'].')</script>';
                    echo '<script>alert("Logined")</script>';
                    echo '<script>window.location.href = "../../index.php";</script>';
                    // header("Location:../../index.php");
                }
                
            }
            else{
                echo '<script>alert("Password Incorrect")</script>';
                echo '<script>window.location.href = "login-sign.php";</script>';
                // header("Location:login-sign.php");
                // header("Location:../../index.php");
            }
        }
        else{
            echo '<script>alert("User Not Registered")</script>';
            echo '<script>window.location.href = "login-sign.php";</script>';
            // header("Location:login-sign.php");
         }
        
    }
    else{
        // echo $_SERVER['REQUEST_METHOD'];
        // echo "User Not authorised";
        echo '<script>alert("User Not Authorised")</script>';
    }
}



?>
