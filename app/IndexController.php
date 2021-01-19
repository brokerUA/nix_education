<?php

namespace App;

use Core\View;

class IndexController implements ControllerInterface
{
    public function index(): void
    {
        $view = new View();

        $view->path = 'index';

        $view->execute();
    }
}
