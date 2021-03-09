<?php
include_once 'includes/dbh.inc.php';
include_once 'includes/functions.inc.php';
session_start();
if (!isset($_SESSION["accountants_id"])) {
    header("Location: index.php");
    exit();
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/ca928233c4.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" type="image/png" href="images/icon.png">
    <title>Fee Management</title>

</head>

<body>



    <header>
        <div class="nav-bar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav-list">
                            <li><img src="images/logo_white.png" alt=""></li>
                            <li><a href="accountant.php">Home</a></li>
                            <li><a href="includes/logout.inc.php">Logout</a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="section">
        <div class="container">
        <div class="row" style="height: 230px;">
                <div class="col-lg-4">
                </div>
                <div class="col-lg-4">
                    <div class="login-form" style="padding-left: 0px;">
                    <form action="searchStudent.php" method="post">
                        <h2>Search Student</h2>
                        
                        <div class="textbox">
                                <i class="fas fa-user"></i>
                                <input type="text" placeholder="Student Roll Number" name="studentRollNumber" value="">
                        </div>
   
                        <button id="uniqueButton" type="submit" name="searchStudent">Search</button>
                        <div class="errorText">

                        </div>

                        </form>
                        
                        
                        
                    </div>
                </div>
                <div class="col-lg4">
                    
                </div>

                
            </div>

            <div class="row">
                <div class="col-md-12">
                    <?php
                if (isset($_POST["searchStudent"])) {
                        $rollNumber = $_POST["studentRollNumber"];

                            if (empty($rollNumber)) {
                                echo "<H4 style='text-align:center; color:white;'>Please enter a roll Number! </H4>";
                                exit();
                            }

                            if (uidExistStudent($conn, $rollNumber)) { 
                              echo "<H4 style='text-align:center; color:white;'>Student has been found! </H4>";

                          echo "        <table>
                          <tr>
                              <th>Roll Number</th>
                              <th>Full Name</th>
                              <th>Email</th>
                              <th>Course</th>
                              <th>Due ($)</th>
                              <th>Address</th>
                              <th>Phone Number</th>
                          </tr>";


                             viewStudent($conn, $rollNumber);

                             echo "</table>";
                        } else {
                            echo "<H4 style='text-align:center; color:white;'>There is no student with roll number $rollNumber</H4>";
                        }
                    }
                ?>

                </div>

            </div>

        


        </div>


    </div>
   
    <?php
    include_once 'footer.php';
    ?>