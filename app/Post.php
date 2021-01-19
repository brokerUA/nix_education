<?php

namespace App;

class Post extends ModelFile
{
    protected string $modelName = 'posts';

    public function getAll()
    {
        return $this->queryGetAll();
    }
}
