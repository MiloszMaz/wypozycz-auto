<?php
namespace Model;

use Core\Auth;

class User extends ModelDatabase
{
    public string $login;

    public string $password;

    public string $role;

    public function save()
    {
        $this->password = Auth::passwordHash($this->password);

        parent::saveInDb('user', $this);
    }
}