<?php

namespace App;

use Core\DB;

abstract class ModelBase implements Model
{
    protected DB $DB;

    public function __construct()
    {
        $dataBaseClass = CONFIGS['DB'][CONFIGS['defaultDBConnection']]['className'];

        $this->DB = new $dataBaseClass();
    }

    abstract public function getAll();
}
