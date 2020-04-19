<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Documento </title>
	<style type="text/css" media="all">
	@import url("http://dev-huma-talent-sas.pantheonsite.io/modules/system/system.base.css?ovxn5k");
	@import url("http://dev-huma-talent-sas.pantheonsite.io/modules/comment/comment.css?ovxn5k");
	@import url("http://dev-huma-talent-sas.pantheonsite.io/modules/field/theme/field.css?ovxn5k");
	@import url("http://dev-huma-talent-sas.pantheonsite.io/modules/node/node.css?ovxn5k");
	@import url("http://dev-huma-talent-sas.pantheonsite.io/modules/search/search.css?ovxn5k");
	@import url("http://dev-huma-talent-sas.pantheonsite.io/modules/user/user.css?ovxn5k");
	@import url("http://dev-huma-talent-sas.pantheonsite.io/sites/all/modules/views/css/views.css?ovxn5k");
	@import url("http://dev-huma-talent-sas.pantheonsite.io/sites/all/modules/ckeditor/css/ckeditor.css?ovxn5k");
	@import url("http://dev-huma-talent-sas.pantheonsite.io/sites/all/modules/ctools/css/ctools.css?ovxn5k");
	@import url("http://dev-huma-talent-sas.pantheonsite.io/sites/all/modules/panels/css/panels.css?ovxn5k");
	@import url("http://dev-huma-talent-sas.pantheonsite.io/sites/all/modules/tagclouds/tagclouds.css?ovxn5k");
	@import url("http://dev-huma-talent-sas.pantheonsite.io/sites/all/modules/tabvn/layer_slider/css/layerslider.css?ovxn5k");
	@import url("http://dev-huma-talent-sas.pantheonsite.io/sites/all/modules/panels/plugins/layouts/twocol_bricks/twocol_bricks.css?ovxn5k");
	@import url("http://dev-huma-talent-sas.pantheonsite.io/modules/file/file.css?ovxn5k");
	@import url("http://dev-huma-talent-sas.pantheonsite.io/sites/all/modules/webform/css/webform.css?ovxn5k");
	@import url("http://dev-huma-talent-sas.pantheonsite.io/sites/all/themes/astrum/css/base.css?ovxn5k");
	@import url("http://dev-huma-talent-sas.pantheonsite.io/sites/all/themes/astrum/css/responsive.css?ovxn5k");
	@import url("http://dev-huma-talent-sas.pantheonsite.io/sites/all/themes/astrum/css/icons.css?ovxn5k");
	@import url("http://dev-huma-talent-sas.pantheonsite.io/sites/all/themes/astrum/css/style.css?ovxn5k");
	@import url("http://dev-huma-talent-sas.pantheonsite.io/sites/all/themes/astrum/css/colors/green.css?ovxn5k");
	@import url("http://dev-huma-talent-sas.pantheonsite.io/sites/all/themes/astrum/css/astrum.css?ovxn5k");
	@import url("http://dev-huma-talent-sas.pantheonsite.io/sites/default/files/color/astrum_color_cache/colors.css?ovxn5k");
	@import url("http://www.humantalentsas.com/sites/all/themes/astrum/css/style-custom.css?p4e979");
	</style>
			  <style type="text/css">
		
	  </style>
	  </head>

<body>

<form class="generador" id="form1" name="form1" method="post" action="carpeta.php">
	<?php if(isset($_GET['message'])): ?>
		<div class="message error">No se encontraron registros para la búsqueda.</div>
	<?php endif; ?>
	<div class="cont" >
		<div>
		  <label>Año</br>
		  	<!--select multiple name="anyo"-->    
			<select  name="anyo">    
				<option value="2017">2017</option>
				<option value="2018">2018</option>    
				<option value="2019">2019</option> 
			</select>
		  </label>
		</div>
		<div>
		  <label>Mes</br>
		  	<select  name="mes">    
				<option value="01">Enero</option>    
				<option value="02">Febrero</option>    
				<option value="03">Marzo</option>    
				<option value="04">Abril</option>    
				<option value="05">Mayo</option>   
				<option value="06">Junio</option>   
				<option value="07">Julio</option>   
				<option value="08">Agosto</option>   
				<option value="09">Septiembre</option>   
				<option value="10">Octubre</option>   
				<option value="11">Noviembre</option>   
				<option value="12">Diciembre</option>   
			</select>

		  </label>
		</div>
		<div>
		  <label>Número de documento</br>
		  <input type="text" name="documento" id="documento" required />
		  </label>
		</div>
		<div>
	  </div>
  </div>
  <input class="btn" type="submit" name="buscar" id="buscar" value="Enviar" />
  <a href="../index.php">Volver</a>

</form>
</body>
<script type="text/javascript">

function mostrarReferencia(){
	if (document.form1.tipocertificado.value == 1) {
		document.getElementById('periodo').style.display = 'block';
	} else {
		document.getElementById('periodo').style.display='none';
	}
	if (document.form1.tipocertificado.value == 2) {
		document.getElementById('anio').style.display = 'block';
	} else {
		document.getElementById('anio').style.display='none';
	}


}

</script>
</html>

