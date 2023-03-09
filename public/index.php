<?php

// php --info session.save_path
session_start();

const BASE_PATH = __DIR__ . '/../';
require BASE_PATH . 'Core/functions.php';

// auto run when try to retrieve the class
spl_autoload_register(function ($class) {
    $class = str_replace("\\", "/", $class);
    require base_path("{$class}.php");
});

require base_path('bootstrap.php');

$router = new \Core\Router();
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$routes = require base_path('routes/web.php');

$router->route($uri, $method);
