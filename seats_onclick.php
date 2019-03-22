<?php
    session_start();

    $sessionid = $_REQUEST['sid'];

    include ('connection.php');

    $seats_sql = "SELECT seats FROM dummytb1 WHERE sessionID = $sessionid";
    $seats_result = mysqli_query($conn, $seats_sql);
    $seats_row = mysqli_fetch_all($seats_result);
    
    $_SESSION['avaSeats'] = $seats_row[0][0];

    for ($i = 1; $i < 4; $i++) {
        echo "<input type='button' class='dropdown-item' value='".$i."' onclick='checkseats(this.value)'>";
    }
?>