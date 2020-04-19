<?php 
$usuario = $_POST['inputEmail'];
$clave = $_POST['inputPassword'];
require_once('conect/clases.php');

$objconsulta= new consultas();
$resultado = $objconsulta->consultarusuario($usuario,$clave);
	
if ($resultado){
	
	header("Location: ".DIRWEB."home.php?ctr=home");
} else {
	header("Location: ".DIRWEB."index.php?error=0");
	//echo "NO";
}


?>