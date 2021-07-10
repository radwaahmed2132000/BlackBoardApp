<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//destroy all sessions values
  $_SESSION['type']=null;
  $_SESSION['email']=null;
  header("Location:../HTML/Login.html");

  if (session_status() == PHP_SESSION_ACTIVE) {
    session_destroy();
} 
?>