<?php 
$valida = "";
$select = "";
if($_SESSION['id_perfil']==8)
{
    $valida = $_SESSION['usuario'];
    $select = "readonly";
}
?>
<h1 class="h2"><?php echo $titulo ;?></h1>

<form class="generador" id="form1" name="form1" method="post" action="home.php?ctr=buscardorCertificados&acc=validarGen">

<?php $usuarioregistrado=$_GET['usuario']; 
      $rolusuario=$_GET['rolusuario']; 
   
?>
	<?php /** if(isset($_GET['dato'])):*/ ?>
	<?php if($_GET['dato']==2): ?>
		<div class="message error">No es permitido consultar otro usuario.</div>
	<?php endif; ?>
	<?php if(isset($_GET['message'])): ?>
		<div class="message error">No se encontraron registros para la b�squeda.</div>
	<?php endif; ?>
	<div class="cont" >
        <!-- Text input-->
        <div class="form-group">
        <label class="col-md-4 control-label" for="documento">Documento</label>  
        <div class="col-md-4">
        <input id="documento" name="documento" type="text" placeholder="Documento" value="<?php echo $valida; ?>" class="form-control input-md" required <?php echo $select ?>>
        <input type="hidden" name="usuarioregistrado" value=<?php echo $usuarioregistrado;?> />
        <input type="hidden" name="rolusuario" value="administrator"> 
        </div>
        </div>

        <!-- Select Basic -->
        <div class="form-group">
        <label class="col-md-4 control-label" for="tipocertificado">Tipo Certificado</label>
        <div class="col-md-4">
            <select id="tipocertificado" name="tipocertificado" class="form-control" onclick="mostrarReferencia();">
            <option value="3">Certificado laboral</option>
            <option value="1">Comprobante de pago</option>
            <option value="2">Ingresos y Retenciones</option>			
            <option value="4">ARL</option>
            </select>
        </div>
        </div>
	</div>
	
  
	<div id="periodo" style="display:none;" >
		<div class="cont" >
			
                        <!-- Select Basic -->
            <div class="form-group">
            <label class="col-md-4 control-label" for="anios">Año</label>
            <div class="col-md-4">
                <select id="anios" name="anios" class="form-control">
                <?php 
                for($i=(date('Y')-1);$i<=date('Y');$i++){
                    echo "<option value='{$i}'>{$i}</option>";
                }
                ?>
                </select>
            </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group">
            <label class="col-md-4 control-label" for="mes">Mes</label>
            <div class="col-md-4">
                <select id="mes" name="mes" class="form-control" required>
                <option value="1">Enero</option>
				<option value="2">Febrero</option>
				<option value="3">Marzo</option>
				<option value="4">Abril</option>
				<option value="5">Mayo</option>
				<option value="6">Junio</option>
				<option value="7">Julio</option>
				<option value="8">Agosto</option>
				<option value="9">Septiembre</option>
				<option value="10">Octubre</option>
				<option value="11">Noviembre</option>
				<option value="12">Diciembre</option>
                </select>
            </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group">
            <label class="col-md-4 control-label" for="periodo">Periodo</label>
            <div class="col-md-4">
                <select id="periodo" name="periodo" class="form-control" required>
                <option value="1">1</option>
				<option value="2">2</option>
                </select>
            </div>
            </div>			
		</div>
	</div>

    <div class="form-group" id="anio" style="display:none;" >
            <label class="col-md-4 control-label" for="anios">Año</label>
            <div class="col-md-4">
                <select id="anio" name="anio" class="form-control">
                <?php 
                for($i=(date('Y')-1);$i<=date('Y');$i++){
                    echo "<option value='{$i}'>{$i}</option>";
                }
                ?>
                </select>
            </div>
    </div>

    <div id="arl" style="display:none;" >
		<div class="aniomes"> 

 <!-- Select Basic -->
 <div class="form-group">
            <label class="col-md-4 control-label" for="anios">Año</label>
            <div class="col-md-4">
                <select id="anyoarl" name="anyoarl" class="form-control">
                <?php 
                for($i=(date('Y')-1);$i<=date('Y');$i++){
                    echo "<option value='{$i}'>{$i}</option>";
                }
                ?>
                </select>
            </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group">
            <label class="col-md-4 control-label" for="mes">Mes</label>
            <div class="col-md-4">
                <select id="mesarl" name="mesarl" class="form-control" required>
                <option value="1">Enero</option>
				<option value="2">Febrero</option>
				<option value="3">Marzo</option>
				<option value="4">Abril</option>
				<option value="5">Mayo</option>
				<option value="6">Junio</option>
				<option value="7">Julio</option>
				<option value="8">Agosto</option>
				<option value="9">Septiembre</option>
				<option value="10">Octubre</option>
				<option value="11">Noviembre</option>
				<option value="12">Diciembre</option>
                </select>
            </div>
            </div>
		 </div> 
	</div>
	<div class="form-group">
        <label class="col-md-4 control-label" for="buscar"></label>
        <div class="col-md-4">
            <input type="submit" id="buscar" name="buscar" value="Enviar" class="btn btn-primary"/>
        </div>
    </div>
	
  	<!--div id="SPACE_TOTAL"></div-->
</form>

<script type="text/javascript">

function mostrarReferencia(){
	if (document.form1.tipocertificado.value == 1) {
		document.getElementById('periodo').style.display = 'block';
		document.getElementById('buscar').value = 'Descargar certificado';
	} else {
		document.getElementById('periodo').style.display='none';
	}
	if (document.form1.tipocertificado.value == 2) {
		document.getElementById('anio').style.display = 'block';
		document.getElementById('buscar').value = 'Enviar';
	} else {
		document.getElementById('anio').style.display='none';
	}
	if (document.form1.tipocertificado.value == 3) {
		document.getElementById('buscar').value = 'Enviar';
	}
	if (document.form1.tipocertificado.value == 4) {
		document.getElementById('arl').style.display = 'block';
		document.getElementById('buscar').value = 'Enviar';
	} else {
		document.getElementById('arl').style.display='none';
	}

}

 
 $(function() {
    $("#buscar").click(function() {
        $('#SPACE_TOTAL')
           .html('<img src="img/ajax-loader.gif" />')
           .window.open();
    });
});

</script>