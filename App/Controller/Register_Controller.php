<?php

// namespace App\Controller;


require 'App/Model/User.php';

use App\Model\User;

class Registration extends User
{

    public function displayRegister()
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

    public function checkRegistration()
    {
        if (strlen($_POST['Password']) < 7) {
            return "Please enter a valid password";
        }
        // if (str_contains($_POST['Password'], "\"!#$%&'()*+,-./:;<>=?@[]\^_`{}|~")) {
        // }
        if (!(preg_match('/[a-zA-Z]/', $_POST['Password']) && preg_match('/\d/', $_POST['Password']) && preg_match('/[^a-zA-Z\d]/', $_POST['Password']))) {
            return "Please enter a valid password";
        }
        if (strlen($_POST['FirstName']) < 2) {
            return "Please enter a first name";
        }
        if (strlen($_POST['LastName']) < 2) {
            return "Please enter a last name";
        }
        if (strlen($_POST['FirstName']) < 2) {
            return "Please enter a first name";
        }
        if ($this::emailUsed($_POST['Email'])) {
            return "Email already Used";
        }

        return "ok";
    }
}



$loader = new \Twig\Loader\FilesystemLoader('App/View/templates');
$twig = new \Twig\Environment($loader, [
    'cache' => false // __DIR__ . '/tmp'
]);
// echo "vie";
echo $_SERVER['REQUEST_METHOD'];
$obj = new Registration();
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $obj->displayRegister();
} else {
    $regStatus = $obj->checkRegistration();
    echo "ui";
    // echo var_dump($regStatus);
    if ($regStatus === "ok") {
        $obj->createUser($_POST);
    } else {
        // afficher barre rouge avec valeur de $regStatus
        // echo $regStatus;
        $template = $twig->load("register.twig");

        echo $twig->render($template, [
            // 'products' => $this::getAll(),
            'status' => $regStatus
        ]);
    }
}
// echo $_POST['Name'];
