<?php

namespace Model;

use Core\DB;

class Wypozyczenia
{
    public \DateTimeImmutable $data;
    public int $iloscDni;
    public string $uwagi;

    public int $przyjete;

    public static function findAll(): array
    {
        return DB::queryAll("SELECT * FROM wypozyczenia");
    }
}