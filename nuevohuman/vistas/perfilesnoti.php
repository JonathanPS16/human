
<?php 
$datosdisc =  explode(",",$proceso[0]['usuarios']);
$datosacc =  explode(",",$accidentes[0]['usuarios']);
$datosret =  explode(",",$retiro[0]['usuarios']);
?>
<h5>Notificaciones de Procesos</h5>
<form class="form-horizontal" action="home.php?ctr=admon&acc=guardarnotificaciones" method="post" enctype="multipart/form-data">
<table class="table table-striped" id="tablagrid">
		<tr>
			<th>Proceso Disciplinario</th>
			<th><select class="js-example-basic-multiple" name="disciplinario[]" multiple="multiple">
			<?php
			for($i=0; $i<count($listatemporales);$i++){

			$val ++;
			$conteoreq = 0;
			$id = $listatemporales[$i]['id_usuario'];
			$usuario=$listatemporales[$i]['usuario'];
			$correo=$listatemporales[$i]['correo'];
			$selected  ="";
			if (in_array($id, $datosdisc)) {
				$selected = "selected";
			}
			echo '<option value ="'.$id.'" '.$selected.'>'.$correo.'</option>';
			
			}?>
			</select>
			</th>
			</tr>
		<tr>
			<th>Proceso Accidentes</th>
			<th><select class="js-example-basic-multiple" name="accidentes[]" multiple="multiple">
			<?php
			for($i=0; $i<count($listatemporales);$i++){

			$val ++;
			$conteoreq = 0;
			$id = $listatemporales[$i]['id_usuario'];
			$usuario=$listatemporales[$i]['usuario'];
			$correo=$listatemporales[$i]['correo'];
			$selected  ="";
			if (in_array($id, $datosacc)) {
				$selected = "selected";
			}
			echo '<option value ="'.$id.'" '.$selected.'>'.$correo.'</option>';
			
			}?>
			</select>
			</th>
			</tr>
			
		<tr>
			<th>Proceso Retiro</th>
			<th><select class="js-example-basic-multiple" name="retiro[]" multiple="multiple">
			<?php
			for($i=0; $i<count($listatemporales);$i++){

			$val ++;
			$conteoreq = 0;
			$id = $listatemporales[$i]['id_usuario'];
			$usuario=$listatemporales[$i]['usuario'];
			$correo=$listatemporales[$i]['correo'];
			$selected  ="";
			if (in_array($id, $datosret)) {
				$selected = "selected";
			}
			echo '<option value ="'.$id.'" '.$selected.'>'.$correo.'</option>';
			
			}?>
			</select>
			</th>
			</tr>

	
</table>
<div class="form-group">
		  <label class="col-md-4 control-label" for="guardar"></label>
		  <div class="col-md-4">
		    <button id="guardar" name="guardar" class="btn btn-primary">Guardar Notificaciones</button>
		  </div>
		</div>
</form>
<script>
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>
<style>
.select2-selection.select2-selection--multiple {
    width: 831px;
}
</style>