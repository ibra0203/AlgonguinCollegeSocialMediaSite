<?php

    function validateLogin($id, $password, &$db)
    {
        $password_hashed = sha1($password);
        $st = "SELECT * FROM User WHERE UserId = :id AND Password =:password";
        $preparedSt = $db->prepare($st);
        $preparedSt->execute(['id'=>$id, 'password'=>$password_hashed]);
        if($preparedSt->rowCount()!=1)
        {
            return false;
        }
        return true;
    }
?>
