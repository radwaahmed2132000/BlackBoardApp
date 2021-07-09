<?php
  require_once 'Quiz.php';
  $Quizid=$_GET['id'];

  $Quiz=new Quiz();
  $Quiz->DeleteanswersbyEmail($Quizid,$_GET['email']);
  $Quiz->DeleteAssignedbyEmail($Quizid,$_GET['email']);

  echo'<script>alert("Quiz Deleted");window.location.href="../HTML/QuizofTeacher.php";</script>';

    
?>