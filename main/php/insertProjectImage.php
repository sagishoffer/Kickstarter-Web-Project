<?php session_start();

    $status = "ok";
    $name = $_POST["msg"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "kickstarter";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if($conn->connect_error) {
        die("Connection failed: ". $conn->connect_error);
    }

    // project image
    $picture = "images/na.jpg";
    if ($_FILES["image"]["error"] == UPLOAD_ERR_OK) {
        if ((($_FILES["image"]["type"] == "image/gif") || ($_FILES["image"]["type"] == "image/jpeg")
                || ($_FILES["image"]["type"] == "image/jpg")|| ($_FILES["image"]["type"] == "image/pjpeg")
                || ($_FILES["image"]["type"] == "image/x-png")|| ($_FILES["image"]["type"] == "image/png"))
            && ($_FILES["image"]["size"] < 200000)) {
            move_uploaded_file($_FILES["image"]["tmp_name"], "../images/".$_FILES["image"]["name"]);
            $picture = "images/".$_FILES["image"]["name"];
        }
        else {
            $status = "Invalid file";
            exit;
        }
    }
    else if($_FILES["image"]["error"] != UPLOAD_ERR_NO_FILE)
        $errorFlag = True;

    $sql = 	"UPDATE projects SET picture='".$picture."'";

    $sql .= " WHERE name='". $name . "' LIMIT 1";

    if ($conn->query($sql) === TRUE)
        $msg = "The Project \'". $name . "\' was sucssesfuly updated";
    else
        $msg = "Error updating project \'". $name . "\'";

    $conn->close();

?>

<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            alert("Project created successfully");
            $("#insertForm").submit();
        });
    </script>
</head>
<body>
<form id="insertForm" method="post" action="../Home.php">
    <input type="hidden" name="msg" value=<?php echo "\"".$msg."\"" ?>/>
</form>
</body>
</html>
