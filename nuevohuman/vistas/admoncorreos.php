<h5>Configuración Correo</h5>
<br><br>

<table class="table table-striped table-bordered" id="myTable">
	<thead>
		<tr>
			<th>Host</th>
			<th>Puerto</th>
			<th>Usuario</th>
			<th>Correo</th>
			<th>Label Correo</th>
			<th>Clave</th>
			<th>Footer Correos</th>
			<th>Correos Mensaje</th>
			<th>Editar</th>
		</tr>
	</thead>
	<tbody>
	<?php 
	$val = 0;
	for($i=0; $i<count($listatemporales);$i++){

		$val ++;
		$conteoreq = 0;
		$id = $listatemporales[$i]['idconfig'];
		
$modalbotonenviarcorreo ='<div class="modal fade" id="exampleModalextraenvio'.$id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
	<div class="modal-header">
	  <h5 class="modal-title" id="exampleModalLabel">Editar Configuración</h5>
	  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	  </button>
	</div>
	<div class="modal-body">
	  <form class="form-horizontal" action="home.php?ctr=admon&acc=guardarconfigcorreo" method="post" enctype="multipart/form-data">
	  <fieldset>
	  <div class="form-group row">
    <label for="host" class="col-4 col-form-label">Host</label> 
    <div class="col-8">
	<input id="id" name="id" value="'.$id.'" type="hidden">
      <input id="host" name="host" type="text" class="form-control" required="required" value ="'.$listatemporales[$i]['host'].'">
    </div>
  </div>
  <div class="form-group row">
    <label for="puerto" class="col-4 col-form-label">Puerto</label> 
    <div class="col-8">
      <input id="puerto" name="puerto" type="text" class="form-control" required="required" value ="'.$listatemporales[$i]['puerto'].'">
    </div>
  </div>
  <div class="form-group row">
    <label for="usuario" class="col-4 col-form-label">Usuario</label> 
    <div class="col-8">
      <input id="usuario" name="usuario" type="text" class="form-control" required="required" value ="'.$listatemporales[$i]['usuario'].'">
    </div>
  </div>
  <div class="form-group row">
    <label for="clave" class="col-4 col-form-label">Clave</label> 
    <div class="col-8">
      <input id="clave" name="clave" type="text" class="form-control" required="required" value ="'.$listatemporales[$i]['clave'].'">
    </div>
  </div>
  <div class="form-group row">
    <label for="correo" class="col-4 col-form-label">Correo</label> 
    <div class="col-8">
      <input id="correo" name="correo" type="text" class="form-control" required="required" value ="'.$listatemporales[$i]['correo'].'">
    </div>
  </div>
  <div class="form-group row">
    <label for="correo" class="col-4 col-form-label">Label Correo</label> 
    <div class="col-8">
      <input id="label" name="label" type="text" class="form-control" required="required" value ="'.$listatemporales[$i]['mensajecorreo'].'">
    </div>
  </div>
  <div class="form-group row">
    <label for="footer" class="col-4 col-form-label">Footer Correos</label> 
    <div class="col-8">
      <input id="footer" name="footer" type="text" class="form-control" required="required" value ="'.$listatemporales[$i]['footer'].'">
    </div>
  </div> 
  <div class="form-group row">
    <label for="footer" class="col-4 col-form-label">Correos Mensaje</label> 
    <div class="col-8">
      <input id="correos" name="correos" type="text" class="form-control" required="required" value ="'.$listatemporales[$i]['correosnoti'].'">
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Guardar</button>
    </div>
  </div>

	  </fieldset>
	  </form>

	  
	</div>
	
  </div>
</div>
</div>
';

$botonextraenviarcorreo =$modalbotonenviarcorreo.'<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalextraenvio'.$id.'">
Editar 
</button>';	
		
		?><tr>
			<td><?=$listatemporales[$i]['host']?></td>
			<td><?=$listatemporales[$i]['puerto']?></td>
			<td><?=$listatemporales[$i]['usuario']?></td>
			<td><?=$listatemporales[$i]['correo']?></td>
			<td><?=$listatemporales[$i]['mensajecorreo']?></td>
			<td><?=$listatemporales[$i]['clave']?></td>
			<td><?=$listatemporales[$i]['footer']?></td>
			<td><?=$listatemporales[$i]['correosnoti']?></td>
			<td><?=$botonextraenviarcorreo?></th>
	</tr><?php 
	}
	?>
	</tbody>
	</table>
