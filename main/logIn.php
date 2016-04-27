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

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Jquery core CSS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/loginFunctions.js"></script>

    <!-- Custom CSS -->
    <link href="css/myCustomStyle.css" rel="stylesheet">
    <link href="css/formStyle.css" rel="stylesheet">

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

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="signUp.php">Sign up</a>
                    </li>
                    <li>
                        <a href="logIn.php">Log in</a>
                    </li>
                    <li>
                        <a href="#" id="about" onClick="about()">About us</a>
                        <!--<input type="button" value="About us" onClick="about()">-->
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <br><br><br><br>
    <div class="container" id="wrap"> <!-- need to specify id of elements -->
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form action="r" method="post" accept-charset="utf-8" class="form" role="form">
                    <legend>Log In</legend>
                    <input type="text" id="email" class="form-control input-lg" placeholder="Your Email"/>
                    <input type="password" id="password" class="form-control input-lg" placeholder="Password"/>
                    <br>
                    <button class="btn btn-lg btn-primary btn-block signup-btn" type="submit">
                        Login
                    </button>
                </form>
            </div>
        </div>
    </div>

    <br><br><br><br><br><br>
    <hr>

    <!-- Footer -->
    <footer>
        <div class="row container">
            <div class="col-lg-12">
                <p>Copyright &copy; Sagi Shoffer - 2015</p>
            </div>
        </div>
    </footer>

</body>
</html>