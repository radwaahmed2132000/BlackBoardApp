<?php
require_once 'Student.php';
require_once 'Teacher.php';
require_once 'connection.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_POST["submit"])) 
{
    $email=$_POST['email'];
    $Pass=$_POST['pass'];
    $FristName=$_POST['FristName'];
    $LastName=$_POST['LastName'];
    $Confrimpass=$_POST['Confrimpass'];
    $Gender=$_POST['Gender'];
    $type=$_POST['type'];
    $Phone=$_POST['Phone'];
    $dbConnection = DBConnection::getInst()->getConnection();
    if(empty($email) || empty($Pass)|| empty($FristName) || empty($LastName) || empty($Confrimpass) ||empty($Gender) ||
    empty($type) )
    {
        echo'<script>alert("Some fields are empty or not checked!");window.location.href="../HTML/SignUp.html";</script>';
       

    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        echo'<script>alert("Your email is not valid!");window.location.href="../HTML/SignUp.html";</script>';
       

    }
    else if(!is_numeric($Phone))
    {
        echo'<script>alert("Your Phone is not valid!");window.location.href="../HTML/SignUp.html";</script>';
       
    }
    else if(!preg_match("/^[a-zA-Z-' ]*$/",$FristName) || !preg_match("/^[a-zA-Z-' ]*$/",$LastName) )
    {
        echo'<script>alert("Your Name is not correct! it may contains numbers!");window.location.href="../HTML/SignUp.html";</script>';
     
    }
    else if($Pass!=$Confrimpass)
    {
        echo'<script>alert("Your Passwords not matches!");window.location.href="../HTML/SignUp.html";</script>';
       
    }
    else 
    {
     $Student= new Student();
      $Teacher=new Teacher();
    if($type=="Student")
    { if($Student-> getemail($email)==null && $Teacher->getemail($email)==null && $Student-> geteuqalsPhone($Phone)==null && $Teacher->geteuqalsPhone($Phone)==null)
     {
        $Student->InsertStudent($email,$FristName,$LastName,$Phone,	$Gender	,md5($Pass));
        $_SESSION['type']="Student";
        $_SESSION['email']=$email;
        header("Location:../HTML/Home.php");
     
     }
     else
     {
        echo'<script>alert("This email is already exits");window.location.href="../HTML/SignUp.html";</script>';
      
     }
    
    }
    else if($type=="Teacher")
     {
      if($Student->geteuqalsPhone($Phone))
      echo "founded";
             if($Teacher->getemail($email)==null && $Student-> getemail($email)==null && $Student-> geteuqalsPhone($Phone)==null && $Teacher->geteuqalsPhone($Phone)==null )
            {  $Teacher->InsertTeacher($email,$FristName,$LastName,$Phone,	$Gender	,md5($Pass));
                $_SESSION['type']="Teacher";
                $_SESSION['email']=$email;
                header("Location:../HTML/Home.php");
            }
            else
     {
        echo'<script>alert("This email is already exits"); window.location.href="../HTML/SignUp.html";</script>';
       
     }

    }
    
    }
}
