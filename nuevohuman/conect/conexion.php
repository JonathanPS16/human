<?php 
session_start();
//error_reporting(0);
//error_reporting(E_ERROR | E_PARSE);
//ini_set("display_errors", 1); 
//$empresa = $_SESSION["empresa"];
define("DIRWEB", "https://".$_SERVER["HTTP_HOST"]."/human/");
include('adodb/adodb.inc.php');    
/**********************************************************************************************************************************
***********************************************************************************************************************************
/************************************************************VARIABLES DE CONEXION*************************************************/

$DBuser = "byvnilva_drupal";
$DBpass = "admByV$";
$DBserver="localhost";
$DBname = "byvnilva_humantalents";
$conn = ADONewConnection('mysqli');  

$conn->Connect($DBserver,$DBuser,$DBpass,$DBname) or die(header("location:../errores/msn_error.php"));
$conn->execute("SET NAMES utf8");
die("HLA");
//die(var_dump($conn));
//echo "AJUSTAR CONEXION";
?>