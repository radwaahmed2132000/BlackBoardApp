<?php
require_once '../PHP/Quiz.php';
session_start();
if(!isset($_SESSION['type']) ||
!isset($_SESSION['email']))
header("Location:Login.html");
if($_SESSION['type']=="Student" || empty($_GET['id']) || empty($_GET['email']))
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
    <link rel="stylesheet" href="../CSS/CreateQuiz.css">
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
    <title>Create Quiz</title>
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
                            <a class="nav-link active" href="Home.php">Home</a>
                        </li>
                 

                <li class="nav-item">
                    <a class="nav-link" href="">User Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Course.php">Courses</a>
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
   
        
  <div class="container mt-5 mb-3 ">
    <div class="row">
      <div class="col-lg-4">
        <form class="login" method="post" action="../PHP/EditGrade.php?id=<?php echo $_GET['id'];?>&email=<?php echo $_GET['email'];?>">
         <?php
           $Quizid =$_GET['id'];
           $Quiz=new Quiz();
           if(empty($_GET['id']))
           header("Location:Home.php");
                   $date=date("Y-m-d");
                  
                   $time= date("h:i:s");
                  
                  if($date> $Quiz->GetDateofQuiz($Quizid) )
                   {
                    header("Location:Home.php");
                   }
                //    else if($date==$Quiz->GetDateofQuiz($Quizid))
                //     if( $time>$Quiz->GetEndofQuiz($Quizid))
                //    {
                //     header("Location:Home.php");
                        
                //    }
         ?>
          <div  id="id01">
            <div class="Quiz">
                <label for="">Quiz name</label><br>
                <input type="text" name="Quizname" id="Quizname" disabled value="<?php echo $Quiz->Getname($Quizid)?>"><br>
                <label for="">Grade</label><br>
                <input type="number" name="Grade" id="Grade" value="<?php echo $Quiz->Getmygrade($_GET['email'],$Quizid)?>" />
                <br>
                <label for="">Date of Quiz</label><br>
                <input type="date" name="date" id="date" disabled value="<?php echo $Quiz->GetDateofQuiz($Quizid);?>">
                <br>
                <br>
                <label for="">Time of start</label><br>
                <input type="time" name="start" id="start" disabled value="<?php echo $Quiz->GetstartofQuiz($Quizid);?>">
                <br>
                <br>
                <label for="">Time of end</label><br>
                <input type="time" name="end" id="end" disabled value="<?php echo $Quiz->GetEndofQuiz($Quizid);?>">
                <br><br>
               
            
            </div>

        
    

          </div>
         
            <button class="btn btn-primary" name="submit" type="submit">Edit Grade</button>
            <h5 >
    “Education is what survives when what has been learned is forgotten.” 

            </h5>
            -BF Skinner. 
        
        </form>
       
      </div>
      <div class="col-lg-8">
           <img class="img-fluid" src="../Images/bermuda-school-teacher-near-the-blackboard-1.png" alt="">
          
      </div>
    </div>
    <div>
    </div>

       

    </div >
   
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
<script src="../bootstrap/jquery.js"></script>
<script src="../bootstrap/bootstrap.js"></script>

<script src="../bootstrap/popper.main.js"></script>



</html>