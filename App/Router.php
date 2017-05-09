<?php
/*
* @File: Router.php
* @Author: Nathan Wright
* @Created 05-05-17
* @Last modified: 05-05-17
*
* Copyright (C) Nathan Wright  - All Rights Reserved - https://nathanwright.me/
* Unauthorized copying of this file, via any medium is strictly prohibited
* without the express permission of Nathan "ArrogantBread" Wright
*/

class Router{

    private $routes = [];
    private $notFound;

    public function __construct(){
        $this->notFound = function($url){
            echo "404 - $url was not found!";
        };
    }

    public function add($url, $action){
        $this->routes[$url] = $action;
    }

    public function setNotFound($action){
        $this->notFound = $action;
    }

    public function dispatch(){
        foreach ($this->routes as $url => $action) {
            if( $url == $_SERVER['REQUEST_URI'] ){
                return $action();
            }
        }
        call_user_func_array($this->notFound,[$_SERVER['REQUEST_URI']]);
    }
}
