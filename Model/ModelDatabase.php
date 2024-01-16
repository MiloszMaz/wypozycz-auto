<?php
namespace Model;

use Core\DB;

class ModelDatabase
{
    protected function saveInDb(string $tableName, $class)
    {
        $bind = [];
        $names = [];
        $values = [];

        foreach($class as $nameProperty => $valueProperty) {
            $toBind = sprintf(":%s", $nameProperty);
            $bind[$toBind] = $valueProperty;
            $names[] = $nameProperty;
            $values[] = $toBind;
        }

        $sql = sprintf("INSERT INTO %s (%s) VALUES (%s);", $tableName, implode(', ', $names), implode(', ', $values));

        DB::execute($sql, $bind);
    }
}