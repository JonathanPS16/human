<?php 
session_start();
define("DIRWEB", "https://".$_SERVER["HTTP_HOST"]."/nuevohuman/");
define("Host", "smtp.zoho.com");
define("Username", "info@formalsi.com");
define("Password", "2019FormalSiMarzo*");
define("Port", 465);
define("correocor", "info@formalsi.com");
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
        $_SESSION['usuario'] = $usuario;
        $_SESSION['correo'] = $mail;
    	$_SESSION['idusuario'] = $uid;
    	$_SESSION['id_perfil'] = $uperfil;
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
    $conn = $this->conec();
    $dato=array();
    $consultas = "SELECT contrato,nombre_empleado,cedula,fecha_ingreso,fecha_retiro FROM certificados where cedula='$numero'";
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

public function guardarperfiles($insert,$id){
    $conn = $this->conec();

    $insert = substr($insert, 0, -1);
    $SQL ="delete from relmenuper WHERE id_perfil=".$id;
    $conn->Execute($SQL);
    $consultas = "INSERT INTO relmenuper (id_perfil,id_menu) VALUES $insert";
    $consultas= $conn->Execute($consultas)-> getRows();
    return $consultas;
}


public function valdiaryguardar($documento,$clave,$nombre,$correo,$pefil){
    $conn = $this->conec();
    $result = $conn->Execute("SELECT * from  usuarios WHERE  correo='{$correo}' OR  usuario = '{$documento}'");
    $recordCount = $result->recordCount();
    if($recordCount == 0) {

        $SQL ="INSERT INTO usuarios (usuario,correo,pass,nombre,idrol) VALUES ('{$documento}','{$correo}','{$clave}','{$nombre}',$pefil)";
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
    $consultas = "SELECT * FROM volantes where anio='$anios' and mes='$mes' and periodo='$periodo' and cedula='$numero' group by concepto";
    $consultas= $conn->Execute($consultas)-> getRows();
    return $consultas;
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
    $consultas = "SELECT * FROM ingresos_retenciones where CEDULA='$documento' and ANIO='$anio'";
    $consultas= $conn->Execute($consultas)-> getRows();
    return $consultas;
}

public function obtenerIngresosReteunosiete($documento){
    $conn = $this->conec();
    $dato=array();
    $consultas = "SELECT * FROM ingresos_ret_2017 where CEDULA='$documento'";
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



public function guardarprocesoAccidente($id,$funcionario,$cargo,$lugartrabajo,$jefe,$fechaaccidente,$descripcion){
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
    }

}




public function guardarproceso($id,$funcionario,$cargo,$cedula,$lugartrabajo,$jefe,$fechaevento,$descripcion,$correojefe,$archivouno,$archivodos,$archivotres,$horario,$centrocostos,$empresausuaria) {
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
        $SQL ="UPDATE procesos SET ".$updtaarchivos1.$updtaarchivos2.$updtaarchivos3."nombrefuncionario='$funcionario', cargo ='$cargo',cedula ='$cedula',lugartrabajo ='$lugartrabajo',jefeinmediato='$jefe',coreojefe ='$correojefe',
         	fechaevento ='$fechaevento',descripcion  ='$descripcion',horario='$horario',centrocostos='$centrocostos',empresausuaria='$empresausuaria' where id_proceso=$id";
        $conn->Execute($SQL);

    } else {
        $SQL ="INSERT INTO  procesos (".$insertararchivos1.$insertararchivos2.$insertararchivos3."nombrefuncionario,cargo,cedula,lugartrabajo,jefeinmediato,coreojefe,fechaevento,descripcion,grabador,fechagrab,horario,centrocostos,empresausuaria ) VALUES (".$val1.$val2.$val3."'$funcionario','$cargo','$cedula','$lugartrabajo','$jefe','$correojefe',
        '$fechaevento','$descripcion','".$_SESSION['usuario']."','$dat','$horario','$centrocostos','$empresausuaria')";
        $conn->Execute($SQL);
    }

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

public function notificarProcesos($id){
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

    $SQL ="UPDATE procesos  SET estado='N'  WHERE id_proceso=".$id;
    $conn->Execute($SQL);
    
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
            Para visualizar de click <a href='https://humantalentsas.com/nuevohuman/home.php?ctr=requisicion&acc=verreqcan&id={$idreq}'><strong>AQUI</strong></a><br><br>
            Recuerde que para que el click sea valedero debe usted tener la sesion iniciada en el sistema <br><br>";
            break;
        case "NUEVAREQ":
            $mesaje = "Se creo su Requisicion con el #{$idreq} <br>
            Para visualizar de click <a href='https://humantalentsas.com/nuevohuman/home.php?ctr=requisicion&acc=verreqcan&id={$idreq}'><strong>AQUI</strong></a><br><br>
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
            Para visualizar de click <a href='https://humantalentsas.com/nuevohuman/home.php?ctr=requisicion&acc=listaCandidatos&id={$id_req}'><strong>AQUI</strong></a><br><br>
            Recuerde que para que el click sea valedero debe usted tener la sesion iniciada en el sistema <br><br>";
            break;
        case "NUEVAREQ":
            $mensaje = "Se creo su Requisicion con el #{$idreq} <br>
            Para visualizar de click <a href='https://humantalentsas.com/nuevohuman/home.php?ctr=requisicion&acc=verreqcan&id={$id_req}'><strong>AQUI</strong></a><br><br>
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

public function enviarcitacionproceso($id,$correo,$fechacitacion,$tipo){
    $conn = $this->conec();
    $mensaje = "Se le a citado para revisar una solucitud de proceso diciplinario #".$id." para la fecha  y hora ".$fechacitacion;
    $envio = $this->enviocorreo($correo, $mensaje);
    $SQL ="UPDATE procesos  SET estado='E',fechacita='$fechacitacion',tipoproceso ='$tipo'  WHERE id_proceso=".$id;
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

public function enviarconclucionprocesoAcci($id,$diasinca,$obser,$observaciones){
    $conn = $this->conec();
    $SQL ="UPDATE accidentes  SET estado='T',diasincapacidad='$diasinca',fecharecom='$obser',recomendaciones='$observaciones'  WHERE id_accidente=".$id;
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
      Para visualizar de click <a href='https://humantalentsas.com/nuevohuman/home.php?ctr=requisicion&acc=listaCandidatos&id={$id_req}'><strong>AQUI</strong></a><br><br>
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
        $ordeningreso  .=$consultas[$i]['ordeningreso'];
        $hvhuman  .=$consultas[$i]['hvhuman'];
        $docdocumen  .=$consultas[$i]['docdocumen'];
    }

    $archivoexa = "archivosgenerales/examen".$idper.$idreq.".docx";
    $archivoaper = "archivosgenerales/apertura".$idper.$idreq.".docx";
    
    
    $titulo2 = "Documentacion de Contratacion";
    $cuerpo2 = "<p>Señor Usuario <br />
    Buen dia<br>
    Se le fue enviada la documentacion la cual debe ser llenada y entregada completa para completar con la contratacion <br /><br><br>
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
    $maildos->AddAttachment($hvhuman,"hojavidahuman.docx");
    $maildos->AddAttachment($docdocumen,"documentacion.docx");
    $maildos->AddAttachment($archivoexa,"ordenexamenes.docx");
    $maildos->AddAttachment($archivoaper,"aperturacuenta.docx");
    $maildos->Subject = utf8_decode($titulo2); // Este es el titulo del email. 
    $maildos->MsgHTML(utf8_decode($cuerpo2));
    $maildos->Send();

    $SQL ="UPDATE req_candidatos SET estado='F' WHERE id=".$idper;
    $conn->Execute($SQL);

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
      Para visualizar de click <a href='https://humantalentsas.com/nuevohuman/home.php?ctr=requisicion&acc=listaCandidatos&id={$id_req}'><strong>AQUI</strong></a><br><br>
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
      Para visualizar de click <a href='https://humantalentsas.com/nuevohuman/home.php?ctr=requisicion&acc=listaCandidatos&id={$req}'><strong>AQUI</strong></a><br><br>
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