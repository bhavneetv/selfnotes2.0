
// for scroll up 

let mybutton = document.getElementById("slide-up");

window.onscroll = function () { scrollFunction() };

function scrollFunction() {
    if (document.body.scrollTop > 570 || document.documentElement.scrollTop > 570) {
        mybutton.style.right = "40px";
    } else {
        mybutton.style.right = "-40px";
    }
}

mybutton.onclick = function () {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}





// for ch open 

var close = document.querySelector("#closex")
// var closee = document.querySelector("#closexx")
var black = document.querySelector(".black_page")
// var pdf_in = document.querySelector("#pdf")

var u_txt = document.querySelector("#unit_name")
var ch_txt1 = document.querySelector("#ch_name1")
var ch_txt2 = document.querySelector("#ch_name2")
var ch = document.querySelector("#ch")
close.onclick = function () {
    black.style.display = "none"
}
var ch_open_btn = document.getElementsByClassName("ch_open_btn")

var btn = document.getElementsByClassName('note-btns');
// code for chapter name find througn btn 
for (var i = 0; i < btn.length; i++) {
    btn[i].onclick = function () {


        // var unit_parent = this.parentElement.parentElement;
        // alert(unit_parent)
        // var unit_name = unit_parent.querySelector("h1").innerHTML
        var ch1_t = this.getAttribute("ch1_name")
        var ch2_t = this.getAttribute("ch2_name")
        // alert(ch2)
        u_txt.innerHTML = '<i class="fa-solid fa-file-pdf" style="color:grey;"></i>' + " &nbsp View PDF"




        const a = ch1_t.split(" ");
        const b = ch2_t.split(" ");
       
          var   ch11 = a[a.length-1]
        var ch1f = ch11      

       var  ch1 = ch1f.replace('_' , ' ')
       
       
       
       
       
       var   ch22 = b[b.length-1]
       var ch2f = ch22      
       var  ch2 = ch2f.replace('_' , ' ')

        
        
        // alert(ch2)
        ch_txt1.innerHTML = "Ch 1: " + ch1
        ch_txt2.innerHTML = "Ch 2: " + ch2


        var ch2_link = this.getAttribute("ch2_link")
        var ch1_link = this.getAttribute("ch1_link")
        // alert(ch2_link)

        if (ch2_t == "null") {
            // var ch_ll = this.getAttribute(ch1_link)
            // alert(ch1_link)
            localStorage.setItem("chapter_link", ch1_link)
            localStorage.setItem("ch_name", ch1_t)

            // black.style.display="block"
            window.open("pages/pdf-notes/pdf-notes.php", "_parent")
            // ch.style.display="none"
        }
        else if (ch2_t != null && ch2_link != null) {

            black.style.display = "block"
            // ch.style.display = "block"
            var ch_open_btn = document.getElementsByClassName("ch_open_btn")
            // alert(ch_open_btn.length)
            for (var l = 0; l < ch_open_btn.length; l++) {
                ch_open_btn[l].onclick = function () {
                    var v = this.getAttribute("v")
                    // alert(v)
                    if (v == "1") {
                        // this.innerHTML = "tt"
                        localStorage.setItem("chapter_link", ch1_link)
                        localStorage.setItem("ch_name", ch1_t)

                    }
                    else if (v == "2") {

                        localStorage.setItem("chapter_link", ch2_link)
                        localStorage.setItem("ch_name", ch2_t)
                    }
                    // window.open("pages/pdf note/index.html", "_parent")
                    window.open("pages/pdf-notes/pdf-notes.php", "_parent")

                }
            }
        }
    }
}




// for video btn 
var btn = document.getElementsByClassName('note-video');
// code for chapter name find througn btn 
for (var i = 0; i < btn.length; i++) {
    btn[i].onclick = function () {
        u_txt.innerHTML = '<i class="fa-regular fa-circle-play" style="color:red;"></i>' + " &nbsp Watch Video"
        var par_btn = this.parentElement;
        //    alert(par_btn.innerHTML)
        var b = par_btn.getElementsByClassName('note-btns')[0]



        var ch2_tt = b.getAttribute("ch2_name")
        var ch1_tt= b.getAttribute("ch1_name")


        const aa = ch1_tt.split(" ");
        const bb = ch2_tt.split(" ");
       
          var   ch11 = aa[aa.length-1]
        var ch1ff = ch11      

       var  ch1 = ch1ff.replace('_' , ' ')
       
       
       
       
       
       var   ch22 = bb[bb.length-1]
       var ch2f = ch22      
       var  ch2 = ch2f.replace('_' , ' ')
        // u_txt.innerHTML = unit_name
        // alert(ch1)
        ch_txt1.innerHTML = "Ch 1: " + ch1
        ch_txt2.innerHTML = "Ch 2: " + ch2




        if (ch2 == "null") {
         
            window.open("https://www.youtube.com/results?search_query=" + ch1, "_parent")
        }
        else if (ch2 != null) {
            black.style.display = "block"

            // ch.style.display = "block"
            var ch_open_btn = document.getElementsByClassName("ch_open_btn")

            for (var l = 0; l <= ch_open_btn.length; l++) {
                ch_open_btn[l].onclick = function () {
                    var v = this.getAttribute("v")
                    // alert(v)
                    // alert(ch1)
                    if (v == "1") {
                        // this.innerHTML = "tt"
                        window.open("https://www.youtube.com/results?search_query=" + ch1, "_parent")

                    }
                    else if (v == "2") {

                        window.open("https://www.youtube.com/results?search_query=" + ch2, "_parent")
                    }
                    // window.open("pages/pdf note/index.html", "_parent")

                }
            }
        }
    }
}

var search_div = document.getElementsByClassName("search")
var top_p = document.getElementsByClassName("top-page")
var next_p = document.getElementsByClassName("top-next")
var ch_m = document.getElementsByClassName("ch_open")
var pl = search_div[0]
var tp = top_p[0]
var np = next_p[0]
var cp = ch_m[0]
// for dark mode or light mode 
var note_div = document.getElementById('xyz')
var note_divv = document.getElementById('top')
var note_divvv = document.getElementById('bot')
var dark_mode = document.getElementById("dark_mode")
var light_mode = document.getElementById("light_mode")
// alert(note_div[1].innerHTML)
dark_mode.onclick = function () {
    light_mode.style.display = "block"
    dark_mode.style.display = "none"
    // darkk()
    if (localStorage.getItem("dark_m") == null) {
        localStorage.setItem("dark_m", "true")
        localStorage.removeItem("light_m")
        dark()
    }
    else {
        // localStorage.removeItem("light_m")
        // darkk()
    }
}

light_mode.onclick = function () {
    // alert()
    light_mode.style.display = "none"
    dark_mode.style.display = "block"
    if (localStorage.getItem("light_m") == null) {
        localStorage.setItem("light_m", "true")
        localStorage.removeItem("dark_m")
        light()
    }
    else {
        // localStorage.removeItem("dark_m")
        light()

        // darkk()
    }
}

function dark() {
  
    note_div.classList.add('dark-mode')
    note_divv.classList.add('dark-mode')
    note_divvv.classList.add('dark-mode')
    // search_div.classList.add("dark-mode")
}
function light() {
    note_div.classList.remove('dark-mode')
    note_divv.classList.remove('dark-mode')
    note_divvv.classList.remove('dark-mode')
   

}
// alert()

function darkk() {
    if (localStorage.getItem("dark_m") == "true") {
        light_mode.style.display = "block"
        dark_mode.style.display = "none"
        dark()
    }
    else if (localStorage.getItem("light_m") == "true") {
        light_mode.style.display = "none"
        dark_mode.style.display = "block"
        // light()   
    }
    else {
        localStorage.setItem("light_m", "true")

    }
}
darkk()


// alert()
