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

        $template = $twig->load("login.twig");
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
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $obj->displayLogin();
} else {
    $loginResponse = $obj->checkLogin($_POST['Email'], $_POST['Password']);
    if (is_array($loginResponse)) {
        $_SESSION['connected'] = true;
        $_SESSION['data'] = $loginResponse;
        header("Location: /catalog", true, 301);
        exit();
    }
    $obj->displayLogin();
}
