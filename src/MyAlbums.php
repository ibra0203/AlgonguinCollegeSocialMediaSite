<?php 
include 'helpers/validation.php';

## declares database as $db
include 'shared/db.php';



include 'shared/header.php';
?>

<div class="section hero is-fullheight">
  <div class="container">
    <div class="column is-6 is-offset-2 has-text-left">
      <h1 class="title is-1 has-text-centered">My Albums</h1>
      <?php  include 'shared/welcome.php' ;?>

    </div>  <!-- COLUMN -->

    <div class="column">
      <a href="AddAlbum.php" class="button is has-text-centered is-link" > 
          <span class="icon is-large">
          <i class="fas fa-lg fa-plus-circle"></i>
          </span>
          &nbsp;&nbsp;&nbsp;Add Album
      </a>

      <table class="table is-fullwidth">
          <thead>
            <tr>
              <th>&nbsp;Title</th>
              <th><i class="far fa-clock"></i>&nbsp;Date Updated</th>
              <th><i class="far fa-images"></i>Number of Pictures</th>
              <th><i class="fas fa-user-lock"></i>&nbsp;Accessability</th>
              <th>&nbsp;</th>    
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>My Album</td>
              <td>22/02/1988</td>
              <td>34</td>
              <td>
              <div class="control has-icons-left">
                <div class="select">
                  <select>
                    <option selected>Me Only</option>
                    <option>Shared with Friends</option>
                  </select>
                </div>
                <div class="icon is-small is-left">
                  <i class="fas fa-eye"></i>
                </div>
              </div>
              </td>
              <td>
                <a href="">
                  <span class="icon is-large">
                    <i class="far fa-lg fa-trash-alt"></i>
                  </span>
                </a>
              </td>
            </tr>
            <!-- POPULATE TABLE HERE -->
          </tbody>
      </table>
    </div>  <!-- COLUMN -->
  </div>    <!-- CONTAINER -->
</div>      <!-- HERO -->
<?php include 'shared/footer.php'; ?>