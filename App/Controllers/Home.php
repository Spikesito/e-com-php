<?php 
namespace App\Controllers;

use \Core\Core\View;
use \Core\Core\Controller;

class Home {
    
    public function indexAction() {
        View::renderTemplate('Home/index.twig');
    }
}

?>
 <!-- extends Core\Core\Controller -->