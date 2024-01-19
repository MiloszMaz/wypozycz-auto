<?php

namespace Model;

use Core\DB;
use Core\Request;

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

    public static function findAllByFilter(): array
    {
        $marka = Request::get('marka');
        $kolor = Request::get('kolor');
        $numer_rejestracyjny = Request::get('numer_rejestracyjny');
        $rok_produkcji = Request::get('rok_produkcji');

        $sql = "SELECT * FROM samochod ";
        $buildSql = "";
        $params = [];

        if($marka) {
            $buildSql .= "marka LIKE :marka";
            $params[':marka'] = '%'.$marka.'%';
        }
        if($kolor) {
            $buildSql .= "kolor LIKE :kolor";
            $params[':kolor'] = '%'.$kolor.'%';
        }
        if($numer_rejestracyjny) {
            $buildSql .= "numer_rejestracyjny LIKE :numer_rejestracyjny";
            $params[':numer_rejestracyjny'] = '%'.$numer_rejestracyjny.'%';
        }
        if($rok_produkcji) {
            $buildSql .= "rok_produkcji LIKE :rok_produkcji";
            $params[':rok_produkcji'] = '%'.$rok_produkcji.'%';
        }

        if($buildSql) {
            $sql .= " WHERE " . $buildSql;
        }

        return DB::queryAll($sql, $params);
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

    public static function getTopMonthCar()
    {
        $date = date('Y-m');

        $sql = "SELECT * FROM samochod WHERE id = 
(
SELECT id_samochodu
FROM wypozyczenia 
WHERE data LIKE :date
    AND przyjete = 1
GROUP BY id_samochodu
ORDER BY COUNT(*) DESC
LIMIT 1
    )";

        return DB::queryOne($sql, [
            ':date' => $date.'%',
        ]);
    }

    public static function findStatsOrderByMonthIlosc(string $date)
    {
        $sql = "SELECT COUNT(*) FROM `wypozyczenia` WHERE data LIKE :date;";

        return DB::queryCount($sql, [
            ':date' => $date.'%',
        ]);
    }

    public static function findStatsOrderByMonthTotalPrice(string $date)
    {
        $sql = "SELECT SUM(ilosc_dni*s.cena_za_jeden_dzien) AS cena FROM wypozyczenia w LEFT JOIN samochod s ON s.id = w.id_samochodu WHERE data LIKE :date;";

        return DB::queryOne($sql, [
            ':date' => $date.'%',
        ]);
    }

    public static function getPrice($price): float
    {
        return (float)number_format($price ?? 0, 2, '.', '');
    }
}