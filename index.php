<?php
session_start();

require_once __DIR__.'/vendor/autoload.php';

use App\Services\Router;

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path,PHP_URL_PATH);

/**
 * GET
 */
Router::get('','DefaultController');
Router::get('info','DefaultController');
Router::get('login','DefaultController');
Router::get('error_page','DefaultController');
Router::get('registration','DefaultController');

/**
 * POST
 */
Router::post('login_user','SecurityController');
Router::post('registration_user','SecurityController');

Router::run($path);
