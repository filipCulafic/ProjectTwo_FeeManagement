<?php

if (isset($_POST["addStudent"])) {
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    $name = $_POST["name"];
    $course = $_POST["courses"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $contact = $_POST["contact"];

    createStudent($conn, $name, $course, $email, $address, $contact);


}