<?php 
session_start();
include 'helpers/validation.php';
include 'helpers/friends.php';
include 'helpers/addFriend.php';
## declares database as $db
include 'shared/db.php';

$owner = $_SESSION['login'];

$pendingRequests = getFriendRequests($db, $owner);
$myFriends = getMyFriends($db, $owner);



// deny friendships
if (isset($_POST['deny'])) {
  // $requests is a string of UserIds
  $requests = $_POST['requests'];
  foreach ($requests as $requester_id) {
    denyFriendRequest($db, $requester_id, $owner);
  }
}

// accept friendships
if (isset($_POST['accept'])) {
  $requests = $_POST['requests'];
  foreach ($requests as $requester_id) {
    acceptFriendRequest($requester_id, $owner, $db);
  }
}

// defriend
if (isset($_POST['unfriend'])) {
  $selected = $_POST['unfriends'];
  foreach ($selected as $current_friend) {
    denyFriendRequest($db, $current_friend, $owner);
  }
}

include 'shared/header.php';
?>

<div class="section hero is-fullheight">
  <div class="container">
    
    <h1 class="title is-1 has-text-centered">My Friends</h1>
      <?php  include 'shared/welcome.php' ;?>
      <br>
      <div class="has-text-centered">
      <h3 class=" button title is-5 has-text-centered is-outlined">
        <a href="AddFriend.php"> 
          <i class="fas fa-lg fa-plus"></i> 
          &nbsp;
          Add Friends
        </a>
      </h3>
      </div>

      <br>
      <br>
      <br>

  <form id="form" action="<?php echo $_SERVER['PHP_SELF']?>"
  method="post"
>

<div class="columns is-5">
    <div class="column has-background-grey-lighter">
    <h2 class="subtitle has-text-left "> Friends:</h2> 
        
        <table class="table is-striped is-fullwidth">
            <thead>
              <tr>
                <th><i class="fa fa-user"></i>&nbsp;Name</th>
                <th><i class="far fa-images"></i>&nbsp;Shared Albums</th>
                <th><i class="fas fa-user-minus"></i>&nbsp;Unfriend</th>
              </tr>
            </thead>
            <tbody>
            

             <?php 
                  foreach ($myFriends as $user) {
                    echo "<tr>";
                    echo "<td>
                            <a href = '?friendId=$user->UserId' > 
                                $user->Name
                            </a>
                          </td>";
                    echo "<td > 14 </td>";
                    echo "<td colspan='1'>
                            <input type='checkbox' name='unfriends[]' value=$user->UserId >
                        </td>";
                    echo "</tr>";
                  }
                
                ?>


            </tbody>
        </table>   
        <div class="control has-text-right">
          <input
            class="button is-danger "
            type="submit" value="Unfriend Selected" name="unfriend" >        
        </div>
  </div>
      

      
  <div class="column has-background-light">
        <h2 class="subtitle has-text-left"> Friends Requests:</h2> 
        <table class="table is-fullwidth is-striped">
            <thead>
                <th colspan='8'><i class="fa fa-user"></i>&nbsp;Name</th>
                <th colspan='1'><i class="fas fa-user-minus"></i>&nbsp;Accept or Deny</th>
            </thead>
            <tbody>

                <?php 
                  foreach ($pendingRequests as $user) {
                    echo "<tr>";
                    echo "<td colspan='8'> $user->Name</td>";
                    echo "<td colspan='1'>
                            <input type='checkbox' name='requests[]' value=$user->UserId >
                        </td>";
                    echo "</tr>";
                  }
                
                
                ?>

            </tbody>
        </table>
        <div class="control has-text-right">
          <input
            class="button is-success "
            type="submit" value="Accept Selected" name="accept" >
          <input
          class="button is-danger "
          type="submit" value="Deny Selected" name="deny" >          
        </div>
  </div>
</div>        
  

 </form>   
  </div>    <!-- CONTAINER -->
</div>      <!-- HERO -->



<!-- FOOTER -->
<?php include 'shared/footer.php'; ?>