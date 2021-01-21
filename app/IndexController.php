<?php

namespace App;

use Core\View;

class IndexController implements Controller
{
    public function index(): void
    {
        $view = new View();

        $view->path = 'index';

        $view->execute();
    }
}
