<?php 
  // friendship Status codes are 'accepted' and 'request'
//  FRIENDSHIP
  // Friend_RequesterId
  // Friend_RequesteeId
  // Status

  // FRIENDSHIP STATUS
  // Status_Code
  // Description


  function getFriendRequests($db, $user) {
    $st = "SELECT `User`.`UserId`, `Friendship`.*,`User`.`Name`
            FROM `Friendship`
            INNER JOIN `User`
            ON `User`.`UserId` = `Friendship`.`Friend_RequesterId`
            WHERE `Friendship`.`Friend_RequesteeId` = :user_id
            AND `Friendship`.`Status` = 'request'
    ";
    $prepSt =$db->prepare($st);
    $prepSt->execute(['user_id'=>$user]);
    $res = $prepSt->fetchAll(PDO::FETCH_OBJ);
    return $res;
  }

  function getMyFriends($db, $user, $my_name) {
    $st= "SELECT `User`.`UserId`, `Friendship`.`Friend_RequesterId`,`Friendship`.`Friend_RequesteeId`,`User`.`Name`
          FROM `Friendship`
          JOIN `User`
          ON `User`.`UserId` = `Friendship`.`Friend_RequesteeId`
          OR `User`.`UserId` = `Friendship`.`Friend_RequesterId`
          WHERE 
          `User`.`Name` <> :my_name
          AND (
                `Friendship`.`Friend_RequesterId` = :user_id
          OR    `Friendship`.`Friend_RequesteeId` = :user_id
          )  
          AND `Friendship`.`Status` = 'accepted'";

    $prepSt =$db->prepare($st);
    $prepSt->execute(['user_id'=>$user, 'my_name' => $my_name]);
    $res = $prepSt->fetchAll(PDO::FETCH_OBJ);
    return $res;
  }

  function denyFriendRequest($db, $requester_id, $user_id) {
    $st = "DELETE FROM `Friendship`
           WHERE `Friendship`.`Friend_RequesterId` = :requester
           AND   `Friendship`.`Friend_RequesteeId` = :requestee";
    $prepSt =$db->prepare($st);
    $prepSt->execute(['requester'=>$requester_id,'requestee'=>$user_id]);
  }


  function unfriend($db, $friend_id, $user_id) {
    $st = "DELETE FROM `Friendship`
           WHERE `Friendship`.`Friend_RequesterId` = :current_user
           AND   `Friendship`.`Friend_RequesteeId` = :friend_id
           AND   `Friendship`.`Status` = 'accepted'";
    $prepSt =$db->prepare($st);
    $prepSt->execute(['friend_id'=>$friend_id,'current_user'=>$user_id]);
  }

  function getFriendById($db , $friend_id) {
    $st = "SELECT * FROM User
           WHERE UserId = :id";
    $prepSt =$db->prepare($st);
    $prepSt->execute(['id'=>$friend_id]);
    $res = $prepSt->fetchAll(PDO::FETCH_OBJ);
    return $res[0];
  }
  function getSharedAlbums($db, $friend_id)
  {
      $st = 'SELECT * FROM `Album` WHERE `Album`.`Owner_Id`= :friend_id AND `Album`.`Accessibility_Code` = "shared"';
      $prepSt = $db->prepare($st);
      $prepSt->execute(['friend_id'=>$friend_id]);
      $res = $prepSt->fetchAll();
      return $res;
  }
?>