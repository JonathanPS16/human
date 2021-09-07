
<h5>Informacion General </h5><br>
<div class="form-group">
  <div class="col-md-8">
    <?php 
    if(isset($_GET['distinto']) && $_GET['distinto']=="S"){
      $da ="buscadorempleados";
    } else {
      $da ="buscador";
    }
    ?>
    <a href="home.php?ctr=buscardorCarpetas&acc=<?php echo $da;?>" class="btn btn-primary">Nueva Consulta</a>
  </div>
</div><br>
<?php if(isset($_GET['distinto']) && $_GET['distinto']=="S"){
  for($i=0; $i<count($certificados);$i++){
  ?><table class="table table-striped table-bordered">

		<tr>
			<th>Contrato</th><td><?php echo $certificados[$i]['contrato'];?></td></tr>
			<tr><th>Nombre Empleado</th><td><?php echo $certificados[$i]['nombre_empleado'];?></td></tr>
      <tr>	<th>Cedula</th><td><?php echo $certificados[$i]['cedula'];?></td></tr>
			<tr><th>Fecha Ingreso</th><td><?php echo $certificados[$i]['fecha_ingreso'];?></td></tr>
			<tr><th>Genero</th><td><?php echo $certificados[$i]['genero'];?></td></tr>
			<tr><th>Nombre Empresa</th><td><?php echo $certificados[$i]['nombrempresa'];?></td></tr>
      <tr>	<th>Nombre Cargo</th><td><?php echo $certificados[$i]['nombrecargo'];?></td></tr>
			<tr><th>Correo Electronico</th><td><?php echo $certificados[$i]['correoelectronico'];?></td></tr>
      <tr>	<th>Direccion<td><?php echo $certificados[$i]['direccion'];?></td></tr>
      <tr>	<th>Telefono</th></th><td><?php echo $certificados[$i]['telefono'];?></td></tr>
		  <tr><th>EPS<td><?php echo $certificados[$i]['eps'];?></td></tr>
      <tr>	<th>Caja</th><td><?php echo $certificados[$i]['caja'];?></td></tr>
      <tr> <th>Nombre Contacto</th></th><td><?php echo $certificados[$i]['nombrecontacto'];?></td></tr>
      <tr><th>Telefono Contacto</th><td><?php echo $certificados[$i]['telefonocontacto'];?></td></tr>
      <tr><th>Fondo Pension</th><td><?php echo $certificados[$i]['fondopension'];?></td></tr>
      <tr> <th>Tipo Sangre</th><td><?php echo $certificados[$i]['tiposangre'];?></td></tr>
</table>
<?php
}
} else {
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
    
    /*switch ($anio) {
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
        case 2020:
          $ruta='/home4/byvnilval/public_html/humantalentsas.com/contabilidad/carpetas_empleados/HV_2020/'.$carpeta;
          $rutadoc='/contabilidad/carpetas_empleados/HV_2020/'.$carpeta;
      break;
}*/

$ruta='/home4/byvnilval/public_html/humantalentsas.com/contabilidad/carpetas_empleados/';
          $rutadoc='/contabilidad/carpetas_empleados';
    
   
   
    
    //Creamos Nuestra Función
    function listFiles($directorio,$rutadoc,$documento=""){
      //echo "Directorio $directorio  ---  RUTA DOC $rutadoc<br>";  //La función recibira como parametro un directorio
        if (is_dir($directorio)) { //Comprovamos que sea un directorio Valido
            if ($dir = opendir($directorio)) {//Abrimos el directorio
                
                echo '<div class="lista-archivos">'; //Abrimos una lista HTML para mostrar los archivos
                echo '<table class="table table-striped table-bordered">';
                while (($archivo = readdir($dir)) !== false){ //Comenzamos a leer archivo por archivo
                  $mostrar = true;
                  if($documento!=""){
                  $posicion_coincidencia = strpos($archivo, $documento);  
                  if ($posicion_coincidencia === false) {
                    $mostrar = false;
                  }
                }
              

                    if ($archivo != '.' && $archivo != '..' && $mostrar==true){//Omitimos los archivos del sistema . y ..
                        
                        $nuevaRuta = $directorio.$archivo.'/';//Creamos unaruta con la ruta anterior y el nombre del archivo actual
                        
                        //$nuevaRuta2 = $directorio.'/'.$archivo;
                        $nuevaRuta2 = $rutadoc.'/'.$archivo;
                        
                        
                        //echo "--".$nuevaRuta."<br>"; 
                        if (is_dir($nuevaRuta)) { //Si la ruta que creamos es un directorio entonces:
                            echo '<br><h6>Documentos Carpeta '.$archivo.'</h6>'; //Imprimimos la ruta completa resaltandola en negrita
                            listFiles($directorio."/".$archivo,$rutadoc."/".$archivo);//Volvemos a llamar a este metodo para que explore ese directorio.
                            echo "<hr>";
                        } else { //si no es un directorio:
                            //echo 'Archivo: '.$archivo; //simplemente imprimimos el nombre del archivo actual
                            echo "<tr><td><a  href=\"".$nuevaRuta2."\" target='_blank'>".'Archivo: '.$archivo."</a><br/></td></tr>";
                        }
                         //Cerramos el item actual y se inicia la llamada al siguiente archivo
                        
                    }
                    
                }//finaliza While
                echo '</div>';//Se cierra la lista
                
                
                closedir($dir);//Se cierra el archivo
            }
            echo '</table>';
        }else{//Finaliza el If de la linea 12, si no es un directorio valido, muestra el siguiente mensaje
            echo '<div class="error-colaboradores">No Existe informaci&oacute;n relacionada al número de documento y contrato</div>'.'<br/><br/>';
        }
    }//Fin de la Función
    
    //Llamamos a la función y le pasamos el nombre de nuestro directorio.
    listFiles($ruta,$rutadoc,$documento);
    ?>
    <table class="table table-striped table-bordered">
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
              </table>
<?php 
}
?>