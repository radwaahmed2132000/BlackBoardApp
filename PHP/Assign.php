<?php
 require_once 'Quiz.php';
 session_start();
 if(isset($_POST["submit"]))
 {
      // id will be changed;????????????????????????
      $Quizid=16;
      $Quiz=new Quiz();
      $result= $Quiz->GetQuestions($Quizid);
      $Grade=$Quiz->GetGrade($Quizid);
      // should added as attruibte
      // If the query returns a result
      if ($result->num_rows > 0) {
          $i=0;
          $j=0;
        while ($row = $result->fetch_assoc())
        {
          $i++;
            $anwser=$_POST[$row["Quesid"]];
            $Quiz->InsertAnswers($row["Quesid"], $anwser,$Quizid);
            if($anwser==$Quiz->Getcorrect($row["Quesid"]))
            $j++;
        }
        $Grade=(($j*1.0)/$i)*$Grade;
       echo $_SESSION['email'];
       echo $Quizid;
       echo $Grade;
        $Quiz->InsertAssigned($_SESSION['email'],$Quizid,ceil($Grade));
        
    }

 }


?>