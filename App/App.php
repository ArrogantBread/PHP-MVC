<?php
namespace App;
/*
* @File: app.php
* @Author: Nathan Wright
* @Created 04-05-17
* @Last modified: 04-05-17
*
* Copyright (C) Nathan Wright  - All Rights Reserved - https://nathanwright.me/
* Unauthorized copying of this file, via any medium is strictly prohibited
* without the express permission of Nathan "ArrogantBread" Wright
*/

class App {

  //--- default values
  protected $controller = 'home';
  protected $method = null;
  //--- empty array - for URI params
  protected $params = array();

  public function __construct() {
    //--- Split URI into array
    $URI = $this::parseUrl();
    echo $this->controller;
    //--- Does the page (controller) exist
    if (file_exists(ROOT . "controllers/" . $this->controller . ".php")) {
      require_once ROOT . "controllers/" . $this->controller . ".php";
      $this->controller = new $this->controller();

      //--- Does the method exist within the object
      if (!empty($this->method)) {
        if (method_exists($this->controller, $this->method)) {

        }
      } else {
        $this->controller->index();
      }
    }

  }

  protected function parseURL() {
    if (isset($_SERVER['REQUEST_URI'])) {
      //--- Split URI
      $URI = trim($_SERVER['REQUEST_URI'], '/');
      $URI = filter_var($URI, FILTER_SANITIZE_URL);
      $URI = explode('/', $URI);

      //--- Sort URI into vars
      $this->controller = isset($URI[0]) ? $URI[0] : null;
      $this->method = isset($URI[1]) ? $URI[1] : null;

      //--- unset the controller and action, store params
      unset($URI[0], $URI[1]);
      $this->params = array_values($URI);
    };
  }
}
