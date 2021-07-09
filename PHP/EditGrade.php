<?php
require_once 'Quiz.php';
session_start();
if(isset($_POST["submit"]))
{
     
     $Quizid=$_GET['id'];
     $studentemail=$_GET['email'];
     $Grade=$_POST['Grade'];
     $Quiz=new Quiz();
   $QuizGrade=  $Quiz->GetGrade($Quizid);
   if(empty($Grade) ||  $Grade<0  ||$Grade>$QuizGrade)
   {
    echo'<script>alert("Grade not valid");window.location.href="../HTML/Home.php";</script>';
   }  
   else
   {
     
        $Quiz-> UpdateMygrade($studentemail,$Quizid ,$Grade);
        echo'<script>alert("Grade has been edited");window.location.href="../HTML/Home.php";</script>';
    }

}
?>