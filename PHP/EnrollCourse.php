<?php
session_start();
require_once 'Quiz.php';
if(isset($_POST['submit']))
{
    $Quiz=new Quiz();
    $Courseid=$_POST['ID'];
    $teacheremail=$_POST['email'];
    if(empty($Courseid) || !is_numeric($Courseid) || $Courseid <0)
    echo"<script>alert('Your Course id is  empty or not exist or Your mail teacher is not valid'); window.location.href='../HTML/Course.php';</script>";
    else
    {
        $result=$Quiz->GetCoursename($teacheremail,$Courseid);
        if(!empty($result))
       { $Quiz->EnrollCourse($Courseid,$_SESSION['email']);
        echo"<script>alert('Your Course has been added'); window.location.href='../HTML/Course.php';</script>";
       }
       else
       echo"<script>alert('Your Course id is  empty or not exist or Your mail teacher is not valid'); window.location.href='../HTML/Course.php';</script>";

    }
   
}
?>