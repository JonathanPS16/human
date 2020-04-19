<?php 
session_start();
define("DIRWEB", "https://".$_SERVER["HTTP_HOST"]."/nuevohuman/");
class consultas {
public function  consultarusuario($usuario,$clave) {
	$this->_usuarioconectado($usuario,$clave);
	$valid=false;

	if (isset($_SESSION['idusuario'])) {
		$valid= true;

	} 

	return $valid;
}

private function _usuarioconectado($usuario,$clave) {
    $conn = $this->conec();
    $consultas= $conn->Execute("SELECT users.uid,role.name as perfil,role.rid as idperfil FROM users inner join users_roles on users_roles.uid=users.uid 
    INNER join role on role.rid=users_roles.rid and users.name=".$usuario)-> getRows();
    foreach ($consultas as $key => $arreglo) { 
        $uid = $arreglo["uid"];
        $uperfil = $arreglo["idperfil"];
        $perfil = $arreglo["perfil"];
        $perfil =1; 
        $_SESSION['usuario'] = $usuario;
    	$_SESSION['idusuario'] = $uid;
    	$_SESSION['perfil'] = $perfil;
    	$_SESSION['id_perfil'] = $uperfil;
    }

} 

public function conec(){
    $conn="";
    include('adodb/adodb.inc.php');    
    $DBuser = "byvnilva_drupal";
    $DBpass = "admByV$";
    $DBserver="localhost";
    $DBname = "byvnilva_humantalents";
    $conn = ADONewConnection('mysqli');  

    $conn->Connect($DBserver,$DBuser,$DBpass,$DBname) or die(header("location:../errores/msn_error.php"));
    $conn->execute("SET NAMES utf8");
    return $conn;
}

public function cerrarsesion() {
	$_SESSION = array();
		if (ini_get("session.use_cookies")) {
	    $params = session_get_cookie_params();
	    setcookie(session_name(), '', time() - 42000,
	        $params["path"], $params["domain"],
	        $params["secure"], $params["httponly"]
	    );
	}
	// Finalmente, destruir la sesión.
	session_destroy();
}


public function menulateral(){
    $conn = $this->conec();
    $dato=array();
    $consultas= $conn->Execute("SELECT * from menus where padre=0")-> getRows();
    foreach ($consultas as $key => $arreglo) { 
        $menu        = $arreglo["menu"];
        $id        = $arreglo["id"];
        $arrayunio=array();
        $consultasdos= $conn->Execute("SELECT * from menus where padre=".$id)-> getRows();
        foreach ($consultasdos as $key => $arreglodos) { 
            $menudos        = $arreglodos["menu"];
            $iddos        = $arreglodos["id"];
            $url        = $arreglodos["url"];
            $img        = $arreglodos["img"];
            array_push($arrayunio, array("menu"=>$menudos,"url"=>$url,"img"=>$img));
        }
        array_push($dato,array("titulo"=>$menu ,"datos"=>$arrayunio));

    }
    return $dato;
}



}
?>