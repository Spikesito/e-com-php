<?php 

namespace App\Model;

//require_once __DIR__ . '/../../vendor/autoload.php';

use Core\Core\Core;
use PDO;

class User{
    public static function getAll() {
        //$core = new Core();
        //$core->instance->getDB();
        echo "getAll";
        // $db=static::getDB();
        // $stmt = $db -> query("SELECT * FROM products;");
        // return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}