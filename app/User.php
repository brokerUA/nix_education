<?php

namespace App;

class User extends ModelBase
{
    public function getCurrentUser(): ?array
    {

        if (isset($_SESSION['user_id'])) {
            $currentUser = $this->getFirstBy('id', $_SESSION['user_id']);
            return $currentUser ? $currentUser->toArray() : null;
        }

        return null;
    }

}
