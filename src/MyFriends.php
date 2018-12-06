<?php 
session_start();
include 'helpers/protected.php';
ValidateUser();

include 'helpers/validation.php';
include 'helpers/friends.php';
include 'helpers/util.php';
include 'helpers/addFriend.php';
include 'helpers/databaseHelper.php';
## declares database as $db
include 'shared/db.php';

$addMsg = '';
$unfriendMsg='';
$owner = $_SESSION['login'];

$pendingRequests = getFriendRequests($db, $owner);

$myName = getNameFromId($owner, $db);
$myFriends = getMyFriends($db, $owner, $myName);


// deny friendships
if (isset($_POST['deny'])) {
  // $requests is a string of UserIds
  $requests = $_POST['requests'];
  foreach ($requests as $requester_id) {
    denyFriendRequest($db, $requester_id, $owner);
    
  }
  header("Location: MyFriends.php");
}

// accept friendships
if (isset($_POST['accept'])) {
   $acceptedRequests = '';
  $requests = $_POST['requests'];
  #counter
  $i=0;
  $requestsCount = count($requests);
  foreach ($requests as $requester_id) {
     
     $reqName = getNameFromId($requester_id, $db);
     if($i>0)
     {
        $acceptedRequests .=","; 
     }
     
    $acceptedRequests.= $reqName;
    acceptFriendRequest($requester_id, $owner, $db);
    $i++;
  }
  if($i==0)
      header("Location: MyFriends.php");
  #don't set the friend accepting message straight away, refresh the page and send a Get request with the names of the new friends.
  else
  {
      $_SESSION['acceptedRequests'] = $acceptedRequests;
    header("Location: MyFriends.php?acceptedReq=1");
  }
}


// defriend
if (isset($_POST['unfriend'])) {
  $selected = $_POST['unfriends'];
  $i=0;
  foreach ($selected as $current_friend) {
    denyFriendRequest($db, $current_friend, $owner);
    unfriend($db, $current_friend, $owner);
    $i++;
  }
  $iS = (string)$i;
  $_SESSION['unfriended'] = true;
    header("Location: MyFriends.php?unfriended=".$iS);
  
}

if(isset($_GET['acceptedReq']))
{
   if(isset($_SESSION['acceptedRequests']))
   {
    $accReq = $_SESSION['acceptedRequests'];
  
    $reqArray = explode(',', $accReq);
    
        $newFriends='';
        for($i=0; $i< count($reqArray); $i++)
        {
            $f = $reqArray[$i];

            if($i > 0)
            {
                if($i == count($reqArray)-1)
                    $newFriends .= ", and ";
                else
                    $newFriends .= ", ";
            }
            $newFriends .= $f;

            if($i>2)
            {
                $remaining =(string) (count($reqArray) - ($i+1));
                if($remaining =="1")
                    $newFriends .= " and ".$remaining." other.";
                else if($remaining >1)
                 $newFriends .= " and ".$remaining." others.";
                break;
            }
        }
        $addMsg = "Friend Request(s) Accepted. You're now friends with ".$newFriends;
        unset($_SESSION['acceptedRequests']);
   }
    
}

if(isset($_GET['unfriended']))
{
    if(isset($_SESSION['unfriended']))
    {
        $unfriendCount = (int) $_GET['unfriended'];
        $unfriendCountS = (string) $unfriendCount;
        if($unfriendCount == 1)
                $unfriendMsg = "Removed (1) friend from your list.";
        else if($unfriendCount > 1)
                $unfriendMsg = "Removed ($unfriendCountS) friends from your list.";
        unset($_SESSION['unfriended']);
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
<?php if ($addMsg != '') {
          echo "
          <div class='flash-msg column is-fullwidth  notification is-success'>
            $addMsg
          <button id='delete' class='delete'></button>
          </div>";
        }  ?>
<?php if ($unfriendMsg != '') {
          echo "
          <div class='flash-msg column is-fullwidth  notification is-danger'>
            $unfriendMsg
          <button id='delete' class='delete'></button>
          </div>";
        }  ?>

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
                      $sharedAlbumsCount = count(getSharedAlbums($db, $user->UserId));
                    echo "<tr>";
                    echo "<td>
                            <a href = 'FriendPictures.php?friendId=$user->UserId' > 
                                $user->Name
                            </a>
                          </td>";
                    echo "<td > $sharedAlbumsCount </td>";
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


<script type="text/javascript" src="content/scripts/removeNotificaiton.js"></script>
<!-- FOOTER -->
<?php include 'shared/footer.php'; ?>