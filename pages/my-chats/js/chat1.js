var inp = document.querySelector('#inputc')
var join_btn = document.getElementById('join')
var create_btn = document.getElementById('create')
var btn_boxx = document.getElementById('btn_boxc')



var first = document.getElementsByClassName("cc")
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

create_btn.onclick =(e)=>{
    e.preventDefault();
    // alert(inp)
    // for_join()
    var k = btoa(inp.value)
    document.getElementById('loader').style.display='flex'
    for_create()
    for_join(k,'Create')
    
    
  // alert(k)
  



}

join_btn.onclick =(e)=>{

    e.preventDefault();
    // var k = inp.value
    var k = btoa(inp.value)
    
    var a = "joined"
    for_join(k,a)
    document.getElementById('loader').style.display='flex'
    
    
    // alert(k)
    setTimeout(() => {
      
      document.getElementById('loader').style.display='none'
      window.location.href = window.location = 'chat-box.php?room_name='+k;
    }, 1500);
 
}
var pu = document.getElementById('pu')

pu.onclick =(e)=>{

    e.preventDefault();
    
    var a = "joined"
    for_join('cHVibGlj',a)
    document.getElementById('loader').style.display='flex'
    
    
    // alert(k)
    setTimeout(() => {
      
      document.getElementById('loader').style.display='none'
      window.location.href = window.location = 'chat-box.php?room_name=cHVibGlj';
      // window.location.href = window.location = 'chat-box.php?room_name='+k;
    }, 1500);
    
 
}







function for_join(k,type) {

var m = type
  

  // alert(k)
    $.ajax({
  
      type: "POST",
      data:{

        input:k,
        types : m
      },
      url: 'php/join.php',
      success: function (response) {
        // console.log(response)

       
      },
    });
  }


function for_create() {
  var k =  btoa($('#inputc').val())

//   alert(k)
    $.ajax({
  
      type: "POST",
      data:{

        inp:k



      },
      url: 'php/create.php',
      success: function (response) {
       if(response == 'yes'){
        //  document.getElementById('loader').style.display='none'
        setTimeout(() => {
    
          document.getElementById('loader').style.display='none'
          window.location.href = window.location = 'chat-box.php?room_name='+k;
        }, 1500);
       }
       else{
        alert(response)
        document.getElementById('loader').style.display='none'

        return false;
       }
       
      },
    });
  }