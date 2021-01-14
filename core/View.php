<?php

namespace Core;

class View
{
    protected string $path;

    protected array $data;

    public function __construct(string $path, array $data = [])
    {
        $this->path = $path;
        $this->data = $data;
    }

    public function execute()
    {
        extract($this->data);

        $html = file_get_contents(
            dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . $this->path . '.phtml'
        );

        return $html;

    }
}