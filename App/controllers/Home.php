<?php
namespace App\Controllers;
/*
* @File: home.php
* @Author: Nathan Wright
* @Created 05-05-17
* @Last modified: 05-05-17
*
* Copyright (C) Nathan Wright  - All Rights Reserved - https://nathanwright.me/
* Unauthorized copying of this file, via any medium is strictly prohibited
* without the express permission of Nathan "ArrogantBread" Wright
*/

use App\model\homeModel as model;

class Home extends Controller {

    public function index() {
        // load views
        require APPROOT . 'views/template/header.php';
        // require APPROOT . 'views/home/gallery.php';
        require APPROOT . 'views/home/index.php';
        require APPROOT . 'views/template/footer.php';
    }

    public function log () {
      $model = new model();
      $logArr = $model->fetchLogs();

      require APPROOT . 'views/template/header.php';
      require APPROOT . 'views/home/log.php';
      require APPROOT . 'views/template/footer.php';
    }
}
