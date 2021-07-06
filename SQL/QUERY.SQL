CREATE TABLE Teacher(
    
    email varchar(100) PRIMARY KEY ,
    FirstName varchar(100),
    LastName varchar(100),
    Phone Integer,
     Gender varchar(10),
    Pass TEXT
);
CREATE TABLE Student(
      email varchar(100) PRIMARY KEY ,
    FirstName varchar(100),
    LastName varchar(100),
    Phone Integer,
     Gender varchar(10),
    Pass TEXT
);
CREATE TABLE Course(
    Courseid int AUTO_INCREMENT PRIMARY KEY,
    CourseName varchar(100),
    teacheremail varchar(100),
    FOREIGN KEY (teacheremail) REFERENCES teacher(email)
    
  
);
CREATE TABLE EnrollCourse(
    Courseid int ,
    emailstudent varchar(100)  ,
    PRIMARY KEY(Courseid,emailstudent) ,   
    FOREIGN KEY (Courseid) REFERENCES Course(Courseid),
    FOREIGN KEY(emailstudent) REFERENCES student(email)
);
CREATE TABLE Quiz(
    Quizname varchar(100),
    
    Quizid int AUTO_INCREMENT PRIMARY KEY,
    Courseid int,
    FOREIGN KEY(Courseid) REFERENCES Course(Courseid) 
);
CREATE TABLE Assigned( studentemail varchar (100), Quizid int, FOREIGN KEY (studentemail) REFERENCES Student(email), FOREIGN KEY (Quizid) REFERENCES Quiz(Quizid), PRIMARY KEY (studentemail,Quizid),
        Grade int 
       )
 CREATE TABLE Question( Ques text, choice1 text, choice2 text, choice3 text, choice4 text, correct text, Quesid int AUTO_INCREMENT PRIMARY KEY, Quizid int , FOREIGN KEY (Quizid) REFERENCES Quiz(Quizid) )
                     
CREATE TABLE Review( Reviewid INT AUTO_INCREMENT PRIMARY KEY, content text, studentemail varchar(100), FOREIGN KEY (studentemail) REFERENCES student(email) )
ALTER TABLE teacher ADD ProfilePic text;
ALTER TABLE student ADD ProfilePic text;
ALTER TABLE quiz ADD Grade int;
CREATE TABLE Answers( Quesid int, Answer text, Quizid int , FOREIGN KEY (Quizid) REFERENCES Quiz(Quizid) ,FOREIGN KEY(Quesid) REFERENCES question(Quesid) ,PRIMARY KEY(Quizid,Quesid))
ALTER TABLE quiz ADD DateofQuiz Date;
ALTER TABLE quiz ADD startofQuiz time;
ALTER TABLE quiz ADD EndofQuiz time;