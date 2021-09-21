<?php
session_start();
error_reporting(1);
$varsession = $_SESSION['usuarios'];
if ($varsession == null || $varssesion = '') {
    header("Location:index.php");
    die();
}
    require_once $_SERVER['DOCUMENT_ROOT']."/AUTO-EMAIL/Controllers/template.php";
$template = new TemplateController();
$template -> template();   
