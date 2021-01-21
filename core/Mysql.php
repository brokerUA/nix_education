<?php

namespace Core;

use PDO;

class Mysql implements DB
{
    protected ?PDO $pdo;

    private array $queryParams = [];

    public function __construct()
    {
        $connectionConfigs = CONFIGS['DB'][CONFIGS['defaultDBConnection']];

        $dsn = "mysql:host={$connectionConfigs['host']};"
            . "dbname={$connectionConfigs['name']};"
            . "charset={$connectionConfigs['charset']}";

        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        $this->pdo = new PDO($dsn, $connectionConfigs['user'], $connectionConfigs['password'], $options);
    }

    public function __destruct()
    {
        $this->pdo = null;
    }

    public function select(string ...$select): self
    {
        foreach ($select as $value) {
            $this->queryParams['select'][] = $value;
        }

        $this->queryParams['select'] = implode(', ', $this->queryParams['select']);

        return $this;
    }

    public function where(array ...$where): self
    {
        foreach ($where as [$name, $operator, $value]) {
            $this->queryParams['where'][] = "$name $operator :$name";
            $this->queryParams['whereVars'][$name] = $value;
        }

        $this->queryParams['where'] = implode('AND ', $this->queryParams['where']);

        return $this;
    }

    public function get(): array
    {
        $whereVars = null;

        $rawQuery = "SELECT";

        if (array_key_exists('select', $this->queryParams)) {
            $rawQuery .= ' ' . $this->queryParams['select'];
        } else {
            $rawQuery .= ' *';
        }

        $rawQuery .= " FROM {$this->queryParams['table']}";

        if (array_key_exists('where', $this->queryParams)) {
            $rawQuery .= ' WHERE ' . $this->queryParams['where'];
            $whereVars = $this->queryParams['whereVars'];
        }

        $stmt = $this->pdo->prepare($rawQuery);

        $stmt->execute($whereVars);

        return $stmt->fetchAll();
    }

    public function query(string $tableName): self
    {
        $this->queryParams['table'] = $tableName;

        return $this;
    }
}
