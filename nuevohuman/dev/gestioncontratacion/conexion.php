<?php
$db_host = 'localhost';
$db_user = 'byvnilva_drupal';
$db_pass = 'admByV$';
$database = 'byvnilva_humantalents';
if (!@mysql_connect($db_host, $db_user, $db_pass))
    die("No se pudo establecer conexion a la base de datos");
if (!@mysql_select_db($database))
    die("base de datos no existe");
	
?>