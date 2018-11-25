<?php
## declares database as $db
include 'shared/db.php';

include 'shared/header.php';
?>

<div class="section hero is-fullheight">
  <div class="container">
    <h1 class="title is-1 has-text-centered">Add Album</h1>
    <?php  include 'shared/welcome.php' ;?>

    <div class="column is-7 is-offset-2 has-text-left">

      <form 
        action="<?php echo $_SERVER['PHP_SELF']?>"
        method="POST" 
        class="inputForm"
        >
        <!-- ALBUM TITLE -->
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
                      name="albumName"
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


              <!-- PERMISSIONS -->
        <div class="field is-horizontal">
          <div class="field-label ">
            <label class="label">Access</label>
          </div>
              <div class="field-body ">
                <div class="field">
                  <div class="select is-multiple is-fullwidth">
                    <select multiple size="2">
                      <option value="private" >Me Only</option>
                      <option value="public" selected>
                      Shared with friend
                      </option>
                    </select>
                </div>
              </div>    
          </div>
        </div>

        <div class="field is-horizontal">
          <div class="field-label ">
            <label class="label">Description</label>
          </div>
          <div class="field-body ">
            <div class="field">
                <div class="control">
                  <textarea class="textarea is-primary" placeholder="enter description"></textarea>
                </div>
              </div>
          </div>
        </div>

        <div class="field is-horizontal">    
              <div class="field-body">
                <div class="field">
                  <div class="control">
                    <input
                      class="button is-success is-fullwidth"
                      type="submit" value="Add" name="submit" >
                      
                    </button>
                  </div>
                </div>   
                <div class="field">
                    <div class="control">
                      <input class="button is-warning is-fullwidth clearButton"
                       type="reset" 
                       name="reset"
                       onclick="location.href='AddAlbum.php'; " value="Reset">                
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
