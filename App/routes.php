<?php
/*
* @File: routes.php
* @Author: Nathan Wright
* @Created 10-05-17
* @Last modified: 10-05-17
*
* Copyright (C) Nathan Wright  - All Rights Reserved - https://nathanwright.me/
* Unauthorized copying of this file, via any medium is strictly prohibited
* without the express permission of Nathan "ArrogantBread" Wright
*/
use App\App as App;

App::get('/', function () {
  return 'home:index';
});

App::get('/login', function () {
  return 'auth:login';
});

App::get('/register', function () {
  return 'auth:register';
});

App::get('/test', function () {
  if (1 == 1) {return 'home:index';};
});
