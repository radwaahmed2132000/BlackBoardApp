<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
  $_SESSION['type']=null;
  $_SESSION['email']=null;
  header("Location:../HTML/Login.html");

  if (session_status() == PHP_SESSION_ACTIVE) {
    session_destroy();
} 
?>