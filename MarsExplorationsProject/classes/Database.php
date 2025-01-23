<?php

class Database
{

    private static $pdo = null;

    public static function getConnection()
    {
        if (self::$pdo === null) {
            require __DIR__ . '/../config/db.php';
            self::$pdo = $pdo;
        }

        return self::$pdo;
    }

    private function __construct() {}
    private function __clone() {}
    private function __wakeup() {}
}
