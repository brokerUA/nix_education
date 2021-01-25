<?php

namespace Core;

use PDO;

class Mysql implements DB
{
    protected PDO $pdo;

    private array $queryParams = [];

    private function prepare(string $query, ?array $params = []): \PDOStatement
    {
        $stmt = $this->pdo->prepare($query);

        $stmt->execute($params);

        $this->queryParams = [];

        return $stmt;
    }

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

    public function table(string $tableName): self
    {
        $this->queryParams['table'] = $tableName;

        return $this;
    }

    public function columns(string ...$select): self
    {
        foreach ($select as $value) {
            $this->queryParams['columns'][] = $value;
        }

        $this->queryParams['columns'] = implode(', ', $this->queryParams['columns']);

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

    public function order(string $sort = 'ASC'): self
    {
        $this->queryParams['order'] = " ORDER BY created_at $sort";

        return $this;
    }

    public function limit(int $limit = 10, ?int $offset = null): self
    {
        $this->queryParams['limit'] = " LIMIT $limit";

        if ($offset) {
            $this->queryParams['limit'] .= " OFFSET $offset";
        }

        return $this;
    }

    public function select(): array
    {
        $params = null;

        $query = "SELECT";

        if (array_key_exists('columns', $this->queryParams)) {
            $query .= ' ' . $this->queryParams['columns'];
        } else {
            $query .= ' *';
        }

        $query .= " FROM {$this->queryParams['table']}";

        if (array_key_exists('where', $this->queryParams)) {
            $query .= ' WHERE ' . $this->queryParams['where'];
            $params = $this->queryParams['whereVars'];
        }

        if (array_key_exists('order', $this->queryParams)) {
            $query .= $this->queryParams['order'];
        }

        if (array_key_exists('limit', $this->queryParams)) {
            $query .= $this->queryParams['limit'];
        }

        $stmt = $this->prepare($query, $params);

        return $stmt->fetchAll();
    }

    public function insert(array $params): int
    {
        $query = "INSERT INTO {$this->queryParams['table']} (";

        $query .= implode(', ', array_keys($params));

        $query .= ") VALUES (";

        $values = array_map(function ($value) {
            return ":{$value}";
        }, array_keys($params));

        $query .= implode(', ', $values);

        $query .= ')';

        $this->prepare($query, $params);

        return $this->pdo->lastInsertId();
    }

    public function update(array $params): void
    {
        $query = "UPDATE {$this->queryParams['table']} SET ";

        $values = [];

        foreach ($params as $key => $value) {
            if ($key != 'id') {
                $values[] = "{$key} = :{$key}";
            }
        }

        $query .= implode(', ', $values);

        $query .= " WHERE id = :id";

        $this->prepare($query, $params);
    }

    public function delete(int $id): void
    {
        $query = "DELETE FROM {$this->queryParams['table']}";

        $query .= " WHERE id = ?";

        $this->prepare($query, [$id]);
    }
}
