<?php
 session_start();
    include("conexion/db.php");

    require_once "Controllers/template.php";

$template = new TemplateController();
$template -> template();   