<h5>Laboratorios</h5><br>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="laboratoriosadd">
  Agregar Laboratorio
</button>
<br>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar/Editar Laboratorios</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<form action="home.php?ctr=admon&acc=guardarlaboratorio" method="post">
			<input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>">
      <input type="hidden" name="idcand" id="idcand" value="0">
	  <div class="form-group row">
	    <label class="col-4 col-form-label" for="nombre">Nombre Laboratorio</label> 
	    <div class="col-8">
	      <input id="nombre" name="nombre" placeholder="Nombre Laboratorio" type="text" class="form-control" required="required">
	    </div>
	  </div>
	  <div class="form-group row">
	    <label class="col-4 col-form-label" for="nombre">Ciudad Laboratorio</label> 
	    <div class="col-8">
	      <input id="ciudad" name="ciudad" placeholder="Ciudad Laboratorio" type="text" class="form-control" required="required">
	    </div>
	  </div>
	  <div class="form-group row">
	    <label class="col-4 col-form-label" for="nombre">Direccion Laboratorio</label> 
	    <div class="col-8">
	      <input id="direccion" name="direccion" placeholder="Direccion Laboratorio" type="text" class="form-control" required="required">
	    </div>
	  </div>
	  <div class="form-group row">
	    <label class="col-4 col-form-label" for="telefonos">Telefonos Laboratorio</label> 
	    <div class="col-8">
	      <input id="telefonos" name="telefonos" placeholder="Telefonos Laboratorio" type="text" class="form-control" required="required">
	    </div>
	  </div>
	  <div class="form-group row">
	    <label for="correouno" class="col-4 col-form-label">Correo 1</label> 
	    <div class="col-8">
	      <input id="correouno" name="correouno" placeholder="Correo 1" type="email" class="form-control" required="required">
	    </div>
	  </div>

	  <div class="form-group row">
	    <label for="correodos" class="col-4 col-form-label">Correo 2</label> 
	    <div class="col-8">
	      <input id="correodos" name="correodos" placeholder="Correo 2" type="email" class="form-control" required="required">
	    </div>
	  </div>

	  <div class="form-group row">
	    <label for="correodos" class="col-4 col-form-label">Correo 3</label> 
	    <div class="col-8">
	      <input id="correotres" name="correotres" placeholder="Correo 3" type="email" class="form-control" required="required">
	    </div>
	  </div>
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
<br>
<table class="table table-striped table-bordered" id="myTable">
	<thead>
		<tr>
			<th>Ciudad</th>
			<th>Nombre</th>
			<th>Direccion</th>
			<th>Telefono</th>
			<th>Correo 1</th>
			<th>Correo 2</th>
			<th>Correo 3</th>
			<th>Editar</th>
			<th>Eliminar</th>
		</tr>
	</thead>
	<tbody>
 
	<?php 
	$val = 0;
	for($i=0; $i<count($listatemporales);$i++){

		$val ++;
		$conteoreq = 0;
		$nombrelaboratorio=$listatemporales[$i]['nombrelaboratorio'];
		$ciudad=$listatemporales[$i]['ciudad'];	
		$direccion=$listatemporales[$i]['direccion'];	
		$correo=$listatemporales[$i]['correo'];	
		$telefono=$listatemporales[$i]['telefonos'];
		$id=$listatemporales[$i]['id'];	
		$correo = explode("|",$correo);
		
		$descripcion=$listatemporales[$i]['descripcion'];			
		echo  '<tr>
		<td>'.$nombrelaboratorio.'</td>
		<td>'.$ciudad.'</td>
		<td>'.$direccion.'</td>
		<td>'.$telefono.'</td>
		<td>'.$correo[0].'</td>
		<td>'.$correo[1].'</td>
		<td>'.$correo[2].'</td>';
		
		echo  '<td><a style="color: white !important;" class="btn btn-primary" onclick="';
		echo  "editarlaboratorio('$nombrelaboratorio','$ciudad','$direccion','$telefono','".$correo[0]."','".$correo[1]."',$id)";
		echo '">Editar</a></td>';
		echo  '<td><a class="btn btn-primary" href="home.php?ctr=admon&acc=eliminarlaboratorio&id='.$id.'">Eliminar</a></td></tr>';
		
	}
	?>
    </tbody>
</table>