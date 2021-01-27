<?php

namespace App;

class User extends ModelBase
{
    public function getCurrentUser(): ?array
    {

        if (isset($_SESSION['user_id'])) {
            return $this->find($_SESSION['user_id'])->toArray();
        }

        return null;
    }

}
