<?php

$ServerName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbName = "feemanagement";


$conn = mysqli_connect($ServerName, $dbUserName, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed " . mysqli_connect_error());
}
