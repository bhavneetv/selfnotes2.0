// alert()
let deadline = new Date("feb 25, 2025 09:30:00").getTime();

// To call defined fuction every second
let x = setInterval(function () {

    // Getting current time in required format
    let now = new Date().getTime();

    // Calculating the difference
    let t = deadline - now;

    // Getting value of days, hours, minutes, seconds
    let days = Math.floor(t / (1000 * 60 * 60 * 24));
    let hours = Math.floor(
        (t % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    let minutes = Math.floor(
        (t % (1000 * 60 * 60)) / (1000 * 60));
    let seconds = Math.floor(
        (t % (1000 * 60)) / 1000);

    // Output the remaining time
    document.getElementById("demo").innerHTML =
        days + "d " + hours + "h " +
        minutes + "m " + seconds + "s ";
//    console.log(
//         days + "d " + hours + "h " +
//         minutes + "m " + seconds + "s ");

    // Output for over time
    if (t < 0) {
        clearInterval(x);
        document.getElementById("demo")
            .innerHTML = "Best Of Luck";
    }
}, 1000);

$(window).on('load', function () {
    // alert()
    $.ajax({
        type: "POST",
        url: "../php/user_name.php",

        beforeSend: function () {
     
             
            $("#loader").addClass("none-b");

        },
        success: function (response) {
    
        //   alert(response)
        $("#loader").removeClass("none-b");
          $("#names").html(response)
          $("#sign").html("Log Out")
    
          $("#atag").attr('href', '../php/log.php');
    
          if (response == "Guest") {
            window.location.href = '../login-signup/login-sign.php';
            // alert("n")
            $("#sign").html("Login / Sign In")
            $("#atag").attr('href', '../login-signup/login-sign.php');
    
          }
    
        }
    
      })
    


      
    })
    
    
    ;

    function bi(){
        document.getElementById('pc').style.display='none'
        document.getElementById('sc').style.display='none'
        document.getElementById('pb').style.display='block'
        document.getElementById('sb').style.display='block'
       
        
        
    }
    function ch(){
        
        document.getElementById('sc').style.display='block'
        document.getElementById('pc').style.display='block'
        document.getElementById('pb').style.display='none'
        document.getElementById('sb').style.display='none'
        
    }
    


    function for_sub() {
   


        $.ajax({
    
            type: "POST",
            // Our sample url to make request 
            url: '../../php/sub.php',
    
    
    
            success: function (response) {
                // alert(response)
                if (response == 'biology') {
                    bi()
    
    
    
                }
                else if(response == 'chemistry'){
    
                   ch()
                }
                else if (response = ''){

                    window.location.href = '../login-signup/login-sign.php';
                }
                else{

                    
                    bi()
                }
    
    
    
    
            },
        });
    }
    // alert()
    for_sub()


