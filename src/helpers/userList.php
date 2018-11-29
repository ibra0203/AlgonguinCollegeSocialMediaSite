<?php
      $dbIniLocation = dirname("../../")."/db_connection.ini";
     $dbConnection = parse_ini_file($dbIniLocation);
    extract($dbConnection);
    $db = new PDO($dsn, $user, $password);
    ## verbose errors
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    include("util.php");
    $q = $_REQUEST["q"];
    if(isset($q))
    {
        $idSeq = filterString($q);
        $st = "SELECT UserId FROM User WHERE UserId LIKE :idseq LIMIT 5";
            
        $prepSt = $db->prepare($st);
        $prepSt->execute(["idseq"=>$idSeq."%"]);
        $users = array();
        foreach($prepSt as $row)
        {
            $u = (string) $row['UserId'];
            array_push($users, $u);
        }

        echo json_encode($users);
    }
?>