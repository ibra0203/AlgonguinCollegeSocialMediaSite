<?php 
#include_once('util.php');
$dbIniPath ='';

$_password="";
##Validates then adds to validation array
##Add key 'valid' that will be initialized as true, then switched to false
function ValidateAndAdd($name, &$result)
{
    if(!isset($result['valid']))
    {
        $result['valid'] =true;
    }
    $obj = getPostSafely($name);
  
    $error="";

    if($name =="name")
    $error = ValidateRequired($obj); 
    else if($name =="id")
    $error = ValidateId($obj); 
    else if($name =="phone")
    $error = ValidatePhone($obj);
    else if($name =="password")
    $error = ValidatePassword($obj); 
    else if($name =="password2")
    $error = ValidatePassword2($obj); 
    else 
    $error = ValidateRequired($obj); 


   $result[$name] = $error;
   if($error !="")
   {
        $result['valid']=false;
   }
}
function ValidateRequired($name)
{   
    $err = "";
    if($name==NULL || preg_replace('/\s+/', '', $name) =="")
    {
        $err ="Field is required";
    }
    return $err;
}
function ValidateId($id)
{   
  
    $err = "";
    if($id==NULL || preg_replace('/\s+/', '', $id) =="")
    {
        $err ="Field is required";
    }
     else {


            include('shared/db.php');
            $q = "SELECT * FROM `User` WHERE `UserId` = :this_id";
            $prpSt = $db->prepare($q);
            $prpSt->execute(['this_id'=>$id]);
            consoleLog($id);
            if($prpSt->rowCount() > 0)
            {
                $err = "A user with this ID already exists in our records.";
            }
      
    }
   
    return $err;
}
function ValidatePhone($phone) 
{ 
    $err = "";
     if($phone==NULL || preg_replace('/\s+/', '', $phone) =="")
    {
        $err ="Field is required";
    }
    else
    {
        /*
        $expression = "/^[2-9]{1}[0-9]{2}-[2-9]{1}[0-9]{2}-[0-9]{4}$/";*/
        $expression = "/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/";
        if(!(bool)preg_match($expression, $phone))
        {
            $err = "Phone format is invalid";
        }
        
    }
    return $err;
}
function ValidatePassword($pass)
{
    global $_password;
    $err = "";
    if($pass==NULL || preg_replace('/\s+/', '', $pass) =="")
    {
        $err ="Field is required";
    }
    else if(strlen($pass) < 6)
    {
        $err= "Password has to be at least 6 characters";
    }
    else if(!preg_match('/[A-Z]/', $pass) || !preg_match('/[a-z]/', $pass)|| !preg_match('/[0-9]/', $pass))
    {
        $err = "Password has to contain at least one upper case character, one lower case, and one number.";
    }
    
    $_password = $pass;
    return $err;
    
}
function ValidatePassword2($pass)
{
    global $_password;
    $err = "";
    if($pass==NULL || preg_replace('/\s+/', '', $pass) =="")
    {
        $err ="Field is required";
    }
    else if($pass != $_password)
    {
        $err = "Passwords don't match";
    }
    return $err;
}



?>