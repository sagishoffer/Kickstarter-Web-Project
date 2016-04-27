
$(document).ready(function() {
    $('.form').submit(function(ev) {
        ev.preventDefault();
        loginUser();
    });
});

/* Log in user by email and password */
function loginUser() {
    var myJsonObject = {
        "email" : $("#email").val(),
        "password" : $("#password").val()
    }

    $.post("php/loginUser.php", {data: myJsonObject},
        function (data, textStatus) {
            if(data == 1) {
                location.replace("Home.php");
                window.alert("Login was successful");
            }
            else {
                window.alert("Error occurred");
            }
        }
    );
}


