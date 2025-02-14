<?php



session_start();
// $db = new mysqli("localhost", "root", "", "self_notes");
require("../../php/data.php");

if (empty($_SESSION['User'])) {


    $log = 'Sign Up/Login';
    $name = 'Guest';
    $log_link = '../account/account.php';
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
    <title>Self Note's | My Progress </title>
    <link rel="stylesheet" href="../login-signup/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/cesiumjs/1.78/Build/Cesium/Cesium.js"></script>
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../my notes/note.css">
    <link rel="stylesheet" href="../../style/nav-bar.css">
    <link rel="stylesheet" href="progress.css">
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
    <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>

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
                    <a href="../pyq/pyqs.php" class="nav-link">
                        <span class="nav-icon material-symbols-rounded">priority_high</span>
                        <span class="nav-label">PYQ'S/Tests</span>
                    </a>
                    <span class="nav-tooltip">PYQ'S/Tests</span>
                </li>

                <li class="nav-item">
                    <a href="../my notes/my_notes.php" class="nav-link">
                        <span class="nav-icon material-symbols-rounded">note_stack</span>
                        <span class="nav-label">My Note's</span>
                    </a>
                    <span class="nav-tooltip">My Note's</span>
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

                <li class="nav-item">
                    <a href="../account/account.php" class="nav-link">
                        <span class="nav-icon material-symbols-rounded">manage_accounts</span>
                        <span class="nav-label">Accounts</span>
                    </a>
                    <span class="nav-tooltip">Accounts</span>
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
            </ul>
        </nav>
    </aside>

    <div class="loader-black" id="loader" ">

        <dotlottie-player id=" l" src="https://lottie.host/5f252b2b-b8cf-4229-99b6-8e65d923b786/IEQkjSWjyO.lottie"
        background="transparent" speed="3" style="width: 90px; height: 90px" loop autoplay></dotlottie-player>
    </div>


    <div class="note-main" id="main">

        <div class="top-page" id="vc">

            <center>
                <div class="top-font-box">
                    <h2 class="top-font">
                        Track your note-reading progress and improve consistently
                    </h2>
                    <h4 class="top-font2">
                        Study easier, faster & better.

                    </h4>


                </div>


            </center>
        </div>



        <div class="progress">

            <div class="p">


                <div class="progress-parent">
                    <div class="progress-bar">


                        <div class="container">
                            <div class="circular-progress">
                                <div class="value-container">0%</div>
                            </div>
                        </div>

                    </div>
                    <div class="progress-name">

                        <div class="containerc">
                            <h2>MY SUBJECT WISE PROGRESS</h2>
                            <div class="skills">
                                <div class="details">
                                    <span>ENGLISH</span>
                                    <span id="eng"></span>
                                </div>
                                <div class="bar">
                                    <div id="eng-bar"></div>
                                </div>
                            </div>
                            <div class="skills">
                                <div class="details">
                                    <span>EVS</span>
                                    <span id="evs"></span>
                                </div>
                                <div class="bar">
                                    <div id="evs-bar"></div>
                                </div>
                            </div>
                            <div class="skills">
                                <div class="details">
                                    <span>MATH</span>
                                    <span id="math"></span>
                                </div>
                                <div class="bar">
                                    <div id="math-bar"></div>
                                </div>
                            </div>
                            <div class="skills">
                                <div class="details">
                                    <span>PHYSICS</span>
                                    <span id="phy"></span>
                                </div>
                                <div class="bar">
                                    <div id="phy-bar"></div>
                                </div>
                            </div>
                            <div class="skills">
                                <div class="details">
                                    <span>MANUFACTURING PROCESS</span>
                                    <span id="mp"></span>
                                </div>
                                <div class="bar">
                                    <div id="mp-bar"></div>
                                </div>
                            </div>
                            <div class="skills">
                                <div class="details">
                                    <span id="b" style="text-transform: uppercase;"></span>
                                    <span id="b-per"></span>
                                </div>
                                <div class="bar">
                                    <div id="bio-bar"></div>
                                </div>
                            </div>
                        </div>



                    </div>

                </div>



            </div>
            <button id="reset">Reset Progress</button>


        </div>

























    </div>







    <footer class="footer">
        <div class="containerx">
            <div class="row">
                <div class="footer-col">
                    <h4>Self Note's</h4>
                    <h5 style="color: #ccc; font-size: 18px; font-weight: 100;">Hi, There Welcome to Self Note's Here
                        You Can Find
                        Free Notes</h5>
                </div>
                <div class="footer-col">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="../../index.php">Home</a></li>
                        <li><a href="../pyq/pyqs.php">PYQS</a></li>
                        <li><a href="../my notes/my_notes.php">My Notes</a></li>
                        <!-- <li><a href="#">Rate Us</a></li> -->
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Need Help</h4>
                    <ul>
                        <li><a href="../contact us/contact.php">Contact Us</a></li>
                        <li><a href="../contact us/contact.php">Report An Problem</a></li>

                    </ul>
                </div>



                <div class="footer-col">
                    <h4>follow us</h4>
                    <div class="social-links">
                        <!-- <a href="#"><i class="fab fa-facebook-f"></i></a> -->
                        <a href="mailto:bhavneetv295@gmail.com"><i class="fa-solid fa-envelope"></i></a>
                        <a href="https://www.instagram.com/bhavneet__verma/"><i class="fab fa-instagram"></i></a>
                        <a
                            href="https://www.linkedin.com/in/bhavneet-verma?lipi=urn%3Ali%3Apage%3Ad_flagship3_profile_view_base_contact_details%3BJIDXU%2FsvRnqXwVQSiGW3DQ%3D%3D"><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>



                </div>
    </footer>

    <script>
        $(window).on('load', function () {
            // alert()
            $.ajax({
                type: "POST",
                url: "../php/user_name.php",
                success: function (response) {

                    //   alert(response)

                    $("#names").html(response)
                    $("#sign").html("Log Out")

                    $("#atag").attr('href', '../php/log.php');

                    if (response == "Guest") {

                        // alert("n")
                        // window.location('../login-signup/login-sign.php')
                        window.location.href = '../login-signup/login-sign.php'
                        $("#sign").html("Login / Sign In")
                        $("#atag").attr('href', '../login-signup/login-sign.php');

                    }

                }

            })

        });
    </script>

    <script src="js/progress.js"></script>
    <script src="js/progress2.js"></script>
    <script src="https://kit.fontawesome.com/7967a222d3.js" crossorigin="anonymous"></script>

    <script src="../../js/nav-bar.js"></script>
</body>

</html>