<?php

namespace App\Controllers;

use App\Model\Catalog;

class Home 
{
    public function homeAction()
    {
        $loader = new \Twig\Loader\FilesystemLoader('App/View/templates');
        $twig = new \Twig\Environment($loader, [
            'cache' => false // __DIR__ . '/tmp'
        ]);
        $template = $twig->load("home.twig");
        // echo 1;
        echo $twig->render($template, [
            'products' => Catalog::getAll()
        ]);
    }
}

$a = new Home();
if (ISSET($_SESSION['Name'])){
    
}
$a->homeAction();

?>
<!-- extends Core\Core\Controller -->