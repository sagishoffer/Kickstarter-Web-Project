
var projectid;
var donateSum = 5000;

// Gets information about project
function getProjectPageInfo(projectId, userType) {
    projectid = projectId;

    $.post("php/projectInfo.php", { id: projectId},
        function (data, textStatus) {
            addProjectInfo(JSON.parse(data), userType);
        }
    );
}

// Add the info to page
function addProjectInfo(json, userType) {
    addInfoHeader(json, userType);
    addInfoDescription(json);
}

// Adds header content
function addInfoHeader(json, userType) {
    var videoBox;

    if(json.video[0]=='v') {
        videoBox = 	'<video controls="controls" width="640" height="360">'+
            '<source src="'+json.video+'" type="video/mp4" />'+
            '<object type="application/x-shockwave-flash" data="http:// flowplayer-3.2.1.swf" width="640" height="360">'+
            '<paramname ="allowFullScreen" value="true" />'+
            '</object>'+
            '</video>';
    }
    else
        videoBox =	"<div class='embed-responsive embed-responsive-16by9'>"+
            "<iframe class='embed-responsive-item' src='"+json.video+"'></iframe>"+
            "</div>";


    var box = "<div class='row'>" +
        "<div class='col-lg-12'>" +
        "<h1 class='page-header'>" + json.name+ " " + "<small>" + "created by - " + json.owner + "</small></h1>" +
        "</div>" +
        "</div>" +
        "<div class='row'>" +
        "<div class='col-md-8'>" +
        videoBox +
        "</div>" +
        "<div class='col-md-4' style='background-color:whitesmoke'>" +
        "<h2 style='text-align: center'>" + json.name + "</h2>" +
        //"<p style='font-size:110%'>" + json.brief + "</p>" +
        "<h3>$" + json.collected + "<small> USD</small></h3>" +
        "<div class='progress' style='height: 15px; margin-top: 10px; margin-bottom: 8px;'>" +
        "<div class='progress-bar progress-bar-success' role='progressbar' aria-valuenow='0' aria-valuemin='0' aria-valuemax='100' style='width:" + json.percentage + "\%'><span class='sr-only'>" + json.percentage + "\%</span></div>" +
        "</div>" +
        "<p style='font-size:120%'>" + json.percentage + "% of $" + json.goal + "</p>" +
        "<p style='font-size:120%'>"+
        //"<span class='glyphicon glyphicon-heart'></span>" + " " +
        json.backers + " Backers</p>" +
        "<p style='font-size:120%'>"+ getInterval(new Date(json.end_date).getTime()) + " left</p>" +
        "<div class='col-md-12' style='text-align:center'>" +
        "<input id='donate_value' class='form-control' type='text' value='$5000' onchange='changeBar(this.value)' style='margin-top:28px; margin-bottom:10px;text-align: center;background-color: #EEE9FB;font-weight: bold;font-size: larger;'>" +
        "</div>" +
        "<div class='col-md-12' style='text-align:center'>" +
        "<input type='range' id='donatebar' style='margin-bottom:10px' min='100' max='10000' onchange='donateValue(this.value)'>" +
        "</div>" +
        "<div class='col-md-12' style='text-align:center; margin-top:20px; margin-bottom:20px;'>" +
        "<a onclick='donate()' class='btn btn-lg btn-success donate_btn'>Back This Project</a>" +
        "</div>" +
        "</div>" +
        "</div>";

    $(".head-details").html(box);

    //Set disable and enable for donate button and tip tool
    if (userType != -1) {
        $(".donate_btn").attr('enabled', 'enabled');
        $(".donate_btn").attr("title", "Click");
    } else {
        $(".donate_btn").attr('disabled', 'disabled');
        $(".donate_btn").attr("title", "You Have to Log In");
    }
}

// Adds description content
function addInfoDescription(json) {
    $("#brief").html(json.brief);
    $("#desc").html(json.description);
    $(".projectpic").html("<img class='img-circle' style='text-align:center;width:50%;' src='" + json.picture + "' alt=''>");

}

//Set the value of the textBox
function donateValue(value) {
    $('#donate_value').val("$"+value);
    donateSum = value;
}

//Set the value of the slider
function changeBar(value) {
    $('#donate_value').val("$"+value);
    $('#donatebar').val(value);
    donateSum = value;
}

// On click donate
function donate() {

    if (confirm("Are you sure you want to donate  $" + donateSum +" ?") == true){
        var myJsonObject = {
            "projectid" : projectid,
            "userid" : userId,
            "donation" : donateSum
        }
        $.post("php/insertDonation.php", {data: myJsonObject},
            function (data, textStatus) {
                if(data == 1) {
                    location.replace("project.php?id="+projectid);
                    window.alert("Thank you for your contribution!");
                }
                else {
                    window.alert("Something went wrong!");
                }
            }
        );
    }
}

function startDestTime(destDate) {
    // set the date we're counting down to
    var target_date = new Date(destDate).getTime();

    // variables for time units
    var days, hours, minutes, seconds;

    // get tag element
    var countdown = document.getElementById("countdown");

    // update the tag with id "countdown" every 1 second
    setInterval(function () {
        countdown.innerHTML = getInterval(target_date);
    }, 1000);
}

function getInterval(target_date) {

    // find the amount of "seconds" between now and target
    var current_date = new Date().getTime();
    var seconds_left = (target_date - current_date) / 1000;

    // do some time calculations
    days = parseInt(seconds_left / 86400);
    seconds_left = seconds_left % 86400;

    hours = parseInt(seconds_left / 3600);
    seconds_left = seconds_left % 3600;

    minutes = parseInt(seconds_left / 60);
    seconds = parseInt(seconds_left % 60);

    // format countdown string + set tag value
    if(days == 0) {
        if(hours == 0) {
            if(minutes == 0) {
                return seconds + " Seconds";
            }
            else {
                return minutes + " Minutes";
            }
        }
        else {
            return hours +  " Hours";
        }
    }
    else {
        return days + " Days";
    }
}