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

    public function checkRegistration($data)
    {
        if (strlen($data['Password']) < 7) {
            return "Please enter a valid password";
        }
        // if (str_contains($data['Password'], "\"!#$%&'()*+,-./:;<>=?@[]\^_`{}|~")) {
        // }
        if (!(preg_match('/[a-zA-Z]/', $data['Password']) && preg_match('/\d/', $data['Password']) && preg_match('/[^a-zA-Z\d]/', $data['Password']))) {
            return "Please enter a valid password";
        }
        if (strlen($data['FirstName']) < 2) {
            return "Please enter a first name";
        }
        if (strlen($data['LastName']) < 2) {
            return "Please enter a last name";
        }
        if (strlen($data['FirstName']) < 2) {
            return "Please enter a first name";
        }
        if ($this::emailUsed($data['Email'])) {
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
    $regStatus = $obj->checkRegistration($_POST);
    echo "ui";
    // echo var_dump($regStatus);
    if ($regStatus === "ok") {
        $_POST['Password'] = md5($_POST['Password']);
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
