<?php
require_once 'connection.php';
class Quiz
{
    public function __construct(){
        $this->dbConnection = DBConnection::getInst()->getConnection();
   }
   public function InsertQuiz($Quizname,$Courseid,$Grade,$DateofQuiz, $startofQuiz,$EndofQuiz)
   {
    $this->dbConnection->query("INSERT INTO Quiz (	
        Quizname,
        Courseid,Grade,DateofQuiz, startofQuiz,EndofQuiz) VALUES('$Quizname','$Courseid','$Grade','$DateofQuiz', '$startofQuiz','$EndofQuiz')");
   }
   public function Getname($Quizid)
   {
    $result = $this->dbConnection->query("SELECT Quizname FROM  Quiz WHERE Quizid='$Quizid'");
    // If the query returns a result
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            return $row["Quizname"];
        }
    }
    return null;

   }
   public function GetEndofQuiz($Quizid)
   {
    $result = $this->dbConnection->query("SELECT EndofQuiz FROM  Quiz WHERE Quizid='$Quizid'");
    // If the query returns a result
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            return $row["EndofQuiz"];
        }
    }
    return null;

   }
   public function GetstartofQuiz($Quizid)
   {
    $result = $this->dbConnection->query("SELECT startofQuiz FROM  Quiz WHERE Quizid='$Quizid'");
    // If the query returns a result
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            return $row["startofQuiz"];
        }
    }
    return null;

   }
   public function GetDateofQuiz($Quizid)
   {
    $result = $this->dbConnection->query("SELECT DateofQuiz FROM  Quiz WHERE Quizid='$Quizid'");
    // If the query returns a result
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            return $row["DateofQuiz"];
        }
    }
    return null;

   }

   public function GetGrade($Quizid)
   {
    $result = $this->dbConnection->query("SELECT Grade FROM  Quiz WHERE Quizid='$Quizid'");
    // If the query returns a result
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            return $row["Grade"];
        }
    }
    return null;

   }
   public function GetQuizid()
   {
     $result= $this->dbConnection->query("SELECT  MAX(Quizid) FROM  Quiz");
     if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            return $row["MAX(Quizid)"];
        }
    }
    return null;

   }
   public function InsertQuestion($Ques,
    $choice1,
    $choice2,
    $choice3,
    $choice4,
    $correct,
    $Quizid)
   {
    $this->dbConnection->query("INSERT INTO question (Ques,choice1,choice2,choice3,choice4,correct,Quizid) VALUES('$Ques','$choice1','$choice2','$choice3','$choice4','$correct','$Quizid')");
   }
   public function GetQues($Quesid	)
   {
    $result = $this->dbConnection->query("SELECT Ques FROM  question WHERE Quesid='$Quesid'");
    // If the query returns a result
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            return $row["Ques"];
        }
    }
    return null;

   }
   public function Getchoice1($Quesid	)
   {
    $result = $this->dbConnection->query("SELECT choice1 FROM  question WHERE Quesid='$Quesid'");
    // If the query returns a result
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            return $row["choice1"];
        }
    }
    return null;

   }
   public function Getchoice2($Quesid	)
   {
    $result = $this->dbConnection->query("SELECT choice2 FROM  question WHERE Quesid='$Quesid'");
    // If the query returns a result
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            return $row["choice2"];
        }
    }
    return null;

   }
   public function Getchoice3($Quesid	)
   {
    $result = $this->dbConnection->query("SELECT choice3 FROM  question WHERE Quesid='$Quesid'");
    // If the query returns a result
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            return $row["choice3"];
        }
    }
    return null;

   }
   public function Getchoice4($Quesid	)
   {
    $result = $this->dbConnection->query("SELECT choice4 FROM  question WHERE Quesid='$Quesid'");
    // If the query returns a result
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            return $row["choice4"];
        }
    }
    return null;

   }
   public function Getcorrect($Quesid	)
   {
    $result = $this->dbConnection->query("SELECT correct FROM  question WHERE Quesid='$Quesid'");
    // If the query returns a result
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            return $row["correct"];
        }
    }
    return null;

   }
   public function GetQuestions($Quizid	)
   {
    $result = $this->dbConnection->query("SELECT Quesid FROM  question WHERE Quizid='$Quizid'");
    return $result;
   
    

   }
   
   public function InsertCourse($CourseName,$teacheremail)
   {
    $this->dbConnection->query("INSERT INTO course (	
        CourseName,
        teacheremail) VALUES('$CourseName','$teacheremail')");
    
   }
   public function GetCoursename($teacheremail,$Courseid)
   {
    $result = $this->dbConnection->query("SELECT CourseName FROM  course WHERE teacheremail='$teacheremail' AND CourseName='$CourseName'");
    // If the query returns a result
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            return $row["CourseName"];
        }
    }
    return null;
   }
   public function InsertAssigned($studentemail,$Quizid,$Grade)
   {
    $this->dbConnection->query("INSERT INTO assigned (studentemail,Quizid,Grade) VALUES('$studentemail','$Quizid','$Grade')");
   }
   public function InsertAnswers($Quesid,$Answer,$Quizid)
    {
        $this->dbConnection->query("INSERT INTO answers (Quesid,Answer,Quizid) VALUES('$Quesid','$Answer','$Quizid')");
    }
    public function Getmyanswer($Quesid,$Quizid)
    {
        $result = $this->dbConnection->query("SELECT Answer FROM  answers WHERE Quesid='$Quesid' AND Quizid='$Quizid'");
        // If the query returns a result
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                return $row["Answer"];
            }
        }
        return null;

    }
    public function Getmygrade($studentemail,$Quizid)
    {
        $result = $this->dbConnection->query("SELECT Grade FROM  assigned WHERE studentemail='$studentemail' AND Quizid='$Quizid'");
        // If the query returns a result
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                return $row["Grade"];
            }
        }
        return null;
    }
     public function addCousre($CourseName,$teacheremail)
     {
        $this->dbConnection->query("INSERT INTO course (CourseName,teacheremail) VALUES('$CourseName','$teacheremail')");
     
     }
    public function GetNameofCours($teacheremail)
    {
        
            $result = $this->dbConnection->query("SELECT CourseName,Courseid FROM  course WHERE teacheremail='$teacheremail'");
            // If the query returns a result
           
            return $result;
        
    }
    public function DeleteQuiz($Quizid)
    {
        $this->dbConnection->query("DELETE FROM quiz WHERE Quizid='$Quizid'");
    }
    public function DeleteAssigned($Quizid)
    {
        $this->dbConnection->query("DELETE FROM assigned WHERE Quizid='$Quizid'");
    }
    public function Deleteanswers($Quizid)
    {
        $this->dbConnection->query("DELETE FROM answers WHERE Quizid='$Quizid'");
    }
    public function DeleteFromQues($Quizid)
    {
        $this->dbConnection->query("DELETE FROM question WHERE Quizid='$Quizid'");
    }
    public function GetID($Courseid)
    {
      return  $this->dbConnection->query("SELECT Quizid FROM quiz WHERE Courseid='$Courseid'");
    }
    public function UpdateQuiz($Quizname,$Grade,$DateofQuiz, $startofQuiz,$EndofQuiz,$Quizid)
    {
        $this->dbConnection->query("UPDATE quiz SET Quizname='$Quizname',Grade='$Grade',DateofQuiz='$DateofQuiz',startofQuiz='$startofQuiz',EndofQuiz='$EndofQuiz' WHERE Quizid='$Quizid' ");

    }
    public function UpdateQuestion(	
        $Ques,
        $choice1,
        $choice2,
        $choice3,
        $choice4,
        $correct,
        $id)
        {
            $this->dbConnection->query("UPDATE question SET Ques='$Ques',choice1='$choice1',choice2='$choice2',choice3='$choice3',choice4='$choice4',correct='$correct' WHERE Quesid='$id' ");
        }
  
}


?>