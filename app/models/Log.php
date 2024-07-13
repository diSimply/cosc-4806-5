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

  public function get_users_login_attempts(){
    $db = db_connect();
    $statement = $db->prepare("
      SELECT 
        users.username,
        SUM(CASE WHEN logs.attempt='good' THEN 1 ELSE 0 END) as good_attempts,
        SUM(CASE WHEN logs.attempt='bad' THEN 1 ELSE 0 END) as bad_attempts
      FROM logs
      RIGHT JOIN users ON users.username = logs.username
      GROUP BY users.username
      ORDER BY users.username;
    ");
    $statement->execute();
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
  }
  



}



?>