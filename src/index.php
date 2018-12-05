<?php
include 'helpers/util.php';
include 'shared/header.php';

?>

<html>
    <body>
        <div class="section hero is-fullheight">
          <div class="container">
            <h1 class="title">Welcome to Algonguin College Social Media Site</h1>
            <br>
            <hr>
            <?php if(!isset($_SESSION['login'])):?>
                <h2 class="subtitle"> If you have not used this system before you have to 
                  <a href="NewUser.php">sign up</a>
                </h2>
                <h2 class="subtitle"> If you already have an account you can <a href="Login.php">log in</a> now</h2>    
            <?php else:?>
                <?php include('shared/welcome.php')?>
            <?php endif;?>
          </div>
        </div>
    </body>


    <?php 
    include 'shared/footer.php';?>
</html>