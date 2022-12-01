<?php 
namespace App\Controllers;

use \Core\Core\View;
use App\Models\User;

class Catalog {
    
    public function productsAction() {
        View::renderTemplate('Catalog/index.html', [
            'products' => User::getAll(),
        ]);
    }

    // public function carsAction() {
    //     View::renderTemplate('Home/index.html');
    // }

    // public function bagsAction() {
    //     View::renderTemplate('Home/index.html');
    // }
}

?>
 <!-- extends Core\Core\Controller -->