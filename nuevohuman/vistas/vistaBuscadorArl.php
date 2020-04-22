<br><?php
//anyoarl=$anyoarl&mesarl=$mesarl&documento=$numero&colaborador=1


	//if($_GET['colaborador']==1)
	//{
	    $anyo=$anyoarl;
		$mes=$mesarl;
		 
		if(strlen($mes)==1){
			$mes="0".$mes;
		}
	    $nombre=$numero;	
	   
	/*}else
	
	    $anyo=$_POST['anyo'];
	    $mes=$_POST['mes'];
	    $nombre=$_POST['documento'];	
	}*/
    $nombre=$nombre.".pdf";
    $carpeta=$anyo.'_'.$mes;
  // $ruta='carpeta/'.$carpeta;
    $ruta='/home4/byvnilval/public_html/humantalentsas.com/contabilidad/carpetas_empleados/Seguridad_Social/'.$carpeta;
   //$rutadoc='carpeta/'.$carpeta;
    $rutadoc='/contabilidad/carpetas_empleados/Seguridad_Social/'.$carpeta;
    //Creamos Nuestra Función
	function listFiles($directorio,$rutadoc,$nombre){ //La función recibira como parametro un directorio
		
        if (is_dir($directorio)) { //Comprovamos que sea un directorio Valido
            if ($dir = opendir($directorio)) {//Abrimos el directorio
                
                echo '<div class="lista-archivos"><ul>'; //Abrimos una lista HTML para mostrar los archivos
                
                while (($archivo = readdir($dir)) !== false){ //Comenzamos a leer archivo por archivo
                    
                    if ($archivo != '.' && $archivo != '..'){//Omitimos los archivos del sistema . y ..
                        
                        $nuevaRuta = $directorio.$archivo.'/';//Creamos unaruta con la ruta anterior y el nombre del archivo actual
                        
                        $nuevaRuta2 = $rutadoc.'/'.$archivo;
                        $documentoArchivo=explode(" ", $archivo);
                        
                        if($nombre==$documentoArchivo[1])
                        {
                            echo ''; //Abrimos un elemento de lista 
                            echo "<a class='btn btn-info' href=\"".$nuevaRuta2."\" target='_blank'>".'Archivo: '.$archivo."</a><br/><br/>"; 
                            echo'<br>'; //Cerramos el item actual y se inicia la llamada al siguiente archivo
                            $encontrar=1;
                            break;
                        }else
                        {
                            $encontrar=0;
                            //break;
                        }
                   
                    }
                    
                }//finaliza While
                             
                closedir($dir);//Se cierra el archivo
                if($encontrar==0){ echo '<div class="error-colaboradores">No Existe infomraci&oacute;n relacioanda al número de documento </div>'.'<br/><br/>';
                    ; }
                
            }
        }else{//Finaliza el If de la linea 12, si no es un directorio valido, muestra el siguiente mensaje
            echo '<div class="error-colaboradores">Carpeta No Encontrada</div>'.'<br/><br/>';
        }
    }//Fin de la Función
    
	//Llamamos a la función y le pasamos el nombre de nuestro directorio.

    listFiles($ruta,$rutadoc,$nombre);
    ?>
<div class="form-group">
  <div class="col-md-8">
    <a href="home.php?ctr=buscardorCertificados&acc=buscador" class="btn btn-primary">Nueva Consulta</a>
  </div>
</div>
