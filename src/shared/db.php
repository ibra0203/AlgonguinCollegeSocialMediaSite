<?php 
  $dbConnection = parse_ini_file("db_connection.ini");
    extract($dbConnection);
    $db = new PDO($dsn, $user, $password);
    ## verbose errors
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  ?>