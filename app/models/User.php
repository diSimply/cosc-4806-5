<?php

class User {

    public $username;
    public $password;
    public $auth = false;

    public function __construct() {
        
    }

    public function test () {
      $db = db_connect();
      $statement = $db->prepare("select * from users;");
      $statement->execute();
      $rows = $statement->fetch(PDO::FETCH_ASSOC);
      return $rows;
    }

    public function authenticate($username, $password, $log) {
        /*
         * if username and password good then
         * $this->auth = true;
         */
    		$username = strtolower($username);
    		$db = db_connect();
        $statement = $db->prepare("select * from users WHERE username = :name;");
        $statement->bindValue(':name', $username);
        $statement->execute();
        $rows = $statement->fetch(PDO::FETCH_ASSOC);

    		if (password_verify($password, $rows['password'])) {
    			$_SESSION['auth'] = 1;
    			$_SESSION['username'] = ucwords($username);
          $_SESSION['user_id'] = $rows['id'];


          $log->createLog($username, 'good');
    			unset($_SESSION['failedAuth']);
          unset($_SESSION['failedTime']);
    			header('Location: /home');
    			die;
    		} else {
          $log->createLog($username, 'bad');
          $_SESSION['failedTime'] = time();
    			if(isset($_SESSION['failedAuth'])) {
    				$_SESSION['failedAuth'] ++; //increment
          } else {
    				$_SESSION['failedAuth'] = 1;
    			}
    			header('Location: /login');
    			die;
    		}
    }

    public function register($username, $password) {
        /*
         * if username and password good then
         * $this->auth = true;
         */
        $username = strtolower($username);
        $password = password_hash($password, PASSWORD_DEFAULT);
        $db = db_connect();
        $statement = $db->prepare("insert into users (username, password) values (:username, :password);");
        $statement->bindValue(':username', $username);
        $statement->bindValue(':password', $password);
        $statement->execute();
        header('Location: /login');
    }


    public function exists($username) {
        $username = strtolower($username);
        $db = db_connect();
        $statement = $db->prepare("select * from users WHERE username = :name;");
        $statement->bindValue(':name', $username);
        $statement->execute();
        $rows = $statement->fetch(PDO::FETCH_ASSOC);
        if ($rows) {
          return true;
        } else {
          return false;
        }
    }

}
?>