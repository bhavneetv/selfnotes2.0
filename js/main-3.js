function check() {
  var l = document.getElementById("loader");
  if ((l.style.display = "block")) {
    setTimeout(() => {
      l.style.display = "none";
    }, 1400);
  }
}

check();

function bi() {
  document.getElementById("che").style.display = "none";
  document.getElementById("bio").style.display = "flex";
  var m = document.getElementById("c");
  var pc = document.getElementById("cc");
  m.innerHTML = "BIOLOGY";
  pc.innerHTML = "BIOLOGY";
  var m_p = m.parentElement.parentElement.parentElement;
  var pc_p = pc.parentElement.parentElement;
  m_p.href = "#bio";
  pc_p.href = "#bio";
}
function ch() {
  document.getElementById("bio").style.display = "none";
  document.getElementById("che").style.display = "flex";
  var m = document.getElementById("c");
  var pc = document.getElementById("cc");
  m.innerHTML = "CHEMISTRY";
  pc.innerHTML = "CHEMISTRY";
  var m_p = m.parentElement.parentElement.parentElement;
  var pc_p = pc.parentElement.parentElement;
  m_p.href = "#che";
  pc_p.href = "#che";
}

function for_sub() {
  $.ajax({
    type: "POST",
    // Our sample url to make request
    url: "php/sub.php",

    success: function (response) {
      // alert(response)
      if (response == "biology") {
        document.getElementById("b").style.display = "block";
        document.getElementById("c").style.display = "none";
        document.getElementById("bb").style.display = "block";
        document.getElementById("cc").style.display = "none";
        document.getElementById("che").style.display = "none";
        document.getElementById("bio").style.display = "flex";
      } else if (response == "chemistry") {
        document.getElementById("c").style.display = "block";
        document.getElementById("b").style.display = "none";
        document.getElementById("cc").style.display = "block";
        document.getElementById("bb").style.display = "none";
        document.getElementById("bio").style.display = "none";
        document.getElementById("che").style.display = "flex";
      } else {
        alert("login to get chemistry notes");
        bi();
      }
    },
  });
}
// alert()
for_sub();

function visit() {
  
}
visit();

