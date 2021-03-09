<?php

if(isset($_POST["addAccountant"])) {
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    $userName = $_POST["uid"];
    $password = $_POST["pwd"];
    $passwordRepeat = $_POST["pwdRepeat"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $contact = $_POST["contact"];

    if (emptyInputSignUp($userName,$password,$email,$address,$contact) !== false) {
        header("Location: ../addAccountant.php?error=emptySignUpFields");
        exit();
    }

    if (invaliduid($userName) !== false) {
        header("Location: ../addAccountant.php?error=invalidUserName");
        exit();
    }

    if ($password != $passwordRepeat) {
        header("Location: ../addAccountant.php?error=passwordsDontMatch");
        exit();
    }


    createAccountant($conn, $userName, $password, $email, $address, $contact);
    


}
