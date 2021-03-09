<?php
session_start();
include_once 'includes/dbh.inc.php';

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
                            <li><a href="index.php">Home</a></li>

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
                    <div class="login-form">
                    <form action="admin.php" method="post">
                        <h2>Admin Login</h2>
                        
                        <div class="textbox">

                            
                                <i class="fas fa-user"></i>
                                <input type="text" placeholder="Username / Email" name="adminUsername" value="">
                        </div>
                        <div class="textbox">
                            <i class="fas fa-key"></i>


                            <input type="password" placeholder="Password" name="adminPassword" value="">
                        </div>




                        
                        <button id="uniqueButton" type="submit" name="adminLogin">Login</button>
                        <div class="errorText">
                        <?php
                            if(isset($_GET["error"])) {
                                if ($_GET["error"] == "emptyinput") {
                                    echo "<p>Fill in all fields</p>";
                                } else if ($_GET["error"] == "invalidUid") {
                                    echo "<p>Choose a proper username!</p>";
                                }else if($_GET["error"] == "wrongLogin") {
                                    echo "<p>Incorrect username or password!</p>";
                                }
                                 else if ($_GET["error"] == "passwordsdontmatch") {
                                    echo "<p>Password doesn't match!</p>";
                                } else if ($_GET["error"] == "stmtfailed") {
                                    echo "<p>Something went wrong</p>";
                                } else if($_GET["error"] == "invalidjoinadmin") {
                                    echo "<p>Nice Try!</p>";
                                } else if($_GET["error"] == "userDoesNotExist") {
                                    echo "<p>User Does Not Exist!</p>";
                                }

                            }
                        ?>
                        </div>

                        </form>




                    </div>







                </div>








                <div class="col-md-6">
                    <div class="login-form">
                        <form action="accountant.php" method="post">
                        <h2>Accountant Login</h2>
                        <div class="textbox">
                            <i class="fas fa-user"></i>
                            <input type="text" placeholder="Username / Email" name="accountantUsername" value="">
                        </div>
                        <div class="textbox">
                            <i class="fas fa-key"></i>
                            <input type="password" placeholder="Password" name="accountantPassword" value="">
                            
                        </div>


                       
                        
                        <button id="uniqueButton" type="submit" name="accountantLogin">Login</button>
                        <div class="errorText">
                            <?php
                                if(isset($_GET["error"])) {
                                    if ($_GET["error"] == "invalidjoinaccountant") {
                                        echo "<p>Nice try!</p>";
                                    } else if ($_GET["error"] == "emptyinputaccountant") {
                                        echo "<p>Fill in all fields!</p>";
                                    }
                                    else if ($_GET["error"] == "wrongLoginAccountant") {
                                        echo "<p>Incorrect username or password!</p>";
                                    }
                                }

                            ?>


                        </div>
                        </div>
                    </div>

                </div>





            </div>





        </div>



    </div>


    <?php
    include_once 'footer.php';
    ?>