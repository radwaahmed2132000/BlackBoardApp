<?php
require_once 'Quiz.php';
 if(isset($_POST['submit']))
 {
     $Quizname=$_POST['Quizname'];
    $Grade=$_POST['Grade'];
    $DateofQuiz =$_POST['date'];
    $startofQuiz =$_POST['start'];
    $EndofQuiz= $_POST['end'];
    $Quizid=$_GET['id'];
    echo "iiii";
    //check validtion of Quiz
    if(empty($Grade) || empty($DateofQuiz) || empty($startofQuiz) ||empty($EndofQuiz))
    {
        echo"<script>alert('Empty Data!!'); window.location.href='../HTML/Course.php';</script>"; 
    }
    // if( $startofQuiz>=  $EndofQuiz)
    // {
    //     echo"<script>alert('Invalid Time for Quiz!!'); window.location.href='../HTML/Course.php';</script>";

    // }
    else if( $DateofQuiz<date("Y-m-d"))
    {
        echo"<script>alert('Invalid Date for Quiz'); window.location.href='../HTML/Course.php';</script>";

    }
    // else if( $DateofQuiz==date("Y-m-d"))
    // {
    //     if($startofQuiz<date("h:i:s"))
    //     echo"<script>alert('Invalid Time for Quiz'); window.location.href='../HTML/CreateQuiz.php';</script>";


    // }
    else if($Grade<0)
    echo"<script>alert('Invalid Grade'); window.location.href='../HTML/CreateQuiz.php';</script>";
    else{
        echo "iam here";
      $Quiz=new Quiz();
      //change data of Quiz like name ,time ,date
      $Quiz->UpdateQuiz($Quizname,$Grade,$DateofQuiz, $startofQuiz,$EndofQuiz,$Quizid);
      echo"<script> window.location.href='../HTML/Course.php';</script>"; 
    }
 }


?>