<?php

namespace App;

use Core\DB;

abstract class ModelBase
{
    protected DB $DB;

    protected string $tableName;

    private array $params;

    public function __construct()
    {
        $dataBaseClass = CONFIGS['DB'][CONFIGS['defaultDBConnection']]['className'];

        $this->DB = new $dataBaseClass();
    }

    public function __set($name, $value)
    {
        $this->params[$name] = $value;
    }

    public function __get(string $name)
    {
        if (array_key_exists($name, $this->params)) {
            return $this->params[$name];
        }

        return null;
    }

    public function save(): ?self
    {
        if ($this->id) {
            $this->DB
                ->table($this->tableName)
                ->update($this->params);

            return $this;
        }

        $lastID = $this->DB
            ->table($this->tableName)
            ->insert($this->params);

        return $this->find($lastID);
    }

    public function delete(): ?bool
    {
        if (!$this->id) {
            return null;
        }

        $this->DB
            ->table($this->tableName)
            ->delete($this->id);

        return true;
    }

    public function find(int $id): ?self
    {
        $values = $this->DB
            ->table($this->tableName)
            ->where(['id', '=', $id])
            ->select();

        $count = count($values);

        if ($count == 0 && $count > 1) {
            return null;
        }

        foreach ($values[0] as $name => $value) {
            $this->$name = $value;
        }

        return $this;
    }

    public function toArray()
    {
        return $this->params;
    }
}
