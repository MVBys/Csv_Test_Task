<?php

namespace app\core;

use app\core\DB;

abstract class Model
{
    protected $db;

    public function __construct()
    {
        $this->db = new DB();
    }
}
