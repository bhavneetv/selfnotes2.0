// for cookie 
// alert()
var cooki_div = document.getElementById("cookie-div")
var cooki_btn = document.getElementById("cookie-btn")
var dec = document.getElementById("decline")
dec.onclick = function () {
    cooki_div.style.display = "none"
}

function coo() {
    // alert()
    if (localStorage.getItem("cookie") == null) {
        localStorage.setItem("cookie", "false")



    }
    cooki_btn.onclick = function () {
        localStorage.setItem("cookie", "true")
        cooki_div.style.display = "none"

    }

    if (localStorage.getItem("cookie") == "false") {
        setTimeout(() => {
            cooki_div.style.display = "block"
        }, 9000);
    }
    else {
        cooki_div.style.display = "none"
    }



}
coo()

// search 

var search_chn = document.getElementById("search-ch-name")
var search_chb = document.getElementById("search-ch-btn")
var inputBox = document.getElementById("search-input")
var search_div = document.getElementById("search-note")
var note_b = document.getElementsByClassName("note-body")

// alert(note_b[1].innerHTML)
inputBox.oninput = function () {
    for (var k = 0; k <= note_b.length; k++) {
        var note_p = note_b[k]
        var note_c = note_p.getElementsByClassName("note-name")
        var note_btn = note_p.getElementsByClassName("note-btn")



        var note_btnss = note_btn[0].getElementsByClassName("note-btns")
        var note_ch1 = note_btnss[0].getAttribute("ch1_name")
        var note_ch2 = note_btnss[0].getAttribute("ch2_name")
        var note_ch1l = note_btnss[0].getAttribute("ch1_link")
        var note_ch2l = note_btnss[0].getAttribute("ch2_link")

        var note_nm = note_c[0].getElementsByTagName("H4")
        var note_name = note_nm[0].innerHTML
        //    console.log(note_ch2)
        var note_name_upp = note_name.toUpperCase()
        var input_v = inputBox.value
        var input_v_upp = input_v.toUpperCase()
        // var k = /note_name_upp/g
        // console.log(input_v_upp)
        if (input_v_upp.match(note_name_upp)) {
            search_div.style.display = "block"
            // console.log("yes")
            search_chn.innerHTML = note_name_upp
            search_chb.setAttribute("ch1_name", note_ch1)
            search_chb.setAttribute("ch2_name", note_ch2)
            search_chb.setAttribute("ch1_link", note_ch1l)
            search_chb.setAttribute("ch2_link", note_ch2l)
            break;



        }
        else {
            search_div.style.display = "none"
            // console.log("no")

        }


    }
}

$(window).on('load', function () {
    // alert()
    $("#loader").addClass("none-b");
    // $("#loader").removeClass("none-b");


})

// alert()



// for search

let availableKeywords = [
    'multivariable calculus',
    'first order ordinary diff eq',
    'ordinary diff eq higher order',
    'complex variable',
    'Electromagnetic waves & theory',
    'classical mechanics & Central force',
    'Waves nature & schrodinger',
    'free electron & band theory',
    'basic of MP',
    'foundry',
    'metal working',
    'introduction to machines tools',
    'Atomic and molecular structure',
    'Periodic properties',
    'chemical equlibria',
    'stereochemistry',
    'fundamental concepts in biology',
    'biomolecules and biological processes',
    'genetic material',
    'bio-instrumentation and application '
];

const resultbox = document.querySelector('.result-box');
// const inputBox = document.getElementById('search-input');

inputBox.onkeyup = function () {
    let result = [];
    let input = inputBox.value;
    if (input.length) {
        result = availableKeywords.filter((keyword) => {
            return keyword.toLowerCase().includes(input.toLowerCase());
        });
        // console.log(result);
    }
    display(result);

    if (!result.length) {
        resultbox.innerHTML = '';
    }
}

function display(result) {
    const content = result.map((list) => {
        return "<li onclick=selectInput(this)>" + list + "</li>";

    });

    resultbox.innerHTML = "<ul>" + content.join('') + "</ul>"
}
function selectInput(list) {
    inputBox.value = list.innerHTML;
    resultbox.innerHTML = '';
}



// for recently 

var recent_n = document.getElementById("recent-name")
var recent_b = document.getElementById("recent")

function recent_check() {
    if (localStorage.getItem("ch_name") == null) {
        recent_n.innerHTML = "Not Viewes"
        recent_b.onclick = function () {
            alert("Notes Not Viewed Yet !!")
        }
    }
    else {





        var d = localStorage.getItem("ch_name").toUpperCase()
        const aa = d.split(" ");
        var ch11 = aa[aa.length - 1]
        var ch1ff = ch11
        var ch1 = ch1ff.replace('_', ' ')
        recent_n.innerHTML = ch1
        


        recent_b.onclick = function () {
            window.open("pages/pdf-notes/pdf-notes.php", "_parent")

        }
    }
}
recent_check()

