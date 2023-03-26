<?php

namespace App\Services;

use App\Controllers\DefaultController;
use App\Controllers\SecurityController;
use App\Controllers\AfterLoginController;

class Router
{
    public static $routes;

    public static function get(string $url, string $view)
    {
        self::$routes[$url] = $view;
    }

    public static function post(string $url, string $view)
    {
        self::$routes[$url] = $view;
    }

    public static function run($url)
    {
        $class_list = [
            "DefaultController" => DefaultController::class,
            "SecurityController" => SecurityController::class,
            "AfterLoginController"=> AfterLoginController::class
        ];

        $action = explode('/', $url)[0];

        if(!array_key_exists($action,self::$routes)){
            $action = 'error_page';
        }

        $controller = self::$routes[$action];
        $object = new $class_list[$controller]();
        $action = $action ?: 'index';
        $object->$action();
    }
}