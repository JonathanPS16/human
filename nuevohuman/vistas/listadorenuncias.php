<h5>Proceso de Renuncias </h5>
<table class="table table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Motivo</th>
			<th>Fecha Retiro</th>
			<th>Nombre</th>
			<th>Cedula</th>
			<th>Observaciones</th>
			<th>Archivos</th>
			<th>Ver</th>
		</tr>
	</thead>
	<tbody>
<?php 
for($i=0; $i<count($listatemporales);$i++){
    $id=$listatemporales[$i]['id_renuncia'];
	$cargo=$listatemporales[$i]['cargo'];
	$nombre=$listatemporales[$i]['nombre'];
	$observaciones=$listatemporales[$i]['observaciones'];
	$motivo=$listatemporales[$i]['motivo'];
	$paz=$listatemporales[$i]['paz'];
	$renuncia=$listatemporales[$i]['renuncia'];
	$fecharetiro=$listatemporales[$i]['fecharetiro'];
	$cedula=$listatemporales[$i]['cedula'];
	$estado=$listatemporales[$i]['estado'];
	$archivo=$listatemporales[$i]['archivo'];
	$correo=$listatemporales[$i]['correo'];

	
	$modalbotonextra ='<div class="modal fade" id="exampleModalextra'.$id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enviar Documento de Terminacion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="home.php?ctr=retiro&acc=guardarenviar" method="post" enctype="multipart/form-data">
		<fieldset>
		<div class="form-group row">
            <label for="presentarse" class="col-4 col-form-label">Correo Electronico</label> 
            <div class="col-8">
              <input id="correo" name="correo" placeholder="correo@electronico.com" type="email" class="form-control" required="required">
            </div>
          </div> 
		<!-- File Button --> 
		<div class="form-group">
		  <label class="col-md-4 control-label" for="filebutton"></label>
		  <div class="col-md-4">
      <input id="id" name="id" type="hidden" value="'.$id.'">
		    <input id="filebutton" name="filebutton" class="input-file" type="file" required="required">
		  </div>
		</div>
		<!-- Button -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="guardar"></label>
		  <div class="col-md-4">
		    <button id="guardar" name="guardar" class="btn btn-primary">Guardar</button>
		  </div>
		</div>

		</fieldset>
		</form>

        
      </div>
      
    </div>
  </div>
</div>
';
    $botonextra ='<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalextra'.$id.'">
  Enviar Documento
</button>';	
$boton ='<a href="archivosgenerales/'.$paz.'" target="_black" >Paz y salvo</a><br>';
$botondos ='<a href="archivosgenerales/'.$renuncia.'" target="_black" >Renuncia</a>';

if($estado=='T'){
	$modalbotonextra ="";
	$botonextra ="Enviado a:<br>".$correo.'<br><a href="archivosgenerales/'.$archivo.'" target="_black" >Archivo</a>';
}
    echo "<tr>
    		<td>".$id."</td>
			<td>".$motivo."</td>
			<td>".$fecharetiro."</td>
			<td>".$nombre."</td>
			<td>".$cedula."</td>
			<td>".$observaciones."</td>
			<td>".$boton.$botondos."</td>
    		<td>".$modalbotonextra.$botonextra."</td>
    </tr>";
  }

?>
</tbody>
</table>