<?php

namespace App;

use Core\View;

class AuthController extends ControllerBase
{
    public function show()
    {
        if (isset($_SESSION['user_id'])) {
            $this->redirect('/');
        }

        $view = new View('login');

        $view->execute();
    }

    public function save()
    {

        if (isset($_POST['submit']) && $_POST['submit'] == 'Login') {
            $user = new User();

            $user = $user->getFirstBy('login', $_POST['login']);

            if ($user && password_verify($_POST['password'], $user->password)) {
                $_SESSION['message'] = 'Success! Home, sweet home :)';
                $_SESSION['user_id'] = $user->id;
            } else {
                $_SESSION['message'] = 'Oops! Something went wrong :(';
            }

        }

        $this->redirect('/');
    }

    public function logout()
    {

        if (isset($_COOKIE[session_name()])) {
            setcookie(session_name(), "", time() - 3600, "/");
        }

        $_SESSION = array();

        session_destroy();

        $_SESSION['message'] = 'OK! See you letter...';

        $this->redirect('/');
    }
}
