<?php

namespace App\Model;

// require_once __DIR__ . '/../../vendor/autoload.php';

// require 'App/Model/CRUD.php';

use PDO;

class Cart extends Catalog
{

    public static function getCartById($id)
    {
        $db = static::getDB();
        $stmt = $db->query("SELECT ProductId FROM carts c INNER JOIN CommandLine cl WHERE cl.CartId = c.CartId AND c.UserId = $id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addToCart($cId,$pId, $quant)
    {
        $pd = $this::getDetailById($pId);
        if ($pd['Quantity'] < $quant) {
            return "insufficient supply";
        }
        
        $this::CrudData("C","commandline","'$',''");
    }
}
