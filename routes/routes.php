<?php
/*
* @File: routes.php
* @Author: Nathan Wright
* @Created 03-05-17
* @Last modified: 03-05-17
*
* Copyright (C) Nathan Wright  - All Rights Reserved - https://nathanwright.me/
* Unauthorized copying of this file, via any medium is strictly prohibited
* without the express permission of Nathan "ArrogantBread" Wright
*/

Route::add('/', function () {
  // Auth::check() ? return view('home') : return view('dog')

});

Route::add('/dog', function () {
    return view('dog');
});
