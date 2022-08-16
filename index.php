<?php
use app\core\Router;

require __DIR__ . '/vendor/autoload.php';

echo 'hello';

$router = new Router;
$router->run();
