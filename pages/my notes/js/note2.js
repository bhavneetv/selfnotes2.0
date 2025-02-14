
var edits = document.getElementsByClassName('edit')

for(var e = 0 ; e<=edits.length ; e++){


    edits[e].onclick=function(){

        var parent = this.parentElement.parentElement
        var m = parent.getAttribute('note_name')
        // alert(m)
          
            document.getElementById('blacks').style.display="flex"
            document.getElementById('sub').style.display="none"
            document.getElementById('sub2').style.display="block"

            document.getElementById('txt').innerHTML = "Edit Name"




            var saves = document.getElementById('sub2')
            saves.onclick = function () {
                // alert()

                event.preventDefault();
                var cv = m+'_name'
                var vb = document.getElementById('input').value
                var len = vb.length
            
                    if(len <= 13){

                        for_edit(cv);
                    }
                
                    else{
                        alert("Too long name")
                    }

                

    
                
    
            }


    }



    






   
}



function for_edit(name) {
    var inp = $('#input').val()


    $.ajax({

        type: "POST",
        // Our sample url to make request 
        url: 'php/for_edit.php',

        data: {

            inputs: inp,
            note_name : name

        },

        success: function (response) {
            // alert(response)
            if (response == 'yes') {
                // yes()
                location.reload(true)



            }
            else {
                alert(response)
            }




        },
    });
}