<?php 
  $dbIniLocation = "db_connection.ini";
  $dbConnection = parse_ini_file($dbIniLocation);
    extract($dbConnection);
    $db = new PDO($dsn, $user, $password);
    ## verbose errors
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  ?>