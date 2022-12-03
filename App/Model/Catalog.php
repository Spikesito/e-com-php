<?php

namespace App\Model;

require_once __DIR__ . '/../../vendor/autoload.php';

use PDO;

class Catalog extends \App\Model\Core\Core
{
    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query("SELECT * FROM products;");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getId()
    {
        $db = static::getDB();
        $stmt = $db->query("SELECT * FROM products; WHERE ProductId =");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
