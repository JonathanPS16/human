<h5>Horas Extra</h5><br>

<div class="modal fade" id="nuevahoraextra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Horas Extra </h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" action="home.php?ctr=novedades&acc=guardarformhoraextra" method="post" enctype="multipart/form-data">
			<div class="form-group row">
    <label for="fecha" class="col-4 col-form-label">Fecha</label> 
    <div class="col-8">
      <input id="fecha" name="fecha" placeholder="Fecha" type="date" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="codigo" class="col-4 col-form-label">Codigo</label> 
    <div class="col-8">
      <input id="codigo" name="codigo" placeholder="Codigo" type="text" class="form-control" minlength="4" maxlength="4" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="nombre" class="col-4 col-form-label">Nombre</label> 
    <div class="col-8">
      <input id="nombre" name="nombre" placeholder="Nombre" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="cedula" class="col-4 col-form-label">Cedula</label> 
    <div class="col-8">
      <input id="cedula" name="cedula" placeholder="Cedula" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="seccion" class="col-4 col-form-label">Seccion/Departamento</label> 
    <div class="col-8">
      <input id="seccion" name="seccion" placeholder="Seccion/Departamento" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="desde" class="col-4 col-form-label">Desde</label> 
    <div class="col-8">
      <input id="desde" name="desde" placeholder="Desde" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="hasta" class="col-4 col-form-label">Hasta</label> 
    <div class="col-8">
      <input id="hasta" name="hasta" placeholder="Hasta" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="motivo" class="col-4 col-form-label">Cantidad de Horas Extras</label> 
    <div class="col-8">
       <input id="horas" name="horas" placeholder="Horas" type="text" class="form-control" required="required">
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
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#nuevahoraextra">Agregar Horas Extra</button>
	<br><br>
<table class="table table-striped table-bordered" id="myTable">
	<thead>
		<tr>
			<th>Fecha</th>
			<th>Codigo</th>
			<th>Nombre </th>
			<th>Seccion / Departamento</th>
			<th>Desde</th>
			<th>Hasta</th>
			<th>Horas</th>
			<th>Fecha Grabacion</th>
		</tr>
	</thead>
	<tbody>
 
	<?php 
	$val = 0;
	for($i=0; $i<count($listatemporales);$i++){

		$val ++;
		$conteoreq = 0;
		$fecha=$listatemporales[$i]['fecha'];
		$codigo=$listatemporales[$i]['codigo'];
		$nombre=$listatemporales[$i]['nombre'];
		$seccion=$listatemporales[$i]['seccion'];
		$desde=$listatemporales[$i]['desde'];
		$hasta=$listatemporales[$i]['hasta'];
		$horas=$listatemporales[$i]['horas'];
		$fechagrab=$listatemporales[$i]['fechagrab'];
	
		

		echo  '<tr>
		<td>'.$fecha.'</td>
  <td>'.$codigo.'</td>
  <td>'.$nombre.'</td>
  <td>'.$seccion.'</td>
  <td>'.$desde.'</td>
  <td>'.$hasta.'</td>
  <td>'.$horas.'</td>
  <td>'.$fechagrab.'</td>
  </tr>';
	}
	?>
    </tbody>
</table>
<script>
 $(document).ready( function () {
    $('#example').DataTable();
	$('#myTable').DataTable();
} );
</script>