<?php

namespace Core;

interface DB
{
    public function table(string $tableName): self;

    public function columns(string ...$select): self;

    public function where(array ...$where): self;

    public function order(string $sort = 'ASC'): self;

    public function limit(int $limit = 10, ?int $offset = null): self;

    public function select(): array;

    public function insert(array $params): int;

    public function update(array $params): void;

    public function delete(int $id): void;
}
