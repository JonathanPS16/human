<table class="table table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nombre de Funcionario</th>
      <th>Cargo</th>
      <th>Cedula</th>
	  <th>Archivos Prueba</th>
	  <th>Conclucion Entrevista</th>
	  <th>Accion</th>
      
		</tr>
	</thead>
	<tbody>
    <tr>
	<?php 
	$val = 0;
	for($i=0; $i<count($listatemporales);$i++){

		$val ++;
		$conteoreq = 0;
		$nombrefuncionario=$listatemporales[$i]['nombrefuncionario'];
		$cargo=$listatemporales[$i]['cargo'];
		$id=$listatemporales[$i]['id_proceso'];
		$cedula=$listatemporales[$i]['cedula'];
		$estado=$listatemporales[$i]['estado'];
		$archivouno=$listatemporales[$i]['archivouno'];
		$archivodos=$listatemporales[$i]['archivodos'];
		$archivotres=$listatemporales[$i]['archivotres'];
		$correoempleado=$listatemporales[$i]['correoempleado'];
		$conclucionentre=$listatemporales[$i]['conclucionentre'];

		
		$archivos = "";
		if($archivouno!=""){
			$archivos .= "<a href ='archivosgenerales/".$archivouno."' target='_black'>Archivo Uno</a><br>";
		}
		if($archivodos!=""){
			$archivos .= "<a href ='archivosgenerales/".$archivodos."' target='_black'>Archivo Dos</a><br>";
		}
		if($archivotres!=""){
			$archivos .= "<a href ='archivosgenerales/".$archivotres."' target='_black'>Archivo Tres</a><br>";
		}

		
		$estadolb = "";
		  
		$modalbotonhoja ='<div class="modal fade" id="exampleModalhv'.$id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Citacion  de Empleado</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" action="home.php?ctr=proceso&acc=guardarcitacion" method="post" enctype="multipart/form-data">
			<input type ="hidden" name="id" id ="id" value="'.$id.'">
			<input type ="hidden" name="correo" id ="correo" value="'.$correoempleado.'"><div class="form-group row">
    <label for="fechacitacion" class="col-4 col-form-label">Fecha Citacion</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-address-book"></i>
          </div>
        </div> 
        <input id="fechacitacion" name="fechacitacion" placeholder="yyyy-mm-dd hh:mm:ss" type="text" required="required" class="form-control">
      </div>
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Citar</button>
    </div>
  </div>
			</form>
	
			
		  </div>
		  
		</div>
	  </div>
	</div>
	';
		$botonhoja ='<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalhv'.$id.'">
	  Citar Empleado
	</button>';	

	$modalbotonhojados ='<div class="modal fade" id="exampleModalen'.$id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Conclucion Entrevista</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" action="home.php?ctr=proceso&acc=guardarconclucion" method="post" enctype="multipart/form-data">
			<div class="form-group row">
			<input type ="hidden" name="id" id ="id" value="'.$id.'">
    <label for="entrevista" class="col-4 col-form-label">Concluciones Entrevista</label> 
    <div class="col-8">
      <textarea id="entrevista" name="entrevista" cols="40" rows="5" class="form-control" required="required"></textarea>
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Guardar Conclucion</button>
    </div>
  </div>
			</form>
	
			
		  </div>
		  
		</div>
	  </div>
	</div>
	';
		$botonhojados ='<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalen'.$id.'">
	  Conclucion Entrevista
	</button>';	


	$modalbotonhojatres ='<div class="modal fade" id="exampleModalena'.$id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Conclusion Proceso Diciplinario</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" action="home.php?ctr=proceso&acc=guardarfinalproceso" method="post" enctype="multipart/form-data">
			<input type ="hidden" name="correo" id ="correo" value="'.$correoempleado.'">
			<input type ="hidden" name="id" id ="id" value="'.$id.'">
			<div class="form-group row">
    <label for="efecto" class="col-4 col-form-label">Efecto Diciplinario</label> 
    <div class="col-8">
      <textarea id="efecto" name="efecto" cols="40" rows="5" required="required" class="form-control"></textarea>
    </div>
  </div> 
  
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="archivofirmado" name="archivofirmado" required="required">
    <label class="custom-file-label" for="archivo3">Archivo Firmado</label>
  </div>
<bt><br><br>
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Finalizar Proceso</button>
    </div>
  </div>
  <script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
    
			</form>
	
			
		  </div>
		  
		</div>
	  </div>
	</div>
	';
		$botonhojatres ='<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalena'.$id.'">
	  Culminar Proceso
	</button>';	
		/*
	    $estadolb = '<a class="btn btn-primary" href = "home.php?ctr=proceso&acc=formu&id='.$id.'">Editar</a>';
		if($estado == "C" && $archivos!=""){
			$estadolb .= ' || <a class="btn btn-primary" href = "home.php?ctr=proceso&acc=notificar&id='.$id.'">Notificar</a><br>';
		}
		if ($archivos==""){
			$archivos="Sin Adjuntos";
		}

		if($estado =="N"){
			$estadolb ="En Validacion";
		}

		if($estado =="E"){
			$estadolb ="Citado";
		}*/

		if($estado =="N"){
			$estadolb = $modalbotonhoja.$botonhoja;
			$conclucionentre="Esperando Citacion";
		}

		if($estado =="E"){
			$estadolb = $modalbotonhojados.$botonhojados;
			$conclucionentre="Esperando Entrevista";
		}

		if($estado =="V"){
			$estadolb = $modalbotonhojatres.$botonhojatres;
		}



		$correo=$listatemporales[$i]['correo'];
		echo  '<tr><td>'.$val.'</td>
		<td>'.$nombrefuncionario.'</td>
  <td>'.$cargo.'</td>
  <td>'.$cedula.'</td>
  <td>'.$archivos.'</td>
  <td>'.$conclucionentre.'</td>
  <td>'.$estadolb.'</td></tr>';
	}
	?>
    </tbody>
</table>