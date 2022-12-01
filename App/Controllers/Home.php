<?php 
namespace App\Controllers;

use \Core\Core\View;

class Home {
    
    public function indexAction() {
        View::renderTemplate('Home/index.html');
    }
}

?>
 <!-- extends Core\Core\Controller -->