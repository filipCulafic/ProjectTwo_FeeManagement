<?php
include_once 'includes/dbh.inc.php';
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
    <title>Accountant Panel</title>
</head>
<body>
    <header>



        <div class="nav-bar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class ="nav-list">
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
            <div class="row">
                <div class="col-lg-4">


                </div>

                <div class="col-lg-4">
                    <div class="login-form">
                    <form action="includes/addStudent.inc.php" method="post">
                        <h2 style="text-align: center;">Add Student Form</h2>
                        
                        <div class="textbox">
                                <i class="fas fa-user"></i>
                                <input type="text" placeholder="Full Name" name="name" value="">
                        </div>


                        <div class="textbox">
                            <i class="fas fa-graduation-cap"></i>

                            <select name="courses" id="" style="background:none; outline:none; color:white; width: 90%; border:none;">
                         <!--   <input type="text" placeholder="Course" name="course" value="">  -->
                            <option value="" style="background-color: #8403fc;">Select course</option>
                            <option value="Java" style="background-color: #8403fc;">Java</option>
                            <option value="Python" style="background-color: #8403fc;">Python</option>
                            <option value="C++" style="background-color: #8403fc;">C++</option>   
                            <option value="PHP" style="background-color: #8403fc;">PHP</option>
                            </select>
                        </div>

                        <div class="textbox">
                            <i class="fas fa-envelope"></i>


                            <input type="text" placeholder="Email" name="email" value="">
                        </div>
                        
                        <div class="textbox">
                            <i class="fas fa-map-marked-alt"></i>


                            <input type="text" placeholder="Address" name="address" value="">
                        </div>

                        <div class="textbox">
                            <i class="fas fa-phone-alt"></i>


                            <input type="text" placeholder="Phone Number" name="contact" value="">
                        </div>





                        
                        <button id="uniqueButton"  type="submit" name="addStudent">Add Student</button>
                        <div class="errorText">
                            <?php
                                

                                

                                if(isset($_GET["error"])) {
                                    if($_GET["error"] == "emptyStudentInput") {
                                        echo "Please fill up all fields!";
                                    }
                                    if ($_GET["error"] == "none") {
                                        echo "You have successfully added a student";
                                    }



                                }

                                


                            ?>



                        </div>

                        </form>
                        
                        
                    </div>
                </div>


                <div class="col-lg4">


                </div>





            </div>





        </div>



    </div>


                


















<?php
    include_once 'footer.php';


?>