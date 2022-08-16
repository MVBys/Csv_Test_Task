<?php

namespace app\controllers;

use app\models\Record;
use app\core\Controller;

class RecordsController extends Controller
{

    public function show()
    {
        $result = (new Record)->getRecords();
        $this->view->render('Records page',  $result);
    }
}
