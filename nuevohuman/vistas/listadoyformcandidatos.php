<br>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Agregar Candidato
</button>
<br>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Candidato</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<form action="home.php?ctr=requisicion&acc=guardarNuevoCandidato" method="post">
			<input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>">
	  <div class="form-group row">
	    <label class="col-4 col-form-label" for="nombre">Nombre Candidato</label> 
	    <div class="col-8">
	      <input id="nombre" name="nombre" placeholder="Nombre Candidato" type="text" class="form-control" required="required">
	    </div>
	  </div>
	  <div class="form-group row">
	    <label for="cedula" class="col-4 col-form-label">Cedula</label> 
	    <div class="col-8">
	      <input id="cedula" name="cedula" placeholder="Cedula" type="text" class="form-control" required="required">
	    </div>
	  </div>
	  <div class="form-group row">
	    <label for="telefono" class="col-4 col-form-label">Telefono</label> 
	    <div class="col-8">
	      <input id="telefono" name="telefono" placeholder="Telefono" type="text" class="form-control" required="required">
	    </div>
	  </div>
	  <div class="form-group row">
	    <label for="correo" class="col-4 col-form-label">Correo</label> 
	    <div class="col-8">
	      <input id="correo" name="correo" placeholder="Correo" type="text" class="form-control" required="required">
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
<table class="table table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Cargo</th>
			<th>Ver</th>
		</tr>
	</thead>
	<tbody>
<?php 
for($i=0; $i<count($listadoreq);$i++){
    $idper=$listadoreq[$i]['id'];
    $nombre=$listadoreq[$i]['nombre'];
    $cedula=$listadoreq[$i]['cedula'];
    $correo=$listadoreq[$i]['correo'];
    $enviocorreo=$listadoreq[$i]['enviocorreo']; 
    if($enviocorreo){
    $modalboton ='<div class="modal fade" id="exampleModal'.$idper.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">CARGA DE PRUEBA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="home.php?ctr=requisicion&acc=guardarPrueba" method="post" enctype="multipart/form-data">
		<fieldset>
		<!-- File Button --> 
		<div class="form-group">
		  <label class="col-md-4 control-label" for="filebutton"></label>
		  <div class="col-md-4">
		  <input id="id" name="id" type="hidden" value="'.$idper.'">
		    <input id="filebutton" name="filebutton" class="input-file" type="file">
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
    $boton ='<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal'.$idper.'">
  Adjuntar Prueba Psicotecnica
</button>';	
} else {
	$boton ='<a href="home.php?ctr=requisicion&acc=enviarCorreoPrueba&id='.$idper.'&idreq='.$idreq.'" class="btn btn-primary">Enviar Prueba</a>';	
}
    
    echo "<tr>
    		<td>".$idper."</td>
    		<td>".$nombre."</td>
    		<td>".$boton.$modalboton."</td>
    		<td>".$botonentre.$modalbotonentre."</td>
    		<td>".$botonentre.$modalbotonentre."</td>
    		<td><a href='home.php?ctr=requisicion&acc=listaCandidatos&id=".$id."'>ver y Gestionar</a></td>
    </tr>";
  }

?>
</tbody>
</table>