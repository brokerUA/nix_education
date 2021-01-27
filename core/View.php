<?php

namespace Core;

final class View
{
    private string $path;

    private array $data;

    public function __set($name, $value): void
    {
        $this->data[$name] = $value;
    }

    public function __get(string $name)
    {
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }

        return null;
    }

    public function __construct(string $path, array $data = [])
    {
        $this->path = $path;

        $data['isAuth'] = isset($_SESSION['user_id']);

        $this->data = $data;
    }

    public function execute(): void
    {
        if ($this->data) {
            extract($this->data);
        }

        $this->data['message'] = '';

        ob_start();
        {
            require_once CONFIGS['viewPathDir'] . DIRECTORY_SEPARATOR . $this->path . '.phtml';
        }
        ob_flush();
        ob_end_clean();
    }
}
