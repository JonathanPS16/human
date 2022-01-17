<h5>Incapacidades</h5><br>

<div class="modal fade" id="nuevahoraextra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Incapacidades</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" action="home.php?ctr=novedades&acc=guardarincap" method="post" enctype="multipart/form-data">
      <div class="form-group row">
    <label for="fecha" class="col-4 col-form-label">Fecha</label> 
    <div class="col-8">
      <input id="fecha" name="fecha" placeholder="Fecha" type="date" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="codigo" class="col-4 col-form-label">Codigo</label> 
    <div class="col-8">
      <input id="codigo" name="codigo" placeholder="Codigo" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="cedula" class="col-4 col-form-label">Cedula</label> 
    <div class="col-8">
      <input id="cedula" name="cedula" placeholder="Cedula" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="nombre" class="col-4 col-form-label">Nombre</label> 
    <div class="col-8">
      <input id="nombre" name="nombre" placeholder="Nombre" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="noincapacidad" class="col-4 col-form-label"># Incapacidad</label> 
    <div class="col-8">
      <input id="noincapacidad" name="noincapacidad" placeholder="# Incapacidad" type="text" required="required" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="fechainicio" class="col-4 col-form-label">Fecha Inicio</label> 
    <div class="col-8">
      <input id="fechainicio" name="fechainicio" placeholder="Fecha Inicio" type="text" required="required" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="fechafinal" class="col-4 col-form-label">Fecha Final</label> 
    <div class="col-8">
      <input id="fechafinal" name="fechafinal" placeholder="Fecha Final" type="text" required="required" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="diasincapacidad" class="col-4 col-form-label">Dias Incapacidad</label> 
    <div class="col-8">
      <input id="diasincapacidad" name="diasincapacidad" placeholder="Dias Incapacidad" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="diagnostico" class="col-4 col-form-label">Diagnostico</label> 
    <div class="col-8">
      <textarea id="diagnostico" name="diagnostico" cols="40" rows="5" class="form-control" required="required"></textarea>
    </div>
  </div>
  <div class="form-group row">
    <label for="archivo" class="col-4 col-form-label">Archivo  Max(2 Mb)</label> 
    <div class="col-8">
      <input id="archivo" name="archivo" placeholder="Archivo" type="file" class="form-control" required="required">
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
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#nuevahoraextra">Agregar Incapacidad</button>
	<br><br>
<table class="table table-striped table-bordered" id="myTable">
	<thead>
		<tr>
			<th>Fecha Reporte</th>
			<th>Cedula</th>
			<th>Nombre</th>
			<th>Incapacidad No</th>
			<th>Fecha Inicio</th>
			<th>Fecha Final</th>
			<th>Dias de Incapacidad</th>
      <th>Diagnostico</th>
      <th>Adjunto</th>
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
		$cedula=$listatemporales[$i]['cedula'];
		$nombre=$listatemporales[$i]['nombre'];
		$noincapacidad=$listatemporales[$i]['noincapacidad'];
		$fechainicio=$listatemporales[$i]['fechainicio'];
		$fechafinal=$listatemporales[$i]['fechafinal'];
    $diasincapacidad=$listatemporales[$i]['diasincapacidad'];
    $diagnostico=$listatemporales[$i]['diagnostico'];
    $archivo=$listatemporales[$i]['archivo'];
		$fechagrab=$listatemporales[$i]['fechagrab'];
	
		

		echo  '<tr>
		<td>'.$fecha.'</td>
  <td>'.$cedula.'</td>
  <td>'.$nombre.'</td>
  <td>'.$noincapacidad.'</td>
  <td>'.$fechainicio.'</td>
  <td>'.$fechafinal.'</td>
  <td>'.$diasincapacidad.'</td>
  <td>'.$diagnostico.'</td>
  <td><a href="archivosgenerales/'.$archivo.'" target="_black">Descargar</a></td>
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