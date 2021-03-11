<h5>Empresas Usuarias</h5><br>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Agregar Empresa Usuaria
</button>
<br>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Empresa Usuaria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<form action="home.php?ctr=admon&acc=guardarempresausuariacent" method="post">
			<input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>">
      <input type="hidden" name="idcand" id="idcand" value="0">
	  <div class="form-group row">
	    <label class="col-4 col-form-label" for="nombre">Nombre Empresa Usuaria</label> 
	    <div class="col-8">
	      <input id="nombre" name="nombre" placeholder="Nombre Candidato" type="text" class="form-control" required="required">
	    </div>
	  </div>
	  <div class="form-group row">
		<label for="select" class="col-4 col-form-label">Empresa Prestadora</label> 
		<div class="col-8">
		<select id="empresa" name="empresa" class="custom-select">
		<?php 
		
		for($j=0; $j<count($listatemporalespres);$j++){
			$id_temporal=$listatemporalespres[$j]['id_temporal'];
			$nombretemporal =$listatemporalespres[$j]['nombretemporal'];	
			echo  '<option value="'.$id_temporal.'">'.$nombretemporal.'</option>';
		}
		
		?>
		</select>
		</div>
	</div> 
	  <div class="form-group row">
	    <label for="descripcion" class="col-4 col-form-label">Descripcion</label> 
	    <div class="col-8">
	      <input id="descripcion" name="descripcion" placeholder="Descripcion" type="text" class="form-control" required="required">
	    </div>
	  </div>

	  <div class="form-group row">
	    <label for="codigo" class="col-4 col-form-label">Codigo</label> 
	    <div class="col-8">
	      <input id="codigo" name="codigo" placeholder="Codigo" type="text" class="form-control" required="required">
	    </div>
	  </div>
	  <div class="form-group row">
	    <label for="nit" class="col-4 col-form-label">Nit</label> 
	    <div class="col-8">
	      <input id="nit" name="nit" placeholder="Nit" type="text" class="form-control" required="required">
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
			<th>Empresa Usuarias</th>
			<th>Codigo Empresa Usuaria</th>
			<th>Nit</th>
			<th>Empresa Prestadora</th>
			<th>Descripcion</th>
		</tr>
	</thead>
	<tbody>
 
	<?php 
	$val = 0;
	for($i=0; $i<count($listatemporales);$i++){

		$val ++;
		$conteoreq = 0;
		$empresausuaria=$listatemporales[$i]['empresausuaria'];
		$nit=$listatemporales[$i]['nit'];	
		$centrocosto=$listatemporales[$i]['centrocosto'];	
		$nombretemporal=$listatemporales[$i]['nombretemporal'];	
		$descripcion=$listatemporales[$i]['descripcion'];			
		echo  '<tr>
		<td>'.$empresausuaria.'</td>
		<td>'.$centrocosto.'</td>
		<td>'.$nit.'</td>
		<td>'.$nombretemporal.'</td>
		<td>'.$descripcion.'</td></tr>';
	}
	?>
    </tbody>
</table>