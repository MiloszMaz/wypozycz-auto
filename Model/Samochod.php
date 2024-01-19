<?php

namespace Model;

use Core\DB;

class Samochod
{
    public string $marka;
    public string $kolor;
    public string $numer_rejestracyjny;
    public int $rok_produkcji;
    public float $cena_za_jeden_dzien;

    public function save(): int
    {
        $sql = "
    INSERT INTO `samochod` (`marka`, `kolor`, `numer_rejestracyjny`, `rok_produkcji`, `cena_za_jeden_dzien`) 
    VALUES 
    (:marka, :kolor, :numer_rejestracyjny, :rok_produkcji, :cena_za_jeden_dzien)
    ";

        return DB::execute($sql, [
            ':marka' => $this->marka,
            ':kolor' => $this->kolor,
            ':numer_rejestracyjny' => $this->numer_rejestracyjny,
            ':rok_produkcji' => $this->rok_produkcji,
            ':cena_za_jeden_dzien' => $this->cena_za_jeden_dzien
        ]);
    }

    public static function findOne(int $id): array
    {
        return DB::queryOne("SELECT * FROM samochod WHERE id = :id", [
            ':id' => $id
        ]);
    }

    public static function findAll(): array
    {
        return DB::queryAll("SELECT * FROM samochod");
    }

    public static function findAllActive(): array
    {
        return DB::queryAll("SELECT * FROM samochod WHERE hide = 0");
    }

    public static function update(array $carDb, array $updatedCar): int
    {
        $sql = "UPDATE `samochod` SET 
                      `marka`= :marka,
                      `kolor`= :kolor,
                      `numer_rejestracyjny`= :numer_rejestracyjny,
                      `rok_produkcji`= :rok_produkcji,
                      `cena_za_jeden_dzien`= :cena_za_jeden_dzien
                  WHERE id = :id";

        return DB::execute($sql, [
            ':marka' => $updatedCar['marka'],
            ':kolor' => $updatedCar['kolor'],
            ':numer_rejestracyjny' => $updatedCar['numer_rejestracyjny'],
            ':rok_produkcji' => $updatedCar['rok_produkcji'],
            ':cena_za_jeden_dzien' => $updatedCar['cena_za_jeden_dzien'],
            ':id' => $carDb['id']
        ]);
    }

    public static function toggle(int $id): int
    {
        $car = self::findOne($id);
        $newValue = !$car['hide'];

        return DB::execute("UPDATE samochod SET hide = :hide WHERE id = :id", [
            ':hide' => $newValue,
            ':id' => $id
        ]);
    }
}