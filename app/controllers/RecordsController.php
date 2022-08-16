<?php

namespace app\controllers;

use app\core\Controller;

class RecordsController extends Controller
{

    public function show()
    {
        $this->view->render('Records page', ["content"]);
    }
}
