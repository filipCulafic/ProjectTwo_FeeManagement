<?php
    session_start();
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
    <title>Accountant Panel</title>
</head>
<body>
    <header>
    <?php 
        if(isset($_POST["accountantLogin"])) {
            require_once "includes/dbh.inc.php";
            require_once "includes/functions.inc.php";

            $userName = $_POST["accountantUsername"];
            $password = $_POST["accountantPassword"];
                                

            if (emptyInputLogin($userName,$password) !== false) {
                header("Location: index.php?error=emptyinputaccountant");
                exit();
            }

            loginAccountant($conn, $userName,$password);
            }

         

  
    ?>




        <div class="nav-bar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class ="nav-list">
                         <li><img src="images/logo_white.png" alt=""></li>   


                         <?php
                        
                         if (isset($_SESSION["accountants_id"])) {
                               echo "<li><a href=''>Home</a></li>";
                               echo "<li><a href='includes/logout.inc.php'>Logout</a></li>";
                
                            } else {
                                header("Location: index.php");
                                exit();
                            }
                            
                        ?>
                    
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="section">
        <div class="container">
            <div class="row">
                
                <div class="col-md-4">
                    <div class="view-student">
                        <i class="far fa-eye fa-4x" id="accountant-icon"></i>
                        <h3>View Students</h3>
                        <p>Here you can see a list of all students <br> that are in a database</p>
                        <a href="viewStudents.php">Take a look</a>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="view-student">
                        <i class="fas fa-user-plus fa-4x" id="accountant-icon"></i>
                        <h3>Add Student</h3>
                        <p>Here you can add a student to <br> database</p>
                        <a href="addStudent.php">Click here</a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="view-student">
                        <i class="fas fa-user-edit fa-4x" id="accountant-icon"></i>
                        <h3>Edit Student</h3>
                        <p>Here you can add an accountant to <br>our company</p>
                        <a href="">Click here</a>
                    </div>
                </div>

    


            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="view-student">
                        <i class="fas fa-search fa-4x" id="accountant-icon"></i>
                        <h3>Search Student</h3>
                        <p>Here you can find student <br> by their Roll Number</p>
                        <a href="searchStudent.php">Take a look</a>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="view-student">
                        <i class="fas fa-user-minus fa-4x" id="accountant-icon"></i>
                        <h3>Delete Student</h3>
                        <p>Here you can remove a student <br> from database</p>
                        <a href="">Click here</a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="view-student">
                        <i class="fas fa-money-check-alt fa-4x" id="accountant-icon"></i>
                        <h3>View Dues</h3>
                        <p>Here you can find everything about <br> student dues</p>
                        <a href="">Click here</a>
                    </div>
                </div>

        
            </div>



        </div>


    </div>



<?php
    include_once 'footer.php'


?>