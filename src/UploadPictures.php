<?php 
session_start();
include 'helpers/validation.php';
include 'helpers/util.php';

include 'shared/db.php';


include 'helpers/albums.php';

$owner = $_SESSION['login'];
$imgTitle = getPostSafely('imageTitle');
$description = getPostSafely('description');

// Retrieve albums
$albums = getAlbumsByUser($owner, $db);





include 'shared/header.php';
?>

<div class="section hero is-fullheight">
  <div class="container">
    <div class="column is-6 is-offset-2 has-text-left">
    <h1 class="title is-1 has-text-centered">Upload Pictures</h1>
      <?php  include 'shared/welcome.php' ;?>
      </h2>

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
                      name="albumTitle"
                      value = "<?php echo (isset($albumTitle))?$albumTitle:'';?>"
                      >
                      <span class="icon is-small is-right" style="display:none">
                      </span>
                      <span class="icon is-small is-left">
                        <i class="fas fa-images"></i>
                      </span>
                      <p class="help is-danger"> <?php  echo $idMsg; ?> </p>

                    </p>
                  </div> 
                </div>
              </div>
              <div class="field is-horizontal">
                  <div class="field-label is-normal">
                    <label class="label">Files</label>
                  </div>
                  <div class="field-body">
                      <div class="file has-name is-fullwidth">
                        <label class="file-label">
                          <input class="file-input file-upload" type="file" name="resume">
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
                  <select name="album[]">
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
  

    </div>  <!-- COLUMN -->
  </div>    <!-- CONTAINER -->
</div>      <!-- HERO -->

<script>
let uploadImg = document.querySelector('.file-upload');
let fileLabel = document.querySelector('.file-text');
uploadImg.addEventListener('change', (e) => {
      let text = 'Choose a File';
      const files = Array.from(e.target.files);
      files.length !== 0 ? text = files[0].name : 'Upload Images...';
      fileLabel.innerHTML = text;
});
</script>
<?php include 'shared/footer.php'; ?>