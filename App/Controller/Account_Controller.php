<?php

// require 'App/Model/User.php';

use App\Model\User;

class Account extends User
{
    public function displayAccount()
    {
        $loader = new \Twig\Loader\FilesystemLoader('App/View/templates');
        $twig = new \Twig\Environment($loader, [
            'cache' => false // __DIR__ . '/tmp'
        ]);

        $template = $twig->load("account.twig");
        // echo 1;
        echo $twig->render($template, [
            'connected' => $_SESSION['connected'],
            'data' => $this::getUserById($_SESSION['data']['Id'])
            // 'products' => $this::getAll(),
            // 'test' => "bite"
        ]);
    }
}

echo var_dump($_SESSION);
$obj = new Account();
$obj->displayAccount();
