<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php';

use App\Services\Router;

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

/**
 * GET
 */
Router::get('', 'DefaultController');
Router::get('main', 'DefaultController');
Router::get('info', 'DefaultController');
Router::get('login', 'DefaultController');
Router::get('logout', 'DefaultController');
Router::get('product', 'DefaultController');
Router::get('error_page', 'DefaultController');
Router::get('registration', 'DefaultController');

Router::get('login_page', 'AfterLoginController');
Router::get('admin_page', 'AfterLoginController');
Router::get('product_in','AfterLoginController');
Router::get('registration_page', 'AfterLoginController');

Router::get('product_list', 'ProductController');
Router::get('category_list', 'ProductController');
Router::get('add_basket_product', 'BasketController');
Router::get('list_basket_page', 'BasketController');
Router::get('list_basket_request', 'BasketController');
Router::get('delete_basket_request', 'BasketController');
/**
 * POST
 */
Router::post('login_user', 'SecurityController');
Router::get('logout_user', 'SecurityController');
Router::post('registration_user', 'SecurityController');

Router::post('product_list_by_category_id', 'ProductController');

Router::run($path);