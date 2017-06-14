<?php
namespace App\Controllers;
/*
* @File: gallery.php
* @Author: Nathan Wright
* @Created 09-06-17
* @Last modified: 09-06-17
*
* Copyright (C) Nathan Wright  - All Rights Reserved - https://nathanwright.me/
* Unauthorized copying of this file, via any medium is strictly prohibited
* without the express permission of Nathan "ArrogantBread" Wright
*/

use App\model\galleryModel as GalleryModel;

class Gallery extends Controller {

    public function index() {
      $model = new galleryModel();
      $gallery = $model->fetchImg();

        // load views
      require APPROOT . 'views/template/header.php';
      require APPROOT . 'views/gallery/index.php';
      require APPROOT . 'views/template/footer.php';
    }

    public function edit() {
      // load views
      require APPROOT . 'views/template/header.php';
      require APPROOT . 'views/gallery/edit.php';
      require APPROOT . 'views/template/footer.php';
    }

    public function new() {
      require APPROOT . 'views/template/header.php';
      require APPROOT . 'views/gallery/new.php';
      require APPROOT . 'views/template/footer.php';
    }
}
