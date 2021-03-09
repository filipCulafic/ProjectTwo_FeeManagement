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
    <title>Admin Panel</title>
</head>
<body>
    <header>
      <?php
       if(isset($_POST["adminLogin"])) {
            require_once 'includes/dbh.inc.php';
            require_once 'includes/functions.inc.php';

            $userName = $_POST["adminUsername"];
            $password = $_POST["adminPassword"];



            if (emptyInputLogin($userName, $password) !== false) {
                header("Location: index.php?error=emptyinput");
                exit();
            }

            loginAdmin($conn, $userName,$password);
       } 

    ?>
    




        <div class="nav-bar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class ="nav-list">
                            <li><img src="images/logo_white.png" alt=""></li>   
                            <?php 

                            if (isset($_SESSION["admins_id"])) {
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
                
                <div class="col-md-6">
                    <div class="view-accountant">
                        <i class="far fa-eye fa-4x" id="accountant-icon"></i>
                        <h3>View Accountant</h3>
                        <p>Here you can see a list of all company accountants</p>
                        <a href="viewAccountant.php">Take a look</a>



                </div>
                
            
            </div>
                
                <div class="col-md-6">
                    <div class="view-accountant">
                        <i class="fas fa-user-plus fa-4x" id="accountant-icon"></i>
                        <h3>Add Accountant</h3>
                        <p>Here you can add an accountant to our company</p>
                        <a href="addAccountant.php">Click here</a>


                    </div>

                
                
                </div>
    


            </div>



        </div>


    </div>



<?php
    include_once 'footer.php';
?>