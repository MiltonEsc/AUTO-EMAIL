<?php

    $mysqli = new mysqli("127.0.0.1", "root", "" , "cumpleanios");

    if ($mysqli->connect_errno) {
        echo "<h1>Lo sentimos, este sitio web está experimentando problemas.</h1>";
        // Podría ser conveniente mostrar algo interesante, aunque nosotros simplemente saldremos
        exit;
    }

?>
