<?php
    session_start();
    include ('connection.php');

    // $servername = "localhost";
    // $username = "root";
    // $password = "";
    // $dbname = "movielover";
    // // Create connection
    // $conn = mysqli_connect($servername, $username, $password, $dbname);


    // $userid = $_REQUEST['uid'];
    // $movieid = $_REQUEST['mid'];
    // $movieid = $_SESSION['movieID'];
    $userid = $_SESSION['userID'];

    $movieid_sql = "SELECT movieID FROM movies";
    $movieid_res = mysqli_query($conn,$movieid_sql);
    $movieid = mysqli_fetch_all($movieid_res);


    for ($a = 0; $a < count($movieid[0]);$a++) {
        $mid = $movieid[0][$a];
        $checkifinlist_sql = "SELECT * FROM watchlist WHERE userID = $userid and movieID = $mid";
        $result = mysqli_query($conn, $checkifinlist_sql);
        $array = mysqli_fetch_all($result);
        $a = count($array);

        if ($a == 0) {
            echo "a";
        }else{
            echo "r";
        }
    }
    $conn->close();
?>