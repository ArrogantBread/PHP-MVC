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
  return 'home:index';
});

App::get('/home', function () {
  return 'home:index';
});

App::get('/home/log', function () {
  if (auth::check()) { return 'home:log'; };
  return 'home:index';
});

App::get('/logout', function () {
  if (!(auth::check())) { return 'auth:login'; };
  return 'auth:logout';
});

App::get('/login', function () {
  return 'auth:login';
});

App::get('/register', function () {
  return 'auth:register';
});

App::get('/gallery', function () {
  return 'gallery:index';
});

App::get('/gallery/edit', function () {
  if (!(auth::check())) { return 'gallery:index'; };
  return 'gallery:edit';
});
