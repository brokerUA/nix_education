<?php

namespace Core;

final class View
{
    private array $params = [];

    public function __get(string $name)
    {
        if (array_key_exists($name, $this->params)) {
            return $this->params[$name];
        }

        return null;
    }

    public function __set(string $name, $value): void
    {
        $this->params[$name] = $value;
    }

    public function execute(): void
    {
        $data = $this->data;
        if ($data) {
            extract($data);
        }

        ob_start();
        {
            require_once CONFIGS['viewPathDir'] . DIRECTORY_SEPARATOR . $this->path . '.phtml';
        }
        ob_flush();
        ob_end_clean();
    }
}
