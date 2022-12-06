<?php

// session_destroy();
$_SESSION['connected'] = false;
header("Location: /", true, 301);
exit();
