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
        // echo var_dump($this::getDetailById($id));
        echo $twig->render($template, [
            'connected' => $_SESSION['connected'],
            'p' => $this::getDetailById($id)
        ]);
    }
}

$obj = new Detail();
$obj->detailAction($productId);
<<<<<<< HEAD

echo $_SESSION['connected'];
echo var_dump($_SESSION['data']);
=======
>>>>>>> 4932c94e6dda8503e71acfe56e60bd704b8c47e4
