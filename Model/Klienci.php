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

        DB::execute($sql, [
            ':imie' => $this->imie,
            ':nazwisko' => $this->nazwisko,
            ':pesel' => $this->pesel
        ]);

        $idAdded = DB::queryOneColumn("SELECT LAST_INSERT_ID(); ");

        $this->id = $idAdded;

        /*$klient = DB::queryOne("SELECT * FROM klienci WHERE id = :id", [
            'id' => $idAdded
        ]);*/

        return 1;
    }

    public static function findByPesel(string $pesel): array
    {
        return DB::queryOne("SELECT * FROM klienci WHERE pesel = :pesel", [':pesel' => $pesel]);
    }
}