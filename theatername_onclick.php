<?php
    session_start();

    $movieid = $_SESSION['movieID'];
    $areaID = $_REQUEST['areaid'];

    include ('connection.php');

    $theater_sql = "SELECT theaterID FROM (SELECT t.theaterID, ta.areaID FROM theaters t INNER JOIN theater_area ta ON t.areaID = ta.areaID) AS tta WHERE areaID = $areaID";
    $theater_result = mysqli_query($conn, $theater_sql);
    $theater_row = mysqli_fetch_all($theater_result);

    for ($i = 0; $i < count($theater_row); $i++) {
        for ($a = 0; $a < 1; $a++){
            echo "<input type='button' class='dropdown-item' value='".$theater_row[$i][$a]."' onclick='bookdrop2(".$movieid.",".$theater_row[$i][$a].", this.value)'>";
        }
    }
?>