<?php
require_once 'connection.php';
class Quiz
{
    public function __construct(){
        $this->dbConnection = DBConnection::getInst()->getConnection();
   }
   public function InsertQuiz($Quizname,$Courseid)
   {
    $this->dbConnection->query("INSERT INTO Quiz (	
        Quizname,
        Courseid) VALUES('$Quizname','$Courseid')");
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
   public function GetQuizid()
   {
     $result= $this->dbConnection->query("SELECT  COUNT(*) FROM  Quiz");
     if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            return $row["COUNT(*)"];
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
 
}


?>