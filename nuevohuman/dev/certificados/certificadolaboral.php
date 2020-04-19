<?php
require_once 'Excel/reader.php';
require('SpreadsheetReader_CSV.php');
require('SpreadsheetReader.php');
// ExcelFile($filename, $encoding);
$data = new Spreadsheet_Excel_Reader();
$data->setOutputEncoding('CP1251');
set_time_limit(0);
$datos = array();
$contrato=$_POST['contrato'];

$tipocertificado=$_POST['tipocertificado'];
/*
$numero=$_POST['documento'];

$anio=$_POST['anio'];
$mes=$_POST['mes'];
$periodo=$_POST['periodo'];
*/

$Reader = new SpreadsheetReader('/home/humantalentsas/public_html/contabilidad/archivos_generar_certificaciones/Datos Certificacion Laboral Human Talent.csv');
		
		$i=1;
		$c=0;
		foreach ($Reader as $Row)
		//echo $Row[34];
		{
			if($Row[0]==$contrato)
			{
				$c++;
				if($i<=95)
				{
					$datos[$i]=$Row;
					$i++;
				}
			}
		}
		$i=$i-1;


if(count($datos) == 0){
	header("Location: buscar.php?message=0");
	exit;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
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
		//body{background: url('/sites/all/themes/astrum/images/bg/noise.png') scroll 0 0 repeat;}
	  </style>
	  </head>

<body>
		<form class="generador" name='laboral' method='post' action='generador.php'>
			<div class="cont" >
				<div>
				Nombre: <input type='text' readonly="readonly" name='nombre' value="<?php  echo $datos[1][51]; ?>" />
				</div>
				<div>
				Tipo documento: <input type='text' readonly="readonly" name='tipo'  value="C.C." />
				</div>
				<div>
				N&uacute;mero documento: <input type='text' readonly="readonly" name='numero' value="<?php  echo $datos[1][32]; ?>" />
				</div>
						
				<div>
				Empresa: <input type='text' readonly="readonly" name='empresa' value="<?php  echo $datos[1][14]; ?>" />
				</div>
				<div>
				Cargo: <input type='text' readonly="readonly" name='cargo' value="<?php   echo $datos[1][17]; ?>" />
				</div>
				<div>
				Salario: <input type='text' readonly="readonly" name='salario' value="<?php  echo $datos[1][60]; ?>" />
				</div>
				<div>
				Fecha de ingreso: <input type='text' readonly="readonly" name='ingreso' value="<?php   echo $datos[1][44]; ?>" />
				</div>
				<div>
				Fecha retiro: <input type='text' readonly="readonly" name='retiro' value="<?php  echo $datos[1][50]; ?>" />
				</div>
				
				<input type='hidden' name='tipocertificado' value="<?php  echo $tipocertificado; ?>" /><br />
		
				
			</div>
			
			<input class="btn" type='submit' value='Descargar certificado' />
			<a href="javascript:history.back(-1);" title="Ir la página anterior">Volver</a>
		</form>	

</body>
<script type="text/javascript">/**
function abrir() { 

	window.open('pagina.html','nuevaVentana','width=300, height=400')
	product = document.getElementsByName("contrato")[0].value;
	shelf = document.getElementsByName("contrato")[0].value;
	document.getElementsByName("contrato").value = product;
}**/

    var ncontrato = null;
    var shelf = null;
    var status = null;

function sub(){
	ncontrato = document.getElementsByName("contrato")[0].value;
	window.open('pagina.html','nuevaVentana','width=300, height=400')
    
	document.getElementsByName("contrato").value = ncontrato;
//  alert(product+" "+shelf);
}
</script>
</html>
