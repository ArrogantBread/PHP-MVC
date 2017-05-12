<?php
/*
* @File: config.php
* @Author: Nathan Wright
* @Created 04-05-17
* @Last modified: 04-05-17
*
* Copyright (C) Nathan Wright  - All Rights Reserved - https://nathanwright.me/
* Unauthorized copying of this file, via any medium is strictly prohibited
* without the express permission of Nathan "ArrogantBread" Wright
*/

//--- Error Reporting
define('ERRORS', true);

if (ERRORS) {
  error_reporting(E_ALL);
  ini_set("display_errors", 1);
}

//--- App root
define('APPROOT', dirname(__DIR__) . '/');

//--- Database config
define('MYSQL_TYPE', 'mysql');
define('MYSQL_HOST', '127.0.0.1');
define('MYSQL_NAME', 'usersystem');
define('MYSQL_USER', 'root');
define('MYSQL_PASS', 'root');
