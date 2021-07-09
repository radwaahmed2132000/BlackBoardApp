<?php
session_start();
require_once 'Quiz.php';
if(isset($_POST['submit']))
{
    $Quiz=new Quiz();
    $Courseid=$_POST['id'];
    $email=$_POST['email'];
    if(empty($Courseid) || !is_numeric($Courseid) || $Courseid <0 || empty($email))
    echo"<script>alert('Your Course id is  empty or not exist or Your student mail is not valid'); window.location.href='../HTML/Course.php';</script>";
    else
    {
    
        $Quiz->EnrollCourse($Courseid,$email);
        echo"<script>alert('Your Student has been added'); window.location.href='../HTML/Course.php';</script>";
   
     

    }
   
}
?>