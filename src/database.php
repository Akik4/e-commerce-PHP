<?php

namespace utils\poo;

use PDO;
use PDOException;

class Database
{
    public function connect()
    {
        $dsn = "mysql:host=mariadb;dbname=website";

        try {
            $PDO = new PDO($dsn, "root", "root");
        } catch(PDOException $e) {
            echo "Connection failed";
        }
    }
}