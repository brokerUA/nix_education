<?php

namespace App;

use Core\View;

class LoginController implements ControllerInterface
{
    public function index(): void
    {
        $view = new View();

        $view->path = 'login';

        $view->execute();
    }
}
