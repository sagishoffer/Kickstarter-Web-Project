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

    // Check if user exist
    $sql = "SELECT userId FROM users WHERE email='". $jsonObject["email"] . "' LIMIT 1";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "The email you provided is already in use";
    }

    else {
        // Password Encryption
        $originPass = $jsonObject["password"];
        $originPass = $originPass[0].$originPass.$originPass[0];
        $jsonObject["password"] = md5($originPass);

        // insert user
        $stmt = $conn->prepare("INSERT INTO users(name, type, email, password) VALUES(?, ?, ?, ?)");
        $stmt->bind_param('siss', $name, $type, $email, $password);

        // set parameters and execute
        $name = $jsonObject["name"];
        $type = $jsonObject["type"];
        $email = $jsonObject["email"];
        $password = $jsonObject["password"];

        $stmt->execute();

        // get userId
        $sql = "SELECT userId FROM users WHERE email='". $email . "' LIMIT 1";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $userId = $row['userId'];
        }

        $stmt->close();
        $conn->close();

        // log in the new user
        $_SESSION['userId'] = $userId;
        $_SESSION['name'] = $name;
        $_SESSION['permission'] = $type;

        echo 1;
    }
?>
