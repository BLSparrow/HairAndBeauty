<?php

namespace App\BD;

use PDO;

class Connect
{
    public static function make($conn)
    {
        return new PDO(
            'mysql:host=' . $conn['host'] . ';dbname=' . $conn['dbname'],
            $conn['login'],
            $conn['password'],
            $conn['options']
        );
    }
}