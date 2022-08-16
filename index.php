<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

use app\core\Router;

require __DIR__ . '/vendor/autoload.php';

$router = new Router;
$router->run();
