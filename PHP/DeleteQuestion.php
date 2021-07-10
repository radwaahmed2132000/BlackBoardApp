<?php

require_once 'Quiz.php';
$Quesid=$_GET['id'];
$Quiz=new Quiz();
// Delete Question from quiz
$Quizid=$Quiz-> GetQuizids($Quesid);
$numberofQues=$Quiz-> countquestions($Quizid);
echo $numberofQues;
// delete answers if any one answer question
$Quiz->DeleteAnswer($Quesid);
$Quiz->DeleteQues($Quesid);
if($numberofQues==1)
{
    // Quiz contains on Question and deleted  so Quiz becomes Empty

    $Quiz->DeleteAssigned($Quizid);
    $Quiz->DeleteQuiz($Quizid);
}



echo'<script>alert("Question has been  Deleted");window.location.href="../HTML/QuizofTeacher.php";</script>';



?>