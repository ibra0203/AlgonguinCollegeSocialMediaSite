<?php 
session_start();
include 'helpers/validation.php';
include 'shared/db.php';
include 'shared/header.php';
include 'helpers/albums.php';
include 'helpers/pictures.php';
include 'helpers/Class_Lib.php';
include 'helpers/comments.php';
include 'helpers/databaseHelper.php';


$owner = $_SESSION['login'];
$albums = getAlbumsByUser($owner, $db);

// get current album for description
$album_id = $_POST['albumId'];
$displayedAlbum = getAlbumById($album_id, $db);


// get picture id 
 $picture_id = $_POST['pictureId'];
// get current
// get the pictures for that album
$albumPictures = getPicturesByAlbum($db, $album_id);
$displayedPic=null;

if(!isset($picture_id))
{
    if(count($albumPictures)>0)
    {
        $displayedPic = $albumPictures[0];
        $picture_id = $displayedPic->getId();
    }
}
else{
// find displayed picture from the album pics
foreach($albumPictures as $p)
{
    if($p->getId() == $picture_id)
    {
        $displayedPic = $p;
        break;
    }
}
}
if (isset($_POST["addComment"]) ){
   
  // $comment_text = $_POST['commentBox'];
  // $author_id = $owner;
  // // $picture_id = 
  //  //createComment($db, $author_id, $picture_id, $comment_text);
}

?>


<div class="section hero is-fullheight">
  <div class="container">

    <form id="form" action="<?php echo $_SERVER['PHP_SELF']?>"
      method="post"
    >

    <div class="column is-6 is-offset-2 has-text-left">
    <h1 class="title is-1 has-text-centered"> <b> <?php echo getNameFromId($owner, $db);?>'s  </b> Pictures</h1>
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
  

<?php
    $noAlbumPic = "https://via.placeholder.com/800x500.png/09f/fff";
    $albumSrcPic = $noAlbumPic;
    if($displayedPic !=null)
    {
        $albumSrcPic = $displayedPic->getAibumFilePath();
    }
   echo <<< HTML
<div class="columns is-2">
      <div class="column is-8">
      <img src="{$albumSrcPic}" alt="">
      <br>
      <br>
      <div class=" horizontal-scroll-wrapper">       
HTML;

     
       foreach($albumPictures as $pic)
       {
           $picId = $pic->getId();
           $picThumb = $pic->getThumbnailFilePath();
        echo <<< HTML
        <div class="thumbnail">
            <button class = "hid-btn" type="submit" name="pictureId" value={$picId}><img src="{$picThumb}" alt=""></button>
        </div>           
HTML;
       }
?>
      
      </div>
      </div>
      <div class="column ">
      <div class="">
      <h2 class="title is-5"> Description:</h2>
        <p class="">
         <?php
         if(isset($displayedPic))
         echo $displayedPic->getDescription(); 
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