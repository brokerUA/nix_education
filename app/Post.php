<?php

namespace App;

class Post extends ModelBase
{
    private string $tableName = 'posts';

    public function getAll()
    {
        return $this->DB
            ->query($this->tableName)
            ->select('title', 'text')
            ->where(['published', '=', '1'])
            ->get();
    }
}
