<?php

namespace Core;

class DB
{
    private array $dbConfig = [];

    public function __construct()
    {
        $this->dbConfig = require_once '../config/database.php';


    }
}