function getProjects(userType) {
    var value;

    switch(userType) {
        case 1:
            value = "Admin";
            break;
        case 2:
            value = "Manager";
            break;
        case 3:
            value = "Backer";
            break;
    }

    $.post("php/getProjects.php", {filter: value},
        function (data, textStatus) {
            showProjects(JSON.parse(data), value);
        }
    );
}

function showProjects(jsonArr, value) {

    // clear header container
    $(".page-header").html("");

    // clear header container
    $(".text-center").html("");

    if(value === "Admin")
        $(".page-header").html("Manage all projects");
    else if(value === "Manager")
        $(".page-header").html("Manage all your projects");
    else if(value === "Backer")
        $(".page-header").html("All active projects");

    // append new projects
    for(var i = 0; i < jsonArr.length; i++) {
        displayOneProject(jsonArr[i], i, value);
    }
}

function displayOneProject(json, row, value) {
    var box;

    switch(value) {
        case "Admin":
            box = manageBox(json, row, value);
            break;
        case "Manager":
            box = manageBox(json, row, value);
            break;
        case "Backer":
            box = backerBox(json, row);
            break;
    }

    $(".text-center").append(box);

}

function manageBox(json, row, value) {
    var url="project.php?id="+json.id;

    var box = "<div class='col-md-3' style='border-radius: 12px; padding:0px; width:20%; margin: 20px; border: solid 1px #d9d9de;'>" +
        "<a href='"+url+"'><img src=" + json.picture + " class='img-responsive' width='232' height='130' style='max-height:200px;border-top-left-radius: 6px;border-top-right-radius: 6px;'></a>" +
        "<form id='projectForm_"+row+"' method='post' action='projectEdit.php'>" +
        "<input type='hidden' name='projectId' value='"+json.id+"'/>" +
        "<input type='hidden' name='projectPic' value='"+json.picture+"'/>" +
        "</form>" +
        "<form id='delProjectForm"+row+"' method='post' action='php/deleteProject.php'>" +
        "<input type='hidden' name='projectId' value='"+json.id+"'/>" +
        "<input type='hidden' name='projectName' value='"+json.name+"'/>" +
        "</form>" +
        "<div class='dropdown '>"+
        "<button style='width:100%'' class='btn btn-success dropdown-toggle' type='button' data-toggle='dropdown'>Menu "+
        "<span class='caret'></span></button>"+
        "<ul id='menu"+row+"' class='dropdown-menu'>"+
        "<li><a onclick='document.getElementById(\"projectForm_"+row+"\").submit();' style='cursor: pointer;'>Edit project</li>"+
        "<li style='cursor: pointer;'>"+
        "<a role='menuitem' tabindex='-1' onclick='document.getElementById(\"delProjectForm"+row+"\").submit();' style='cursor: pointer;'>Delete project</a>" +
        "</li>"+
        //"<li><a style='cursor:pointer;'onclick='showBackers("+json.projectId+")'>Show backers</a></li>"+
        "</ul>"+
        "</div>"+
        "<div style=' margin-left: 15px; margin-right: 15px'>"+
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

    return box;
}

function backerBox(json, row) {
    var url="project.php?id="+json.id;

    var box = "<div class='col-md-3' style='border-radius: 5px; padding:0px; width:20%; margin: 20px; border: solid 1px #d9d9de;'>" +
        "<a href='"+url+"'><img src=" + json.picture + " class='img-responsive' width='232' height='130' style='max-height:200px;border-top-left-radius: 6px;border-top-right-radius: 6px;'></a>" +
        "<div style=' margin-left: 15px; margin-right: 15px'>"+
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

    return box;
}

function showBackers(projectId) {
    $.post("php/getBackers.php", {id: projectId, fillter:"true"},
        function (data, textStatus) {
            var jsonArr= JSON.parse(data);

            if(jsonArr.length == 0 ) {
                var title = "<h3><b><center>Kickstarter Warning</center></b></h3>";
                var body = "<p>There are no backers yet</p>";
                showModal(title, body);
            }
            else {
                var body = "<div class='container'>"+
                    "<div class='table-responsive' >"+
                    "<table class='table' style='width: 48%'>"+
                    "<thead>"+
                    "<tr>"+
                    "<th>Name</th>"+
                    "<th>Email</th>"+
                    "<th>Donate</th>"+
                    "<th>Desctiption</th>"+
                    "</tr>"+
                    "</thead>"+
                    "<tbody id='table_body'>"+
                    addTableRows(jsonArr) +
                    "</tbody>"+
                    "</table>"+
                    "</div>"+
                    "</div>";

                var header = "<b><center>Backers Information</center></b>";
                showModal(header, body);
            }
        });
}

function addTableRows(jsonArr) {
    var tbody = "";

    for (var i = 0 ; i <  jsonArr.length ; i++) {
        tbody +=	"<tr>"+
            "<td>"+jsonArr[i].name        +" </td>"+
            "<td>"+jsonArr[i].email 	  +" </td>"+
            "<td>"+jsonArr[i].donate 	  +" </td>"+
            "<td>"+jsonArr[i].desctiption +" </td>"+
            "</tr>";
    }

    return tbody;
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