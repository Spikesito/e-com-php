<?php

// namespace App\Controller;


require 'App/Model/User.php';

use App\Model\User;

class Login extends User
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

    public function checkLogin($email, $pw)
    {
        return $this->loginMatch($email, $pw);
    }
}

$obj = new Login();
echo $obj->checkLogin("cframi@hotmaikl.com", "580e37a14e937589db3223dc34042093");
