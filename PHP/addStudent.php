<?php
session_start();
require_once 'Quiz.php';
if(isset($_POST['submit']))
{
    $Quiz=new Quiz();
    $Courseid=$_POST['id'];
    $email=$_POST['email'];
    // check validtions of input , not empty , not negative grade .. etc
    if(empty($Courseid) || !is_numeric($Courseid) || $Courseid <0 || empty($email))
    echo"<script>alert('Your Course id is  empty or not exist or Your student mail is not valid'); window.location.href='../HTML/Course.php';</script>";
    else
    {
        // The teacher added new Student 
        $Quiz->EnrollCourse($Courseid,$email);
        echo"<script>alert('Your Student has been added'); window.location.href='../HTML/Course.php';</script>";
   
     

    }
   
}
?>