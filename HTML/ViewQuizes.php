<?php
 require_once '../PHP/Quiz.php';
session_start();
if(!isset($_SESSION['type']) ||
!isset($_SESSION['email']))
header("Location:Login.html");
if($_SESSION['type']=="Teacher")
header("Location:Home.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../CSS/Home.css">
    <link rel="stylesheet" href="../CSS/Footer.css">
    <link rel="stylesheet" href="../CSS/QuizOfTeacher.css">
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
    <title>QuizOfTeacher</title>
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
   <div class="container mt-5 ">
      <form method="post" action="../PHP/Assign.php">  
       <div class="row">
           <div class="col-lg-3">
                <img class="img-fluid" src="../Images/clip-school-assignment.png" alt="">

           </div>
           <div class="col-lg-6">
          
           <?php

                   
                  
                  $Courseid=$_GET['id'];
                  if(empty($_GET['id']))
                  header("Location:Home.php");
                   $Quiz=new Quiz();
                  $ids=$Quiz->GetID($Courseid);
                 if($ids->num_rows > 0) 
                 {
                    while ($id = $ids->fetch_assoc())
                   { 
                       $Quizid=$id['Quizid'];
                    
                    // If the query returns a result
                    if ($ids->num_rows > 0) {?>
 
                    <?php
                        // output data of each row
                      
                         
                            ?>
                          <div class="Questions">
                          <h5><?php echo $Quiz-> Getname($Quizid);?></h5>
                            <p>

                        <?php
                           echo $Quiz-> GetDateofQuiz($Quizid)."   ";
                           
                           echo $Quiz->GetstartofQuiz($Quizid)."   ";
                           echo $Quiz->GetEndofQuiz($Quizid)."   <br>";

                           $myGrade= $Quiz-> Getmygrade($_SESSION['email'],$Quizid);
                          
                           $Grade=$Quiz->GetGrade($Quizid);
                           if($Grade!=null)
                           {
                               echo "Grade: ".$myGrade."/".$Grade;
                           }
                           
                         ?>
                           </p>
                           
                           
                            
                         <button class="btn btn-primary" type="button"><a href="Quiz.php?id=<?php echo $Quizid;?>">Start Quiz</a></button>
                         <button class="btn btn-primary" type="button"><a href="Reviewanswers.php?id=<?php echo $Quizid;?>&studentemail=<?php echo $_SESSION['email']; ?>">Review Answers</a></button>  
                          
                              
                                    
                                 
                                
                                
                        </div>    
                     <?php  }
                    }
                }
                

                ?>
                  
           </div>
           <div class="col-lg-3">
               <img class="img-fluid" src="../Images/karlsson-65.png" alt="">
               
           </div>
       </div>
      </form>
    </div>
        
    </div>
    <div>
        <footer id="footer">
    
            <a href="#" class="fab fa-facebook"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-google"></a>
    
        </footer>
        <div class="copy">
            <small>
                <p class="ourcopy">&copy;Copyright Educate. All Rights Reserved</p>
            </small>
            <small>
                <p class="ourcopy"> Developed with <i class="fas fa-heart" style="color:red;"></i> by Hack
                </p>
            </small>
        </div>
        </div>
       
    </div>
    
</body>



<script src="../bootstrap/bootstrap.js"></script>
<script src="../bootstrap/jquery.js"></script>
<script src="../bootstrap/popper.main.js"></script>
</html>