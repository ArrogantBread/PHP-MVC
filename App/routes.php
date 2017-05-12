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
use App\controllers\Auth as Auth;

App::get('/', function () {
  return 'auth:login';
});

App::get('/home', function () {
 if (auth::check()) {
   return 'home:index';
 } else {
   return 'auth:login';
 }
});

App::get('/logout', function () {
  if (auth::check()) {
    return 'auth:logout';
  } else {
    return 'auth:login';
  };
});

App::get('/login', function () {
  return 'auth:login';
});

App::get('/register', function () {
  return 'auth:register';
});
