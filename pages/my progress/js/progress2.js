


// var first = document.getElementById('b')
var fc = document.getElementById('main');

function darkk() {
    if (localStorage.getItem("dark_m") == "true") {

        // first.classList.add("dark-mode")
        fc.classList.add("dark-mode")

    }
    else if (localStorage.getItem("light_m") == "true") {

        // first.classList.remove("dark-mode")
        fc.classList.remove("dark-mode")
        // light()   
    }

}

darkk()