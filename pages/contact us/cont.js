// $(window).on('load', function () {
//     // alert()
//     $.ajax({
//         type: "POST",
//         url: "../php/user_name.php",
//         success: function (response) {
    
//         //   alert(response)
    
//           $("#names").html(response)
//           $("#sign").html("Log Out")
    
//           $("#atag").attr('href', '../php/log.php');
    
//           if (response == "Guest") {
//             // alert("n")
//             $("#sign").html("Login / Sign In")
//             $("#atag").attr('href', '../login-signup/login-sign.php');
    
//           }
    
//         }
    
//       })
    
//     });


    function check(){
     
      var l = document.getElementById("loader")
      if(l.style.display="flex"){
        setTimeout(() => {
          l.style.display="none"
          }, 2000);
      }
      
   }
   
   check()


  function s(){
    
    var l = document.getElementById("loader")
    l.style.display="flex"
    setTimeout(() => {
      l.style.display="none"
      }, 2000);
  }