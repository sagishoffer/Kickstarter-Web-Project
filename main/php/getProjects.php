<?php session_start();

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "kickstarter";
    $json = array();

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM projects WHERE status=1 AND end_date>NOW()";

    $userFilter = isset($_POST["filter"]) ? $_POST["filter"] : 'false';

    if($userFilter === 'Admin')
        $sql = "SELECT * FROM projects";
    else if ($userFilter === 'Manager')
        $sql = "SELECT * FROM projects WHERE status=1 AND creator=". $_SESSION['userId'];
    else if($userFilter === 'Backer')
        $sql = "SELECT * FROM projects WHERE status=1 AND end_date>NOW()";


    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $res = array(
                'id' => $row['projectId'],
                'name' => $row['name'],
                'brief' => $row['brief'],
                'description' => $row['description'],
                'picture' =>   $row['picture'],
                'video' => $row['video'],
                'start_date' =>   $row['start_date'],
                'end_date' => $row['end_date'],
                'collected' => $row['collected'],
                'goal' => $row['goal'],
                'percentage' => round($row['collected']/$row['goal']*100),
                'creator' =>   $row['creator'],
                'status' => $row['status']
            );

            array_push($json, $res);
        }
    }

    $jsonstring = json_encode($json);
    echo $jsonstring;

    $conn->close();
?>