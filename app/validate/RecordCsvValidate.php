<?php

namespace app\validate;

class RecordCsvValidate
{
    protected $answer = [
        'data' => '',
        'message' => [],
    ];

    public function handle(array $file): array
    {

        if ($file['type'] !== 'application/vnd.ms-excel') {
            array_push($this->answer['message'], 'wrong file type');

            return $this->answer;
        }

        if ($file['size'] > 1024) {
            array_push($this->answer['message'], 'wrong file size');
            return $this->answer;
        }

        $this->answer['data'] = $file['tmp_name'];

        return $this->answer;
    }
}
