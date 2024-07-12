<?php
class Reports extends Controller {

  public function index() {
    // Get the user id from the session and get all the reminders for that user
    $username = $_SESSION['username'];

    // when the user is not the admin, show them they don't have permission to access the reports page
    if ($username != 'admin') {
      $this->view('reports/no-access');
      die;
    }
    
    $reminder = $this->model('Reminder');
    // get all reminders
    $list_of_reminders = $reminder->get_all_reminders();
    $user_most_reminders = $reminder->get_user_with_most_reminders();
    // Pass the reminders to the index page
    $this->view('reports/index', ['reminders' => $list_of_reminders, 'user_most_reminders' => $user_most_reminders]);
  }



}

?>