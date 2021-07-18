<h5>Codigos Incapacidades</h5><br>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Agregar Codigo
</button>
<br>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Codigo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<form action="home.php?ctr=admon&acc=agregarcodigo" method="post">
			<input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>">
      <input type="hidden" name="idcand" id="idcand" value="0">
	  <div class="form-group row">
	    <label class="col-4 col-form-label" for="nombre">Codigo</label> 
	    <div class="col-8">
	      <input id="codigo" name="codigo" placeholder="Codigo" type="text" class="form-control" required="required">
	    </div>
	  </div>
	  <div class="form-group row">
	    <label for="descripcodigo" class="col-4 col-form-label">Descripcion Codigo</label> 
	    <div class="col-8">
	      <input id="descripcodigo" name="descripcodigo" placeholder="Descripcion Codigo" type="text" class="form-control" required="required">
	    </div>
	  </div>
	  <div class="form-group row">
			<label class="col-4 col-form-label" for="tipo">Responsable</label> 
			<div class="col-8">
			<select id="tipo" name="tipo" class="custom-select" required="required">
				<option value="N">EPS</option>
				<option value="S">ARL</option>
			</select>
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
			<th>Codigo</th>
			<th>Descripcion</th>
			<th>Responsable</th>
		</tr>
	</thead>
	<tbody>
 
	<?php 
	$val = 0;
	for($i=0; $i<count($listatemporales);$i++){

		$val ++;
		$conteoreq = 0;
		$id=$listatemporales[$i]['id'];
		$descripcodigo=$listatemporales[$i]['descripcodigo'];	
		$excluye=$listatemporales[$i]['excluye'];
		if($excluye=="S"){
			$responsable ="ARL";
		} else {
			$responsable ="EPS";
		}

		echo  '<tr>
		<td>'.$id.'</td>
  <td>'.$descripcodigo.'</td>
  <td>'.$responsable.'</td></tr>';
	}
	?>
    </tbody>
</table>