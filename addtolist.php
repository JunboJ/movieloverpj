<?php
    session_start();
    // $movieid = $_REQUEST['mid'];
    // $userid = $_REQUEST['uid'];
    $movieid = $_SESSION['movieID'];
    $userid = $_SESSION['userID'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "movielover";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $addtolist_sql = "INSERT INTO watchlist (userID, movieID) 
                    VALUES ($userid, $movieid)";

    if ($conn->query($addtolist_sql) === TRUE) {
        echo 1;
    } else {
        echo "Error: " . $addtolist_sql . "<br>" . $conn->error;
    }

    $conn->close();
?>


