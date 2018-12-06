<?php 
session_start();
include 'helpers/util.php';
include 'helpers/protected.php';
ValidateUser();

// include 'helpers/validation.php';

include 'helpers/albums.php';
include 'helpers/pictures.php';

include 'helpers/databaseHelper.php';

## declares database as $db
include 'shared/db.php';
$owner = $_SESSION['login'];
$albums = getAlbumsByUser($owner, $db);
$successNotification = '';
$succMsg='';
if (isset ($_POST['submit'])) {
  $updatedAlbums = $_POST['albums'];
  if(count($albums) > 0) {
    foreach ($updatedAlbums as $album) {
      $album_id = explode(",", $album)[0];
      $access = explode(",", $album)[1];
      $succMsg = changeAlbumPermissions($db, $access, $album_id);
      $_SESSION['changedPermissions'] = true;
      header("Location: MyAlbums.php?msg=".$succMsg);
    }
  }
}
if(isset($_GET['msg']))
{
    if(isset($_SESSION['changedPermissions']))
    {
        $succMsg =$_GET['msg'];
        unset($_SESSION['changedPermissions']);
    }
}

$album =  $_GET['deleteAlbum'];
if (isset($album)) {
  $deleteMsg = deleteAlbum($db, $owner, $album);
  }


  
  // $album =  $_GET['deleteAlbum'];
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
<?php if ($succMsg != '') {
          echo "
          <div class='flash-msg column is-fullwidth  notification is-success'>
            $succMsg
          <button id='delete' class='delete'></button>
          </div>";
        }  ?>
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
            $picCount = count(getPicturesByAlbum($db, $album->Album_Id));
            $private = $album ->Accessibility_Code == 'private' ? 'selected': '';
            $public  = $album ->Accessibility_Code == 'shared' ? 'selected': '';
            // $public = 'selected';
            echo "<tr>";
            echo "<td> $album->Title</td>";
            echo "<td> $album->Date_Updated</td>";
            echo "<td> $picCount </td>";
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
                          onclick='return onDelete()'
                          class='trash button is-warning ' 
                          name = $album->Album_Id   >
                  <span class='icon is-large '>
                    <i class='far fa-lg fa-trash-alt'></i>
                  </span>
                
                
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
<script>
 function onDelete() {
    return confirm("are you sure you want to delete this album? ") ? true : false;
  }
</script>

<?php include 'shared/footer.php'; ?>

