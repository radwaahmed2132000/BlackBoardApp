<?php
  require_once 'Quiz.php';
  $Quizid=$_GET['id'];
  $Quiz=new Quiz();
  //Delete Answers of Quiz
  $Quiz->Deleteanswers($Quizid);
// Delete any value of any one assigned to this Quiz
  $Quiz->DeleteAssigned($Quizid);
  //delete Questions of Quizes
  $Quiz->DeleteFromQues($Quizid);
  // delete Quiz
  $Quiz->DeleteQuiz($Quizid);
  echo'<script>alert("Quiz Deleted");window.location.href="../HTML/QuizofTeacher.php";</script>';

    
?>