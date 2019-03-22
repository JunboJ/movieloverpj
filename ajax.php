<?php
    $existNames = array("Daniel", "Dennis", "Danny", "Jane");

    if (isset($_POST['suggestion'])){
        $name = $_POST['suggestion'];
        foreach ($existNames as $existName) {
            if (strpos($existName, $name) !== false) {
                echo $existName;
                echo "<br>";
            }
        }
    }
?>