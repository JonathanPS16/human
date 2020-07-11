<?php 
        $objconsulta= new consultas();
        if (!isset($_SESSION['idusuario'])) {
            ?>
            <meta http-equiv="refresh" content="0; url=<?php echo DIRWEB;?>">
            <?php
        }
        $datosgene = array();
        foreach ($_GET as $clave => $valor) {
            $datosgene[$clave]=strip_tags($valor);
        }
        $_GET = $datosgene;
        $ctr = $_GET['ctr'];
        switch ($ctr) {
        case "home":
            $titulo = "Home";
            include('principal.php');
            break;
        case "cerrarsesion":
            $objconsulta->cerrarsesion();
            ?>
            <meta http-equiv="refresh" content="0; url=<?php echo DIRWEB;?>">
            <?php
            break;
        case "getionusuarios":
            echo "i es un pastel";
            break;
        case "buscardorCertificados":
            $acc = $_GET['acc'];
            switch ($acc) {
                case "validarGen":
                    $tipocertificado=$_POST['tipocertificado'];
                    $numero=$_POST['documento'];
                    $anio=$_POST['anio'];
                    $anios=$_POST['anios'];
                    $mes=$_POST['mes'];
                    $periodo=$_POST['periodo'];
                    $usuarioregistrado=$_POST['usuarioregistrado'];
                    $rolusuario=$_POST['rolusuario'];
                    $anyoarl=$_POST['anyoarl'];
                    $mesarl=$_POST['mesarl'];
                    switch ($tipocertificado) {
                        case 1:
                            $numero=$_POST['documento'];
                            $anios=$_POST['anios'];
                            $mes=$_POST['mes'];
                            $periodo=$_POST['periodo'];
                            $certificados=$objconsulta->obtenerVolantes($anios,$mes,$periodo,$numero);
                            include('vistas/vistaComprobante.php');
                        break;
                        case 2:
                            if(intval($anio)<=2016)
                            {
                                $certificados=$objconsulta->obtenerIngresosRete($numero,$anio);
                                include('vistas/generadorir.php');
                                //header("Location: generadorir.php?anio=$anio&documento=$numero&tipocertificado=$tipocertificado");
                            }
                            else			
                            {
                                $certificados=$objconsulta->obtenerIngresosReteunosiete($numero);
                                include('vistas/generadorir2017.php');
                                //header("Location: generadorir2017.php?anio=$anio&documento=$numero&tipocertificado=$tipocertificado");
                            }
                    
                        break;
                        case 3:
                            $certificados=$objconsulta->obtenerCertificadosCedula($numero);
                            include('vistas/vistaBuscadorContrato.php');
                    
                        break;
                        case 4:
                            include('vistas/vistaBuscadorArl.php');
                            //header("Location: ../../folderarl/carpeta.php?anyoarl=$anyoarl&mesarl=$mesarl&documento=$numero&colaborador=1");
                        break;
                    }
                break;
                case "generador":
                    $contrato=$_POST['contrato'];
	                $numero=$_POST['numero'];   
                    $certificados=$objconsulta->obtenerCertificadosporContrato($contrato,$numero);
                    include('vistas/generador.php');
                break;
                default;
                    $titulo = "Buscador de Certificados";
                    include('vistas/vistaBuscadorCertificados.php');
                break; 
            }

            
        break;  
        case "buscardorCarpetas":
            $acc = $_GET['acc'];
            switch ($acc) {
                case "buscador":
                    include('vistas/vistaBuscadorCarpeta.php');        
                break;
                case "buscadorFiltro":
                    include('vistas/vistaBuscadorcarpetaFiltrado.php');
                            
                break;
                case "buscadorArl":
                    
                    include('vistas/vistaBuscadorCarpetaArl.php');
                break;
                case "buscadorArlFiltro":
                    include('vistas/vistaBuscadorcarpetaFiltradoArl.php');
                            
                break;
                default;
                    //$titulo = "Buscador de Certificados";
                    //include('vistas/vistaBuscadorCertificados.php');
                break; 
            }
        break;
        case "requisicion":
            $acc = $_GET['acc'];
            switch ($acc) {
                
                case "crearRequisicion":
                    $id = 0;
                    $mireq=array();
                    $ide=$_GET['id'];
                    $listatemporales=$objconsulta->obteneTemporales();
                    if($ide>0){
                        $id=$_GET['id'];
                        $mireq=$objconsulta->obteneRes($id);
                        
                    }
                    include('vistas/reque.php');
                break;
                case "guardarPrueba":
                    $nombre_archivo = date('Ymd').$_FILES['filebutton']['name'];
                    $tipo_archivo = $_FILES['filebutton']['type'];
                    $tamano_archivo = $_FILES['filebutton']['size'];
                    $mensaje = "";    
                    //compruebo si las características del archivo son las que deseo
                    if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "pdf")) && ($tamano_archivo < 100000))) {
                        $mensaje = "La extensión o el tamaño de los archivos no es correcta. Se permiten archivos .gif .jpg .pdf .png ";
                    }else{
                        if (move_uploaded_file($_FILES['filebutton']['tmp_name'],  "archivosgenerales/".$nombre_archivo)){
                            $objconsulta->guardarArchivoPTecnico($nombre_archivo,$_POST['id']);
                            $mensaje =  "El archivo ha sido cargado correctamente.";
                        }else{
                            $mensaje =  "Ocurrió algún error al subir el fichero. No pudo guardarse.";
                        }
                    }
                    echo "<script>alert('".$mensaje."');
                        window.location.href = 'home.php?ctr=requisicion&acc=listaCandidatos&id=".$_POST['idreq']."';
                        </script>";
                    //include('vistas/reque.php');
                break;

                case "guardarhv":
                    $nombre_archivo = date('Ymd').$_FILES['filebutton']['name'];
                    $tipo_archivo = $_FILES['filebutton']['type'];
                    $tamano_archivo = $_FILES['filebutton']['size'];
                    $mensaje = "";    
                    //compruebo si las características del archivo son las que deseo
                    if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "pdf")) && ($tamano_archivo < 100000))) {
                        $mensaje = "La extensión o el tamaño de los archivos no es correcta. Se permiten archivos .gif .jpg .pdf .png ";
                    }else{
                        if (move_uploaded_file($_FILES['filebutton']['tmp_name'],  "archivosgenerales/".$nombre_archivo)){
                            $objconsulta->guardarArchivoHv($nombre_archivo,$_POST['id']);
                            $mensaje =  "El archivo ha sido cargado correctamente.";
                        }else{
                            $mensaje =  "Ocurrió algún error al subir el fichero. No pudo guardarse.";
                        }
                    }
                    echo "<script>alert('".$mensaje."');
                        window.location.href = 'home.php?ctr=requisicion&acc=listaCandidatos&id=".$_POST['idreq']."';
                        </script>";
                    //include('vistas/reque.php');
                break;
                case "listadoReq":
                    $listadoreq=$objconsulta->obteneRes(0,$_SESSION['usuario']);
                    include('vistas/listadoreq.php');
                break;

                case "testcorreo":
                    $listadoreq=$objconsulta->enviarCorreoReq(1,1);
                    //include('vistas/listadoreq.php');
                break;

                case "milistadoReq":
                    $listadoreq=$objconsulta->obteneMisRes(0,"".$_SESSION['datosempresa']."");
                    include('vistas/listadomisreq.php');
                break;

                case "listaCandidatos":
                    $idreq = $_GET["id"];
                    $listadoreq=$objconsulta->obtenercandidatos($idreq);
                    include('vistas/listadoyformcandidatos.php');
                break;

                case "guardarNuevoCandidato":
                    $idreq = $_POST['id'];
                    $nombre = $_POST['nombre'];
                    $cedula = $_POST['cedula'];
                    $telefono = $_POST['telefono'];
                    $correo = $_POST['correo'];
                    $guardarcan = $objconsulta->guardarCandidato($idreq,
                        $nombre,
                        $cedula,
                        $telefono,
                        $correo
                    );

                    echo "<script>alert('Informacion Guardada Correctamente');
                window.location.href = 'home.php?ctr=requisicion&acc=listaCandidatos&id=".$idreq."';
                </script>";
                break;

                case "enviarCandidatos":
                    $idper = $_GET['idper'];
                    $idreq = $_GET['idreq'];
                   
                    $objconsulta->enviarcandidatocliente($idper);

                    $objconsulta->enviarcorreoClienteGen($idreq,"NUEVOCANDIDATO");

                    echo "<script>alert('Informacion Guardada Correctamente');
                window.location.href = 'home.php?ctr=requisicion&acc=listaCandidatos&id=".$idreq."';
                </script>";
                break;
                case "enviarCorreoPrueba":
                $usuario = $_GET['id'];
                $idreq = $_GET['idreq'];
                $guardarcan = $objconsulta->actualizaEnvioPrue($usuario);
                echo "<script>alert('Correo Envia Correctamente');
                window.location.href = 'home.php?ctr=requisicion&acc=listaCandidatos&id=".$idreq."';
                </script>";
                break;
                case "guardarReq":
                   //print_r($_POST);
                   $id=$_POST['id'];
                   $tipocargosele=$_POST['tipocargosele'];
                   $empresaclientet=$_POST['empresaclientet'];
                   $fechareqcargo=$_POST['fechareqcargo'];
                   $empresacliente=$_POST['empresacliente'];
                   $cargo=$_POST['cargo'];
                   $edadminima=$_POST['edadminima'];
                   $edadmaxima=$_POST['edadmaxima'];
                   $edadindiferente=$_POST['edadindiferente'];
                   $horario=$_POST['horario'];
                   $tipocontrato=$_POST['tipocontrato'];
                   $checkestados=$_POST['checkestados'];
                   $strsta= "";
                   if(count($checkestados)>0){
                   foreach($checkestados as $estado){
                        $strsta.=$estado.",";
                    }
                    }

                    $checkgenero=$_POST['checkgenero'];
                   $strstagene= "";
                   if(count($checkgenero)>0){
                   foreach($checkgenero as $genero){
                        $strstagene.=$genero.",";
                    }
                }
                    $cantidad=$_POST['cantidad'];
                    $ciudadlaboral=$_POST['ciudadlaboral'];
                    $jornadalaboral= $_POST['jornadalaboral'];

                    $lastid = $objconsulta->guardarRequi($id,
                    $cargo,
                    $edadminima,
                    $edadmaxima,
                    $edadindiferente,
                    $horario,
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
                );

                /*AREA DE ENVIO DE CORREOS*/
               // $enviarcorreo = $objconsulta->enviarCorreoReq($empresaclientet,$lastid);
                /***/
                $gua = "Por favor complete la informacion de su solicitud";
                if($id>0) {
                    $gua = "";
                }
                echo "<script>alert('Informacion Guardada Correctamente ".$gua."');
                window.location.href = 'home.php?ctr=requisicion&acc=crearRequisicion&id=".$lastid."';
                </script>";
                break;

                case 'altareq':
                    $lastid=$_GET['id'];
                    $empresaclientet=$_GET['empresol'];
                    $objconsulta->altareq($lastid);
                    $enviarcorreo = $objconsulta->enviarCorreoReq($empresaclientet,$lastid);
                    echo "<script>alert('Informacion Guardada Correctamente ');
                window.location.href = 'home.php?ctr=requisicion&acc=verreqcan&id={$lastid}';
                </script>";
                break;

                case 'verreqcan':
                    $lastid=$_GET['id'];
                    $listadoreq=$objconsulta->obteneMisRescreadas($lastid);
                    $listadoreq=$objconsulta->obtenercandidatos($lastid,"estado = 'E'");
                    include('vistas/listadomisreqcreadas.php');
                break;

                   

                case 'guardarReqCondiciones':
                    $id=$_POST['id'];
                    $salariobasico=$_POST['salariobasico'];
                    $comisiones=$_POST['comisiones'];
                    $rodamiento=$_POST['rodamiento'];
                    $bonificacion=$_POST['bonificacion'];
                    $otraingreso=$_POST['otraingreso'];
                    $funciones=$_POST['funciones'];
                    $lastid = $objconsulta->guardarRequiCondiciones($id,
                    $salariobasico,
                    $comisiones,
                    $rodamiento,
                    $bonificacion,
                    $otraingreso,
                    $funciones
                );
                echo "<script>alert('Informacion Guardada Correctamente');
                window.location.href = 'home.php?ctr=requisicion&acc=crearRequisicion&id=".$lastid."';
                </script>";

                break;

                case "guardarReqRespo":
                    $id=$_POST['id'];
                    $acargo=$_POST['acargo'];
                    $equipos=$_POST['equipos'];
                    $dinero=$_POST['dinero'];
                    $materiales=$_POST['materiales'];
                    $herramientas=$_POST['herramientas'];
                    $documentos=$_POST['documentos'];
                    $confidencial=$_POST['confidencial'];
                    $valores=$_POST['valores'];
                    $otrosresponsabilidades=$_POST['otrosresponsabilidades'];
                    $lastid = $objconsulta->guardarRequiResponsa($id,
                    $acargo,
                    $equipos,
                    $dinero,
                    $materiales,
                    $herramientas,
                    $documentos,
                    $confidencial,
                    $valores,
                    $otrosresponsabilidades);

                    echo "<script>alert('Informacion Guardada Correctamente');
                window.location.href = 'home.php?ctr=requisicion&acc=crearRequisicion&id=".$lastid."';
                </script>";
                break;

                case "guardarReqExper":
                    $id=$_POST['id'];
                    $primaria=$_POST['primaria'];
                    $secundaria=$_POST['secundaria'];
                    $tecnico=$_POST['tecnico'];
                    $tecnologo=$_POST['tecnologo'];
                    $tecnologo=$_POST['tecnologo'];
                    $profesional=$_POST['profesional'];
                    $otrosestudios=$_POST['otrosestudios'];
                    $experienciahomolo=$_POST['experienciahomolo'];
                    $minimaexpe=$_POST['minimaexpe'];
                    $observacionesexp=$_POST['observacionesexp'];
                    $lastid = $objconsulta->guardarRequiExper($id,
                        $primaria,
                        $secundaria,
                        $tecnico,
                        $tecnologo,
                        $profesional,
                        $otrosestudios,
                        $minimaexpe,
                        $observacionesexp,
                        $experienciahomolo
                     );
                    echo "<script>alert('Informacion Guardada Correctamente');
                window.location.href = 'home.php?ctr=requisicion&acc=crearRequisicion&id=".$lastid."';
                </script>";
                break;
                case "guardarentrevista":
                  $datos = array();
                   //var_export($_POST);
                    $parentesco = $_POST['parentesco'];
                    foreach ($parentesco as $clave => $valor) {
                        foreach ($valor as $llavegene => $valorgene) {
                            $campo = str_replace("'","",$llavegene.$clave);
                            $valor = $valorgene;
                            $datos[]=array($campo=>$valor);
                        }
                    }
                    $experiencia = $_POST['experiencia'];
                    foreach ($experiencia as $clave => $valor) {
                        foreach ($valor as $llavegene => $valorgene) {
                            $campo = str_replace("'","",$llavegene.$clave);
                            $valor = $valorgene;
                            $datos[]=array($campo=>$valor);
                        }
                    }
                    $estudio = $_POST['estudio'];
                    foreach ($estudio as $clave => $valor) {
                        //echo "{$clave} => {$valor}";
                        foreach ($valor as $llavegene => $valorgene) {
                            $campo = str_replace("'","",$llavegene.$clave);
                            $valor = $valorgene;
                            $datos[]=array($campo=>$valor);
                        }
                    }
                    $campossql = "id_req,id_can";
                    $camposvalue = "{$_POST['idreq']},{$_POST['idcan']}";
                    foreach ($datos as $clave => $valor) {
                        foreach ($valor as $llavegene => $valorgene) {
                            $campossql.=",{$llavegene}";
                            $camposvalue.=",'{$valorgene}'";
                        }
                        
                    }
                    $sql = "INSERT INTO entrevistas (".$campossql.") VALUES (".$camposvalue.")";
                    //echo $sql;
                    $objconsulta->guardarEntre($sql);
                    echo "<script>alert('Informacion Guardada Correctamente');
                window.location.href = 'home.php?ctr=requisicion&acc=listaCandidatos&id=".$_POST['idreq']."';
                </script>";

                   // var_dump($datos);

                break;
                case "guardarReqHabilidades":
                //print_r($_POST);
                $id= $_POST['id'];
                $adaptabilidad= $_POST['adaptabilidad'];
                $administracion= $_POST['administracion'];
                $analisis= $_POST['analisis'];
                $gestion= $_POST['gestion'];
                $negociacion= $_POST['negociacion'];
                $normas= $_POST['normas'];
                $aprendizaje= $_POST['aprendizaje'];
                $flexibilidad= $_POST['flexibilidad'];
                $riesgo= $_POST['riesgo'];
                $innovacion= $_POST['innovacion'];
                $ambiente= $_POST['ambiente'];
                $observacion= $_POST['observacion'];
                $resultados= $_POST['resultados'];
                $cliente= $_POST['cliente'];
                $comunicacion= $_POST['comunicacion'];
                $tecnologica= $_POST['tecnologica'];
                $planeacion= $_POST['planeacion'];
                $relaciones= $_POST['relaciones'];
                $liderazgo= $_POST['liderazgo'];
                $sensibilidad= $_POST['sensibilidad'];
                $conflictos= $_POST['conflictos'];
                $tolerancia= $_POST['tolerancia'];
                $equipo= $_POST['equipo'];
                $habilidades= $_POST['habilidades'];
                $lastid = $objconsulta->guardarRequiHabilida($id,
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
                $habilidades);
                echo "<script>alert('Informacion Guardada Correctamente');
                window.location.href = 'home.php?ctr=requisicion&acc=crearRequisicion&id=".$lastid."';
                </script>";
                break;
                default;
                    $titulo = "Buscador de Certificados";
                    include('vistas/vistaBuscadorCertificados.php');
                break; 
            }
        break;

        default;
            $titulo = "Inicial";
            include('principal.php');
        break;    
      }
    ?>