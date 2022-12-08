<?php

// require 'App/Model/User.php';

use App\Model\Cart;

class UserCart extends Cart
{
    public function displayUserCart()
    {
        $loader = new \Twig\Loader\FilesystemLoader('App/View/templates');
        $twig = new \Twig\Environment($loader, [
            'cache' => false // __DIR__ . '/tmp'
        ]);

        $template = $twig->load("cart.twig");
        // echo 1;
        echo $twig->render($template, [
            'content' => $this::getCartById($_SESSION['data']['Id'])
            // 'test' => "bite"
        ]);
    }
}

echo var_dump($_SESSION);
if (isset($_SESSION['connected']) && $_SESSION['connected'] == true) {
    $obj = new UserCart();
    $obj->displayUserCart();
} else {
    header("Location: /404", true, 301);
    exit();
}
