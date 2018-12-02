<?php 
  // friendship Status codes are 'accepted' and 'request'
//  FRIENDSHIP
  // Friend_RequesterId
  // Friend_RequesteeId
  // Status

  // FRIENDSHIP STATUS
  // Status_Code
  // Description

  function getFriends($user) {
  
  }

  function getFriendRequests($db, $user) {
    $st = "SELECT `User`.`UserId`, `Friendship`.`*`,`User`.`Name`
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

  function getMyFriends($db, $user) {
    $st = "SELECT `User`.`UserId`, `Friendship`.`*`,`User`.`Name`
            FROM `Friendship`
            INNER JOIN `User`
            ON `User`.`UserId` = `Friendship`.`Friend_RequesterId`
            WHERE `Friendship`.`Friend_RequesteeId` = :user_id
            AND `Friendship`.`Status` = 'accepted'
    ";
    $prepSt =$db->prepare($st);
    $prepSt->execute(['user_id'=>$user]);
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

  


?>