var eye_o = document.getElementById("eye-open")
var eye_c = document.getElementById("eye-close")
var pass = document.getElementById("pass-i")
var del = document.getElementById("del")
var inpz = document.getElementById("pass-i")
var del_b = document.getElementById("del-box")
var del_c = document.getElementById("del-box-c")

del.onclick=function(){
    del_b.style.display="flex"
}
del_c.onclick=function(){
    
    del_b.style.display="none"
}


eye_o.onclick=function(){
    eye_o.style.display="none"
    eye_c.style.display="block"
    pass.setAttribute("type" , "text")
}
eye_c.onclick=function(){
    eye_c.style.display="none"
    eye_o.style.display="block"
    pass.setAttribute("type" , "password")
}





var b = document.getElementsByClassName("input-cont")
var edit = document.getElementById("edit-btn")
var save = document.getElementById("save-btn")
var inp = document.getElementsByClassName("inpu")

    edit.onclick=function(){
        inpz.value="";
        alert("You can only change name or password ")
        for(var p = 0 ; p<=inp.length ; p++){
            inp[p].removeAttribute("disabled");
            // this.innerHTML="Done"
            // save.setAttribute("disabled" , "disabled")
            save.style.display="block"
            this.style.display="none"
        }
       

 
     
        
        
        
    }
    



  
    function check(){
        
        var l = document.getElementById("loader")
        if(l.style.display="block"){
            setTimeout(() => {
               l.style.display="none"
            }, 1300);
        }
     
     }
     
    check()











var first = document.getElementsByClassName("first-div")

function darkk() {
    if (localStorage.getItem("dark_m") == "true") {
       for(var l = 0 ; l<=first.length ; l++){
        first[l].classList.add("dark-mode")
       }
        
    }
    else if (localStorage.getItem("light_m") == "true") {
        for(var l = 0 ; l<=first.length ; l++){
            first[l].classList.remove("dark-mode")
           }
        // light()   
    }
  
}

darkk()


