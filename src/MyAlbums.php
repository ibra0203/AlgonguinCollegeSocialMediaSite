<?php 
session_start();
// include 'helpers/validation.php';
include 'helpers/util.php';
include 'helpers/albums.php';

## declares database as $db
include 'shared/db.php';
$owner = $_SESSION['login'];
$albums = getAlbumsByUser($owner, $db);
$successNotification = '';

if (isset ($_POST['submit'])) {
  $updatedAlbums = $_POST['albums'];
  foreach ($updatedAlbums as $album) {
    $album_id = explode(",", $album)[0];
    $access = explode(",", $album)[1];    
    changeAlbumPermissions($db, $access, $album_id);
  }
}

$album =  $_GET['deleteAlbum'];
if (isset($album)) {
  $deleteMsg = deleteAlbum($db, $owner, $album);
  }
include 'shared/header.php';

?>

<div class="section hero is-fullheight">
  <div class="container">
    <div class="column is-6 is-offset-2 has-text-left">
      <h1 class="title is-1 has-text-centered">My Albums</h1>
      <?php  include 'shared/welcome.php' ;?>
    </div>  

    <div class="column">
    <form id="form" action="<?php echo $_SERVER['PHP_SELF']?>"
      method="post"
    >

      <a href="AddAlbum.php" class="button is has-text-centered is-link" > 
          <span class="icon is-large">
          <i class="fas fa-lg fa-plus-circle"></i>
          </span>
          &nbsp;&nbsp;&nbsp;Add Album
      </a>
      
      <br>
      <br>


       <?php if ($deleteMsg != '') {
        echo "
        <div class='column is-4  notification is-success'>
        $deleteMsg
          <button class='delete'></button>
        
         </div>";
      }  ?>
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
          <?php

          foreach( $albums as $album) {
            $private = $album ->Accessibility_Code == 'private' ? 'selected': '';
            $public  = $album ->Accessibility_Code == 'shared' ? 'selected': '';
            // $public = 'selected';
            echo "<tr>";
            echo "<td> $album->Title</td>";
            echo "<td> $album->Date_Updated</td>";
            echo "<td> 23 </td>";
            echo "<td>             
                    <div class='select is-rounded'>
                    <select name = albums[] >
                      <option value='$album->Album_Id,private' $private > Me Only</option>
                      <option value='$album->Album_Id,shared'  $public > Me and my friends</option>
                    </select>
                    </div>          
            </td>";
            echo "<td>
                  <a  href = '?deleteAlbum=$album->Album_Id'
                          class='trash button is-warning ' 
                          name = $album->Album_Id   >
                  <span class='icon is-large '>
                    <i class='far fa-lg fa-trash-alt'></i>
                  </span>
                </button>
                
                </td>";
            echo "</tr>";
          }
            
          ?>            
          </tbody>
      </table>
      <input class="button is-primary" name="submit" type="submit" value='Save Changes'>
      </form>
    </div>  <!-- COLUMN -->
  </div>    <!-- CONTAINER -->
</div>      <!-- HERO -->

<!-- get rid of notifications -->
<script type="text/javascript" src="content/scripts/removeNotificaiton.js"></script>


<?php include 'shared/footer.php'; ?>

