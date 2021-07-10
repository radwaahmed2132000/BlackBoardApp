<?php
  require_once 'Quiz.php';
  $Quizid=$_GET['id'];

  $Quiz=new Quiz();
  // delete Quiz for student
  //delete answers of student
  $Quiz->DeleteanswersbyEmail($Quizid,$_GET['email']);
  // delete from assigned quizes
  $Quiz->DeleteAssignedbyEmail($Quizid,$_GET['email']);

  echo'<script>alert("Quiz Deleted");window.location.href="../HTML/QuizofTeacher.php";</script>';

    
?>