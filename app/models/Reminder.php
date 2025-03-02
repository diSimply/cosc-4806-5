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

  public function get_all_reminders(){
    $db = db_connect();
    $statement = $db->prepare("select reminders.id, reminders.subject, reminders.created_at, users.username username from reminders join users on reminders.user_id = users.id;");
    $statement->execute();
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
  }

  public function get_user_with_most_reminders(){
    $db = db_connect();
    $statement = $db->prepare("select users.username, count(reminders.id) as total from reminders join users on reminders.user_id = users.id group by users.username order by total desc limit 1;");
    $statement->execute();
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    return $row;
  }


  public function weekdays() {
    $db = db_connect();
    $statement = $db->prepare("
      SELECT 
          SUM(CASE WHEN DAYOFWEEK(reminders.created_at) = 2 THEN 1 ELSE 0 END) as monday,
          SUM(CASE WHEN DAYOFWEEK(reminders.created_at) = 3 THEN 1 ELSE 0 END) as tuesday,
          SUM(CASE WHEN DAYOFWEEK(reminders.created_at) = 4 THEN 1 ELSE 0 END) as wednesday,
          SUM(CASE WHEN DAYOFWEEK(reminders.created_at) = 5 THEN 1 ELSE 0 END) as thursday,
          SUM(CASE WHEN DAYOFWEEK(reminders.created_at) = 6 THEN 1 ELSE 0 END) as friday,
          SUM(CASE WHEN DAYOFWEEK(reminders.created_at) = 7 THEN 1 ELSE 0 END) as saturday,
          SUM(CASE WHEN DAYOFWEEK(reminders.created_at) = 1 THEN 1 ELSE 0 END) as sunday
      FROM reminders;
    ");
    $statement->execute();
    $row = $statement->fetch(PDO::FETCH_ASSOC);
     return $row;
  }
}


?>