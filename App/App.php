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
  //--- empty array - for URI params
  protected $params = array();

  public function __construct() {
    //--- Split URI into array
    $URI = $this->parseUrl();
  }

  private static function routeURI($controller, $method) {
    //--- the controller exixts
    if (file_exists(APPROOT . '/controllers//' . $controller . '.php')) {
      //--- Set the namespaced path to the controller
      $ns = 'App\controllers\\' . $controller;
      //--- new instance of the controller
      $controller = new $ns;

      //--- check the method exists, if not -> index
      if (method_exists($controller, $method)) {
        //--- pass params to the method
        if (!empty($method)) {
          // If no parameters are given, just call the method without parameters, like $this->home->method();
          $controller->{$method}();
        };
      };
    };
  }

  public static function get($URI, $closure) {
    if($_SERVER['REQUEST_URI'] == $URI) {
      //--- run the closure
      $route = $closure->__invoke();

      //--- Parse the result
      $URI = explode(':', $route);
      
      //--- store the controller and method (globals are bad m'kay)
      $controller = isset($URI[0]) ? $URI[0] : null;
      $method = isset($URI[1]) ? $URI[1] : null;
      //--- Statics are shit
      self::routeURI($controller, $method);
    }
  }

  protected function parseURL() {
    //--- get any params from the URI, the method and
    //--- controller are gethered from the routes file
    if (isset($_SERVER['REQUEST_URI'])) {
      //--- Split URI
      $URI = trim($_SERVER['REQUEST_URI'], '/');
      $URI = filter_var($URI, FILTER_SANITIZE_URL);
      $URI = explode('/', $URI);

      //--- unset the controller and action, store params
      unset($URI[0], $URI[1]);
      $this->params = array_values($URI);
    };
  }
}
