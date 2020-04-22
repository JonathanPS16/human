<?php
//print_r($_POST);
    $documento=$_POST['documento'];
    $contrato=$_POST['contrato'];
    $anio=$_POST['anio'];    
    if($contrato=="")
    {$carpeta=$documento;}
    else
    {$carpeta=$documento.'_'.$contrato;}
    
    //echo $carpeta;
    //$ruta='/carpeta/'.$carpeta;
    
    switch ($anio) {
    case 2017:
            $ruta='/home4/byvnilval/public_html/humantalentsas.com/contabilidad/carpetas_empleados/HV_2017/'.$carpeta;
   	    $rutadoc='/contabilidad/carpetas_empleados/HV_2017/'.$carpeta;
        break;
    case 2018:
           $ruta='/home4/byvnilval/public_html/humantalentsas.com/contabilidad/carpetas_empleados/HV_2018/'.$carpeta;
           $rutadoc='/contabilidad/carpetas_empleados/HV_2018/'.$carpeta;
        break;
    case 2019:
            $ruta='/home4/byvnilval/public_html/humantalentsas.com/contabilidad/carpetas_empleados/HV_2019/'.$carpeta;
            $rutadoc='/contabilidad/carpetas_empleados/HV_2019/'.$carpeta;
        break;
}
    
   
   
    
    //Creamos Nuestra Función
    function listFiles($directorio,$rutadoc){ //La función recibira como parametro un directorio
        if (is_dir($directorio)) { //Comprovamos que sea un directorio Valido
            if ($dir = opendir($directorio)) {//Abrimos el directorio
                
                echo '<div class="lista-archivos"><ul>'; //Abrimos una lista HTML para mostrar los archivos
                
                while (($archivo = readdir($dir)) !== false){ //Comenzamos a leer archivo por archivo
                    
                    if ($archivo != '.' && $archivo != '..'){//Omitimos los archivos del sistema . y ..
                        
                        $nuevaRuta = $directorio.$archivo.'/';//Creamos unaruta con la ruta anterior y el nombre del archivo actual
                        
                        //$nuevaRuta2 = $directorio.'/'.$archivo;
                        $nuevaRuta2 = $rutadoc.'/'.$archivo;
                        
                        
                        echo '<li>'; //Abrimos un elemento de lista
                        
                        if (is_dir($nuevaRuta)) { //Si la ruta que creamos es un directorio entonces:
                            echo '<b>'.$nuevaRuta.'</b>'; //Imprimimos la ruta completa resaltandola en negrita
                            listFiles($nuevaRuta);//Volvemos a llamar a este metodo para que explore ese directorio.
                            
                        } else { //si no es un directorio:
                            //echo 'Archivo: '.$archivo; //simplemente imprimimos el nombre del archivo actual
                            echo "<a href=\"".$nuevaRuta2."\" target='_blank'>".'Archivo: '.$archivo."</a><br/>";
                        }
                        echo'</li>'; //Cerramos el item actual y se inicia la llamada al siguiente archivo
                        
                    }
                    
                }//finaliza While
                echo '</ul></div>';//Se cierra la lista
                echo '<table class="table">
                <thead>
                  <tr>
                    <th scope="col">Descripci&oacute;n Documento&nbsp;</th>
                    <th scope="col">Parte del Nombre Archivo.pdf&nbsp;</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Hoja de Vida</td>
                    <td>HV</td>
                  </tr>
                  <tr>
                    
                    <td>Pruebas Psicot&eacute;cnicas</td>
                    <td>PS</td>
                    
                  </tr>
                  <tr>
                    
                    <td>Entrevista</td>
                    <td>EN</td>
                    
                  </tr>
                  <tr>
                    
                    <td>Referenciación</td>
                    <td>RF</td>
                    
                  </tr>

                  <tr>
                    
                    <td>Orden Ingreso</td>
                    <td>OI</td>
                    
                  </tr>

                  <tr>
                    
                    <td>Examen Médico de Ingreso</td>
                    <td>EX</td>
                    
                  </tr>

                  <tr>
                    
                    <td>Documentos</td>
                    <td>DT</td>
                    
                  </tr>
                  <tr>
                    
                    <td>Afiliaciones</td>
                    <td>AF</td>
                    
                  </tr>
                  <tr>
                    
                    <td>Contrato de Trabajo</td>
                    <td>CT</td>
                    
                  </tr>
                  <tr>
                    
                    <td>Procesos Administrativos</td>
                    <td>PA</td>
                    
                  </tr>
                  <tr>
                    
                    <td>Incapacidad</td>
                    <td>IN</td>
                    
                  </tr>
                  <tr>
                    
                    <td>Liquidación Contrato</td>
                    <td>LC</td>
                    
                  </tr>
                </tbody>
              </table>';
                
                closedir($dir);//Se cierra el archivo
            }
        }else{//Finaliza el If de la linea 12, si no es un directorio valido, muestra el siguiente mensaje
            echo '<div class="error-colaboradores">No Existe infomraci&oacute;n relacioanda al número de documento y contrato</div>'.'<br/><br/>';
        }
    }//Fin de la Función
    
    //Llamamos a la función y le pasamos el nombre de nuestro directorio.
    listFiles($ruta,$rutadoc);
    ?>
<br><br><br>
<div class="form-group">
  <div class="col-md-8">
    <a href="home.php?ctr=buscardorCarpetas&acc=buscador" class="btn btn-primary">Nueva Consulta</a>
  </div>
</div>