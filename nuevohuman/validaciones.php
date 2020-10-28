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
            session_destroy();
    ?>
            <meta http-equiv="refresh" content="0; url=<?php echo DIRWEB;?>">
            <?php
    die();
            
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
                            if(count($certificados)==0) {
                                echo "<h5>Informacion No Encontrada o No Tiene Permisos Para la Consulta</h5>";
                                echo '<a href="home.php?ctr=buscardorCertificados&acc=buscador" class="btn btn-info">Nueva Consulta</a>';
                            } else {
                                include('vistas/vistaComprobante.php');
                            }

                            
                        break;
                        case 2:
                            if(intval($anio)<=2016)
                            {
                                $certificados=$objconsulta->obtenerIngresosRete($numero,$anio);
                                if(count($certificados)==0) {
                                    echo "<h5>Informacion No Encontrada o No Tiene Permisos Para la Consulta</h5>";
                                    echo '<a href="home.php?ctr=buscardorCertificados&acc=buscador" class="btn btn-info">Nueva Consulta</a>';
                                } else {
                                    include('vistas/generadorir.php');
                                }
                                
                                //header("Location: generadorir.php?anio=$anio&documento=$numero&tipocertificado=$tipocertificado");
                            }
                            else			
                            {
                                $certificados=$objconsulta->obtenerIngresosReteunosiete($numero);
                                if(count($certificados)==0) {
                                    echo "<h5>Informacion No Encontrada o No Tiene Permisos Para la Consulta</h5>";
                                    echo '<a href="home.php?ctr=buscardorCertificados&acc=buscador" class="btn btn-info">Nueva Consulta</a>';
                                } else {
                                    include('vistas/generadorir2017.php');
                                }
                                
                                //header("Location: generadorir2017.php?anio=$anio&documento=$numero&tipocertificado=$tipocertificado");
                            }
                    
                        break;
                        case 3:
                            $certificados=$objconsulta->obtenerCertificadosCedula($numero);
                            if(count($certificados)==0) {
                                echo "<h5>Informacion No Encontrada o No Tiene Permisos Para la Consulta</h5>";
                                echo '<a href="home.php?ctr=buscardorCertificadosacc=buscador" class="btn btn-info">Nueva Consulta</a>';
                            } else {
                                include('vistas/vistaBuscadorContrato.php');
                            }
                        break;
                        case 4:

                            $certificados=$objconsulta->obtenerCertificadosCedula($_POST['documento']);

                            if(count($certificados)==0) {
                                echo "<h5>Informacion No Encontrada o No Tiene Permisos Para la Consulta</h5>";
                                echo '<a href="home.php?ctr=buscardorCertificados&acc=buscador" class="btn btn-info">Nueva Consulta</a>';
                            } else {
                                include('vistas/vistaBuscadorArl.php');
                            }
                            
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
                    $certificados=$objconsulta->obtenerCertificadosCedula($_POST['documento']);
                    if(count($certificados)==0) {
                        echo "<h5>Informacion No Encontrada o No Tiene Permisos Para la Consulta</h5>";
                        echo '<a href="home.php?ctr=buscardorCarpetas&acc=buscador" class="btn btn-info">Nueva Consulta</a>';
                    } else {
                        include('vistas/vistaBuscadorcarpetaFiltrado.php');
                    }
                    
                            
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

        case "proceso":
            $acc = $_GET['acc'];
            switch ($acc) {
                case "formproceso":
                    $listatemporales=$objconsulta->obtenerProcesos("","SI");
                    include('vistas/proceso.php');
                break;

                case "guardarcitacion":

                    $id =$_POST['id'];
                    $correo= $_POST['correo'];
                    $fechacitacion=$_POST['fechacitacion'];
                    $justificacion=$_POST['justificacion'];
                    $horacita=$_POST['horacita'];
                    $sedelugar=$_POST['sedelugar'];
                    $modalidadcita=$_POST['modalidadcita'];
                    $tipo=$_POST['tipo'];
                    $archivo="";
                    if($nombre_archivo!="") {
                        $tipo_archivo = $_FILES['archivo1']['type'];
                        $tamano_archivo = $_FILES['archivo1']['size'];
                        $mensaje = "";    
                        //compruebo si las características del archivo son las que deseo
                        if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "pdf")))) {
                            $mensaje = "La extensión o el tamaño de los archivos no es correcta. Se permiten archivos .gif .jpg .pdf .png ";
                        }else{
                            if (move_uploaded_file($_FILES['archivo1']['tmp_name'],  "archivosgenerales/".$nombre_archivo)){
                                $archivo =$nombre_archivo;
                            }else{
                                $mensaje =  "Ocurrió algún error al subir el fichero. No pudo guardarse.";
                            }
                        }
                    }
                    $listatemporales=$objconsulta->enviarcitacionproceso($id,$correo,$fechacitacion,$tipo,$justificacion,$archivo,$horacita,$sedelugar,$modalidadcita);
                    echo "<script>alert('Empleado Notificado Correctamente');
                        window.location.href = 'home.php?ctr=proceso&acc=formprocesogest';
                        </script>";
                break;

                case "guardarexplicacionempleado":
                    $id =$_POST['id'];
                    $correo= $_POST['correo'];
                    $fechacitacion=$_POST['fecha'];
                    $razonllamado=$_POST['razonllamado'];
                    $tipo=$_POST['tipo'];
                    $nombre_archivo = date('YmdHms').$_FILES['archivo']['name'];
                    $archivo="";
                    if($nombre_archivo!="") {
                        $tipo_archivo = $_FILES['archivo']['type'];
                        $tamano_archivo = $_FILES['archivo']['size'];
                        $mensaje = "";    
                        //compruebo si las características del archivo son las que deseo
                        if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "pdf")))) {
                            $mensaje = "La extensión o el tamaño de los archivos no es correcta. Se permiten archivos .gif .jpg .pdf .png ";
                        }else{
                            if (move_uploaded_file($_FILES['archivo']['tmp_name'],  "archivosgenerales/".$nombre_archivo)){
                                $archivo =$nombre_archivo;
                            }else{
                                $mensaje =  "Ocurrió algún error al subir el fichero. No pudo guardarse.";
                            }
                        }
                    }
                    $listatemporales=$objconsulta->enviarsolicitudexplicacion($id,$correo,$fechacitacion,$tipo,$razonllamado,$archivo);
                    echo "<script>alert('Empleado Notificado Correctamente');
                        window.location.href = 'home.php?ctr=proceso&acc=formprocesogest';
                        </script>";
                break;

                case "guardarconclucion":

                    $id =$_POST['id'];
                    $entrevista= $_POST['entrevista'];
                    $archivodos ="";
                    $nombre_archivo = date('YmdHms').$_FILES['archivofirmado']['name'];
                    if($nombre_archivo!="") {
                        $tipo_archivo = $_FILES['archivofirmado']['type'];
                        $tamano_archivo = $_FILES['archivofirmado']['size'];
                        $mensaje = "";    
                        //compruebo si las características del archivo son las que deseo
                        if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "pdf")))) {
                            $mensaje = "La extensión o el tamaño de los archivos no es correcta. Se permiten archivos .gif .jpg .pdf .png ";
                        }else{
                            if (move_uploaded_file($_FILES['archivofirmado']['tmp_name'],  "archivosgenerales/".$nombre_archivo)){
                                $archivodos =$nombre_archivo;
                            }else{
                                $mensaje =  "Ocurrió algún error al subir el fichero. No pudo guardarse.";
                            }
                        }
                    }

                    $listatemporales=$objconsulta->enviarconclucionproceso($id,$entrevista,$archivodos);
                    echo "<script>alert('Guardado Correctamente');
                        window.location.href = 'home.php?ctr=proceso&acc=formprocesogest';
                        </script>";
                break;

                case "formprocesogest":
                    $listatemporales=$objconsulta->obtenerProcesosGest();
                    include('vistas/procesogest.php');
                break;    
                case "formacla":
                    $listatemporales=$objconsulta->obtenerProcesosGestjur();
                    include('vistas/procesogest.php');
                break;   
                case "notificar":

                    $id = $_GET['id'];

                    $listatemporales=$objconsulta->notificarProcesos($id);

                    echo "<script>alert('Proceso Notificado Correctamente');
                        window.location.href = 'home.php?ctr=proceso&acc=formproceso';
                        </script>";
                    
                break;
                case "formu":
                    if($_GET['id']>0) {
                        $listatemporales=$objconsulta->obtenerProcesos($_GET['id'],"SI");
                    }
                    include('vistas/formproceso.php');
                break;

                case "guardarsolicitud":
                    $id = $_POST['id'];
                    $funcionario = $_POST['funcionario'];
                    $correojefe = $_POST['correojefe'];
                    $correojefe = $_POST['correojefe'];
                    $cargo = $_POST['cargo'];
                    $cedula = $_POST['cedula'];
                    $lugartrabajo = $_POST['lugartrabajo'];
                    $jefe = $_POST['jefe'];
                    $fechaevento = $_POST['fechaevento'];
                    $descripcion = $_POST['descripcion'];
                    $horario = $_POST['horario'];
                    $centrocostos = $_POST['centrocostos'];
                    $empresausuaria = $_POST['empresausuaria'];
                    $correoempleado = $_POST['correoempleado'];
                    $testigo = $_POST['testigo'];
                    $cargotestigo = $_POST['cargotestigo'];
                    $telefonotestigo = $_POST['telefonotestigo'];
                    $telefonojefei = $_POST['telefonojefei'];


                    

                    $archivouno = "";
                    $nombre_archivo = date('YmdHms').$_FILES['archivo1']['name'];
                    if($nombre_archivo!="") {
                        $tipo_archivo = $_FILES['archivo1']['type'];
                        $tamano_archivo = $_FILES['archivo1']['size'];
                        $mensaje = "";    
                        //compruebo si las características del archivo son las que deseo
                        if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "pdf")))) {
                            $mensaje = "La extensión o el tamaño de los archivos no es correcta. Se permiten archivos .gif .jpg .pdf .png ";
                        }else{
                            if (move_uploaded_file($_FILES['archivo1']['tmp_name'],  "archivosgenerales/".$nombre_archivo)){
                                $archivouno =$nombre_archivo;
                            }else{
                                $mensaje =  "Ocurrió algún error al subir el fichero. No pudo guardarse.";
                            }
                        }
                    }
                    $archivodos = "";

                    $nombre_archivo = date('YmdHms').$_FILES['archivo2']['name'];
                    if($nombre_archivo!="") {
                        $tipo_archivo = $_FILES['archivo2']['type'];
                        $tamano_archivo = $_FILES['archivo2']['size'];
                        $mensaje = "";    
                        //compruebo si las características del archivo son las que deseo
                        if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "pdf")))) {
                            $mensaje = "La extensión o el tamaño de los archivos no es correcta. Se permiten archivos .gif .jpg .pdf .png ";
                        }else{
                            if (move_uploaded_file($_FILES['archivo2']['tmp_name'],  "archivosgenerales/".$nombre_archivo)){
                                $archivodos =$nombre_archivo;
                            }else{
                                $mensaje =  "Ocurrió algún error al subir el fichero. No pudo guardarse.";
                            }
                        }
                    }
                    $archivotres = "";
                    $nombre_archivo = date('YmdHms').$_FILES['archivo3']['name'];
                    if($nombre_archivo!="") {
                        $tipo_archivo = $_FILES['archivo3']['type'];
                        $tamano_archivo = $_FILES['archivo3']['size'];
                        $mensaje = "";    
                        //compruebo si las características del archivo son las que deseo
                        if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "pdf")))) {
                            $mensaje = "La extensión o el tamaño de los archivos no es correcta. Se permiten archivos .gif .jpg .pdf .png ";
                        }else{
                            if (move_uploaded_file($_FILES['archivo3']['tmp_name'],  "archivosgenerales/".$nombre_archivo)){
                                $archivotres =$nombre_archivo;
                            }else{
                                $mensaje =  "Ocurrió algún error al subir el fichero. No pudo guardarse.";
                            }
                        }
                    }
                    $objconsulta->guardarproceso($id,$funcionario,$cargo,$cedula,$lugartrabajo,$jefe,$fechaevento,$descripcion,$correojefe,$archivouno,$archivodos,$archivotres,$horario,$centrocostos,$empresausuaria,$correoempleado,$testigo,$cargotestigo,$telefonotestigo,$telefonojefei);
                    $listatemporales = $objconsulta->ultimoproceso();
                    $idcreacion = $listatemporales[0]['id_proceso'];
                    $listatemporales=$objconsulta->notificarProcesos($idcreacion,$correojefe);
                    echo "<script>alert('Proceso Notificado Correctamente');
                        window.location.href = 'home.php?ctr=proceso&acc=formproceso';
                        </script>";
                break;

                case "guardarfinalproceso":
                    $id = $_POST['id'];
                    $efecto = $_POST['efecto'];
                    $correo = $_POST['correo'];
                    $archivotres = "";
                    $nombre_archivo = date('Ymd').$_FILES['archivofirmado']['name'];
                    if($nombre_archivo!="") {
                        $tipo_archivo = $_FILES['archivofirmado']['type'];
                        $tamano_archivo = $_FILES['archivofirmado']['size'];
                        $mensaje = "";    
                        //compruebo si las características del archivo son las que deseo
                        if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "pdf")))) {
                            $mensaje = "La extensión o el tamaño de los archivos no es correcta. Se permiten archivos .gif .jpg .pdf .png ";
                        }else{
                            if (move_uploaded_file($_FILES['archivofirmado']['tmp_name'],  "archivosgenerales/".$nombre_archivo)){
                                $archivotres =$nombre_archivo;
                            }else{
                                $mensaje =  "Ocurrió algún error al subir el fichero. No pudo guardarse.";
                            }
                        }
                    }
                    $objconsulta->guardarProcesoFinal($id,$nombre_archivo,$efecto,$correo);
                    echo "<script>alert('Proceso Terminado Correctamente');
                                window.location.href = 'home.php?ctr=proceso&acc=formacla';
                                </script>";
                break;
            }

        break;
        case "retiro":
            $acc = $_GET['acc'];
            switch ($acc) {

                case "guardarenviar":
                    $archivouno = "";
                    $nombre_archivo = date('YmdHms').$_FILES['filebutton']['name'];
                    if($nombre_archivo!="") {
                        $tipo_archivo = $_FILES['filebutton']['type'];
                        $tamano_archivo = $_FILES['filebutton']['size'];
                        $mensaje = "";    
                        //compruebo si las características del archivo son las que deseo
                        if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "pdf")))) {
                            $mensaje = "La extensión o el tamaño de los archivos no es correcta. Se permiten archivos .gif .jpg .pdf .png ";
                        }else{
                            if (move_uploaded_file($_FILES['filebutton']['tmp_name'],  "archivosgenerales/".$nombre_archivo)){
                                $archivouno =$nombre_archivo;
                            }else{
                                $mensaje =  "Ocurrió algún error al subir el fichero. No pudo guardarse.";
                            }
                        }
                    }
                    $correo = $_POST['correo'];
                    $id = $_POST['id'];

                    $listatemporales=$objconsulta->guardarfinretiro($id,$correo,$archivouno);
                    echo "<script>alert('Retiro Cargado Correctamente');
                        window.location.href = 'home.php?ctr=retiro&acc=listaretiros';
                        </script>";
                    
                break;
                case "listaretiros":
                    $listatemporales = $objconsulta->obtenerretiros(" AND estado = 'C'");
                    include('vistas/listadorenuncias.php');
                break;
                case "listadoret":
                    $mios = "S";
                    $listatemporales = $objconsulta->obtenerretiros(" AND estado in ('T','C')");
                    include('vistas/listadorenuncias.php');
                break;
                
                case "formretiro":
                    $listatemporales=$objconsulta->obtenerProcesosAccidentes("","SI");
                    include('vistas/formretiro.php');
                break;
                case "guardarsolicitud":
                    $archivouno = "";
                    $nombre_archivo = date('YmdHms').$_FILES['archivo1']['name'];
                    if($nombre_archivo!="") {
                        $tipo_archivo = $_FILES['archivo1']['type'];
                        $tamano_archivo = $_FILES['archivo1']['size'];
                        $mensaje = "";    
                        //compruebo si las características del archivo son las que deseo
                        if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "pdf")))) {
                            $mensaje = "La extensión o el tamaño de los archivos no es correcta. Se permiten archivos .gif .jpg .pdf .png ";
                        }else{
                            if (move_uploaded_file($_FILES['archivo1']['tmp_name'],  "archivosgenerales/".$nombre_archivo)){
                                $archivouno =$nombre_archivo;
                            }else{
                                $mensaje =  "Ocurrió algún error al subir el fichero. No pudo guardarse.";
                            }
                        }
                    }
                    $archivodos = "";

                    $nombre_archivo = date('YmdHms').$_FILES['archivo2']['name'];
                    if($nombre_archivo!="") {
                        $tipo_archivo = $_FILES['archivo2']['type'];
                        $tamano_archivo = $_FILES['archivo2']['size'];
                        $mensaje = "";    
                        //compruebo si las características del archivo son las que deseo
                        if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "pdf")))) {
                            $mensaje = "La extensión o el tamaño de los archivos no es correcta. Se permiten archivos .gif .jpg .pdf .png ";
                        }else{
                            if (move_uploaded_file($_FILES['archivo2']['tmp_name'],  "archivosgenerales/".$nombre_archivo)){
                                $archivodos =$nombre_archivo;
                            }else{
                                $mensaje =  "Ocurrió algún error al subir el fichero. No pudo guardarse.";
                            }
                        }
                    }


                    $listatemporales=$objconsulta->guardarretiro($archivouno,$archivodos,$_POST['retiro'],$_POST['fecharetiro'],$_POST['funcionario'],$_POST['cedula'],$_POST['observaciones']);
                    echo "<script>alert('Retiro Cargado Correctamente');
                        window.location.href = 'home.php?ctr=retiro&acc=listadoret';
                        </script>";
                break;
             }
        break;



        case "novedades":
            $acc = $_GET['acc'];
            switch ($acc) {
                case "guardarincap":
                    $archivo = "";
                    $nombre_archivo = date('YmdHms').$_FILES['archivo']['name'];
                    if($nombre_archivo!="") {
                        $tipo_archivo = $_FILES['archivo']['type'];
                        $tamano_archivo = $_FILES['archivo']['size'];
                        $mensaje = "";    
                        //compruebo si las características del archivo son las que deseo
                        if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "pdf")))) {
                            $mensaje = "La extensión o el tamaño de los archivos no es correcta. Se permiten archivos .gif .jpg .pdf .png ";
                        }else{
                            if (move_uploaded_file($_FILES['archivo']['tmp_name'],  "archivosgenerales/".$nombre_archivo)){
                                $archivo =$nombre_archivo;
                            }else{
                                $mensaje =  "Ocurrió algún error al subir el fichero. No pudo guardarse.";
                            }
                        }
                    }
                    
                    $listatemporales=$objconsulta->guardarincap($archivo,$_POST['fecha'],$_POST['cedula'],$_POST['nombre'],$_POST['noincapacidad'],$_POST['fechainicio'],$_POST['fechafinal'],$_POST['diasincapacidad'],$_POST['diagnostico']);
                    echo "<script>alert('Incapacidad Cargada Correctamente');
                        window.location.href = 'home.php?ctr=novedades&acc=incapacidades';
                        </script>";
                break;
                
                case "guardarformsalida":

                    $objconsulta->guardarpermisosalida($_POST['fecha'],$_POST['codigo'],$_POST['nombre'],$_POST['seccion'],$_POST['desde'],$_POST['hasta'],$_POST['motivo'],$_POST['remunerado'],$_POST['cedula'],$_POST['quincena']);
                    echo "<script>alert('Permiso Cargado Correctamente');
                        window.location.href = 'home.php?ctr=novedades&acc=formsalida';
                        </script>";
                break;
                case "formsalida":
                    $listatemporales = $objconsulta->listadohorasextra();
                    include('vistas/vistahorasextra.php');
                break;

                case "guardarformhoraextra":

                    $objconsulta->guardarhorasextra($_POST['fecha'],$_POST['codigo'],$_POST['nombre'],$_POST['seccion'],$_POST['desde'],$_POST['hasta'],$_POST['horas'],$_POST['cedula']);
                    echo "<script>alert('Horas Extra Cargadas Correctamente');
                        window.location.href = 'home.php?ctr=novedades&acc=horasextra';
                        </script>";
                break;
                case "horasextra":
                    $listatemporales = $objconsulta->listadohorasextrafinal();
                    include('vistas/vistahorasextrafinal.php');
                break;

                case "incapacidades":
                    $listatemporales = $objconsulta->listadoincap();
                    include('vistas/vistaincap.php');
                break;
             }
        break;




        case "incapacidad":
            $acc = $_GET['acc'];
            switch ($acc) {
                case "cargararchivo":
                    //$listatemporales=$objconsulta->obtenerProcesosAccidentes("","SI");
                    include('vistas/archivoincapacidad.php');
                break;
                case "cargarincapacidades":
                    require_once 'PHPExcel/Classes/PHPExcel.php';
                    $archivouno = "";
                    $nombre_archivo = date('YmdHms').$_FILES['archivo']['name'];
                    $tipo_archivo = $_FILES['archivo']['type'];
                    $tamano_archivo = $_FILES['archivo']['size'];
                    $mensaje = "";    
                    //compruebo si las características del archivo son las que deseo
                    if (!(strpos($nombre_archivo, "xlsx"))) {
                        $mensaje = "Sola se permite archivo xlsx";
                        $mensaje =  "Ocurrió algún error al subir el fichero. No pudo guardarse.";
                            echo "<script>alert('{$mensaje}');
                        window.location.href = 'home.php?ctr=incapacidad&acc=cargararchivo';
                        </script>";
                    }else{
                        if (move_uploaded_file($_FILES['archivo']['tmp_name'],  "archivosgenerales/".$nombre_archivo)){
                            $archivouno =$nombre_archivo;
                            
                        }else{
                            $mensaje =  "Ocurrió algún error al subir el fichero. No pudo guardarse.";
                            echo "<script>alert('{$mensaje}');
                        window.location.href = 'home.php?ctr=incapacidad&acc=cargararchivo';
                        </script>";
                        }
                    }
                    $compania = $_POST['compania'];
                    $datocentros = array();
                    $datosincapaval =array();
                    $listadocentros=$objconsulta->listadocentros(trim($compania));
                    $listadocodinca=$objconsulta->codigosinca();
                    
                    for($ia=0; $ia<count($listadocentros);$ia++){
                        $centrocostovali = $listadocentros[$ia]['centrocosto'];
                        array_push($datocentros,$centrocostovali);
                    }

                    for($ia=0; $ia<count($listadocodinca);$ia++){
                        $id = $listadocodinca[$ia]['id'];
                        array_push($datosincapaval,$id);
                    }
                    
                    $archivo = "archivosgenerales/".$archivouno;
                    $inputFileType = PHPExcel_IOFactory::identify($archivo);
                    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                    $objPHPExcel = $objReader->load($archivo);
                    $sheet = $objPHPExcel->getSheet(0); 
                    $highestRow = $sheet->getHighestRow(); 
                    $highestColumn = $sheet->getHighestColumn();
                    $num = 0;
                    $sql = "INSERT INTO incapacidadescargue (compania,codigo,nombre,fechaini,fechafinal,cantidaddias,mes,anio,periodo,cedula,nombreper,diaslaborados,codigoconcepto,concepto,responsable,valorliqui,observaciones,tipoau,nombregene,estado) 
                    VALUES ";
                    $errorcentro = "";
                    $errorcodigo = "";
                    $creado=0;
                    for ($row = 2; $row <= $highestRow; $row++){ $num++;
                        
                        $codigo  = $sheet->getCell("A".$row)->getValue();
                        $codigo = str_replace(" ","",$codigo);
                        $codigo = trim(substr($codigo, 0, -2));
                        $nombre  = trim($sheet->getCell("B".$row)->getValue());
                        $fechaini  = $sheet->getCell("C".$row)->getValue();
                        $fechaini = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($fechaini));
                        $fechaini = date("d/m/Y",strtotime($fechaini."+ 1 days")); 
                        $fechafinal  = $sheet->getCell("D".$row)->getValue();
                        $fechafinal = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($fechafinal));
                        $fechafinal = date("d/m/Y",strtotime($fechafinal."+ 1 days")); 
                        $cantidaddias  = $sheet->getCell("E".$row)->getValue();
                        $mes  = $sheet->getCell("F".$row)->getValue();
                        $anio  = $sheet->getCell("G".$row)->getValue();
                        $periodo  = $sheet->getCell("H".$row)->getValue();
                        $cedula  = $sheet->getCell("I".$row)->getValue();
                        $nombreper  = $sheet->getCell("J".$row)->getValue();
                        $diaslaborados  = $sheet->getCell("K".$row)->getValue();
                        $codigoconcepto  = $sheet->getCell("L".$row)->getValue();
                        $codigoconcepto = trim(str_replace(" ","",$codigoconcepto));
                        $concepto  = $sheet->getCell("M".$row)->getValue();
                        $eps  = $sheet->getCell("N".$row)->getValue();
                        $valorliqui  = $sheet->getCell("O".$row)->getValue();
                        $observaciones  = $sheet->getCell("P".$row)->getValue();
                        $tipoau  = $sheet->getCell("Q".$row)->getValue();
                        $nombregene  = $sheet->getCell("R".$row)->getValue();
                        $responsable = $esp;

                        if(!in_array($codigo,$datocentros)){
                            $errorcentro.="$num";
                        } else if(!in_array($codigoconcepto,$datosincapaval)){
                            $errorcodigo.="$num";
                        }else {
                            $sql.="('$compania','$codigo','$nombre','$fechaini','$fechafinal','$cantidaddias','$mes','$anio','$periodo','$cedula','$nombreper','$diaslaborados','$codigoconcepto','$concepto','$eps','$valorliqui','$observaciones','$tipoau','$nombregene','C'),";
                            $creado++;
                        }
                    }
                    $sql = substr($sql, 0, -1);
                    if ($creado>0) {
                      $listatemporales=$objconsulta->guardarcarguearchivos($sql);
                        echo "<script>alert('Registros Cargados Correctamente');
                        window.location.href = 'home.php?ctr=incapacidad&acc=trasncripcion';
                        </script>";
                    } else {
                        echo "<script>alert('Ningun Registro Encontrado');
                        window.location.href = 'home.php?ctr=incapacidad&acc=trasncripcion';
                        </script>";
                    }
                    
                break;
                case "trasncripcion":
                    $listatemporales=$objconsulta->obtenercargasinca();
                    include('vistas/incapacidadesgeneral.php');
                break;

                case "filtro":
                    $listatemporales=$objconsulta->listaresumengeneral();
                    include('vistas/incapacidadesfiltro.php');
                break;
                case "guardartranscrip":
                    $archivouno="";
                    $nombre_archivo = date('YmdHms').$_FILES['archivoincapacidad']['name'];
                    if($nombre_archivo!="") {
                        $tipo_archivo = $_FILES['archivoincapacidad']['type'];
                        $tamano_archivo = $_FILES['archivoincapacidad']['size'];
                        $mensaje = "";    
                        //compruebo si las características del archivo son las que deseo
                        if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "pdf")))) {
                            $mensaje = "La extensión o el tamaño de los archivos no es correcta. Se permiten archivos .gif .jpg .pdf .png ";
                        }else{
                            if (move_uploaded_file($_FILES['archivoincapacidad']['tmp_name'],  "archivosgenerales/".$nombre_archivo)){
                                $archivouno =$nombre_archivo;
                            }else{
                                $mensaje =  "Ocurrió algún error al subir el fichero. No pudo guardarse.";
                            }
                        }
                    }
                    $archivodos="";
                    $nombre_archivo = date('YmdHms').$_FILES['archivotranscri']['name'];
                    if($nombre_archivo!="") {
                        $tipo_archivo = $_FILES['archivotranscri']['type'];
                        $tamano_archivo = $_FILES['archivotranscri']['size'];
                        $mensaje = "";    
                        //compruebo si las características del archivo son las que deseo
                        if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "pdf")))) {
                            $mensaje = "La extensión o el tamaño de los archivos no es correcta. Se permiten archivos .gif .jpg .pdf .png ";
                        }else{
                            if (move_uploaded_file($_FILES['archivotranscri']['tmp_name'],  "archivosgenerales/".$nombre_archivo)){
                                $archivodos =$nombre_archivo;
                            }else{
                                $mensaje =  "Ocurrió algún error al subir el fichero. No pudo guardarse.";
                            }
                        }
                    }
                    $listatemporales=$objconsulta->guardartrancripcion($_POST['id'],$_POST['noincapacidad'],$_POST['fechaincio'],$_POST['diagnostico'],$_POST['fechatrans'],$_POST['fechafinal'],$_POST['nodias'],$_POST['notranscip'],$archivouno,$archivodos,$_POST['prorroga'],$_POST['diasacum']);

                    echo "<script>alert('Registros Actualizado Correctamente');
                        window.location.href = 'home.php?ctr=incapacidad&acc=trasncripcion';
                        </script>";

                break;
                case "guardarproceeps":
                    $fecha ="".$_POST['fecha']."";
                    $observaciones="".$_POST['observaciones']."";
                    $listatemporales=$objconsulta->guardardecisioneps($_POST['id'],$_POST['fechapagoeps'],$_POST['valorreco'],$fecha,$observaciones,$_POST['estado']);
                    echo "<script>alert('Registros Actualizado Correctamente');
                        window.location.href = 'home.php?ctr=incapacidad&acc=trasncripcion';
                        </script>";
                break;
                case "guardarprocebanco":
                    $fecha ="".$_POST['fecha']."";
                    $observaciones="".$_POST['observaciones']."";
                    $listatemporales=$objconsulta->guardardatabanco($_POST['id'],$_POST['fechabanco'],$_POST['valoringresobanco'],$_POST['noreciboadci']);
                    echo "<script>alert('Registros Actualizado Correctamente');
                        window.location.href = 'home.php?ctr=incapacidad&acc=trasncripcion';
                        </script>";
                break;

                case "guardarcreit":
                    $listatemporales=$objconsulta->guardarcreditinca($_POST['id'],$_POST['notacredito'],$_POST['fechanotadci'],$_POST['valornotaadci'],$_POST['imagen'],$_POST['otrasobserva'],$_POST['digivsfisi']);
                    echo "<script>alert('Registros Actualizado Correctamente');
                        window.location.href = 'home.php?ctr=incapacidad&acc=trasncripcion';
                        </script>";
                break;

                

                case "formcentro":
                    //$listatemporales=$objconsulta->obtenerProcesosAccidentes("","SI");
                    include('vistas/archivoempresausuaria.php');
                break;
                case "cargarcentros":
                    //$listatemporales=$objconsulta->obtenerProcesosAccidentes("","SI");
                    include('vistas/archivoempresausuaria.php');
                break;
            }
        break;
        case "accidentes":
            $acc = $_GET['acc'];
            switch ($acc) {
                case "listaaccidentes":
                    $listatemporales=$objconsulta->obtenerProcesosAccidentes("","SI");
                    include('vistas/procesoaccidentes.php');
                break;

                case "guardarnotificacion":
                    print_r($_POST);
                break;

                case "guardarcitacion":

                    $id =$_POST['id'];
                    $nombre_archivo = date('Ymd').$_FILES['archivo3']['name'];
                    if($nombre_archivo!="") {
                        $tipo_archivo = $_FILES['archivo3']['type'];
                        $tamano_archivo = $_FILES['archivo3']['size'];
                        $mensaje = "";    
                        //compruebo si las características del archivo son las que deseo
                        if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "pdf")))) {
                            $mensaje = "La extensión o el tamaño de los archivos no es correcta. Se permiten archivos .gif .jpg .pdf .png ";
                        }else{
                            if (move_uploaded_file($_FILES['archivo3']['tmp_name'],  "archivosgenerales/".$nombre_archivo)){
                                $archivotres =$nombre_archivo;
                            }else{
                                $mensaje =  "Ocurrió algún error al subir el fichero. No pudo guardarse.";
                            }
                        }
                    }
                    $listatemporales=$objconsulta->enviarcitacionprocesoAcci($id,$nombre_archivo);
                    echo "<script>alert('Archivo Cargado Correctamente');
                        window.location.href = 'home.php?ctr=accidentes&acc=formprocesogest';
                        </script>";
                break;


                case "guardarconclucion":

                    $id =$_POST['id'];
                    $diasinca= $_POST['diasinca'];
                    $obserini= $_POST['obserini'];
                    $obser= $_POST['obser'];
                    $observaciones= $_POST['observaciones'];
                    $observacionesmedicas= $_POST['observacionesmedicas'];
                    $fechainireco= $_POST['fechainireco'];
                    $fechafinalreco= $_POST['fechafinalreco'];
                    $listatemporales=$objconsulta->enviarconclucionprocesoAcci($id,$diasinca,$obserini,$obser,$observaciones,$observacionesmedicas,$fechainireco,$fechafinalreco);
                    echo "<script>alert('Guardado Correctamente');
                        window.location.href = 'home.php?ctr=accidentes&acc=formprocesogest';
                        </script>";
                break;

                case "formprocesogest":
                    $listatemporales=$objconsulta->obtenerProcesosGestAcci();
                    include('vistas/procesogestacci.php');
                break;    
                case "formacla":
                    $listatemporales=$objconsulta->obtenerProcesosGestjur();
                    include('vistas/procesogestacci.php');
                break;   
                case "notificar":

                    $id = $_GET['id'];

                    $listatemporales=$objconsulta->notificarProcesosAccidente($id);

                    echo "<script>alert('Accidente Notificado Correctamente');
                        window.location.href = 'home.php?ctr=accidentes&acc=listaaccidentes';
                        </script>";
                    
                break;
                case "formu":
                    if($_GET['id']>0) {
                        $listatemporales=$objconsulta->obtenerProcesosAccidentes($_GET['id'],"SI");
                    }
                    include('vistas/formprocesoaccidente.php');
                break;

                case "guardarsolicitud":
                    $id = $_POST['id'];
                    $funcionario = $_POST['funcionario'];
                    $correojefe = $_POST['correojefe'];
                    $correojefe = $_POST['correojefe'];
                    $cargo = $_POST['cargo'];
                    $cedula = $_POST['cedula'];
                    $lugartrabajo = $_POST['lugartrabajo'];
                    $jefe = $_POST['jefe'];
                    $fechaevento = $_POST['fechaevento'];
                    $descripcion = $_POST['descripcion'];
                    $horario = $_POST['horario'];
                    $centrocostos = $_POST['centrocostos'];
                    $empresausuaria = $_POST['empresausuaria'];
                    $correoempleado = $_POST['correoempleado'];



                    $direccionempleado = $_POST['direccionempleado'];
                    $telefononempleado = $_POST['telefononempleado'];
                    $fechahoraacci = $_POST['fechahoraacci'];
                    $tiempoprevio = $_POST['tiempoprevio'];
                    $laborhabitual = $_POST['laborhabitual'];
                    $laborreal = $_POST['laborreal'];
                    $tipoaccidente = $_POST['tipoaccidente'];
                    $muerte = $_POST['muerte'];
                    $lugaracciente = $_POST['lugaracciente'];
                    $sitioindicado = $_POST['sitioindicado'];
                    $otrolugar = $_POST['otrolugar'];
                    $tipolesion = $_POST['tipolesion'];
                    $otrotipolesion = $_POST['otrotipolesion'];
                    $parteafectada = $_POST['parteafectada'];
                    $agenteaccidente = $_POST['agenteaccidente'];
                    $mecanismo = $_POST['mecanismo'];
                    $otromecanismo = $_POST['otromecanismo'];
                    $personasprese = $_POST['personasprese'];
                    $presenciantes = $_POST['presenciantes'];



                    $listatemporales=$objconsulta->guardarprocesoAccidente($id,$funcionario,$cargo,$cedula,$lugartrabajo,$jefe,$fechaevento,$descripcion,$correojefe,$archivouno,$archivodos,$archivotres,$horario,$centrocostos,$empresausuaria,$correoempleado,$direccionempleado,$telefononempleado,$fechahoraacci,$tiempoprevio,$laborhabitual,$laborreal,$tipoaccidente,$muerte,$lugaracciente,$sitioindicado,$otrolugar,$tipolesion,$otrotipolesion,$parteafectada,$agenteaccidente,$mecanismo,$otromecanismo,$personasprese,$presenciantes);
                    $listatemporales = $objconsulta->ultimoprocesoaccidente();
                    $idcreacion = $listatemporales[0]['id_accidente'];
                    $listatemporales=$objconsulta->notificarProcesosAccidente($idcreacion);
                    echo "<script>alert('Reporte Guardado correctamente');
                        window.location.href = 'home.php?ctr=accidentes&acc=listaaccidentes';
                        </script>";
                break;

                

                case "guardarfinalproceso":
                    $id = $_POST['id'];
                    $efecto = $_POST['efecto'];
                    $correo = $_POST['correo'];
                    $archivotres = "";
                    $nombre_archivo = date('Ymd').$_FILES['archivofirmado']['name'];
                    if($nombre_archivo!="") {
                        $tipo_archivo = $_FILES['archivofirmado']['type'];
                        $tamano_archivo = $_FILES['archivofirmado']['size'];
                        $mensaje = "";    
                        //compruebo si las características del archivo son las que deseo
                        if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "pdf")))) {
                            $mensaje = "La extensión o el tamaño de los archivos no es correcta. Se permiten archivos .gif .jpg .pdf .png ";
                        }else{
                            if (move_uploaded_file($_FILES['archivofirmado']['tmp_name'],  "archivosgenerales/".$nombre_archivo)){
                                $archivotres =$nombre_archivo;
                            }else{
                                $mensaje =  "Ocurrió algún error al subir el fichero. No pudo guardarse.";
                            }
                        }
                    }
                    $objconsulta->guardarProcesoFinal($id,$nombre_archivo,$efecto,$correo);
                    echo "<script>alert('Proceso Terminado Correctamente');
                                window.location.href = 'home.php?ctr=proceso&acc=formacla';
                                </script>";
                break;
            }

        break;





        case "admon":
            $acc = $_GET['acc'];
            switch ($acc) {
                case "adminperfiles":
                    $listatemporales=$objconsulta->selectperfiles();
                    $listamenus=$objconsulta->selectmenus();
                    include('vistas/perfiles.php');
                break;

                
                case "cambiarclave":
                    $pass = $_POST['pass'];
                    $passverifi = $_POST['passverifi'];
                    if($pass!=$passverifi){
                        echo "<script>alert('Claves No Coinciden');
                        window.location.href = 'home.php?ctr=admon&acc=cambioclave';
                        </script>";  
                    } else {
                        $listamenus=$objconsulta->cambiarclavept($passverifi,$_SESSION['idusuario']);
                        echo "<script>alert('Clave Cambiada Correctamente');
                                    window.location.href = 'home.php?ctr=admon&acc=cambioclave';
                                    </script>";
                    }
                    
                break;

                case "cambioclave":
                    include('vistas/cambioclave.php');
                break;

                case "restaurarclave":
                    $perf = $_GET['perf'];
                    $usu = $_GET['usu'];
                    $listamenus=$objconsulta->restaurarclave($usu,$perf);
                    echo "<script>alert('Clave Restaurada Correctamente');
                                window.location.href = 'home.php?ctr=admon&acc=asigperfiles';
                                </script>";
                break;

                case "cambiarperfilusu":
                    $perf = $_GET['perf'];
                    $usu = $_GET['usu'];
                    $listamenus=$objconsulta->cambiarperfilgene($usu,$perf);
                    echo "<script>alert('Perfil Cambiado Correctamente');
                                window.location.href = 'home.php?ctr=admon&acc=asigperfiles';
                                </script>";
                break;

                case "eliminarusu":
                    $usu = $_GET['usu'];
                    $listamenus=$objconsulta->eliminarusu($usu);
                    echo "<script>alert('Usuario Eliminado Correctamente');
                                window.location.href = 'home.php?ctr=admon&acc=asigperfiles';
                                </script>";
                break;


                
                case "guardarnotificaciones":
                    $proceso = implode(",", $_POST['disciplinario']);
                    $accidentes = implode(",", $_POST['accidentes']);
                    $retiros = implode(",", $_POST['retiro']);
                    $seleccion = implode(",", $_POST['seleccion']);
                    $listamenus=$objconsulta->guardanotificausu($proceso,$accidentes,$retiros,$seleccion);
                    echo "<script>alert('Proceso Terminado Correctamente');
                                window.location.href = 'home.php?ctr=admon&acc=notificaciones';
                                </script>";


                break;

                case "notificaciones":
                    $listatemporales=$objconsulta->listadousuariosper();
                    $proceso=$objconsulta->obtenernoti('diciplinario');
                    $accidentes=$objconsulta->obtenernoti('accientes');
                    $retiro=$objconsulta->obtenernoti('retiro');
                    $procesoreq=$objconsulta->obtenernoti('retiro',"SI");
                    include('vistas/perfilesnoti.php');
                break;

                case "asigperfiles":
                    $listamenus=$objconsulta->selectperfiles();
                    $listatemporales=$objconsulta->selectperfilesusuario();
                    include('vistas/adminperfiles.php');
                break;

                case "creacionusuarios":
                    $listamenus=$objconsulta->selectperfiles();
                    $listacentros=$objconsulta->listacentros();
                    /*$listatemporales=$objconsulta->selectperfilesusuario();*/
                    include('vistas/registro.php');
                break;

                case "guardarUsuario":
                    $separado_por_comas = implode(",", $_POST['centrocostos']);
                    if($_POST['documento']!="" && $_POST['clave']==$_POST['clavere'] && $_POST['clave']!=""){
                        $ret=$objconsulta->valdiaryguardar($_POST['documento'],base64_encode($_POST['clave']),$_POST['nombre'],$_POST['correo'],$_POST['perfilinicial'],$separado_por_comas);
                        if($ret) {
                          echo "<script>alert('Usuario Creado Correctamente');";
                          echo "window.location.href = 'home.php?ctr=admon&acc=creacionusuarios';";
                          echo "</script>";
                        } else {
                          echo "<script>alert('Usuario Ya Creado en Sistema');";
                          echo "window.location.href = 'home.php?ctr=admon&acc=creacionusuarios';";
                          echo "</script>";
                    
                        }
                      } else {
                        echo "<script>alert('Complete la Informacion Correctamente');";
                        echo "window.location.href = 'home.php?ctr=admon&acc=creacionusuarios';";
                        echo "</script>";
                      }
                break;
                case "guardarpermisos":
                    $insert ="";
                    $id = $_POST['id'];
                    for($i=0;$i<100;$i++){
                        $info = "radio".$i;
                        $dato = $_POST["".$info.""];   
                        if ($dato !="" && $dato == "Si") {
                            $insert.="($id,$i),";
                        }

                    }
                    $listatemporales=$objconsulta->guardarperfiles($insert,$id);
                    echo "<script>alert('Perfil Configurado Correctamente');
                                window.location.href = 'home.php?ctr=admon&acc=adminperfiles';
                                </script>";
                break;

                case "guardarcitacion":

                    $id =$_POST['id'];
                    $nombre_archivo = date('Ymd').$_FILES['archivo3']['name'];
                    if($nombre_archivo!="") {
                        $tipo_archivo = $_FILES['archivo3']['type'];
                        $tamano_archivo = $_FILES['archivo3']['size'];
                        $mensaje = "";    
                        //compruebo si las características del archivo son las que deseo
                        if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "pdf")))) {
                            $mensaje = "La extensión o el tamaño de los archivos no es correcta. Se permiten archivos .gif .jpg .pdf .png ";
                        }else{
                            if (move_uploaded_file($_FILES['archivo3']['tmp_name'],  "archivosgenerales/".$nombre_archivo)){
                                $archivotres =$nombre_archivo;
                            }else{
                                $mensaje =  "Ocurrió algún error al subir el fichero. No pudo guardarse.";
                            }
                        }
                    }
                    $listatemporales=$objconsulta->enviarcitacionprocesoAcci($id,$nombre_archivo);
                    echo "<script>alert('Archivo Cargado Correctamente');
                        window.location.href = 'home.php?ctr=accidentes&acc=formprocesogest';
                        </script>";
                break;


                case "guardarconclucion":

                    $id =$_POST['id'];
                    $diasinca= $_POST['diasinca'];
                    $obser= $_POST['obser'];
                    $observaciones= $_POST['observaciones'];
                    $listatemporales=$objconsulta->enviarconclucionprocesoAcci($id,$diasinca,$obser,$observaciones);
                    echo "<script>alert('Guardado Correctamente');
                        window.location.href = 'home.php?ctr=accidentes&acc=formprocesogest';
                        </script>";
                break;

                case "formprocesogest":
                    $listatemporales=$objconsulta->obtenerProcesosGestAcci();
                    include('vistas/procesogestacci.php');
                break;    
                case "formacla":
                    $listatemporales=$objconsulta->obtenerProcesosGestjur();
                    include('vistas/procesogestacci.php');
                break;   
                case "notificar":

                    $id = $_GET['id'];

                    $listatemporales=$objconsulta->notificarProcesosAccidente($id);

                    echo "<script>alert('Accidente Notificado Correctamente');
                        window.location.href = 'home.php?ctr=accidentes&acc=listaaccidentes';
                        </script>";
                    
                break;
                case "formu":
                    if($_GET['id']>0) {
                        $listatemporales=$objconsulta->obtenerProcesosAccidentes($_GET['id'],"SI");
                    }
                    include('vistas/formprocesoaccidente.php');
                break;

                case "guardarsolicitud":
                    $id = $_POST['id'];
                    $funcionario = $_POST['funcionario'];
                    $cargo = $_POST['cargo'];
                    $lugartrabajo = $_POST['lugartrabajo'];
                    $jefe = $_POST['jefe'];
                    $fechaaccidente = $_POST['fechaaccidente'];
                    $descripcion = $_POST['descripcion'];
                    $listatemporales=$objconsulta->guardarprocesoAccidente($id,$funcionario,$cargo,$lugartrabajo,$jefe,$fechaaccidente,$descripcion);
                    echo "<script>alert('Reporte Guardado correctamente');
                        window.location.href = 'home.php?ctr=accidentes&acc=listaaccidentes';
                        </script>";
                break;

                case "guardarfinalproceso":
                    $id = $_POST['id'];
                    $efecto = $_POST['efecto'];
                    $correo = $_POST['correo'];
                    $archivotres = "";
                    $nombre_archivo = date('Ymd').$_FILES['archivofirmado']['name'];
                    if($nombre_archivo!="") {
                        $tipo_archivo = $_FILES['archivofirmado']['type'];
                        $tamano_archivo = $_FILES['archivofirmado']['size'];
                        $mensaje = "";    
                        //compruebo si las características del archivo son las que deseo
                        if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "pdf")))) {
                            $mensaje = "La extensión o el tamaño de los archivos no es correcta. Se permiten archivos .gif .jpg .pdf .png ";
                        }else{
                            if (move_uploaded_file($_FILES['archivofirmado']['tmp_name'],  "archivosgenerales/".$nombre_archivo)){
                                $archivotres =$nombre_archivo;
                            }else{
                                $mensaje =  "Ocurrió algún error al subir el fichero. No pudo guardarse.";
                            }
                        }
                    }
                    $objconsulta->guardarProcesoFinal($id,$nombre_archivo,$efecto,$correo);
                    echo "<script>alert('Proceso Terminado Correctamente');
                                window.location.href = 'home.php?ctr=proceso&acc=formacla';
                                </script>";
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
                    $datoempre = "Human";
                    $listatemporales=$objconsulta->obteneTemporales($datoempre);
                    $listatemporalesusuarias=$objconsulta->obteneTemporalesUsarias($datoempre);
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
                    if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "pdf")))) {
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

                case "guardarotro":
                    $nombre_archivo = "f".date('Ymd').$_FILES['filebutton']['name'];
                    $tipo_archivo = $_FILES['filebutton']['type'];
                    $tamano_archivo = $_FILES['filebutton']['size'];
                    $mensaje = "";    
                    //compruebo si las características del archivo son las que deseo
                    if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "pdf")))) {
                        $mensaje = "La extensión o el tamaño de los archivos no es correcta. Se permiten archivos .gif .jpg .pdf .png ";
                    }else{
                        if (move_uploaded_file($_FILES['filebutton']['tmp_name'],  "archivosgenerales/".$nombre_archivo)){
                            $objconsulta->guardarArchivootro($nombre_archivo,$_POST['id']);
                            $mensaje =  "El archivo ha sido cargado correctamente.";
                        }else{
                            $mensaje =  "Ocurrió algún error al subir el fichero. No pudo guardarse.";
                        }
                    }
                    echo "<script>alert('".$mensaje."');
                        window.location.href = 'home.php?ctr=requisicion&acc=listaCandidatos&id=".$_POST['idreq']."';
                        </script>";
                break;

                case "guardarhv":
                    $nombre_archivo = date('Ymd').$_FILES['filebutton']['name'];
                    $tipo_archivo = $_FILES['filebutton']['type'];
                    $tamano_archivo = $_FILES['filebutton']['size'];
                    $mensaje = "";    
                    //compruebo si las características del archivo son las que deseo
                    if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "pdf")))) {
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

                case "test":
                    /*
                    require_once 'vendor/autoload.php';
                    $archivoexa = "apertura1114.docx";
                    
                    $phpWord5 = new \PhpOffice\PhpWord\PhpWord();
                    $templateProcessor5 = new \PhpOffice\PhpWord\TemplateProcessor('archivosgenerales/'.$archivoexa);
                    $templateProcessor5 = new \PhpOffice\PhpWord\TemplateProcessor('archivosgenerales/'.$archivoexa);
                    for($i=0;$i<=12;$i++){
                        $pos = strpos($cadena, $i.",");
                        if ($pos === false) {
                            $templateProcessor5->setValue('e'.$i, "");
                        } else {
                            $templateProcessor5->setValue('e'.$i, "X");
                        }
                    }
                    for($i=0;$i<=30;$i++){
                        if($laboratorio==$i){
                            $templateProcessor5->setValue('l'.$i, "X");
                        } else {
                            $templateProcessor5->setValue('l'.$i, "");
                        }
                    }
                    $templateProcessor5->saveAs('archivosgenerales/'.$archivoexa);

                   /* \PhpOffice\PhpWord\Settings::setPdfRendererPath('tcpdf_min');
\PhpOffice\PhpWord\Settings::setPdfRendererName('TCPDF');
$xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($templateProcessor5 , 'PDF');
$xmlWriter->save('omar.pdf');*/

/*
    $phpWord = new \PhpOffice\PhpWord\PhpWord();
	\PhpOffice\PhpWord\Settings::setPdfRendererPath('dompdf/dompdf');
    \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');
    $rendererName =\PhpOffice\PhpWord\Settings::PDF_RENDERER_DOMPDF;
    $rendererLibraryPath = realpath('dompdf/dompdf');
    \PhpOffice\PhpWord\Settings::setPdfRenderer($rendererName, $rendererLibraryPath);
	
	$document = $phpWord->loadTemplate('archivosgenerales/'.$archivoexa);
	$document->saveAs('archivosgenerales/'.$archivoexa);
	$phpWord = \PhpOffice\PhpWord\IOFactory::load('archivosgenerales/'.$archivoexa);
    $xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord,'PDF');
    $newPdf = "HOLAPDF";
	$xmlWriter->save($newPdf);  // Save to PDF
	//unlink($temDoc);
                    /*$var = 'archivosgenerales/'.$archivoexa;
                    $content = shell_exec($var);
                    echo $content;
                    echo "<a href='{$var}'>Archivo</a>";*/

                
                require_once 'conversorwordpdf/vendor/autoload.php';
                //require_once 'vendor/autoload.php';



                    $objReader= \PhpOffice\PhpWord\IOFactory::createReader('Word2007');
                    $contents=$objReader->load("conversorwordpdf/examenes.docx");

                    $rendername= \PhpOffice\PhpWord\Settings::PDF_RENDERER_TCPDF;

                    $renderLibrary="conversorwordpdf/tcpdf";
                    $renderLibraryPath=''.$renderLibrary;
                    if(!\PhpOffice\PhpWord\Settings::setPdfRenderer($rendername,$renderLibrary)){
                        die("Provide Render Library And Path");
                    }
                    $renderLibraryPath=''.$renderLibrary;
                    $objWriter= \PhpOffice\PhpWord\IOFactory::createWriter($contents,'PDF');
                    $objWriter->save("conversorwordpdf/testaaaaa.pdf");


                    ?>
                    <a href="conversorwordpdf/testaaaaa.pdf">testaaaaa.pdf</a>
<?php
                 
                
                break;
                
                case "ordenmedica":
                    $cadena = "";
                    foreach ($_POST as $clave => $valor) {
                        $pos = strpos($clave, "exalaboratorio");
                        if ($pos === false) {
                        } else {
                            if($valor=='S'){
                                $datagen = explode("exalaboratorio",$clave);
                                $cadena.=$datagen[1].",";
                            }
                        }
                
                    }
                    $laboratorio = $_POST['laboratorio'];
                    $idper = $_POST['id'];
                    $idreq = $_POST['idreq'];
                    
                    require_once 'vendor/autoload.php';
                    $archivoexa = "examen".$idper.$idreq.".docx";
                    $phpWord5 = new \PhpOffice\PhpWord\PhpWord();
                    $templateProcessor5 = new \PhpOffice\PhpWord\TemplateProcessor('archivosgenerales/'.$archivoexa);
                    for($i=0;$i<=12;$i++){
                        $pos = strpos($cadena, $i.",");
                        if ($pos === false) {
                            $templateProcessor5->setValue('e'.$i, "");
                        } else {
                            $templateProcessor5->setValue('e'.$i, "X");
                        }
                    }
                    for($i=0;$i<=30;$i++){
                        if($laboratorio==$i){
                            $templateProcessor5->setValue('l'.$i, "X");
                        } else {
                            $templateProcessor5->setValue('l'.$i, "");
                        }
                    }
                    $templateProcessor5->saveAs('archivosgenerales/'.$archivoexa);
                    $listadoreq=$objconsulta->ajustarlaboratorio($idper,$idreq,$laboratorio,$cadena);
                    echo "<script>alert('Informacion Guardada Correctamente');
                    window.location.href = 'home.php?ctr=requisicion&acc=listaCandidatos&id=".$idreq."';
                    </script>";
                break;

                case "ajustarorden":
    
                    $idper = $_POST['id'];
                    $idreq = $_POST['idreq'];
                    $salario = $_POST['salario'];
                    $tasa = $_POST['tasa'];
                    $direccion = $_POST['direccion'];
                    $presentarse = $_POST['presentarse'];
                    $fechainicio = $_POST['fechainicio'];
                    $orden = $_POST['orden'];
                    require_once 'vendor/autoload.php';
                    $archivoexa = $orden;
                    $phpWord5 = new \PhpOffice\PhpWord\PhpWord();
                    $templateProcessor5 = new \PhpOffice\PhpWord\TemplateProcessor('archivosgenerales/'.$archivoexa);
                    $templateProcessor5->setValue('tasa', $tasa);
                    $templateProcessor5->setValue('direcciontrabajo', $direccion);
                    $templateProcessor5->setValue('nombrepresente', $presentarse);
                    $templateProcessor5->setValue('salario', "$".number_format($salario,2,",","."));
                    $templateProcessor5->saveAs('archivosgenerales/'.$archivoexa);
                    $listadoreq=$objconsulta->ajustarorden($idper,$idreq,$tasa,$salario,$presentarse,$direccion,$fechainicio);
                    echo "<script>alert('Informacion Guardada Correctamente');
                    window.location.href = 'home.php?ctr=requisicion&acc=verreqcan&id=".$idreq."';
                    </script>";
                break;

                case "enviardocumentacion":
                    $idper = $_GET["idper"];
                    $idreq = $_GET["idreq"];
                    $listadearchivos=$objconsulta->archivosatrasformar($idper,$idreq);
                    require_once 'conversorwordpdf/vendor/autoload.php';
                    $nombrearchivo = $listadearchivos['ordeningreso'];
                    $nombre = str_replace(".docx","",$nombrearchivo);
                    //echo $nombre;
                    $archivoouput = $nombre.".pdf";
                    $objReader= \PhpOffice\PhpWord\IOFactory::createReader('Word2007');
                    $contents=$objReader->load("archivosgenerales/".$nombrearchivo);
                    $rendername= \PhpOffice\PhpWord\Settings::PDF_RENDERER_TCPDF;
                    $renderLibrary="conversorwordpdf/tcpdf";
                    $renderLibraryPath=''.$renderLibrary;
                    if(!\PhpOffice\PhpWord\Settings::setPdfRenderer($rendername,$renderLibrary)){
                        die("Provide Render Library And Path");
                    }
                    $renderLibraryPath=''.$renderLibrary;
                    $objWriter= \PhpOffice\PhpWord\IOFactory::createWriter($contents,'PDF');
                    $objWriter->save("archivosgenerales/".$archivoouput);
                    
                    $nombrearchivo = $listadearchivos['docdocumen'];
                    $nombre = str_replace(".docx","",$nombrearchivo);
                    //echo $nombre;
                    $archivoouput = $nombre.".pdf";
                    $objReader= \PhpOffice\PhpWord\IOFactory::createReader('Word2007');
                    $contents=$objReader->load("archivosgenerales/".$nombrearchivo);
                    $rendername= \PhpOffice\PhpWord\Settings::PDF_RENDERER_TCPDF;
                    $renderLibrary="conversorwordpdf/tcpdf";
                    $renderLibraryPath=''.$renderLibrary;
                    if(!\PhpOffice\PhpWord\Settings::setPdfRenderer($rendername,$renderLibrary)){
                        die("Provide Render Library And Path");
                    }
                    $renderLibraryPath=''.$renderLibrary;
                    $objWriter= \PhpOffice\PhpWord\IOFactory::createWriter($contents,'PDF');
                    $objWriter->save("archivosgenerales/".$archivoouput);
                   
                    $nombrearchivo = $listadearchivos['hvhuman'];
                    $nombre = str_replace(".docx","",$nombrearchivo);
                    //echo $nombre;
                    $archivoouput = $nombre.".pdf";
                    $objReader= \PhpOffice\PhpWord\IOFactory::createReader('Word2007');
                    $contents=$objReader->load("archivosgenerales/".$nombrearchivo);
                    $rendername= \PhpOffice\PhpWord\Settings::PDF_RENDERER_TCPDF;
                    $renderLibrary="conversorwordpdf/tcpdf";
                    $renderLibraryPath=''.$renderLibrary;
                    if(!\PhpOffice\PhpWord\Settings::setPdfRenderer($rendername,$renderLibrary)){
                        die("Provide Render Library And Path");
                    }
                    $renderLibraryPath=''.$renderLibrary;
                    $objWriter= \PhpOffice\PhpWord\IOFactory::createWriter($contents,'PDF');
                    $objWriter->save("archivosgenerales/".$archivoouput);


                    $nombrearchivo = $listadearchivos['examen'];
                    $nombre = str_replace(".docx","",$nombrearchivo);
                    //echo $nombre;
                    $archivoouput = $nombre.".pdf";
                    $objReader= \PhpOffice\PhpWord\IOFactory::createReader('Word2007');
                    $contents=$objReader->load("archivosgenerales/".$nombrearchivo);
                    $rendername= \PhpOffice\PhpWord\Settings::PDF_RENDERER_TCPDF;
                    $renderLibrary="conversorwordpdf/tcpdf";
                    $renderLibraryPath=''.$renderLibrary;
                    if(!\PhpOffice\PhpWord\Settings::setPdfRenderer($rendername,$renderLibrary)){
                        die("Provide Render Library And Path");
                    }
                    $renderLibraryPath=''.$renderLibrary;
                    $objWriter= \PhpOffice\PhpWord\IOFactory::createWriter($contents,'PDF');
                    $objWriter->save("archivosgenerales/".$archivoouput);

                    $nombrearchivo = $listadearchivos['apertura'];
                    $nombre = str_replace(".docx","",$nombrearchivo);
                    //echo $nombre;
                    $archivoouput = $nombre.".pdf";
                    $objReader= \PhpOffice\PhpWord\IOFactory::createReader('Word2007');
                    $contents=$objReader->load("archivosgenerales/".$nombrearchivo);
                    $rendername= \PhpOffice\PhpWord\Settings::PDF_RENDERER_TCPDF;
                    $renderLibrary="conversorwordpdf/tcpdf";
                    $renderLibraryPath=''.$renderLibrary;
                    if(!\PhpOffice\PhpWord\Settings::setPdfRenderer($rendername,$renderLibrary)){
                        die("Provide Render Library And Path");
                    }
                    $renderLibraryPath=''.$renderLibrary;
                    $objWriter= \PhpOffice\PhpWord\IOFactory::createWriter($contents,'PDF');
                    $objWriter->save("archivosgenerales/".$archivoouput);
                
                    $listadoreq=$objconsulta->enviardocumentacion($idper,$idreq);
                    echo "<script>alert('Informacion Guardada Correctamente');
                window.location.href = 'home.php?ctr=requisicion&acc=listaCandidatos&id=".$idreq."';
                </script>";
                    
                break;

                case "listaCandidatos":
                    $idreq = $_GET["id"];
                    $tituloaaa ="";
                    $tituloaaa=$objconsulta->obtenerreqinfo($idreq);
                    $listadoreq=$objconsulta->obtenercandidatos($idreq);
                    $laboratorios=$objconsulta->obtenerLaboratorios();
                    include('vistas/listadoyformcandidatos.php');
                break;

                case "aceptarcandidato":
                    $idper = $_GET["idper"];
                    $idreq = $_GET["idreq"];
                    $listadoreq=$objconsulta->obtenerInformacionreq($idper);
                    if ($listadoreq[0]['salariobasico'] == "") {
                        $listadoreq[0]['salariobasico'] = 0;
                    }
                    $archivo = "orden".$idper.date('YMDS').".docx";
                    $orden = $archivo;
                    require_once 'vendor/autoload.php';
                    // Creating the new document...
                    $phpWord = new \PhpOffice\PhpWord\PhpWord();
                    $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('plantillas/orden.docx');
                    $templateProcessor->setValue('empresacliente', $listadoreq[0]['empresacliente']);
                    $templateProcessor->setValue('empresatem', $listadoreq[0]['nombretemporal']);
                    $templateProcessor->setValue('nombre', $listadoreq[0]['nombre']);
                    $templateProcessor->setValue('cedula', $listadoreq[0]['cedula']);
                    $templateProcessor->setValue('telefono', $listadoreq[0]['telefono']);
                    $templateProcessor->setValue('correo', $listadoreq[0]['correo']);
                    $templateProcessor->setValue('celular', $listadoreq[0]['telefono']);
                    $templateProcessor->setValue('fechaingreso', $listadoreq[0]['fechareqcargo']);
                    $templateProcessor->setValue('cargodesempenar', $listadoreq[0]['cargo']);
                    //$templateProcessor->setValue('salario', "$".number_format($listadoreq[0]['salariobasico'],2,",","."));
                    //$templateProcessor->setValue('tasa', '');
                    $templateProcessor->setValue('date', date('Y-m-d'));
                    //$templateProcessor->setValue('direcciontrabajo', '');
                    $templateProcessor->setValue('ciudad', $listadoreq[0]['ciudadlaboral']);
                    //$templateProcessor->setValue('nombrepresente', '');
                    $templateProcessor->setValue('horario', $listadoreq[0]['jornadalaboral']." ".$listadoreq[0]['horario']);
                    $templateProcessor->saveAs('archivosgenerales/'.$archivo);
                    $archivo = "docdocumen".$idper.date('Ymds').".docx";
                    $documentos = $archivo;
                    $phpWord2 = new \PhpOffice\PhpWord\PhpWord();
                    $templateProcessor2 = new \PhpOffice\PhpWord\TemplateProcessor('plantillas/documentacion.docx');
                    $templateProcessor2->setValue('empresacliente', $listadoreq[0]['empresacliente']);
                    $templateProcessor2->setValue('empresatem', $listadoreq[0]['nombretemporal']);
                    $templateProcessor2->setValue('nombre', $listadoreq[0]['nombre']);
                    $templateProcessor2->setValue('cedula', $listadoreq[0]['cedula']);
                    $templateProcessor2->setValue('telefono', $listadoreq[0]['telefono']);
                    $templateProcessor2->setValue('celular', $listadoreq[0]['telefono']);
                    $templateProcessor2->setValue('correo', $listadoreq[0]['correo']);
                    $templateProcessor2->setValue('fechaingreso', $listadoreq[0]['fechareqcargo']);
                    $templateProcessor2->setValue('cargodesempenar', $listadoreq[0]['cargo']);
                    $templateProcessor2->setValue('date', date('Y-m-d'));
                    $templateProcessor2->setValue('salario', "$".number_format($listadoreq[0]['salariobasico'],2,",","."));
                    $templateProcessor2->setValue('tasa', '');
                    $templateProcessor2->setValue('direcciontrabajo', '');
                    $templateProcessor2->setValue('ciudad', $listadoreq[0]['ciudadlaboral']);
                    $templateProcessor2->setValue('nombrepresente', '');
                    $templateProcessor2->setValue('horario', $listadoreq[0]['jornadalaboral']." ".$listadoreq[0]['horario']);
                    $templateProcessor2->saveAs('archivosgenerales/'.$archivo);
                    $archivo = "hv".$idper.date('Ymds').".docx";
                    $hv = $archivo;
                    $phpWord3 = new \PhpOffice\PhpWord\PhpWord();
                    $templateProcessor3 = new \PhpOffice\PhpWord\TemplateProcessor('plantillas/formatohv.docx');
                    $templateProcessor3->setValue('empresacliente', $listadoreq[0]['empresacliente']);
                    $templateProcessor3->setValue('empresatem', $listadoreq[0]['nombretemporal']);
                    $templateProcessor3->setValue('nombre', $listadoreq[0]['nombre']);
                    $templateProcessor3->setValue('cedula', $listadoreq[0]['cedula']);
                    $templateProcessor3->setValue('telefono', $listadoreq[0]['telefono']);
                    $templateProcessor3->setValue('celular', $listadoreq[0]['telefono']);
                    $templateProcessor3->setValue('correo', $listadoreq[0]['correo']);
                    $templateProcessor3->setValue('fechaingreso', $listadoreq[0]['fechareqcargo']);
                    $templateProcessor3->setValue('cargodesempenar', $listadoreq[0]['cargo']);
                    $templateProcessor3->setValue('date', date('Y-m-d'));
                    $templateProcessor3->setValue('salario', "$".number_format($listadoreq[0]['salariobasico'],2,",","."));
                    $templateProcessor3->setValue('tasa', '');
                    $templateProcessor3->setValue('direcciontrabajo', '');
                    $templateProcessor3->setValue('ciudad', $listadoreq[0]['ciudadlaboral']);
                    $templateProcessor3->setValue('nombrepresente', '');
                    $templateProcessor3->setValue('horario', $listadoreq[0]['jornadalaboral']." ".$listadoreq[0]['horario']);
                    $templateProcessor3->saveAs('archivosgenerales/'.$archivo);
                    $archivoaper = "apertura".$idper.$idreq.".docx";
                    $phpWord4 = new \PhpOffice\PhpWord\PhpWord();
                    $templateProcessor4 = new \PhpOffice\PhpWord\TemplateProcessor('plantillas/aperturacuenta.docx');
                    $templateProcessor4->setValue('empresacliente', $listadoreq[0]['empresacliente']);
                    $templateProcessor4->setValue('empresatem', $listadoreq[0]['nombretemporal']);
                    $templateProcessor4->setValue('nombre', $listadoreq[0]['nombre']);
                    $templateProcessor4->setValue('cedula', $listadoreq[0]['cedula']);
                    $templateProcessor4->setValue('telefono', $listadoreq[0]['telefono']);
                    $templateProcessor4->setValue('celular', $listadoreq[0]['telefono']);
                    $templateProcessor4->setValue('correo', $listadoreq[0]['correo']);
                    $templateProcessor4->setValue('fechaingreso', $listadoreq[0]['fechareqcargo']);
                    $templateProcessor4->setValue('cargodesempenar', $listadoreq[0]['cargo']);
                    $templateProcessor4->setValue('date', date('d-m-Y'));
                    $templateProcessor4->setValue('salario', "$".number_format($listadoreq[0]['salariobasico'],2,",","."));
                    $templateProcessor4->setValue('tasa', '');
                    $templateProcessor4->setValue('direcciontrabajo', '');
                    $templateProcessor4->setValue('ciudad', $listadoreq[0]['ciudadlaboral']);
                    $templateProcessor4->setValue('nombrepresente', '');
                    $templateProcessor4->setValue('horario', $listadoreq[0]['jornadalaboral']." ".$listadoreq[0]['horario']);
                    $templateProcessor4->saveAs('archivosgenerales/'.$archivoaper);
                    $archivoexa = "examen".$idper.$idreq.".docx";
                    $phpWord5 = new \PhpOffice\PhpWord\PhpWord();
                    $templateProcessor5 = new \PhpOffice\PhpWord\TemplateProcessor('plantillas/examenes.docx');
                    $templateProcessor5->setValue('empresacliente', $listadoreq[0]['empresacliente']);
                    $templateProcessor5->setValue('empresatem', $listadoreq[0]['nombretemporal']);
                    $templateProcessor5->setValue('nombre', $listadoreq[0]['nombre']);
                    $templateProcessor5->setValue('cedula', $listadoreq[0]['cedula']);
                    $templateProcessor5->setValue('telefono', $listadoreq[0]['telefono']);
                    $templateProcessor5->setValue('celular', $listadoreq[0]['telefono']);
                    $templateProcessor5->setValue('correo', $listadoreq[0]['correo']);
                    $templateProcessor5->setValue('fechaingreso', $listadoreq[0]['fechareqcargo']);
                    $templateProcessor5->setValue('cargodesempenar', $listadoreq[0]['cargo']);
                    $templateProcessor5->setValue('date', date('d-m-Y'));
                    $templateProcessor5->setValue('salario', "$".number_format($listadoreq[0]['salariobasico'],2,",","."));
                    $templateProcessor5->setValue('tasa', '');
                    $templateProcessor5->setValue('direcciontrabajo', '');
                    $templateProcessor5->setValue('ciudad', $listadoreq[0]['ciudadlaboral']);
                    $templateProcessor5->setValue('nombrepresente', '');
                    $templateProcessor5->setValue('horario', $listadoreq[0]['jornadalaboral']." ".$listadoreq[0]['horario']);
                    $templateProcessor5->saveAs('archivosgenerales/'.$archivoexa);
                    $listadoreq=$objconsulta->actualizarformatos($idper,$idreq,$orden,$documentos,$hv);
                    echo "<script>alert('Aprobacion Realizada Correctamente');
                            window.location.href = 'home.php?ctr=requisicion&acc=verreqcan&id=".$idreq."';
                         </script>";
                break;

                case "guardarNuevoCandidato":
                    $idreq = $_POST['id'];
                    $idcand = $_POST['idcand'];
                    $nombre = $_POST['nombre'];
                    $cedula = $_POST['cedula'];
                    $telefono = $_POST['telefono'];
                    $correo = $_POST['correo'];
                    $direccioncan = $_POST['direccioncan'];
                    $barriocan = $_POST['barriocan'];
                    $ciudad = $_POST['ciudad'];
                    $guardarcan = $objconsulta->guardarCandidato($idreq,
                        $nombre,
                        $cedula,
                        $telefono,
                        $correo,
                        $direccioncan,
                        $barriocan,
                        $ciudad,
                        $idcand
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
                   $strsta= $_POST['estadocivil'];
                   $checkgenero=$_POST['checkgenero'];
                   $strstagene= $_POST['generos'];
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
                    //$objconsulta->altareq($lastid);
                    $enviarcorreo = $objconsulta->enviarCorreoReq($empresaclientet,$lastid);
                    echo "<script>alert('Informacion Guardada Correctamente ');
                window.location.href = 'home.php?ctr=requisicion&acc=verreqcan&id={$lastid}';
                </script>";
                break;

                case 'verreqcan':
                    $lastid=$_GET['id'];
                    $listadoreq=$objconsulta->obteneMisRescreadas($lastid);
                    $listadoreq=$objconsulta->obtenercandidatos($lastid,"estado in('E','P','A','R')");
                    include('vistas/miscandidatos.php');
                break;

                case 'citar':
                    $fechahora=$_POST['fechahora'];
                    $hora=$_POST['hora'];
                    $fechahora = $fechahora." ".$hora;
                    $id_req=$_POST['id_req'];
                    $id_per=$_POST['id_per'];
                    $lugarentre=$_POST['lugarentre'];
                    $listadoreq=$objconsulta->citarcandidato($id_per,$id_req,$fechahora,$lugarentre);

                    echo "<script>alert('Candidato Citado Correctamente ');
                    window.location.href = 'home.php?ctr=requisicion&acc=verreqcan&id={$id_req}';
                    </script>";
                break;

                case 'conclusionentrevistac':
                    $concuentre=$_POST['concuentre'];
                    $id_req=$_POST['id_req'];
                    $id_per=$_POST['id_per'];
                    $listadoreq=$objconsulta->conclucioncitacitacionc($id_per,$id_req,$concuentre);

                    echo "<script>alert('Guardado Correctamente');
                    window.location.href = 'home.php?ctr=requisicion&acc=verreqcan&id={$id_req}';
                    </script>";
                break;

                case 'rechazo':
                    $rechazo=$_POST['rechazo'];
                    $id_req=$_POST['id_req'];
                    $id_per=$_POST['id_per'];
                    $listadoreq=$objconsulta->rechazarcandidato($id_per,$id_req,$rechazo);
                    echo "<script>alert('Candidato Rechazado Correctamente');
                    window.location.href = 'home.php?ctr=requisicion&acc=verreqcan&id={$id_req}';
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
                $_SESSION["paso"]=2;
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
                    $_SESSION["paso"]=3;

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
                     $_SESSION["paso"]=4;
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
                    $campossql = "id_req,id_can,observacionesfami,conceptofinal,observacioneslabo,observacionesestu";
                    $camposvalue = "{$_POST['idreq']},{$_POST['idcan']},'{$_POST['observacionesfami']}','{$_POST['conceptofinal']}','{$_POST['observacioneslabo']}','{$_POST['observacionesestu']}'";
                    foreach ($datos as $clave => $valor) {
                        foreach ($valor as $llavegene => $valorgene) {
                            $campossql.=",{$llavegene}";
                            $camposvalue.=",'{$valorgene}'";
                        }
                        
                    }
                    $sql = "INSERT INTO entrevistas (".$campossql.") VALUES (".$camposvalue.")";
                    $objconsulta->guardarEntre($sql,$_POST['idreq'],$_POST['idcan']);
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
                $_SESSION["paso"]=5;
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