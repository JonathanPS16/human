<?php
	include_once("conexion.php");
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

	if($rolusuario!="administrator" && $rolusuario!="cliente")
	{
	   if($usuarioregistrado!=$numero)
	   { 
		header("Location: buscar.php?dato=2&usuario=$usuarioregistrado&rolusuario=$rolusuario");
		exit;

	   }
	}
	
	switch ($tipocertificado) {
		case 1:
			header("Location: comprobante.php?anios=$anios&mes=$mes&periodo=$periodo&documento=$numero");
        break;
		case 2:
			if(intval($anio)<=2016)
			{
				header("Location: generadorir.php?anio=$anio&documento=$numero&tipocertificado=$tipocertificado");
			}
			else			
			{
				header("Location: generadorir2017.php?anio=$anio&documento=$numero&tipocertificado=$tipocertificado");
			}
	
        break;
		case 4:
			header("Location: ../../folderarl/carpeta.php?anyoarl=$anyoarl&mesarl=$mesarl&documento=$numero&colaborador=1");
		break;
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php ob_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Documento </title>
	<style type="text/css" media="all">
	@import url("http://www.humantalentsas.com/modules/system/system.base.css?ovxn5k");
	</style>
	<style type="text/css" media="all">
	@import url("http://www.humantalentsas.com/modules/comment/comment.css?ovxn5k");
	@import url("http://www.humantalentsas.com/modules/field/theme/field.css?ovxn5k");
	@import url("http://www.humantalentsas.com/modules/node/node.css?ovxn5k");
	@import url("http://www.humantalentsas.com/modules/search/search.css?ovxn5k");
	@import url("http://www.humantalentsas.com/modules/user/user.css?ovxn5k");
	@import url("http://www.humantalentsas.com/sites/all/modules/views/css/views.css?ovxn5k");
	@import url("http://www.humantalentsas.com/sites/all/modules/ckeditor/css/ckeditor.css?ovxn5k");
	</style>
	<style type="text/css" media="all">
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
	@import url("http://www.humantalentsas.com/sites/all/themes/astrum/css/style-custom.css?ovxn5k");
	</style>	
	<style type="text/css">
		.datagrid table {
			 border-collapse: collapse;
			 text-align: left;
			 width: 100%;
		}
		 .datagrid {
			//font: normal 12px/150% Arial, Helvetica, sans-serif;
			 background: #fff;
			 overflow: hidden;
			 border: 1px solid #006699;
			 -webkit-border-radius: 3px;
			 -moz-border-radius: 3px;
			 border-radius: 3px;
		}
		.datagrid table td, .datagrid table th {
			 padding: 3px 10px;
		}
		.datagrid table thead th {
			background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #006699), color-stop(1, #00557F) );
			background:-moz-linear-gradient( center top, #006699 5%, #00557F 100% );
			filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#006699', endColorstr='#00557F');
			background-color:#006699;
			 color:#FFFFFF;
			 font-size: 15px;
			 font-weight: bold;
			 border-left: 1px solid #0070A8;
		}
		 .datagrid table thead th:first-child {
			 border: none;
		}
		.datagrid table tbody td {
			 color: #00496B;
			 border-left: 1px solid #E1EEF4;
			font-size: 12px;
			font-weight: normal;
		}
		.datagrid table tbody .alt td {
			 background: #E1EEF4;
			 color: #00496B;
		}
		.datagrid table tbody td:first-child {
			 border-left: none;
		}
		.datagrid table tbody tr:last-child td {
			 border-bottom: none;
		}
	</style>

</head>
<body>
<?php
switch ($tipocertificado) {
    case 3:
      	$sql = "SELECT * FROM certificados where cedula='$numero'";
		$results =  mysql_query($sql) ; 
	   	?>
		<pre><?php //print_r($result); ?></pre>
			<form class="generador" name='laboral' method='post' action='generador.php'>
				<?php
				while($datos=mysql_fetch_array($results)){
					?>
					<input type="radio" name="contrato" value="<?php echo $datos['contrato']; ?>" onclick="abrir()" >Contrato No. <?php print $datos['contrato']; ?> del  <?php print($datos['fecha_ingreso']);  if($datos['fecha_retiro']==""){?> a día de hoy <?php }else{?> al <?php print($datos['fecha_retiro']); } ?> </label><br/>
					<?php	
					$cedula=$datos['cedula'];
					$nombre_empleado=$datos['nombre_empleado'];
				}
				?>
				<div class="cont" >
					<div>
						Nombre: <input type='text' readonly="readonly" name='nombre' value="<?php  echo $nombre_empleado; ?>" />
					</div>
					<div>
						N&uacute;mero documento: <input type='text' readonly="readonly" name='numero' value="<?php  echo $cedula; ?>" />
					</div>
					<input type='hidden' readonly="readonly" name='tipo'  value="C.C." />
					<input type='hidden' name='tipocertificado' value="<?php  echo $tipocertificado; ?>" /><br />
				</div>						
				<input class="btn" type='submit' value='Descargar' />
				<a href="javascript:history.back(-1);" title="Ir la página anterior">Volver</a>
			</form>	
		<?php	
        break;

}

?>

</body>

</html>
