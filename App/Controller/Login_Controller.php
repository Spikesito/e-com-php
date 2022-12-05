<?php

// namespace App\Controller;


require 'App/Model/Catalog.php';

use App\Model\Catalog;

class Login
{

    public function logAction()
    {

        $loader = new \Twig\Loader\FilesystemLoader('App/View/templates');
        $twig = new \Twig\Environment($loader, [
            'cache' => false // __DIR__ . '/tmp'
        ]);
        $template = $twig->load("login.twig");
        // echo 1;
        echo $twig->render($template, [
            'products' => Catalog::getAll()
        ]);
    }
}

$a = new Login();
$a->logAction();
