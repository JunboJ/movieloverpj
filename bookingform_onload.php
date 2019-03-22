<?php
    include ('connection.php');
    
    //for area showing
    $area_sql = "SELECT area, areaID FROM theater_area";
    $area_result = mysqli_query($conn, $area_sql);
    $area_row = mysqli_fetch_all($area_result);

    for ($i = 0; $i < count($area_row); $i++) {
        for ($a = 0; $a < 1; $a++){
            echo "<input type='button' class='dropdown-item' value='".$area_row[$i][$a]."' onclick='bookdrop1(".$area_row[$i][1].", this.value)'>";
        }
    }
?>