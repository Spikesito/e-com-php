<?php

namespace App\Model;

// require_once __DIR__ . '/../../vendor/autoload.php';

// require 'App/Model/CRUD.php';

use PDO;

class Cart extends Catalog
// class Catalog

{

    public static function getCartById($id)
    {
        $db = static::getDB();
        $stmt = $db->query("SELECT * FROM users WHERE UserId = $id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
    }
}
