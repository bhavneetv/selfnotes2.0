

var first = document.getElementsByClassName("vv")
// var fc = document.getElementById("vc");

function darkk() {
    if (localStorage.getItem("dark_m") == "true") {
      
        first[0].classList.add("dark-mode")
    

        
    }
    else if (localStorage.getItem("light_m") == "true") {
       
        first[0].classList.remove("dark-mode")
        // fc.classList.remove("dark-mode")
        // light()   
    }
  
}

darkk()

