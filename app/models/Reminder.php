<?php
class Reminder{
  // CRUD - Create , Read, Update, Delete
  public function create_reminder($user_id, $subject){
    $db = db_connect();
    $statement = $db->prepare("insert into reminders (user_id, subject) values (:user_id, :subject);");
    $statement->bindValue(':user_id', $user_id);
    $statement->bindValue(':subject', $subject);
    $statement->execute();
  }

  public function get_reminders($user_id){
    $db = db_connect();
    $statement = $db->prepare("select * from reminders where user_id = :user_id;");
    $statement->bindValue(':user_id', $user_id);
    $statement->execute();
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
  }
  
  public function update_reminder($id, $subject){
    $db = db_connect();
    $statement = $db->prepare("update reminders set subject = :subject where id = :id;");
    $statement->bindValue(':id', $id);
    $statement->bindValue(':subject', $subject);
  
    $statement->execute();
  }

  public function get_reminder($reminder_id){
    $db = db_connect();
    $statement = $db->prepare("select * from reminders where id = :reminder_id;");
    $statement->bindValue(':reminder_id', $reminder_id);
    $statement->execute();
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    return $row;
  }

  public function delete_reminder($id){
    $db = db_connect();
    $statement = $db->prepare("delete from reminders where id = :id;");
    $statement->bindValue(':id', $id);
    $statement->execute();
  } 
}


?>