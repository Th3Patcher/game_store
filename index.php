<?php
session_start();
require_once __DIR__.'/vendor/autoload.php';

$path = trim($_SERVER['REQUEST_URI'], '/');

$path = parse_url($path,PHP_URL_PATH);

