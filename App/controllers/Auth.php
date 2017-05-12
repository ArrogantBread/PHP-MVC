<?php
namespace App\Controllers;
/*
* @File: login.php
* @Author: Nathan Wright
* @Created 05-05-17
* @Last modified: 05-05-17
*
* Copyright (C) Nathan Wright  - All Rights Reserved - https://nathanwright.me/
* Unauthorized copying of this file, via any medium is strictly prohibited
* without the express permission of Nathan "ArrogantBread" Wright
*/

use App\model\authModel as AuthModel;

class Auth extends Controller {

  public function __construct() {

    $request = isset($_POST['action']) ? true: false;
    $data = $_POST;

    //--- POST data has been set
    if ($request) {
      //--- New instance of model
      $authModel = new AuthModel();

      //--- Action to be completed
      switch ($_POST['action']) {
        case 'login':
          $_SESSION['error'] = $authModel->login($data);
          break;

        case 'register':
          $_SESSION['error'] = $authModel->create($data);

          break;
      };
      unset($_POST);
      unset($data);
    };
  }

  public function index() {

  }

  public function login() {
    if (self::check()) {return header("location: /home");};
    //--- load views
    require APPROOT . 'views/template/header.php';
    require APPROOT . 'views/login/login.php';
    require APPROOT . 'views/template/footer.php';
  }

  public function register() {
    //--- load views
    require APPROOT . 'views/template/header.php';
    require APPROOT . 'views/login/register.php';
    require APPROOT . 'views/template/footer.php';
  }

  public function registered() {
    //--- load views
    require APPROOT . 'views/template/header.php';
    require APPROOT . 'views/login/complete.php';
    require APPROOT . 'views/template/footer.php';
  }

  public static function check() {
    if (isset($_SESSION['logged']) && $_SESSION['logged']) {
      return true;
    };
    return false;
  }

  public static function logout() {
    //--- wipe and destroy Session
    unset($_SESSION);
    session_destroy();

    //--- send to login page
    header("location: /");
  }



}
