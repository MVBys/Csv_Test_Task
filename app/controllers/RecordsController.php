<?php

namespace app\controllers;

use app\models\Record;
use app\core\Controller;
use app\export\RecordsExport;
use app\validate\RecordsValidate;
use app\validate\RecordCsvValidate;

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


    public function import()
    {


        if ($_FILES['csv_file']['size'] == 0) {
            $this->view->redirect('/index');
        }

        $validate = (new RecordCsvValidate)->handle($_FILES['csv_file']);
        if ($validate['message']) {
            $this->view->redirect('/index', $validate['message']);
        }

        $csv = array_map('str_getcsv', file($validate['data']));
        $validate = (new RecordsValidate)->handle($csv);

        if ($validate['message']) {
            $this->view->redirect('/index', $validate['message']);
        }

        (new Record)->storeRecords($validate['data']);


        return $this->view->redirect('/records');
    }
}
