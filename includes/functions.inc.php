<?php

function emptyInputLogin($userName, $password) {
    if (empty($userName) || empty($password)) {
        $result = true;
    } else { 
        $result = false;
    }

return $result;

};

function emptyInputSignUp($userName, $password, $email, $address, $contact) {
    if (empty($userName) || empty($password) || empty($email) || empty($address) || empty($contact)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
    

}


function invaliduid($userName) {
   if (!preg_match("/^[a-zA-Z0-9]*$/",$userName)) {
       $result = true;
   } else {
       $result = false;
   }
   return $result;
};


function uidExist($conn, $userName, $email) {
    $sql = "SELECT * FROM admins WHERE username=? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)) {
        header("Location: ../index.php?error=stmtfailed" );
        exit();
    }
    mysqli_stmt_bind_param($stmt,"ss", $userName, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } 
   else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function uidExistAccountant($conn, $userName, $email) {
    $sql = "SELECT * FROM accountants WHERE username=? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)) {
        header("Location: ../index.php?error=stmtfailed" );
        exit();
    }
    mysqli_stmt_bind_param($stmt,"ss", $userName, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } 
   else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function uidExistStudent($conn, $rollNumber) {
    $sql = "SELECT * FROM students WHERE students_id=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)) {
        header("Location: ../index.php?error=stmtfailed" );
        exit();
    }
    mysqli_stmt_bind_param($stmt,"s", $rollNumber);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } 
   else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function createAccountant($conn, $userName, $password, $email, $address, $contact) {
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO accountants (username, password, email, address, contact) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)) {
        header("Location: ../index.php?error=stmtfailed" );
        exit();
    }
    

    mysqli_stmt_bind_param($stmt,"sssss", $userName,$hashedPassword, $email, $address, $contact);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: ../addAccountant.php?error=none");
    exit();
}

function createStudent($conn, $name, $course, $email, $address, $contact) {
    if (empty($name) || empty($course) || empty($email) || empty($address) || empty($contact)) {
        header("Location: ../addStudent.php?error=emptyStudentInput");
        exit();
    }
    $sql = "INSERT INTO students (name, email, course, fee, paid, due, address, contact) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../index.php?error=stmtfailed" );
        exit();
    }


    $fee = 1500;
    $paid = 0;
    $due = 1500;
    mysqli_stmt_bind_param($stmt, "ssssssss", $name, $email, $course, $fee, $paid, $due, $address, $contact);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: ../addStudent.php?error=none");
    exit();

}

function viewAccountants($conn) {
    $sql = "SELECT * FROM accountants;";
    $result = mysqli_query($conn,$sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . 
            $row["accountants_id"] . "</td><td>" . 
            $row["username"] . "</td><td>" . 
            $row["email"] . "</td><td>" . 
            $row["address"] . "</td><td>" . 
            $row["contact"] . "</td><td style='border-top:solid 1px white;'>" .
            "<a href='includes/deleteAccountant.php?id=$row[accountants_id]' style='color:white; border-color:white; margin-left:25px;'>Delete</a> </td></tr>"; 


        }
    }
}

function viewStudents($conn) {
    $sql = "SELECT * FROM students;";
    $result = mysqli_query($conn,$sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . 
            $row["students_id"] . "</td><td>" . 
            $row["name"] . "</td><td>" . 
            $row["email"] . "</td><td>" . 
            $row["course"] . "</td><td>" . 
            $row["due"] . "</td><td>" . 
            $row["address"] . "</td><td>" . 
            $row["contact"] . "</td><td style='border-top:solid 1px white;'>" .
            "<a href='includes/deleteStudent.php?id=$row[students_id]' style='color:white; border-color:white; margin-left:25px;'>Delete</a> </td></tr>"; 


        }
    }
}

function viewStudent($conn, $studentRollNumber) {
    $sql = "SELECT * FROM students WHERE students_id = '$studentRollNumber';";
    $result = mysqli_query($conn,$sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . 
            $row["students_id"] . "</td><td>" . 
            $row["name"] . "</td><td>" . 
            $row["email"] . "</td><td>" . 
            $row["course"] . "</td><td>" . 
            $row["due"] . "</td><td>" . 
            $row["address"] . "</td><td>" . 
            $row["contact"] . "<a href='includes/deleteStudent.php?id=$row[students_id]' style='color:white; border-color:white; margin-left:25px;'>Delete</a> </td></tr>"; 


        }
    }
}



function loginAdmin($conn, $userName, $password) {
    $uidExist = uidExist($conn, $userName, $userName);

    if($uidExist === false) {
        header("Location: index.php?error=wrongLogin");
        exit();
    }

        $dbpassword = $uidExist["password"];
    // $passwordHashed = $uidExist["password"];
    // $dbpassword = password_verify($password, $passwordHashed);
     


    if($dbpassword != $password) {
        header("Location: index.php?error=wrongLogin");
        exit();
    }
    else if ($dbpassword === $password) {
        session_start();
        $_SESSION["admins_id"] = $uidExist["admins_id"];
        $_SESSION["username"] = $uidExist["username"];
        
        header("Location: admin.php");
        exit();
    }

}

function loginAccountant($conn, $userName, $password) {
    $uidExist = uidExistAccountant($conn, $userName, $userName);

    if($uidExist === false) {
        header("Location: index.php?error=wrongLoginAccountant");
        exit();
    }

    //$dbpassword = $uidExist["password"];
    $passwordHashed = $uidExist["password"];
    $dbpassword = password_verify($password, $passwordHashed);

    if($dbpassword === false) {
        header("Location: index.php?error=wrongLoginAccountant");
        exit();
    }
    else if ($dbpassword === true) {
        session_start();
        $_SESSION["accountants_id"] = $uidExist["accountants_id"];
        $_SESSION["username"] = $uidExist["username"];
        
        header("Location: accountant.php?success");
        exit();
    }

}


