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
    <script src="ckeditor/ckeditor.js"></script>
    <!--<script src="js/jquery.form.min.js"></script> --> <!-- check -->
    <script src="js/createProjectFunctions.js"></script>

    <!-- Navigation -->
    <link href="css/navigation.css" rel="stylesheet">
    <script src="js/navigation.js"></script>

    <!-- Navigation & Projects script on load -->
    <script>
        var userId;
        var userName;
        var userType;
        var link = "Home.php";

        $(document).ready(function() {
            userId = <?php echo isset($_SESSION['userId']) ? $_SESSION['userId'] : 0; ?>;
            userName = <?php echo isset($_SESSION['name']) ? "'".$_SESSION['name']."'" : "''" ?>;
            userType = <?php echo isset($_SESSION['permission']) ? $_SESSION['permission'] : -1; ?>;

            if(userType == 1 || userType == 2)
                adaptedNavbar(userName, link);
        });
    </script>

    <!----- ---------------------------- script ----------------->

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


    <div class="container" style="margin-top: 80px;">

        <div class="row">
            <div class="col-lg-12">
                <h1>Project Info <small>First step</small></h1>
            </div>
        </div>

        <hr>

        <div class="row">

            <!-- edit form right column -->
            <div class="col-md-10 personal-info text-center">

                <form class="form-horizontal" id="projectForm" action="php/insertProject.php" method="post" enctype="multipart/form-data" >

                    <!-- title -->
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Project name:</label>
                        <div class="col-lg-8">
                            <input id="titleInput" name="titleInput" class="form-control" type="text" value="" />
                        </div>
                    </div>

                    <!-- brief -->
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Project brief:</label>
                        <div class="col-lg-8">
                            <textarea id="briefInput" name="briefInput" class="form-control" rows="3" maxlength="120" ></textarea>
                        </div>
                    </div>

                    <!-- end_time -->
                    <div class="form-group">
                        <label class="col-md-3 control-label">Duration of fundraising:</label>
                        <div class="col-md-8">
                            <input id="dateInput" name="dateInput" class="form-control" type="date" value="" />
                        </div>
                    </div>

                    <!-- goal -->
                    <div class="form-group">
                        <label class="col-md-3 control-label">Destination of fundraising:</label>
                        <div class="col-md-8">
                            <input id="goalInput" name="goalInput" class="form-control" type="number" value=""/>
                        </div>
                    </div>

                    <!-- video -->
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Video:</label>
                        <div class="col-lg-8">
                            <input id="videoInput" name="videoInput" class="form-control" type="text" value="" />
                        </div>
                    </div>

                    <!-- description -->
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Project description:</label>
                        <div class="col-lg-8">
                            <textarea id="descInput" name="descInput" class="form-control check" rows="10" cols="100">
                            </textarea>
                        </div>
                    </div>

                    <!-- image -->
<!--                    <div class="form-group">-->
<!--                        <label class="col-md-3 control-label">Image:</label>-->
<!--                        <div class="col-md-8 text-center">-->
<!--                            <input id="imageFile" class="form-control" type="file" name="image" accept="image/*" style="margin-bottom: 10px;"/>-->
<!--                            <img id="imageShow" src="images/na.jpg" width="100%" height="100%" alt="avatar">-->
<!--                        </div>-->
<!--                    </div>-->

                    <!-- button -->
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-8">
                            <input class="btn btn-primary" type="submit" value="Next"/>
                        </div>
                    </div>

                    <script>
                        CKEDITOR.replace( 'descInput', {language: 'en'} );
                    </script>
                </form>
            </div>
        </div>

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
