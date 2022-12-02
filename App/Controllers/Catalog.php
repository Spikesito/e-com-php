<?php

namespace App\Controllers;


use App\Model\Product\Product;

class Catalog
{

    public function productsAction()
    {
        
        $loader = new \Twig\Loader\FilesystemLoader('./App/Views');
        $twig = new \Twig\Environment($loader, [
            'cache' => false // __DIR__ . '/tmp'
        ]);
        $template = $twig->load("catalog.twig");

        echo $twig->render('catalog.twig', [
            'products' => Product::getAll(),
        ]);
    }

    // public function carsAction() {
    //     View::renderTemplate('Home/index.html');
    // }

    // public function bagsAction() {
    //     View::renderTemplate('Home/index.html');
    // }
}

?>
<!-- extends Core\Core\Controller -->