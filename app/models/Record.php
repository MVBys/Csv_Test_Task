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
}
