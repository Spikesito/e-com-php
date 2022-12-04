<?php
// echo "jvois pas ";
// echo $productId;

require 'App/Model/Catalog.php';

use App\Model\Catalog;

class Detail extends Catalog
{
    public function detailAction($id)
    {
        $loader = new \Twig\Loader\FilesystemLoader('App/View/templates');
        $twig = new \Twig\Environment($loader, [
            'cache' => false // __DIR__ . '/tmp'
        ]);
        $template = $twig->load("detail.twig");
        // echo 1;
        echo $twig->render($template, [
            'p' => $this::getDetailById($id)[0],
            'test' => "bite"
        ]);
    }
}

$obj = new Detail();
$obj->detailAction($productId);