<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Documento </title>

	<style type="text/css" media="all">
@import url("http://www.humantalentsas.com/modules/system/system.base.css?ovxn5k");
	@import url("http://www.humantalentsas.com/modules/comment/comment.css?ovxn5k");
	@import url("http://www.humantalentsas.com/modules/field/theme/field.css?ovxn5k");
	@import url("http://www.humantalentsas.com/modules/node/node.css?ovxn5k");
	@import url("http://www.humantalentsas.com/modules/search/search.css?ovxn5k");
	@import url("http://www.humantalentsas.com/modules/user/user.css?ovxn5k");
	@import url("http://www.humantalentsas.com/sites/all/modules/views/css/views.css?ovxn5k");
	@import url("http://www.humantalentsas.com/sites/all/modules/ckeditor/css/ckeditor.css?ovxn5k");
	@import url("http://www.humantalentsas.com/sites/all/modules/ctools/css/ctools.css?ovxn5k");
	@import url("http://www.humantalentsas.com/sites/all/modules/panels/css/panels.css?ovxn5k");
	@import url("http://www.humantalentsas.com/sites/all/modules/tagclouds/tagclouds.css?ovxn5k");
	@import url("http://www.humantalentsas.com/sites/all/modules/tabvn/layer_slider/css/layerslider.css?ovxn5k");
	@import url("http://www.humantalentsas.com/sites/all/modules/panels/plugins/layouts/twocol_bricks/twocol_bricks.css?ovxn5k");
	@import url("http://www.humantalentsas.com/modules/file/file.css?ovxn5k");
	@import url("http://www.humantalentsas.com/sites/all/modules/webform/css/webform.css?ovxn5k");
	@import url("http://www.humantalentsas.com/sites/all/themes/astrum/css/base.css?ovxn5k");
	@import url("http://www.humantalentsas.com/sites/all/themes/astrum/css/responsive.css?ovxn5k");
	@import url("http://www.humantalentsas.com/sites/all/themes/astrum/css/icons.css?ovxn5k");
	@import url("http://www.humantalentsas.com/sites/all/themes/astrum/css/style.css?ovxn5k");
	@import url("http://www.humantalentsas.com/sites/all/themes/astrum/css/colors/green.css?ovxn5k");
	@import url("http://www.humantalentsas.com/sites/all/themes/astrum/css/astrum.css?ovxn5k");
	@import url("http://www.humantalentsas.com/sites/default/files/color/astrum_color_cache/colors.css?ovxn5k");
	@import url("http://www.humantalentsas.com/sites/all/themes/astrum/css/style-custom.css?p4e979");
	</style>
</head>

<body>
<h2>Módulo de consulta de carpetas de colaboradores</h2><br>
<?php
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
            $ruta='/home/humantalentsas/public_html/contabilidadFSI/carpetas_empleados/HV_2017/'.$carpeta;
   	    $rutadoc='/contabilidadFSI/carpetas_empleados/HV_2017/'.$carpeta;
        break;
    case 2018:
           $ruta='/home/humantalentsas/public_html/contabilidadFSI/carpetas_empleados/HV_2018/'.$carpeta;
           $rutadoc='/contabilidadFSI/carpetas_empleados/HV_2018/'.$carpeta;
        break;
    case 2019:
            $ruta='/home/humantalentsas/public_html/contabilidadFSI/carpetas_empleados/HV_2019/'.$carpeta;
            $rutadoc='/contabilidadFSI/carpetas_empleados/HV_2019/'.$carpeta;
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
                echo '<div class="divTable">
                <div class="divTableBody">
                <div class="divTableRow">
                <div class="divTableCell">Descripci&oacute;n Documento&nbsp;</div>
                <div class="divTableCell">Parte del Nombre Archivo.pdf&nbsp;</div>
                </div>
                <div class="divTableRow">
                <div class="divTableCell">Hoja de Vida</div>
                <div class="divTableCell">HV</div>
                </div>
                <div class="divTableRow">
                <div class="divTableCell">Pruebas Psicot&eacute;cnicas</div>
                <div class="divTableCell">PS</div>
                </div>
                <div class="divTableRow">
                <div class="divTableCell">Entrevista</div>
                <div class="divTableCell">EN</div>
                </div>
                <div class="divTableRow">
                <div class="divTableCell">Referenciaci&oacute;n</div>
                <div class="divTableCell">RF</div>
                </div>
                <div class="divTableRow">
                <div class="divTableCell">Orden Ingreso</div>
                <div class="divTableCell">OI</div>
                </div>
                <div class="divTableRow">
                <div class="divTableCell">Examen M&eacute;dico de Ingreso</div>
                <div class="divTableCell">EX</div>
                </div>
                <div class="divTableRow">
                <div class="divTableCell">Documentos</div>
                <div class="divTableCell">DT</div>
                </div>
                <div class="divTableRow">
                <div class="divTableCell">Afiliaciones</div>
                <div class="divTableCell">AF</div>
                </div>
                <div class="divTableRow">
                <div class="divTableCell">Contrato de Trabajo</div>
                <div class="divTableCell">CT</div>
                </div>
                <div class="divTableRow">
                <div class="divTableCell">Procesos Administrativos</div>
                <div class="divTableCell">PA</div>
                </div>
                <div class="divTableRow">
                <div class="divTableCell">Incapacidad</div>
                <div class="divTableCell">IN</div>
                </div>
                <div class="divTableRow">
                <div class="divTableCell">Liquidaci&oacute;n Contrato</div>
                <div class="divTableCell">LC</div>
                </div>
                </div>
                </div>';
                
                closedir($dir);//Se cierra el archivo
            }
        }else{//Finaliza el If de la linea 12, si no es un directorio valido, muestra el siguiente mensaje
            echo '<div class="error-colaboradores">No Existe informaci&oacute;n relacionada al número de documento y contrato</div>'.'<br/><br/>';
        }
    }//Fin de la Función
    
    //Llamamos a la función y le pasamos el nombre de nuestro directorio.
    listFiles($ruta,$rutadoc);
    ?>
<a href="javascript:history.back(-1);" class="btn-volver" title="Ir la página anterior">Volver</a>
</body>

</html>
