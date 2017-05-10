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

//--- Load config
require_once __DIR__ . '/../app/config/config.php';
//--- PSR-4 autoLoading
require_once __DIR__ . '/../vendor/autoload.php';

//--- create instance of App
$app = new App\App();

//--- Set the acceptable routes
require_once __DIR__ . '/../app/routes.php';
