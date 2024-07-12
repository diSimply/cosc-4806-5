<?php
class Reminders extends Controller {
  
  public function index() {
    // Get the user id from the session and get all the reminders for that user
    $user_id = $_SESSION['user_id'];
    $reminder = $this->model('Reminder');
    $list_of_reminders = $reminder->get_reminders($user_id);
    // Pass the reminders to the index page
    $this->view('reminders/index', ['reminders' => $list_of_reminders]);
  }

  public function display_create_form() {
    $this->view('reminders/create');
  }
  
  // CRUD - Create , Read, Update, Delete (Passing the http request to the model)
  public function create_reminder(){
    $user_id = $_SESSION['user_id'];
    $subject = $_REQUEST['subject'];
    $reminder = $this->model('Reminder');
    $reminder->create_reminder($user_id, $subject);
    // redirect to the index page
    header('Location: /reminders');
  }

  public function display_update_form($params) {
    $reminder_id = $params;
    // fetches the reminder from the database
    $reminder = $this->model('Reminder');
    $row = $reminder->get_reminder($reminder_id);
    $this->view('reminders/update', ['reminder_id' => $reminder_id, 'subject' => $row['subject']]);
  }

  public function update_reminder($params){
    $reminder_id = $params;
    $reminder = $this->model('Reminder');
    $reminder->update_reminder($reminder_id, $_REQUEST['subject']);
    header('Location: /reminders');
  }
  
  public function delete_reminder($params){
    $reminder_id = $params;
    $reminder = $this->model('Reminder');
    $reminder->delete_reminder($reminder_id);
    header('Location: /reminders');
  }

}

?>