<?php

namespace App\Model\Core;

use PDO;
use App\Model\Config\Config;


class Core
{
    function getDB()
    {
        static $dbh = null;

        if ($dbh === null) {
            $dsn = "mysql:host=" . Config::DB_HOST . ";dbname=" . Config::DB_NAME; // contient le nom du serveur et de la base
            $user = 'root';
            $password = '';
            $dbh = new PDO($dsn, $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return $dbh;
    }
}
