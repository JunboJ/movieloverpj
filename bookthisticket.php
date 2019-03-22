<?php
    session_start();

    $userid = $_SESSION['userID'];
    $movieid = $_SESSION['movieID'];

    include ('connection.php');

    $area = $_REQUEST['ar'];
    $theatername = $_REQUEST['tn'];
    $session = $_REQUEST['se'];
    $seats = $_REQUEST['seat'];

    $sql = "INSERT INTO "
?>