<<<<<<< HEAD
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
=======
<?php

// require 'App/Model/Catalog.php';

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
>>>>>>> wass
