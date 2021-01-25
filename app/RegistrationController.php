<?php

namespace App;

use Core\View;

class RegistrationController extends ControllerBase
{
    public function index(): void
    {
        $view = new View('registration');

        $view->execute();
    }
}
