
<?php

////////////// more important this code prevents students to acess but not prevent another teacher who arenot taught cousre
/// you should add more validtions!!!
///////////////// you should add more js validtions aslo
/////////////  Quiz of student .check if time passed and student not get Quiz so put zero grade
// email after finsish
// user profile
// demo
// front
// time
session_start();
if(!isset($_SESSION['type']) ||
!isset($_SESSION['email']) ||  empty($_GET['id']))
header("Location:Login.html");
require_once '../PHP/Student.php';
require_once '../PHP/Quiz.php';
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../CSS/Home.css">
    <link rel="stylesheet" href="../CSS/Footer.css">
    <link rel="stylesheet" href="../CSS/User.css">
    <link rel="stylesheet" href="../CSS/Course.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link href="http://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet" type="text/css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link href="http://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
</head>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary ">
        <a class="navbar-brand" href="../HTML/Home.php">Educate</a>
        <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="my-nav" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto navs">
                
                        <li class="nav-item">
                            <a class="nav-link active" href="">Home</a>
                        </li>
                 

                <li class="nav-item">
                    <a class="nav-link" href="">User Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Courses</a>
                </li>

               
                    <li class="nav-item">
                        <a class="nav-link" href="../PHP/Logout.php">Log out</a>
                    </li>
                    
            </ul>
        </div>
    </nav>

    </nav>
</header>
<body>
   
</body>
<div class="container  mt-5 mb-3">
               <div class="col">
                   <form class="login" action ="../PHP/addStudent.php" method="post">
                    <label for="">Course ID</label><br>
                      <input type="text" name="id" id="Course"><br><br>
                      <label for="">Student  email</label><br>
                      <input type="email" name="email" id="Course"><br><br>
                      <button class="btn btn-primary" name="submit" type="submit">Add Student</button>
                      <br><br>
                   </form> 
             </div>
             <div class="col">

             </div>
</div>
<div class="container mt-5 mb-3 ">
    <div>
        <div class="row">
           
          
                    <?php
                    $Quiz=new Quiz();
                    $result=$Quiz-> GetStudents($_GET['id']);
                   
                       // If the query returns a result
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                                $Student=new Student();?>
                                    <div class="col-lg-2">
                                   <?php echo $Student->getProfilePicture($row["emailstudent"]);?>
                                
                                    </div>
                                    <div class="col-lg-10">
                    <h3>
                    <?php
                 
                       
                        echo $Student->getFName($row["emailstudent"])."  " .$Student->getLName($row["emailstudent"]);
                       ?> 
                       
                    <?php   
                  
                  
                    ?>  
                    </h3>
                    <?php    echo $row["emailstudent"];?>
                    <br><br>
                    <button class="btn btn-primary" type="button"><a href="QuizeOfStudent.php?email=<?php echo $row["emailstudent"];?>&id=<?php echo $_GET['id']; ?>">View Quizes</a></button>
                    <button class="btn btn-danger" type="button"><a href="../PHP/RemoveStudent.php?email=<?php echo $row["emailstudent"];?>&id=<?php echo $_GET['id']; ?>">Remove Student</a></button>
            </div>
                            <?php
                               
                            
                            }
                        }
                
                        
                
                    ?>  
                   
               
            
           
           
            
        </div>
        <div>

        </div>
    </div>
   
</div>
<script src="../bootstrap/bootstrap.js"></script>
<script src="../bootstrap/jquery.js"></script>
<script src="../bootstrap/popper.main.js"></script>
</html>