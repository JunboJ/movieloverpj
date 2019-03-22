<?php
    include ('connection.php');

    $movieid = $_REQUEST['mid'];
    $theaterid = $_REQUEST['tid'];

    $session_sql = "SELECT session, sessionID FROM sessions WHERE theaterID = $theaterid AND movieID = $movieid";
    $session_result = mysqli_query($conn, $session_sql);
    $session_row = mysqli_fetch_all($session_result);


    for ($i = 0; $i < count($session_row); $i++) {
        for ($a = 0; $a < 1; $a++) {
            echo "<input type='button' class='dropdown-item' value='".$session_row[$i][$a]."' onclick='bookdrop3(".$session_row[$i][1].", this.value)'>";
        }
    }
?>