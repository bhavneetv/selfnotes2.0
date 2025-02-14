<?php

session_start();
// $db = new mysqli("localhost", "root", "", "self_notes");
require("../../php/data.php");

if (empty($_SESSION['User'])) {
    // echo '<script>window.location.href = "../login-signup/login-sign.php";</script>';
    echo '<script>window.location.href = "../../index.php";</script>';
} else {
    $c = $_SESSION['User'];
    $ex_name = "SELECT * FROM self_notes WHERE email = '$c' ";
    $res = $db->query($ex_name);

    $row = mysqli_fetch_assoc($res);
    $name = $row['Full_name'];
    $log = 'Log Out';
    $log_link = '../php/log.php';








}








?>










<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/cesiumjs/1.78/Build/Cesium/Cesium.js"></script>
    <title>Self Note's | Account </title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="../../style/nav-bar.css">
    <!-- <link rel="stylesheet" href="../../style/top-page.css"> -->
    <!-- <link rel="stylesheet" href="../../style/note-container.css"> -->
    <!-- <link rel="stylesheet" href="../../style/extra.css"> -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=dark_mode" />
    <link rel="stylesheet" href="htt ps://site-assets.fontawesome.com/releases/v6.4.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- Linking Google fonts f
        or icons -->
    <link rel="stylesheet" href="css/account.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=light_mode" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=dark_mode" />
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="css/py.css"> -->
</head>

<body>
    <aside class="sidebar">
        <header class="sidebar-header">
            <a href="#" class="header-logo">
                <img src="../../assert/dd.png" alt="selfnotes" id="logo">
            </a>
            <button class="toggler sidebar-toggler">
                <span class="material-symbols-rounded">chevron_left</span>
            </button>
            <button class="toggler menu-toggler">
                <span class="material-symbols-rounded">menu</span>
            </button>
        </header>

        <nav class="sidebar-nav" id="nav_b">
            <!-- Primary top nav -->
            <ul class="nav-list primary-nav">
                <li class="nav-item">
                    <a href="../../index.php" class="nav-link">
                        <span class="nav-icon material-symbols-rounded">home</span>
                        <span class="nav-label">Home</span>
                    </a>
                    <span class="nav-tooltip">Home</span>
                </li>

                <li class="nav-item">
                    <a href="../my notes/my_notes.php" class="nav-link">
                        <span class="nav-icon material-symbols-rounded">note_stack</span>
                        <span class="nav-label">My Note's</span>
                    </a>
                    <span class="nav-tooltip">My Note's</span>
                </li>
                <li class="nav-item">
                    <a href="../my progress/my_progress.php" class="nav-link">
                        <span class="nav-icon material-symbols-rounded">clock_loader_40</span>
                        <span class="nav-label">My Progress</span>
                    </a>
                    <span class="nav-tooltip">My Progress</span>
                </li>
                <li class="nav-item">
                    <a href="../my-chats/my-chats.php" class="nav-link">
                        <span class="nav-icon material-symbols-rounded">forum</span>
                        <span class="nav-label">My Chats</span>
                    </a>
                    <span class="nav-tooltip">My Chats</span>
                </li>
                <li class="nav-item">
                    <a href="../contact us/contact.php" class="nav-link">
                        <span class="nav-icon material-symbols-rounded">support_agent</span>
                        <span class="nav-label">Contact Us</span>
                    </a>
                    <span class="nav-tooltip">Contact Us</span>
                </li>
                <li class="nav-item">
                    <a href="../contact us/contact.php" class="nav-link">
                        <span class="nav-icon material-symbols-rounded">cloud_upload</span>
                        <span class="nav-label">Upload Note's</span>
                    </a>
                    <span class="nav-tooltip">Upload Note's</span>
                </li>


            </ul>

            <!-- Secondary bottom nav -->
            <ul class="nav-list secondary-nav">
                <li class="nav-item">
                    <a href="../account/account.php" class="nav-link">
                        <span class="nav-icon material-symbols-rounded">account_circle</span>
                        <span class="nav-label" id="names"><?php echo $name; ?></span>
                    </a>
                    <span class="nav-tooltip"><?php echo $name; ?></span>
                </li>
                <li class="nav-item">
                    <a href="<?php echo $log_link; ?>" class="nav-link" id="atag">
                        <span class="nav-icon material-symbols-rounded">logout</span>
                        <span class="nav-label" id="sign"><?php echo $log; ?></span>
                    </a>
                    <span class="nav-tooltip"><?php echo $log; ?></span>
                </li>
            </ul>
        </nav>
    </aside>


    <div class="loader-black none-b" id="loader">
        <dotlottie-player id="l" src="https://lottie.host/5f252b2b-b8cf-4229-99b6-8e65d923b786/IEQkjSWjyO.lottie"
            background="transparent" speed="3" style="width: 100px; height: 100px" loop autoplay></dotlottie-player>

        <!-- <img src="assert/Animation - 1735571441564.gif" alt="" id="l" style="width: 100px;" speed="3"> -->
        <!-- <video src="assert/Animation - 1735571441564.gif" id="l"></video> -->
        <!-- <dotlottie-player  id="l" src="https://lottie.host/5f252b2b-b8cf-4229-99b6-8e65d923b786/IEQkjSWjyO.lottie" background="transparent" speed="3" style="width: 100px; height: 100px" loop autoplay></dotlottie-player> -->

    </div>



    <div class="black" style="display: none; z-index: 1000;" id="del-box">


        <div class="card first-div" style="display: block; z-index: 100;">
            <div class="header">
                <div class="image">
                    <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z">
                        </path>
                    </svg>
                </div>
                <div class="content">
                    <span class="title">Delete account</span>
                    <p class="message">
                        Are you sure you want to delete your account? All of your data will
                        be permanently removed. This action cannot be undone.
                    </p>
                </div>
                <div class="actions">
                    <a href="php/delete.php"><button type="button" class="desactivate">Delete</button></a>
                    <button type="button" class="cancel" id="del-box-c">Cancel</button>
                </div>
            </div>
        </div>

    </div>

    <!-- <dotlottie-player  id="l" src="https://lottie.host/5f252b2b-b8cf-4229-99b6-8e65d923b786/IEQkjSWjyO.lottie" background="transparent" speed="3" style="width: 100px; height: 100px" loop autoplay></dotlottie-player> -->


    <div class="main first-div">

        <div class="boxc" style="display: block;">


            <div class="m">


                <div class="account-img">
                    <img src="assert/rb_8.png" alt="">
                </div>
                <div class="account-input">

                    <h4> <i class="fa-solid fa-gear"></i> My Account</h4>
                    <form action="php/edit.php" method="post">

                        <div class="form">

                            <div class="input-parent">
                                <nav class="input-cont">
                                    <nav class="input-img"><i class="fa-solid fa-user"></i></nav>
                                    <nav class="input">
                                        <?php
                                        echo ' <input type="text" required name="name" placeholder="Name"
                                    class="inpu" disabled="disabled" id="name" value=' . $row['Full_name'] . '>';
                                        ?>
                                    </nav>
                                </nav>
                                <nav class="input-cont">
                                    <nav class="input-img"><i class="fa-solid fa-envelope"></i></nav>
                                    <nav class="input">
                                        <?php

                                        echo ' <input type="email" required name="email" placeholder="Email"
                                        class="inpu" disabled value=' . $row['email'] . '>';
                                        ?>
                                    </nav>
                                </nav>
                                <nav class="input-cont" style="position: relative;">
                                    <nav class="input-img"><i class="fa-solid fa-key"></i>

                                    </nav>

                                    <?php


                                    echo ' <nav class="input"><input type="password" required name="pass"
                                            placeholder="password" class="inpu" id="pass-i" disabled value=' . $row['password'] . '>';
                                    ?>


                                </nav>

                                <span class="eye-span"><i class="fa-solid fa-eye" id="eye-open"></i> <i
                                        class="fa-solid fa-eye-slash" id="eye-close" style="display:none;"></i></span>
                                </nav>
                                <nav class="input-cont">
                                    <nav class="input-img"><i class="fa-solid fa-calendar-days"></i></nav>
                                    <nav class="input">


                                        <?php

                                        echo '<input type="text" name="date" placeholder=" "
                                            class="inpu" disabled="disabled" value=' . $row['date_create'] . '>';
                                        ?>
                                    </nav>
                                </nav>


                            </div>

                            <div class="btn-box">
                                <button type="button" id="del">Delete </button>
                                <button type="button" id="edit-btn">Edit</button>
                                <button id="save-btn" style="display:none;" type="submit">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h4>Self Note's</h4>
                    <h5 style="color: #ccc; font-size: 18px; font-weight: 100;">Hi, There Welcome to Self Note's Here
                        You Can Find
                        Free Notes</h5>
                </div>

            </div>
    </footer>
















    <script>
        $(window).on('load', function () {

            $.ajax({
                type: "POST",
                url: "../../php/user_name.php",

                beforeSend: function () {

                    $("#loader").removeClass("none-b")



                },





                success: function (response) {

                    $("#loader").addClass("none-b")
                    // alert(response)

                    $("#names").html(response)
                    $("#sign").html("Log Out")

                    $("#atag").attr('href', '../php/log.php');
                    $("#name").val(response)

                    if (response == "Guest") {
                        //   alert(response)
                        $("#name").val(response)
                        $("#sign").html("Login / Sign In")
                        $("#atag").attr('href', 'pages/login-signup/login-sign.php');

                    }

                }

            })

        });



    </script>


    <script src="https://kit.fontawesome.com/7967a222d3.js" crossorigin="anonymous"></script>
    <script src="../../js/nav-bar.js"></script>
    <script src="js/account.js"></script>

</body>

</html>