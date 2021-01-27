<?php

namespace App;

use Core\View;

class RegistrationController extends ControllerBase
{
    public function show()
    {
        if (isset($_SESSION['user_id'])) {
            $this->redirect('/');
        }

        $view = new View('signup');

        $view->execute();
    }

    public function save()
    {

        if (isset($_POST['submit']) && $_POST['submit'] == 'Signup') {
            $user = new User();
            $user = $user->getFirstBy('login', $_POST['login']);

            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

            if ($password && !$user) {
                $user = new User();
                $user->login = $_POST['login'];
                $user->password = $password;
                $user->save();

                $_SESSION['message'] = 'Wow! You are register. Please login.';

            } else {
                $_SESSION['message'] = 'Oops! Something went wrong :(';
            }

        }

        $this->redirect('/');
    }
}