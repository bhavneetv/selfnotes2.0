var back = document.getElementById('back')
var c = document.getElementById('close')

back.onclick = function () {
    document.getElementById('textt').style.display = "none"
    document.getElementById('b').style.display = "block"
}
c.onclick = function () {
    document.getElementById('blacks').style.display = "none"
}


var first = document.getElementById('b')
var fc = document.getElementById('textt');

function darkk() {
    if (localStorage.getItem("dark_m") == "true") {

        first.classList.add("dark-mode")
        fc.classList.add("dark-mode")

    }
    else if (localStorage.getItem("light_m") == "true") {

        first.classList.remove("dark-mode")
        fc.classList.remove("dark-mode")
        // light()   
    }

}

darkk()

var box = document.getElementsByClassName('go')

for (var l = 0; l <= box.length; l++) {

    box[l].onclick = function () {



        var parent = this.parentElement.parentElement
        var m = parent.getAttribute('note_name')
        var h = parent.getElementsByClassName('note-name')
        var h4 = h[0].getElementsByTagName('H4')
        var h44 = h4[0].innerHTML
       

        if (parent.getAttribute('locked') == "locked") {

             document.getElementById('content').innerHTML =''
            document.getElementById('blacks').style.display = "flex"
            document.getElementById('txt').innerHTML = "Set Password"
            var note_name = parent.getAttribute('note_name')
            // document.getElementById('name').80innerHTML = note_name;
            document.getElementById('name').innerHTML = h44;
            for_pass(m)

        }

        else {

                
            document.getElementById('content').innerHTML =''
            for_text(m)
            document.getElementById('loader').style.display = "block"

            
            var note_name = parent.getAttribute('note_name')

            document.getElementById('name').innerHTML = h44;

            document.getElementById('textt').style.display = "block"
            document.getElementById('b').style.display = "none"



            setTimeout(() => {
                document.getElementById('loader').style.display = "none";
            }, 2300);

        }


        var save = document.getElementById('save')
        save.onclick = function () {

            for_save(m);


        }
        var del = document.getElementById('del')
        del.onclick = function () {
            // alert()
            for_del(m);


        }
        var cal = document.getElementById('cal')
        cal.onclick = function () {
            $('#content').html("")


        }



    }


}


function yes() {
    document.getElementById('blacks').style.display = "none"
    document.getElementById('loader').style.display = "block"
    //  document.getElementById('name').innerHTML = note_name;
    document.getElementById('textt').style.display = "block"
    document.getElementById('b').style.display = "none"
    setTimeout(() => {
        document.getElementById('loader').style.display = "none";
    }, 2500);


    var ll = "note_1"
    for_text(ll)
}


function for_text(n) {


    $.ajax({

        type: "POST",
        // Our sample url to make request 
        url: 'php/for_note.php',

        data: {

            note_name: n
        },

        success: function (response) {

            var df = atob(response)
            // alert(df)
            $('#content').html(df);
            // var f = response


        },
    });
}



// for pass
function for_pass(pass) {
    var inp = $('#input').val()
    $.ajax({

        type: "POST",
        // Our sample url to make request 
        url: 'php/for_pass.php',

        data: {
            inputs: inp,
            note_pass: pass
        },

        success: function (response) {

            // alert(response)
            if (response == 'no') {
                alert("You can't change the password further")

                document.getElementById('txt').innerHTML = "Set Password"


                $('#sub').click(function (e) {
                    // prevent click action
                    e.preventDefault();
                    // your code here


                    for_passet()
                    return false;
                });

            }

            else {
                document.getElementById('txt').innerHTML = "Enter Password"


                $('#sub').click(function (e) {
                    // alert()
                    // prevent click action
                    e.preventDefault();
                    // your code here


                    for_passcheck()
                    return false;
                });
            }



            //  return f;

        },
    });
}


// fpor sabve
function for_save(name) {
    var inp = $('#content').html()
    var ss = btoa(inp)

    $.ajax({

        type: "POST",
        // Our sample url to make request 
        url: 'php/for_save.php',

        data: {
            inputs: ss,
            note_name: name
        },

        success: function (response) {
            // alert(response)
            if (response == 'yes') {
                alert("Saved !")
                $('#save').attr('disabled', 'disabled')
                $('#save').css('opacity', '60%')

                setTimeout(() => {
                    $('#save').removeAttr("disabled")
                    $('#save').css('opacity', '100%')

                }, 6000);

            }
            else {
                alert(response)
            }




        },
    });
}


// f0or del
function for_del(name) {


    $.ajax({

        type: "POST",
        // Our sample url to make request 
        url: 'php/for_del.php',

        data: {

            note_name: name
        },

        success: function (response) {
            // alert(response)
            if (response == 'yes') {
                $('#content').html("")
                alert("Deleted !")
                $('#del').attr('disabled', 'disabled')
                $('#del').css('opacity', '60%')

                setTimeout(() => {
                    $('#del').removeAttr("disabled")
                    $('#del').css('opacity', '100%')

                }, 6000);

            }
            else {
                alert(response)
            }




        },
    });
}


// for pass set
function for_passet() {
    var inp = $('#input').val()

    $.ajax({

        type: "POST",
        // Our sample url to make request 
        url: 'php/passet.php',

        data: {
            input: inp,

        },

        success: function (response) {

            alert(response)
            location.reload(true)

        },
    });
}



// for pass set
function for_passcheck() {
    var inp = $('#input').val()

    $.ajax({

        type: "POST",
        // Our sample url to make request 
        url: 'php/for_passcheck.php',

        data: {

            inputs: inp,

        },

        success: function (response) {
            // alert(response)
            if (response == 'yes') {
                yes()



            }

            else if(response == 'user'){
                window.location.href = "../login-signup/login-sign.php";
            }
            else {
                alert(response) 
            }




        },
    });
}


