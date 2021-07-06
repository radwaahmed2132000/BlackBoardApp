<?php
  require_once 'Quiz.php';
  $Quizid=$_GET['id'];
  $Quiz=new Quiz();
  $Quiz->Deleteanswers($Quizid);
  $Quiz->DeleteAssigned($Quizid);
  $Quiz->DeleteFromQues($Quizid);
  $Quiz->DeleteQuiz($Quizid);
  echo'<script>alert("Quiz Deleted");window.location.href="../HTML/QuizofTeacher.php";</script>';

    
?>