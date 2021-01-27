<?php

namespace App;

use Core\View;

class ProfileController extends ControllerBase
{
    public function index(): void
    {
        $view = new View('profile/show');

        $user = new User();

        $currentUser = $user->getCurrentUser();

        if (!$currentUser) {
            $_SESSION['message'] = 'Sorry, but you are not logged.';
            $this->redirect('/');
        }

        $view->currentUser = $currentUser;

        $photoFileName = 'photo_' . $currentUser['id'] . '.' . $currentUser['photo_ext'];
        $pathPhoto = CONFIGS['uploadPathDir'] . DIRECTORY_SEPARATOR . $photoFileName;

        if (file_exists($pathPhoto)) {
            $view->photo = '/upload/' . $photoFileName;
        }

        $view->execute();
    }

    public function save(): void
    {
        $user = new User();
        $user->getFirstBy('id', $_SESSION['user_id']);

        $user->name = $_POST['name'];
        $user->description = $_POST['description'];

        if (isset($_FILES['photo'])) {
            $fileExt = end(explode('.', $_FILES['photo']['name']));

            $isUploaded = move_uploaded_file(
                $_FILES['photo']['tmp_name'],
                CONFIGS['uploadPathDir'] . DIRECTORY_SEPARATOR
                    . 'photo_' . $_SESSION['user_id'] . '.' . $fileExt
            );

            if (!$isUploaded) {
                $_SESSION['message'] = 'Error! Photo does not upload.';
                $this->redirect('/profile');
            }

            $user->photo_ext = $fileExt;
        }

        $user->save();

        $_SESSION['message'] = 'Success! Your profile has been updated.';
        $this->redirect('/profile');
    }

    public function edit(): void
    {
        $view = new View('profile/edit');

        $user = new User();

        $currentUser = $user->getCurrentUser();

        if (!$currentUser) {
            $_SESSION['message'] = 'Sorry, but you are not logged.';
            $this->redirect('/');
        }

        $photoFileName = 'photo_' . $currentUser['id'] . '.' . $currentUser['photo_ext'];
        $pathPhoto = CONFIGS['uploadPathDir'] . DIRECTORY_SEPARATOR . $photoFileName;

        if (file_exists($pathPhoto)) {
            $view->photo = '/upload/' . $photoFileName;
        }

        $view->currentUser = $currentUser;

        $view->execute();
    }
}
