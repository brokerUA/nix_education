<?php

namespace App;

use Core\View;

class AuthController extends ControllerBase
{
    public function signup()
    {
        if (isset($_SESSION['user_id'])) {
            $this->redirect('/');
        }

        $view = new View('signup');

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
                $this->redirect('/');

            } else {
                $_SESSION['message'] = 'Oops! Something went wrong :(';
            }

        }

        $view->execute();
    }

    public function login()
    {
        if (isset($_SESSION['user_id'])) {
            $this->redirect('/');
        }

        $view = new View('login');

        if (isset($_POST['submit']) && $_POST['submit'] == 'Login') {
            $user = new User();

            $user = $user->getFirstBy('login', $_POST['login']);

            if ($user && password_verify($_POST['password'], $user->password)) {
                $_SESSION['message'] = 'Success! Home, sweet home :)';
                $_SESSION['user_id'] = $user->id;

                $this->redirect('/');

            } else {
                $_SESSION['message'] = 'Oops! Something went wrong :(';
            }

        }

        $view->execute();
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
