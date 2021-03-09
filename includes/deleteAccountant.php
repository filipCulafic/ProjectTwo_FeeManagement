<?php

    include_once "dbh.inc.php";
    $id = $_GET['id'];
    

    $sql = "DELETE FROM accountants WHERE accountants_id = '$id';";
    $result = mysqli_query($conn, $sql);
    
    if($result) {
        header("Location: ../viewAccountant.php?itWorked");
    } else {
        echo "Nope";
    }