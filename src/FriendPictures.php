<?php
session_start();
include 'helpers/protected.php';

ValidateUser();

include 'helpers/validation.php';
include 'shared/db.php';
include 'shared/header.php';
include 'helpers/albums.php';
include 'helpers/pictures.php';
include 'helpers/Class_Lib.php';
include 'helpers/comments.php';
include 'helpers/databaseHelper.php';
include 'helpers/friends.php';

$owner = $_SESSION['login'];
$friendId =  $_GET['friendId'];
$myFriend = getFriendById($db, $friendId, getNameFromId($owner, $db));
$albums = getSharedAlbumsByUser($friendId, $db);
$displayedPic=null;
$comments=null;
if(isset($_POST['albumId']))
{
    // get current album for description
    $album_id = getPostSafely('albumId');
    $displayedAlbum = getAlbumById($album_id, $db);
    $_SESSION['frnd-albumId']=getPostSafely('albumId');
    $albumPictures = getPicturesByAlbum($db, $album_id);
    $displayedPic=null;
    if(count($albumPictures)>0)
    {
        $displayedPic = $albumPictures[0];
        $picture_id = $displayedPic->getId();
        $_SESSION['frnd-pictureId'] = $picture_id;
    }

}
 else if(isset($_SESSION['frnd-albumId']))
     {
         $album_id = $_SESSION['frnd-albumId'];
     }
     
    if(isset($_POST['pictureId']))
    {
        $picture_id = getPostSafely('pictureId');
        $_SESSION['frnd-pictureId'] = $picture_id;
    }
    else if(isset($_SESSION['frnd-pictureId']))
    {
        $picture_id =  $_SESSION['frnd-pictureId'];
    }

// get current
// get the pictures for that album
$albumPictures = getPicturesByAlbum($db, $album_id);

if(!isset($picture_id))
{
    if(count($albumPictures)>0)
    {
        $displayedPic = $albumPictures[0];
        $picture_id = $displayedPic->getId();
    }
}//a picture is displayed
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
if (isset($_POST["addComment"]) ){


       $comment_text = getPostSafely('commentBox');
       $author_id = $owner;

       createComment($db, $author_id, $picture_id, $comment_text);
       header("Location: FriendPictures.php?friendId=".$friendId);

    }
    
    $comments = getCommentsOnPicture($db, $picture_id);

}


?>


<div class="section hero is-fullheight">
  <div class="container">

    <form id="form" action="<?php echo $_SERVER['PHP_SELF'].'?friendId='.$friendId?>"
      method="post">

    <div class="column is-6 is-offset-2 has-text-left">
    <h1 class="title is-1 has-text-centered"> <b> <?php echo $myFriend->Name;?>'s  </b> Pictures</h1>
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
    </form>
      
   <form id="form" action="<?php echo $_SERVER['PHP_SELF'].'?friendId='.$friendId?>"
      method="post">
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
  </form> 
     <form id="form" action="<?php echo $_SERVER['PHP_SELF'].'?friendId='.$friendId?>"
      method="post">
      </div>
      </div>
  
      <?php if(isset($picture_id)): ?>
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
    <?php
        if(isset($comments))
        {
    echo '';
        
                 foreach ($comments as $comment)
                 {
                     $name = getNameFromId($comment->Author_Id ,$db); 
                     //$st = "INSERT INTO COMMENT(`Author_Id`, `Picture_Id`, `Comment_Text`, `Date`)
         echo <<< HTML
<div class="vertical-scroll-wrapper has-background-light">
            <div class="box "> 
            <a href=""> {$name} <small>  <em> {$comment->Date} </em>  </small> </a>
            <p>{$comment->Comment_Text}</p>
            </div> </div>
HTML;
                 }
        }
            ?>
    

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
      <?php endif; ?>
    
  </div>    <!-- CONTAINER -->
  
</div>      <!-- HERO -->
  </form> 
<?php include 'shared/footer.php'; ?>