<?php
    error_reporting(0);
    function getPostSafely($name, $ifNotFound=NULL)
    {
        $data = $ifNotFound;
        if(isset($_POST[$name]))
        {
           $data = filterString($_POST[$name]);
        }
        return $data;
    }
    
    function filterString($inp)
    {
        $result ='';
        if(is_string($inp))
        {
           $result = trim($inp);
           $result = stripslashes($result);
           $result = htmlspecialchars($result);
            
        }
        
        return $result;
        
    }
    
    function consoleLog( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';
    }
    function asMoney($value) 
    {
        return '$' . number_format($value, 2);
    }
    
    
    function sortArrayByField(&$arr, $fieldName, $isAsc)
    {
        $isString = false;
        if(is_string($arr[0]->$fieldName()))
        {
           $isString=true;
        }

        usort($arr, function($a, $b) use($fieldName, $isAsc, $isString){
            
            consoleLog($isAsc);
            $n1=$a->$fieldName();
            $n2=$b->$fieldName();
            if($isAsc==false)
            {
                $n1=$b->$fieldName();
                $n2=$a->$fieldName();
            }
            if($isString)
            {
                return strcmp(strtolower($n1), strtolower($n2));
            }
            if($n1==$n2) return 0;
            return $n1 > $n2  ? 1 : -1;
        });
        
    }
   
?>