<?php 

namespace Illuminate\Database;

class DBX {

    const DBHOST = 'db';
    const DBPORT = 3306;
    const DBNAME = 'mywork';
    const DBCHAR = "utf8";
    const DBUSER = 'phper';
    const DBPASS = 'secret';

    public static $pdo;	

    public static function connect(){

        self::$pdo = new \PDO(
            "mysql:host=". self::DBHOST
                    .";port=".self::DBPORT
                    .";dbname=".self::DBNAME
                    .";charset=".self::DBCHAR,
            self::DBUSER, self::DBPASS
        );
        
        self::$pdo->setAttribute(\PDO::ATTR_ERRMODE,
            \PDO::ERRMODE_EXCEPTION);

    }

}

