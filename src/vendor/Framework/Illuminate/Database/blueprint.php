<?php

namespace Illuminate\Database;

use Illuminate\Database\DBX;

class Blueprint {

    public $columns = [];

    private $table;

    private $sql;

    public function __construct($table) {

        $this->table = $table;

    }

    public function id() {

        $column = 'id INT(11) AUTO_INCREMENT PRIMARY KEY';
        array_push($this->columns, $column);

    }   

    public function string($name, $num=20) {

        $column = "{$name} VARCHAR({$num})";
        array_push($this->columns, $column);

    }
    public function timestamp($name) {

        $column = "{$name} TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP";
        array_push($this->columns, $column);

    } 

    public function query() {

        $this->createSql();
        try {

            DBX::connect();
            $state = DBX::$pdo->query($this->sql);

        } catch(\PDOException $e) {

            echo $e->getMessage();
            exit;

        }
            
    }

    public function createSql() {

        $columns = implode(', ', $this->columns);
        $this->sql = "CREATE TABLE {$this->table} ({$columns})";

    }

}
