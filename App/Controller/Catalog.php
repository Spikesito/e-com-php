<?php

// namespace App\Controller;


require 'App/Model/Catalog.php';

use App\Model\Catalog;

class Cat extends Catalog
{

    public function productsAction()
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

        // ----
        // $template = $twig->load("catalog.twig");
        // // echo 1;
        // $b = new Product();
        // $arr = $b->getAll();

        // echo $twig->render($template, [
        //     'products' => $arr[0],
        // ]);
        // ----

        // echo $twig->render('catalog.twig');
    }

    // public function carsAction() {
    //     View::renderTemplate('Home/index.html');
    // }

    // public function bagsAction() {
    //     View::renderTemplate('Home/index.html');
    // }
}

$a = new Cat();
$a->productsAction();
