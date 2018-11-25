<?php 

include 'helpers/validation.php';

## declares database as $db
include 'shared/db.php';
  ## user inputs
  $id       = trim($_POST["id"]);
  $name     = trim($_POST["name"]);
  $phone    = trim($_POST["phone"]);
  $password = trim($_POST["password"]);
  $password2 = trim($_POST["password2"]);

  ## validation errors
  $nameMsg      = '';
  $idMsg        = '';
  $nameMsg      = '';
  $phoneMsg     = '';
  $passwordMsg  = '';
  $password2Msg = '';

## database
  


  if ( isset($_POST['submit']) ) { 
  }

include 'shared/header.php';
?>


<div class="section hero is-fullheight">
  <div class="container">
  <h1 class="title is-1 has-text-centered">Sign up</h1>
  <h2 class="subtitle has-text-centered"> all fields are required </h2>
  <hr>
  
      <div class="column is-5 is-offset-3 has-text-left">

      <form action="<?php echo $_SERVER['PHP_SELF']?>"
             method="POST" 
             class="inputForm"
             >
      
             <div class="field is-horizontal">
                <div class="field-label is-normal">
                  <label class="label">Student Id</label>
                </div>
                <div class="field-body">
                  <div class="field">
                    <p class="control is-expanded has-icons-left has-icons-right">
                      <input 
                      class="input" 
                      type="text" 
                      placeholder="" 
                      name="id"
                      value = "<?php echo (isset($id))?$id:'';?>"
                      >
                      <span class="icon is-small is-right" style="display:none">
                        
                      </span>
                      <span class="icon is-small is-left">
                        <i class="fas fa-id-card"></i>
                      </span>
                      <p class="help is-danger"> <?php  echo $idMsg; ?> </p>

                    </p>
                  </div> 
                </div>
              </div>

              <div class="field is-horizontal">
                <div class="field-label is-normal">
                  <label class="label">Name</label>
                </div>
                <div class="field-body">
                  <div class="field">
                    <p class="control is-expanded has-icons-left has-icons-right">
                      <input 
                      class="input" 
                      type="text" 
                      placeholder="" 
                      name="name"
                      value = "<?php echo (isset($name))?$name:'';?>";
                      >
                      <span class="icon is-small is-right" style="display:none">
                        <i class="fas fa-check"></i>
                      </span>
                      <span class="icon is-small is-left">
                        <i class="fas fa-user"></i>
                      </span>
                      <p class="help is-danger">  <?php  echo $nameMsg; ?> </p>
                      
                    </p>
                  </div> 
                </div>
              </div>

              <div class="field is-horizontal">
                <div class="field-label is-normal">
                  <label class="label">Phone</label>
                </div>
                <div class="field-body">
                  <div class="field">
                    <p class="control is-expanded has-icons-left has-icons-right">
                      <input 
                      class="input" 
                      type="text" 
                      placeholder="" 
                      name="phone"
                      value = """;
                      >
                      <span class="icon is-small is-right" style="display:none">
                        <i class="fas fa-check"></i>
                      </span>
                      <span class="icon is-small is-left">
                        <i class="fas fa-phone"></i>
                      </span>
                      <p class="help is-danger">  <?php  echo $phoneMsg; ?> </p>
                      
                    </p>
                  </div> 
                </div>
              </div>
           
              

              

              <div class="field is-horizontal">
                  <div class="field-label is-normal">
                    <label class="label">Password</label>
                  </div>
                  <div class="field-body">
                    <div class="field">
                      <p class="control is-expanded has-icons-left has-icons-right">
                        <input 
                        class="input" 
                        type="password" 
                        placeholder="" 
                        name="password"
                        value = ""
                        >
                        <span class="icon is-small is-right" style="display:none">
                          <i class="fas fa-check"></i>
                        </span>
                        <span class="icon is-small is-left">
                            <i class="fas fa-lock"></i>
                          </span>
                          <p class="help is-danger">  <?php  echo $passwordMsg; ?> </p>
                      </p>
                    </div>        
                  </div>
              </div>


              <div class="field is-horizontal">
                  <div class="field-label is-normal">
                    <label class="label">Confirm Password</label>
                  </div>
                  <div class="field-body">
                    <div class="field">
                      <p class="control is-expanded has-icons-left has-icons-right">
                        <input 
                        class="input" 
                        type="password" 
                        placeholder="" 
                        name="password2"
                        value = ""
                        >
                        <span class="icon is-small is-right" style="display:none">
                          <i class="fas fa-check"></i>
                        </span>
                        <span class="icon is-small is-left">
                            <i class="fas fa-lock"></i>
                          </span>
                          <p class="help is-danger"> 
                          <?php  echo $password2Msg; ?>
                           </p>
                      </p>
                    </div>        
                  </div>
              </div>


              


            


              <div class="field is-horizontal">    
              <div class="field-body">
                <div class="field">
                  <div class="control">
                    <input
                      class="button is-success is-fullwidth"
                      type="submit" value="submit" name="submit" >
                      
                    
                  </div>
                </div>   
                <div class="field">
                    <div class="control">
                      <input class="button is-warning is-fullwidth clearButton"
                       type="reset" 
                       name="reset"
                       onclick="location.href='NewUser.php'; " value="Reset">                
                    </div>
                  </div>
              </div>
            </div> 
      </form>
      </div> 
    </div>

</div>

<?php 
include 'shared/footer.php';
?>