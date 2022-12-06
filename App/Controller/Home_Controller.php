<<<<<<< HEAD
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
=======
<?php

require 'App/Model/Catalog.php';

use App\Model\Catalog;

class Home extends Catalog
{
    public function displayHome()
    {
        $loader = new \Twig\Loader\FilesystemLoader('App/View/templates');
        $twig = new \Twig\Environment($loader, [
            'cache' => false // __DIR__ . '/tmp'
        ]);

        $template = $twig->load("home.twig");
        // echo 1;
        echo $twig->render($template, [
            'connected' => $_SESSION['connected'],
            // 'products' => $this::getAll(),
            // 'test' => "bite"
        ]);
    }
}

$obj = new Home();
$obj->displayHome();
>>>>>>> 4932c94e6dda8503e71acfe56e60bd704b8c47e4
