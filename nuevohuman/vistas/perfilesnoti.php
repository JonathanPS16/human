<table class="table table-striped" id="tablagrid">
	<thead>
		<tr>
			<th>Correo Electronicos</th>
			<th>Notificaciones Requisiones Human</th>
			<th>Notificaciones Requisiones Conexion</th>
			<th>Notificaciones Proceso Diciplinario</th>
			<th>Notificaciones Proceso Accidentes</th>
			<th>Notificaciones Proceso Desvinculacion</th>
			<th>Accion</th>
		</tr>
	</thead>
	<tbody>
	<?php 


	for($i=0; $i<count($listatemporales);$i++){

		$val ++;
		$conteoreq = 0;
		$id = $listatemporales[$i]['id_usuario'];
		$usuario=$listatemporales[$i]['usuario'];
		$correo=$listatemporales[$i]['correo'];
		?>
		<form class="form-horizontal" action="home.php?ctr=admon&acc=guardarnotificacion" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
		<tr>
		<td><?php echo $correo;?></td>
		<td>
		<select class="custom-select">
			<option value="NO">NO</option>
		</select></td>
		<td>
		<select class="custom-select">
			<option value="NO">NO</option>
		</select>
		</td>
		<td>
		<select class="custom-select">
			<option value="NO">NO</option>
		</select>
		</td>
		<td>
		<select class="custom-select">
			<option value="NO">NO</option>
		</select>
		</td>

		<td>
		<select class="custom-select">
			<option value="NO">NO</option>
		</select>
		</td>
		<td>
		<button name="submit" type="submit" class="btn btn-primary">Guardar</button>
		</td>
		</form>
		</tr>
		<?php 
	}
	?>
	</tbody>
</table>


<a  class="btn btn-primary" href="home.php?ctr=accidentes&acc=formu&id=0">Nuevo Accident   sdfsdfd  e</a>
<br><br><table class="table table-striped" id="tablagrid">
	<thead>
		<tr>
			<th>ID</th>
			<th>U</th>
			<th>Accion</th>
		</tr>
	</thead>
	<tbody>
    <tr>
	<?php 
	$val = 0;

	
	for($i=0; $i<count($listatemporales);$i++){

		$val ++;
		$conteoreq = 0;
		$id = $listatemporales[$i]['id_usuario'];
		$usuario=$listatemporales[$i]['usuario'];
		$correo=$listatemporales[$i]['correo'].",";
		$pos = strpos($selecc, ",");

		/*if ($pos === false) {
			if($selecc==""){
				$selecc="0,";
			} else {
				$selecc= $selecc.",";
			}
		}*/
		$camposmenu = "";

		


		$camposmenu='<div class="form-group row">
		  <label class="col-4 col-form-label" for="select">HOLA</label> 
		  <div class="col-8">
			<select id="notificacionhuman" name="notificacionhuman" class="custom-select" required="required">
			  <option value="No">No</option>
			  <option value="Si">Si</option>
			</select>
		  </div>
		</div> ';

		$estadolb = "";
		  
		$modalbotonhoja ='<div class="modal fade" id="exampleModalhv'.$id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Editar Permisos</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" action="home.php?ctr=admon&acc=guardarpermisos" method="post" enctype="multipart/form-data">
			<input type="hidden" id="id" name="id" value="'.$id.'">
			'.$camposmenu.'
			<div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Guardar</button>
    </div>
  </div>
			</form>
	
			
		  </div>
		  
		</div>
	  </div>
	</div>
	';
		$botonhoja ='<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalhv'.$id.'">
	  Editar Permisos
	</button>';	
		
		echo  '<tr><td>'.$val.'</td>
		<td>'.$nombreperfil.'</td>
  <td>'.$modalbotonhoja.$botonhoja.'</td></tr>';
	}
	?>
    </tbody>
</table>
