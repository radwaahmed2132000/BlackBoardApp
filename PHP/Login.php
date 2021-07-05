<?php
require_once 'Student.php';
require_once 'Teacher.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_POST["submit"])) 
{
    $email=$_POST['email'];
    $Pass=$_POST['pass'];

     $Student= new Student();
      $Teacher=new Teacher();
     if($Student-> getemail($email)!=null)
     {
        if($Student->getPass($email,md5($Pass))!=null)
        {
            $_SESSION['type']="Student";
            $_SESSION['email']=$email;
            header("Location:../HTML/Home.php");
        }
        else{
            echo"<script>alert('Your Password incorect, Please try again'); window.location.href='../HTML/Login.html';</script>";
        }
     }
     else if($Teacher->getemail($email)!=null)
     {
        if($Teacher->getPass($email,md5($Pass))!=null)
        {
            $_SESSION['type']="Teacher";
            $_SESSION['email']=$email;
             header("Location:../HTML/Home.php");
        }
        else{
            echo'<script>alert("Your Password incorect, Please try again"); window.location.href="../HTML/Login.html";</script>';
        }
     }
     else
     {
        echo'<script>alert("Your email not found, Please try again or Sign Up");window.location.href="../HTML/Login.html";</script>';
     }
    
}




?>