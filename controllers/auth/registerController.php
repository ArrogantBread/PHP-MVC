<?php
namespace controller\auth;
/*
* @File: registerController.php
* @Author: Nathan Wright
* @Created 04-05-17
* @Last modified: 04-05-17
*
* Copyright (C) Nathan Wright  - All Rights Reserved - https://nathanwright.me/
* Unauthorized copying of this file, via any medium is strictly prohibited
* without the express permission of Nathan "ArrogantBread" Wright
*/
use controller

class registerController extends controller {

  //where to send users after registration
  private $redirectTo = '/home'

  public function __construct() {

  }

  protected function validate() {
    return validate::make()
  }

  protected function create (array $data) {
    return User::create([
      'name' => $data['name'],
      'email' => $data['email'],
      'password' => bcrypt($data['password'])
    ]);
  }
}
