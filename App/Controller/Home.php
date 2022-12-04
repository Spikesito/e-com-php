<?php

namespace App\Controllers;

use App\Model\Product\Product;

class Home 
{
    public function homeAction()
    {
        $loader = new \Twig\Loader\FilesystemLoader('./App/Views');
        $twig = new \Twig\Environment($loader, [
            'cache' => false // __DIR__ . '/tmp'
        ]);
        $template = $twig->load("home.twig");

        echo $twig->render('catalog.twig', [
            'products' => Product::getAll(),
        ]);
    }
}

?>
<!-- extends Core\Core\Controller -->