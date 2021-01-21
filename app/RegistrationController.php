<?php

namespace App;

use Core\View;

class RegistrationController implements Controller
{
    public function index(): void
    {
        $view = new View();

        $view->path = 'registration';

        $view->execute();
    }
}
