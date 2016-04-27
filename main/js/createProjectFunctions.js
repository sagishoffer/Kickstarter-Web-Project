
$(document).ready(function() {
	$("#projectForm").submit(function(e){
		e.preventDefault();
		var form = this;

		if(validation())
			form.submit();
		else {
			alert("Need to fill all fields!");
			return false;
		}
	});
});

function validation() {

    var succses = true;

    // Validate title
    if (!checkEmpty("#titleInput"))
        succses = false;

    // Validate shortBlurb
    if (!checkEmpty("#briefInput"))
        succses = false;

    // Validate video
    if (!checkEmpty("#videoInput"))
        succses = false;

    // Validate date
    if (!checkEmpty("#dateInput"))
        succses = false;

    // Validate target
    if (!checkEmpty("#goalInput"))
        succses = false;

    // Validate desc
    //if(CKEDITOR.instances.description_input.getData() === "") {
    //    $("#descInput").removeClass("has-success");
    //    $("#descInput").addClass("has-error");
    //    succses = false;
    //}
    //else {
    //    $("#descInput").removeClass("has-error");
    //    $("#descInput").addClass("has-success");
    //}

    return succses;
}

function checkEmpty(element) {
    if($(element).val() === "") {
        $(element).parent().removeClass("has-success");
        $(element).parent().addClass("has-error");
        return false;
    }
    else {
        $(element).parent().removeClass("has-error");
        $(element).parent().addClass("has-success");
        return true;
    }
}