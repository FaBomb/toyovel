<?php

namespace Illuminate\Database;

use Illuminate\Database\DBX;

abstract class Model {

    protected static $fillable = [];

    public static function create($addData) {

        $columns = implode(', ', array_keys($addData));
        $values = '\''.implode("', '", array_values($addData)).'\'';
        $exploded = explode('\\', static::class);
        $table = mb_strtolower(end($exploded));
        $sql = "INSERT INTO {$table} ({$columns}) VALUES ($values)";

        $lastId = self::pdo($sql)['lastId'];
        return $lastId;

    }

    public static function get($id) {

        $exploded = explode('\\', static::class);
        $table = mb_strtolower(end($exploded));
        $sql = "SELECT * FROM {$table} WHERE id = {$id};";

        return self::pdo($sql)['state']->fetch();

    }

    private static function pdo($sql) {

        try {

            DBX::connect();
            $state = DBX::$pdo->query($sql);
            $lastId = DBX::$pdo->lastInsertId();
           
            $result = ['state'=>$state, 'lastId'=>$lastId];
            return $result;

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
