<?php

namespace App;

use Core\View;

class LoginController implements Controller
{
    public function index(): void
    {
        $view = new View();

        $view->path = 'login';

        $view->execute();
    }
}
