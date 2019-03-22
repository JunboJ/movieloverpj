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

    $removefromlist_sql = "DELETE FROM watchlist 
                        WHERE userID = $userid and movieID = $movieid";

    if ($conn->query($removefromlist_sql) === TRUE) {
        echo "success";
    } else {
        echo "Error: " . $removefromlist_sql . "<br>" . $conn->error;
    }

    $conn->close();
?>