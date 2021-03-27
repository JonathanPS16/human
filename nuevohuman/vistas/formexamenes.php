<h5>Examanes Medicos</h5><br>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Agregar Examen Medico
</button>
<br>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Examen Medico</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<form action="home.php?ctr=admon&acc=guardarexamenp" method="post">
			<input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>">
      <input type="hidden" name="idcand" id="idcand" value="0">
	  <div class="form-group row">
	    <label class="col-4 col-form-label" for="nombre">Nombre Examen</label> 
	    <div class="col-8">
	      <input id="nombre" name="nombre" placeholder="Nombre Examen" type="text" class="form-control" required="required">
	    </div>
	  </div>
	  <div class="form-group row">
	    <label class="col-4 col-form-label" for="nombre">Recomendaciones</label> 
	    <div class="col-8">
	      <input id="recomendacion" name="recomendacion" placeholder="Recomendacion para antes del examen" type="text" class="form-control" required="required">
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
			<th>Nombre Examen</th>
			<th>Recomendaciones</th>
		</tr>
	</thead>
	<tbody>
 
	<?php 
	$val = 0;
	for($i=0; $i<count($listatemporales);$i++){

		$val ++;
		$conteoreq = 0;
		$nombreexamen=$listatemporales[$i]['nombreexamen'];
		$recomendaciones=$listatemporales[$i]['recomendaciones'];			
		echo  '<tr>
		<td>'.$nombreexamen.'</td>
		<td>'.$recomendaciones.'</td></tr>';
	}
	?>
    </tbody>
</table>