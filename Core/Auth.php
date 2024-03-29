<?php

namespace Core;

class Auth
{
    public static function passwordHash(string $password): string
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public static function authorizeUser(int $id, string $login, string $role): void
    {
        $_SESSION['user'] = [
            'id' => $id,
            'login' => $login,
            'role' => $role
        ];
    }

    public static function isLogged(): bool
    {
        return isset($_SESSION['user']) && isset($_SESSION['user']['login']) && isset($_SESSION['user']['role']);
    }

    public static function isAdministrator(): bool
    {
        return self::isLogged() && $_SESSION['user']['role'] == 'administrator';
    }

    public static function isKierownik(): bool
    {
        if(self::isAdministrator()) {
            return true;
        }

        return self::isLogged() && $_SESSION['user']['role'] == 'kierownik';
    }

    public static function isPracownik(): bool
    {
        if(self::isAdministrator()) {
            return true;
        }

        return self::isLogged() && $_SESSION['user']['role'] == 'pracownik';
    }

    public static function getId(): string
    {
        if(self::isLogged()) {
            return $_SESSION['user']['id'];
        }
        return '';
    }

    public static function getLogin(): string
    {
        if(self::isLogged()) {
            return $_SESSION['user']['login'];
        }
        return '';
    }

    public static function getRole(): string
    {
        if(self::isLogged()) {
            return $_SESSION['user']['role'];
        }
        return '';
    }

    public static function logout(): void
    {
        session_destroy();
    }
}