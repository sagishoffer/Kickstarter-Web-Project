
$(document).ready(function() {
    $('.form').submit(function(ev) {
        ev.preventDefault();
        validInfo();
    });
});

function validInfo() {

    var flag = true;
    var emailPattern = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    // Validate first name
    if($("#firstName").val() === "") {
        $("#firstName").parent().removeClass("has-success");
        $("#firstName").parent().addClass("has-error");
        flag = false;
    }
    else {
        $("#firstName").parent().removeClass("has-error");
        $("#firstName").parent().addClass("has-success");
    }

    // Validate last name
    if($("#lastName").val() === "") {
        $("#lastName").parent().removeClass("has-success");
        $("#lastName").parent().addClass("has-error");
    }
    else {
        $("#lastName").parent().removeClass("has-error");
        $("#lastName").parent().addClass("has-success");
    }

    // Validate email
    if($("#email").val() === "" || !$("#email").val().match(emailPattern)) {
        $("#email").parent().removeClass("has-success");
        $("#email").parent().addClass("has-error");
        flag = false;
    }
    else {
        $("#email").parent().removeClass("has-error");
        $("#email").parent().addClass("has-success");
    }

    // Validate passwords
    if($("#pass1").val() === $("#pass2").val()) {
        if ($("#pass1").val() !== "")  {
            $("#pass1").parent().removeClass("has-error");
            $("#pass1").parent().addClass("has-success");
        }
        else {
            $("#pass1").parent().addClass("has-error");
            $("#pass1").parent().removeClass("has-success");
            flag = false;
        }

        if ($("#pass2").val() !== "")  {
            $("#pass2").parent().removeClass("has-error");
            $("#pass2").parent().addClass("has-success");
        }
        else {
            $("#pass2").parent().addClass("has-error");
            $("#pass2").parent().removeClass("has-success");
            flag = false;
        }
    }
    else {
        $("#pass1").parent().addClass("has-error");
        $("#pass1").parent().removeClass("has-success");

        $("#pass2").parent().addClass("has-error");
        $("#pass2").parent().removeClass("has-success");
        flag = false;
    }

    if(flag) {
        var myJsonObject = {
            "name" : $("#firstName").val(),
            "type" : $("#type").val(),
            "email" : $("#email").val(),
            "password" : $("#pass1").val()
        }

        $.post("php/signupUser.php", {data: myJsonObject},
            function (data, textStatus) {

                if(data == 1) {
                    location.replace("Home.php");
                    window.alert("Registration was successful");
                }
                else {
                    window.alert("Error occurred");
                }
            }
        );
    }

    //else {
    //    location.replace("signUp.php");
    //    window.alert("Error flag");
    //}
}

