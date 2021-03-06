<?php
require_once '../PHP/Quiz.php';
session_start();
if(!isset($_SESSION['type']) ||
!isset($_SESSION['email']))
header("Location:Login.html");
if($_SESSION['type']=="Student" || empty($_GET['id']) )
header("Location:Home.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../CSS/Home.css">
    <link rel="stylesheet" href="../CSS/Footer.css">
    <link rel="stylesheet" href="../CSS/CreateQuiz.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link href="http://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet" type="text/css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link href="http://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Questions</title>
</head>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary ">
        <a class="navbar-brand" href="../HTML/Home.php">Educate</a>
        <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="my-nav" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto navs">
                
                        <li class="nav-item">
                            <a class="nav-link active" href="Home.php">Home</a>
                        </li>
                 

                <li class="nav-item">
                    <a class="nav-link" href="">User Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Course.php">Courses</a>
                </li>

               
                    <li class="nav-item">
                        <a class="nav-link" href="../PHP/Logout.php">Log out</a>
                    </li>
                    
            </ul>
        </div>
    </nav>

    </nav>
</header>
<body>
   
        
  <div class="container mt-5 mb-3 ">
    <div class="row">
      <div class="col-lg-4">
        <form class="login" method="post" action="../PHP/addQuestions.php?id=<?php echo $_GET['id'];?>">
        
          <div  id="id01">
         <div class="1">Q<textarea name="1" id="1" class='Ques'></textarea><br><input type='radio' checked class='Ques' id="6" name="6" value='choice1' ><textarea  class='Ques' name="2" id="2"></textarea><br><input type='radio' class='Ques' id="6" name="6" value='choice2'><textarea name="3" id="3">  </textarea><br><input type='radio' id="+elements[5]+" class='Ques' name="6" value='choice3'><textarea name="4" id="4"></textarea><br><input type='radio' class='Ques' id="6" name="6" value='choice4'><textarea name="5" id="5"></textarea><br>    <button class='btn btn-primary'  onclick='Reply(1)'  type='button'>Previous</button>  <button class='btn btn-primary'  onclick='nextclick(6)'  type='button'>Next</button><br><br></div>


        
    

          </div>
         
          <button class="btn btn-primary" name="AddQuestion" id="AddQuestion" type="button">Add Question</button>
            <button class="btn btn-primary" name="submit" type="submit">Submit </button>
            <h5 >
    ???Education is what survives when what has been learned is forgotten.??? 

            </h5>
            -BF Skinner. 
        
        </form>
       
      </div>
      <div class="col-lg-8">
           <img class="img-fluid" src="../Images/bermuda-school-teacher-near-the-blackboard-1.png" alt="">
          
      </div>
    </div>
    <div>
    </div>

       

    </div >
   
        <footer id="footer">

            <a href="#" class="fab fa-facebook"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-google"></a>
    
        </footer>
        <div class="copy">
            <small>
                <p class="ourcopy">&copy;Copyright Educate. All Rights Reserved</p>
            </small>
            <small>
                <p class="ourcopy"> Developed with <i class="fas fa-heart" style="color:red;"></i> by Hack
                </p>
            </small>
        </div>
        </div>
       
    </div>

  
</body>
<script src="../bootstrap/jquery.js"></script>
<script src="../bootstrap/bootstrap.js"></script>

<script src="../bootstrap/popper.main.js"></script>
<script src="../JS/functions.js"></script>
<script>
    $(document).ready(function(){ 

 document.getElementById("AddQuestion").addEventListener("click", myFunction);
       
 function myFunction() {
   
   
    var value = document.getElementsByClassName("Ques");
    
    value=parseInt(value.length);
    if(value>0)
    { for(let i=1;i<=value;i+=6)
        {
            $("."+i).hide();
        

        }
        var check=value-5;
        checks=[value-5,value-4,value-3,value-2,value-1];
        var done=false;
        for(let i=0;i<5;i++)
        {
            if($("#"+checks[i]).val()=="")
            {
                done=true;
            }
        }
        
   
    

            if(!done)
            { elements=[value+1,value+2,value+3,value+4,value+5,value+6];

        
            $('#id01').append("<div class="+elements[0]+">Q<textarea name="+elements[0]+" id="+elements[0]+" class='Ques'></textarea><br><input type='radio' checked class='Ques' id="+elements[5]+" name="+elements[5]+" value='choice1' ><textarea  class='Ques' name="+elements[1]+" id="+elements[1]+"></textarea><br><input type='radio' class='Ques' id="+elements[5]+" name="+elements[5]+" value='choice2'><textarea name="+elements[2]+" id="+elements[2]+">  </textarea><br><input type='radio' id="+elements[5]+" class='Ques' name="+elements[5]+" value='choice3'><textarea name="+elements[3]+" id="+elements[3]+"></textarea><br><input type='radio' class='Ques' id="+elements[5]+" name="+elements[5]+" value='choice4'><textarea name="+elements[4]+" id="+elements[4]+"></textarea><br>    <button class='btn btn-primary'  onclick='Reply("+elements[0]+")'  type='button'>Previous</button>  <button class='btn btn-primary'  onclick='nextclick("+elements[5]+")'  type='button'>Next</button><br><br></div>");  
        
        }
        else
        {
            $("."+checks[0]).show();
        
        }
     }
  
}

});  
    
</script


</html>