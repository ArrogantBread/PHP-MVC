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

//--- Load all files
require_once "bootstrap.php";
require_once "config/config.php";

//--- Inctance of the controller
$controller = new controllers\controller();

//--- Instance of app
$app = new App\App();
