<?php

namespace Model;

use Core\Auth;
use Core\DB;

class Wypozyczenia
{
    public int $id_klienta;

    public int $id_samochodu;

    public string $data;
    public int $ilosc_dni;
    public string $uwagi;

    public int $przyjete;

    public static function findAll(): array
    {
        return DB::queryAll("SELECT * FROM wypozyczenia");
    }

    public function save(): int
    {
        $sql = "INSERT INTO wypozyczenia (id_klienta, id_samochodu, data, ilosc_dni, uwagi) VALUES (:id_klienta, :id_samochodu, :data, :ilosc_dni, :uwagi);";

        return DB::execute($sql, [
            ':id_klienta' => $this->id_klienta,
            ':id_samochodu' => $this->id_samochodu,
            ':data' => $this->data,
            ':ilosc_dni' => $this->ilosc_dni,
            ':uwagi' => $this->uwagi
        ]);
    }
}