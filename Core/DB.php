<?php

namespace Core;

class DB
{
    private static function getConfig()
    {
        return require_once '../config/database.php';
    }

    private static function connection(): \PDO
    {
        $dbConfig = self::getConfig();

        $options = [
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $dsn = sprintf("mysql:host=%s;dbname=%s;charset=utf8mb4;port=%s",
            $dbConfig['host'],
            $dbConfig['db_name'],
            $dbConfig['port'],
        );

        return new \PDO($dsn, $dbConfig['db_user'], $dbConfig['db_pass'], $options);
    }

    private static function prepare(string $query)
    {
        $db = self::connection();

        return $db->prepare($query);
    }

    private static function getQueryBinding(string $query, array $boundParams)
    {
        $sql = self::prepare($query);

        $queryDebug = $query;

        foreach($boundParams as $key => $value) {
            $sql->bindParam($key, $value);
            $queryDebug = str_replace($key, sprintf("'%s'", $value), $queryDebug);
        }

        if(__DEBUG__) {
            echo '<pre>';
            print_r([
                $queryDebug,
                $sql,
                $boundParams
            ]);
            echo '</pre>';
        }

        return $sql;
    }

    public static function queryOne(string $query, array $boundParams = [])
    {
        $sql = self::getQueryBinding($query, $boundParams);

        $sql->execute();

        return $sql->fetch();
    }

    public static function execute(string $query, array $boundParams = []): int
    {
        $sql = self::getQueryBinding($query, $boundParams);

        return $sql->execute();
    }
}