<?php 
require_once('conect/clases.php');

$objconsulta= new consultas();

$id = $_GET["id"];
$resultado = $objconsulta->consultavalidadosproceso($id);
$correo = base64_decode(base64_decode($_GET['validate']));
$datos=explode("|", $resultado[0]['validacionrecibido']);

$ret = $resultado[0]['validacionrecibido'];
if(!in_array($correo,$datos)){
    $ret = $ret."|".$correo ;
    $resultado = $objconsulta->guardarconfirmacioncorreo($id,$ret);
    echo "<script>alert('Confirmación de Recibido Realizada Correctamente');
    location.href ='".DIRWEB."index.php';
    </script>";
} else {
    echo "<script>alert('Confirmación de Recibido Ya Realizada de su Parte');
    location.href ='".DIRWEB."index.php';
    </script>";
}

