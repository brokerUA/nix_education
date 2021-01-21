<?php

namespace App;

use Core\View;

class ProfileController implements Controller
{
    public function index(): void
    {
        $view = new View();

        $view->path = 'profile';

        $view->execute();
    }
}
