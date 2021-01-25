<?php

namespace App;

use Core\View;

class LoginController extends ControllerBase
{
    public function index(): void
    {
        $view = new View('login');

        $view->execute();
    }
}
