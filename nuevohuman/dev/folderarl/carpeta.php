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

<h2>Módulo de consulta ARL de colaboradores</h2><br>

<?php

//echo __FILE__;



	if($_GET['colaborador']==1)

	{

	    $anyo=$_GET['anyoarl'];

	    $mes=$_GET['mesarl'];

	    $nombre=$_GET['documento'];	

	   

	}else

	{

	    $anyo=$_POST['anyo'];

	    $mes=$_POST['mes'];

	    $nombre=$_POST['documento'];	

	}

    $nombre=$nombre.".pdf";

    $carpeta=$anyo.'_'.$mes;



  // $ruta='carpeta/'.$carpeta;/home4/byvnilval/public_html/humantalentsas.com/folderarl/carpeta.php

    $ruta='/home4/byvnilval/public_html/humantalentsas.com/contabilidad/carpetas_empleados/Seguridad_Social/'.$carpeta;

   //$rutadoc='carpeta/'.$carpeta;https://humantalentsas.com/contabilidad/carpetas_empleados/Seguridad_Social

   

   $rutadoc='/contabilidad/carpetas_empleados/Seguridad_Social/'.$carpeta;

    //$rutadoc='/contabilidad/carpetas_empleados/Seguridad_Social/'.$carpeta;

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

                            echo '<li>'; //Abrimos un elemento de lista 

                            echo "<a href=\"".$nuevaRuta2."\" target='_blank'>".'Archivo: '.$archivo."</a><br/><br/>"; 

                            echo'</li>'; //Cerramos el item actual y se inicia la llamada al siguiente archivo

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

                if($encontrar==0){ echo '<div class="error-colaboradores">No Existe informaci&oacute;n relacionada al número de documento </div>'.'<br/><br/>';

                    ; }

                

            }

        }else{//Finaliza el If de la linea 12, si no es un directorio valido, muestra el siguiente mensaje

            echo '<div class="error-colaboradores">No Existe informaci&oacute;n relacionada al número de documento y el periodo seleccionado</div>'.'<br/><br/>';

        }

    }//Fin de la Función

    

    //Llamamos a la función y le pasamos el nombre de nuestro directorio.

    listFiles($ruta,$rutadoc,$nombre);

    ?>

<a href="javascript:history.back(-1);" class="btn-volver" title="Ir la página anterior">Volver</a>

</body>



</html>

