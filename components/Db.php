<?php

namespace components;

use PDO;

class Db
{
    public static function getConnection(): PDO
    {
        $params = include(ROOT . '/config/db_params.php');
        $dsn    = "mysql:host={$params['host']};dbname={$params['database']}";
        return new PDO($dsn, $params['username'], $params['password']);
    }
}