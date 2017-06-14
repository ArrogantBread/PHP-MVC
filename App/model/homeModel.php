<?php
namespace App\Model;
/*
* @File: homeModel.php
* @Author: Nathan Wright
* @Created 09-06-17
* @Last modified: 09-06-17
*
* Copyright (C) Nathan Wright  - All Rights Reserved - https://nathanwright.me/
* Unauthorized copying of this file, via any medium is strictly prohibited
* without the express permission of Nathan "ArrogantBread" Wright
*/



class HomeModel extends Model {

  // open file and return data as a html array
  // no DBC needed
  // no params
  public function fetchLogs() {
    $handle = fopen("log.csv", "r");
    $dataArr = array();

    if ($handle) {
      //--- read file line by line, added bonus of not loading large files into memory!
      while (($line = fgets($handle)) !== false) {
        array_push($dataArr, $line);
      }

      fclose($handle);
    } else {
      //--- return error
      return ("An error has occured when trying to acess the log file");
    }

    //--- explode delimiter
    $tempArr = array();
    $processedArr = array();
    foreach ($dataArr as $_x) {
      $tempArr = explode('/', $_x);
      array_push($processedArr, $tempArr);
    }

    //--- return 2D array
    return $processedArr;
  }

};
