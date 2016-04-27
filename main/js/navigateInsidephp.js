var loginLink;

function defaultNavbar(link) {
    loginLink = link;

    $('.navbar-dynamic').html(
        '<ul class="nav navbar-nav navbar-right"><li><a href="signUp.php">Sign up</a></li>'
        + '<li><a href="logIn.php">Log in</a></li>'
        + '<li><a href="#" id="about" onClick="about()">About us</a></li></ul>'
    );
}

function adaptedNavbar(userName, link) {
    loginLink = link;

    $('.navbar-dynamic').html(
        '<ul class="nav navbar-nav navbar-right"> + ' +
        '<li><a>Welcome, ' + userName + '</a></li>'
    );

    // Admin
    if(userType == 1) {
        $('.navbar-right').append(
            '<li class="dropdown">' +
            '<a href="#" data-toggle="dropdown"> Options ' +
            '<b class="caret"></b></a>' +
            '<ul class="dropdown-menu">' +

            '<li><a href="../projectCreate.php" tabindex="-1">Create Project</a></li>' +

            '<li><a href="../projectsPage.php" tabindex="-1">Manage Projects</a></li>' +
            '<li><a href="#" tabindex="-1">Users</a></li>' +
            '<li><a href="#" tabindex="-1">Transactions</a></li>' +
            '<li class="divider"></li>' +
            '<li><a href="../php/logout.php" tabindex="-1">Log Out</a></li>' +
            '</ul></li>'
        );
    }

    // Project Manager
    else if(userType == 2) {
        $('.navbar-right').append(
            '<li class="dropdown">' +
            '<a href="#" data-toggle="dropdown"> Options ' +
            '<b class="caret"></b></a>' +
            '<ul class="dropdown-menu">' +
            '<li><a href="../projectCreate.php" tabindex="-1">Create Project</a></li>' +
            '<li><a href="../projectsPage.php" tabindex="-1">My Projects</a></li>' +
            '<li class="divider"></li>' +
            '<li><a href="../php/logout.php" tabindex="-1">Log Out</a></li>' +
            '</ul></li>'
        );
    }

    // Backer
    else if(userType == 3) {
        $('.navbar-right').append(
            '<li class="dropdown">' +
            '<a href="#" data-toggle="dropdown"> Options ' +
            '<b class="caret"></b></a>' +
            '<ul class="dropdown-menu">' +
            '<li><a href="../projectsPage.php" tabindex="-1">Projects</a></li>' +
            '<li class="divider"></li>' +
            '<li><a href="../php/logout.php" tabindex="-1">Log Out</a></li>' +
            '</ul></li>'
        );
    }

    $('.navbar-right').append(
        '<li><a href="#" id="about" onClick="about()">About us</a></li></ul>'
    );
}


/**
 * Created by Sagi on 26/11/2015.
 */
