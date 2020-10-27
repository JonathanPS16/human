<?php 
$secret = "6LfFENwZAAAAAGEDmDFtl3nsrJIhZRaJ75iO0YjG";

if (isset($_POST['g-recaptcha-response'])) {
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
}

$jsonResponse = json_decode($response);

if (!$jsonResponse->success === true) {
	header("Location: ".DIRWEB."index.php?error=0");

} 
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