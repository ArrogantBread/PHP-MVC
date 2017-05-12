<?php
/*
* @File: index.php
* @Author: Nathan Wright
* @Created 03-05-17
* @Last modified: 03-05-17
*
* Copyright (C) Nathan Wright  - All Rights Reserved - https://nathanwright.me/
* Unauthorized copying of this file, via any medium is strictly prohibited
* without the express permission of Nathan "ArrogantBread" Wright
*/
/*
* Process URI and route as nescesary, this is a *bad* replacement for the htaccess rewrite engine
*/

session_start();

$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

if ($uri !== '/' && file_exists(__DIR__.'/public'.$uri)) {
    return false;
}

require_once __DIR__.'/public/index.php';
