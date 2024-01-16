<?php

namespace Core;

class Auth
{
    public static function passwordHash(string $password)
    {
        return password_hash($password, PASSWORD_BCRYPT, ['cost' => 7, "salt" => "123"]);
    }
}