<?php

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

