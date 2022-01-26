
<?php 
$datosdisc =  explode(",",$proceso[0]['usuarios']);
$datosacc =  explode(",",$accidentes[0]['usuarios']);
$datosret =  explode(",",$retiro[0]['usuarios']);
$datossele =  explode(",",$procesoreq[0]['correosselecccion']);


?>
<h5>Notificaciones de Procesos</h5>
<form class="form-horizontal" action="home.php?ctr=admon&acc=guardarnotificaciones" method="post" enctype="multipart/form-data">
<table class="table table-striped" id="tablagrid">
		<tr>
			<th>Proceso Disciplinario</th>
			<th><select class="selectpicker" data-live-search="true" name="disciplinario[]" multiple="multiple">
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
			<th><select class="selectpicker" data-live-search="true" name="accidentes[]" multiple="multiple">
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
			<th>Proceso Selecccion</th>
			<th><select class="selectpicker" data-live-search="true" name="seleccion[]" multiple="multiple">
			<?php
			for($i=0; $i<count($listatemporales);$i++){

			$val ++;
			$conteoreq = 0;
			$id = $listatemporales[$i]['id_usuario'];
			$usuario=$listatemporales[$i]['usuario'];
			$correo=$listatemporales[$i]['correo'];
			$selected  ="";
			if (in_array($id, $datossele)) {
				$selected = "selected";
			}
			echo '<option value ="'.$id.'" '.$selected.'>'.$correo.'</option>';
			
			}?>
			</select>
			</th>
			</tr>
			
		<tr>
			<th>Proceso Retiro</th>
			<th><select style="width: 100% !important;" class="selectpicker" data-live-search="true" name="retiro[]" multiple="multiple">
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