<?php

require_once 'Quiz.php';
$Courseid=$_GET['id'];
$Quiz=new Quiz();
$Quiz->DeleteanswersbyEmails($_GET['email']);
$Quiz->DeleteAssignedbyEmails($_GET['email']);
$Quiz->DeleteFromEnrolled($Courseid ,$_GET['email']);
echo'<script>alert("Student has been Removed Successfully");window.location.href="../HTML/Course.php";</script>';

?>