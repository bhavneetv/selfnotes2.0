<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Self Note's | PDF</title>
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
    
    <link rel="stylesheet" href="css/pdf.css">
  </head>
</head>
<body>
  <div class="loader-black" id="loader">
    <dotlottie-player  id="l" src="https://lottie.host/5f252b2b-b8cf-4229-99b6-8e65d923b786/IEQkjSWjyO.lottie" background="transparent" speed="3" style="width: 100px; height: 100px" loop autoplay></dotlottie-player>
  </div>

    <div class="cookie-card report animate__animated animate__fadeIn" id="rep" >
        <span class="title"><i class="fa-solid fa-triangle-exclamation" style="color: red;"></i> Report </span>
        <p class="description" >
            <form action="https://api.web3forms.com/submit" method="POST">
              <input type="hidden" name="access_key" value="7e4074bc-1245-4410-bfd5-87f8d050dffd">
                <input type="radio" name="page is missing" id="one">
                <label for="one">Page is Missing</label>
                <br>
                <input type="radio" name="Image Quality" id="two">
                <label for="two">Image Quality is bad</label>
                <br>
                <input type="radio" name="bad Handwritting" id="three">
                <label for="three">Bad Handwritting</label>
                <br>
                <input type="radio" name="Link is Broken" id="four">
                <label for="four">Link is Broken</label>
                <br>
                <br>   
                <input type="text" name="Ch_name" id="ch_name">

            
        </p>
        <div class="actions">
            <button class="pref" id="rep-c" type="button">
                close
            </button>
            <button class="accept" type="submit" onclick="s()">Send</button>
        </form>     
        </div>
    </div>
<div class="pdf">
    <div class="pdf-btn">
        <button id="read-btn"><i class="fa-solid fa-check"></i> Mark As Read </button>
        <button id="rep-b"> <i class="fa-solid fa-bug"></i> Report</button>
        <button id="close-b"> <i class="fa-regular fa-circle-xmark" style="color: red;"></i> Close </button>
    </div>
    <div class="iframe-div">
        <iframe src="" frameborder="0" id="iframe"></iframe>
    </div>
</div>

<script src="https://kit.fontawesome.com/7967a222d3.js" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>

  <script>
    var inp = document.getElementById("ch_name")
    var rep = document.getElementById("rep")
    var col_b = document.getElementById("close-b")
    var rep_b = document.getElementById("rep-b")
    var i_frame = document.getElementById("iframe")
    var rep_c = document.getElementById("rep-c")
    inp.value = localStorage.getItem("ch_name")
    document.title = "Self Note's | "+localStorage.getItem("ch_name")

    rep_b.onclick=function(){
        rep.style.display="block"
    }
    rep_c.onclick=function(){
        rep.style.display="none"
    }
    i_frame.src=localStorage.getItem("chapter_link")

col_b.onclick=function(){
    history.back()
}


  </script>
  <script src="pdf-note.js"></script>
</body>
</html>