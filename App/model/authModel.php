<?php
namespace App\Model;
/*
* @File: auth.php
* @Author: Nathan Wright
* @Created 11-05-17
* @Last modified: 11-05-17
*
* Copyright (C) Nathan Wright  - All Rights Reserved - https://nathanwright.me/
* Unauthorized copying of this file, via any medium is strictly prohibited
* without the express permission of Nathan "ArrogantBread" Wright
*/


class AuthModel extends Model
{

  public function login($data) {

    $DBC = $this->DBConnect();

    $sql = "SELECT * FROM users WHERE user_name=:uname";
    $query = $DBC->prepare($sql);
    $params = array(':uname' => $data['user_name']);

    $query->execute($params);

    $result = $query->fetch();

    if (!empty($result)) {
      //--- check passwords match
      if (password_verify($data['user_pass'], $result->pass_hash)) {
        //--- set session vars
        $_SESSION['logged'] = true;
        $_SESSION['username'] = $data['user_name'];
        //--- set the URI
        header("location: /home");
      } else {
        $error = "Username or password incorrect";
      }
    } else {
      $error = "This user does not exist";
    }

    //--- log the attempt
    $pass = isset($error) ? false : true;
    $this->log($pass, $data['user_name'], $_SERVER['REMOTE_ADDR']);
    //--- return error if nescesary
    if (isset($error)) {return $error;};
  }

  public function create($data) {
    //--- XSS Protection (kinda)
    $data = filter_var_array($data, FILTER_SANITIZE_SPECIAL_CHARS);
    //--- Final check passwords match
    if (!($data['user_pass'] == $data['user_passConf']) || empty($data['user_name']) || empty('user_email')) {return 'Passwords do not match';};
    //--- Check if Username/email already used
    $userExists = $this->checkUserExists($data['user_name'], $data['user_email']);
    if ($userExists) {return 'Error, user already created with that name/email';};

    //--- Hash the pass
    $hash = password_hash($data['user_pass'], PASSWORD_BCRYPT);

    //--- Query
    $DBC = $this->DBConnect();
    $sql = "INSERT INTO users (user_name, user_email, pass_hash) VALUES (:uname, :email, :passhash)";
    $query = $DBC->prepare($sql);
    //--- bind params
    $params = array(':uname' => $data['user_name'], ':email' => $data['user_email'], ':passhash' => $hash);

    //--- Execute
    if ($query->execute($params)) {
      $_SESSION['logged'] = true;
      $_SESSION['username'] = $data['user_name'];
      header("location: /home");
    };


  }

  public function checkUserExists($uname, $email) {
    //--- Get the connection
    $DBC = $this->DBConnect();

    //--- Prepare the query
    $sql = "SELECT * FROM users WHERE user_name=:uname OR user_email=:email";
    $query = $DBC->prepare($sql);
    //--- set the params
    $params = array(':uname' => $uname, ':email' => $email);

    $query->execute($params);

    //--- fetch associative array
    $result = $query->fetchAll();
    //--- process
    if (!empty($result)) {return true;} else {return false;};
  }


  // logs login attempt
  // params (pass/fail , attempted username, connected IP)
  private function log($state, $uname, $ip) {
    //--- login good or bad
    $pass = $state ? "PASS" : "FAIL";

    //--- concat vars with delimiter
    $str = (date("h:i:sa") . "/" . $pass . "/" . $uname . "/" . $ip . "\r\n");
    //--- open the logfile in append mode
     $file = fopen("log.csv", "a");
    //--- write to the file
    fwrite($file, $str);
    //--- close the file
    fclose($file);
  }
}
