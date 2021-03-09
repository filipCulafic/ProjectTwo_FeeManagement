<?php

include_once "dbh.inc.php";

$id = $_GET['id'];

$sql = "DELETE FROM students WHERE students_id = '$id';";
$result = mysqli_query($conn, $sql);


    if ($result) {
        header("Location: ../viewStudents.php?SuccessfullyDeleted");
    } else {
        header("Location: ../viewStudents.php?InvalidDeletion");
    }