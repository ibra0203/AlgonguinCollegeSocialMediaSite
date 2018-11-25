<?php 
include 'helpers/validation.php';

## declares database as $db
include 'shared/db.php';



include 'shared/header.php';
?>

<div class="section hero is-fullheight">
  <div class="container">
    <div class="column is-5 is-offset-3 has-text-left">
    <h1 class="title is-1 has-text-centered">My Add Friends</h1>
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
                <input class="input" type="text" placeholder="Find a friend">
              </div>
              <div class="control">
                <button type="submit" class="button is-info">
                <i class="fas fa-lg fa-plus"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        </form>
    </div>  <!-- COLUMN -->
  </div>    <!-- CONTAINER -->
</div>      <!-- HERO -->



<!-- FOOTER -->
<?php include 'shared/footer.php'; ?>