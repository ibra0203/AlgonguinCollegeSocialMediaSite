<?php

function registerUser($id, $name, $phone, $password, &$db)
{
    $success = true;
    try{
        $password_hashed = sha1($password);
        $sqlSt = "INSERT INTO User(`UserId`, `Name`, `Phone`, `Password`) 
                VALUES(:id, :name, :phone, :password)";
        $statement = $db->prepare($sqlSt);
        $statement->execute(['id'=>$id, 'name'=>$name, 'phone'=>$phone, 'password'=>$password_hashed]);
        
    } catch (Exception $ex) {
        $success = false;
    }
    return $success;
}   
?>
