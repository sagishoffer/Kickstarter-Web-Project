<?php session_start();

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "kickstarter";

	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	// set parameters and execute
	$name = $_POST["titleInput"];
	$brief = $_POST["briefInput"];
	$creator = $_SESSION['userId'];
	//$date_pieces = explode("/", $_POST["date"]);
	//$end_date = $date_pieces[2]."-".$date_pieces[1]."-".$date_pieces[0];
	$end_date = $_POST["dateInput"];
	$video = "http://www.youtube.com/embed/".explode("=", $_POST["videoInput"])[1];
	$goal = $_POST["goalInput"];
	$desc = $_POST["descInput"];
	
	$sql = 	"UPDATE projects SET name='".$name."', brief='".$brief."', creator=".$creator.", end_date='".$end_date."', video='".$video."', goal=".$goal.", description='".$desc."'";
	
	$sql .= " WHERE projectId=".$_POST["projectId"];

	if ($conn->query($sql) === TRUE)
		$msg = "The Project \'". $name . "\' was sucssesfuly updated";
	else
		$msg = "Error updating project \'". $name . "\'";

	$conn->close();
?>

<!DOCTYPE html>

<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title> KICKSTARTER </title>

	<!-- Bootstrap core CSS -->
	<link href="../css/bootstrap.min.css" rel="stylesheet" />

	<!-- Jquery core CSS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/editImageFunctions.js"></script>

	<!-- Navigation -->
	<link href="../css/navigation.css" rel="stylesheet">
	<script src="../js/navigateInsidephp.js"></script>

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
				<a class="smoothscroll" href="../Home.php"><img alt="" src="../images/kick-logo.gif"></a>
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
				<h1>Project Image <small>Second step</small></h1>
			</div>
		</div>

		<hr>

		<div class="row">

			<!-- edit form right column -->
			<div class="col-md-10 personal-info text-center">

				<form class="form-horizontal" id="projectImageForm" action="updateProjectImage.php" method="post" enctype="multipart/form-data" >

					<!-- image -->
					<div class="form-group">
						<label class="col-md-3 control-label">Image:</label>
						<div class="col-md-8 text-center">
							<input id="imageFile" class="form-control" type="file" name="image" accept="image/*" style="margin-bottom: 10px;"/>
							<img id="imageShow" src=<?php echo "\"../".$_POST["projectPic"]."\"" ?> width="100%" height="100%" alt="avatar">
						</div>
					</div>

					<input type="hidden" name="msg" value=<?php echo "\"".$name."\"" ?>/>

					<!-- button -->
					<div class="form-group">
						<label class="col-md-3 control-label"></label>
						<div class="col-md-8">
							<input class="btn btn-primary" type="submit" value="Finish"/>
						</div>
					</div>

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
