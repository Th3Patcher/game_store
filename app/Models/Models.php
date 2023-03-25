<?php

namespace App\Models;

use App\Config\Database;

class Models
{
    public $database;

    public function __construct()
    {
        $this->database = new Database();
    }
}