<?php

namespace Core;

use App\IndexController;

final class Route
{
    private string $request;

    private array $rules;

    public function __construct(string $request)
    {
        $this->request = $request;
    }

    public function addRule(string $path, string $action, string $requestMethod = 'GET'): void
    {
        $this->rules[$path][$requestMethod] = $action;
    }

    public function execute(): void
    {
        if (isset($this->rules[$this->request])) {
            $rule = $this->rules[$this->request][$_SERVER['REQUEST_METHOD']];

            if (!$rule) {
                $_SESSION['message'] = 'Error 404. Page not found.';
                (new IndexController())->index();

            } else {
                list($className, $actionName) = explode('@', $this->rules[$this->request][$_SERVER['REQUEST_METHOD']]);

                $controllerName = '\\App\\' . $className;
                (new $controllerName())->$actionName();
            }
        }
    }
}
