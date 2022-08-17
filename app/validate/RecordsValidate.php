<?php

namespace app\validate;

use app\models\Record;

class RecordsValidate
{
    protected $answer = [
        'data' => '',
        'message' => [],
    ];

    protected $fields = [
        'uid',
        'name',
        'age',
        'email',
        'phone',
        'gender',
    ];


    public function handle(array $records): array
    {

        $this->validTitleFields($records);

        $this->validEmailUnique($records);

        if ($this->answer['message']) {
            return $this->answer;
        }
        $result = array();
        for ($i = 1; $i < count($records); $i++) {
            array_push($result, [
                $records[$i][1], $records[$i][2], $records[$i][3], $records[$i][4], $records[$i][5],
            ]);
        }
        $this->answer['data'] = $result;

        return $this->answer;
    }



    private function validTitleFields(array $records)
    {

        if (count($records[0]) !== count($this->fields)) {
            array_push($this->answer['message'], "quantity title fields incorrect");
        }

        $titles = array_map(function ($title) {
            return strtolower($title);
        }, $records[0]);


        foreach ($this->fields as $title) {
            if (!in_array($title,  $titles)) {
                array_push($this->answer['message'], "title fields $title wrong format");
            }
        }
    }



    private function validEmailUnique(array $records)
    {
        $emails = array_map(function ($record) {
            return $record[3];
        }, $records);

        $record =  (new Record)->getEmailsInRecords($emails);

        if (count($record) !== 0) {
            array_push($this->answer['message'], "email duplicated $record");
        }
    }
}
