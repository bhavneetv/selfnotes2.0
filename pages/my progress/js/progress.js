
function s() {

  var l = document.getElementById("loader")
  l.style.display = "flex"
  setTimeout(() => {
    l.style.display = "none"
  }, 2700);
}


s()


function bar(per) {
  var perc = per;
  // perc = atob(perc)
  // console.log(perc)
  let aa = perc.split(",");

  let  a = []
  for (var i = 0; i < aa.length; i++) {
    var text = aa[i]
    text = atob(text)
    // console.log(text)
    a.push(text)
  }
  // a = atob(a)
  // console.log(a)
  var note_no = a.length
  // alert(note_no)
  var note_nu = (note_no / 32) * 100
  // alert(note_nu)


  var evs = []
  var mp = []
  var eng = []
  var math = []
  var bio = []
  var che = []
  var phy = []


  for (var n = 0; n <= a.length - 1; n++) {

    var notes = a[n]
    // alert(notes)

    var for_evs = notes.match('evs')
    evs.push(for_evs)


    var for_mp = notes.match('mp')
    mp.push(for_mp)

    var for_eng = notes.match('eng')
    eng.push(for_eng)

    var for_math = notes.match('math')
    math.push(for_math)

    var for_bio = notes.match('bio')
    bio.push(for_bio)

    var for_che = notes.match('che')
    che.push(for_che)

    var for_phy = notes.match('phy')
    phy.push(for_phy)

  }

  let a1 = evs.filter(function (e) {
    return e;
  });
  let a2 = mp.filter(function (e) {
    return e;
  });
  let a3 = phy.filter(function (e) {
    return e;
  });
  let a4 = bio.filter(function (e) {
    return e;
  });
  let a5 = math.filter(function (e) {
    return e;
  });
  let a6 = eng.filter(function (e) {
    return e;
  });
  let a7 = che.filter(function (e) {
    return e;
  });

  // alert(evs)
  // console.log("Updated Array: ", a1);
  // console.log("Updated Array: ", a2);
  // console.log("Updated Array: ", a3);
  // console.log("Updated Array: ", a4);
  // console.log("Updated Array: ", a5);
  // console.log("Updated Array: ", a6);
  // console.log("Updated Array: ", a7);

  for_All_s(a1, a2, a3, a5, a6)


  for_sub(a4, a7)











    var note_After_round = Math.round(note_nu)
    // alert(note_After_round)






  let progressBar = document.querySelector(".circular-progress");
  let valueContainer = document.querySelector(".value-container");

  let progressValue = 0;
  let progressEndValue = note_After_round;
  let speed = 40;

  let progress = setInterval(() => {
    progressValue++;
    valueContainer.textContent = `${progressValue}%`;
    progressBar.style.background = `conic-gradient(
      #4d5bf9 ${progressValue * 3.6}deg,
      #cadcff ${progressValue * 3.6}deg
      )`;
    if (progressValue == progressEndValue) {
      clearInterval(progress);
    }
  }, speed);



}







function for_check() {
  $.ajax({

    type: "POST",
    // Our sample url to make request 
    url: 'check.php',
    success: function (response) {
      var mx = response
      // alert(mx)
      // console.log(mx)
      
      if (mx == 'Error') {

        alert('Error')

      }
      else if (mx == 'Guest') {
        alert('Guest')
      }
      else if (mx == ' ') {
        mx = 0
        bar(mx)
      }


      else if(mx != ''){
        bar(mx)
      }

    },
  });
}

function for_reset() {
  $.ajax({

    type: "POST",
    // Our sample url to make request 
    url: 'reset.php',
    success: function (response) {
      var mx = response
       if(mx == 'yes'){
        alert('Data Reset !')
        location.reload(true)
       }
       else{
        alert(response)
       }
      
    

    },
  });
}


var re = document.getElementById('reset')
re.onclick=function(){
  for_reset()
}

function bio(b) {

  document.getElementById('b-per').innerHTML = b + '%';
  var r = document.querySelector(':root');
  r.style.setProperty('--bio', b + '%');
  // document.getElementById('b-per').innerHTML='Biology'
}
function c(c) {



  
  document.getElementById('b-per').innerHTML = c + '%';
  var r = document.querySelector(':root');
  r.style.setProperty('--bio', c + '%');
  // document.getElementById('b-per').innerHTML='Biology'
}




function for_sub(bioo, chee) {
  $.ajax({

    type: "POST",
    // Our sample url to make request 
    url: '../../php/sub.php',
    success: function (response) {
      var mx = response
      // alert(mx)
      // console.log(mx)

      if (mx == 'biology') {
    
        var df = bioo.length
        var cc = (df / 4) * 100
        var ccc = Math.round(cc)
        


        bio(ccc)

      }

      else if (mx == 'chemistry') {
        var df = chee.length
        var cc = (df / 4) * 100
        var ccc = Math.round(cc)
        // alert(cc)
        c(ccc)
      }





    },
  });
}


function for_sub2() {
  $.ajax({

    type: "POST",
    // Our sample url to make request 
    url: '../../php/sub.php',
    success: function (response) {
      var mx = response
    
      // alert("fdf" + mx)

      document.getElementById('b').innerHTML = response
    
    },
  });
}
for_sub2()

for_check()



function for_All_s(ev, m, p, ma, e) {

  var r = document.querySelector(':root');


  var pp = p.length
  var phyy = (pp / 8) * 100
  var phy = Math.round(phyy)

  var evv = ev.length
  var evss = (evv / 8) * 100
  var evs = Math.round(evss)

  var ee = e.length
  var engg = (ee / 4) * 100
  var eng = Math.round(engg)

  var mm = ma.length
  // alert(mm)
  var maths = (mm / 4) * 100
  var math = Math.round(maths)

  var maa = m.length
  var mpp = (maa / 4) * 100
  var mp = Math.round(mpp)


  document.getElementById('phy').innerHTML = phy + '%'

  r.style.setProperty('--phy', phy + '%');

  document.getElementById('evs').innerHTML = evs + '%'
  r.style.setProperty('--evs', evs + '%');

  document.getElementById('eng').innerHTML = eng + '%'
  r.style.setProperty('--eng', eng + '%');

  document.getElementById('mp').innerHTML = mp + '%'
  r.style.setProperty('--mp', mp + '%');

  document.getElementById('math').innerHTML = math + '%'
  r.style.setProperty('--math', math + '%');








}