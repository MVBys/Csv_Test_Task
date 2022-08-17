<?php

namespace app\controllers;

use app\models\Record;
use app\core\Controller;
use app\export\RecordsExport;

class RecordsController extends Controller
{

    public function show()
    {
        $result['records'] = (new Record)->getRecords();

        $this->view->render('Records page',  $result);
    }

    public function export()
    {
        $records = (new Record)->getRecords();

        $file = (new RecordsExport)->getCSV($records);

        $this->view->redirect($file);
    }

    public function clearTable()
    {
        (new Record)->clear();
        $this->view->redirect('/records');
    }
}
