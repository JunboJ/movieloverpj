<?php
    session_start();

    $orderSeats = $_REQUEST['bs'];
    $avaSeats = $_SESSION['avaSeats'];

    if ($orderSeats <= $avaSeats) {
        echo $orderSeats;
    }else{
        echo "Sorry, we only have ".$avaSeats." left.";
    }
    
?>