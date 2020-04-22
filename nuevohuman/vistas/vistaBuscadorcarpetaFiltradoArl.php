<?php
	    $anyo=$_POST['anyo'];

	    $mes=$_POST['mes'];

	    $nombre=$_POST['documento'];	


    $nombre=$nombre.".pdf";

    $carpeta=$anyo.'_'.$mes;



  // $ruta='carpeta/'.$carpeta;/home4/byvnilval/public_html/humantalentsas.com/folderarl/carpeta.php

    $ruta='/home4/byvnilval/public_html/humantalentsas.com/contabilidad/carpetas_empleados/Seguridad_Social/'.$carpeta;

   //$rutadoc='carpeta/'.$carpeta;https://humantalentsas.com/contabilidad/carpetas_empleados/Seguridad_Social

   

   $rutadoc='/contabilidad/carpetas_empleados/Seguridad_Social/'.$carpeta;

    //$rutadoc='/contabilidad/carpetas_empleados/Seguridad_Social/'.$carpeta;

    //Creamos Nuestra Función

    function listFiles($directorio,$rutadoc,$nombre){ //La función recibira como parametro un directorio
      $encontrar=0;
        if (is_dir($directorio)) { //Comprovamos que sea un directorio Valido

            if ($dir = opendir($directorio)) {//Abrimos el directorio

                

                echo '<div class="lista-archivos"><ul>'; //Abrimos una lista HTML para mostrar los archivos

                

                while (($archivo = readdir($dir)) !== false){ //Comenzamos a leer archivo por archivo

                    

                    if ($archivo != '.' && $archivo != '..'){//Omitimos los archivos del sistema . y ..

                        

                        $nuevaRuta = $directorio.$archivo.'/';//Creamos unaruta con la ruta anterior y el nombre del archivo actual
                        
                        

                        $nuevaRuta2 = $rutadoc.'/'.$archivo;
                        //echo $nuevaRuta2."<br>";
                        $documentoArchivo=explode(" ", $archivo);

                        //echo $documentoArchivo[1]."<br>";

                        if($nombre==$documentoArchivo[1])

                        {

                            echo '<li>'; //Abrimos un elemento de lista 

                            echo "<a href=\"".$nuevaRuta2."\" target='_blank'>".'Archivo: '.$archivo."</a><br/><br/>"; 

                            echo'</li>'; //Cerramos el item actual y se inicia la llamada al siguiente archivo

                            $encontrar=1;

                          break;

                        }

                   

                    }

                    

                }//finaliza While

                             

                closedir($dir);//Se cierra el archivo

                if($encontrar==0){ echo '<div class="error-colaboradores">No Existe infomraci&oacute;n relacioanda al número de documento </div>'.'<br/><br/>';

                    ; }

                

            }

        }else{//Finaliza el If de la linea 12, si no es un directorio valido, muestra el siguiente mensaje

            echo '<div class="error-colaboradores">No Existe infomraci&oacute;n relacioanda al número de documento y el periodo seleccionado</div>'.'<br/><br/>';

        }

    }//Fin de la Función

    

    //Llamamos a la función y le pasamos el nombre de nuestro directorio.

    listFiles($ruta,$rutadoc,$nombre);

    ?>
<br>
<div class="form-group">
  <div class="col-md-8">
    <a href="home.php?ctr=buscardorCarpetas&acc=buscador" class="btn btn-primary">Nueva Consulta</a>
  </div>
</div>
