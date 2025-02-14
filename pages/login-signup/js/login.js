

$(window).on('load', function () {
    $('#next').on('click', function () {
        
        var k = $('#mail-i').val();
        $.ajax({

            type: "POST",
            url: "php/check_mail.php",
            data: {

                email: k
            },
            beforeSend: function () {
     
             
                $("#loader").removeClass("none-b");

            },
            success: function (response) {




                if (response == "yes") {
                    alert("Otp Sended")
                    $("#loader").addClass("none-b");
                    $("#email").css("display", "none");
                    $("#code").css("display", "block");
                }
                else {
                    alert("User Not Found")
                    // alert(response)
                    $("#loader").addClass("none-b");
                }


            }

        })

    })



})





$(window).on('load', function () {
    $('#ver').on('click', function () {
        // var kk = $('#code-i').html();
        var mp = $('#mail-i').val();

        var kkk = $('#code-i').val();
        $.ajax({

            type: "POST",
            url: "php/otp.php",
            data: {

                otp: kkk,
                mail: mp
            },
            beforeSend: function () {
                $("#loader").removeClass("none-b");

            },
            success: function (response) {




                if (response == "yes") {

                    $("#loader").addClass("none-b");
                    $("#code").css("display", "none");
                    $("#pass").css("display", "block");
                }
                else {
                    $("#loader").addClass("none-b");

                    alert(response)
                }


            }

        })

    })



})



$(window).on('load', function () {
    $('#pass-b').on('click', function () {
        
        var m = $('#mail-i').val();
        var pass1 = $('#pass-i1').val();
        var pass2 = $('#pass-i2').val();
        if (pass1 == pass2) {


            // var kk = $('#code-i').html();
            $.ajax({

                type: "POST",
                url: "php/pass_u.php",
                data: {

                    mail:m,
                    pass:pass1
                },
                beforeSend: function () {
                    $("#loader").removeClass("none-b");

                },
                success: function (response) {




                    if (response == "yes") {
                        alert("Password Reset")
                        $("#loader").addClass("none-b");
                        $("#pass").css("display", "none");
                        $("#black").css("display", "none");
                    }
                    else {
                        $("#loader").addClass("none-b");

                        alert(response)
                    }


                }

            })
        }

        else{
            alert("Password Not Matched")
        }
    })




})


