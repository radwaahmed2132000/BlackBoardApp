<?php
 require_once '../PHP/Quiz.php';
session_start();
if(!isset($_SESSION['type']) ||
!isset($_SESSION['email']))
header("Location:Login.html");
if($_SESSION['type']=="Student"|| empty($_GET['id']) || empty($_GET['email']))
header("Location:Home.php");
$Quiz=new Quiz();
$teacheremail=$Quiz->GetTeacheremail($_GET['id']);
if($teacheremail!=$_SESSION['email'])
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
   <div class="container mt-5 ">
      <form method="post" action="../PHP/Assign.php">  
       <div class="row">
           <div class="col-lg-3">
                <img class="img-fluid" src="../Images/clip-school-assignment.png" alt="">

           </div>
           <div class="col-lg-6">
          
           <?php

                
                
                    if(empty($_GET['email']) ||empty($_GET['id']))
                   header("Location:Home.php");
                   $Quiz=new Quiz();
                //    echo $_GET['email'];
                //     echo $_GET['id'];
                  $ids=$Quiz->GetID($_GET['id']);
                 if($ids->num_rows > 0) 
                 {
                     
                    while ($id = $ids->fetch_assoc())
                   { 
                       $Quizid=$id['Quizid'];

                    //    echo $Quizid;
                      $result= $Quiz->GetQuestions($Quizid);
                      $date=date("Y-m-d");
                  
                   $time= date("h:i:s");
                //    && $time>=$Quiz->GetEndofQuiz($Quizid)
                $Gr=$Quiz-> Getmygrade($_GET['email'],$Quizid);
                 if( isset($Gr))
                  if($date>= $Quiz->GetDateofQuiz($Quizid)  )
                   {
                     
                  
                    // If the query returns a result
                    if ($result->num_rows > 0) {
                        
                      
                      
                        ?>
                       <div class="options">
                          <h3><?php echo $Quiz-> Getname($Quizid);?></h3>
                          <br>
                          Grade: <?php echo $Quiz->Getmygrade($_GET['email'],$Quizid)  ?> /<?php echo $Quiz->GetGrade($Quizid);?>
     
                          <button class="btn btn-danger" type="button"><a href="../PHP/DeleteQuizOfStudent.php?id=<?php echo $Quizid?>&email=<?php echo $_GET['email'];?>">Delete Quiz</a></button>
                               
                               <button class="btn btn-primary" type="button"><a href="EditGrade.php?id=<?php echo $Quizid?>&email=<?php echo $_GET['email'];?>">Edit Quiz Grade </a></button>    
                      </div>   
                    
                    <?php
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                           $myanswer=  $Quiz->Getmyanswer($row["Quesid"],$Quizid,$_GET['email'])
                            ?>
                          <div class="Questions">
                            <h5> <?php echo $Quiz-> GetQues($row["Quesid"]);?> </h5>
                            
                            <p>
                                <?php
                                  if($myanswer=="choice1")
                                  {
                                      ?>
                                            <input type='radio' class='Ques' name="<?php echo $row["Quesid"];?>"   checked disabled value='choice1' >
                                        <?php 
                                  }
                                  else
                                  {
                                      ?>
                                       <input type='radio' class='Ques' name="<?php echo $row["Quesid"];?>"    disabled value='choice1' >
                                      <?php
                                  }
                                ?>
                               
                                <?php
                                    echo $Quiz->Getchoice1($row["Quesid"]);
                                ?>
                            </p>
                            
                            <p>
                            <?php
                                  if($myanswer=="choice2")
                                  {
                                      ?>
                                            <input type='radio' class='Ques' name="<?php echo $row["Quesid"];?>"   checked disabled value='choice2' >
                                        <?php 
                                  }
                                  else
                                  {
                                      ?>
                                       <input type='radio' class='Ques' name="<?php echo $row["Quesid"];?>"    disabled value='choice2' >
                                      <?php
                                  }
                                ?>
                                <?php
                                    echo $Quiz->Getchoice2($row["Quesid"]);
                                ?>
                            </p>
                            
                            <p>
                            <?php
                                  if($myanswer=="choice3")
                                  {
                                      ?>
                                            <input type='radio' class='Ques' name="<?php echo $row["Quesid"];?>"   checked disabled value='choice3' >
                                        <?php 
                                  }
                                  else
                                  {
                                      ?>
                                       <input type='radio' class='Ques' name="<?php echo $row["Quesid"];?>"    disabled value='choice3' >
                                      <?php
                                  }
                                ?>
                                <?php
                                    echo $Quiz->Getchoice3($row["Quesid"]);
                                ?>
                            </p>
                            
                            <p>
                            <?php
                                  if($myanswer=="choice4")
                                  {
                                      ?>
                                            <input type='radio' class='Ques' name="<?php echo $row["Quesid"];?>"   checked disabled value='choice4' >
                                        <?php 
                                  }
                                  else
                                  {
                                      ?>
                                       <input type='radio' class='Ques' name="<?php echo $row["Quesid"];?>"    disabled value='choice4' >
                                      <?php
                                  }
                                ?>
                                <?php
                                    echo $Quiz->Getchoice4($row["Quesid"]);
                                ?>
                            </p>
                            <!-- <button class="btn btn-danger" type="button"><a href="../PHP/DeleteQuestion.php?id=<?php echo $row["Quesid"];?>">Delete Question</a></button>
                               
                               <button class="btn btn-primary" type="button"><a href="EditQuestion.php?id=<?php echo $row["Quesid"];?>">Edit Question </a></button>     -->
                              
                               Answer: <?php $Correct=$Quiz->Getcorrect($row["Quesid"]);
                               if($Correct=="choice1")
                               {
                                echo $Quiz->Getchoice1($row["Quesid"]);
                               }
                               else if($Correct=="choice2")
                               {
                                echo $Quiz->Getchoice2($row["Quesid"]);
                               }
                               else if($Correct=="choice3")
                               {
                                echo $Quiz->Getchoice3($row["Quesid"]);
                               }
                               else if($Correct=="choice4")
                               {
                                echo $Quiz->Getchoice4($row["Quesid"]);
                               }
                            ?> 
                            <br>     
                            
                                 
                                
                                
                        </div>    
                     <?php  }
                    }
                    }
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
    <div class="container">
       <div class="row">
           <div class="col-lg-3">
                <h5>???COVID 19 is the Biggest challenge for science
                        But it is the biggest Exam for Humanity.
                        Our People are dying, it's not in our hands
                        But it's in our hands, don't let Pandemic Kill Humanity???</h5>
                        ??? Mohammed Zaki Ansari
           </div>
           <div class="col-lg-9">
               <img class="img-fluid" src="../Images/spot-talent.png" alt="">
           </div>
       </div>    
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


<script src="../bootstrap/jquery.js"></script>
<script src="../bootstrap/popper.main.js"></script>
<script src="../bootstrap/bootstrap.js"></script>

</html>