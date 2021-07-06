<?php
 require_once 'connection.php';
 require_once 'Quiz.php';
 if(isset($_POST['submit']))
 { 
     if(!isset($_POST['1']))
    {
        echo"<script>alert('Your Quiz doesn't have Questions'); window.location.href='../HTML/Course.php';</script>";
    } 
    else
  {
     $Ques=$_POST['1'];
     $choice1=$_POST['2'];
     $choice2=$_POST['3'];
     $choice3=$_POST['4'];
     $choice4=$_POST['5'];
     $correct=$_POST['6'];
     $Quizname=$_POST['Quizname'];
     $Grade=$_POST['Grade'];
     $DateofQuiz =$_POST['date'];
     $startofQuiz =$_POST['start'];
     $EndofQuiz= $_POST['end'];
     $Courseid=$_GET['id'];
     // when i add course mist changed
    if(empty($Ques) || empty($choice1) ||empty ($choice2) || empty($choice3) || empty($choice4) || empty($correct) || empty($Quizname) || empty($DateofQuiz) ||empty($startofQuiz) ||empty($EndofQuiz))
    {
        echo"<script>alert('Your Question has fields empty'); window.location.href='../HTML/Course.php';</script>";
    }
    else if( $startofQuiz>=  $EndofQuiz)
    {
        echo"<script>alert('Invalid Time for Quiz!!'); window.location.href='../HTML/Course.php';</script>";

    }
    else if( $DateofQuiz<date("Y-m-d"))
    {
        echo"<script>alert('Invalid Date for Quiz'); window.location.href='../HTML/Course.php';</script>";

    }
    else if( $DateofQuiz==date("Y-m-d"))
    {
        if($startofQuiz<date("h:i:s"))
        echo"<script>alert('Invalid Time for Quiz'); window.location.href='../HTML/CreateQuiz.php';</script>";


    }
    else if($Grade<0)
    echo"<script>alert('Invalid Grade'); window.location.href='../HTML/CreateQuiz.php';</script>";
       
   else if($choice1==$choice2 || $choice1==$choice3 ||$choice1==$choice4 ||$choice2==$choice3 || $choice2==$choice4 || $choice3==$choice4)
    echo"<script>alert('Answers can't have the same value '); window.location.href='../HTML/CreateQuiz.php';</script>";
   else
   {
       echo " i am here";
        $Quiz=new Quiz();
    $Quiz->InsertQuiz($Quizname,$Courseid,$Grade, $DateofQuiz, $startofQuiz,$EndofQuiz);
    $Quizid= $Quiz->GetQuizid();
    echo $Quizid;
       $Quiz->InsertQuestion(	
        $Ques,
        $choice1,
        $choice2,
        $choice3,
        $choice4,
        $correct,
        $Quizid);
        echo "done";
        $i=7;
        while(true)
        {
            if(isset($_POST[$i]))
            {
                $Ques=$_POST[$i++];
                $choice1=$_POST[$i++];
                $choice2=$_POST[$i++];
                $choice3=$_POST[$i++];
                $choice4=$_POST[$i++];
                $correct=$_POST[$i++];
                if(empty($Ques) || empty($choice1) ||empty ($choice2) || empty($choice3) || empty($choice4) || empty($correct))
                {
                    echo"<script>alert('Your Question has fields empty'); window.location.href='../HTML/CreateQuiz.php';</script>";
                   break;
                }
                else if($choice1==$choice2 || $choice1==$choice3 ||$choice1==$choice4 ||$choice2==$choice3 || $choice2==$choice4 || $choice3==$choice4)
                echo"<script>alert('Answers can't have the same value '); window.location.href='../HTML/CreateQuiz.php';</script>";
                else
                $Quiz->InsertQuestion(	
                    $Ques,
                    $choice1,
                    $choice2,
                    $choice3,
                    $choice4,
                    $correct,
                    $Quizid);
            }
            else
            break;
        }
        echo"<script>alert('Answers can't have the same value '); window.location.href='../HTML/Course.php;</script>";
    
      }
    }
 }
 echo"<script> window.location.href='../HTML/Course.php';</script>";
?>