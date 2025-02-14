<?php



session_start();
// $db = new mysqli("localhost", "root", "", "self_notes");
require("../../php/data.php");

if (empty($_SESSION['User'])) {
    $note2 = "Guest";
    $note3 = "Guest";
    $note1 = "Guest";

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
    $note1 = $row['note_1_name'];
    $note2 = $row['note_2_name'];
    $note3 = $row['note_3_name'];






}



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Self Note's | My Notes </title>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="../login-signup/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/cesiumjs/1.78/Build/Cesium/Cesium.js"></script>
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="note.css">
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
    <link rel="stylesheet" href="texteditor.css">
    <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>

</head>

<body>

    <div class="loader-black" id="loader" style="display:none; z-index: 10;">

        <dotlottie-player id="l" src="https://lottie.host/5f252b2b-b8cf-4229-99b6-8e65d923b786/IEQkjSWjyO.lottie"
            background="transparent" speed="2.7" style="width: 90px; height: 90px" loop autoplay></dotlottie-player>
    </div>
    <div class="b " id="b">


        <div class="black animate__animated animate__fadeIn" style="display: none; z-index: 100;" id="blacks">
            <div class="c">

                <form action="">
                    <div class="note-edit-box">
                        <span id="close"><i class="fa-regular fa-circle-xmark"></i></span>

                        <h4 id="txt">Enter Password</h4>
                        <input type="text" id="input"><br>
                        <button id="sub">Submit</button>
                        <button id="sub2" style="display:none">Submit</button>



                    </div>
                </form>
            </div>
        </div>


        <aside class="sidebar" style="display: block;">
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
                        <a href="../contact us/contact.php" class="nav-link">
                            <span class="nav-icon material-symbols-rounded">support_agent</span>
                            <span class="nav-label">Contact Us</span>
                        </a>
                        <span class="nav-tooltip">Contact Us</span>
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
                            <span class="nav-label" id="names"><?php echo $name ; ?></span>
                        </a>
                        <span class="nav-tooltip"><?php echo $name ; ?></span>
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






        <div class="note-main" style="display: block;">

            <div class="top-page" id="vc">

                <center>
                    <div class="top-font-box">
                        <h2 class="top-font">
                            Access your note around the world & Learn
                        </h2>
                        <h4 class="top-font2">
                            Study easier, faster & better.

                        </h4>


                    </div>


                </center>
            </div>





        </div>
        <div class="note-c ">

            <div class="note-cont">
                <div class="note-box" note="note1" locked="locked" note_name="note_1">
                    <div class="note-name">
                        <h4><?php echo $note1; ?></h4>
                    </div>

                    <div class="note-pass"><i class="fa-regular fa-pen-to-square edit"></i> &nbsp &nbsp <i
                            class="fa-solid fa-lock"></i> &nbsp &nbsp <i class="fa-solid fa-arrow-right go"></i></div>
                </div>

                <div class="note-box" note="note2" note_name="note_2">
                    <div class="note-name">
                        <h4><?php echo $note2; ?></h4>
                    </div>
                    <div class="note-pass"><i class="fa-regular fa-pen-to-square edit"></i> &nbsp &nbsp <i
                            class="fa-solid fa-arrow-right go"></i></div>
                </div>

                <div class="note-box" note="note3" note_name="note_3">
                    <div class="note-name">
                        <h4> <?php echo $note3; ?></h4>
                    </div>
                    <div class="note-pass"><i class="fa-regular fa-pen-to-square edit"></i> &nbsp &nbsp <i
                            class="fa-solid fa-arrow-right go"></i></div>
                </div>

            </div>
        </div>

    </div>

    <!-- for note text box  -->
    <div class="text animate__animated animate__fadeIn" style="display:none;" id="textt">



        <div class="note-top">
            <span id="back"><i class="fa-solid fa-arrow-left"></i></span>


            <h3 id="name">Note Name</h3>
        </div>

        <div class="container">
            <div class="toolbar">
                <div class="head">
                    <!-- <input type="text" placeholder="Filename" value="untitled" id="filename"> -->
                    <select onchange="fileHandle(this.value); this.selectedIndex=0">
                        <option value="" selected="" hidden="" disabled="">File</option>
                        <option value="new">New file</option>
                        <option value="txt">Save as txt</option>
                        <option value="pdf">Save as pdf</option>
                    </select>
                    <select onchange="formatDoc('formatBlock', this.value); this.selectedIndex=0;">
                        <option value="" selected="" hidden="" disabled="">Format</option>
                        <option value="h1">Heading 1</option>
                        <option value="h2">Heading 2</option>
                        <option value="h3">Heading 3</option>
                        <option value="h4">Heading 4</option>
                        <option value="h5">Heading 5</option>
                        <option value="h6">Heading 6</option>
                        <option value="p">Paragraph</option>
                    </select>
                    <select onchange="formatDoc('fontSize', this.value); this.selectedIndex=0;">
                        <option value="" selected="" hidden="" disabled="">Font size</option>
                        <option value="1">Extra small</option>
                        <option value="2">Small</option>
                        <option value="3">Regular</option>
                        <option value="4">Medium</option>
                        <option value="5">Large</option>
                        <option value="6">Extra Large</option>
                        <option value="7">Big</option>
                    </select>
                    <div class="color">
                        <span>Color</span>
                        <input type="color" oninput="formatDoc('foreColor', this.value); this.value='#000000';">
                    </div>
                    <!-- <div class="color">
                <span>Background</span>
                <input type="color" oninput="formatDoc('hiliteColor', this.value); this.value='#000000';">
            </div> -->
                </div>
                <div class="btn-toolbar">
                    <button onclick="formatDoc('undo')"><i class='bx bx-undo'></i></button>
                    <button onclick="formatDoc('redo')"><i class='bx bx-redo'></i></button>
                    <button onclick="formatDoc('bold')"><i class='bx bx-bold'></i></button>

                    <button onclick="formatDoc('italic')"><i class='bx bx-italic'></i></button>

                    <button onclick="formatDoc('justifyLeft')"><i class='bx bx-align-left'></i></button>
                    <button onclick="formatDoc('justifyCenter')"><i class='bx bx-align-middle'></i></button>
                    <button onclick="formatDoc('justifyRight')"><i class='bx bx-align-right'></i></button>
                    <button onclick="formatDoc('justifyFull')"><i class='bx bx-align-justify'></i></button>
                    <button onclick="formatDoc('insertOrderedList')"><i class='bx bx-list-ol'></i></button>

                </div>
            </div>
            <div id="content" contenteditable="true" spellcheck="false">
                hello
            </div>
        </div>


        <div class="note-btn-box">
            <button class="note-btn " id="save">Save</button>
            <button class="note-btn" id="cal">Clear </button>
            <button class="note-btn" id="del">Delete</button>
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


    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
        integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/note_jquary.js"></script>
    <script src="js/note.js"></script>
    <script src="js/note2.js"></script>
    <script src="../../js/nav-bar.js"></script>

    <script src="js/texteditor.js"></script>
    <script src="https://kit.fontawesome.com/7967a222d3.js" crossorigin="anonymous"></script>

</body>

</html>