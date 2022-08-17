<?php

namespace app\core;

class View
{
    protected $path;
    protected $layout = 'default';
    protected $route;

    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $route['controller'] . '/' . $route['action'];
    }

    public function render($title, $vars = [])
    {
        extract($vars);
        $path = 'app/views/' . $this->path . '.php';
        if (file_exists($path)) {
            ob_start();
            require $path;
            $content = ob_get_clean();
            require 'app/views/layouts/' . $this->layout . '.php';
        }
        unset($_SESSION['message']);
    }
    public function redirect($url, $message = [])
    {
        if ($message) $_SESSION['message'] = $message;
        $url = 'http://' . $_SERVER['HTTP_HOST'] . $url;
        header('location:' .  $url);
        exit;
    }

    public static function error($code)
    {
        http_response_code($code);
        $path = 'app/views/errors/' . $code . '.php';
        if (file_exists($path)) {
            require $path;
        }
    }
}
