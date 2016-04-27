
$(document).ready(function() {
    $('#imageFile').change(function(event) {
        var temp = URL.createObjectURL(event.target.files[0]);

        if(temp != null)
            $("#imageShow").attr('src', temp);
        else
            $("#imageShow").attr('src', "images/na.jpg");
    });
});

$(document).ready(function() {
    $("#projectImageForm").submit(function(e){
        e.preventDefault();
        var form = this;

        if(validation)
            form.submit();
        else {
            alert("Need to choose image!");
            return false;
        }
    });
});

function validation() {

    if($("#imageFile").val() === "") {
        $("#imageFile").parent().removeClass("has-success");
        $("#imageFile").parent().addClass("has-error");
        return false;
    }
    else {
        $("#imageFile").parent().removeClass("has-error");
        $("#imageFile").parent().addClass("has-success");
        return true;
    }
}

