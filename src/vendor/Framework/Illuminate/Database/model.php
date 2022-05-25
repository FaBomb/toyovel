<?php

namespace Illuminate\Database;

use Illuminate\Database\DBX;

abstract class Model {

    protected static $fillable = [];

    public static function create($addData) {

        $columns = implode(', ', array_keys($addData));
        $values = '\''.implode("', '", array_keys($addData)).'\'';
        $exploded = explode('\\', static::class);
        $table = mb_strtolower(end($exploded));
        $sql = "INSERT INTO {$table} ({$columns}) VALUES ($values)";

        self::pdo($sql);

    }

    private static function pdo($sql) {

        try {

            DBX::connect();
            $state = DBX::$pdo->query($sql);

        } catch(\PDOException $e) {

            echo $e->getMessage();
            exit;

        }

        /**
        時間があったらプリペアード処理まで
        $state = DBX::$pdo->prepare($sql);
        foreach ($data_array as $key => $data) {
            $state->bindValue(":{$key}", $data);
        }
        **/
        
    }

}
