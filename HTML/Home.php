<?php
session_start();
if(!isset($_SESSION['type']) ||
!isset($_SESSION['email']))
header("Location:Login.html");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../CSS/Home.css">
    <link rel="stylesheet" href="../CSS/Footer.css">
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
    <title>Home</title>
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
                            <a class="nav-link active" href="">Home</a>
                        </li>
                 

                <li class="nav-item">
                    <a class="nav-link" href="">User Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Courses</a>
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
   
</body>
<div class="container mt-5 mb-3 ">
    <div class="ContainerOfPic mb-3">
        
       <h1>Learn , Discover & Imporve </h1>
        <img class="img-fluid" src="../Images/pablo-1027.png" alt="">
        <h4>“Education is the most powerful weapon which you can use to change the world.”
        </h4>
        ― Nelson Mandela
    </div>
   
   
</div>
<div>
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
<script src="../bootstrap/bootstrap.js"></script>
<script src="../bootstrap/jquery.js"></script>
<script src="../bootstrap/popper.main.js"></script>
</html>