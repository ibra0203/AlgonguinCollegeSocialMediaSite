<?php 
session_start();
include 'helpers/validation.php';
include 'helpers/util.php';

include 'shared/db.php';


include 'helpers/albums.php';
include 'helpers/pictures.php';

$owner = $_SESSION['login'];


$imgTitle = getPostSafely('imageTitle');
$files = getPostSafely('files');
$description = getPostSafely('description');

// Retrieve albums
$albums = getAlbumsByUser($owner, $db);


// TODO Parse Images


// TODO Add image relations to DB

if (isset($_POST['submit'])) {
  foreach( $pictures as $picture) {

    /// TODO implement this
    //function addPicture($db, $fileame, $title, $description )
  }
  $albumId = $_POST['albumId'];
  echo $albumId[0];

}


include 'shared/header.php';

// var_dump($_POST);
?>

<div class="section hero is-fullheight">
  <div class="container">
  <h1 class="title is-1 has-text-centered">Upload Pictures</h1>
      <?php  include 'shared/welcome.php' ;?>
    <div class="column is-7 is-offset-2 has-text-left">
    
      

      <form 
        action="<?php echo $_SERVER['PHP_SELF']?>"
        method="POST" 
        class="inputForm"
        > 

      <div class="field is-horizontal">
                <div class="field-label is-normal">
                  <label class="label">Title</label>
                </div>
                <div class="field-body">
                  <div class="field">
                    <p class="control is-expanded has-icons-left has-icons-right">
                      <input 
                      class="input" 
                      type="text" 
                      placeholder="" 
                      name="imageTitle"
                      value = "<?php echo (isset($albumTitle))?$albumTitle:'';?>"
                      >
                      <span class="icon is-small is-right" style="display:none">
                      </span>
                      <span class="icon is-small is-left">
                        <i class="fas fa-images"></i>
                      </span>
                      <!-- <p class="help is-danger"></p> -->
                    </p>
                  </div> 
                </div>
              </div>
              <div class="field is-horizontal ">
                  <div class="field-label is-normal">
                    <label class="label">Files</label>
                  </div>
                  <div class="field-body">
                      <div id="files" class="file has-name is-fullwidth" >
                        <label class="file-label">
                          <input class="file-input file-upload" 
                                  type="file" 
                                  accept = "*"
                                  multiple
                                  type="file" 
                                  name="imgUpload[]">
                          <span class="file-cta">
                            <span class="file-icon">
                              <i class="fas fa-upload"></i>
                            </span>
                            <span class="file-label file-text">
                              Upload Images
                            </span>
                          </span>
                        </label>
                      </div>  
                  </div>   
              </div>
        
        <div class="field is-horizontal">
            <div class="field-label ">
                <label class="label">Upload to</label>
            </div>
            <div class="field-body">
              <div class="is-fullwidth control has-icons-left">
                <div class="select is-fullwidth">
                  <select name="albumId[]">
                    <?php 
                      foreach($albums as $album) {
                        echo "<option value='$album->Album_Id'> $album->Title </option>";
                      }
                    ?>
                  </select>
                </div>
                <div class="icon is-small is-left">
                  <i class="fas fa-images"></i>
                </div>
              </div>
            </div>
        </div>
      
      <!-- DESCRIPTION -->
      <div class="field is-horizontal">
          <div class="field-label ">
            <label class="label">Description</label>
          </div>
          <div class="field-body ">
            <div class="field">
                <div class="control">
                  <textarea class="textarea is-primary" name="description" placeholder="enter description"></textarea>
                </div>
              </div>
          </div>
        </div>

        <div class="field-body">
                <div class="field">
                  <div class="control">
                  </div>
                </div>   
                    <div class="control">
                    <input
                      class="button is-success"
                      type="submit" value="Add Pictures" name="submit" >
                      <input class="button is-warning clearButton"
                       type="reset" 
                       name="reset"
                       onclick="location.href='UploadPictures.php'; " value="Reset">                
                    </div>
                  </div>
              </div>

      </form>   
    </div>  <!-- COLUMN -->
  </div>    <!-- CONTAINER -->
</div>      <!-- HERO -->

<script>
let uploadImg = document.querySelector('.file-upload');
let fileLabel = document.querySelector('.file-text');
const fileBtn = document.querySelector('#files');
uploadImg.addEventListener('change', (e) => {
      let text = 'Choose a File';
      const files = Array.from(e.target.files);
      files.length !== 0 ? text = files[0].name : 'Upload Images...';
      fileLabel.innerHTML = text;
      fileBtn.classList.add('is-success');
});
</script>
<?php include 'shared/footer.php'; ?>