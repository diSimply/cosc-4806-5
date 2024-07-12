<?php

class Create extends Controller {

    public function index() {		
	    $this->view('create/index');
    }

    public function signup(){
      $username = $_REQUEST['username'];
      $password = $_REQUEST['password'];
      $confirmPassword = $_REQUEST['confirmPassword'];

      // verify the passwords match
      if ($password != $confirmPassword){
        $this->view('create/index', ['error' => 'Passwords do not match']);
        return;
      }
      // verify passowrd rules (at least 10 characters)
      if (strlen($password) < 10){
        $this->view('create/index', ['error' => 'Password must be at least 10 characters']);
        return;
      }
  
      $user = $this->model('User');
      // verify username not already taken
      if ($user->exists($username)){
        $this->view('create/index', ['error' => 'Username already taken']);
        return;
      }

      $user->register($username, $password); 
    }
}
