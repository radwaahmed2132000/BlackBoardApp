<?php

require_once 'Quiz.php';
$Courseid=$_GET['id'];
$Quiz=new Quiz();
// Delete student from course
// delete all answers of student for quizes
$Quiz->DeleteanswersbyEmails($_GET['email']);
// delete assigned quizesfor student
$Quiz->DeleteAssignedbyEmails($_GET['email']);
//delete from course  
$Quiz->DeleteFromEnrolled($Courseid ,$_GET['email']);
echo'<script>alert("Student has been Removed Successfully");window.location.href="../HTML/Course.php";</script>';

?>