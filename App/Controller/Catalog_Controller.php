<?php

// namespace App\Controller;


require 'App/Model/Catalog.php';

use App\Model\Catalog;
use App\Model\Product;

// echo $_SESSION['connected'];
// echo var_dump($_SESSION['data']);

class Cat extends Catalog
{

    public function productAction()
    {
        $loader = new \Twig\Loader\FilesystemLoader('App/View/templates');
        $twig = new \Twig\Environment($loader, [
            'cache' => false // __DIR__ . '/tmp'
        ]);
        $template = $twig->load("catalog.twig");
        // echo 1;
        echo $twig->render($template, [
            'connected' => $_SESSION['connected'],
            'products' => $this::getAll()
        ]);
    }
}

$a = new Cat();
<<<<<<< HEAD
echo $a->getFields('users');
=======
if (isset($_SESSION['Name'])) {
}
>>>>>>> wass
$a->productAction();
// $a->CrudData('C', "users", "'Emile', 'SEGURET', 'emileseguret@yahoo.fr', 'Bite', '0612', '26-07-1977', '170794'");
