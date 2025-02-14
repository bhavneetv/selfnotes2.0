


function s() {

  var l = document.getElementById("loader")
  l.style.display = "flex"
  setTimeout(() => {
    l.style.display = "none"
  }, 2700);
}


s()

// window.onload=function () {
//   localStorage.setItem('progress' , '')
//   }

var btn = document.getElementById('read-btn')

btn.onclick = function () {
  var n = localStorage.getItem('ch_name')
  n = btoa(n)
  // alert(n)
  // console.log(n)

  to_uptade_progress(n)
}


function to_uptade_progress(name) {

  $.ajax({

    type: "POST",
    url: 'read.php',
    data: {

      ch_name: name




    },

    success: function (response) {
      // alert(response)

      if (response == 'yes') {
        alert("Marked as read")

        // location.reload(true)
        for_check()
        // for_check_btn()



      }
      else {
        btn.setAttribute('disabled', 'disabled')
        btn.style.opacity = '60%'
      }




    },
  });
}


function nul() {

  var n = localStorage.getItem('chapter_link')
  if(n == 'soon'){
    alert("Coming soon")
    btn.setAttribute('disabled', 'disabled')
        btn.style.opacity = '60%'

        setTimeout(() => {
          window.open('../../index.php' , '_parent')
        }, 4000);

  }


}
nul()

function for_check() {
  $.ajax({

    type: "POST",
    // Our sample url to make request 
    url: 'progress_check.php',
    success: function (response) {
      var mx = response
      
      // alert(mx)
      console.log(mx)
      if (mx != 'Error' || mx != 'Guest') {
        // localStorage.setItem('progress', mx)
      
        for_check_btn(mx)
      }
      else if (mx == 'Guest') {

        btn.setAttribute('disabled', 'disabled')
        btn.style.opacity = '60%'
      }
      else {
        btn.setAttribute('disabled', 'disabled')
        btn.style.opacity = '60%'

      }

      // alert(mx)



    },
  });
}

for_check()

function for_check_btn(re) {
  // var notes = localStorage.getItem('progress')

  var ch = localStorage.getItem('ch_name')

  if (re == null || re == '') {
    for_check()
  }
  else {
    var notes = re


    const a = notes.split(",");
    // alert(a.length)

    for (var l = 0; l <= a.length -1; l++) {
      var note_arr = a[l]
      note_arr = atob(note_arr)
      if (note_arr.match(ch)) {
        btn.setAttribute('disabled', 'disabled')
        btn.style.opacity = '60%'
        // console.log('yes')
        // break;

      }
      else {
        // console.log('no')
      }
    }
  }

}

// for_check_btn()


