<?php
namespace App\model;
/*
* @File: gallery.php
* @Author: Nathan Wright
* @Created 07-06-17
* @Last modified: 07-06-17
*
* Copyright (C) Nathan Wright  - All Rights Reserved - https://nathanwright.me/
* Unauthorized copying of this file, via any medium is strictly prohibited
* without the express permission of Nathan "ArrogantBread" Wright
*/

class galleryModel extends Model {

  public function fetchImg() {
    $DBC = $this->DBConnect();

    //--- Prepare the query
    $sql = "SELECT * FROM content";
    $query = $DBC->prepare($sql);

    //--- execute - no params
    $query->execute();

    //--- fetch associative array
    return($query->fetchAll());
  }

  public function uploadImg() {
    $error = nil;
    $uploadDir = APPROOT . '/public/upload/';
    

  }

};
