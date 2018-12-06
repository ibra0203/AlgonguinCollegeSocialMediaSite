<?php 
include 'shared/db.php';


include 'helpers/validation.php';
include 'helpers/login.php';
include 'helpers/util.php';


session_start();
  ## inputs
  $id = getPostSafely('loginId');
  $password = getPostSafely('loginPassword');

  ## Validation errors
  $errMsg        = '';
  ## Process login here
  $validation = array();
  if ( isset($_POST['submit']) ) {
      ValidateAndAdd('loginId', $validation);
      ValidateAndAdd('loginPassword', $validation);
      $errMsg = ValidateRequired($id);
      $errMsg = ValidateRequired($password);

      #is validation successful?
      if($validation['valid'] == true)
      {
          $loginResult = validateLogin($id, $password, $db);
          if($loginResult == true)
          {
              $_SESSION['login'] = $id;
              #redirect to the intended page if it was set
              $redirectTo='MyFriends.php';
              if($_SESSION['redirectTo'])
              {
                  $redirectTo = $_SESSION['redirectTo'];
                  unset($_SESSION['redirectTo']);
              }
              header("Location: ".$redirectTo);
              // exit( );
          }
          else
          {
              $errMsg="Invalid ID or Password";
          }
      }
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
                      name="loginId"
                      value = ""
                      >
                      <span class="icon is-small is-right" style="display:none">
                      </span>
                      <span class="icon is-small is-left">
                        <i class="fas fa-id-card"></i>
                      </span>
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
                        name="loginPassword"
                        value = ""
                        >
                        <span class="icon is-small is-right" style="display:none">
                          <i class="fas fa-check"></i>
                        </span>
                        <span class="icon is-small is-left">
                            <i class="fas fa-lock"></i>
                          </span>
                      </p>
                    </div>
                  </div>
              </div>

                <p class="help is-danger">  <?php echo $errMsg; ?> </p>
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