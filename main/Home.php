<!DOCTYPE html>
<?php session_start(); ?>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> KICKSTARTER </title>


    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!-- Jquery core CSS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
    <script src="js/homeFunctions.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom CSS -->
    <link href="css/myCustomStyle.css" rel="stylesheet">
    <link href="css/circular-progressbar.css" rel="stylesheet">

    <!-- Navigation -->
    <link href="css/navigation.css" rel="stylesheet">
    <script src="js/navigation.js"></script>

    <!-- Navigation & Projects script on load -->
    <script>
        var userId;
        var userName;
        var userType;
        var link = "Home.php";

        var app = angular.module('myApp', []);
        app.controller('searchCtrl', function($scope, $http) {
            $http.get("php/getProjects.php").success(function(response) {
                $scope.names = response;
                $scope.getURL = function(id) {
                    return "project.php?id=" + id;
                }
            });
        });

        $(document).ready(function() {
            userId = <?php echo isset($_SESSION['userId']) ? $_SESSION['userId'] : 0; ?>;
            userName = <?php echo isset($_SESSION['name']) ? "'".$_SESSION['name']."'" : "''" ?>;
            userType = <?php echo isset($_SESSION['permission']) ? $_SESSION['permission'] : -1; ?>;

            // Load matching navigation bar
            if(userType != -1)
                adaptedNavbar(userName, link);
            else
                defaultNavbar(link);

            // Load all available projects
            getProjects();
        });
    </script>

</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="smoothscroll" href="#"><img alt="" src="images/kick-logo.gif"></a>
            </div>

            <!-- Collect the nav links, forms, and other content from navigation.js -->
            <div class="collapse navbar-collapse navbar-dynamic" id="bs-example-navbar-collapse-1">

            </div>
            <!-- /.container -->
        </div>
    </nav>
    <!-- /.navbar-collapse -->

    <!------------------------------------------ Page Content ---------------------------------------------->

    <!-- Image Background Page Header -->
    <!-- Note: The background image is set within the business-casual.css file. -->
    <header class="business-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- <h1 class="tagline">Business Name or Tagline</h1>-->
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <hr>

        <!-- Number of projects title & Search Area -->
        <div class="row">
            <div class="col-lg-12">
                <div id="totalProjects"></div>
            </div>
            <!-- Search Area -->
            <div ng-app="myApp" ng-controller="searchCtrl">
                <div class="col-md-12">
                    <div class="searchBoxDropdown input-group col-md-12" style="padding-left: 400px; padding-right: 400px;margin-bottom: 40px; width:100%;">
                        <input type="text" ng-model="test" placeholder="Search" id="searchbox" class="form-control dropdown-toggle" data-toggle="dropdown" />
                            <span class="input-group-btn">
                                <button class="btn btn-info searchBT" style="border-radius: 4px; margin-left: 0px; cursor: default;">
                                    <i class="glyphicon">#</i>
                                </button>
                            </span>
                        <ul class="dropdown-menu col-md-4" style="padding: 2px; margin-left: 400px;">
                            <li ng-repeat="x in names | filter:test" style="padding-bottom: 2px;">
                                <a class="well searchDiv" href={{getURL(x.id)}} style="padding: 5px; margin: 0px;">
                                    <img width="50px" src={{x.picture}} /> {{x.name}}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <!-- Projects content -->
        <div class="row text-center"></div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Sagi Shoffer - 2015</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!------------------------------------------ Page Content ---------------------------------------------->

</body>

</html>
