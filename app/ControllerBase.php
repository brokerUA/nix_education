<?php

namespace App;

abstract class ControllerBase
{
    protected function redirect(string $path): void
    {
        header("Location: {$_SERVER['REQUEST_SCHEME']}://{$_SERVER['SERVER_NAME']}{$path}");
        exit;
    }
}