<?php
session_start();


?>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <!-- <link rel="stylesheet" href="darkly.css"> -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js"></script>
</head>
<nav class="navbar is-dark" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a href="index.php" class="navbar-item" href="index.php">
      <img src="./shared/AC.png" width="35" height="35">
    </a>

    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <a href="index.php" class="navbar-item">
        Home
      </a>

      <a href="MyFriends.php" class="navbar-item">
        My Friends
      </a> 

      <a href="MyAlbums.php" class="navbar-item">
        My Albums
      </a> 

      <a href="MyPictures.php" class="navbar-item">
        My Pictures
      </a> 


      <a href="UploadPictures.php" class="navbar-item">
        Upload Pictures
      </a> 

      </div>
      <?php if (isset($_SESSION['login'])):?>
        <div class="navbar-end">
            <a href="Logout.php" class="navbar-item">
              Log Out
            </a>   
        </div>
        <?php else:?>
        <div class="navbar-end">
            <a href="Login.php" class="navbar-item">
              Log In
            </a>   
        </div>
      <?php endif;?>
      </div>  
</nav>
</html>