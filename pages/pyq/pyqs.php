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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/cesiumjs/1.78/Build/Cesium/Cesium.js"></script>
    <title>Self Note's | PYQS </title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="../../style/nav-bar.css">
    <link rel="stylesheet" href="../../style/top-page.css">
    <link rel="stylesheet" href="../../style/note-container.css">
    <link rel="stylesheet" href="../../style/extra.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=dark_mode" />
    <link rel="stylesheet" href="htt ps://site-assets.fontawesome.com/releases/v6.4.2/css/all.css">
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
    <link rel="stylesheet" href="css/pyq.css">
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
        </nav>
    </aside>


    <div class="vv">

        <div class="top-page" id="vc">

            <center>
                <div class="top-font-box">
                    <h2 class="top-font">
                        Access free PYQs and exam papers to boost your study smarter, not harder
                    </h2>
                    <h4 class="top-font2">
                        Study easier, faster & better.

                    </h4>

                    <a href="#pyq"><button class="top-button"> Let's Begin &nbsp <i class="fa-solid fa-arrow-down"></i>
                        </button></a>
                </div>


            </center>
        </div>

        <div class="loader-black" id="loader">
            <dotlottie-player id="l" src="https://lottie.host/5f252b2b-b8cf-4229-99b6-8e65d923b786/IEQkjSWjyO.lottie"
                background="transparent" speed="3" style="width: 100px; height: 100px" loop autoplay></dotlottie-player>
        </div>
        <div class="note-main">
            <div class="first-div" id="pyq">
                <h3 id="f"><i class="fa-solid fa-star"></i> PYQS</h3>
                <div class="first-child">
                    <nav class="first-logo"><i class="fa-solid fa-star"></i></nav>
                    <div class="first-note-main">

                        <div class="note-body">
                            <div class="note-name" id="mathu1">
                                <h4>Maths</h4>
                            </div>
                            <div class="note-btn">
                                <a href="https://drive.google.com/drive/folders/1sR_3BmHoByNaB4UOiiyff_Wk7FLe2Wh4?usp=drive_link"><button class="note-btns">View <i
                                            class="fa-solid fa-arrow-right"></i></button></a>

                            </div>
                        </div>
                        <div class="note-body">
                            <div class="note-name" id="mathu1">
                                <h4>physics</h4>
                            </div>
                            <div class="note-btn">
                                <a href="https://drive.google.com/drive/folders/1WlMNRVJ7hzBBvmvv51K5MWu5MmeFRgO9?usp=drive_link"><button class="note-btns">View <i
                                            class="fa-solid fa-arrow-right"></i></button></a>
                            </div>
                        </div>
                        <div class="note-body">
                            <div class="note-name" id="mathu1">
                                <h4>evs</h4>
                            </div>
                            <div class="note-btn">
                                <a href="https://drive.google.com/drive/folders/1Ps05erFJ27__ZjHaDVDvybUhmuRhME9I?usp=drive_link"><button class="note-btns">View <i
                                            class="fa-solid fa-arrow-right"></i></button></a>
                            </div>
                        </div>
                        <div class="note-body">
                            <div class="note-name" id="mathu1">
                                <h4>MANUFACTURING PROCESS</h4>
                            </div>
                            <div class="note-btn">
                                <a href="https://drive.google.com/drive/folders/14BKMJGkPsCu1N2VtkcAHUYp34qCQtOKo?usp=drive_link"><button class="note-btns">View <i
                                            class="fa-solid fa-arrow-right"></i></button></a>
                            </div>
                        </div>
                        <div class="note-body">
                            <div class="note-name" id="mathu1">
                                <h4>english</h4>
                            </div>
                            <div class="note-btn">
                                <a href="https://drive.google.com/drive/folders/1pLfkLXYLRBqb71ppkE_VTasrBeJ_qmmV?usp=drive_link"><button class="note-btns">View <i
                                            class="fa-solid fa-arrow-right"></i></button></a>
                            </div>
                        </div>
                        <div class="note-body" id="pc">
                            <div class="note-name" id="mathu1">
                                <h4>CHEMISTRY</h4>
                            </div>
                            <div class="note-btn">
                                <a href="https://drive.google.com/drive/folders/1PC-9abRly1se83ypXvyAMcaIAVo4DQQj?usp=drive_link"><button class="note-btns">View <i
                                            class="fa-solid fa-arrow-right"></i></button></a>
                            </div>
                        </div>
                        <div class="note-body" id="pb">
                            <div class="note-name" id="mathu1">
                                <h4>BIOLOGY</h4>
                            </div>
                            <div class="note-btn">
                                <a href="https://drive.google.com/drive/folders/1eUjxywpm8K0WGTxCj1CRFstmYhMRXHCA?usp=drive_link"><button class="note-btns">View <i
                                            class="fa-solid fa-arrow-right"></i></button></a>
                            </div>
                        </div>


                    </div>
                </div>
            </div>


            <!-- for physics  -->
            <div class="first-div" id="phy">
                <h3><i class="fa-solid fa-book-open"></i> SEASONAL EXAM</h3>
                <div class="first-child">
                    <nav class="first-logo"><i class="fa-solid fa-book-open"></i></nav>
                    <div class="first-note-main">

                        <div class="note-body">
                            <div class="note-name" id="mathu1">
                                <h4>Maths</h4>
                            </div>
                            <div class="note-btn">
                                <a href="https://drive.google.com/drive/folders/12NX6SKVWIU9JNh8aVnSY7ixfI9uS8M_b?usp=drive_link"><button class="note-btns">View <i
                                            class="fa-solid fa-arrow-right"></i></button></a>
                            </div>
                        </div>
                        <div class="note-body">
                            <div class="note-name" id="mathu1">
                                <h4>physics</h4>
                            </div>
                            <div class="note-btn">
                                <a href="https://drive.google.com/drive/folders/1dV_OJiTsrYXibNUdNCbp7qc_OopwGIv3?usp=drive_link"><button class="note-btns">View <i
                                            class="fa-solid fa-arrow-right"></i></button></a>
                            </div>
                        </div>
                        <div class="note-body">
                            <div class="note-name" id="mathu1">
                                <h4>evs</h4>
                            </div>
                            <div class="note-btn">
                                <a href="https://drive.google.com/drive/folders/1ynsDIhcRUfc3gYhVmCjOfhblEsmX0BsC?usp=drive_link"><button class="note-btns">View <i
                                            class="fa-solid fa-arrow-right"></i></button></a>
                            </div>
                        </div>
                        <div class="note-body">
                            <div class="note-name" id="mathu1">
                                <h4>MANUFACTURING PROCESS</h4>
                            </div>
                            <div class="note-btn">
                                <a href="https://drive.google.com/drive/folders/1UrMWTvwycQVbiXoTl06Ishd4QUzFFj9c?usp=drive_link"><button class="note-btns">View <i
                                            class="fa-solid fa-arrow-right"></i></button></a>
                            </div>
                        </div>
                        <div class="note-body">
                            <div class="note-name" id="mathu1">
                                <h4>english</h4>
                            </div>
                            <div class="note-btn">
                                <a href="https://drive.google.com/drive/folders/1xckun9CnhhhRG7M95JWy8x8pIdsPPLUX?usp=drive_link"><button class="note-btns">View <i
                                            class="fa-solid fa-arrow-right"></i></button></a>
                            </div>
                        </div>
                        <div class="note-body" id="sc">
                            <div class="note-name" id="mathu1">
                                <h4>CHEMISTRY</h4>
                            </div>
                            <div class="note-btn">
                                <a href="https://drive.google.com/drive/folders/1LNqy9DUFFGXNdfqiUGkXK9okBjVafPAo?usp=drive_link"><button class="note-btns">View <i
                                            class="fa-solid fa-arrow-right"></i></button></a>
                            </div>
                        </div>
                        <div class="note-body" id="sb">
                            <div class="note-name" id="mathu1">
                                <h4>BIOLOGY</h4>
                            </div>
                            <div class="note-btn">
                                <a href="https://drive.google.com/drive/folders/1EPuWuocnzQd_i6C1tMLoyL1IvdoMLM7u?usp=drive_link"><button class="note-btns">View <i
                                            class="fa-solid fa-arrow-right"></i></button></a>
                            </div>
                        </div>

                    </div>
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
                <div class="footer-col">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="../../index.php">Home</a></li>
                        <li><a href="../my notes/my_notes.php">My Notes</a></li>
                        <li><a href="../my progress/my_progress.php">My Progress</a></li>

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

                    <div class="page">
                        <h4>Time left for next sesonal</h4>
                        <p id="demo"></p>
                        <!-- <a href="https://www.hitwebcounter.com" target="_blank">
                <img src="https://hitwebcounter.com/counter/counter.php?page=18032761&style=0008&nbdigits=5&type=page&initCount=0" title="Counter Widget" Alt="Visit counter For Websites"   border="0" /></a>           </div> -->
                    </div>

                </div>
    </footer>
</body>

<script>
    function check() {
        console.log("h")
        var l = document.getElementById("loader")
        if (l.style.display = "block") {
            setTimeout(() => {
                l.style.display = "none"
            }, 1400);
        }

    }

    check()
</script>
<script src="js/pyqs.js"></script>
<script src="js/pyqs2.js"></script>
<script src="../../js/nav-bar.js"></script>
<script src="../../js/main-page.js"></script>
<script src="https://kit.fontawesome.com/7967a222d3.js" crossorigin="anonymous"></script>
<script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>


</html>