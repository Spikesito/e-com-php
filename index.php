<?php

<<<<<<< HEAD
use Twig\Profiler\Dumper\HtmlDumper;

include './View/header.php';
include './View/body.php';
include './View/footer.php';
?>


 <!-- Routing  -->
<!-- <html>
    <form action="post_form.php" method="POST">
        <input type="text" name="firstname"></input>
        <input type="submit" value="Envoyer"></input>
    </form>
</html> -->

<html>
    <form action="post_form.php" method="GET">
        <input type="text" name="firstname"></input>
        <input type="submit" value="Envoyer"></input>
    </form>
</html>

=======
require 'vendor/autoload.php';

$page = 'home';
if (isset($_GET['p'])) {
    $page = $_GET['p'];
}

$loader = new \Twig\Loader\FilesystemLoader('./View/templates');
$twig = new \Twig\Environment($loader, [
    'cache' => false // __DIR__ . '/tmp'
]);


switch ($page) {
    case 'home';
        echo $twig->render('home.twig');
        break;
    case 'product';
        echo $twig->render('product.twig');
        break;
    default;
        header('HTTP/1.0 404 Not Found');
        echo $twig->render('404.twig');
        break;
}

?>
<!-- 
?php
include './View/header.php';
include './View/body.php';
include './View/footer.php';
?> -->
<!-- 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    ?php if (1 == 1)
    echo 'bite';
    ?>
</body>

</html> -->
>>>>>>> origin/wass
