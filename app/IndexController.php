<?php

namespace App;

use Core\View;

class IndexController extends ControllerBase
{
    public function index(): void
    {
        $view = new View('index');

        $view->execute();
    }
}
