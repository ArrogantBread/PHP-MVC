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

  
  private function login($uName) {
    $sql = "SELECT * FROM users WHERE username=?";
    $query = $this->db->prepare($sql);
    $query->execute();

    return $query->fetchAll();
  }
}
