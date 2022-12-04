<?php

// namespace App\Controller;


require 'App/Model/Catalog.php';

use App\Model\Catalog;

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
            'products' => $this::getAll(),
            'test' => "bite"
        ]);
    }
}

$a = new Cat();
$a->productAction();
