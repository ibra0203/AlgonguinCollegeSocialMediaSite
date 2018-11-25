<?php 
include 'helpers/validation.php';


  ## inputs
  $id = trim($_POST["id"]);
  $user_password = trim($_POST["password"]);

  ## Validation errors 
  $idMsg        = '';
  $passwordMsg  = '';

  $dbConnection = parse_ini_file("db_connection.ini");
  extract($dbConnection);
  $db = new PDO($dsn, $user, $password);
  ## verbose errors
  $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


  ## Process login here
  if ( isset($_POST['submit']) ) {
  }

include 'shared/header.php';
?>

<div class="section hero is-fullheight">
  <div class="container">
  <h1 class="title is-1 has-text-centered">Log in</h1>
  <h2 class="subtitle has-text-centered"> 
    you need to <a href="NewUser.php"> Sign up</a> if you're a new user.
   </h2>
  <hr>
  
      <div class="column is-5 is-offset-3 has-text-left">

      <form action="<?php echo $_SERVER['PHP_SELF']?>"
             method="POST" 
             class="inputForm"
             >
      
             <div class="field is-horizontal">
                <div class="field-label is-normal">
                  <label class="label">ID</label>
                </div>
                <div class="field-body">
                  <div class="field">
                    <p class="control is-expanded has-icons-left has-icons-right">
                      <input 
                      class="input" 
                      type="text" 
                      placeholder="" 
                      name="id"
                      value = ""
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
                          <p class="help is-danger">  <?php echo $passwordMsg; ?> </p>
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
                      type="submit" value="Log in" name="submit" >
                      
                    </button>
                  </div>
                </div>   
                <div class="field">
                    <div class="control">
                      <input class="button is-warning is-fullwidth clearButton"
                       type="reset" 
                       name="reset"
                       onclick="location.href='Login.php'; " value="Clear">                
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