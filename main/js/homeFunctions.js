
/* get all projects from database */
function getProjects() {
    $.post("php/getProjects.php", {fillter: "false"},
        function (data, textStatus) {
            var json = JSON.parse(data);
            $("#totalProjects").html("Available Projects: " + json.length);
            showProjects(json);
        }
    );
}

/* Append all project to page content */
function showProjects(jsonArr) {
    // clear the projects container
    $(".text-center").html("");

    // append new project
    for(var i = 0; i < jsonArr.length; i++) {
        displayOneProject(jsonArr[i], i);
    }
}

/* Build project box */
function displayOneProject(json, row) {
    var url="project.php?id="+json.id;

    var box = "<div class='col-md-3' style='border-radius: 5px; padding:0px; width:20%; margin: 20px; border: solid 1px #d9d9de;'>" +
        "<a href='"+url+"'><img src=" + json.picture + " class='img-responsive' width='232' height='130' style='max-height:200px;border-top-left-radius: 6px;border-top-right-radius: 6px;'></a>" +
        "<div style=' margin-left: 15px; margin-right: 10px'>"+
        "<h2>" + json.name + "</h2>" +
        "<p style='height: 50px;'>" + json.brief + "</p>" +
        "<div id='warpper'>" +
        "<div class='c100 p"+json.percentage+" small green' style='float:left; margin-top: 15px; margin-bottom: 7px;'>" +
        "<span>" + json.percentage+"%" + "</span>" +
        "<div class='slice'>" +
        "<div class='bar'></div>" +
        "<div class='fill'></div>" +
        "</div>" +
        "</div>" +
        "<ul class='list-inline'>" +
        "<li>" +
        "<div style='float:left; margin-top: 20px;'><b>$" + json.collected + "</b> Collected</div>" +
        "</li>" +
        "<div id='countdown_" + row + "' style='float:left; margin-left: 12px;'>" + getInterval(new Date(json.end_date).getTime()) +"</div>" +
        "</li>" +
        "</ul>" +
        "</div>" +
        "</div>"+
        "</div>";


    $(".text-center").append(box);
    startDestTime(json.end_date, row);
}


function about() {
    alert("Copyright " + '\u00A9' + " Sagi Shoffer, 2015");
}

//$("#about").on('click', function() {
//    alert ("Copyright " + '\u00A9' + " Sagi Shoffer, 2015");
//    return false;
//});

//$("#about").onclick('click', function() {
//    alert ("Copyright " + '\u00A9' + " Sagi Shoffer, 2015");
//});

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
                return "<span class='seconds'><b>" + seconds +  "</b> Seconds left</span>";
            }
            else {
                return "<span class='minutes'><b>" + minutes +  "</b> Minutes left</span>";
            }
        }
        else {
            return "<span class='hours'><b>" + hours +  "</b> Hours left</span>";
        }
    }
    else {
        return '<span class="days"><b>' + days + '</b> Days left</span>';
    }
}

function startDestTime(destDate, row) {
    // set the date we're counting down to
    var target_date = new Date(destDate).getTime();

    // variables for time units
    var days, hours, minutes, seconds;

    // get tag element
    var countdown = document.getElementById("countdown_" + row);

    // update the tag with id "countdown" every 1 second
    setInterval(function () {
        countdown.innerHTML = getInterval(target_date);
    }, 1000);
}