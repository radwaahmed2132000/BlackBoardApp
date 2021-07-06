<?php
session_start();
   require_once 'Quiz.php';
   if(isset($_POST['submit']))
   {
    $Quiz=new Quiz();
    $Course=$_POST['Course'];
    echo $Course;
    if(empty($Course))
       echo"<script>alert('Your Coursname is  empty'); window.location.href='../HTML/Course.php';</script>";
   else
    $Quiz->addCousre($Course,$_SESSION['email']);
    header("Location:../HTML/Course.php");
   }
?>