<?php
session_start();
require("php/data.php");



if (isset($_SESSION['User']) && isset($_COOKIE['User'])) {



  $v = $_SESSION['User'];




  $ex_name = "SELECT * FROM self_notes WHERE email = '$v' ";
  $res = $db->query($ex_name);
  $sql = "DELETE FROM msgs WHERE time < DATE_ADD(NOW(),INTERVAL - 14 DAY)";
  $result = $db->query($sql);
  if ($res->num_rows > 0) {
    $row = $res->fetch_assoc();
    // print_r($row['Full_name']);
    $name = $row['Full_name'];
    $log = 'Log Out';
    $login = 'php/log.php';


  } else {
    echo "Error";
  }


} elseif (!empty($_SESSION['User']) && empty($_COOKIE['User'])) {



  $v = $_SESSION['User'];



  $ex_name = "SELECT * FROM self_notes WHERE email = '$v' ";
  $res = $db->query($ex_name);
  if ($res->num_rows > 0) {
    $row = $res->fetch_assoc();
    $name = $row['Full_name'];
    $log = 'Log Out';
    $login = 'php/log.php';



  } else {
    echo "Error";
    $log = 'Sign Up / Login';
  }


} elseif (!empty($_COOKIE['User']) && empty($_SESSION['User'])) {


  $v = $_COOKIE['User'];
  $_SESSION['User'] = $v;



  $ex_name = "SELECT * FROM self_notes WHERE email = '$v' ";
  $res = $db->query($ex_name);
  if ($res->num_rows > 0) {
    $row = $res->fetch_assoc();
    $name = $row['Full_name'];
    $log = 'Log Out';
    $login = 'php/log.php';

  } else {
    echo "Error";
    $log = 'Sign Up / Login';
  }


} else {

  $name = 'Guest';

  $log = 'Sign Up / Login';
  $login = 'pages/login-signup/login-sign.php';

}



?>


<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <script src="https://ajax.googleapis.com/ajax/libs/cesiumjs/1.78/Build/Cesium/Cesium.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Self Note's | Dashboard </title>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="style/nav-bar.css">
  <link rel="stylesheet" href="style/top-page.css">
  <link rel="stylesheet" href="style/note-container.css">
  <link rel="stylesheet" href="style/extra.css">
  <link rel="stylesheet" href="style/chat.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=dark_mode" />
  <link rel="stylesheet" href="htt ps://site-assets.fontawesome.com/releases/v6.4.2/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <!-- Linking Google fonts f
   or icons -->
   <link rel="icon" href="assert/dd.png">
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

  <div class="slide-up" id="slide-up">
    <!-- <i class="fa-solid fa-arrow-up"></i> -->

    <!DOCTYPE svg PUBLIC '-//W3C//DTD SVG 1.1//EN' 'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'><svg
      enable-background="new 0 0 32 32" height="32px" id="Layer_1" version="1.1" viewBox="0 0 32 32" width="32px"
      xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
      <path
        d="M18.221,7.206l9.585,9.585c0.879,0.879,0.879,2.317,0,3.195l-0.8,0.801c-0.877,0.878-2.316,0.878-3.194,0  l-7.315-7.315l-7.315,7.315c-0.878,0.878-2.317,0.878-3.194,0l-0.8-0.801c-0.879-0.878-0.879-2.316,0-3.195l9.587-9.585  c0.471-0.472,1.103-0.682,1.723-0.647C17.115,6.524,17.748,6.734,18.221,7.206z"
        fill="#515151" />
    </svg>
  </div>
  <div class="loader-black" id="loader">
    <dotlottie-player  id="l" src="https://lottie.host/5f252b2b-b8cf-4229-99b6-8e65d923b786/IEQkjSWjyO.lottie" background="transparent" speed="3" style="width: 100px; height: 100px" loop autoplay></dotlottie-player>
  </div>
  <!-- for popup  -->
  
 
 
  <aside class="sidebar">
    <!-- Sidebar header -->
    <header class="sidebar-header">
      <a href="#" class="header-logo">
        <img src="assert/dd.png" alt="selfnotes" id="logo">
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
          <a href="pages/pyq/pyqs.php" class="nav-link">
            <span class="nav-icon material-symbols-rounded">priority_high</span>
            <span class="nav-label">PYQ'S/Tests</span>
          </a>
          <span class="nav-tooltip">PYQ'S/Tests</span>
        </li>
        <li class="nav-item">
          <a href="pages/my notes/my_notes.php" class="nav-link">
            <span class="nav-icon material-symbols-rounded">note_stack</span>
            <span class="nav-label">My Note's</span>
          </a>
          <span class="nav-tooltip">My Note's</span>
        </li>
        <li class="nav-item">
          <a href="pages/my progress/my_progress.php" class="nav-link">
            <span class="nav-icon material-symbols-rounded">clock_loader_40</span>
            <span class="nav-label">My Progress</span>
          </a>
          <span class="nav-tooltip">My Progress</span>
        </li>
        <li class="nav-item">
          <a href="pages/my-chats/my-chats.php" class="nav-link">
            <span class="nav-icon material-symbols-rounded">forum</span>
            <span class="nav-label">My Chats</span>
          </a>
          <span class="nav-tooltip">My Chats</span>
        </li>
        <li class="nav-item">
          <a href="pages/contact us/contact.php" class="nav-link">
            <span class="nav-icon material-symbols-rounded">support_agent</span>
            <span class="nav-label">Contact Us</span>
          </a>
          <span class="nav-tooltip">Contact Us</span>
        </li>
        <li class="nav-item">
          <a href="pages/contact us/contact.php" class="nav-link">
            <span class="nav-icon material-symbols-rounded">cloud_upload</span>
            <span class="nav-label">Upload Note's</span>
          </a>
          <span class="nav-tooltip">Upload Note's</span>
        </li>
        <li class="nav-item">
          <a href="pages/account/account.php" class="nav-link">
            <span class="nav-icon material-symbols-rounded">manage_accounts</span>
            <span class="nav-label">Accounts</span>
          </a>
          <span class="nav-tooltip">Accounts</span>
        </li>

      </ul>

      <!-- Secondary bottom nav -->
      <ul class="nav-list secondary-nav">
                    <li class="nav-item">
                        <a href="../pages/account/account.php" class="nav-link">
                            <span class="nav-icon material-symbols-rounded">account_circle</span>
                            <span class="nav-label" id="names"><?php echo $name; ?></span>
                        </a>
                        <span class="nav-tooltip"><?php echo $name; ?></span>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo $login; ?>" class="nav-link" id="atag">
                            <span class="nav-icon material-symbols-rounded">logout</span>
                            <span class="nav-label" id="sign"><?php echo $log; ?></span>
                        </a>
                        <span class="nav-tooltip"><?php echo $log; ?></span>
                    </li>
                </ul>
    </nav>
  </aside>

  
  <button class="chatbot-toggler">
      <span class="material-symbols-rounded">mode_comment</span>
      <span class="material-symbols-outlined"><i class="fa-solid fa-xmark" style="margin-bottom: 3px;"></i></span>
    </button>
    <div class="chatbot" id="bot">
      <header>
        <h2>Chatbot</h2>
        <span class="close-btn material-symbols-outlined"><i class="fa-solid fa-xmark" style="margin-bottom: 3px;"></i></span>
      </header>
      <ul class="chatbox">
        <li class="chat incoming">
          <span class="material-symbols-outlined"><i class="fa-solid fa-robot"></i></span>
          <p>Hi there 👋<br />You can Ask Topic/notes/Mcqs</p>
        </li>
      </ul>
      <div class="chat-input">
        <textarea placeholder="Enter a message..." spellcheck="false" required></textarea>
        <span id="send-btn" class="material-symbols-rounded">send</span>
      </div>
    </div>
  <!-- code for top page  -->



<div id="top">
<div class="black_page animate__animated animate__fadeIn" style="display: none;">
    <center>

      <div class="ch_open  animate__animated animate__backInDown " style="display: block;" id="ch">
        <span class="close"><i class="fa-regular fa-circle-xmark" id="closex"></i></span>

        <h1 id="unit_name">View PDF</h1>
        <h3 id="ch_name1">CH 1: </h3>
        <h3 id="ch_name2"> CH 2: </h3>
        <span class="c_btn"><button class="ch_open_btn" v="1">CH 1 </button>
          <button class="ch_open_btn" v="2">CH 2 </button>

        </span>
      </div>

    </center>
  </div>

  <div class="top-page " >
    <div class="mode">
      <i class="ri-moon-fill" id="dark_mode"></i>

      <i class="ri-sun-line" id="light_mode" style="display: none;"></i>
    </div>
    <center>
      <div class="top-font-box">
        <h2 class="top-font">
          Get free, fast, and reliable notes to boost your learning today!
        </h2>
        <h4 class="top-font2">
          Study easier, faster & better.

        </h4>

       <a href="#math"> <button class="top-button"> Let's Begin &nbsp <i class="fa-solid fa-arrow-down"></i> </button></a>
      </div>
      

    </center>
  </div>

  <!-- code for top-below  -->
  <div class="top-next ">
    <a href="#math">
      <div class="top-next-box"><span class="nav-icon material-symbols-rounded ll">all_inclusive</span>
      <h4 class="top-next-h4">Maths</h4>
    </div>
  </a>
  <a href="#evs">
    <div class="top-next-box"><span class="nav-icon material-symbols-rounded ll">park</span>
    <h4 class="top-next-h4">EVS</h4>
  </div>
    </a>
    <a href="#bio" id="bb">
      <div class="top-next-box"><span class="nav-icon material-symbols-rounded ll">biotech</span>
        <h4 class="top-next-h4" >BIOLOGY</h4>
      </div>
    </a>

    <a href="#che" id="cc" style="display:none">
      <div class="top-next-box"><span class="nav-icon material-symbols-rounded ll">science</span>
        <h4 class="top-next-h4" >CHEMISTRY</h4>
      </div>
    </a>

    <a href="#phy">
      <div class="top-next-box"><i class="fa-solid fa-magnet" id="pp" style="font-size: 35px;"></i>
        <h4 class="top-next-h4">PHYSICS</h4>
      </div>
    </a>
    <a href="#eng">
      <div class="top-next-box"><span class="nav-icon material-symbols-rounded ll">format_bold</span>
        <h4 class="top-next-h4">ENGLISH</h4>
      </div>
    </a>
    <a href="#mp">
      <div class="top-next-box"><span class="nav-icon material-symbols-rounded ll">conveyor_belt</span>
        <h4 class="top-next-h4">MANUFACTURING</h4>
      </div>
    </a>
  </div>
  
</div>
  <!-- for moblie view  -->
  
  <div class="top-next-m">
    <div class="top-next-m-row">
      <a href="#math">
        <nav class="top-next-m-col">
          <h4><i class="fa-solid fa-infinity"></i> MATHS</h4>
        </nav>  
      </a>
      <a href="#evs">
        <nav class="top-next-m-col">
          <h4><i class="fa-solid fa-seedling"></i> EVS</h4>
        </nav>
      </a>
    </div>
    <div class="top-next-m-row">
      <a href="#bio" id="b">
        <nav class="top-next-m-col">
          <h4><i class="fa-solid fa-dna"></i> <span>BIOLOGY</span></h4>
        </nav>
      </a>
      <a href="#che" id="c" style="display:none">
        <nav class="top-next-m-col">
          <h4><i class="fa-solid fa-radiation"></i> <span>CHEMISTRY</span></h4>
        </nav>
      </a>
      <a href="#eng">
        <nav class="top-next-m-col">
          <h4><i class="fa-solid fa-e"></i> ENGLISH</h4>
        </nav>
      </a>
    </div>
    <div class="top-next-m-row">
      <a href="#phy">
        <nav class="top-next-m-col">
          <h4><i class="fa-solid fa-magnet"></i> PHYSICS</h4>
        </nav>
      </a>
      <a href="#mp">
        <nav class="top-next-m-col">
          <h4><i class="fa-solid fa-industry"></i> MP</h4>
        </nav>
      </a>
    </div>
    
  </div>
  
  
  <!-- code for topic select  -->
  
  <div class="topic-select">
    <h3><i class="fa-solid fa-magnifying-glass"></i> Select Topic</h3>
    <div class="select-div">
      <form action="" style="margin-left: 10px;">
        <select name="" id="first">
          <option value=""> Select Subject </option>
        </select>
        
        <select name="" id="second">
          <option value=""> Select Unit</option>
        </select>
        
        <select name="" id="third">
          <option value=""> Select Topic </option>
        </select>
      </form>
    </div>
    <div class="select-btn-div">
      <button id="pl" style="color: #333333;">Search <i class="fa-solid fa-magnifying-glass"></i></button>
      <button id="yt" style="color: #333333;">Watch <i class="fa-solid fa-play"></i></button>
    </div>
  </div>
  
  <!-- code for recently view  -->
  
  <div class="recent">
    
    <center>
      <h3><i class="fa-solid fa-rotate-right"></i> Recently View</h3>
      
      <div class="recent-div">
        <nav class="recent-name">
          <h3 id="recent-name">CH NAME</h3>
        </nav>
        <nav class="recent-view">
          <button id="recent">View Again <i class="fa-solid fa-rotate-right" id="re"></i></button>
        </nav>
        
      </div>
    </center>
  </div>
  
  
  <!-- code for search bar  -->
  <div class="xyz" id="xyz">
  <div class="search" id="search-div">
    <div class="InputContainer">
      <input placeholder="Search Notes.." id="search-input" class="input" name="text" type="text" autocomplete="off" />
      
      <label class="labelforsearch" for="input">
        <svg class="searchIcon" viewBox="0 0 512 512">
          <path
          d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z">
        </path>
      </svg>
    </label>
  </div>
  <div class="result-box">
    
    </div>
    <div class="search-note-parent" style="height: 250px;">
      <div class="note-body search-note animate__animated animate__fadeIn" style="width: 100%; display: none; "
      id="search-note">
      <div class="note-name" id="">
        <h4 id="search-ch-name">CH NAME</h4>
      </div>
      <div class="note-btn">
        <button class="note-btns" id="search-ch-btn">View <i class="fa-solid fa-arrow-right"></i></button>
        <button class="note-video" ch1_name="" ch2_name="" ch1_link="" ch2_link="">Watch <i
        class="fa-solid fa-play"></i></button>
        <!-- <a href="#"><button class="note-btns">Download <i class="fa-solid fa-down-long"></i></button></a> -->
      </div>
    </div>
  </div>
  
</div>

<!-- code for notes start here  -->

  <!-- for maths  -->
  <div class="note-main">
    <div class="first-div" id="math" >
      <h3><i class="fa-solid fa-infinity"></i> MATHS</h3>
      <div class="first-child">
        <nav class="first-logo"><i class="fa-solid fa-infinity"></i></nav>
        <div class="first-note-main" >
          <div class="note-syllabus">
            <h4><i class="fa-regular fa-note-sticky"></i> &nbsp SYLLABUS</h4> <a href="https://drive.google.com/file/d/1rBomRLLWWrfuhhvO7R3FsyGQ7i8I7khj/view?usp=drive_link"><button>View </button></a>
          </div>
          
          <div class="note-body"  data-aos="fade-up"data-aos-anchor-placement="bottom-bottom">
            <div class="note-name" id="mathu1">
              <h4>multivariable calculus</h4>
            </div>
            <div class="note-btn">
              <button class="note-btns" ch1_name="math multi_cal" ch2_name="null" ch1_link="xyz" ch2_link="">View <i
              class="fa-solid fa-arrow-right"></i></button>
              <button class="note-video" ch1_name="" ch2_name="" ch1_link="" ch2_link="">Watch <i
              class="fa-solid fa-play"></i></button>
              <a href="https://drive.google.com/drive/folders/1kRDZIIB6Emq0bFBXuXjQTkvxne6FIrx3?usp=drive_link"><button class="note-btns">Download <i class="fa-solid fa-down-long"></i></button></a>
            </div>
          </div>
          <div class="note-body" data-aos="fade-up"data-aos-anchor-placement="bottom-bottom">
            <div class="note-name" id="mathu1"   >
              <h4>first order ordinary diff eq</h4>
            </div>
            <div class="note-btn">
              <button class="note-btns" ch1_name="math unit_2" ch2_name="null" ch1_link="" ch2_link="">View <i
              class="fa-solid fa-arrow-right"></i></button>
              <button class="note-video" ch1_name="soon" ch2_name="" ch1_link="" ch2_link="">Watch <i
              class="fa-solid fa-play"></i></button>
              <a href="https://drive.google.com/drive/folders/1UcoLbHjaOVn7C-MKk9tReI7irAOgbKc6?usp=drive_link"><button class="note-btns">Download <i class="fa-solid fa-down-long"></i></button></a>
            </div>
          </div>
           <div class="note-body"  data-aos="fade-up"data-aos-anchor-placement="bottom-bottom">
            <div class="note-name" id="mathu1">
              <h4>ordinary diff eq higher order</h4>
            </div>
            <div class="note-btn">
              <button class="note-btns" ch1_name="math unit_3" ch2_name="null" ch1_link="soon" ch2_link="">View <i
                  class="fa-solid fa-arrow-right"></i></button>
              <button class="note-video" ch1_name="" ch2_name="" ch1_link="" ch2_link="">Watch <i
              class="fa-solid fa-play"></i></button>
              <a href="https://drive.google.com/drive/folders/160uiI7KVyTUkfvcQggOvgrDWzJnE0wkT?usp=drive_link"><button class="note-btns">Download <i class="fa-solid fa-down-long"></i></button></a>
            </div>
          </div>
           <div class="note-body"  data-aos="fade-up"data-aos-anchor-placement="bottom-bottom">
            <div class="note-name" id="mathu1">
              <h4>complex variable</h4>
            </div>
            <div class="note-btn">
              <button class="note-btns" ch1_name="math unit_4" ch2_name="null"
              ch1_link="https://online.updf.com/pdf/share?shareId=857730326527483905" ch2_link="nullx">View<i
                  class="fa-solid fa-arrow-right"></i></button>
              <button class="note-video" ch1_name="" ch2_name="" ch1_link="" ch2_link="">Watch <i
              class="fa-solid fa-play"></i></button>
              <a href="https://drive.google.com/drive/folders/1wpetugomP4VY5N-hE8tsFX_uJQoPS70F?usp=drive_link"><button class="note-btns">Download <i class="fa-solid fa-down-long"></i></button></a>
            </div>
          </div>

        </div>
      </div>
    </div>




    <!-- for physics  -->
    <div class="first-div" id="phy">
      <h3><i class="fa-solid fa-magnet"></i> PHYSICS</h3>
      <div class="first-child">
        <nav class="first-logo"><i class="fa-solid fa-magnet" style="color: red;"></i></nav>
        <div class="first-note-main">
          <div class="note-syllabus">
            <h4><i class="fa-regular fa-note-sticky"></i> &nbsp SYLLABUS</h4> <a href="https://drive.google.com/file/d/1dZlSDyhsmC0QQZxYqPEaGwJ4Yvua0KFJ/view?usp=drive_link"><button>View </button></a>
          </div>
           <div class="note-body"  data-aos="fade-up"data-aos-anchor-placement="bottom-bottom">
            <div class="note-name" id="mathu1">
              <h4>Electromagnetic waves & theory</h4>
            </div>
            <div class="note-btn">
              <button class="note-btns" ch1_name="phy Electromagnetic_waves" ch2_name="phy Electromagnetic_theory" ch1_link="https://online.updf.com/pdf/share?shareId=888560560927416321" ch2_link="soon">View <i
              class="fa-solid fa-arrow-right"></i></button>
              <button class="note-video" ch1_name="" ch2_name="" ch1_link="" ch2_link="">Watch <i
              class="fa-solid fa-play"></i></button>
              <a href="https://drive.google.com/drive/folders/1a2mukpnctHDaVFZ2ERAgfajQZk2cQ2Xz?usp=drive_link"><button class="note-btns">Download <i class="fa-solid fa-down-long"></i></button></a>
            </div>
          </div>
           <div class="note-body"  data-aos="fade-up"data-aos-anchor-placement="bottom-bottom">
            <div class="note-name" id="mathu1">
              <h4>classical mechanics & Central force</h4>
            </div>
            <div class="note-btn">
              <button class="note-btns" ch1_name="phy classical_mechines" ch2_name="phy Central_forces" ch1_link="" ch2_link="soon">View <i
                  class="fa-solid fa-arrow-right"></i></button>
              <button class="note-video" ch1_name="" ch2_name="" ch1_link="" ch2_link="">Watch <i
              class="fa-solid fa-play"></i></button>
              <a href="https://drive.google.com/drive/folders/1pLkuVIKguBoAFtth-_Oyy3vq-VUUFxcA?usp=drive_link"><button class="note-btns">Download <i class="fa-solid fa-down-long"></i></button></a>
            </div>
          </div>
           <div class="note-body"  data-aos="fade-up"data-aos-anchor-placement="bottom-bottom">
            <div class="note-name" id="mathu1">
              <h4>Waves nature & schrodinger</h4>
            </div>
            <div class="note-btn">
              <button class="note-btns" ch1_name="phy Wave_nature" ch2_name="phy Applications_schrodinger" ch1_link="soon" ch2_link="soon">View <i
              class="fa-solid fa-arrow-right"></i></button>
              <button class="note-video" ch1_name="" ch2_name="" ch1_link="" ch2_link="">Watch <i
              class="fa-solid fa-play"></i></button>
              <a href="https://drive.google.com/drive/folders/13UvMCn3fiBL8VU0SV2Kh32QLUOFALj0U?usp=drive_link"><button class="note-btns">Download <i class="fa-solid fa-down-long"></i></button></a>
            </div>
          </div>
           <div class="note-body"  data-aos="fade-up"data-aos-anchor-placement="bottom-bottom">
            <div class="note-name" id="mathu1">
              <h4>free electron & band theory</h4>
            </div>
            <div class="note-btn">
              <button class="note-btns" ch1_name="phy free_electron_theory" ch2_name="phy band_theory" ch1_link="soon" ch2_link="soon">View <i
              class="fa-solid fa-arrow-right"></i></button>
              <button class="note-video" ch1_name="" ch2_name="" ch1_link="" ch2_link="">Watch <i
              class="fa-solid fa-play"></i></button>
              <a href="https://drive.google.com/drive/folders/1mBcFkR2sLHBcH7yNUFr67bKAUhcoYGNQ?usp=drive_link"><button class="note-btns">Download <i class="fa-solid fa-down-long"></i></button></a>
            </div>
          </div>

        </div>
      </div>
    </div>
    
    <!-- for ENGLISH  -->
    <div class="first-div" id="eng">
      <h3><i class="fa-solid fa-e"></i> ENGLISH</h3>
      <div class="first-child">
        <nav class="first-logo"><i class="fa-solid fa-e"></i></nav>
        <div class="first-note-main">
          <div class="note-syllabus">
            <h4><i class="fa-regular fa-note-sticky"></i> &nbsp SYLLABUS</h4> <a href="https://drive.google.com/file/d/1ED_NPjscLX9jqpFZIiZGz0rEmekGIbD1/view?usp=drive_link"><button>View </button></a>
          </div>
           <div class="note-body"  data-aos="fade-up"data-aos-anchor-placement="bottom-bottom">
            <div class="note-name" id="mathu1">
              <h4>Vocabulary Building</h4>
            </div>
            <div class="note-btn">
              <button class="note-btns" ch1_name="eng" ch2_name="eng" ch1_link="" ch2_link="">View <i
              class="fa-solid fa-arrow-right"></i></button>
              <button class="note-video" ch1_name="" ch2_name="" ch1_link="" ch2_link="">Watch <i
              class="fa-solid fa-play"></i></button>
              <a href="https://drive.google.com/drive/folders/1ognxQYxEl944kdWwI11Js5Jus5OXr093?usp=drive_link"><button class="note-btns">Download <i class="fa-solid fa-down-long"></i></button></a>
            </div>
          </div>
           <div class="note-body"  data-aos="fade-up"data-aos-anchor-placement="bottom-bottom">
            <div class="note-name" id="mathu1">
              <h4>Basic Writing Skills</h4>
            </div>
            <div class="note-btn">
              <button class="note-btns" ch1_name="eng" ch2_name="" ch1_link="" ch2_link="">View <i
              class="fa-solid fa-arrow-right"></i></button>
              <button class="note-video" ch1_name="" ch2_name="" ch1_link="" ch2_link="">Watch <i
              class="fa-solid fa-play"></i></button>
              <a href="https://drive.google.com/drive/folders/1m5o5pwYYCFXGi5tQ7rCCz4p-7ASXYJiq?usp=drive_link"><button class="note-btns">Download <i class="fa-solid fa-down-long"></i></button></a>
            </div>
          </div>
           <div class="note-body"  data-aos="fade-up"data-aos-anchor-placement="bottom-bottom">
            <div class="note-name" id="mathu1">
              <h4>Identifying Common Errors in Writing</h4>
            </div>
            <div class="note-btn">
              <button class="note-btns" ch1_name="" ch2_name="" ch1_link="" ch2_link="">View <i
              class="fa-solid fa-arrow-right"></i></button>
              <button class="note-video" ch1_name="" ch2_name="" ch1_link="" ch2_link="">Watch <i
              class="fa-solid fa-play"></i></button>
              <a href="https://drive.google.com/drive/folders/1LZ45nm8C_IWJlkrpZ6iO_Dj4OEeKBP1Y?usp=drive_link"><button class="note-btns">Download <i class="fa-solid fa-down-long"></i></button></a>
            </div>
          </div>
           <div class="note-body"  data-aos="fade-up"data-aos-anchor-placement="bottom-bottom">
            <div class="note-name" id="mathu1">
              <h4>Speaking and listening skills</h4>
            </div>
            <div class="note-btn">
              <button class="note-btns" ch1_name="" ch2_name="" ch1_link="" ch2_link="">View <i
              class="fa-solid fa-arrow-right"></i></button>
              <button class="note-video" ch1_name="" ch2_name="" ch1_link="" ch2_link="">Watch <i
              class="fa-solid fa-play"></i></button>
              <a href="https://drive.google.com/drive/folders/1Ozb0hdVVRPWvHUjKddwg_ecJ-gKwmkfi?usp=drive_link"><button class="note-btns">Download <i class="fa-solid fa-down-long"></i></button></a>
            </div>
          </div>

        </div>
      </div>
    </div>
    
    <!-- for evs  -->
    <div class="first-div" id="evs">
      <h3><i class="fa-solid fa-seedling"></i> EVS</h3>
      <div class="first-child">
        <nav class="first-logo"><i class="fa-solid fa-tree " style="color: green;"></i></nav>
        <div class="first-note-main">
          <div class="note-syllabus">
            <h4><i class="fa-regular fa-note-sticky"></i> &nbsp SYLLABUS</h4> <a href="#"><button>View </button></a>
          </div>
           <div class="note-body"  data-aos="fade-up"data-aos-anchor-placement="bottom-bottom">
            <div class="note-name" id="mathu1">
              <h4>CH NAME</h4>
            </div>
            <div class="note-btn">
              <button class="note-btns" ch1_name="evs" ch2_name="evs" ch1_link="" ch2_link="">View <i
              class="fa-solid fa-arrow-right"></i></button>
              <button class="note-video" ch1_name="" ch2_name="" ch1_link="" ch2_link="">Watch <i
              class="fa-solid fa-play"></i></button>
              <a href="#"><button class="note-btns">Download <i class="fa-solid fa-down-long"></i></button></a>
            </div>
          </div>
           <div class="note-body"  data-aos="fade-up"data-aos-anchor-placement="bottom-bottom">
            <div class="note-name" id="mathu1">
              <h4>CH NAME</h4>
            </div>
            <div class="note-btn">
              <button class="note-btns" ch1_name="" ch2_name="" ch1_link="" ch2_link="">View <i
              class="fa-solid fa-arrow-right"></i></button>
              <button class="note-video" ch1_name="" ch2_name="" ch1_link="" ch2_link="">Watch <i
              class="fa-solid fa-play"></i></button>
              <a href="#"><button class="note-btns">Download <i class="fa-solid fa-down-long"></i></button></a>
            </div>
          </div>
           <div class="note-body"  data-aos="fade-up"data-aos-anchor-placement="bottom-bottom">
            <div class="note-name" id="mathu1">
              <h4>CH NAME</h4>
            </div>
            <div class="note-btn">
              <button class="note-btns" ch1_name="" ch2_name="" ch1_link="" ch2_link="">View <i
              class="fa-solid fa-arrow-right"></i></button>
              <button class="note-video" ch1_name="" ch2_name="" ch1_link="" ch2_link="">Watch <i
              class="fa-solid fa-play"></i></button>
              <a href="#"><button class="note-btns">Download <i class="fa-solid fa-down-long"></i></button></a>
            </div>
          </div>
           <div class="note-body"  data-aos="fade-up"data-aos-anchor-placement="bottom-bottom">
            <div class="note-name" id="mathu1">
              <h4>CH NAME</h4>
            </div>
            <div class="note-btn">
              <button class="note-btns" ch1_name="" ch2_name="" ch1_link="" ch2_link="">View <i
              class="fa-solid fa-arrow-right"></i></button>
              <button class="note-video" ch1_name="" ch2_name="" ch1_link="" ch2_link="">Watch <i
              class="fa-solid fa-play"></i></button>
              <a href="#"><button class="note-btns">Download <i class="fa-solid fa-down-long"></i></button></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <!-- for mp  -->
    <div class="first-div" id="mp">
      <h3 id="mpx"><i class="fa-solid fa-industry"></i> MANUFACTURING PROCESS</h3>
      <div class="first-child">
        <nav class="first-logo"><i class="fa-solid fa-industry" style="color: grey;"></i></nav>
        <div class="first-note-main">
          <div class="note-syllabus">
            <h4><i class="fa-regular fa-note-sticky"></i> &nbsp SYLLABUS</h4> <a href="https://drive.google.com/file/d/17SwlPJr7R0PcxKXG6fmJTX0szhkWztQ2/view?usp=drive_link"><button>View </button></a>
          </div>
           <div class="note-body"  data-aos="fade-up"data-aos-anchor-placement="bottom-bottom">
            <div class="note-name" id="mathu1">
              <h4>basic of MP</h4>
            </div>
            <div class="note-btn">
              <button class="note-btns" ch1_name="mp unit_1" ch2_name="null" ch1_link="" ch2_link="">View <i
                  class="fa-solid fa-arrow-right"></i></button>
              <button class="note-video" ch1_name="" ch2_name="" ch1_link="" ch2_link="">Watch <i
                  class="fa-solid fa-play"></i></button>
                  <a href="https://drive.google.com/drive/folders/1OuP3Wa6ZWnfNOqiWoATOBi9qta1nI9Hi?usp=drive_link"><button class="note-btns">Download <i class="fa-solid fa-down-long"></i></button></a>
                </div>
              </div>
               <div class="note-body"  data-aos="fade-up"data-aos-anchor-placement="bottom-bottom">
                <div class="note-name" id="mathu1">
                  <h4>foundry</h4>
            </div>
            <div class="note-btn">
              <button class="note-btns" ch1_name="mp foundry" ch2_name="null" ch1_link="soon" ch2_link="">View <i
              class="fa-solid fa-arrow-right"></i></button>
              <button class="note-video" ch1_name="" ch2_name="" ch1_link="" ch2_link="">Watch <i
              class="fa-solid fa-play"></i></button>
              <a href="https://drive.google.com/drive/folders/1RDy5_37ZpejQwB5nXjEG-uMgjT37XZSw?usp=drive_link"><button class="note-btns">Download <i class="fa-solid fa-down-long"></i></button></a>
            </div>
          </div>
           <div class="note-body"  data-aos="fade-up"data-aos-anchor-placement="bottom-bottom">
            <div class="note-name" id="mathu1">
              <h4>metal working</h4>
            </div>
            <div class="note-btn">
              <button class="note-btns" ch1_name="mp metal_working" ch2_name="null" ch1_link="soon" ch2_link="">View <i
                  class="fa-solid fa-arrow-right"></i></button>
              <button class="note-video" ch1_name="" ch2_name="" ch1_link="" ch2_link="">Watch <i
                  class="fa-solid fa-play"></i></button>
              <a href="https://drive.google.com/drive/folders/17dSfwey1HI9Ly2YfziwxIBIsccLxeQL1?usp=drive_link"><button class="note-btns">Download <i class="fa-solid fa-down-long"></i></button></a>
            </div>
          </div>
           <div class="note-body"  data-aos="fade-up"data-aos-anchor-placement="bottom-bottom">
            <div class="note-name" id="mathu1">
              <h4>introduction to machines tools</h4>
            </div>
            <div class="note-btn">
              <button class="note-btns" ch1_name="mp unit_4" ch2_name="null" ch1_link="soon" ch2_link="">View <i
                  class="fa-solid fa-arrow-right"></i></button>
                  <button class="note-video" ch1_name="" ch2_name="" ch1_link="" ch2_link="">Watch <i
                  class="fa-solid fa-play"></i></button>
              <a href="https://drive.google.com/drive/folders/1Vv8F0vzrvFxb5nExRDuK9EwTz5_izK3-?usp=drive_link"><button class="note-btns">Download <i class="fa-solid fa-down-long"></i></button></a>
            </div>
          </div>

        </div>
      </div>
    </div>
    
    
    <div class="first-div" id="bio">
      <h3><i class="fa-brands fa-pagelines"></i> BIOLOGY</h3>
      <div class="first-child">
        <nav class="first-logo"><i class="fa-brands fa-pagelines" style="color: limegreen;"></i></nav>
        <div class="first-note-main">
          <div class="note-syllabus">
            <h4><i class="fa-regular fa-note-sticky"></i> &nbsp SYLLABUS </h4>
            <a href="https://drive.google.com/file/d/1bnCDiQvNUp455WVHfeX3eO2U0mULR3XI/view?usp=drive_link">
              <button>View </button></a>
            </div>
            
             <div class="note-body"  data-aos="fade-up"data-aos-anchor-placement="bottom-bottom">
              <div class="note-name" id="mathu1">
                <h4>fundamental concepts in biology</h4>
              </div>
              <div class="note-btn">
                <button class="note-btns" ch1_name="bio fun_concepts_biology" ch2_name="null" ch1_link="" ch2_link="">View <i
                class="fa-solid fa-arrow-right"></i></button>
                <button class="note-video" ch1_name="" ch2_name="" ch1_link="" ch2_link="">Watch <i
                class="fa-solid fa-play"></i></button>
                <a href="https://drive.google.com/drive/folders/1WMZncvfGrLLzXVjEVIqWdheyRrH6leSQ?usp=drive_link"><button class="note-btns">Download <i class="fa-solid fa-down-long"></i></button></a>
              </div>
            </div>
             <div class="note-body"  data-aos="fade-up"data-aos-anchor-placement="bottom-bottom">
              <div class="note-name" id="mathu1">
                <h4>biomolecules & biological processes</h4>
              </div>
              <div class="note-btn">
                <button class="note-btns" ch1_name="bio biomol_&_bio_process" ch2_name="null" ch1_link="soon" ch2_link="">View <i
                class="fa-solid fa-arrow-right"></i></button>
                <button class="note-video" ch1_name="" ch2_name="" ch1_link="" ch2_link="">Watch <i
                class="fa-solid fa-play"></i></button>
                <a href="https://drive.google.com/drive/folders/1H7hNt5aP3wr-OfLgsYSVwO4HkAuCSQib?usp=drive_link"><button class="note-btns">Download <i class="fa-solid fa-down-long"></i></button></a>
              </div>
            </div>
             <div class="note-body"  data-aos="fade-up"data-aos-anchor-placement="bottom-bottom">
              <div class="note-name" id="mathu1">
              <h4>genetic material</h4>
            </div>
            <div class="note-btn">
              <button class="note-btns" ch1_name="bio genetic_material" ch2_name="null" ch1_link="soon" ch2_link="">View <i
              class="fa-solid fa-arrow-right"></i></button>
              <button class="note-video" ch1_name="" ch2_name="" ch1_link="" ch2_link="">Watch <i
              class="fa-solid fa-play"></i></button>
              <a href="https://drive.google.com/drive/folders/1c5Mc9I5DfwOrFOHJQv2MfVQz65oQnn1d?usp=drive_link"><button class="note-btns">Download <i class="fa-solid fa-down-long"></i></button></a>
            </div>
          </div>
           <div class="note-body"  data-aos="fade-up"data-aos-anchor-placement="bottom-bottom">
            <div class="note-name" id="mathu1">
              <h4>bio-instrument & bio applications</h4>
            </div>
            <div class="note-btn">
              <button class="note-btns" ch1_name="bio bio-inst_&_bio_applic" ch2_name="null" ch1_link="soon" ch2_link="">View <i
              class="fa-solid fa-arrow-right"></i></button>
              <button class="note-video" ch1_name="" ch2_name="" ch1_link="" ch2_link="">Watch <i
              class="fa-solid fa-play"></i></button>
              <a href="https://drive.google.com/drive/folders/17YSIBTFNObbX6Ho3NnOvHyHDVcnPgXyA?usp=drive_link"><button class="note-btns">Download <i class="fa-solid fa-down-long"></i></button></a>
            </div>
          </div>

        </div>
      </div>
    </div>
    
    
    <div class="first-div" id="che" style="display:none;">
      <h3><i class="fa-solid fa-flask"></i> CHEMISTRY</h3>
      <div class="first-child">
        <nav class="first-logo"><i class="fa-solid fa-flask" style="color:red;"></i></nav>
        <div class="first-note-main">
          <div class="note-syllabus">
            <h4><i class="fa-regular fa-note-sticky"></i> &nbsp SYLLABUS </h4>
            <a href="https://drive.google.com/file/d/1cR6k9b7HWHO_rVP_bb6X3iwt-8nHevz9/view?usp=drive_link">
              <button>View </button></a>
            </div>
            
             <div class="note-body"  data-aos="fade-up"data-aos-anchor-placement="bottom-bottom">
              <div class="note-name" id="mathu1">
                <h4>Atomic and molecular structure</h4>
              </div>
              <div class="note-btn">
                <button class="note-btns" ch1_name="che molecular_orbitals" ch2_name="null" ch1_link="" ch2_link="">View <i
                class="fa-solid fa-arrow-right"></i></button>
                <button class="note-video" ch1_name="" ch2_name="" ch1_link="" ch2_link="">Watch <i
                class="fa-solid fa-play"></i></button>
                <a href="https://drive.google.com/drive/folders/1e63pob5A7hzbi0tY1Le_VWH6oW2Jex1o?usp=drive_link"><button class="note-btns">Download <i class="fa-solid fa-down-long"></i></button></a>
              </div>
          </div>
           <div class="note-body"  data-aos="fade-up"data-aos-anchor-placement="bottom-bottom">
            <div class="note-name" id="mathu1">
              <h4>Periodic properties</h4>
            </div>
            <div class="note-btn">
              <button class="note-btns" ch1_name="che Periodic_properties" ch2_name="null" ch1_link="soon" ch2_link="">View <i
              class="fa-solid fa-arrow-right"></i></button>
              <button class="note-video" ch1_name="" ch2_name="" ch1_link="" ch2_link="">Watch <i
              class="fa-solid fa-play"></i></button>
              <a href="https://drive.google.com/drive/folders/1mgzsTMyO_WKtYx0SRSMl22BYXrvUgsEh?usp=drive_link"><button class="note-btns">Download <i class="fa-solid fa-down-long"></i></button></a>
            </div>
          </div>
           <div class="note-body"  data-aos="fade-up"data-aos-anchor-placement="bottom-bottom">
            <div class="note-name" id="mathu1">
              <h4>chemical equlibria</h4>
            </div>
            <div class="note-btn">
              <button class="note-btns" ch1_name="che thermodynamic" ch2_name="null" ch1_link="soon" ch2_link="">View <i
              class="fa-solid fa-arrow-right"></i></button>
              <button class="note-video" ch1_name="" ch2_name="" ch1_link="" ch2_link="">Watch <i
              class="fa-solid fa-play"></i></button>
              <a href="https://drive.google.com/drive/folders/17_rfy6IE1CzWfdXeXolYPqxEzUdrT2an?usp=drive_link"><button class="note-btns">Download <i class="fa-solid fa-down-long"></i></button></a>
            </div>
          </div>
           <div class="note-body"  data-aos="fade-up"data-aos-anchor-placement="bottom-bottom">
            <div class="note-name" id="mathu1">
              <h4>stereochemistry</h4>
            </div>
            <div class="note-btn">
              <button class="note-btns" ch1_name="che sterechemistry" ch2_name="null" ch1_link="" ch2_link="">View <i
              class="fa-solid fa-arrow-right"></i></button>
              <button class="note-video" ch1_name="" ch2_name="" ch1_link="" ch2_link="">Watch <i
                  class="fa-solid fa-play"></i></button>
                  <a href="https://drive.google.com/drive/folders/1mkHV9YIltLJHa4lZ7ywbIXl7c98cZjq-?usp=drive_link"><button class="note-btns">Download <i class="fa-solid fa-down-long"></i></button></a>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  
  
  <!-- cookie section  -->
  <div class="cookie-card" id="cookie-div">
    <span class="title">🍪 Cookie Notice</span>
    <p class="description">We use cookies to ensure that we give you the best experience on our website. <a
    href="https://drive.google.com/file/d/16dJbBBQIvKW34rbeADKY2vcctmb5hPeh/view?usp=sharing">Read cookies policies</a>. </p>
    <div class="actions">
      <button class="pref" id="decline">
        Decline
      </button>
      <button class="accept" id="cookie-btn">
        Accept
      </button>
    </div>
  </div>
  
</div>
  <!-- for footer  -->
  
  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="footer-col">
          <h4>Self Note's</h4>
          <h5 style="color: #ccc; font-size: 18px; font-weight: 100;">Hi, There Welcome to Self Note's Here You Can Find
            Free Notes</h5>
          </div>
          <div class="footer-col">
            <h4>Quick Links</h4>
            <ul>
              <li><a href="pages/pyq/pyqs.php">PYQ</a></li>
              <li><a href="pages/my notes/my_notes.php">My Notes</a></li>
              <li><a href="pages/my progress/my_progress.php">My Progress</a></li>
              <li><a href="#">Rate Us</a></li>
            </ul>
          </div>
          <div class="footer-col">
            <h4>Need Help</h4>
            <ul>
              <li><a href="pages/contact us/contact.php">Contact Us</a></li>
              <li><a href="pages/contact us/contact.php">Report An Problem</a></li>
              
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
            <h4>Total Page Visit</h4>
            <!-- <a href="https://www.hitwebcounter.com" target="_blank">
            <img src="https://hitwebcounter.com/counter/counter.php?page=18032761&style=0008&nbdigits=5&type=page&initCount=0" title="Counter Widget" Alt="Visit counter For Websites"   border="0" /></a>           </div> -->
          </div>

        </div>
  </footer>



  
  
  
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
     
  <script src="https://ajax.googleapis.com/ajax/libs/cesiumjs/1.78/Build/Cesium/Cesium.js"></script>
  <!-- Script -->
  <script src="js/main-page.js"></script>
  <script src="js/select-topic.js"></script>
  <script src="js/main-2.js"></script>

  <script src="js/nav-bar.js"></script>
  <script src="js/chat.js"></script>

  <script src="js/main-page.js"></script>
  <script src="js/main-3.js"></script>

  <script src="https://kit.fontawesome.com/7967a222d3.js" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>

  <script>
    function visitDifferentPage() {
    // Check if the user has visited the page before
    if (!localStorage.getItem('hasVisitedDifferentPage')) {
        // Open the specified website
        const websiteToOpen = 'main.html'; // Change to your desired URL
        window.location.href = websiteToOpen;
        // Set a flag in local storage to indicate the user has visited
       
    }
}

// Call the function when the page loads
document.addEventListener('DOMContentLoaded', function() {
    visitDifferentPage();
});
  </script>

</body>

</html>