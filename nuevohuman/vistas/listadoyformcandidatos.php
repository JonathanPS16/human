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
$cantidad="";

$cantidadestudios="";

$datos = array("secundaria","tecnico","tecnologo","universitario","postgrado","otros");

foreach ($datos as $estado) {
	//echo $estado."<br>";
	$cantidadestudios.='<div id="cona"><h5>'.ucfirst($estado).'</h5><div class="form-group row">
    <label for="'.$estado.'" class="col-4 col-form-label">Institución Educativa</label> 
    <div class="col-8">
      <input id="estudio['.$estado.']" name="estudio['.$estado.']" placeholder="Institución Educativa" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="'.$estado.'" class="col-4 col-form-label">Titulo Obtenido</label> 
    <div class="col-8">
      <input id="estudio['.$estado.']" name="estudio['.$estado.']" placeholder="Titulo Obtenido" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="'.$estado.'" class="col-4 col-form-label">Año Terminación</label> 
    <div class="col-8">
      <input id="estudio['.$estado.']" name="estudio['.$estado.']" placeholder="Año Terminación" type="text" class="form-control">
    </div>
  </div></div>';
	# code...
}

/*
  <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Institución Educativa</label> 
    <div class="col-8">
      <input id="text" name="text" placeholder="Institución Educativa" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="text1" class="col-4 col-form-label">Titulo Obtenido</label> 
    <div class="col-8">
      <input id="text1" name="text1" placeholder="Titulo Obtenido" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="text2" class="col-4 col-form-label">Año Terminación</label> 
    <div class="col-8">
      <input id="text2" name="text2" placeholder="Año Terminación" type="text" class="form-control">
    </div>
  </div> */
for($j=0; $j<5;$j++){
	//echo $j;

    $cantidad .= '<div id="cona"><h5>Familiar '.($j+1).'</h5><br><div class="form-group row">

    <label for="parentesco['.$j.'][\'nombre\']" class="col-4 col-form-label">Nombre</label> 
    <div class="col-8">
      <input id="parentesco['.$j.'][\'nombre\']" name="parentesco['.$j.'][\'nombre\']" placeholder="Nombre de Familiar" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="parentesco['.$j.'][\'parentesco\']" class="col-4 col-form-label">Parentesco</label> 
    <div class="col-8">
      <input id="parentesco['.$j.'][\'parentesco\']" name="parentesco['.$j.'][\'parentesco\']" placeholder="Parentesco" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="parentesco['.$j.'][\'fecha\']" class="col-4 col-form-label">Fecha Nacimiento</label> 
    <div class="col-8">
      <input id="parentesco['.$j.'][\'fecha\']" name="parentesco['.$j.'][\'fecha\']" placeholder="Fecha Nacimiento" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="parentesco['.$j.'][\'actividad\']" class="col-4 col-form-label">Actividad Actual</label> 
    <div class="col-8">
      <input id="parentesco['.$j.'][\'actividad\']" name="parentesco['.$j.'][\'actividad\']" placeholder="Actividad Actual" type="text" class="form-control">
    </div>
   
  </div></div>';
}


$cantidadexplab="";

for($j=0; $j<5;$j++){

	$cantidadexplab.='<div id="cona"><h5>Experiencia '.($j+1).'</h5><br><div class="form-group row">
    <label for="experiencia['.$j.'][\'empresa\']" class="col-4 col-form-label">Empresa</label> 
    <div class="col-8">
      <input id="experiencia['.$j.'][\'empresa\']" name="experiencia['.$j.'][\'empresa\']" placeholder="Empresa" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="experiencia['.$j.'][\'cargo\']" class="col-4 col-form-label">Cargo</label> 
    <div class="col-8">
      <input id="experiencia['.$j.'][\'cargo\']" name="experiencia['.$j.'][\'cargo\']" placeholder="Cargo " type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="experiencia['.$j.'][\'tiempo\']" class="col-4 col-form-label">Tiempo Servicio</label> 
    <div class="col-8">
      <input id="experiencia['.$j.'][\'tiempo\']" name="experiencia['.$j.'][\'tiempo\']" placeholder="Tiempo Servicio" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="experiencia['.$j.'][\'motivo\']" class="col-4 col-form-label">Motivo Retiro</label> 
    <div class="col-8">
      <input id="experiencia['.$j.'][\'motivo\']" name="experiencia['.$j.'][\'motivo\']" placeholder="Motivo Retiro " type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="experiencia['.$j.'][\'salario\']" class="col-4 col-form-label">Salario</label> 
    <div class="col-8">
      <input id="experiencia['.$j.'][\'salario\']" name="experiencia['.$j.'][\'salario\']" placeholder="Salario " type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="experiencia['.$j.'][\'funciones\']" class="col-4 col-form-label">Funciones</label> 
    <div class="col-8">
      <textarea id="experiencia['.$j.'][\'funciones\']" name="experiencia['.$j.'][\'funciones\']" cols="40" rows="5" class="form-control"></textarea>
    </div>
  </div></div> ';

}

    $modalbotonentre ='<div class="modal fade" id="exampleModal'.$idper.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="min-width: 50% !important" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ENTREVISTA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     

        <form class="form-horizontal" action="home.php?ctr=requisicion&acc=guardarPrueba" method="post" enctype="multipart/form-data">
		<fieldset>
		<div id ="listadoparientes">
		<center><h4>Información Grupo Familiar <br>(Personas con las que vive )</h4><hr></center>
		'.$cantidad.'
  		</div>
  		<div id ="listadoparientes">
		<center><h4>Información  Nivel de Estudios</h4><hr></center>
		'.$cantidadestudios.'
  		</div>

  		<div id ="listadoparientes">
		<center><h4>Experiencia Laboral</h4><hr></center>
		'.$cantidadexplab.'
  		</div>
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </div>

  </div>
  
  </div>
		</form>

        
      </div>
      
    
  </div>
</div>
';
$botonentre ='<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal'.$idper.'">
  Guardar Entrevista
</button>';	
    echo "<tr>
    		<td>".$idper."</td>
    		<td>".$nombre."</td>
    		<td>".$boton.$modalboton."</td>
    		<td>".$botonentre.$modalbotonentre."</td>
    		<td><a href='home.php?ctr=requisicion&acc=listaCandidatos&id=".$id."'>ver y Gestionar</a></td>
    </tr>";
  }

?>
</tbody>
</table>
<style type="text/css">
	#listadoparientes{
		border: 1px solid gray;
		padding: 5px;
		margin-bottom: 10px;
	}
	#cona{
		border: 1px solid black;
		padding: 5px;
		margin-bottom: 10px;
	}
	#cona h5 {
    color: blue;
    text-align: center;
    background-color: #BDBDBD;
    padding: 10px;
    color: white;
}
#listadoparientes h4{
	color: gray;
}
</style>
