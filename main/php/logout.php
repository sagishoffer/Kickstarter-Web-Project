<?php session_start();

    // unset all previous values of last session and relocate to home page
    unset($_SESSION['userId']);
    unset($_SESSION['name']);
    unset($_SESSION['permission']);
    session_destroy();

    header("location: ../Home.php");

?>
