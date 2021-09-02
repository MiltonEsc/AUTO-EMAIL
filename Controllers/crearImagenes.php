<?php
    require_once "Archivo.php";
    $img = $_POST['img'];
    $nombre=$_POST['nombre'];

    $Archivo = new Archivo();
    
    echo $Archivo->subeimagen64temp($img, $nombre);
?>