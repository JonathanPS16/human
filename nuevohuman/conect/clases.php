<?php 
session_start();
define("DIRWEB", "https://".$_SERVER["HTTP_HOST"]."/human/");
define("Host", "smtp.zoho.com");
define("Username", "info@humantalentsas.com.co");
define("Password", "Aplica2021HumanInfo*Zoho");
define("Port", 465);
define("correocor", "info@humantalentsas.com.co");
define("mensajecorr", "Humantalentsas");
require("phpmailer/class.phpmailer.php");
class consultas {
public function  consultarusuario($usuario,$clave) {
	$this->_usuarioconectado($usuario,$clave);
	$valid="NO";

	if (isset($_SESSION['idusuario'])) {
		$valid="SI";

	} 

	return $valid;
}

public function consultarempleado($usuario,$clave){
    $conn = $this->conec();
    $clave = base64_encode($clave); 
    $result= $conn->Execute("SELECT * from  certificados WHERE  cedula ='{$usuario}' and correoelectronico!=''");
    $recordCount = $result->recordCount();
    
    if($recordCount == 0) {
        return "noempleado";
    } else {

        $consultas = $result-> getRows();
        $correo = "";
        foreach ($consultas as $key => $arreglo) { 
            $correo = $arreglo["correoelectronico"];  
        }
        $result= $conn->Execute("SELECT * from  empledos_ingreso WHERE  documento ='{$usuario}'");
        $recordCount = $result->recordCount();
        if($recordCount == 0) {
            $result= $conn->Execute("INSERT INTO empledos_ingreso(documento,correo,clave,estado) values ('$usuario','$correo','$clave','P')");
            $asunto = "Activacion de Cuenta";
            $mensaje="Apreciado Colaborador<br><br>
            Con el propósito de agilizar y optimizar los tiempo de respuesta a sus requerimientos, ponemos a su disposición nuestras soluciones de tecnología, para que Usted pueda consultar,  generar y descargar la información correspondiente con nuestra relación laboral. Para activar su cuenta por favor hacer click en el siguiente <a href='".DIRWEB."validate.php?data=".base64_encode($usuario)."'><strong>link de activacion</strong></a><br><br>
            Esperamos que estas herramientas les genere mayor comodidad para la solución de sus requerimientos. Así mismo, si tiene cualquier inquietud adicional lo invitamos a contactar a nuestra área de servicio al cliente a través del correo servicioalcliente@humantalentsas.com o al teléfono  214 2011 o al celular 318 335 2194 - 315 612 9899
            <br><br>
            Seguiremos trabajando para Usted,  para continuar mejorando nuestros canales de comunicación.
            <br><br>
            Cordialmente,
            <br><br>
            Área Servicio al Cliente<br>
            Human Talent SAS";
            $this->enviocorreo($correo,$mensaje,$asunto);
            return "creado";
        } else {
            $consultas= $conn->Execute("SELECT * from  empledos_ingreso WHERE  documento='{$usuario}' and  clave = '{$clave}'")-> getRows();
            foreach ($consultas as $key => $arreglo) { 
                $uid = $arreglo["id_ingreso"];
                $uperfil = 8;
                $mail = $arreglo["correo"];
                $_SESSION['usuario'] = $usuario;
                $_SESSION['correo'] = $mail;
                $_SESSION['idusuario'] = $uid;
                $_SESSION['id_perfil'] = $uperfil;
                return "OK";
            }
            return "F";
        }

    } 


    /*foreach ($consultas as $key => $arreglo) { 
    }*/


}
private function _usuarioconectado($usuario,$clave) {
    $conn = $this->conec();
    $clave = base64_encode($clave); 
    //echo "SELECT * from  usuarios WHERE  usuario='{$usuario}' and  pass = '{$clave}'";

    $result = $conn->Execute("SELECT * from  usuarios WHERE  usuario='{$usuario}' and  pass = '{$clave}'");
    $recordCount = $result->recordCount();
    if($recordCount == 0) {
        return false;
    }
    $consultas= $conn->Execute("SELECT * from  usuarios WHERE  usuario='{$usuario}' and  pass = '{$clave}'")-> getRows();
    foreach ($consultas as $key => $arreglo) { 
        $uid = $arreglo["id_usuario"];
        $uperfil = $arreglo["idrol"];
        $mail = $arreglo["correo"];
        $centrocostos = $arreglo["centrocostos"];
        $_SESSION['usuario'] = $usuario;
        $_SESSION['correo'] = $mail;
    	$_SESSION['idusuario'] = $uid;
        $_SESSION['id_perfil'] = $uperfil;
        $_SESSION['centrocostos'] = $centrocostos;
        
    }


    $consultas= $conn->Execute("SELECT id_empresa from  usuariosempresas where id_usuario=".$_SESSION['idusuario'])-> getRows();
    $empresa = "";
    foreach ($consultas as $key => $arreglo) { 
        $empresa.= $arreglo["id_empresa"].",";
    }

    $_SESSION['datosempresa'] = $empresa;
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
    $conn->setCharset('utf8');


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
    $perfil = $_SESSION['id_perfil'];
    $conn = $this->conec();
    $dato=array();
    $consultas= $conn->Execute("SELECT * from menus where padre=0")-> getRows();
    foreach ($consultas as $key => $arreglo) { 
        $menu        = $arreglo["menu"];
        $id        = $arreglo["id"];
        $arrayunio=array();
        $consultasdos= $conn->Execute("select  menus.* from relmenuper inner JOIN menus on menus.id=relmenuper.id_menu and relmenuper.id_perfil=".$perfil." and menus.padre=".$id." ORDER BY menus.ordenamiento ASC")-> getRows();
        //$consultasdos= $conn->Execute("select  * fROM menus where  padre=".$id)-> getRows();
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

public function obtenerCertificadosCedula($numero){

    $where = "";
    if(isset($_SESSION['centrocostos']) && $_SESSION['centrocostos']!="" && $_SESSION['id_perfil']!=1){
       $where.="AND centrocostos.id_centro in(".$_SESSION['centrocostos'].")";
    }
    $conn = $this->conec();
    $dato=array();
    //$consultas = "SELECT contrato,nombre_empleado,cedula,fecha_ingreso,fecha_retiro,genero,centro_costos,subcentro_costos,nombrempresa,nombrecargo,salarioactual,correoelectronico FROM certificados where cedula='$numero' ".$where;
    $consultas = "SELECT certificados.* FROM certificados
    inner join centrocostos on centrocostos.centrocosto=certificados.centro_costos 
    and certificados.id_empresapres=centrocostos.id_empresapres
    inner join empresasterporales on empresasterporales.id_temporal=centrocostos.id_empresapres 
    where certificados.cedula='$numero' ".$where;
    //echo $consultas;
    $consultas= $conn->Execute($consultas)-> getRows();
    return $consultas;
}


public function selectperfilesusuario(){
    $conn = $this->conec();
    $dato=array();
    $consultas = "SELECT *,(SELECT GROUP_CONCAT(centrocostos.empresausuaria) AS names FROM centrocostos WHERE centrocostos.id_centro in(usuarios.centrocostos)) as centro FROM usuarios";
    $consultas= $conn->Execute($consultas)-> getRows();
    return $consultas;   
}

public function selectexternos(){
    $conn = $this->conec();
    $dato=array();
    $consultas = "SELECT * FROM `empledos_ingreso`";
    $consultas= $conn->Execute($consultas)-> getRows();
    return $consultas;   
}

public function listaempresasgeneral($idcentros){
    $conn = $this->conec();
    $dato=array();
    $texto ="";
    if($idcentros=="all" || $idcentros==NULL || $idcentros==""){
        return $texto;  
    } else {
        $consultas = "SELECT * FROM centrocostos where id_centro in ($idcentros)";
        //echo $consultas;
        $consultas= $conn->Execute($consultas)-> getRows();
        if(count($consultas)>10){
            $texto = "Todos";
        } else {
            for($kka=0;$kka<count($consultas); $kka++) {
                $texto.=$consultas[$kka]['empresausuaria']."<br>";
            }
        }
        
        return $texto;   
    }       
}



public function listacentros(){
    $conn = $this->conec();
    $dato=array();
    $consultas = "SELECT centrocostos.*,empresasterporales.nombretemporal FROM centrocostos INNER join empresasterporales on empresasterporales.id_temporal=centrocostos.id_empresapres order by empresausuaria";
    $consultas= $conn->Execute($consultas)-> getRows();
    return $consultas;   
}

public function activarempleado($documento){
    $conn = $this->conec();
    $dato=array();
    $consultas = "UPDATE empledos_ingreso set estado = 'A' where documento = '".$documento."'";
    $consultas= $conn->Execute($consultas)-> getRows();
    return $consultas;   
}

public function obtenerretiros($estado=""){
    $conn = $this->conec();
    $dato=array();

    $consultas = "
    select renuncias.*,certificados.correoelectronico as correoregi,certificados.fecha_ingreso as fi,certificados.genero as gene,certificados.nombre_empleado as ne,certificados.contrato,certificados.nombrecargo,centrocostos.empresausuaria,empresasterporales.nombretemporal from renuncias INNER JOIN certificados on certificados.cedula=renuncias.cedula inner JOIN centrocostos on centrocostos.centrocosto=certificados.centro_costos inner JOIN empresasterporales on empresasterporales.id_temporal=centrocostos.id_empresapres 
     where 1=1 ".$estado;
    echo $consultas;
    $consultas= $conn->Execute($consultas)-> getRows();
    return $consultas; 
}

public function obtenerProcesos($id="",$propirtario=""){
    $conn = $this->conec();
    $dato=array();
    $where  ="1=1";
    if($id!=""){
        $where.=" and id_proceso = {$id}";
    }

    if($propirtario!=""){
        $where.=" and grabador  = '{$_SESSION['usuario']}'";
    }


    $consultas = "SELECT * FROM procesos where ".$where;
    //echo $consultas;
    $consultas= $conn->Execute($consultas)-> getRows();
    return $consultas;
}

public function obtenerProcesosAccidentes($id="",$propirtario=""){
    $conn = $this->conec();
    $dato=array();
    $where  ="1=1";
    if($id!=""){
        $where.=" and id_accidente = {$id}";
    }
    if($_SESSION['id_perfil']==1 || $_SESSION['id_perfil']==6) {

    }else if($propirtario!=""){
        $where.=" and grabador  = '{$_SESSION['usuario']}'";
    }


    $consultas = "SELECT * FROM accidentes where ".$where;
    //echo $consultas;
    $consultas= $conn->Execute($consultas)-> getRows();
    return $consultas;
}


public function selectperfiles(){
    $conn = $this->conec();
    $consultas = "SELECT *,(select GROUP_CONCAT(relmenuper.id_menu) from relmenuper where relmenuper.id_perfil=perfiles.id_perfil ) as selecc FROM `perfiles`";
    //echo $consultas;
    $consultas= $conn->Execute($consultas)-> getRows();
    return $consultas;
}


public function listadocentros($empresa){
    $conn = $this->conec();
    $consultas = "select * from centrocostos where id_empresapres=$empresa";
    //echo $consultas;
    $consultas= $conn->Execute($consultas)-> getRows();
    return $consultas;
}


public function listadohorasextra(){
    $conn = $this->conec();
    $consultas = "select * from listpermisos";
    //echo $consultas;
    $consultas= $conn->Execute($consultas)-> getRows();
    return $consultas;
}

public function listadohorasextrafinal(){
    $conn = $this->conec();
    $consultas = "select * from listhorasextra";
    //echo $consultas;
    $consultas= $conn->Execute($consultas)-> getRows();
    return $consultas;
}



public function obtenercargasinca(){
    $conn = $this->conec();
    $consultas= $conn->Execute("SELECT * FROM incapacidadescargue inner JOIN centrocostos on centrocostos.id_empresapres=incapacidadescargue.compania and incapacidadescargue.codigo=centrocostos.centrocosto INNER join codigoinca on codigoinca.id=incapacidadescargue.codigoconcepto inner JOIN empresasterporales on empresasterporales.id_temporal=centrocostos.id_empresapres where  incapacidadescargue.estado !='O'")-> getRows();
    
   // $consultas = "SELECT * FROM `incapacidadescargue` where estado !='O'";
    //echo $consultas;
   // $consultas= $conn->Execute($consultas)-> getRows();
    return $consultas;
}

public function infolaborati($id){
    $conn = $this->conec();
    $consultas = "SELECT * FROM `laboratorios` where id =".$id;
    //echo $consultas;
    $consultas= $conn->Execute($consultas)-> getRows();
    return $consultas;
}

public function listadoincap(){
    $conn = $this->conec();
    $consultas = "SELECT * FROM incap";
    $consultas= $conn->Execute($consultas)-> getRows();
    return $consultas;
}

public function traeusuario($id){
    $conn = $this->conec();
    $consultas = "select * from usuarios where id_usuario=".$id;
    $consultas= $conn->Execute($consultas)-> getRows();
    return $consultas;
}

public function guardartrancripcion($id,$noincapacidad,$fechaincio,$diagnostico,$fechatrans,$fechafinal,$nodias,$notranscip,$archivouno,$archivodos,$prorroga,$diasacum){
    $conn = $this->conec();
    $consultas = "UPDATE incapacidadescargue set estado = 'T' ,noincapacidad='$noincapacidad',fechaincio='$fechaincio',diagnostico='$diagnostico',fechatrans='$fechatrans',fechafinaltra='$fechafinal',nodias='$nodias',notranscip='$notranscip',archivouno='$archivouno',archivodos='$archivodos',prorroga='$prorroga',diasacum='$diasacum' where id_registro=$id";
    //echo $consultas;
    $consultas= $conn->Execute($consultas)-> getRows();
    return $consultas;
}


public function guardarpermisosalida($fecha,$codigo,$nombre,$seccion,$desde,$hasta,$motivo,$remunerado,$cedula,$quincena){

$conn = $this->conec();
    $consultas = "INSERT INTO listpermisos (fecha,codigo,nombre,seccion,desde,hasta,motivo,remunerado,cedula,quincena)  values ('$fecha','$codigo','$nombre','$seccion','$desde','$hasta','$motivo','$remunerado','$cedula','$quincena')";
    //echo $consultas;
    $consultas= $conn->Execute($consultas)-> getRows();
    return $consultas;
}

public function guardarincap($archivo,$fecha,$cedula,$nombre,$noincapacidad,$fechainicio,$fechafinal,$diasincapacidad,$diagnostico)
{
    $conn = $this->conec();
    $consultas = "INSERT INTO incap (archivo,fecha,cedula,nombre,noincapacidad,fechainicio,fechafinal,diasincapacidad,diagnostico )  values ('$archivo','$fecha','$cedula','$nombre','$noincapacidad','$fechainicio','$fechafinal','$diasincapacidad','$diagnostico')";
    $consultas= $conn->Execute($consultas)-> getRows();
    return $consultas;
}

public function guardarhorasextra($fecha,$codigo,$nombre,$seccion,$desde,$hasta,$horas,$cedula){

    $conn = $this->conec();
        $consultas = "INSERT INTO listhorasextra (fecha,codigo,nombre,seccion,desde,hasta,horas,cedula)  values ('$fecha','$codigo','$nombre','$seccion','$desde','$hasta','$horas','$cedula')";
        //echo $consultas;
        $consultas= $conn->Execute($consultas)-> getRows();
        return $consultas;
    }

    public function guardarnuevoperfil($nombreperfil){

        $conn = $this->conec();
            $consultas = "INSERT INTO perfiles (nombreperfil)  values ('$nombreperfil')";
            //echo $consultas;
            $consultas= $conn->Execute($consultas)-> getRows();
            return $consultas;
        }
    

public function guardarcreditinca($id,$notacredito,$fechanotadci,$valornotaadci,$imagen,$otrasobserva,$digivsfisi){
    $conn = $this->conec();
    $consultas = "UPDATE incapacidadescargue set estado = 'O' ,notacredito='$notacredito',fechanotadci='$fechanotadci',valornotaadci='$valornotaadci',imagen='$imagen',otrasobserva='$otrasobserva',digivsfisi='$digivsfisi' where id_registro=$id";
    //echo $consultas;
    $consultas= $conn->Execute($consultas)-> getRows();
    return $consultas;
}

public function guardardecisioneps($id,$fechapagoeps,$valorreco,$fechaeps,$observacioneseps,$estadoeps){
    $conn = $this->conec();
    $consultas = "UPDATE incapacidadescargue set estado = 'B' ,estadoeps='$estadoeps', fechapagoeps='$fechapagoeps',valorreco='$valorreco',fechaeps='$fechaeps',observacioneseps='$observacioneseps' where id_registro=$id";
    //echo $consultas;
    $consultas= $conn->Execute($consultas)-> getRows();
    return $consultas;
}

public function guardardatabanco($id,$fechabanco,$valoringresobanco,$noreciboadci){
    $conn = $this->conec();
    $consultas = "UPDATE incapacidadescargue set estado = 'F' ,fechabanco='$fechabanco', valoringresobanco='$valoringresobanco',noreciboadci='$noreciboadci' where id_registro=$id";
    //echo $consultas;
    $consultas= $conn->Execute($consultas)-> getRows();
    return $consultas;
}

public function guardarreapertura($id){
    $conn = $this->conec();
    $consultas = "UPDATE incapacidadescargue set estado = 'C' where id_registro=$id";
    //echo $consultas;
    $consultas= $conn->Execute($consultas)-> getRows();
    return $consultas;
}

public function guardarnotageneral($id,$nota){
    $conn = $this->conec();
    $consultas = "UPDATE incapacidadescargue set descgeneral = '$nota' where id_registro=$id";
    //echo $consultas;
    $consultas= $conn->Execute($consultas)-> getRows();
    return $consultas;
}

public function guardarduplicado($id){
    $conn = $this->conec();
    $consultas = "UPDATE incapacidadescargue set duplicado = 'Si' where id_registro=$id";
    //echo $consultas;
    $consultas= $conn->Execute($consultas)-> getRows();
    return $consultas;
}


public function guardarperfiles($insert,$id){
    $conn = $this->conec();
    $insert = substr($insert, 0, -1);
    $SQL ="delete from relmenuper WHERE id_perfil=".$id;
    $conn->Execute($SQL);
    $consultas = "INSERT INTO relmenuper (id_perfil,id_menu) VALUES $insert";
    $consultas= $conn->Execute($consultas)-> getRows();
    return $consultas;
}

public function guardarcarguearchivos ($sql){
    $conn = $this->conec();
    $consultas= $conn->Execute($sql);
    return $consultas;
}

public function listaresumengeneral(){
    $conn = $this->conec();
    $consultas= $conn->Execute("SELECT * FROM incapacidadescargue inner JOIN centrocostos on centrocostos.id_empresapres=incapacidadescargue.compania and incapacidadescargue.codigo=centrocostos.centrocosto INNER join codigoinca on codigoinca.id=incapacidadescargue.codigoconcepto inner JOIN empresasterporales on empresasterporales.id_temporal=centrocostos.id_empresapres")-> getRows();
    //echo $consultas;
    return $consultas;
}


 


public function codigosinca (){
    $conn = $this->conec();
    $consultas= $conn->Execute("select * from codigoinca")-> getRows();
    return $consultas;
}

public function valdiaryguardar($documento,$clave,$nombre,$correo,$pefil,$centrocostos){
    $conn = $this->conec();
    $result = $conn->Execute("SELECT * from  usuarios WHERE  correo='{$correo}' OR  usuario = '{$documento}'");
    $recordCount = $result->recordCount();
    if($recordCount == 0) {

        $SQL ="INSERT INTO usuarios (usuario,correo,pass,nombre,idrol,centrocostos) VALUES ('{$documento}','{$correo}','{$clave}','{$nombre}',$pefil,'$centrocostos')";
        $conn->Execute($SQL);
        return true;


    } else {
        return false;
    }


    
}

public function valdiaryguardareditar($llave,$correo,$pefil,$centrocostos){
    $conn = $this->conec();

        $SQL ="UPDATE usuarios set correo='{$correo}', idrol='$pefil', centrocostos='$centrocostos' where id_usuario= ".$llave;
        $conn->Execute($SQL);
        return true;
}


public function selectmenus(){
    $conn = $this->conec();
    $consultas = "SELECT * FROM menus where padre !=0";
    //echo $consultas;
    $consultas= $conn->Execute($consultas)-> getRows();
    
    return $consultas;
}


public function obtenerProcesosGest($id="",$propirtario=""){
    $conn = $this->conec();
    $dato=array();
    $where  ="estado in ('N','E')";
    if($id!=""){
        $where.=" and id_proceso = {$id}";
    }

    if($propirtario!=""){
        $where.=" and grabador  = '{$_SESSION['usuario']}'";
    }


    $consultas = "SELECT * FROM procesos where ".$where;
    //echo $consultas;
    $consultas= $conn->Execute($consultas)-> getRows();
    return $consultas;
}


public function obtenerProcesosGestAcci($id="",$propirtario=""){
    $conn = $this->conec();
    $dato=array();
    $where  ="estado in ('N','E')";
    if($id!=""){
        $where.=" and id_accidente = {$id}";
    }
    if($_SESSION['id_perfil']==1 || $_SESSION['id_perfil']==6) {
    }else if($propirtario!=""){
        $where.=" and grabador  = '{$_SESSION['usuario']}'";
    }


    $consultas = "SELECT * FROM accidentes where ".$where;
    //echo $consultas;
    $consultas= $conn->Execute($consultas)-> getRows();
    return $consultas;
}

public function obtenerProcesosGestjur($id="",$propirtario=""){
    $conn = $this->conec();
    $dato=array();
    $where  ="estado in ('V')";
    if($id!=""){
        $where.=" and id_proceso = {$id}";
    }

    if($propirtario!=""){
        $where.=" and grabador  = '{$_SESSION['usuario']}'";
    }


    $consultas = "SELECT * FROM procesos where ".$where;
    //echo $consultas;
    $consultas= $conn->Execute($consultas)-> getRows();
    return $consultas;
}

public function obtenerCertificadosporContrato($contrato,$numero){
    $conn = $this->conec();
    $dato=array();
    $consultas = "SELECT * FROM certificados where contrato='$contrato' and cedula='$numero'";
    $consultas= $conn->Execute($consultas)-> getRows();
    return $consultas;
}

public function obtenersemimanual(){
    $conn = $this->conec();
    $dato=array();
    $consultas = "describe incapacidadescarguetemporal";
    $consultas= $conn->Execute($consultas)-> getRows();
    return $consultas;
}

public function obtenersemimanualdata($id=""){
    $conn = $this->conec();
    $dato=array();
    $where = "";

    if($id>0){
        $where =" and id_registro=".$id;
    }
    $consultas = "select * from incapacidadescarguetemporal where 1=1".$where;
    $consultas= $conn->Execute($consultas)-> getRows();
    return $consultas;
}

public function obtenerVolantes($anios,$mes,$periodo,$numero){
    $conn = $this->conec();
    $dato=array();
    $where ="";
    if (isset($_SESSION['centrocostos']) && $_SESSION['centrocostos']!="" && $_SESSION['id_perfil']!=1){
        $where.=" AND centrocostos.id_centro in (".$_SESSION['centrocostos'].")";
    }


    $consultas = "
    SELECT volantes.* from volantes
INNER join certificados on certificados.cedula=volantes.cedula 
INNER join empresasterporales on empresasterporales.id_temporal=volantes.id_empresaper 
INNER JOIN centrocostos on centrocostos.id_empresapres=empresasterporales.id_temporal $where and SUBSTRING(volantes.centro_costo,1,length(volantes.centro_costo)-2)=centrocostos.centrocosto
where volantes.anio='$anios' and volantes.mes='$mes' and volantes.periodo='$periodo' and volantes.cedula='$numero' group by volantes.concepto";


    //echo $consultas;
    /*
    $rs = $conn->execute($consultas);
    if (!$rs) {
        return;
    }
    else {
        return $rs->getRows();
    }*/
    $consultas= $conn->Execute($consultas)-> getRows();
    return $consultas;
/*
    $result = $conn->Execute($consultas);
    $result = $result->recordCount();
    echo $result;*/
    //echo $consultas;
    /*$consultas= $conn->Execute($consultas)-> getRows();
    $result = $conn->Execute('SELECT * FROM act');
    $result = $result->recordCount();
    return $consultas;*/
}

public function obteneTemporales($var=""){
    $conn = $this->conec();
    //var_dump($_SESSION);
    $where ="";
    if($_SESSION['id_perfil']!="1") {
        $where =" and centrocostos.id_centro in(".$_SESSION['centrocostos'].") ";
    }
    $consultas = "SELECT empresasterporales.* FROM empresasterporales INNER join centrocostos on centrocostos.id_empresapres=empresasterporales.id_temporal $where GROUP by 1 ";
    //echo $consultas;
    $consultas= $conn->Execute($consultas)-> getRows();
    return $consultas;
}

public function obteneTemporalesform(){
    $conn = $this->conec();
    $consultas = "SELECT * FROM empresasterporales";
    $consultas= $conn->Execute($consultas)-> getRows();
    return $consultas;
}

public function obtenercentroscostosusuarios(){
    $conn = $this->conec();
    $consultas = "SELECT centrocostos.*,empresasterporales.nombretemporal FROM centrocostos INNER join empresasterporales on empresasterporales.id_temporal=centrocostos.id_empresapres ";
    $consultas= $conn->Execute($consultas)-> getRows();
    return $consultas;
}

public function obtenerlistgridlabo(){
    $conn = $this->conec();
    $consultas = "SELECT * from laboratorios";
    $consultas= $conn->Execute($consultas)-> getRows();
    return $consultas;
}

public function guardarempresaprestadora($nombre,$descipcion){
    $conn = $this->conec();
    $consultas = "INSERT INTO empresasterporales (nombretemporal,descripcion) values ('$nombre','$descipcion')";
    $consultas= $conn->Execute($consultas)-> getRows();
    return $consultas;
}

public function guardarempresacentrocostos($nombre,$empresa,$descipcion,$codigo,$nit){
    $conn = $this->conec();
    $consultas = "INSERT INTO centrocostos (nit,centrocosto,empresausuaria,id_empresapres,descripcion) values ('$nit','$codigo','$nombre',$empresa,'$descipcion')";
    $consultas= $conn->Execute($consultas)-> getRows();
    $consultas = "update usuarios set centrocostos = (SELECT GROUP_CONCAT(centrocostos.id_centro) FROM centrocostos) where idrol in(1,2,3,4,5,6,9)";
    $consultas= $conn->Execute($consultas)-> getRows();
    
    return $consultas;
}


public function guardarexcamenesp($nombre,$recomendacion){
    $conn = $this->conec();
    $consultas = "INSERT INTO listaexamanesmedicos (nombreexamen,recomendaciones) values ('$nombre','$recomendacion')";
    //echo $consultas;
    //die();
    $consultas= $conn->Execute($consultas)-> getRows();
    
    return $consultas;
}

//////////
public function guardarinfolaboratorios($nombre,$ciudad,$direccion,$telefonos,$correos,$id){
    $conn = $this->conec();
    if($id>0)
    {
        $consultas = "UPDATE laboratorios SET nombrelaboratorio='$ciudad',ciudad='$nombre',direccion='$direccion',telefonos=$telefonos,correo='$correos' where id=".$id;
    
    } else {
        $consultas = "INSERT INTO laboratorios (nombrelaboratorio,ciudad,direccion,telefonos,correo) values ('$ciudad','$nombre','$direccion',$telefonos,'$correos')";
    }//echo $consultas;
    //die();
    $consultas= $conn->Execute($consultas)-> getRows();
    
    return $consultas;
}

public function eliminarlaboratorios($id){
    $conn = $this->conec();
  
        $consultas = "DELETE FROM  laboratorios  where id=".$id;
    
    $consultas= $conn->Execute($consultas)-> getRows();
    
    return $consultas;
}

public function obteneTemporalesUsarias($dato){
    $conn = $this->conec();
    $where ="";
    if($_SESSION['id_perfil']!="1") {
        $where =" and centrocostos.id_centro in(".$_SESSION['centrocostos'].") ";
    }
    $consultas = "select centrocostos.*,empresasterporales.nombretemporal as empresapres from centrocostos inner join empresasterporales on empresasterporales.id_temporal=centrocostos.id_empresapres $where";
    //echo $consultas;
    $consultas= $conn->Execute($consultas)-> getRows();
    return $consultas;
}




public function obtenerIngresosRete($documento,$anio){
    $conn = $this->conec();
    $dato=array();

    $where ="";
    if (isset($_SESSION['centrocostos']) && $_SESSION['centrocostos']!="" && $_SESSION['id_perfil']!=1){
        $where.=" AND certificados.centro_costos in (".$_SESSION['centrocostos'].")";
    }
    $consultas = "SELECT ingresos_retenciones.* FROM ingresos_retenciones inner JOIN certificados on certificados.cedula=ingresos_retenciones.CEDULA $where  where ingresos_retenciones.CEDULA='$documento' and ingresos_retenciones.ANIO='$anio'";
    //echo $consultas;
    $consultas= $conn->Execute($consultas)-> getRows();
    return $consultas;
}

public function obtenerIngresosReteunosiete($documento){
    $conn = $this->conec();
    $dato=array();
    $where ="";
    if (isset($_SESSION['centrocostos']) && $_SESSION['centrocostos']!="" && $_SESSION['id_perfil']!=1){
        $where.=" AND centrocostos.id_centro in (".$_SESSION['centrocostos'].")";
    }
    $consultas = "SELECT centrocostos.id_centro, ingresos_ret_2017.* 
    from centrocostos inner JOIN empresasterporales on empresasterporales.id_temporal=centrocostos.id_empresapres $where
    inner join certificados on certificados.id_empresapres=empresasterporales.id_temporal and certificados.centro_costos=centrocostos.centrocosto 
    inner join ingresos_ret_2017 on ingresos_ret_2017.CEDULA=certificados.cedula where ingresos_ret_2017.CEDULA= '$documento'";
    //echo $consultas;
    $consultas= $conn->Execute($consultas)-> getRows();
    return $consultas;
}

public function guardarRequi($id,$cargo,$edadminima,$edadmaxima,$edadindiferente,$horario,
$tipocontrato,
$strsta,
$strstagene,
$cantidad,
$ciudadlaboral,
$jornadalaboral,
$tipocargosele,
$empresaclientet,
$fechareqcargo,
$empresacliente
) 
{
    $conn = $this->conec();
    if($id>0){
        $dat=date('Y-m-d H:i:s');
       $SQL ="UPDATE req SET fechamodificacion='$dat',cargo='$cargo',edadminima='$edadminima',edadmaxima='$edadmaxima',
       edadindiferente='$edadindiferente',horario='$horario',tipocontrato='$tipocontrato',
       estado='$strsta',genero='$strstagene',cantidad='$cantidad',ciudadlaboral='$ciudadlaboral',
       jornadalaboral='$jornadalaboral',empresacliente='$empresacliente' where id=$id";
       $conn->Execute($SQL);
       return $id;
    } else {

        $campos = "cargo,edadminima,edadmaxima,edadindiferente,horario,
        tipocontrato,estado,genero,cantidad,ciudadlaboral,jornadalaboral,tipocargosele,empresaclientet,fechareqcargo,empresacliente,clientesol";
        $valores = "'$cargo','$edadminima','$edadmaxima','$edadindiferente','$horario',
        '$tipocontrato',
        '$strsta',
        '$strstagene',
        '$cantidad',
        '$ciudadlaboral',
        '$jornadalaboral',
        '$tipocargosele',
        '$empresaclientet',
        '$fechareqcargo',
        '$empresacliente',
        '".$_SESSION['usuario']."'";
        $SQL= "INSERT INTO req (".$campos.") values (".$valores.")";
        $conn->Execute($SQL);
        $lastId = $conn->insert_Id();
        return $lastId;
    }
}


public function guardarProcesoDirecto($nombre,$cedula,$numerocontacto,$fechaingreso,$correo,$cargo,$salario,$tasaarl,$jornadalaboral,$ciudadlaboral,$presentarsea,$nombre_archivo,$empresacliente,$empresaclientet,$centrocostosor,$centrosucursal,$funcionarioaut,$cargofuncionarioaut,$opbservacioncontratacion,$funcionarioautorizath,$cargofuncionarioth,$fechaautori,$firmaautoriza){
    $conn = $this->conec();

    $SQL= "INSERT INTO req (tiporeq,cantidad,cargo,ciudadlaboral,jornadalaboral,salariobasico,fechacreacion,fechareqcargo,clientesol,status,empresacliente,empresaclientet,tipo) 
    values ('CD', 1,'$cargo','$ciudadlaboral','$jornadalaboral','$salario',now(),'$fechaingreso','".$_SESSION['usuario']."','E','$empresacliente','$empresaclientet','D')";
    $conn->Execute($SQL);
    $idreq = $conn->insert_Id();
    $SQL= "INSERT INTO req_candidatos (id_requisision,nombre,cedula,telefono,correo,tasa,salariorh,direccion,presentarse,estado,hojavida,centrocostosor,centrosucursal,funcionarioaut,cargofuncionarioaut,opbservacioncontratacion,funcionarioautorizath,cargofuncionarioth,fechaautori,firmaautoriza) 
    values ($idreq,'$nombre','$cedula','$numerocontacto','$correo','$tasaarl','$salario','$jornadalaboral','$presentarsea','EM','$nombre_archivo','$centrocostosor','$centrosucursal','$funcionarioaut','$cargofuncionarioaut','$opbservacioncontratacion','$funcionarioautorizath','$cargofuncionarioth','$fechaautori','$firmaautoriza')";
    $conn->Execute($SQL);
    $idreqcan = $conn->insert_Id();
    $SQL= "INSERT INTO entrevistas (id_req,id_can) 
    values ($idreq,$idreqcan)";
    $conn->Execute($SQL);

    $consultas = "SELECT empresaclientet,cargo,clientesol  FROM req WHERE  id=".$idreq;
    $consultas= $conn->Execute($consultas)-> getRows();
    $ide = "";
    $cargo = "";
    $clientesol = "";
    for($i= 0; $i<count($consultas); $i++) {
        $ide  =$consultas[$i]['empresaclientet'];
        $cargo =$consultas[$i]['cargo'];
        $clientesol =$consultas[$i]['clientesol'];
    }

    $consultas = "SELECT nombre  FROM usuarios WHERE  usuario='".$clientesol."'";
    $consultas= $conn->Execute($consultas)-> getRows();
    $nombreem = "";
    for($i= 0; $i<count($consultas); $i++) {
        $nombreem  =$consultas[$i]['nombre'];
    }
    $nombreempresas = "";
    $consultasa = "SELECT nombretemporal FROM empresasterporales WHERE id_temporal= ".$ide;
    $consultasa= $conn->Execute($consultasa)-> getRows();
    for($i= 0; $i<count($consultasa); $i++) {
        $nombreempresas  =$nombreempresas[$i]['nombretemporal'];
    }


    $consultas = "SELECT correosselecccion FROM empresasterporales WHERE id_temporal= ".$ide;
      //echo $consultas;
      $mensaje = "
      Señor Usuario<br>
        Apreciada Área de Selección<br><br>

        Le informamos que la empresa  $nombreempresas, Usuario $nombreem, ha Solicitado Contratación Directa del candidato $nombre, para lo cual hemos asignado el proceso de selección con el consecutivo No. $idreq
        <br><br>
        Apreciado(a)  $nombreem  recuerde que puede hacer seguimiento a su solicitud, iniciando sesión en nuestra pagina web www.humantalentsas.com ingresando con su usuario y clave.
        <br><br>
        Para visualizar dar click <a href='".DIRWEB."home.php?ctr=requisicion&acc=listaCandidatos&id={$idreq}'><strong>AQUI</strong></a>
        <br><br>
        Cordialmente,<br>
        Human Talent SAS<br><br>
        Para su Seguimiento y/o Gestión";
      $consultas= $conn->Execute($consultas)-> getRows();
      for($i= 0; $i<count($consultas); $i++) {
        $correos = explode(",", $consultas[$i]['correosselecccion']);
        for($j=0; $j<count($correos); $j++){
            $consultascorr = "SELECT correo FROM usuarios WHERE id_usuario= ".$correos[$j];
            $consultasresp= $conn->Execute($consultascorr)-> getRows();
            $envio = $this->enviocorreo($consultasresp[0]['correo'], $mensaje);
        }

      }
    //$idreqcan = $conn->insert_Id();

}



public function guardarRequiCondiciones($id,
$salariobasico,
$comisiones,
$rodamiento,
$bonificacion,
$otraingreso,
$funciones
){
    $dat=date('Y-m-d H:i:s');
    $conn = $this->conec();
    $SQL ="UPDATE req SET funciones='$funciones', fechamodificacion='$dat',salariobasico='$salariobasico',comisiones='$comisiones',rodamiento='$rodamiento',bonificacion='$bonificacion',
    otraingreso='$otraingreso' where id=$id";
    $conn->Execute($SQL);
    return $id;
}



public function guardarprocesoAccidente($id,$funcionario,$cargo,$cedula,$lugartrabajo,$jefe,$fechaevento,$descripcion,$correojefe,$archivouno,$archivodos,$archivotres,$horario,$centrocostos,$empresausuaria,$correoempleado,$direccionempleado,$telefononempleado,$fechahoraacci,$tiempoprevio,$laborhabitual,$laborreal,$tipoaccidente,$muerte,$lugaracciente,$sitioindicado,$otrolugar,$tipolesion,$otrotipolesion,$parteafectada,$agenteaccidente,$mecanismo,$otromecanismo,$personasprese,$presenciantes){
    /* 
    $conn = $this->conec();
    $dat=date('Y-m-d H:i:s');
    if($id>0){
        $SQL ="UPDATE accidentes SET nombrefuncionario='$funcionario', cargo ='$cargo',lugartrabajo ='$lugartrabajo',jefeinmediato='$jefe',
         	fechaaccidente  ='$fechaaccidente',descripcion  ='$descripcion' where  id_accidente=$id";
        $conn->Execute($SQL);

    } else {
        $SQL ="INSERT INTO  accidentes (estado,nombrefuncionario,cargo,lugartrabajo,jefeinmediato,fechaaccidente,descripcion,grabador,fechagrab ) VALUES ('C','$funcionario','$cargo','$lugartrabajo','$jefe',
        '$fechaaccidente','$descripcion','".$_SESSION['usuario']."','$dat')";
        $conn->Execute($SQL);
    }*/

    $dat=date('Y-m-d H:i:s');
    $conn = $this->conec();
    $insertararchivos1  ="";
    $val1="";
    $insertararchivos2  ="";
    $val2="";
    $insertararchivos3  ="";
    $val3="";

    $updtaarchivos1  ="";
    $updtaarchivos2  ="";
    $updtaarchivos3  ="";
    if ($archivouno!=""){
        $insertararchivos1  ="archivouno,";
        $val1  ="'".$archivouno."',";
        $updtaarchivos1  ="archivouno ='".$archivouno."',";
    }

    if ($archivodos!=""){
        $insertararchivos2  ="archivodos,";
        $val2  ="'".$archivodos."',";
        $updtaarchivos2  ="archivodos ='".$archivodos."',";
    }

    if ($archivotres!=""){
        $insertararchivos3  ="archivotres,";
        $val3  ="'".$archivotres."',";
        $updtaarchivos3  ="archivores ='".$archivotres."',";
    }

    if($id>0){
        $SQL ="UPDATE accidentes SET ".$updtaarchivos1.$updtaarchivos2.$updtaarchivos3."nombrefuncionario='$funcionario', cargo ='$cargo',cedula ='$cedula',lugartrabajo ='$lugartrabajo',jefeinmediato='$jefe',coreojefe ='$correojefe',
         	fechaevento ='$fechaevento',descripcion  ='$descripcion',horario='$horario',centrocostos='$centrocostos',empresausuaria='$empresausuaria',correoempleado='$correoempleado' where id_proceso=$id";
        $conn->Execute($SQL);

    } else {
        $SQL ="INSERT INTO  accidentes (".$insertararchivos1.$insertararchivos2.$insertararchivos3."nombrefuncionario,cargo,cedula,lugartrabajo,jefeinmediato,coreojefe,fechaaccidente,descripcion,grabador,fechagrab,horario,centrocostos,empresausuaria,correoempleado,estado,direccionempleado,telefononempleado,fechahoraacci,tiempoprevio,laborhabitual,laborreal,tipoaccidente,muerte,lugaracciente,sitioindicado,otrolugar,tipolesion,otrotipolesion,parteafectada,agenteaccidente,mecanismo,otromecanismo,personasprese,presenciantes) VALUES (".$val1.$val2.$val3."'$funcionario','$cargo','$cedula','$lugartrabajo','$jefe','$correojefe',
        '$fechaevento','$descripcion','".$_SESSION['usuario']."','$dat','$horario','$centrocostos','$empresausuaria','$correoempleado','C','$direccionempleado','$telefononempleado','$fechahoraacci','$tiempoprevio','$laborhabitual','$laborreal','$tipoaccidente','$muerte','$lugaracciente','$sitioindicado','$otrolugar','$tipolesion','$otrotipolesion','$parteafectada','$agenteaccidente','$mecanismo','$otromecanismo','$personasprese','$presenciantes')";
        $conn->Execute($SQL);
        
    }

}




public function guardarproceso($id,$funcionario,$cargo,$cedula,$lugartrabajo,$jefe,$fechaevento,$descripcion,$correojefe,$archivouno,$archivodos,$archivotres,$horario,$centrocostos,$empresausuaria,$correoempleado,$testigo,$cargotestigo,$telefonotestigo,$telefonojefei) {
    $dat=date('Y-m-d H:i:s');
    $conn = $this->conec();
    $insertararchivos1  ="";
    $val1="";
    $insertararchivos2  ="";
    $val2="";
    $insertararchivos3  ="";
    $val3="";

    $updtaarchivos1  ="";
    $updtaarchivos2  ="";
    $updtaarchivos3  ="";
    if ($archivouno!=""){
        $insertararchivos1  ="archivouno,";
        $val1  ="'".$archivouno."',";
        $updtaarchivos1  ="archivouno ='".$archivouno."',";
    }

    if ($archivodos!=""){
        $insertararchivos2  ="archivodos,";
        $val2  ="'".$archivodos."',";
        $updtaarchivos2  ="archivodos ='".$archivodos."',";
    }

    if ($archivotres!=""){
        $insertararchivos3  ="archivotres,";
        $val3  ="'".$archivotres."',";
        $updtaarchivos3  ="archivores ='".$archivotres."',";
    }

    if($id>0){
        $SQL ="UPDATE procesos SET ".$updtaarchivos1.$updtaarchivos2.$updtaarchivos3."nombrefuncionario='$funcionario', cargo ='$cargo',cedula ='$cedula',lugartrabajo ='$lugartrabajo',jefeinmediato='$jefe',coreojefe ='$correojefe',telefonojefei='$telefonojefei',
         	fechaevento ='$fechaevento',descripcion  ='$descripcion',horario='$horario',centrocostos='$centrocostos',empresausuaria='$empresausuaria',correoempleado='$correoempleado',testigo= '$testigo',cargotestigo='$cargotestigo',telefonotestigo='$telefonotestigo' where id_proceso=$id";
        $conn->Execute($SQL);

    } else {
        $SQL ="INSERT INTO  procesos (".$insertararchivos1.$insertararchivos2.$insertararchivos3."nombrefuncionario,cargo,cedula,lugartrabajo,jefeinmediato,coreojefe,fechaevento,descripcion,grabador,fechagrab,horario,centrocostos,empresausuaria,correoempleado,testigo,cargotestigo,telefonotestigo,telefonojefei) VALUES (".$val1.$val2.$val3."'$funcionario','$cargo','$cedula','$lugartrabajo','$jefe','$correojefe',
        '$fechaevento','$descripcion','".$_SESSION['usuario']."','$dat','$horario','$centrocostos','$empresausuaria','$correoempleado','$testigo','$cargotestigo','$telefonotestigo','$telefonojefei')";
        $conn->Execute($SQL);
        
    }

}
public function ultimoproceso(){
    $conn = $this->conec();
    $consultas = "SELECT id_proceso FROM procesos ORDER BY id_proceso DESC LIMIT 1";
    return $consultas= $conn->Execute($consultas)-> getRows();
}

public function ultimoprocesoaccidente(){
    $conn = $this->conec();
    $consultas = "SELECT id_accidente FROM accidentes ORDER BY id_accidente DESC LIMIT 1";
    return $consultas= $conn->Execute($consultas)-> getRows();
}

public function guardarRequiResponsa($id,
$acargo,
$equipos,
$dinero,
$materiales,
$herramientas,
$documentos,
$confidencial,
$valores,
$otrosresponsabilidades){
    $conn = $this->conec();
    $dat=date('Y-m-d H:i:s');
       $SQL ="UPDATE req SET fechamodificacion='$dat', acargo='$acargo',equipos='$equipos',dinero='$dinero',materiales='$materiales',
       herramientas='$herramientas',documentos='$documentos',confidencial='$confidencial',
       valores='$valores',otrosresponsabilidades='$otrosresponsabilidades' where id=$id";
       $conn->Execute($SQL);
       return $id;

}
public function guardarRequiExper($id,
$primaria,
$secundaria,
$tecnico,
$tecnologo,
$profesional,
$otrosestudios,
$minimaexpe,
$observacionesexp,
$experienciahomolo
)
{
    $conn = $this->conec();
    $dat=date('Y-m-d H:i:s');
       $SQL ="UPDATE req SET experienciahomolo='$experienciahomolo',fechamodificacion='$dat', primaria='$primaria',secundaria='$secundaria',tecnico='$tecnico',tecnologo='$tecnologo',
       profesional='$profesional',otrosestudios='$otrosestudios',minimaexpe='$minimaexpe',
       observacionesexp='$observacionesexp' where id=$id";
       $conn->Execute($SQL);
       return $id;
}

public function guardarRequiHabilida($id,
$adaptabilidad,
$administracion,
$analisis,
$gestion,
$negociacion,
$normas,
$aprendizaje,
$flexibilidad,
$riesgo,
$innovacion,
$ambiente,
$observacion,
$resultados,
$cliente,
$comunicacion,
$tecnologica,
$planeacion,
$relaciones,
$liderazgo,
$sensibilidad,
$conflictos,
$tolerancia,
$equipo,
$habilidades)
{
    $conn = $this->conec();
    $dat=date('Y-m-d H:i:s');
       $SQL ="UPDATE req SET adaptabilidad='$adaptabilidad',fechamodificacion='$dat', 
       administracion='$administracion',analisis='$analisis',gestion='$gestion',negociacion='$negociacion',
       normas='$normas',aprendizaje='$aprendizaje',flexibilidad='$flexibilidad',
       riesgo='$riesgo',innovacion='$innovacion',ambiente='$ambiente',
       observacion='$observacion',resultados='$resultados',cliente='$cliente',
       comunicacion='$comunicacion',tecnologica='$tecnologica',planeacion='$planeacion',
       relaciones='$relaciones',liderazgo='$liderazgo',sensibilidad='$sensibilidad',
       conflictos='$conflictos',tolerancia='$tolerancia',equipo='$equipo',
       habilidades='$habilidades' where id=$id";
       $conn->Execute($SQL);
       return $id;

}

public function obteneRes($ide=0,$clientesol=""){
  //echo $ide;
    $conn = $this->conec();
    $dato=array();
    $where="";
    if ($ide != 0) {
      $where .=" and req.id= ".$ide;
    } 
    if ($clientesol != "") {
        $where .=" and req.clientesol= ".$clientesol;
    } 
    if($_SESSION['id_perfil']==1){
        $where =" "; 
    }

    $consultas = "select centrocostos.empresausuaria as nombreempresausu,empresasterporales.nombretemporal,req.*,(select count(*) from req_candidatos where id_requisision = req.id and estado ='F') as cantidadapro from req INNER join empresasterporales on empresasterporales.id_temporal=req.empresaclientet inner JOIN centrocostos on centrocostos.id_centro=req.empresacliente and centrocostos.id_empresapres=empresasterporales.id_temporal where 1=1 ".$where." ORDER BY 1 ASC";
    //echo $consultas;
    $consultas= $conn->Execute($consultas)-> getRows();
    return $consultas;
}

public function obteneMisRes($ide=0,$mis=""){
   // echo $ide."<br>";
    //echo $mis;
  //echo $ide;
    $conn = $this->conec();
    $dato=array();
    $where="";
    if ($ide != 0) {
      $where .="and id= ".$ide;
    } 
    if($mis != "") {
        $where .="and empresaclientet in(".substr($mis,0,-1).")"; 
    }
    //print_r($_SESSION);
    if($_SESSION['id_perfil']!="1"){
        $where .="and centrocostos.id_centro in(".$_SESSION['centrocostos'].")";   
    }

    //$consultas = "SELECT  empresasusuarias.nombreempresausu, empresasterporales.nombretemporal,req.*,(select count(*) from req_candidatos where id_requisision = req.id and estado ='F') as cantidadapro FROM req inner join empresasterporales on empresasterporales.id_temporal=req.empresaclientet INNER join empresasusuarias on empresasusuarias.ideempresatemporal=empresasterporales.id_temporal and req.empresacliente=empresasusuarias.id_empresausuaria where 1=1 ".$where." ORDER BY 1 ASC";
    $consultas = "select centrocostos.empresausuaria as nombreempresausu,empresasterporales.nombretemporal,req.*,(select count(*) from req_candidatos where id_requisision = req.id and estado ='F') as cantidadapro from req INNER join empresasterporales on empresasterporales.id_temporal=req.empresaclientet inner JOIN centrocostos on centrocostos.id_centro=req.empresacliente and centrocostos.id_empresapres=empresasterporales.id_temporal where 1=1 ".$where." ORDER BY req.id DESC";
    //echo $consultas;
    $consultas= $conn->Execute($consultas)-> getRows();
    return $consultas;
}


public function obteneMisRescreadas($id){
    //echo $ide;
      $conn = $this->conec();
        $usuario = $_SESSION['usuario'];
      $consultas = "SELECT * FROM req where clientesol = '{$usuario}' and  id =".$id;
      //echo $consultas;
      $consultas= $conn->Execute($consultas)-> getRows();
      return $consultas;
  }

public function obtenerInformacionreq($id){
    //echo $ide;
      $conn = $this->conec();
      $consultas = "SELECT * FROM reqlist where req_per = '{$id}'";
      //echo $consultas;
      $consultas= $conn->Execute($consultas)-> getRows();
      return $consultas;
  }

  public function obtenerInformacionreqformatos($id){
    //echo $ide;
      $conn = $this->conec();
      $consultas = "select req_candidatos.firmaautoriza,req_candidatos.centrosucursal,req_candidatos.funcionarioaut,req_candidatos.cargofuncionarioaut,req_candidatos.cargofuncionarioaut,req_candidatos.opbservacioncontratacion,req_candidatos.funcionarioautorizath,req_candidatos.cargofuncionarioth,req_candidatos.fechaautori, req_candidatos.centrocostosor,centrocostos.empresausuaria as empresausuaria, empresasterporales.nombretemporal as empreprestadora,req_candidatos.presentarse,req_candidatos.direccion, req_candidatos.tasa, req.fechareqcargo,req_candidatos.salariorh, `req`.`id` AS `id`,`req_candidatos`.`id` AS `req_per`,`empresasterporales`.`nombretemporal` AS `nombretemporal`,`req`.`cargo` AS `cargo`,`req`.`horario` AS `horario`,`req`.`ciudadlaboral` AS `ciudadlaboral`,`req`.`jornadalaboral` AS `jornadalaboral`,`req`.`salariobasico` AS `salariobasico`,`req`.`empresacliente` AS `empresacliente`,`req_candidatos`.`nombre` AS `nombre`,`req_candidatos`.`cedula` AS `cedula`,`req_candidatos`.`telefono` AS `telefono`,`req_candidatos`.`correo` AS `correo`,`req`.`fechareqcargo` AS `fechareqcargo` from ((`empresasterporales` join `req` on((`req`.`empresaclientet` = `empresasterporales`.`id_temporal`))) join `req_candidatos` on((`req_candidatos`.`id_requisision` = `req`.`id`)))  inner JOIN centrocostos on centrocostos.id_centro = req.empresacliente and centrocostos.id_empresapres=empresasterporales.id_temporal where req_candidatos.id = '{$id}'";
      //echo $consultas;
      $consultas= $conn->Execute($consultas)-> getRows();
      return $consultas;
  }

  public function listadousuariosper(){
    //echo $ide;
      $conn = $this->conec();
      $consultas = "SELECT * FROM usuarios";
      //echo $consultas;
      $consultas= $conn->Execute($consultas)-> getRows();
      return $consultas;
  }

  public function obtenernoti($tipo,$empre=""){
    //echo $ide;
      $conn = $this->conec();
      if ($empre=="SI"){
        $consultas = "SELECT * FROM empresasterporales limit 1";
      } else {
        $consultas = "SELECT * FROM notificaciones where grupo = '{$tipo}'";
      }
      
      //echo $consultas;
      $consultas= $conn->Execute($consultas)-> getRows();
      return $consultas;
  }

  

public function obtenercandidatos($ide=0,$whereex = ""){
  //echo $ide;
    $conn = $this->conec();
    $dato=array();
    $where="";
    if ($ide != 0) {
      $where .=" and req_candidatos.id_requisision= ".$ide;
    } 
    if($whereex!="")
    {
        $where .=" and ".$whereex;  
    }
    $consultas = "SELECT *,(select COUNT(*) from entrevistas where entrevistas.id_can=req_candidatos.id and entrevistas.id_req=req_candidatos.id_requisision) as conteoentre FROM req_candidatos left join entrevistas on entrevistas.id_req=req_candidatos.id_requisision and entrevistas.id_can=req_candidatos.id WHERE 1=1 ".$where;
    //echo $consultas;
    $consultas= $conn->Execute($consultas)-> getRows();
    return $consultas;
}

public function obtenerLaboratorios(){
    //echo $ide;
      $conn = $this->conec();
      $dato=array();
      $where="";
      if ($ide != 0) {
        $where .=" and id_requisision= ".$ide;
      } 
      if($whereex!="")
      {
          $where .=" and ".$whereex;  
      }
      $consultas = "SELECT * FROM laboratorios";
      //echo $consultas;
      $consultas= $conn->Execute($consultas)-> getRows();
      return $consultas;
  }

  public function obtenerexamenesmedicos(){
    //echo $ide;
      $conn = $this->conec();
      $dato=array();
      $where="";
      if ($ide != 0) {
        $where .=" and id_requisision= ".$ide;
      } 
      if($whereex!="")
      {
          $where .=" and ".$whereex;  
      }
      $consultas = "SELECT * FROM listaexamanesmedicos";
      //echo $consultas;
      $consultas= $conn->Execute($consultas)-> getRows();
      return $consultas;
  }

public function guardarCandidato($idreq,
                        $nombre,
                        $cedula,
                        $telefono,
                        $correo,
                        $direccioncan,
                        $barriocan,
                        $ciudad,
                        $idcan
                    )
{
  $conn = $this->conec();

  if($idcan>0){
    $SQL ="UPDATE  req_candidatos SET nombre = '$nombre',cedula='$cedula',telefono='$telefono',correo='$correo',
    direccioncan='$direccioncan',barriocan='$barriocan',ciudad='$ciudad' WHERE id=".$idcan ;
    $conn->Execute($SQL);

  } else {
  $SQL ="INSERT INTO req_candidatos (id_requisision,nombre,cedula,telefono,correo,direccioncan,barriocan,ciudad) VALUES ($idreq,'$nombre','$cedula','$telefono','$correo','$direccioncan','$barriocan','$ciudad')";
       $conn->Execute($SQL);
  }

}

public function actualizaEnvioPrue($usuario)
{
    $conn = $this->conec();
   $SQL ="UPDATE req_candidatos SET enviocorreo=1 WHERE id=".$usuario;
    $conn->Execute($SQL);
}

public function guardarArchivoPTecnico($nombre_archivo,$id)
{
    $conn = $this->conec();
   $SQL ="UPDATE req_candidatos SET archivoprueba='$nombre_archivo' WHERE id=".$id;
    $conn->Execute($SQL);
}

public function guardarArchivootro($nombre_archivo,$id)
{
    $conn = $this->conec();
   $SQL ="UPDATE req_candidatos SET archivootro='$nombre_archivo' WHERE id=".$id;
    $conn->Execute($SQL);
}

public function guardarArchivoHv($nombre_archivo,$id)
{
    $conn = $this->conec();
   $SQL ="UPDATE req_candidatos SET hojavida='$nombre_archivo' WHERE id=".$id;
    $conn->Execute($SQL);
}

public function ajustarlaboratorio($id,$idreq,$laboratorio,$cadena,$orden,$apertura,$examenesar,$docdocumentos,$archivohv){
    $conn = $this->conec();
    $SQL ="UPDATE req_candidatos SET hvhuman = '$archivohv', docdocumen = '$docdocumentos', examenes='$cadena',lugar='$laboratorio',ordeningreso='$orden',apertura='$apertura',examenesar='$examenesar' WHERE id=".$id;
    $conn->Execute($SQL);
}

public function notificarProcesos($id,$correojefe){
    $conn = $this->conec();

    $consultas = "SELECT * from procesos where id_proceso=".$id;
    $consultas= $conn->Execute($consultas)-> getRows();
    $nombre  ="";
    for($i= 0; $i<count($consultas); $i++) {
        $nombre = $consultas[$i]['nombrefuncionario'];
    
    }

    $consultas = "SELECT usuarios FROM notificaciones WHERE grupo= 'diciplinario'";
    $consultas= $conn->Execute($consultas)-> getRows();
    for($i= 0; $i<count($consultas); $i++) {
      $correos = explode(",", $consultas[$i]['usuarios']);
      for($j=0; $j<count($correos); $j++){
          $consultascorr = "SELECT correo FROM usuarios WHERE id_usuario= ".$correos[$j];
          $consultasresp= $conn->Execute($consultascorr)-> getRows();

          $mensaje  ="Apreciado Cliente
            <br><br>
          Le informamos que hemos recibido su solicitud para efectuar proceso disciplinario al empleado en misión ".$nombre.", y se le ha generado el consecutivo ".$id.".;  estaremos procediendo de manera inmediata a dar tramite a su solicitud.<br>
          <br><br>
          Recuerde que puede hacer seguimiento a su solicitud, para lo cual deberá iniciar sesión en nuestra pagina web www.humantalentsas.com ingresando con su usuario y clave.<br><br>
          Cualquier inquietud que tengo al respecto, la atenderemos a través de nuestro PBX 214 2011, o Celular 315 612 9899 o en los 
correos servicioalcliente@humantalentsas.com , areajuridica@humantalentsas.com.co<br><br>
          Cordialmente,
          <br><br>
          Área Jurídica<br>
          Human Talent SAS";

          $envio = $this->enviocorreo($consultasresp[0]['correo'], $mensaje);
      }

    }
    $envio = $this->enviocorreo($correojefe, $mensaje);

    $SQL ="UPDATE procesos  SET estado='N'  WHERE id_proceso=".$id;
    $conn->Execute($SQL);
    
} 
public function obtenerreqinfo($id){
    $conn = $this->conec();
    $consultas = "select * from req  WHERE id= ".$id;
    $consultas= $conn->Execute($consultas)-> getRows();
    $datos = array();
    for($i= 0; $i<count($consultas); $i++) {
      $nombreca = $consultas[$i]['cargo'];
      $tipo = $consultas[$i]['tipo'];
      return $nombreca."|".$tipo;
    }


}
public function ajustarorden($id,$idreq,$tasa,$salario,$presentarse,$direccion,$fechainicio){
    $conn = $this->conec();
    $SQL ="UPDATE req_candidatos SET estado = 'EM', tasa='$tasa',salariorh='$salario',presentarse='$presentarse',direccion='$direccion',fechainiciot ='$fechainicio' WHERE id=".$id;
    $conn->Execute($SQL);
}

public function enviarcandidatocliente($id)
{
    $conn = $this->conec();
   $SQL ="UPDATE req_candidatos SET estado='E' WHERE id=".$id;
    $conn->Execute($SQL);
}

public function altareq($id)
{
    $conn = $this->conec();
    $SQL ="UPDATE req SET status='E' WHERE id=".$id;
    $conn->Execute($SQL);
}

public function guardarEntre($sql,$idreq,$idcan){
    $conn = $this->conec();
    $sqlcaliTe = "delete from entrevistas where id_req={$idreq} and id_can={$idcan}";
    $conn->Execute($sqlcaliTe);
    $SQL =$sql;
    $conn->Execute($SQL);
}

public function cambiarperfilgene($usu,$perf){
    $conn = $this->conec();
    $sqlcaliTe = "UPDATE usuarios set idrol=$perf where id_usuario={$usu}";
    $conn->Execute($sqlcaliTe);
    $SQL =$sql;
    $conn->Execute($SQL);
}

public function cambiarclavept($perf,$usu,$per){
    $perf =base64_encode($perf);
    $conn = $this->conec();

    $tabla = "usuarios";
    $campo ="pass";
    $igual = "id_usuario";

    if($per==8){
        $tabla = "empledos_ingreso";
        $campo ="clave";
        $igual = "id_ingreso";

    }

    $sqlcaliTe = "UPDATE $tabla set $campo='{$perf}',restore =0 where $igual={$usu}";
    $conn->Execute($sqlcaliTe);
    $SQL =$sql;
    $conn->Execute($SQL);
}

public function restaurarclave($usu,$perf){
    $perf =base64_encode($perf);
    $conn = $this->conec();
    $sqlcaliTe = "UPDATE usuarios set pass='{$perf}' where id_usuario={$usu}";
    $conn->Execute($sqlcaliTe);
    $SQL =$sql;
    $conn->Execute($SQL);
}

public function eliminarusu($usu,$ext){
    $conn = $this->conec();
    $sqlcaliTe = "DELETE FROM  usuarios  where id_usuario={$usu}";

    if($ext=="S"){
        $sqlcaliTe = "DELETE FROM  empledos_ingreso  where id_ingreso={$usu}";
    }
    $conn->Execute($sqlcaliTe);

}
public function guardanotificausu($proceso,$accidentes,$retiro,$seleccion){
    $conn = $this->conec();
    $sqlcaliTe = "update notificaciones set  usuarios='$proceso' where grupo = 'diciplinario'";
    $conn->Execute($sqlcaliTe);
    $SQL =$sql;
    $conn->Execute($SQL);
    $conn = $this->conec();
    $sqlcaliTe = "update notificaciones set  usuarios='$accidentes' where grupo = 'accientes'";
    $conn->Execute($sqlcaliTe);
    $SQL =$sql;
    $conn->Execute($SQL);
    $conn = $this->conec();
    $sqlcaliTe = "update notificaciones set  usuarios='$retiro' where grupo = 'retiro'";
    $conn->Execute($sqlcaliTe);
    $SQL =$sql;
    $conn->Execute($SQL);
    $conn = $this->conec();
    $sqlcaliTe = "update empresasterporales set  correosselecccion='$seleccion'";
    $conn->Execute($sqlcaliTe);
    $SQL =$sql;
    $conn->Execute($SQL);
}

public function enviarcorreoClienteGen($idreq,$tipomen)
{   
    $labe = "Creacion de Nueva Solicitud";
    $conn = $this->conec();

    $consultas = "SELECT usuarios.correo as correo FROM `req` INNER JOIN usuarios on req.clientesol = usuarios.usuario and req.id=".$idreq;
    $consultas= $conn->Execute($consultas)-> getRows();
    $correo = "";
    for($i= 0; $i<count($consultas); $i++) {
        $correo  =$consultas[$i]['correo'];
    }
    $mesaje ="";
    switch ($tipomen) {
        case "NUEVOCANDIDATO":
            $mesaje = "Se a enviado un candidato para su requision {$idreq} <br><br>
            Para visualizar de click <a href='".DIRWEB."home.php?ctr=requisicion&acc=verreqcan&id={$idreq}'><strong>AQUI</strong></a><br><br>
            Recuerde que para que el click sea valedero debe usted tener la sesion iniciada en el sistema <br><br>";


            $consultas = "SELECT * FROM req WHERE id= ".$idreq;
            $consultas = $conn->Execute($consultas)-> getRows();
            $carfo = "";
            for($i= 0; $i<count($consultas); $i++) {
                $carfo = $consultas[0]['cargo'];
            }
            $labe ="Registro Candidato";
            /*
            $consultas = "SELECT correosselecccion FROM empresasterporales WHERE id_temporal= ".$ide;
            //echo $consultas;
            $mensaje = "Se a creado  una nueva requisision con el identificador {$req} Para su gestion de candidatos<br><br>
            Para visualizar de click <a href='".DIRWEB."home.php?ctr=requisicion&acc=listaCandidatos&id={$req}'><strong>AQUI</strong></a><br><br>
            Recuerde que para que el click sea valedero debe usted tener la sesion iniciada en el sistema <br><br>";*/
            $mesaje = "Apreciado Cliente<br><br>
            Le informamos que para su requerimiento para el cargo ".$carfo.",se ha sido enviado un candidato para su gestion.
            <br>
            Recuerde que puede hacer seguimiento a su solicitud, para lo cual deberá iniciar sesión en nuestra pagina web  www.humantalentsas.com ingresando con su usuario y clave. 
            <br>
            Para visualizar dar  click <a href='".DIRWEB."home.php?ctr=requisicion&acc=verreqcan&id={$idreq}'>Aqui</a>
            <br>
            <br>
            Cualquier inquietud que tengo al respecto, la atenderemos a traves de nuestro PBX 214 2011, o Celular 315 612 9899 o en los correos seleccion@humantalentsas.com, analistaseleccion@humantalentsas.com . 
            <br>
            <bR>
            Cordialmente,
            <br><br>
            Área de Selección<br>
            Human Talent SAS";
            break;
        case "NUEVAREQ":

            $consultas = "SELECT * FROM req WHERE id= ".$idreq;
            $consultas = $conn->Execute($consultas)-> getRows();
            $carfo = "";
            for($i= 0; $i<count($consultas); $i++) {
                $carfo = $consultas[0]['cargo'];
            }
            /*
            $consultas = "SELECT correosselecccion FROM empresasterporales WHERE id_temporal= ".$ide;
            //echo $consultas;
            $mensaje = "Se a creado  una nueva requisision con el identificador {$req} Para su gestion de candidatos<br><br>
            Para visualizar de click <a href='".DIRWEB."home.php?ctr=requisicion&acc=listaCandidatos&id={$req}'><strong>AQUI</strong></a><br><br>
            Recuerde que para que el click sea valedero debe usted tener la sesion iniciada en el sistema <br><br>";*/
            $mesaje = "Apreciado Cliente<br><br>
            Le informamos que su requerimiento para el cargo ".$carfo.", ha sido recibido y se le ha generado el consecutivo ".$idreq.".;  estaremos procediendo de manera inmediata a dar tramite a su solicitud.
            <br>
            Recuerde que puede hacer seguimiento a su solicitud, para lo cual deberá iniciar sesión en nuestra pagina web  www.humantalentsas.com ingresando con su usuario y clave. 
            <br>
            Para visualizar dar  click <a href='".DIRWEB."home.php?ctr=requisicion&acc=verreqcan&id={$idreq}'>Aqui</a>
            <br>
            <br>
            Cualquier inquietud que tengo al respecto, la atenderemos a traves de nuestro PBX 214 2011, o Celular 315 612 9899 o en los correos seleccion@humantalentsas.com, analistaseleccion@humantalentsas.com . 
            <br>
            <bR>
            Cordialmente,
            <br><br>
            Área de Selección<br>
            Human Talent SAS";
            break;
        case "NUEVOCANDIDATO2":
            $mesaje =  "i es igual a 2";
            break;
    }

    $envio = $this->enviocorreo($correo, $mesaje, $labe);
}

public function actualizarformatos($idper,$idreq,$orden,$documentos,$hv)
{
    $this->correopsico($idreq,"APROBADO");
    $conn = $this->conec();
    $SQL ="UPDATE req_candidatos SET estado='A', ordeningreso='$orden',docdocumen='$documentos',hvhuman='$hv' WHERE id=".$idper;
    $conn->Execute($SQL);


}

public function correopsico($id_req,$tipomen) {
    $conn = $this->conec();
    $consultas = "SELECT empresaclientet,clientesol,cargo  FROM req WHERE  id=".$id_req;
    $consultas= $conn->Execute($consultas)-> getRows();
    $clientesol = "";
    $ide = "";
    $cargo = "";
    for($i= 0; $i<count($consultas); $i++) {
        $ide  =$consultas[$i]['empresaclientet'];
        $clientesol = $consultas[$i]['clientesol'];
        $cargo =  $consultas[$i]['cargo'];
    }

    $consultas = "SELECT nombre,correo  FROM usuarios WHERE  usuario='".$clientesol."'";
    $consultas= $conn->Execute($consultas)-> getRows();
    $nombreclie = "";
    $correocli = "";
    for($i= 0; $i<count($consultas); $i++) {
        $nombreclie  =$consultas[$i]['nombre'];
        $correocli  =$consultas[$i]['correo'];
    }
    $mensaje ="";
    switch ($tipomen) {
        case "APROBADO":
            $mensaje = "Buen Dia
            <br>
            Le informamos que el cliente ".$nombreclie." ha aprobado el candidato con el  consecutivo ".$id_req.",  para el cargo ".$cargo."<br><br>; 
            Cordialmente,<br>Human Talent SAS
            ";

            $mensajedos = "Apreciado Cliente ".$nombreclie."<br>
            <br>
            Le informamos que Usted ha aprobado el candidato con el  consecutivo ".$id_req.",  para el cargo ".$cargo.",.; por lo anterior le agradecemos ingresar a nuestro pagina web, www.humantalentsas.com y diligenciar la información correspondiente a las condiciones de contratación para que el sistema  genere la respectiva Orden de Ingreso del Candidato.
            <br><br>
            Recuerde que puede hacer seguimiento a su solicitud, para lo cual deberá iniciar sesión en nuestra pagina web  www.humantalentsas.com ingresando con su usuario y clave. 
            <br>
            Cualquier inquietud que tengo al respecto, con gusto la atenderemos a traves de nuestro PBX 214 2011 , Celular 315 612 9899 o en los correos seleccion@humantalentsas.com, analistaseleccion@humantalentsas.com . 
            <br><br>
            <br>
            Para Completar Orden puede dar clic <a href='".DIRWEB."home.php?ctr=requisicion&acc=verreqcan&id={$id_req}'>Aqui</a>
            <br>
            Cordialmente,
            <br>
            Área de Selección
            <br>Human Talent SAS
            ";
            $this->enviocorreo($correocli, $mensajedos, "Aprobacion Candidato");

            break;
        case "NUEVAREQ":
            $mensaje = "Se creo su Requisicion con el #{$idreq} <br>
            Para visualizar de click <a href='".DIRWEB."home.php?ctr=requisicion&acc=verreqcan&id={$id_req}'><strong>AQUI</strong></a><br><br>
            Recuerde que para que el click sea valedero debe usted tener la sesion iniciada en el sistema <br><br>";
            break;
        case "NUEVOCANDIDATO2":
            $mensaje =  "i es igual a 2";
            break;
    }
    $consultas = "SELECT correosselecccion FROM empresasterporales WHERE id_temporal= ".$ide;
      $consultas= $conn->Execute($consultas)-> getRows();
      for($i= 0; $i<count($consultas); $i++) {
        $correos = explode(",", $consultas[$i]['correosselecccion']);
        for($j=0; $j<count($correos); $j++){
            $consultascorr = "SELECT correo FROM usuarios WHERE id_usuario= ".$correos[$j];
            $consultasresp= $conn->Execute($consultascorr)-> getRows();
            $envio = $this->enviocorreo($consultasresp[0]['correo'], $mensaje);
        }

      }

}


public function notificarProcesosAccidente($id){
    $conn = $this->conec();
    $consultas = "SELECT empresausuaria,grabador,nombrefuncionario FROM accidentes WHERE id_accidente=".$id;
    $consultas= $conn->Execute($consultas)-> getRows();
    $nombreempresaa = "";
    $usuariograba = "";
    $nombrefuncionario = "";
    for($i= 0; $i<count($consultas); $i++) {
        $nombreempresaa = $consultas[$i]['empresausuaria'];
        $usuariograba = $consultas[$i]['grabador'];
        $nombrefuncionario =  $consultas[$i]['nombrefuncionario'];
    }

    $consultas = "SELECT nombre FROM usuarios where usuario='$usuariograba'";
    $consultas= $conn->Execute($consultas)-> getRows();
    $nombrereporte = "";
    for($i= 0; $i<count($consultas); $i++) {
        $nombrereporte = $consultas[$i]['nombre'];
    }
    $consultas = "SELECT usuarios FROM notificaciones WHERE grupo= 'accientes'";
    $consultas= $conn->Execute($consultas)-> getRows();

    


    
    for($i= 0; $i<count($consultas); $i++) {
      $correos = explode(",", $consultas[$i]['usuarios']);
      for($j=0; $j<count($correos); $j++){
          $consultascorr = "SELECT correo FROM usuarios WHERE id_usuario= ".$correos[$j];
          $consultasresp= $conn->Execute($consultascorr)-> getRows();

          $mensaje  ="Señor Usuario<br>
          Apreciada Área de Salud y Seguridad en el Trabajo 
          <br><br>
          Le informamos que la empresa $nombreempresaa, Usuario $nombrereporte, ha reportado un accidente de trabajo de $nombrefuncionario, para lo cual hemos asignado el consecutivo No. $id
          <br><br>
          Apreciado(a)  $nombrereporte  recuerde que puede hacer seguimiento a su solicitud, iniciando sesión en nuestra pagina web www.humantalentsas.com ingresando con su usuario y clave.
          <br><br>
          Para visualizar dar click <a href='https://humantalentsas.com/human/home.php?ctr=accidentes&acc=listaaccidentes'>AQUI</a> 
          <br><br>
          Cordialmente,<br>
          Human Talent SAS
          <br><br>
          Para su Seguimiento y/o Gestión";

          $envio = $this->enviocorreo($consultasresp[0]['correo'], $mensaje);
      }

    }
    $SQL ="UPDATE accidentes  SET estado='N'  WHERE id_accidente=".$id;
    $conn->Execute($SQL);
} 


public function guardarretiro($archivouno,$archivodos,$retiro,$fecharetiro,$funcionario,$cedula,$observaciones){
    $conn = $this->conec();
    $consultas = "SELECT usuarios FROM notificaciones WHERE grupo= 'retiro'";
    $consultas= $conn->Execute($consultas)-> getRows();
    for($i= 0; $i<count($consultas); $i++) {
      $correos = explode(",", $consultas[$i]['usuarios']);
      for($j=0; $j<count($correos); $j++){
          $consultascorr = "SELECT correo FROM usuarios WHERE id_usuario= ".$correos[$j];
          $consultasresp= $conn->Execute($consultascorr)-> getRows();

          $mensaje  ="Apreciado Cliente<br><br>

          Le informamos que hemos recibido el reporte de retiro del empleado en misión ".$funcionario.";  estaremos procediendo de manera inmediata a dar el tramite respectivo.
          <br><br>
          Recuerde que puede hacer seguimiento a su solicitud, para lo cual deberá iniciar sesión en nuestra pagina web  www.humantalentsas.com ingresando con su usuario y clave. 
          <br><br>
          Cualquier inquietud que tengo al respecto, la atenderemos a traves de nuestro PBX 214 2011, o Celular 318 335 2194 - 315 612 9899 o en los correos servicioalcliente@humantalentsas.com, nomina@humantalentsas.com, contabilidad@humantalentsas.com  
          <br><br>
          Cordialmente,
          <br><br>
          Área Servicio al Cliente 
          <br>Human Talent SAS";

          $envio = $this->enviocorreo($consultasresp[0]['correo'], $mensaje);
      }

    }
    $SQL ="INSERT INTO renuncias (renuncia,paz,motivo,fecharetiro,nombre,cedula,observaciones) values('$archivouno','$archivodos','$retiro','$fecharetiro','$funcionario','$cedula','$observaciones')";
    $conn->Execute($SQL);
} 




public function guardarProcesoFinal($id,$nombre_archivo,$efecto,$correo){
    $conn = $this->conec();
    $nombre="";
    $consultas = "SELECT * from procesos where id_proceso=".$id;
    $consultas= $conn->Execute($consultas)-> getRows();
    $nombre  ="";
    for($i= 0; $i<count($consultas); $i++) {
        $nombre = $consultas[$i]['nombrefuncionario'];
    
    }
    $mensaje ="Apreciado Empleado ".$nombre."<br><br>

    En relación con el proceso disciplinario que se le adelanta a Usted y una vez surtido el debido proceso de acuerdo con lo establecido por la Compañía, a continuación le informamos la decisión tomada.
    <br>
    Cualquier inquietud que tengo al respecto, la atenderemos a través de nuestro PBX 214 2011, o Celular 315 612 9899 o en los correos servicioalcliente@humantalentsas.com  , areajuridica@humantalentsas.com.co 
    <br>
    Cordialmente,
    <br><br>
    Área Jurídica  - 
    Human Talent SAS";
    $envio = $this->enviocorreo($correo, $mensaje);


    $SQL ="UPDATE procesos  SET conclucionfinal = '$efecto',archivofinal='$nombre_archivo', estado='T' WHERE id_proceso=".$id;
    $conn->Execute($SQL);

}

public function enviarcitacionproceso($id,$correo,$fechacitacion,$tipo,$justificacion,$archivo,$horacita,$sedelugar,$modalidadcita){
    $conn = $this->conec();
    $nombre="";
    $consultas = "SELECT * from procesos where id_proceso=".$id;
    $consultas= $conn->Execute($consultas)-> getRows();
    $nombre  ="";
    for($i= 0; $i<count($consultas); $i++) {
        $nombre = $consultas[$i]['nombrefuncionario'];
    
    }
    $titulo="Citacion Proceso"; 
    if($modalidadcita=="Videollamada"){
        $dato ="en la dirección ".$sedelugar;
    } else {
        $dato ="través de Video Conferencia por ".$sedelugar;
    }
    $mensaje = "Apreciado Empleado ".$nombre."<br><br>
    
    Le informamos que se le ha iniciado un proceso disciplinario, sobre un evento reportado por la Empresa Usuaria donde presta sus servicios, 
    por lo cual usted deberá presentarse ".$dato.", para dar las explicaciones respectivas 
    <br>
    Cualquier inquietud que tengo al respecto, la atenderemos a traves de nuestro PBX 214 2011, o Celular 315 612 9899 o en los correos servicioalcliente@humantalentsas.com  , areajuridica@humantalentsas.com.co 
    <br>
    Cordialmente,
    <br><br>
    Área Jurídica  - 
    Human Talent SAS";
    $envio = $this->enviarcorreoadjuntos($correo,$archivo,$mensaje,$titulo);
    $fechahora = $fechacitacion. " ".$horacita;
    $SQL ="UPDATE procesos  SET estado='E',fechacita='$fechahora',tipoproceso ='$tipo',justificacion='$justificacion',archivoenviado='$archivo',sedelugar='$sedelugar',modalidadcita='$modalidadcita'  WHERE id_proceso=".$id;
    $conn->Execute($SQL);

}

public function guardarfinretiro($id,$correo,$archivo){
    $conn = $this->conec();
    $titulo="Documento Retiro";
    $nombre="";
    $consultas = "SELECT * from renuncias where id_renuncia=".$id;
    $consultas= $conn->Execute($consultas)-> getRows();
    $nombre  ="";
    for($i= 0; $i<count($consultas); $i++) {
        $nombre = $consultas[$i]['nombre'];
    
    } 
    $mensaje = "Apreciado Señor (a) ".$nombre."<br><br>
    En relación con el contrato de obra o labor que tiene suscrito con nuestra Empresa, en la comunicación anexa le estamos informando la terminación de este.
    <br><br>
    Cualquier inquietud que tengo al respecto, la atenderemos a través de nuestro PBX 214 2011, o Celular 318 335 2194 - 315 612 9899 o en los correos servicioalcliente@humantalentsas.com, 
    <br><br>
    Cordialmente,
    <br><br>
    Área Servicio al Cliente 
    <br>Human Talent SAS";
    //var_dump(explode(";",$correo));
    $explo =explode(";",$correo);
    for($i=0; $i<=count($explo);$i++)
    {
        if($explo[$i]!=""){
            $envio = $this->enviarcorreoadjuntos($explo[$i],$archivo,$mensaje,$titulo);
        }    
    }
    
    $SQL ="UPDATE renuncias  SET estado='T',correo='$correo',archivo ='$archivo' WHERE id_renuncia=".$id;
    $conn->Execute($SQL);

}

public function enviarsolicitudexplicacion($id,$correo,$fechacitacion,$tipo,$razonllamado,$archivo){
    $conn = $this->conec();
    $nombre="";
    $consultas = "SELECT * from procesos where id_proceso=".$id;
    $consultas= $conn->Execute($consultas)-> getRows();
    $nombre  ="";
    for($i= 0; $i<count($consultas); $i++) {
        $nombre = $consultas[$i]['nombrefuncionario'];
    
    }
    $mensaje = "Apreciado Empleado ".$nombre."<br><br>
    Le informamos que se le ha iniciado un proceso disciplinario, sobre un evento reportado por la Empresa Usuaria donde presta sus servicios, para que Usted pueda dar las respectivas explicaciones sobre dicho evento, Usted deberá ingresar al siguiente <a href='".DIRWEB."registro.php?id=$id' target='_black'>LINK</a>, y enviar dichas explicaciones a mas tardar el día ".$fechacitacion."<br> 
    
    Cualquier inquietud que tengo al respecto, la atenderemos a través de nuestro PBX 214 2011, o Celular 315 612 9899 o en los correos servicioalcliente@humantalentsas.com  , areajuridica@humantalentsas.com.co 
    <br>
    Cordialmente,
    <br><br>
    Área Jurídica  - 
    Human Talent SAS";
    $envio = $this->enviocorreo($correo, $mensaje);
    $SQL ="UPDATE procesos  SET estado='E',fechacita='$fechacitacion',tipoproceso ='$tipo',razon='$razonllamado',archivo='$archivo'  WHERE id_proceso=".$id;
    $conn->Execute($SQL);
}

public function guardarrespuestaempleado($id,$aclaracion,$archivo){
    $conn = $this->conec();
    $SQL ="UPDATE procesos  SET  estado='V',aclaracionempleado='$aclaracion',archivoacaraempleado ='$archivo' WHERE id_proceso=".$id;
    $conn->Execute($SQL);
}



public function enviarcitacionprocesoAcci($id,$nombre_archivo){
    $conn = $this->conec();
    $SQL ="UPDATE accidentes  SET estado='E',archivofurat='$nombre_archivo'  WHERE id_accidente=".$id;
    $conn->Execute($SQL);

}


public function enviarconclucionproceso($id,$entrevista,$archivodos){
    $conn = $this->conec();
    $SQL ="UPDATE procesos  SET estado='V',conclucionentre='$entrevista',archivoconclusionproceso='$archivodos'  WHERE id_proceso=".$id;
    $conn->Execute($SQL);
}

public function enviarconclucionprocesoAcci($id,$diasinca,$obserini,$obser,$observaciones,$observacionesmedicas,$fechainireco,$fechafinalreco){
    $conn = $this->conec();
    $SQL ="UPDATE accidentes  SET estado='T',diasincapacidad='$diasinca',fechainicioreco='$obserini',fecharecom='$obser',recomendaciones='$observaciones',recomendacionesmedicas='$observacionesmedicas',fechainimedicas='$fechainireco',fechafinmedicas='$fechafinalreco'  WHERE id_accidente=".$id;
    $conn->Execute($SQL);
}


public function citarcandidato($id_per,$id_req,$fechahora,$lugar)
{
    $conn = $this->conec();
    $consultas = "SELECT correo,nombre  FROM req_candidatos WHERE  id=".$id_per;

    $consultas= $conn->Execute($consultas)-> getRows();
    $correo = "";
    $nombre = "";
    for($i= 0; $i<count($consultas); $i++) {
        $correo  =$consultas[$i]['correo'];
        $nombre  =$consultas[$i]['nombre'];
    }

    $consultas = "SELECT empresaclientet,cargo,clientesol  FROM req WHERE  id=".$id_req;
    $consultas= $conn->Execute($consultas)-> getRows();
    $ide = "";
    $cargo = "";
    $clientesol = "";
    for($i= 0; $i<count($consultas); $i++) {
        $ide  =$consultas[$i]['empresaclientet'];
        $cargo  =$consultas[$i]['cargo'];
        $clientesol  =$consultas[$i]['clientesol'];
    }

    $consultas = "SELECT nombre  FROM usuarios WHERE  usuario='".$clientesol."'";
    $consultas= $conn->Execute($consultas)-> getRows();
    $nombresol = "";
    for($i= 0; $i<count($consultas); $i++) {
        $nombresol  =$consultas[$i]['nombre'];
    }
    $mensaje = "
    Apreciado ".$nombre."
    <br><br>
    Le informamos que dentro del proceso de selección para el cargo ".$cargo.",  Usted ha sido citado para el día ".$fechahora.",  en las instalaciones de la  empresa  ".$lugar." , por favor presentar a XXXXX nombre de la persona XXXXXXXX, 
    <br>
    Cualquier inquietud que tengo al respecto, con gusto la atenderemos a traves de nuestro PBX 214 2011 , Celular 315 612 9899 o en los correos seleccion@humantalentsas.com, analistaseleccion@humantalentsas.com . 
    <br><br>
    Cordialmente,
    <br><br>
    Área de Selección<br>
    Human Talent SAS";
    $envio = $this->enviocorreo($correo, $mensaje,"Citacion");
    $consultas = "SELECT correosselecccion FROM empresasterporales WHERE id_temporal= ".$ide;
      //echo $consultas;
      $mensaje = "Apreciado Cliente ".$nombresol."
        <br><br>
      Le informamos que dentro del proceso de selección para el cargo ".$cargo.", se ha citado al candidato ".$nombre.",  según el consecutivo ".$id_req.", para el día ".$fechahora.", en lugar ".$lugar.",  según sus indicaciones .
      <br>
      Recuerde que puede hacer seguimiento a su solicitud, para lo cual deberá iniciar sesión en nuestra pagina web  www.humantalentsas.com ingresando con su usuario y clave. 
      <br>
      Para visualizar dar  click <a href='".DIRWEB."home.php?ctr=requisicion&acc=listaCandidatos&id={$id_req}'><strong>AQUI</strong></a>
      <br>
      Cualquier inquietud que tengo al respecto, con gusto la atenderemos a través de nuestro PBX 214 2011 , Celular 315 612 9899 o en los correos seleccion@humantalentsas.com, analistaseleccion@humantalentsas.com . 
      <br><br>
      Cordialmente,
      <br><br>
      Área de Selección<br>
      Human Talent SAS";
      $consultas= $conn->Execute($consultas)-> getRows();
      for($i= 0; $i<count($consultas); $i++) {
        $correos = explode(",", $consultas[$i]['correosselecccion']);
        for($j=0; $j<count($correos); $j++){
            $consultascorr = "SELECT correo FROM usuarios WHERE id_usuario= ".$correos[$j];
            $consultasresp= $conn->Execute($consultascorr)-> getRows();
            $envio = $this->enviocorreo($consultasresp[0]['correo'], $mensaje,"Informacion sobre Citacion");
        }

      }
    $SQL ="UPDATE req_candidatos SET estado='P', fechacita='$fechahora',lugarcita ='$lugar' WHERE id=".$id_per;
    $conn->Execute($SQL);
    


}

public function conclucioncitacitacionc($id_per,$id_req,$conclu)
{
    $conn = $this->conec();
    $SQL ="UPDATE req_candidatos SET  conclusionentrevistagen='$conclu' WHERE id=".$id_per;
    $conn->Execute($SQL);
}

public function archivosatrasformar($idper,$idreq){

    $conn = $this->conec();
    $consultas = "SELECT correo,ordeningreso,hvhuman,docdocumen  FROM req_candidatos WHERE  id=".$idper;
    $consultas= $conn->Execute($consultas)-> getRows();
    $correo = "";
    $ordeningreso = "";
    $docdocumen = "";
    $hvhuman = "";
    for($i= 0; $i<count($consultas); $i++) {
        $correo  =$consultas[$i]['correo'];
        $ordeningreso  =$consultas[$i]['ordeningreso'];
        $hvhuman  = $consultas[$i]['hvhuman'];
        $docdocumen  = $consultas[$i]['docdocumen'];
    }
    return array(
        "ordeningreso"=>$ordeningreso,
        "docdocumen"=>$docdocumen,
        "hvhuman"=>$hvhuman,
        "examen"=>"examen".$idper.$idreq.".docx",
        "apertura"=>"apertura".$idper.$idreq.".docx"
    );
}

public function enviardocumentacion($idper,$idreq){

    $conn = $this->conec();
    $consultas = "SELECT  req_candidatos.hvhuman, req_candidatos.docdocumen,req_candidatos.lugar,req.cargo,req_candidatos.correo,req_candidatos.ordeningreso,req_candidatos.apertura,req_candidatos.examenesar,req_candidatos.nombre  FROM req_candidatos inner join req on req.id = req_candidatos.id_requisision WHERE  req_candidatos.id=".$idper;
    $consultas= $conn->Execute($consultas)-> getRows();
    $correo = "";
    $nombre ="";
    $cargo ="";
    //$ordeningreso = "archivosgenerales/";
    $docdocumen = "archivosgenerales/";
    $hvhuman = "archivosgenerales/";
    $archivoaper = "archivosgenerales/";
    $archivoexa =  "archivosgenerales/";
    for($i= 0; $i<count($consultas); $i++) {
        $correo  =$consultas[$i]['correo'];
        $correo  =$consultas[$i]['correo'];
        //$ordeningreso  =$consultas[$i]['ordeningreso'];
        $archivoaper.=$consultas[$i]['apertura'];
        $hvhuman.=$consultas[$i]['hvhuman'];
        $docdocumen.=$consultas[$i]['docdocumen'];
        if($consultas[$i]['lugar']=="LP"){
            $archivoexa= ""; 
        } else {
            $archivoexa.= $consultas[$i]['examenesar'];
            //echo $consultas[$i]['lugar']."--".$consultas[$i]['examenesar']."----".$consultas[$i]['nombre'];
            $this->enviarcorreocentromedico($consultas[$i]['lugar'],$consultas[$i]['examenesar'],$consultas[$i]['nombre']);
        }
        $nombre.= $consultas[$i]['nombre'];
        $cargo.= $consultas[$i]['cargo'];
    }
    $titulo2 = "Documentacion de Contratacion";
    $cuerpo2 = "Apreciado ".$nombre."<br><br>

    Dando continuidad al proceso de contratación para el cargo ".$cargo." , le estamos enviado los formatos que Usted debe diligenciar y la documentación que debe reunir y que es requerida para dar tramite a la contracción, tanto los formatos debidamente diligenciados como la documentación solicitada puede ser entregada en nuestra  oficina o remitirla  a los correos seleccion@humantalentsas.com, analistaseleccion@humantalentsas.com 
    <br><br>
    Anexamos la orden de exámenes de ingreso,  para que Usted se realice dichos exámenes en el Laboratorio Clínico relacionado en dicha comunicación 
    <br><br>
    Asimismo le estamos enviando la carta de autorización para la apertura de su cuenta en Bancolombia , donde se le efectuara el abono de su nomina. 
    <br><br>
    Cualquier inquietud que tengo al respecto, con gusto la atenderemos a través de nuestro PBX 214 2011 , Celular 315 612 9899 o en los correos seleccion@humantalentsas.com, analistaseleccion@humantalentsas.com . 
    <br><br>
    Cordialmente,
    <br><br>
    Área de Selección<br>
    Human Talent SAS
    ";
    $maildos = new PHPMailer();
    $maildos->IsSMTP();
    $maildos->SMTPAuth = true;
    $maildos->SMTPSecure = "ssl"; 
    $maildos->Host = Host; // A RELLENAR. Aquí pondremos el SMTP a utilizar. Por ej. mail.midominio.com
    $maildos->Username = Username; // A RELLENAR. Email de la cuenta de correo. ej.info@midominio.com La cuenta de correo debe ser creada previamente. 
    $maildos->Password = Password; // A RELLENAR. Aqui pondremos la contraseña de la cuenta de correo
    $maildos->Port = Port; // Puerto de conexión al servidor de envio. 
    $maildos->SetFrom(correocor, mensajecorr);
    /*$maildos->Host = "smtp.zoho.com"; // A RELLENAR. Aquí pondremos el SMTP a utilizar. Por ej. mail.midominio.com
    $maildos->Username = "info@formalsi.com"; // A RELLENAR. Email de la cuenta de correo. ej.info@midominio.com La cuenta de correo debe ser creada previamente. 
    $maildos->Password = "2019FormalSiMarzo*"; // A RELLENAR. Aqui pondremos la contraseña de la cuenta de correo
    $maildos->Port = 465; // Puerto de conexión al servidor de envio. 
    $maildos->SetFrom('info@formalsi.com', 'Humantalentsas');*/
    $maildos->AddAddress($correo, "Usuario");
    //$maildos->AddAttachment($ordeningreso,"ordeningreso.docx");
    $maildos->AddAttachment($hvhuman,"hojavidahuman.docx");
    $maildos->AddAttachment($docdocumen,"documentacion.docx");
    if($archivoexa!=""){
        $maildos->AddAttachment($archivoexa,"ordenexamenes.pdf");
    }
    $maildos->AddAttachment($archivoaper,"aperturacuenta.pdf");
    $maildos->Subject = utf8_decode($titulo2); // Este es el titulo del email. 
    $maildos->MsgHTML(utf8_decode($cuerpo2));
    $maildos->Send();

    $SQL ="UPDATE req_candidatos SET estado='F' WHERE id=".$idper;
    $conn->Execute($SQL);

}

public function enviarcorreocentromedico($id,$archivoexa,$nombrepersona){
    $conn = $this->conec();
    $consultas = "SELECT * from  laboratorios where id=".$id;
    //echo $consultas;
    $consultas= $conn->Execute($consultas)-> getRows();
    //var_dump($consultas);
    $correolaboratorio = $consultas[0]['correo'];
    if($correolaboratorio!="") {
        $datosa = explode("|", $correolaboratorio);
        for($i=0;$i<count($datosa);$i++) {
            if($datosa[$i]!=""){
                $titulo="Envio Colaborador Para Examenes";
                $mensaje="Apreciados señores Laboratorio Clinico:<br><br>
                Para su conocimiento y gestion respectiva, en el archivo anexo encontraran la autorización correspondiente para lque le sean realizado los examenes medicos a a nuestro colaborador  $nombrepersona<br><br>Cualquier inquietud que tengo al respecto, la atenderemos a traves de nuestro PBX 214 2011, o Celular 315 612 9899 o en los correos seleccion@humantalentsas.com, analistaseleccion@humantalentsas.com, servicioalcliente@humantalentsas.com
                <br><br>
                Cordialmente,
                <br><br>
                Área Selección de Personal <br>
                Human Talent SAS
                ";
                $this->enviarcorreoadjuntos($datosa[$i],$archivoexa,$mensaje,$titulo);
            }
        }
    }




}

public function enviarcorreoadjuntos($correo,$documento,$mensaje,$titulo){
    $maildos = new PHPMailer();
    $maildos->IsSMTP();
    $maildos->SMTPAuth = true;
    $maildos->SMTPSecure = "ssl"; 
    $maildos->Host = Host; // A RELLENAR. Aquí pondremos el SMTP a utilizar. Por ej. mail.midominio.com
    $maildos->Username = Username; // A RELLENAR. Email de la cuenta de correo. ej.info@midominio.com La cuenta de correo debe ser creada previamente. 
    $maildos->Password = Password; // A RELLENAR. Aqui pondremos la contraseña de la cuenta de correo
    $maildos->Port = Port; // Puerto de conexión al servidor de envio. 
    $maildos->SetFrom(correocor, mensajecorr);
    $maildos->AddAddress($correo, "Usuario");
    $archivoexa = "archivosgenerales/".$documento;
    $maildos->AddAttachment($archivoexa,$documento);
    $maildos->Subject = utf8_decode($titulo); // Este es el titulo del email. 
    $maildos->MsgHTML(utf8_decode($mensaje));
    $maildos->Send();
}

public function rechazarcandidato($id_per,$id_req,$rechazo)
{
    $conn = $this->conec();
    $consultas = "SELECT correo,nombre  FROM req_candidatos WHERE  id=".$id_per;

    $consultas= $conn->Execute($consultas)-> getRows();
    $correo = "";
    $nombre = "";
    for($i= 0; $i<count($consultas); $i++) {
        $correo  =$consultas[$i]['correo'];
        $nombre  =$consultas[$i]['nombre'];
    }

    $consultas = "SELECT empresaclientet,cargo,clientesol  FROM req WHERE  id=".$id_req;
    $consultas= $conn->Execute($consultas)-> getRows();
    $ide = "";
    $cargo = "";
    $clientesol = "";
    for($i= 0; $i<count($consultas); $i++) {
        $ide  =$consultas[$i]['empresaclientet'];
        $cargo =$consultas[$i]['cargo'];
        $clientesol =$consultas[$i]['clientesol'];
    }


    $consultas = "SELECT nombre  FROM usuarios WHERE  usuario='".$clientesol."'";
    $consultas= $conn->Execute($consultas)-> getRows();
    $nombreem = "";
    for($i= 0; $i<count($consultas); $i++) {
        $nombreem  =$consultas[$i]['nombre'];
    }
    $mensaje = "Apreciado ".$nombre."
    <br><br>
    En relación con el proceso de selección para el cargo ".$cargo.",  queremos agradecerle su participación en este y es nuestro deber informarles que Usted no fue seleccionado para este cargo. 
    <br>
    Esperamos contar con su hoja de vida para próximos procesos de selección donde su perfil y experiencia se ajusten a las necesidades del cargo requerido.
    <br>
    Cordialmente,
    <br><br><br>
    Área de Selección<br><br>
    Human Talent SAS";
    $envio = $this->enviocorreo($correo, $mensaje, "Estado Proceso Seleccion");
    $consultas = "SELECT correosselecccion FROM empresasterporales WHERE id_temporal= ".$ide;
      //echo $consultas;
      $mensaje = "Apreciada Área de Selección <br>
        <br>
      Le informamos  que la empresa ".$nombreem.", ha rechazado el candidato ".$nombre.", del proceso de selección con consecutivo ".$id_req.",  por el motivo ".$rechazo." <br>
      Recuerde que puede hacer seguimiento a su solicitud, para lo cual deberá iniciar sesión en nuestra pagina web  www.humantalentsas.com ingresando con su usuario y clave. 
      <br><br>
      Para visualizar dar  click <a href='".DIRWEB."home.php?ctr=requisicion&acc=listaCandidatos&id={$id_req}'><strong>AQUI</strong></a>
      <br><br>
      Cordialmente,
      <br>
      Human Talent SAS";
      $consultas= $conn->Execute($consultas)-> getRows();
      for($i= 0; $i<count($consultas); $i++) {
        $correos = explode(",", $consultas[$i]['correosselecccion']);
        for($j=0; $j<count($correos); $j++){
            $consultascorr = "SELECT correo FROM usuarios WHERE id_usuario= ".$correos[$j];
            $consultasresp= $conn->Execute($consultascorr)-> getRows();
            $envio = $this->enviocorreo($consultasresp[0]['correo'], $mensaje);
        }

      }

    $SQL ="UPDATE req_candidatos SET estado='R',motivorechazo='$rechazo' WHERE id=".$id_per;
    $conn->Execute($SQL);
    


}


public function enviarCorreoReq($ide,$req){
      $conn = $this->conec();
      $consultas = "SELECT * FROM req WHERE id= ".$req;
      $consultas = $conn->Execute($consultas)-> getRows();
      $carfo = "";
      for($i= 0; $i<count($consultas); $i++) {
        $carfo = $consultas[0]['cargo'];
      }
      /*
      $consultas = "SELECT correosselecccion FROM empresasterporales WHERE id_temporal= ".$ide;
      //echo $consultas;
      $mensaje = "Se a creado  una nueva requisision con el identificador {$req} Para su gestion de candidatos<br><br>
      Para visualizar de click <a href='".DIRWEB."home.php?ctr=requisicion&acc=listaCandidatos&id={$req}'><strong>AQUI</strong></a><br><br>
      Recuerde que para que el click sea valedero debe usted tener la sesion iniciada en el sistema <br><br>";*/
      $mensaje = "Apreciado Cliente<br><br>
      Le informamos que su requerimiento para el cargo ".$carfo.", ha sido recibido y se le ha generado el consecutivo ".$req.".;  estaremos procediendo de manera inmediata a dar tramite a su solicitud.
      <br>
      Recuerde que puede hacer seguimiento a su solicitud, para lo cual deberá iniciar sesión en nuestra pagina web  www.humantalentsas.com ingresando con su usuario y clave. 
      <br>
      Para visualizar dar  click <a href='".DIRWEB."home.php?ctr=requisicion&acc=listaCandidatos&id={$req}'>Aqui</a>
      <br>
      <br>
      Cualquier inquietud que tengo al respecto, la atenderemos a traves de nuestro PBX 214 2011, o Celular 315 612 9899 o en los correos seleccion@humantalentsas.com, analistaseleccion@humantalentsas.com . 
      <br>
      <bR>
      Cordialmente,
      <br><br>
      Área de Selección<br>
      Human Talent SAS";
      //echo $mensaje;
      $consultas = "SELECT correosselecccion FROM empresasterporales WHERE id_temporal= ".$ide;
      $consultas= $conn->Execute($consultas)-> getRows();
      for($i= 0; $i<count($consultas); $i++) {
        $correos = explode(",", $consultas[$i]['correosselecccion']);
        for($j=0; $j<count($correos); $j++){
            $consultascorr = "SELECT correo FROM usuarios WHERE id_usuario= ".$correos[$j];
            $consultasresp= $conn->Execute($consultascorr)-> getRows();
            $envio = $this->enviocorreo($consultasresp[0]['correo'], $mensaje, "Nueva Solictud Generada");
        }
      }

      $this->enviarcorreoClienteGen($req,"NUEVAREQ");

      $this->altareq($req);
  }



  public function enviarcorreorestauracion($documento){
    $conn = $this->conec();
    $consultas = "SELECT * FROM usuarios WHERE  usuario = ".$documento;
    $consultas = $conn->Execute($consultas)-> getRows();
    $correo = "";
    $id = "";
    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
    $clavenueva = substr(str_shuffle($permitted_chars), 0, 10);
    $calve = base64_encode($clavenueva);
    $mensaje = "Le informamos la clave temporal con la cual usted podra acceder a la plataforma.Se recomienda cambiar la clave<br>Clave :".$clavenueva."<br>";
    for($i= 0; $i<count($consultas); $i++) {
      $correo = $consultas[0]['correo'];
      $id_usuario = $consultas[0]['id_usuario'];
    }

    if($correo!=""){
         $this->enviocorreo(trim($correo),$mensaje,"Restauracion de Clave");
         $consultascorr = "UPDATE usuarios set pass ='$calve',restore=1 where id_usuario =".$id_usuario;
         $consultasresp= $conn->Execute($consultascorr);
         return "error=12";
    } else {

        $consultas = "SELECT * FROM empledos_ingreso WHERE  documento = ".$documento;
        $consultas = $conn->Execute($consultas)-> getRows();
        $correo = "";
        $id = "";
        for($i= 0; $i<count($consultas); $i++) {
            $correo = $consultas[0]['correo'];
            $id_usuario = $consultas[0]['id_ingreso'];
        }
        if($correo!=""){
            $this->enviocorreo(trim($correo),$mensaje,"Restauracion de Clave");
            $consultascorr = "UPDATE empledos_ingreso set clave ='$calve',restore=1 where id_ingreso =".$id_usuario;
            $consultasresp= $conn->Execute($consultascorr);
            return "error=12";
        } else {
            return "error=21";
        }    
    }

}

  public function enviocorreo($correo,$mensaje,$asunto="Notificacion Gestion Human")
  {
    $titulo2 = $asunto;
    $cuerpo2 = "<p>Señor Usuario <br />".$mensaje."<br><br>Para su Seguimiento y/o Gestion <br /><br><br>
                  &copy; ".date('Y')." humantalentsas.com - Todos los derechos reservados </p>";
    $maildos = new PHPMailer();
    $maildos->IsSMTP();
    $maildos->SMTPAuth = true;
    $maildos->SMTPSecure = "ssl"; 
    $maildos->Host = Host; // A RELLENAR. Aquí pondremos el SMTP a utilizar. Por ej. mail.midominio.com
    $maildos->Username = Username; // A RELLENAR. Email de la cuenta de correo. ej.info@midominio.com La cuenta de correo debe ser creada previamente. 
    $maildos->Password = Password; // A RELLENAR. Aqui pondremos la contraseña de la cuenta de correo
    $maildos->Port = Port; // Puerto de conexión al servidor de envio. 
    $maildos->SetFrom(correocor, mensajecorr);
    /*$maildos->Host = "smtp.zoho.com"; // A RELLENAR. Aquí pondremos el SMTP a utilizar. Por ej. mail.midominio.com
    $maildos->Username = "info@formalsi.com"; // A RELLENAR. Email de la cuenta de correo. ej.info@midominio.com La cuenta de correo debe ser creada previamente. 
    $maildos->Password = "2019FormalSiMarzo*"; // A RELLENAR. Aqui pondremos la contraseña de la cuenta de correo
    $maildos->Port = 465; // Puerto de conexión al servidor de envio. 
    $maildos->SetFrom('info@formalsi.com', 'Humantalentsas');*/
    $maildos->AddAddress($correo, "Usuario");
    $maildos->Subject = utf8_decode($titulo2); // Este es el titulo del email. 
    $maildos->MsgHTML(utf8_decode($cuerpo2));
    $maildos->Send(); // Envía el correo
  }
}


?>