<?php

namespace App;

class Post extends ModelBase
{
    public function getPublished(): array
    {
        return $this->DB
            ->table($this->tableName)
            ->where(['published', '=', '1'])
            ->select();
    }
}
