<?php session_start();

    // Get data from client
    $jsonObject = $_POST['data'];

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
    $stmt = $conn->prepare("INSERT INTO activities(projectId, userId, amount) VALUES(?, ?, ?)");
    $stmt->bind_param('iii', $projectId, $userId, $amount);

    // set parameters and execute
    $projectId = $jsonObject["projectid"];
    $userId = $jsonObject["userid"];
    $amount = $jsonObject["donation"];

    $stmt->execute();

    $stmt->close();
    $conn->close();

    echo 1;
?>



