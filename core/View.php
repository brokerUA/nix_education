<?php

namespace Core;

final class View
{
    private string $path;

    private array $data;

    public function __construct(string $path, array $data = [])
    {
        $this->path = $path;

        $this->data = $data;
    }

    public function execute(): void
    {
        if ($this->data) {
            extract($this->data);
        }

        ob_start();
        {
            require_once CONFIGS['viewPathDir'] . DIRECTORY_SEPARATOR . $this->path . '.phtml';
        }
        ob_flush();
        ob_end_clean();
    }
}
