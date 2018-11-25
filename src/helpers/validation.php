<?php 

    ## GENERAL USE
    function check_if_all_valid() {
      foreach (func_get_args() as $msg) {
      if ( $msg != '') return false;
      } 
      return true;  
    }

    function isNotBlank($val) {
      if(!isset($val) || $val =='') {
        return "Cannot be blank";
      }
      return '';
   }

   #Duplicate student ID
   function idNotDuplicate($val, $arr) {

    foreach($arr as $id) {
      if ($val == $id) return "A student with this ID already Exists";
    }
    return '';
 }

 ## VALIDATE PHONE
 function validatePhone($val) {
  $blankMsg = isNotBlank($val);
  if($blankMsg != '') {
    return $blankMsg;  
  }

  $phoneRe = '/\D*([2-9]\d{2})(\D*)([2-9]\d{2})(\D*)(\d{4})\D*/i';
  if (!preg_match($phoneRe, $val)) {
  return 'invalid phone number';
} else {
  return '';
}

}


function validatePassword($val) {
  $blankMsg = isNotBlank($val);
  if($blankMsg != '') {
    return $blankMsg;  
  }
  $passwordRE = '';
  if (!preg_match($passwordRE, $val)) {
  return 'Password must at least 6 characters long, contain at least one upper case, one lowercase and one digit.';
} else {
  return '';
}

}

function validatePasswordMatch($val1, $val2) {
  return ($val1 == $val2) ? '':'Passwords must match';
}



?>