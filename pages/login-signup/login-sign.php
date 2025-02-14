

<?php

session_start();
if (!empty($_SESSION["User"]) && !empty($_COOKIE['User'])){

echo  '<script>window.location.href = "../../index.php";</script>';


}




?>

<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Self Note's | Login </title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/cesiumjs/1.78/Build/Cesium/Cesium.js"></script>
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <!-- <link rel="stylesheet" href="../../style/note-container.css"> -->
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
                    <a href="../../index.php" class="nav-link" >
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
                        <span class="nav-label">Guest</span>
                    </a>
                    <span class="nav-tooltip">Guest</span>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <span class="nav-icon material-symbols-rounded">logout</span>
                        <span class="nav-label">Log In</span>
                    </a>
                    <span class="nav-tooltip">Log In</span>
                </li>
            </ul>
        </nav>
    </aside>
    <!-- for form  -->


    <div class="main-form " id="first">


        <div class="black " id="black" style="display: none;">
            <div class="forgot-box animate__animated animate__fadeIn">
                <span id="close"><i class="fa-regular fa-circle-xmark"></i></span>

                <div class="for-mail " style="display: block;" id="email">
                    <h4>Email</h4>
                    <form action="">
                        <div class="input-parent">
                            <div class="forgot-input">
                                <nav class="forgot-img"><i class="fa-solid fa-envelope"></i></nav>
                                <nav class="f-input"><input type="text" placeholder="Enter Email " required name="email"
                                        id="mail-i"></nav>
                            </div>

                            <button type="button" id="next">Next <i class="fa-solid fa-arrow-right"></i></button>







                        </div>
                    </form>
                </div>


                <div class="for-mail " style="display: none;" id="code">
                    <h4>Code</h4>
                    <form action="">
                        <div class="input-parent">
                            <div class="forgot-input">
                                <nav class="forgot-img"><i class="fa-solid fa-1"></i></nav>
                                <nav class="f-input"><input type="text" placeholder="Enter Code" required name="email"
                                        id="code-i"></nav>
                            </div>

                            <button type="button" id="ver">Verify <i class="fa-solid fa-arrow-right"></i></button>







                        </div>
                    </form>
                </div>


                <div class="for-mail " style="display: none;" id="pass">
                    <h4> Set password</h4>
                    <form action="">
                        <div class="input-parent" style="gap: 15px;">
                            <div class="forgot-input">
                                <nav class="forgot-img"><i class="fa-solid fa-lock"></i></nav>
                                <nav class="f-input"><input type="password" placeholder="Enter New Password" required
                                        name="email" id="pass-i1"> </nav>
                            </div>
                            <div class="forgot-input">
                                <nav class="forgot-img"><i class="fa-solid fa-lock"></i></nav>
                                <nav class="f-input"><input type="password" placeholder="Confirm New Password" required
                                        name="email" id="pass-i2"></nav>
                            </div>

                            <button type="button" id="pass-b">Save <i class="fa-solid fa-arrow-right"></i></button>







                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="loader-black none-b" id="loader">
            <dotlottie-player id="l" src="https://lottie.host/5f252b2b-b8cf-4229-99b6-8e65d923b786/IEQkjSWjyO.lottie"
                background="transparent" speed="3" style="width: 90px; height: 90px" loop autoplay></dotlottie-player>
        </div>

        <div class="box " style="display:flex;" id="login-box">



            <div class="login-box">
                <h4><i class="fa-solid fa-user"></i> Login</h4>
                <form action="login.php" method="post">
                    <div class="form-p">

                        <div class="form-box">
                            <div class="form-img">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div class="form-input"><input type="email" placeholder="Email" required name="email"></div>
                        </div>
                        <div class="form-box">
                            <div class="form-img"><i class="fa-solid fa-lock"></i></div>
                            <div class="form-input"><input type="password" placeholder="Password" required
                                    name="password"></div>
                        </div>

                        <nav class="keep"><input type="checkbox" name="keep" id="keeps" checked> <label for="keeps">Keep Me
                                Logined</label></nav>
                        <p id="for"> Forgot Password ?</p>
                        <nav class="btn-box">
                            <button>Login <i class="fa-solid fa-arrow-right"></i></button>
                            <p style="color: blue; font-weight: 600; cursor: pointer;" id="create">Create An Account</p>
                        </nav>
                    </div>
                </form>
            </div>
            <div class="img-box">
                <img src="asserts/login.svg" alt="">
            </div>



        </div>




        <!-- sign up -->

        <div class="box" style="gap: 20px; display: none;" id="sign-box">
            <div class="img-box">
                <img src="asserts/signup.svg" alt="">
            </div>
            <div class="login-box">
                <h4><i class="fa-solid fa-user-plus"></i> Sign Up</h4>
                <form action="sign.php" method="post">
                    <div class="form-p" ">

                    <div class=" form-box">
                        <div class="form-img"><i class="fa-solid fa-user"></i></div>
                        <div class="form-input"><input type="text" placeholder="Name" name="Full_name" required></div>
                    </div>
                    <div class="form-box">
                        <div class="form-img"><i class="fa-solid fa-envelope"></i></div>
                        <div class="form-input"><input type="email" placeholder="Email" name="email" required></div>
                    </div>
                    <div class="form-box">
                        <div class="form-img"><i class="fa-solid fa-lock"></i></div>
                        <div class="form-input"><input type="password" placeholder="Password" name="Password" required>
                        </div>
                    </div>
                    <div class="form-box">
                        <div class="form-img"><i class="fa-solid fa-book"></i></div>
                        <div class="form-input"><select name="subject" id="">
                            <option value="biology">Biology</option>
                            <option value="chemistry">Chemistry</option>
                        </select>
                        </div>
                    </div>


                    <nav class="btn-box">
                        <button style="height: 40px;">Create Account <i class="fa-solid fa-arrow-right"></i></button>
                        <p style="color: blue; font-weight: 600; cursor: pointer;" id="already">Already have account ?
                            Login</p>
                    </nav>
            </div>
            </form>
        </div>




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
                        <li><a href="../my notes/my_notes.php">My Notes</a></li>
                        <li><a href="../my progress/my_progress.php">My Progress</a></li>
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
        var black = document.getElementById("black")
        var close = document.getElementById("close")
        var forgot = document.getElementById("for")

        close.onclick = function () {
            black.style.display = "none"
        }
        forgot.onclick = function () {
            black.style.display = "flex"
        }

        var al = document.getElementById("already")
        var create = document.getElementById("create")
        var sign_box = document.getElementById("sign-box")
        var log_box = document.getElementById("login-box")


        create.onclick = function () {

            log_box.style.display = "none"
            sign_box.style.display = "flex"
        }
        al.onclick = function () {
            sign_box.style.display = "none"
            log_box.style.display = "flex"
        }
        var first = document.getElementById("first")
        function darkk() {
            if (localStorage.getItem("dark_m") == "true") {

                first.classList.add("dark-mode")


            }
            else if (localStorage.getItem("light_m") == "true") {

                first.classList.remove("dark-mode")

                // light()   
            }

        }

        darkk()

    </script>
    <script src="js/login.js"></script>
    <script src="../../js/nav-bar.js"></script>
    <script src="https://kit.fontawesome.com/7967a222d3.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
</body>

</html>