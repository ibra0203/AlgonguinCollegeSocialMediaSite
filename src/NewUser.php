<?php 
session_start();
include 'helpers/validation.php';
include 'helpers/util.php';
include 'helpers/registration.php';
## declares database as $db
include 'shared/db.php';
  ## user inputs
  $id       = getPostSafely('id', ''); 
  $name     = getPostSafely('name', ''); 
  $phone    = getPostSafely('phone', ''); 
  $password = getPostSafely('password', ''); 
  $password2 = getPostSafely('password2', ''); 

$validation=array();
if ( isset($_POST['submit']) ) { 
        ValidateAndAdd('name', $validation);
        ValidateAndAdd('id', $validation);
        ValidateAndAdd('phone', $validation);
        ValidateAndAdd('password', $validation);
        ValidateAndAdd('password2', $validation);
        
        if($validation['valid'] == true)
        {
            $tryRegister = registerUser($id, $name, $phone, $password, $db);
            if($tryRegister)
            {
                $_SESSION['login'] = $id;
                
                header("Location: index.php");
                exit( );
            }
        }
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
                  <label class="label">User Id</label>
                </div>
                <div class="field-body">
                  <div class="field">
                    <p class="control is-expanded has-icons-left has-icons-right">
                      <input 
                      class="input" 
                      type="text" 
                      placeholder="" 
                      name="id"
                      value = "<?php echo $id;?>"
                      >
                      <span class="icon is-small is-right" style="display:none">
                        
                      </span>
                      <span class="icon is-small is-left">
                        <i class="fas fa-id-card"></i>
                      </span>
                      <p class="help is-danger"> <?php  echo $validation['id'] ?> </p>

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
                      value = "<?php echo $name;?>"
                      >
                      <span class="icon is-small is-right" style="display:none">
                        <i class="fas fa-check"></i>
                      </span>
                      <span class="icon is-small is-left">
                        <i class="fas fa-user"></i>
                      </span>
                      <p class="help is-danger">  <?php  echo $validation['name']; ?> </p>
                      
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
                      value = "<?php echo $phone;?>"
                      id="phone-num"
                      oninput="cleanPhoneNum()"
                      >
                      <span class="icon is-small is-right" style="display:none">
                        <i class="fas fa-check"></i>
                      </span>
                      <span class="icon is-small is-left">
                        <i class="fas fa-phone"></i>
                      </span>
                      <p class="help is-danger">  <?php  echo $validation['phone']; ?> </p>
                      
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
                          <p class="help is-danger">  <?php  echo $validation['password']; ?> </p>
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
                          <?php  echo $validation['password2']; ?>
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
<script src="content/scripts/registration.js" type="text/javascript"></script>

<?php 
include 'shared/footer.php';
?>