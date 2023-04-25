<?php

class myPDO {
    
  public function connect($status = 0){

    $dbconfig = parse_ini_file(".env");

    $CONNECTION = $dbconfig["DB_CONNECTION"];
    $HOST = $dbconfig["DB_HOST"];
    $PORT = $dbconfig["DB_PORT"];
    $DATABASE = $dbconfig["DB_DATABASE"];
    $USERNAME = $dbconfig["DB_USERNAME"];
    $PASSWORD = $dbconfig["DB_PASSWORD"];

    try {

      $conn = new PDO("mysql:host=".$HOST.";dbname=".$DATABASE.";charset=utf8mb4", $USERNAME, $PASSWORD);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      if ($status == 1) {
        echo "Connected successfully";
      }
      return $conn;
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }

  }
}






