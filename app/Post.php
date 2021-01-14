<?php

namespace App;

class Post implements DB
{
    protected string $modelName = 'posts';

    public function getAll()
    {
        return require_once '..' . DIRECTORY_SEPARATOR . "{$this->modelName}-data.php";
    }
}