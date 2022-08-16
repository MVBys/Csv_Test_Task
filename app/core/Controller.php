<?php

namespace app\core;

abstract class Controller
{
    protected $route;
    protected $view;

    public function __construct($route)
    {
        $this->route = $route;
    }

}
