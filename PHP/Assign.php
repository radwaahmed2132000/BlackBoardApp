<?php
 require_once 'Quiz.php';
 session_start();

      
      $Quizid=$_GET['id'];
      // get quiz id 
      $Quiz=new Quiz();
      // get all questions of quiz
      $result= $Quiz->GetQuestions($Quizid);
      // get the total grade of quiz
      $Grade=$Quiz->GetGrade($Quizid);
      // should added as attruibte
      // If the query returns a result
      if ($result->num_rows > 0) {
          $i=0;
          $j=0;
        while ($row = $result->fetch_assoc())
        {
          $i++;
          // get answer of student
            $anwser=$_POST[$row["Quesid"]];
            // save answer
            $Quiz->InsertAnswers($row["Quesid"], $anwser,$Quizid,$_SESSION['email']);
            // chcek if his/her answer is correct to give grades
            if($anwser==$Quiz->Getcorrect($row["Quesid"]))
            $j++;
        }
        // get value of total gradw
        $Grade=(($j*1.0)/$i)*$Grade;
       echo $_SESSION['email'];
       echo $Quizid;
       echo $Grade;
       // insert grade of student
        $Quiz->InsertAssigned($_SESSION['email'],$Quizid,ceil($Grade));
        echo'<script>alert("Quiz Submitted Successfuly");window.location.href="../HTML/Home.php";</script>';

    }




?>