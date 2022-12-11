<?php
    $sname = "localhost";
    $unmae = "root";
    $password = "";
    $db_name="joycommerce";


    $conn = mysqli_connect($sname, $unmae, $password, $db_name);

    if (!$conn){
        echo "failed";
    }
?>