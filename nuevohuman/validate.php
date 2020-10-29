<?php 
require_once('conect/clases.php');

$objconsulta= new consultas();

$numero = $_GET["data"];
$numero = base64_decode($numero); 
$numero = str_replace(")","",$numero);
$numero = str_replace("o","",$numero);
$numero = str_replace("<","",$numero);
$numero = str_replace("D","",$numero);
$numero = str_replace("d","",$numero);
$numero = str_replace("S","",$numero);
$numero = str_replace("s","",$numero);
$numero = str_replace("u","",$numero);
$numero = str_replace("U","",$numero);
$resultado = $objconsulta->activarempleado($numero);
header("Location: ".DIRWEB."index.php?error=3");

