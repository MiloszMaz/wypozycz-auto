<?php

namespace Model;

use Core\DB;

class Klienci
{
    public int $id;

    public string $imie;
    public string $nazwisko;

    public string $pesel;

    public function save(): int
    {
        $sql = "INSERT INTO klienci (imie, nazwisko, pesel) VALUES (:imie, :nazwisko, :pesel);";

        $result = DB::execute($sql, [
            ':imie' => $this->imie,
            ':nazwisko' => $this->nazwisko,
            ':pesel' => $this->pesel
        ]);

        $idAdded = DB::queryOneColumn("SELECT id FROM klienci ORDER BY id DESC LIMIT 1;");

        $this->id = $idAdded;

        return $result;
    }

    public static function findByPesel(string $pesel)
    {
        return DB::queryOne("SELECT * FROM klienci WHERE pesel = :pesel", [':pesel' => $pesel]);
    }
}