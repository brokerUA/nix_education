<?php

namespace Core;

final class Route
{
    protected string $request;

    protected array $rules;

    public function __construct(string $request)
    {
        $this->request = $request;
    }

    public function addRule(string $path, string $method): void
    {
        $this->rules[$path] = $method;
    }

    public function execute(): void
    {
        if (isset($this->rules[$this->request])) {
            list($className, $methodName) = explode('@', $this->rules[$this->request]);

            $controllerName = '\\App\\' . $className;
            (new $controllerName())->$methodName();
        }
    }
}
