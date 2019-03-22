<?php
        session_start();

        $_SESSION['movieID'] = 4;
        $_SESSION['userID'] = 2;
        $movieID = $_SESSION['movieID'];
        $userID = $_SESSION['userID'];

        include 'connection.php';
        
        $sql = "SELECT title, poster, releasedate, description FROM movies WHERE movieID = $movieID";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
    ?>