<?php
session_start();
include 'helpers/protected.php';
ValidateUser();

include 'shared/header.php';
## declares database as $db
include 'shared/db.php';
include 'helpers/validation.php';
include 'helpers/addFriend.php';
include 'helpers/util.php';

$errMsg ='';
$succMsg ='';
if($_POST['submit'])
{
    $idFrom = $_SESSION['login'];
    $idTo = getPostSafely('idTo','');
    validateFriendRequest($idTo, $idFrom, $db, $errMsg, $succMsg);

}
?>

<div class="section hero is-fullheight">
  <div class="container">
    <div class="column is-5 is-offset-3 has-text-left">
    <h1 class="title is-1 has-text-centered">Add Friends</h1>
      <?php  include 'shared/welcome.php' ;?>

      <h2 class="subtitle has-text-centered">
              Enter the ID for the friend you would like to add
      </h2> 

      <form 
        action="<?php echo $_SERVER['PHP_SELF']?>"
        method="POST" 
        class="inputForm"
        >
        <div class="field is-horizontal">
          <div class="field-label is-normal">
            <label class="label">ID</label>
          </div>
          <div class="field-body">
          <div class="field has-addons">
              <div class="control">
                  <input class="input" name="idTo" type="text" placeholder="Find a friend" oninput="onUserSearch(this.value)">
              </div>
              <div class="control">
                <button type="submit" name="submit" value="submit" class="button is-info">
                <i class="fas fa-lg fa-plus"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
          <p class="help is-danger">  <?php  echo $errMsg; ?> </p>
          <p class="help is-success">  <?php  echo $succMsg; ?> </p>
        </form>
    <div>
        <ul id="search-result">
            
        </ul>
    </div>
    </div>  <!-- COLUMN -->
  </div>    <!-- CONTAINER -->
</div>      <!-- HERO -->



<script type="text/javascript" src="content/scripts/addfriend.js"></script>

<!-- FOOTER -->
<?php include 'shared/footer.php'; ?>