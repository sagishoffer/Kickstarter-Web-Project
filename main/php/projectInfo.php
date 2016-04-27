<?php session_start();

    // Get data from client
    $id = $_POST['id'];

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

    // Get Project data from DB
    $sql = "SELECT * FROM projects WHERE projectId = " . $id . " LIMIT 1";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $name = $row['name'];
        $brief = $row['brief'];
        $description = $row['description'];
        $picture = $row['picture'];
        $video = $row['video'];
        $start_date = $row['start_date'];
        $end_date = $row['end_date'];
        $collected = $row['collected'];
        $goal = $row['goal'];
        $creator = $row['creator'];
    }

    // Get creator name by Id
    $sql = "SELECT name FROM users WHERE userId = " . $creator . " LIMIT 1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $owner = $row['name'];
    }

    // Get number of project's backers
    $sql = "SELECT COUNT(projectId) AS backers FROM activities WHERE projectId =" . $id . " GROUP BY projectId LIMIT 1";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $numOfBackers = $row['backers'];
    }
    else {
        $numOfBackers = 0;
    }


    // Build json to send back to client
    $json = array(
        'name' => $name,
        'brief' => $brief,
        'description' => $description,
        'picture' => $picture,
        'video' => $video,
        'start_date' => $start_date,
        'end_date' => $end_date,
        'collected' => $collected,
        'goal' =>   $goal,
        'percentage' => round($collected/$goal*100),
        'owner' => $owner,
        'backers' => $numOfBackers
    );

    $jsonstring = json_encode($json);
    echo $jsonstring;

    $conn->close();

?>