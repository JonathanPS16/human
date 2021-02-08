<h5>Permisos de Salida</h5><br>

<div class="modal fade" id="nuevahoraextra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Permisos de Salida </h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" action="home.php?ctr=novedades&acc=guardarformsalida" method="post" enctype="multipart/form-data">
			<div class="form-group row">
    <label for="fecha" class="col-4 col-form-label">Fecha</label> 
    <div class="col-8">
      <input id="fecha" name="fecha" placeholder="Fecha" type="date" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="codigo" class="col-4 col-form-label">Codigo</label> 
    <div class="col-8">
      <input id="codigo" name="codigo" placeholder="Codigo" type="text" class="form-control" required="required" minlength="4" maxlength="4">
    </div>
  </div>
  <div class="form-group row">
    <label for="cedula" class="col-4 col-form-label">Cedula</label> 
    <div class="col-8">
      <input id="cedula" name="cedula" placeholder="cedula" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="nombre" class="col-4 col-form-label">Nombre</label> 
    <div class="col-8">
      <input id="nombre" name="nombre" placeholder="Nombre" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="seccion" class="col-4 col-form-label">Seccion/Departamento</label> 
    <div class="col-8">
      <input id="seccion" name="seccion" placeholder="Seccion/Departamento" type="text" class="form-control" required="required">
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
    <label for="motivo" class="col-4 col-form-label">Motivo</label> 
    <div class="col-8">
      <textarea id="motivo" name="motivo" cols="40" rows="5" class="form-control" required="required"></textarea>
    </div>
  </div>
  <div class="form-group row">
    <label for="remunerado" class="col-4 col-form-label">Remunerado?</label> 
    <div class="col-8">
      <select id="remunerado" name="remunerado" class="custom-select" required="required">
        <option value="SI">SI</option>
        <option value="NO">NO</option>
      </select>
    </div>
  </div> 

  <div class="form-group row">
    <label for="quincena" class="col-4 col-form-label">Quincena</label> 
    <div class="col-8">
      <select id="quincena" name="quincena" class="custom-select" required="required">
        <option value="1ra Enero">1ra Enero</option>
        <option value="2da Enero">2da Enero</option>
        <option value="1ra Febrero">1ra Febrero</option>
        <option value="2da Febrero">2da Febrero</option>
        <option value="1ra Marzo">1ra Marzo</option>
        <option value="2da Marzo">2da Marzo</option>
        <option value="1ra Abril">1ra Abril</option>
        <option value="2da Abril">2da Abril</option>
        <option value="1ra Mayo">1ra Mayo</option>
        <option value="2da Mayo">2da Mayo</option>
        <option value="1ra Junio">1ra Junio</option>
        <option value="2da Junio">2da Junio</option>
        <option value="1ra Julio">1ra Julio</option>
        <option value="2da Julio">2da Julio</option>
        <option value="1ra Agosto">1ra Agosto</option>
        <option value="2da Agosto">2da Agosto</option>
        <option value="1ra Septiembre">1ra Septiembre</option>
        <option value="2da Septiembre">2da Septiembre</option>
        <option value="1ra Octubre">1ra Octubre</option>
        <option value="2da Octubre">2da Octubre</option>
        <option value="1ra Noviembre">1ra Noviembre</option>
        <option value="2da Noviembre">2da Noviembre</option>
        <option value="1ra Diciembre">1ra Diciembre</option>
        <option value="2da Diciembre">2da Diciembre</option>

        <option value="NO">NO</option>
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
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#nuevahoraextra">Agregar Permiso</button>
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
			<th>Motivo</th>
			<th>Remunerado</th>
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
		$motivo=$listatemporales[$i]['motivo'];
		$remunerado=$listatemporales[$i]['remunerado'];
		$fechagrab=$listatemporales[$i]['fechagrab'];
	
		

		echo  '<tr>
		<td>'.$fecha.'</td>
  <td>'.$codigo.'</td>
  <td>'.$nombre.'</td>
  <td>'.$seccion.'</td>
  <td>'.$desde.'</td>
  <td>'.$hasta.'</td>
  <td>'.$motivo.'</td>
  <td>'.$remunerado.'</td>
  <td>'.$fechagrab.'</td>
  </tr>';
	}
	?>
    </tbody>
</table>
