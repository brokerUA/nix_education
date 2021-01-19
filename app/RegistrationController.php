<?php

namespace App;

use Core\View;

class RegistrationController implements ControllerInterface
{
    public function index(): void
    {
        $view = new View();

        $view->path = 'registration';

        $view->execute();
    }
}
