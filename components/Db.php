<?php

namespace components;

use PDO;

class Db
{
    public static function getConnection(): PDO
    {
        $params = include(ROOT . '/config/db_params.php');
        $dsn    = "mysql:host={$params['host']};port={$params['port']};dbname={$params['dbname']}";
        return new PDO($dsn, $params['user'], $params['password']);
    }
}