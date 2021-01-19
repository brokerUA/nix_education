<?php

namespace App;

abstract class ModelFile implements ModelInterface
{
    protected string $modelName;

    protected function queryGetAll()
    {
        return require_once CONFIGS['dataPathFile'];
    }

    abstract public function getAll();
}
