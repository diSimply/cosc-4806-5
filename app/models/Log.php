<?php 

class Log {

  public function __construct() {

  }

  public function createLog($username, $attempt) {
    $db = db_connect();
    $statement = $db->prepare("insert into logs (username, attempt, time) values (:username, :attempt, now());");
    $statement->bindValue(':username', $username);
    $statement->bindValue(':attempt', $attempt);
    $statement->execute();
  }

}



?>