
<?php 
    include_once('shared/db.php');
    include_once('helpers/databaseHelper.php');
    $id ='';
    $name='';
    if(isset($_SESSION['login']))
    {
        $id=$_SESSION['login'];
        $name = getNameFromId($id, $db);
    }
?>
      <h2 class="subtitle has-text-centered is-6">
          Welcome, <b><?php echo $name?></b>! </br> <i>(Not you? change user <a href="#">here</a>)</i>
<hr>