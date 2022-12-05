<?php

// namespace App\Controller;


require 'App/Model/User.php';

use App\Model\User;

class Registration extends User
{

    public function displayLogin()
    {
        $loader = new \Twig\Loader\FilesystemLoader('App/View/templates');
        $twig = new \Twig\Environment($loader, [
            'cache' => false // __DIR__ . '/tmp'
        ]);

        $template = $twig->load("register.twig");
        // echo 1;
        echo $twig->render($template, [
            // 'products' => $this::getAll(),
            'test' => "bite"
        ]);
    }

    public function checkLogin()
    {


        return "ok";
    }
}
