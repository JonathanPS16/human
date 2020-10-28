<?php 
session_start();
define("DIRWEB", "https://".$_SERVER["HTTP_HOST"]."/human/");
define("Host", "smtp.zoho.com");
define("Username", "info@humantalentsas.com.co");
define("Password", "HumanInfo2020*Zoho");
define("Port", 465);
define("correocor", "info@humantalentsas.com.co");
define("mensajecorr", "Humantalentsas");
require("phpmailer/class.phpmailer.php");
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
       $where.="AND centro_costos in(".$_SESSION['centrocostos'].")";
    }
    $conn = $this->conec();
    $dato=array();
    $consultas = "SELECT contrato,nombre_empleado,cedula,fecha_ingreso,fecha_retiro FROM certificados where cedula='$numero' ".$where;
    //echo $consultas;
    $consultas= $conn->Execute($consultas)-> getRows();
    return $consultas;
}


public function selectperfilesusuario(){
    $conn = $this->conec();
    $dato=array();
    $consultas = "SELECT * FROM usuarios";
    $consultas= $conn->Execute($consultas)-> getRows();
    return $consultas;   
}

public function listacentros(){
    $conn = $this->conec();
    $dato=array();
    $consultas = "SELECT * FROM centrocostos order by empresausuaria";
    $consultas= $conn->Execute($consultas)-> getRows();
    return $consultas;   
}

public function obtenerretiros($estado=""){
    $conn = $this->conec();
    $dato=array();

    $consultas = "SELECT * FROM renuncias where 1=1 ".$estado;
    //echo $consultas;
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

    if($propirtario!=""){
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
    $consultas = "select * from centrocostos where empresa='$empresa'";
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
    $consultas = "SELECT * FROM `incapacidadescargue` where estado !='O'";
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
    $consultas= $conn->Execute($sql)-> getRows();
    return $consultas;
}

public function listaresumengeneral(){
    $conn = $this->conec();
    $consultas= $conn->Execute("SELECT * FROM incapacidadescargue inner JOIN centrocostos on centrocostos.empresa=incapacidadescargue.compania and incapacidadescargue.codigo=centrocostos.centrocosto INNER join codigoinca on codigoinca.id=incapacidadescargue.codigoconcepto")-> getRows();
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

    if($propirtario!=""){
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

public function obtenerVolantes($anios,$mes,$periodo,$numero){
    $conn = $this->conec();
    $dato=array();
    $where ="";
    if (isset($_SESSION['centrocostos']) && $_SESSION['centrocostos']!="" && $_SESSION['id_perfil']!=1){
        $where.=" AND certificados.centro_costos in (".$_SESSION['centrocostos'].")";
    }


    $consultas = "SELECT volantes.* FROM volantes 
    inner join certificados on certificados.cedula=volantes.cedula $where
    where volantes.anio='$anios' and volantes.mes='$mes' and volantes.periodo='$periodo' and volantes.cedula='$numero'  group by volantes.concepto limit 1";
    /*echo $consultas;
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

public function obteneTemporales($dato){
    $conn = $this->conec();
    $consultas = "SELECT * FROM empresasterporales where nombretemporal like '%$dato%'";
    $consultas= $conn->Execute($consultas)-> getRows();
    return $consultas;
}

public function obteneTemporalesUsarias($dato){
    $conn = $this->conec();
    $consultas = "SELECT empresasusuarias.* FROM empresasterporales 
    inner join empresasusuarias on empresasusuarias.ideempresatemporal=empresasterporales.id_temporal 
    WHERE nombretemporal  like '%$dato%'";
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
        $where.=" AND certificados.centro_costos in (".$_SESSION['centrocostos'].")";
    }
    $consultas = "SELECT ingresos_ret_2017.* FROM ingresos_ret_2017 inner JOIN certificados on certificados.cedula=ingresos_ret_2017.CEDULA $where where ingresos_ret_2017.CEDULA='$documento'";
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
      $where .=" and id= ".$ide;
    } 
    if ($clientesol != "") {
        $where .=" and clientesol= ".$clientesol;
    } 
    $consultas = "SELECT *,(select count(*) from req_candidatos where id_requisision = req.id and estado ='F') as cantidadapro FROM req where 1=1 ".$where." ORDER BY 1 ASC";
    $consultas= $conn->Execute($consultas)-> getRows();
    return $consultas;
}

public function obteneMisRes($ide=0,$mis=""){
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

    $consultas = "SELECT *,(select count(*) from req_candidatos where id_requisision = req.id and estado ='F') as cantidadapro FROM req where 1=1 ".$where." ORDER BY 1 ASC";
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

public function ajustarlaboratorio($id,$idreq,$laboratorio,$cadena){
    $conn = $this->conec();
    $SQL ="UPDATE req_candidatos SET examenes='$cadena',lugar='$laboratorio' WHERE id=".$id;
    $conn->Execute($SQL);
}

public function notificarProcesos($id,$correojefe){
    $conn = $this->conec();
    $consultas = "SELECT usuarios FROM notificaciones WHERE grupo= 'diciplinario'";
    $consultas= $conn->Execute($consultas)-> getRows();
    for($i= 0; $i<count($consultas); $i++) {
      $correos = explode(",", $consultas[$i]['usuarios']);
      for($j=0; $j<count($correos); $j++){
          $consultascorr = "SELECT correo FROM usuarios WHERE id_usuario= ".$correos[$j];
          $consultasresp= $conn->Execute($consultascorr)-> getRows();

          $mensaje  ="Se a creado  un nuevo proceso con identifidor #".$id."";

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
      return $nombreca;
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

public function cambiarclavept($perf,$usu){
    $perf =base64_encode($perf);
    $conn = $this->conec();
    $sqlcaliTe = "UPDATE usuarios set pass='{$perf}' where id_usuario={$usu}";
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

public function eliminarusu($usu){
    $conn = $this->conec();
    $sqlcaliTe = "DELETE FROM  usuarios  where id_usuario={$usu}";
    $conn->Execute($sqlcaliTe);
    $SQL =$sql;
    $conn->Execute($SQL);
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
            break;
        case "NUEVAREQ":
            $mesaje = "Se creo su Requisicion con el #{$idreq} <br>
            Para visualizar de click <a href='".DIRWEB."home.php?ctr=requisicion&acc=verreqcan&id={$idreq}'><strong>AQUI</strong></a><br><br>
            Recuerde que para que el click sea valedero debe usted tener la sesion iniciada en el sistema <br><br>";
            break;
        case "NUEVOCANDIDATO2":
            $mesaje =  "i es igual a 2";
            break;
    }

    $envio = $this->enviocorreo($correo, $mesaje, "Creacion de Nueva Solicitud");
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
    $consultas = "SELECT empresaclientet  FROM req WHERE  id=".$id_req;
    $consultas= $conn->Execute($consultas)-> getRows();
    $ide = "";
    for($i= 0; $i<count($consultas); $i++) {
        $ide  =$consultas[$i]['empresaclientet'];
    }
    $mensaje ="";
    switch ($tipomen) {
        case "APROBADO":
            $mensaje = "Se a APROBADO un candidato para la requision #{$id_req} favor enviar los documentos necesarios<br><br>
            Para visualizar de click <a href='".DIRWEB."home.php?ctr=requisicion&acc=listaCandidatos&id={$id_req}'><strong>AQUI</strong></a><br><br>
            Recuerde que para que el click sea valedero debe usted tener la sesion iniciada en el sistema <br><br>";
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
    $consultas = "SELECT usuarios FROM notificaciones WHERE grupo= 'accientes'";
    $consultas= $conn->Execute($consultas)-> getRows();
    for($i= 0; $i<count($consultas); $i++) {
      $correos = explode(",", $consultas[$i]['usuarios']);
      for($j=0; $j<count($correos); $j++){
          $consultascorr = "SELECT correo FROM usuarios WHERE id_usuario= ".$correos[$j];
          $consultasresp= $conn->Execute($consultascorr)-> getRows();

          $mensaje  ="Se a reportado un nuevo accidente con el identifidor #".$id."";

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

          $mensaje  ="Se a informado de un retiro de un empleado";

          $envio = $this->enviocorreo($consultasresp[0]['correo'], $mensaje);
      }

    }
    $SQL ="INSERT INTO renuncias (renuncia,paz,motivo,fecharetiro,nombre,cedula,observaciones) values('$archivouno','$archivodos','$retiro','$fecharetiro','$funcionario','$cedula','$observaciones')";
    $conn->Execute($SQL);
} 




public function guardarProcesoFinal($id,$nombre_archivo,$efecto,$correo){
    $conn = $this->conec();
    /*$consultas = "SELECT usuarios FROM notificaciones WHERE grupo= 'diciplinario'";
    $consultas= $conn->Execute($consultas)-> getRows();
    for($i= 0; $i<count($consultas); $i++) {
      $correos = explode(",", $consultas[$i]['usuarios']);
      for($j=0; $j<count($correos); $j++){
          $consultascorr = "SELECT mail FROM users WHERE uid= ".$correos[$j];
          $consultasresp= $conn->Execute($consultascorr)-> getRows();

          $mensaje  ="Se a creado  un nuevo proceso con identifidor #".$id."";

          $envio = $this->enviocorreo($consultasresp[0]['mail'], $mensaje);
      }

    }*/
    $mensaje ="Se le informa que la decision tomada para el proceso #".$id." es la siguiente <br><br>".$efecto;
    $envio = $this->enviocorreo($correo, $mensaje);


    $SQL ="UPDATE procesos  SET conclucionfinal = '$efecto',archivofinal='$nombre_archivo', estado='T' WHERE id_proceso=".$id;
    $conn->Execute($SQL);

}

public function enviarcitacionproceso($id,$correo,$fechacitacion,$tipo,$justificacion,$archivo,$horacita,$sedelugar,$modalidadcita){
    $conn = $this->conec();
    $titulo="Citacion Proceso"; 
    $mensaje = "Se le a citado para revisar una solucitud de proceso diciplinario #".$id." para la fecha y hora ".$fechacitacion."a las ".$horacita."Por motivo<br>".$justificacion."<br>Lugar  $sedelugar con modalidad de $modalidadcita";
    $envio = $this->enviarcorreoadjuntos($correo,$archivo,$mensaje,$titulo);
    $fechahora = $fechacitacion. " ".$horacita;
    $SQL ="UPDATE procesos  SET estado='E',fechacita='$fechahora',tipoproceso ='$tipo',justificacion='$justificacion',archivoenviado='$archivo',sedelugar='$sedelugar',modalidadcita='$modalidadcita'  WHERE id_proceso=".$id;
    $conn->Execute($SQL);

}

public function guardarfinretiro($id,$correo,$archivo){
    $conn = $this->conec();
    $titulo="Documento Retiro"; 
    $mensaje = "Se le a enviado el documento de retiro para su informacion";
    $envio = $this->enviarcorreoadjuntos($correo,$archivo,$mensaje,$titulo);
    $SQL ="UPDATE renuncias  SET estado='T',correo='$correo',archivo ='$archivo' WHERE id_renuncia=".$id;
    $conn->Execute($SQL);

}

public function enviarsolicitudexplicacion($id,$correo,$fechacitacion,$tipo,$razonllamado,$archivo){
    $conn = $this->conec();
    $mensaje = "Se a reportado un proceso diciplinaro y el empleados solicita explicaciones de la falta $razonllamado <br>para diligenciar explicacion debe ir al siguiente <a href='".DIRWEB."registro.php?id=$id' target='_black'>link</a> fecha limite $fechacitacion";
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
    $consultas = "SELECT correo  FROM req_candidatos WHERE  id=".$id_per;

    $consultas= $conn->Execute($consultas)-> getRows();
    $correo = "";
    for($i= 0; $i<count($consultas); $i++) {
        $correo  =$consultas[$i]['correo'];
    }

    $consultas = "SELECT empresaclientet  FROM req WHERE  id=".$id_req;
    $consultas= $conn->Execute($consultas)-> getRows();
    $ide = "";
    for($i= 0; $i<count($consultas); $i++) {
        $ide  =$consultas[$i]['empresaclientet'];
    }
    $mensaje = "Buen Dia<br>Se le informa que a sido citado a entrevista el dia  ".$fechahora." en ".$lugar."<br>";
    $envio = $this->enviocorreo($correo, $mensaje);
    $consultas = "SELECT correosselecccion FROM empresasterporales WHERE id_temporal= ".$ide;
      //echo $consultas;
      $mensaje = "Se a citadoal candidato con identificador ".$id_per." para el dia ".$fechahora." en ".$lugar."<br><br>
      Para visualizar de click <a href='".DIRWEB."home.php?ctr=requisicion&acc=listaCandidatos&id={$id_req}'><strong>AQUI</strong></a><br><br>
      Recuerde que para que el click sea valedero debe usted tener la sesion iniciada en el sistema <br><br>";
      $consultas= $conn->Execute($consultas)-> getRows();
      for($i= 0; $i<count($consultas); $i++) {
        $correos = explode(",", $consultas[$i]['correosselecccion']);
        for($j=0; $j<count($correos); $j++){
            $consultascorr = "SELECT correo FROM usuarios WHERE id_usuario= ".$correos[$j];
            $consultasresp= $conn->Execute($consultascorr)-> getRows();
            $envio = $this->enviocorreo($consultasresp[0]['correo'], $mensaje);
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
    $consultas = "SELECT correo,ordeningreso,hvhuman,docdocumen  FROM req_candidatos WHERE  id=".$idper;

    $consultas= $conn->Execute($consultas)-> getRows();
    $correo = "";
    $ordeningreso = "archivosgenerales/";
    $docdocumen = "archivosgenerales/";
    $hvhuman = "archivosgenerales/";
    for($i= 0; $i<count($consultas); $i++) {
        $correo  =$consultas[$i]['correo'];
        $ordeningreso  .=str_replace(".docx", ".pdf",$consultas[$i]['ordeningreso']);
        $hvhuman  .=str_replace(".docx", ".pdf",$consultas[$i]['hvhuman']);
        $docdocumen  .=str_replace(".docx", ".pdf",$consultas[$i]['docdocumen']);
    }
    $archivoexa = "archivosgenerales/examen".$idper.$idreq.".pdf";
    $archivoaper = "archivosgenerales/apertura".$idper.$idreq.".pdf";
    
    
    $titulo2 = "Documentacion de Contratacion";
    $cuerpo2 = "Señor Usuario
<br><br>
    Usted ha sido seleccionado, vamos a iniciar el proceso de contratación. 
    <br><br>
    Le fueron enviados unos archivos los cuales debe imprimir y diligenciar, según sea el caso.<br> 
    Debe dirigirse al laboratorio para toma de exámenes y al banco para realizar apertura de cuenta y presentarse con toda la documentación requerida en la temporal, para la firma de contrato.
    <br><br>
    Cordialmente,
    <br><br>
    Área de Contratación.
     <br /><br><br>
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
    //$maildos->AddAttachment($ordeningreso,"ordeningreso.docx");
    $maildos->AddAttachment($hvhuman,"hojavidahuman.pdf");
    $maildos->AddAttachment($docdocumen,"documentacion.pdf");
    $maildos->AddAttachment($archivoexa,"ordenexamenes.pdf");
    $maildos->AddAttachment($archivoaper,"aperturacuenta.pdf");
    $maildos->Subject = utf8_decode($titulo2); // Este es el titulo del email. 
    $maildos->MsgHTML(utf8_decode($cuerpo2));
    $maildos->Send();

    $SQL ="UPDATE req_candidatos SET estado='F' WHERE id=".$idper;
    $conn->Execute($SQL);

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
    $consultas = "SELECT correo  FROM req_candidatos WHERE  id=".$id_per;

    $consultas= $conn->Execute($consultas)-> getRows();
    $correo = "";
    for($i= 0; $i<count($consultas); $i++) {
        $correo  =$consultas[$i]['correo'];
    }

    $consultas = "SELECT empresaclientet  FROM req WHERE  id=".$id_req;
    $consultas= $conn->Execute($consultas)-> getRows();
    $ide = "";
    for($i= 0; $i<count($consultas); $i++) {
        $ide  =$consultas[$i]['empresaclientet'];
    }
    $mensaje = "Buen Dia  <br>
    Agradecemos su participacion el la requisision #".$id_req." Pero en este momento no es el candadidato escogido 
    <br>";
    $envio = $this->enviocorreo($correo, $mensaje);
    $consultas = "SELECT correosselecccion FROM empresasterporales WHERE id_temporal= ".$ide;
      //echo $consultas;
      $mensaje = "Se a rechazado candidato  con identificador ".$id_per." por motivo ".$rechazo."<br><br>
      Para visualizar de click <a href='".DIRWEB."home.php?ctr=requisicion&acc=listaCandidatos&id={$id_req}'><strong>AQUI</strong></a><br><br>
      Recuerde que para que el click sea valedero debe usted tener la sesion iniciada en el sistema <br><br>";
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
      $consultas = "SELECT correosselecccion FROM empresasterporales WHERE id_temporal= ".$ide;
      //echo $consultas;
      $mensaje = "Se a creado  una nueva requisision con el identificador {$req} Para su gestion de candidatos<br><br>
      Para visualizar de click <a href='".DIRWEB."home.php?ctr=requisicion&acc=listaCandidatos&id={$req}'><strong>AQUI</strong></a><br><br>
      Recuerde que para que el click sea valedero debe usted tener la sesion iniciada en el sistema <br><br>";
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