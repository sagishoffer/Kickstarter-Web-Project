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
    <script src="js/bootstrap.min.js"></script>
    <script src="js/projectFunctions.js"></script>

    <!-- Custom CSS -->
    <link href="css/portfolio-item.css" rel="stylesheet">

    <!-- Navigation -->
    <link href="css/navigation.css" rel="stylesheet">
    <script src="js/navigation.js"></script>

    <script>
        var projectId;
        var userId;
        var userName;
        var userType;

        $(document).ready(function() {
            projectId = <?php echo $_GET['id']; ?>;
            userId = <?php echo isset($_SESSION['userId']) ? $_SESSION['userId'] : 0; ?>;
            userName = <?php echo isset($_SESSION['name']) ? "'".$_SESSION['name']."'" : "''" ?>;
            userType = <?php echo isset($_SESSION['permission']) ? $_SESSION['permission'] : -1; ?>;

            var link = "project.php?id="+projectId;

            // Load matching navigation bar
            if(userType != -1)
                adaptedNavbar(userName, link);
            else
                defaultNavbar(link);

            //get project info
            getProjectPageInfo(projectId, userType);
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
                <a class="smoothscroll" href="Home.php"><img alt="" src="images/kick-logo.gif"></a>
            </div>

            <!-- Collect the nav links, forms, and other content from navigation.js -->
            <div class="collapse navbar-collapse navbar-dynamic" id="bs-example-navbar-collapse-1">

            </div>
            <!-- /.container -->
        </div>
    </nav>
    <!-- /.navbar-collapse -->

    <!------------------------------------------ Page Content ---------------------------------------------->

    <div class="container">

        <!-- Header -->
        <div class="head-details"></div>

        <hr>

        <!-- Body -->
        <div class="col-md-8" style="margin-top: 15px;">
            <h2>Project Description</h2>
            <h4 id="brief"></h4>
            <br>
            <p id="desc"></p>
            <br>
        </div>

        <div class="col-md-12 projectpic" style="text-align: center"></div>
    </div>

    <div class="container">
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


        <!------------------------------------------ Page Content ---------------------------------------------->

</body>

</html>
