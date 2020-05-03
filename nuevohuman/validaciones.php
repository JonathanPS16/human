<?php 
        $objconsulta= new consultas();
        if (!isset($_SESSION['idusuario'])) {
            ?>
            <meta http-equiv="refresh" content="0; url=<?php echo DIRWEB;?>">
            <?php
        }

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
                    $ide=$_GET['id'];
                    if($ide>0){
                        $id=$_GET['id'];
                        
                    }
                    include('vistas/reque.php');
                break;
                case "guardarReq":
                   //print_r($_POST);
                   $id=$_POST['id'];
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
                    $jornadalaboral
                );
                echo "<script>alert('Informacion Guardada Correctamente');
                window.location.href = 'home.php?ctr=requisicion&acc=crearRequisicion&id=".$lastid."';
                </script>";
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