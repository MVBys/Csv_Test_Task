<?php

namespace app\models;

use app\core\Model;

class Record extends Model
{
    public function getRecords()
    {
        $result = $this->db->query('SELECT uid, name, age, email, phone, gender FROM records');
        return $result;
    }

    public function clear()
    {
        $this->db->query('DELETE FROM records WHERE uid>0');
        $this->db->query('ALTER TABLE records AUTO_INCREMENT = 0;');
    }

    public function getEmailsInRecords($emails): array
    {
        $emailForQuery['emailForQuery'] = '';
        for ($i = 1; $i < count($emails); $i++) {
            $emailForQuery['emailForQuery'] .=   ($i !== count($emails) - 1) ?  '"' . $emails[$i] . '",' : '"' . $emails[$i] . '"';
        }

        $result = $this->db->query("SELECT email FROM records WHERE email IN ( " . $emailForQuery['emailForQuery'] . ")");

        return $result;
    }

    public function storeRecords($records)
    {
        $recordsForQuery['records'] = '';
        $value = '';

        foreach ($records as $item) {
            $value = '';
            for ($i = 0; $i < count($item); $i++) {
                $value .=   ($i !== count($item) - 1) ?  '"' . $item[$i] . '",' : '"' . $item[$i] . '"';
            }
            $value = '(' . $value . ')';

            $recordsForQuery['records'] .= $value . ',';
        }
        $recordsForQuery['records'] = rtrim($recordsForQuery['records'], ',');


        $this->db->query("INSERT INTO records (name, age, email, phone, gender) VALUES " . $recordsForQuery['records']);
    }
}
