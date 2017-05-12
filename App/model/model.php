<?php
namespace App\model;
/*
* @File: model.php
* @Author: Nathan Wright
* @Created 04-05-17
* @Last modified: 04-05-17
*
* Copyright (C) Nathan Wright  - All Rights Reserved - https://nathanwright.me/
* Unauthorized copying of this file, via any medium is strictly prohibited
* without the express permission of Nathan "ArrogantBread" Wright
*/

use PDO;


class model {

  public $db = null;

  public function __construct() {
    //--- create db connection with exception handling
    try {
      $this->db = $this->DBConnect();
    } catch (PDOException $e) {
      exit('Database connection could not be established.');
    };
  }

  public function DBConnect() {
    //--- PDO options
    $options = array(
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
    );
    //--- open a database connection
    return(new PDO(MYSQL_TYPE . ':host=' . MYSQL_HOST . ';dbname=' . MYSQL_NAME . ';', MYSQL_USER, MYSQL_PASS, $options));
  }
}
