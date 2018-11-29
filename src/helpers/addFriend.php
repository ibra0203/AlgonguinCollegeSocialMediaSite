<?php

    function validateFriendRequest($idTo, $idFrom, &$db, &$errMsg, &$succMsg)
    {
        $idTo = filterString($idTo);
        #is user sending a request to themself?
        if($idTo == $idFrom)
        {
            $errMsg = "Can't send a request to yourself";
            return false;
        }
        #does user exist?
        $st ="SELECT UserId FROM User WHERE UserId = :idTo";
        $prepSt = $db->prepare($st);
        $prepSt->execute(['idTo'=>$idTo]);
        if($prepSt->rowCount() == 0)
        {
            $errMsg = "User ID doesn't exist";
            return false;
        }
        
        #is already friends?
        $st="SELECT * FROM Friendship WHERE Friend_RequesterId = :idFrom 
                OR Friend_RequesteeId = :idFrom2";
        $prepSt = $db->prepare($st);
        $prepSt->execute(['idFrom'=>$idFrom, 'idFrom2'=>$idFrom]);
        foreach ($prepSt as $row)
        {
            $from = $row['Friend_RequesterId'];
            $to = $row['Friend_RequesteeId'];
            $status = $row['Status'];
            
            #If a friendship is already established
            if($from == $idTo || $to == $idTo)
            {
                #if they're already friends
                if($status == "accepted")
                {
                    $errMsg = "User is already friends with you";
                    return false;
                }
                else
                {
                    #if it's just a request, sent by the other user, accept it
                    if($from ==$idTo)
                    {
                        acceptFriendRequest($from, $to, $db);
                        $succMsg = $from." already sent you a friend request. Request accepted.";
                        return true;
                    }
                    else
                    {
                    #if it's a request by this user, give an error
                        $errMsg = "A request to this user is already pending.";
                        return false;
                    }
                }
                
            }
        }
        
        #no friendship established, create a new one
        
        $st ="INSERT INTO Friendship VALUES(:from, :to, 'request')";
        $prepSt =$db->prepare($st);
        $prepSt->execute(['from'=>$idFrom, 'to'=>$idTo]);
        $succMsg ="Sent request to ".$idTo;
        
        return true;
    }
    
    function acceptFriendRequest($from, $to, &$db)
    {
        $st ="UPDATE Friendship SET Status = 'accepted' 
                            WHERE Friend_RequesterId = :from 
                            AND Friend_RequesteeId = :to";
                        $prepSt = $db->prepare($st);
                        $prepSt->execute(['from'=>$from, 'to'=>$to]);
                        
    }

?>
