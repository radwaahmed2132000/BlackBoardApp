<?php
session_start();
   require_once 'Quiz.php';
   if(isset($_POST['submit']))
   {
    $Quiz=new Quiz();
    $Course=$_POST['Course'];
    echo $Course;
    // check if Course not empty
    if(empty($Course))
       echo"<script>alert('Your Coursname is  empty'); window.location.href='../HTML/Course.php';</script>";
   else
   // add Course of teacher
    $Quiz->addCousre($Course,$_SESSION['email']);
    header("Location:../HTML/Course.php");
   }
?>