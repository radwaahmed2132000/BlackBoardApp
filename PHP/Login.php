<?php
require_once 'Student.php';
require_once 'Teacher.php';
require_once 'Quiz.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_POST["submit"])) 
{ 
    $emailed=false;
    $DateofQuiz=date("Y-m-d");
    $EndofQuiz= date("h:i:s");
    $Quiz=new Quiz();
    // send email for all teachers which quizes are ended and not get email
    $Quiz-> Getnotemailed($emailed,$DateofQuiz,$EndofQuiz);
    $email=$_POST['email'];
    $Pass=$_POST['pass'];
    // check validtion for input
    if(empty($email) || empty($Pass))
    {
        echo'<script>alert("Some fields are empty or not checked!");window.location.href="../HTML/Login.html";</script>';

    }

     $Student= new Student();
      $Teacher=new Teacher();
      //check if the person who try to log in , is student or teacher
     if($Student-> getemail($email)!=null)
     {
         // check if the password & email are correct 
        if($Student->getPass($email,md5($Pass))!=null)
        {
            //save type of user
            $_SESSION['type']="Student";
            //save email of user
            $_SESSION['email']=$email;
            header("Location:../HTML/Home.php");
        }
        else{
            echo"<script>alert('Your Password incorect, Please try again'); window.location.href='../HTML/Login.html';</script>";
        }
     }
     else if($Teacher->getemail($email)!=null)
     {
          // check if the password & email are correct 
        if($Teacher->getPass($email,md5($Pass))!=null)
        {
             //save type of user
            $_SESSION['type']="Teacher";
               //save email of user
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