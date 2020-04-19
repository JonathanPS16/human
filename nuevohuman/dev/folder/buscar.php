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
	<style>
	    @import url('https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900');
/*iframe https://www.humantalentsas.com/folder/buscar.php login*/
body{
    font-family: 'Roboto', sans-serif;
    font-size:14px;
    padding: 15px;
}
.generador{
    margin:0 auto;
    max-width: 420px;
    padding: 15px;
}
.generador .cont label{
	  display: block;
    color: #000;
    font-family: 'Roboto', sans-serif;
    font-size:14px;
    font-weight: bold;
    max-width: 100%;
    margin-bottom: 15px;
}
.generador .cont input,
.generador .cont select{
    border: 1px solid darkgrey;
    border-radius: 6px;
    box-sizing : border-box;
    color: #4C4C4C;
    height: 34px;
    margin-top: 5px;
    padding: 0 10px;
    width: 100%;
}
.generador .btn{
    background-color: #137C85;
    border:1px solid #137C85;
    border-radius: 20px;
    color: #ffffff;
    cursor: pointer;
    display: block;
    font-weight: 500;
    font-size: 13px;
    line-height: 1.5;
    margin:30px auto;
    padding: 8px 0px;
    -webkit-transition:all .5s;
    -moz-transition:all .5s;
    -o-transition:all .5s;
    transition: all .5s;
    text-align: center;
    text-decoration: none;
    width: 100px;
}
.generador .btn:focus,
.generador .btn:hover{
    background-color: #460952;
    box-shadow: none;
    outline: none;
}
.btn-volver{
  background-color: #137C85;
  border:1px solid #137C85;
  border-radius: 20px;
  color: #ffffff;
  display: block;
  font-weight: 500;
  font-size: 13px;
  line-height: 1.5;
  margin:30px 0;
  padding: 8px 0px;
  -webkit-transition:all .5s;
  -moz-transition:all .5s;
  -o-transition:all .5s;
  transition: all .5s;
  text-align: center;
  text-decoration: none;
  width: 100px;
}
.btn-volver:hover,
.btn-volver:focus{
  background-color: #460952;
  box-shadow: none;
  outline: none;
}
	</style>
	  </head>

<body>

<form class="generador" id="form1" name="form1" method="post" action="carpeta.php">
	<?php if(isset($_GET['message'])): ?>
		<div class="message error">No se encontraron registros para la búsqueda.</div>
	<?php endif; ?>
	<div class="cont" >
		<div>
		  <label>Documento</br>
		  <input type="text" name="documento" id="documento" required />
		  </label>
		</div>
		<div>
		  <label>Contrato</br>
		  <input type="text" name="contrato" id="contrato" required />
		  </label>
		</div>
		<div>
 			<label>Año</br>
			<select name="anio" required >
			<option value="2017">2017</option>
			<option value="2018">2018</option>
			<option value="2019">2019</option>
			</select>
		</div>
	  </div>
  </div>
  <input class="btn" type="submit" name="buscar" id="buscar" value="Enviar" />
    <a href="../index.php">volver</a>
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

