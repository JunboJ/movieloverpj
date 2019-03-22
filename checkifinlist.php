<?php
    session_start();

    // $userid = $_REQUEST['uid'];
    // $movieid = $_REQUEST['mid'];
    $movieid = $_SESSION['movieID'];
    $userid = $_SESSION['userID'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "movielover";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $checkifinlist_sql = "SELECT * FROM watchlist WHERE userID = $userid and movieID = $movieid";
    $result = mysqli_query($conn, $checkifinlist_sql);
    $array = mysqli_fetch_all($result);
    $a = count($array);

    if ($a == 0) {
        echo "a";
    }else{
        echo "r";
    }

    $conn->close();
?>