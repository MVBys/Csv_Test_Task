<?php

namespace app\export;

class RecordsExport
{
    public function getCSV($records)
    {
        $fp = fopen('public/storage/export.csv', 'w');

        fputcsv($fp, [
            'uid',
            'name',
            'age',
            'email',
            'phone',
            'gender',
        ]);

        foreach ($records as $fields) {
            fputcsv($fp, $fields);
        }
        fclose($fp);

        $url =  '/public/storage/export.csv';
        return $url;
    }
}
