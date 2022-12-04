<?php

namespace App\Model;

require_once __DIR__ . '/../../vendor/autoload.php';

require 'App/Model/Core.php';

use PDO;

class Catalog extends \App\Model\Core\Core
// class Catalog

{
    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query("SELECT * FROM products;");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        // return "it works";
    }

    public static function getDetailById($id)
    {
        $db = static::getDB();
        $stmt = $db->query("SELECT * FROM products WHERE ProductId = $id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // public static function getId()
    // {
    //     $db = static::getDB();
    //     $stmt = $db->query("SELECT * FROM products; WHERE ProductId =");
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }
}
