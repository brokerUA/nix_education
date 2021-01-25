<?php

namespace App;

use Core\View;

class ProfileController extends ControllerBase
{
    public function index(): void
    {
        $view = new View('profile');

        $view->execute();
    }
}
