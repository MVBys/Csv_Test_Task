<?php
namespace app\controllers;

use app\core\Controller;

class MainController extends Controller
{

    public function index()
    {
        $this->view->render('main page', ["content"]);
    }

}
