<?php session_start();

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "kickstarter";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	// prepare and bind
	$stmt= $conn->prepare("UPDATE projects SET status=0 WHERE projectId=?");
	$stmt->bind_param('i', $id);

	// set parameters and execute
	$id = $_POST["projectId"];

	$stmt->execute();

	$stmt->close();
	$conn->close();

	$msg = "The Project \'". $_POST["projectName"] . "\' has been deleted";
?>

<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script>
			$(document).ready(function() {
				alert(<?php echo "\"".$msg."\"" ?>);
				$("#delForm").submit();
			});
		</script>
	</head>
	<body>
		<form id="delForm" method="post" action="../Home.php">
			<input type="hidden" name="msg" value=<?php echo "\"".$msg."\"" ?>/>
		</form>
	</body>
</html>

