
var editMode = false;

$(document).ready(function() {
	$('#imageFile').change(function(event) {
		var temp = URL.createObjectURL(event.target.files[0]);

		if(temp != null)
			$("#imageShow").attr('src', temp);
		else
			$("#imageShow").attr('src', "images/na.jpg");
	});
});

//$(document).ready(function() {
//	$("#productForm").submit(function(e){
//		e.preventDefault();
//		var form = this;
//
//		if(validation())
//			form.submit();
//		else {
//			var title = "<h3><b><center>Kickstarter Warnning</center></b></h3>";
//			var body = "<p>Not all the fields are filled</p>";
//			setButton_onClick('');
//			showModal(title, body);
//			return false;
//		}
//	});
//});

function fillFormData(projectId) {
	editMode = true;

	$.post("php/projectInfo.php", {id: projectId},

		function (data, textStatus) {
			var json = JSON.parse(data);

			$("#titleInput").val(json.name);

			$("#briefInput").val(json.brief);

			//$("#displayImg").attr('src',json.picture);

			$("#videoInput").val(json.video);

			$('#dateInput').val(json.end_date);

			$("#goalInput").val(json.goal);

			$("#descInput").val(json.description);

			$("#projectForm").attr('action','php/updateProject.php');
		}
	);
}

function validation() {

	var succses = true;

	// Validate title
	if (!checkEmpty("#title_input"))
		succses = false;

	// Validate shortBlurb
	if (!checkEmpty("#shortBlurb_input"))
		succses = false;

	// Validate image file
	if(!editMode) {
		if (!checkEmpty("#file_image"))
			succses = false;
	}
	else {
		$("#file_image").parent().removeClass("has-error");
		$("#file_image").parent().addClass("has-success");
	}

	// Validate video
	if (document.getElementById("URLVideoRB").checked == true) {
		if (!checkEmpty("#URL_Video"))
			succses = false;
	}
	else {
		if(!editMode) {
			if (!checkEmpty("#file_Video"))
				succses = false;
		}
		else {
			$("#file_Video").parent().removeClass("has-error");
			$("#file_Video").parent().addClass("has-success");
		}
	}

	// Validate date
	if (!checkEmpty("#date_input"))
		succses = false;

	// Validate target
	if (!checkEmpty("#target_input"))
		succses = false;

	// Rewards
	for(i=1; i<=rewardNum ;i++) {
		if (!checkEmpty("#reward_minDonation_"+i))
			succses = false;
		if (!checkEmpty("#reward_desc_"+i))
			succses = false;
		if (!checkEmpty("#reward_limitBackers_"+i))
			succses = false;
	}

	// Validate target
	if(CKEDITOR.instances.description_input.getData() === "") {
		$("#description_input").removeClass("has-success");
		$("#description_input").addClass("has-error");
		succses = false;
	}
	else {
		$("#description_input").removeClass("has-error");
		$("#description_input").addClass("has-success");
	}

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