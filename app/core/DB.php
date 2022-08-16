<?php

namespace app\core;

use PDO;

class DB
{
    protected $db;

    public function __construct($route)
    {
        $config = require 'app/config/database.php';
        $this->db = new PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['db_name'] . '', $config['db_user'], $config['db_password']);
    }


    public function prepare($sql, $params = [])
    {
        $stmt = $this->db->prepare($sql);
        if (!empty($params)) {
            foreach ($params as $key => $val) {
                $stmt->bindValue(':' . $key, $val);
            }
        }
        $stmt->execute();
        return $stmt;
    }

    public function query($sql, $params = [])
    {
        $result = $this->prepare($sql, $params);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}
