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
}
