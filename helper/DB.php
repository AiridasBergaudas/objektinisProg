<?php

namespace helper;

use PDO;

class DB
{
    private static ?PDO $pdo = null;
    private function __construct()
    {

    }

    public static function getDB():PDO
    {
        if (self::$pdo == null)      {
            self::$pdo = new PDO('mysql:host=localhost;dbname='.DB_NAME, DB_USER, DB_PASSWORD);
        }
        return self::$pdo;
    }
}