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

use Finfo;
use RuntimeException;

class galleryModel extends Model {

  public function getBGImg() {
    $DBC = $this->DBConnect();

    $sql = "SELECT * FROM content WHERE contentPosition=:pos";
    $query = $DBC->prepare($sql);

    $params = array(
      ":pos" => "Homepage"
    );

    $query->execute($params);

    $arr = $query->fetchAll();

    $rand_key = array_rand($arr, 1);
    return $pictureData = $arr[$rand_key];
  }

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

  // stores uploaded image into database for future use
  private function storeImg($fileName, $fileType) {
    $DBC = $this->DBConnect();

    //--- no checking because i like to live on the edge
    $sql = "INSERT INTO content (contentName, contentType, contentPosition, contentTitle, contentInsertTime, contentInsertBy) VALUES (:name, :type, :whereis, :title, :now, :by);";
    $query = $DBC->prepare($sql);

    $title = isset($_POST['titleUp']) ? $_POST['titleUp'] : "Image Title";
    $where = ($_POST['where'] == "") ? "gallery" : $_POST['where'];

    $params = array(
      ":name" => $fileName,
      ":type" => $fileType,
      ":whereis"=> $where,
      ":title"=> $title,
      ":now"  => date("h:i:sa"),
      ":by"   => $_SESSION['username']
    );

    $query->execute($params);
  }

  public function uploadImg() {
    //--- exit if no file uploaded

    try {

        // Undefined | Multiple Files | $_FILES Corruption Attack
        // If this request falls under any of them, treat it invalid.
        if (
            !isset($_FILES['image']['error']) ||
            is_array($_FILES['image']['error'])
        ) {
            throw new RuntimeException('Invalid parameters.');
        }

        // Check $_FILES['image']['error'] value.
        switch ($_FILES['image']['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                throw new RuntimeException('No file sent.');
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                throw new RuntimeException('Exceeded filesize limit.');
            default:
                throw new RuntimeException('Unknown errors.');
        }

        // You should also check filesize here.
        if ($_FILES['image']['size'] > 1000000) {
            throw new RuntimeException('Exceeded filesize limit.');
        }

        // DO NOT TRUST $_FILES['image']['mime'] VALUE !!
        // Check MIME Type by yourself.
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        if (false === $ext = array_search(
            $finfo->file($_FILES['image']['tmp_name']),
            array(
                'jpg' => 'image/jpeg',
                'png' => 'image/png',
                'gif' => 'image/gif',
            ),
            true
        )) {
            throw new RuntimeException('Invalid file format.');
        }

        // You should name it uniquely.
        // DO NOT USE $_FILES['image']['name'] WITHOUT ANY VALIDATION !!
        // On this example, obtain safe unique name from its binary data.
        $fileNameNew = sha1_file($_FILES['image']['tmp_name']);

        try {
          $this->storeImg($fileNameNew, $ext);
        } catch (RuntimeException $e) {
          die("Image not stored");
        }

        if (!move_uploaded_file(
            $_FILES['image']['tmp_name'],
            sprintf('public/upload/%s.%s',
                $fileNameNew,
                $ext
            )
        )) {
            throw new RuntimeException('Failed to move uploaded file.');
        }

        echo 'File is uploaded successfully.';

    } catch (RuntimeException $e) {

        echo $e->getMessage();

    }
    // if (isset($_FILES['image'])) {
    //   $uploadDir = APPROOT . '/public/upload/';
    //   $fileSize = $_FILES['image']['size'];
    //   $fileType = $_FILES['image']['type'];
    //   $error    = $_FILES['image']['error'];
    //   $tmp      = $_FILES['image']['tmp_name'];
    //
    //   //--- error handling per the php manual
    //   switch ($_FILES['image']['error']) {
    //     case UPLOAD_ERR_OK:
    //       break;
    //     case UPLOAD_ERR_NO_FILE:
    //       throw new RuntimeException('No file sent.');
    //     case UPLOAD_ERR_INI_SIZE:
    //     case UPLOAD_ERR_FORM_SIZE:
    //       throw new RuntimeException('Exceeded filesize limit.');
    //     default:
    //       throw new RuntimeException('Unknown errors.');
    //   }
    //
    //   $types = array("image/jpeg","image/jpg","image/png");
    //
    //   if(!in_array($fileType,$types)){
    //      return "extension not allowed, please use a JPG or PNG file.";
    //   }
    //
    //   if($fileSize > 2097152){
    //      return 'File size must be excately 2 MB';
    //   }
    //
    //   $newName = "IMAGE_" . sha1(microtime());
    //   //--- file is ok, should probably strip exif
    //   try {
    //     move_uploaded_file($tmp, '/public/uploads/' . $newName);
    //   } catch (Exception $e) {
    //     return "an error has occured";
    //   }
    //
    //   return "Upload Sucessful";
    // };
  }

};
