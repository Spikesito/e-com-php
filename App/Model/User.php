<?php

namespace App\Model;

require_once __DIR__ . '/../../vendor/autoload.php';

require 'App/Model/Core.php';

use PDO;

class User extends \App\Model\Core\Core
// class Catalog

{
    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query("SELECT * FROM users;");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        // return "it works";
    }

}
