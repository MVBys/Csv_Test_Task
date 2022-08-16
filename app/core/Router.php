<?php

namespace app\core;

class Router
{
    protected $routes = array();
    protected $params = array();

    public function __construct()
    {
        $routes = require 'app/routes/web.php';
        foreach ($routes as $route => $params) {
            $this->add($route, $params);
        }

    }

    protected function add($route, $params): void
    {
        $route = '#^' . $route . '$#';
        $this->routes[$route] = $params;
    }

    protected function matchRoute()
    {
        $url = trim($_SERVER['REQUEST_URI'], '/');

        foreach ($this->routes as $route => $params) {

            if (preg_match($route, $url, $matches)) {

                $this->params = $params;

                return true;
            }
        }
        return false;
    }

    public function run()
    {
        if ($this->matchRoute()) {

            $controller = 'app\controllers\\' . ucfirst($this->params['controller']) . 'Controller';

            if (class_exists($controller)) {

                $action = $this->params['action'];

                if (method_exists($controller, $action)) {
                    $controller = new $controller($this->params);
                    $controller->$action();
                } else {
                    echo ' not matchRoute';
                }

            } else {
                echo ' not class_exists';
            }
        } else {
            echo ' not method_exists';
        }
    }

}
