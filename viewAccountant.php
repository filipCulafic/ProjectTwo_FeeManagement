<?php
include_once 'includes/dbh.inc.php';
include_once 'includes/functions.inc.php';
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
    <title>Fee Management</title>

</head>

<body>
    <?php 
        if(!isset($_SESSION["admins_id"])) {
            header("Location: index.php?error=invalidjoinadmin");
        } 
    ?>



    <header>
        <div class="nav-bar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav-list">
                            <li><img src="images/logo_white.png" alt=""></li>
                            <li><a href="admin.php">Home</a></li>
                            <li><a href="includes/logout.inc.php">Logout</a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="section">
        <div class="container">
            <table>
                <tr>
                    <th>Accountant ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    


                </tr>
                <div class="row-">
                    <col-md-12>
                    <h3 style="color:white; text-align:center">Table of all accountants in a database</h3>
                    
                    
                    </col-md-12>
                </div>

                <?php
                viewAccountants($conn);
                ?>
                


            </table>






        </div>







    </div>
   


    <?php
    include_once 'footer.php';
    ?>