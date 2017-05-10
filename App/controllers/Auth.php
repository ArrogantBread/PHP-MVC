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

class Auth extends Controller {

    public function index() {
        //--- load views
        require APPROOT . 'views/template/header.php';
        require APPROOT . 'views/login/login.php';
        require APPROOT . 'views/template/footer.php';
    }

    public function login() {
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

}
