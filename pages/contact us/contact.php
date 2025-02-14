
<?php

session_start();
// $db = new mysqli("localhost", "root", "", "self_notes");
require("../../php/data.php");

if (empty($_SESSION['User'])) {
    $name = "";
    $namee = "Guest";
    $email = "";
    $log = 'Sign Up/Login';
    $log_link = '../account/account.php';
} else {
    $c = $_SESSION['User'];
    $ex_name = "SELECT * FROM self_notes WHERE email = '$c' ";
    $res = $db->query($ex_name);

    $row = mysqli_fetch_assoc($res);
    $email = $row['email'];
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
    <title>Self Note's | Contact Us</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <link rel="stylesheet" href="contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=dark_mode" />
    <link rel="stylesheet" href="htt ps://site-assets.fontawesome.com/releases/v6.4.2/css/all.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=dark_mode" />
    <link rel="stylesheet" href="htt ps://site-assets.fontawesome.com/releases/v6.4.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- Linking Google fonts f
or icons -->
<script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=light_mode" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=dark_mode" />
    <script src="https://unpkg.com/feather-icons"></script>

    <link rel="stylesheet" href="../../style/note-container.css">
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
                        <span class="nav-icon material-symbols-rounded" >home</span>
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
                    <a href="../my progress/my_progress.php" class="nav-link">
                        <span class="nav-icon material-symbols-rounded">clock_loader_40</span>
                        <span class="nav-label">My Progress</span>
                    </a>
                    <span class="nav-tooltip">My Progress</span>
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
                            <span class="nav-label" id="names"><?php echo $namee ; ?></span>
                        </a>
                        <span class="nav-tooltip"><?php echo $namee ; ?></span>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo $log_link ; ?>" class="nav-link" id="atag">
                            <span class="nav-icon material-symbols-rounded">logout</span>
                            <span class="nav-label" id="sign"><?php echo $log ; ?></span>
                        </a>
                        <span class="nav-tooltip"><?php echo $log ; ?></span>
                    </li>
                </ul>
        </nav>
    </aside>

    <div class="loader-black" id="loader" style="display:flex;">
        
            <dotlottie-player id="l" src="https://lottie.host/5f252b2b-b8cf-4229-99b6-8e65d923b786/IEQkjSWjyO.lottie"
                background="transparent" speed="3" style="width: 90px; height: 90px" loop autoplay></dotlottie-player>
        </div>

    <!-- code start here  -->

    <div class="main" id="first">

        <div class="box" id="c_text">

            <div class="img"> <img src="assert/login.png" alt=""></div>
            <div class="input-box">
                <h4> <i class="fa-solid fa-headset"></i> Contact Us</h4>
                <form action="https://api.web3forms.com/submit" method="POST">
                <input type="hidden" name="access_key" value="7e4074bc-1245-4410-bfd5-87f8d050dffd">

                    <div class="form">

                        <div class="input-parent">
                            <nav class="input-cont">
                                <nav class="input-img"><i class="fa-solid fa-user"></i></nav>
                                <nav class="input"><input type="text" required name="Name" placeholder="Name" <?php echo "value = '$name'";?>></nav>
                            </nav>
                            <nav class="input-cont">
                                <nav class="input-img"><i class="fa-solid fa-envelope"></i></nav>
                                <nav class="input"><input type="email" required name="Email" placeholder="Email" <?php echo "value = '$email'";?>></nav>
                            </nav>
                            <nav class="input-cont">
                                <nav class="input-img"><i class="fa-solid fa-question"></i></nav>
                                <nav class="input">
                                    <select name="Topic" id="">
                                        <option value="Select">--Select Topic--</option>
                                        <option value="Connection_Error">Connection Error</option>
                                        <option value="Note_Related">Notes Related</option>
                                        <option value="bugs">Bugs & Glitchs</option>
                                        <option value="account">About Account</option>
                                        <option value="Other">Other</option>



                                    </select>


                                </nav>
                            </nav>
                            <nav class="input-cont">
                                <nav class="input-img"><i class="fa-solid fa-message"></i></nav>
                                <nav class="input">

                                    <textarea name="Message" id="" required value="Message"
                                        placeholder="Message"></textarea>

                                </nav>
                            </nav>


                        </div>

                        <div class="btn-box">
                            <button type="button" onclick="upload()">Upload Notes</button>
                            <button type="submit" onclick="s()">Submit</button>
                        </div>



                    </div>



                </form>
            </div>
        </div>

        <!-- for nopte uploasd  -->


        <div class="box" id="upl_text" style="display: none;">


            <div class="input-box">
                <h4> <i class="fa-solid fa-cloud-arrow-up"></i> Upload Notes</h4>
                <form action="https://api.web3forms.com/submit" method="POST">
                <input type="hidden" name="access_key" value="7e4074bc-1245-4410-bfd5-87f8d050dffd">

                    <div class="form">

                        <div class="input-parent">
                            <nav class="input-cont">
                                <nav class="input-img"><i class="fa-solid fa-user"></i></nav>
                                <nav class="input"><input type="text" required name="Upload_Name" placeholder="Name" <?php echo "value = '$name'";?>></nav>
                            </nav>
                            <nav class="input-cont">
                                <nav class="input-img"><i class="fa-solid fa-envelope"></i></nav>
                                <nav class="input"><input type="email" required name="Upload_Email" placeholder="Email" <?php echo "value = '$email'";?>></nav>
                            </nav>
                            <nav class="input-cont">
                                <nav class="input-img"><i class="fa-solid fa-link"></i></nav>
                                <nav class="input"><input type="text" required name="Upload_link" placeholder="Gdrive Link">
                                </nav>
                            </nav>

                            <nav class="input-cont">
                                <nav class="input-img"><i class="fa-solid fa-message"></i></nav>
                                <nav class="input">

                                    <textarea name="Upload_Message" id="" required value="Message"
                                        placeholder="Ch Name"></textarea>

                                </nav>
                            </nav>


                        </div>

                        <div class="btn-box">
                            <button type="button" onclick="contact()">Contact US</button>
                            <button type="submit" onclick="s()">Sent</button>
                        </div>



                    </div>



                </form>
            </div>
            <div class="img"> <img src="assert/upload.png" alt="" style="width: 390px;"></div>
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
                        
                        <li><a href="#">Report An Problem</a></li>

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
    <script src="https://kit.fontawesome.com/7967a222d3.js" crossorigin="anonymous"></script>






    <script src="../../js/nav-bar.js"></script>
    <script src="cont.js"></script>

    <script>

        // var u_b = document.getElementById("upload_btn")
        // var c_b = document.getElementById("cont_btn")
        var u_t = document.getElementById("upl_text")
        var c_t = document.getElementById("c_text")
        // var form_c = document.getElementById("form_contact")
        // var form_u = document.getElementById("form-upload")
        // var upload_sub = document.getElementById("upload-sub")
        // var cont_sub = document.getElementById("sub_cont")
        // alert(u_t.style.display)

        // form_u.onsubmit = function () {
        //     upload_sub.style.backgroundColor = "#008000"
        //     upload_sub.innerHTML = "send " + '<i class="fa-solid fa-check"></i>'

        //     setTimeout(() => {
        //         upload_sub.innerHTML = "Submit &nbsp " + '<i class="fa fa-paper-plane"aria-hidden="true"></i>'
        //         upload_sub.style.backgroundColor = "rgba(144, 30, 167, 0.616)"
        //     }, 3000);


        // }

        // form_c.onsubmit = function () {
        //     // alert()
        //     cont_sub.style.backgroundColor = "#008000"
        //     cont_sub.innerHTML = "send " + '<i class="fa-solid fa-check"></i>'

        //     setTimeout(() => {
        //         cont_sub.innerHTML = "Submit &nbsp " + '<i class="fa fa-paper-plane"aria-hidden="true"></i>'
        //         cont_sub.style.backgroundColor = "rgba(144, 30, 167, 0.616)"
        //     }, 3000);


        // }
        
    

        function upload() {

            c_t.style.display = "none";
            u_t.style.display = "flex"
        }
        function contact() {
            u_t.style.display = "none";
            c_t.style.display = "flex"
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
</body>

</html>