<?php
 require_once 'connection.php';
 require_once 'Quiz.php';
 if(isset($_POST['submit']))
 { 
     $Ques=$_POST['1'];
     $choice1=$_POST['2'];
     $choice2=$_POST['3'];
     $choice3=$_POST['4'];
     $choice4=$_POST['5'];
     $correct=$_POST['6'];
     $Quizname=$_POST['Quizname'];
     
     $Courseid=1; // it must be changed??????????????????
     // when i add course mist changed
    if(empty($Ques) || empty($choice1) ||empty ($choice2) || empty($choice3) || empty($choice4) || empty($correct) || empty($Quizname))
    {
        echo"<script>alert('Your Question has fields empty'); window.location.href='../HTML/CreateQuiz.php';</script>";
    }
    $Quiz=new Quiz();
    $Quiz->InsertQuiz($Quizname,$Courseid);
    $Quizid= $Quiz->GetQuizid();
       $Quiz->InsertQuestion(	
        $Ques,
        $choice1,
        $choice2,
        $choice3,
        $choice4,
        $correct,
        $Quizid);
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
                   break;
                }
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
       
  

 }
?>