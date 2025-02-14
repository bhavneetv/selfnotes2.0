<?php

require("../../php/data.php");
session_start();



if ($db->connect_error) {
    
    
    echo " Lost";
} else {
    
    if(empty($_SESSION["User"])) {
        $sql = "DELETE FROM msgs WHERE time < DATE_ADD(NOW(),INTERVAL - 7 DAY)";
        $result = $db->query($sql);
        
        echo '<script>window.location.href="my-chats.php"</script>';
    }
    
    else{
        $sql = "DELETE FROM msgs WHERE time < DATE_ADD(NOW(),INTERVAL - 7 DAY)";
        $result = $db->query($sql);

        $user  = $_SESSION['User'];
        $name = $_GET['room_name'];
        $sql_check = "SELECT * FROM `room_check` WHERE room_name = '$name' ";
        $result = $db->query($sql_check); 
        if($result->num_rows == 0){

            echo '<script>alert("room does not found")</script>';
            echo '<script>window.location.href="my-chats.php"</script>';
            
        }    
        
        else{
            
            
            $row = $result->fetch_assoc();
            $owner_mail = $row['owner'];
        $sql_check_name = "SELECT * FROM `self_notes` WHERE email = '$owner_mail' ";
        $result2 = $db->query($sql_check_name);
        if($result2->num_rows > 0){
            $rows = $result2->fetch_assoc();
            $owner_name = $rows["Full_name"];



            if($owner_mail == $user){
                
                $yes = 'owner';
            }
            else{
                $yes = 'no';
            }
        }
        else{
            $owner_name = 'Public';
            $yes = 'no';
        }
        
        
        
        
        
        
        
        
        
        
        
        
    }
    
    
    
}
    
    
    
    
    
}







?>


































<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Self Note's | My Chats </title>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="../login-signup/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></>
    <script src="https://ajax.googleapis.com/ajax/libs/cesiumjs/1.78/Build/Cesium/Cesium.js"></script>
    <link rel="stylesheet" href="my-chat.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../my notes/note.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=dark_mode" />
    <link rel="stylesheet" href="htt ps://site-assets.fontawesome.com/releases/v6.4.2/css/all.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=dark_mode" />
    <link rel="stylesheet" href="htt ps://site-assets.fontawesome.com/releases/v6.4.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- Linking Google fonts f
or icons -->

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=light_mode" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=dark_mode" />
    <script src="https://unpkg.com/feather-icons"></script>
    <!-- <link rel="stylesheet" href="texteditor.css"> -->
    <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>

</head>

<body>

<div class="loader-black" id="loader" style="display:none; z-index: 10;">

<dotlottie-player   dotlottie-player id="l" src="https://lottie.host/5f252b2b-b8cf-4229-99b6-8e65d923b786/IEQkjSWjyO.lottie"
    background="transparent" speed="2.7" style="width: 90px; height: 90px" loop autoplay></dotlottie-player>
</div>

    <div class="chats-main ">


        <div class="chats">





            <div class="top">
                <i class="fa-solid fa-arrow-left" id="backc"></i>
                <div class="top-text">
                    <h2 id="room_n">room name </h2>
                    <h2><?php echo $owner_name; ?> </h2>
                </div>

                <div class="top-btn" <?php echo $yes.'='.$yes; ?>  id="btn_boxc">
                    <button id="sh"><i class="fa-solid fa-share"></i></button>
                    <button id="c"><i class="fa-solid fa-broom"></i></button>
                    <button style="color: white;
    background-color: red;" id="del"><i class="fa-solid fa-trash"></i></button>
                </div>


            </div>

            <div class="ab" >
              

            
              
               
           


            </div>




            <div class="inp-box ">
                <input type="text" placeholder="Enter Message......" id="ii">
                <button id="send"><i class="fa-solid fa-paper-plane"></i></button>
            </div>
        </div>











    </div>










    <script src="https://kit.fontawesome.com/7967a222d3.js" crossorigin="anonymous"></script>
    <script src="js/chat2.js"></script>


</body>

</html>