<?php 
session_start();
include 'helpers/validation.php';
include 'shared/db.php';
include 'shared/header.php';
include 'helpers/albums.php';
include 'helpers/pictures.php';
include 'helpers/comments.php';


$owner = $_SESSION['login'];
$albums = getAlbumsByUser($owner, $db);

// get current album for description
$album_id = $_POST['albumId'];
$displayedAlbum = getAlbumById($album_id, $db);

// get the pictures for that album
$albumPictures = getPicturesByAlbum($db, $album_id);

if (isset($_POST["addComment"]) ){
   
  // $comment_text = $_POST['commentBox'];
  // $author_id = $owner;
  // // $picture_id = 
  //  //createComment($db, $author_id, $picture_id, $comment_text);
}

var_dump($_POST);
?>


<div class="section hero is-fullheight">
  <div class="container">

    <form id="form" action="<?php echo $_SERVER['PHP_SELF']?>"
      method="post"
    >

    <div class="column is-6 is-offset-2 has-text-left">
    <h1 class="title is-1 has-text-centered"> <b> USER's  </b> Pictures</h1>
    <hr>
  </div>  <!-- COLUMN -->

  <div class="column is-6  is-offset-2 ">
      <div class="field">
          <div class="select is-fullwidth">
                  <select onchange='this.form.submit()' name="albumId">
                    <?php 
                      echo "<option> select an album </option>";
                      foreach($albums as $album) {
                        // $isSelected = $album->Album_Id == 
                        $selected = $album ->Album_Id == $album_id ? 'selected': '';
                        echo "<option  value='$album->Album_Id' $selected > 
                        $album->Title 
                              </option>";
                      }
                    ?>
                  </select>
                </div>
                <div class="icon is-small is-left">
                  <!-- <i class="fas fa-images"></i> -->
                </div>
      </div>   
  </div>
  


    <div class="columns is-2">
      <div class="column is-8">
      <img src="https://via.placeholder.com/800x500.png/09f/fff" alt="">
      <br>
      <br>
      <div class=" horizontal-scroll-wrapper">

        <div class="thumbnail">
            <img src="https://via.placeholder.com/100x100.png/09f/fff" alt="">
        </div>

        <div class="thumbnail">
            <img src="https://via.placeholder.com/100x100.png/09f/fff" alt="">
        </div>

        <div class="thumbnail">
            <img src="https://via.placeholder.com/100x100.png/09f/fff" alt="">
        </div>

        <div class="thumbnail">
            <img src="https://via.placeholder.com/100x100.png/09f/fff" alt="">
        </div>

        <div class="thumbnail">
            <img src="https://via.placeholder.com/100x100.png/09f/fff" alt="">
        </div>

        <div class="thumbnail">
            <img src="https://via.placeholder.com/100x100.png/09f/fff" alt="">
        </div>

        <div class="thumbnail">
            <img src="https://via.placeholder.com/100x100.png/09f/fff" alt="">
        </div>
      
      </div>
      </div>
      <div class="column ">
      <div class="">
      <h2 class="title is-5"> Description:</h2>
        <p class="">
         <?php
         echo $displayedAlbum->Description; 
         ?>          
        </p>
        <hr>
      </div>

    <h2 class="title is-5"> Comments:</h2>
    <div class="vertical-scroll-wrapper has-background-light">

            <div class="box "> 
            <a href=""> User <small>  <em> (11/11/1984 )  </em>  </small> </a>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
            </div> 
            <!-- foreach ($comments as $comment) {} -->
    </div>

    <br>

    <div class="field">
        <textarea name="commentBox" class="textarea" placeholder="leave a comment"></textarea>
        </div>
        <div class="control has-text-right">
          <input
            class="button is-success"
            type="submit" value="Add comment" name="addComment" >        
        </div>
      </div>
      </form>
  </div>    <!-- CONTAINER -->
</div>      <!-- HERO -->
<?php include 'shared/footer.php'; ?>