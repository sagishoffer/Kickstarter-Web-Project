<?php session_start();

    $jsonObject = $_POST['data'];

    $email = $jsonObject["email"];
    $pass = $jsonObject["password"];

    if (strlen($email) > 0 && strlen($pass) > 0 ) {
        $pass = md5($pass[0].$pass.$pass[0]);

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "kickstarter";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT userId, name, type, email, password FROM users WHERE email = '" . $email . "' LIMIT 1";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            if ($row['password'] == $pass) {

                $_SESSION['userId'] = $row['userId'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['permission'] = $row['type'];
                $_SESSION['email'] = $row['email'];


                echo 1;
                exit;
            }
            else {
                echo "Invalid email or password. Please try again.";
            }
        }
        else {
            echo "Invalid email or password. Please try again.";
        }
    }
    else {
        echo "Please enter an email and password to login.";
    }
?>

