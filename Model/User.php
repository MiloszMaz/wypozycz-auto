<?php
namespace Model;

use Core\Auth;
use Core\DB;

class User
{
    public string $login;

    public string $password;

    public string $role;

    public function save(): int
    {
        $this->password = Auth::passwordHash($this->password);

        $sql = sprintf("INSERT INTO user (login, password, role) VALUES (:login, :password, :role);");

        return DB::execute($sql, [
            ':login' => $this->login,
            ':password' => $this->password,
            ':role' => $this->role
        ]);
    }

    public static function checkIfExists(string $login): int
    {
        return DB::queryCount("SELECT COUNT(*) FROM user WHERE login = :login", [':login' => $login]);
    }

    public static function findAll(): array
    {
        return DB::queryAll("SELECT * FROM user");
    }

    public static function delete(int $id): int
    {
        return DB::execute("DELETE FROM user WHERE id = :id", [
            ':id' => $id
        ]);
    }
}