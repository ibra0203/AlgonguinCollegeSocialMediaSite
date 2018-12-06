<?php
//session_start();

// Redirects to login page if user isn't logged in
function ValidateUser() {
  if(!isset($_SESSION['login'])) {
    header('Location: index.php');
    //exit();
  }
}
?>
