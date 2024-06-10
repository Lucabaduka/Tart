<?php

header($_SERVER["SERVER_PROTOCOL"]." 500: Internal Server Error", true, 500);
$title    = "500: Internal Server Error";
$subtitle = "The server's brain has exploded";
$text     = "Something about your last interaction triggered a fault in the Tart software or in the server's
             configuration. If it keeps happening, feel free to report it to Refuge administration.";

include "../Sources/Templates/page.php";

?>