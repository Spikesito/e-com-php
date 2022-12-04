<?php

namespace App\Controllers;

use App\Model\Catalog;

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
            'products' => Catalog::getAll(),
        ]);
    }
}

?>
<!-- extends Core\Core\Controller -->