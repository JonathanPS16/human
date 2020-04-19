<?php 
include_once("conexion.php");
$hoy = date('Y-m-d');
$accion=$_POST['accion'];
switch ($accion) {
    case "guardarnuevo":
        $idreq=$_POST['idreq'];
        $cedula=$_POST['cedula'];
        $nombre=$_POST['nombre'];
        $telefono=$_POST['telefono'];
        $correo=$_POST['correo'];
        $sql = "INSERT INTO req_candidatos (id_requisision ,nombre,cedula,telefono,correo,fechasolicitud) VALUES (".$idreq.",'".$nombre."','".$cedula."','".$telefono."','".$correo."','".$hoy."')";
        $results =  mysql_query($sql) ; 
    break;
}