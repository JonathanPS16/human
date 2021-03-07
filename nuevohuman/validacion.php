<?php 
//print_r($_POST);
//die();
//die(var_export($_POST['g-recaptcha-response']));
$secret = "6LfFENwZAAAAAGEDmDFtl3nsrJIhZRaJ75iO0YjG";
$captcha = $_POST['g-recaptcha-response']; 
$url = 'https://www.google.com/recaptcha/api/siteverify';
$data = array(
'secret' => $secret,
'response' => $captcha,
'remoteip' => $_SERVER['REMOTE_ADDR']
);

$curlConfig = array(
CURLOPT_URL => $url,
CURLOPT_POST => true,
CURLOPT_RETURNTRANSFER => true,
CURLOPT_POSTFIELDS => $data
);

$ch = curl_init();
curl_setopt_array($ch, $curlConfig);
$response = curl_exec($ch);
curl_close($ch);
$jsonResponse = json_decode($response);

if (!$jsonResponse->success === true) {
	header("Location: index.php?error=0");

} else {
	$usuario = $_POST['inputEmail'];
	$clave = $_POST['inputPassword'];
	$reta = $_POST['tipore'];
	require_once('conect/clases.php');
	$objconsulta= new consultas();
	if($reta == 1){
		//echo "ACA";
		$resultado =  $objconsulta->enviarcorreorestauracion($usuario);
		//echo $resultado;
		header("Location: ".DIRWEB."index.php?".$resultado."");

	} else {
		$resultado = $objconsulta->consultarempleado($usuario,$clave);
		if($resultado == "noempleado") {
			$resultado = $objconsulta->consultarusuario($usuario,$clave);
		} else if ($resultado=="creado"){
			header("Location: ".DIRWEB."index.php?error=2");
		} else if ($resultado=="OK"){
			header("Location: ".DIRWEB."home.php?ctr=home");
		} else {
			header("Location: ".DIRWEB."index.php?error=0");
		}
			
		if ($resultado=="SI") {
			header("Location: ".DIRWEB."home.php?ctr=home");
		} else if ($resultado=="NO"){
			header("Location: ".DIRWEB."index.php?error=0");
		}
	}

} 





?>