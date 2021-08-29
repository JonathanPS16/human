<?php 
if($_GET['acc']=="formacla"){
	?>
	<h5>Definición Procesos Disciplinarios</h5>
	<?php
} else {
	?>
	<h5>Gestionar Procesos Disciplinarios</h5>
	<?php
}
?>
<table class="table table-striped table-bordered" id="myTable">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nombre de Funcionario</th>
			<th>Correo</th>
			<th>Cargo</th>
			<th>Cedula</th>
			<th>Lugar Trabajo</th>
			<th>Testigo</th>
			<th>Cargo Testigo</th>
			<th>Telefono Testigo</th>
			<th>Jefe Inmediato</th>
			<th>Correo Jefe Inmediato</th>
			<th>Fecha Evento</th>
			<th>Centro Costos</th>
			<th>Descripcion Suceso</td>
			<th>Archivos Adjuntos</th>
			<th>Cita</th>
			<th>Explicación</th>
			<th>Estado Proceso</th>
			<th>Accion</th>  
		</tr>
	</thead>
	<tbody>
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
		$aclaracionempleado=$listatemporales[$i]['aclaracionempleado'];
		
		
		$tipoproceso=$listatemporales[$i]['tipoproceso'];
		$archivoconclusionproceso=$listatemporales[$i]['archivoconclusionproceso'];
		$archivoacaraempleado=$listatemporales[$i]['archivoacaraempleado'];

		if($aclaracionempleado!=""){
			$conclucionentre=$aclaracionempleado;
		}
		$inforproceso = ($tipoproceso =="solicitud") ? "Solicitud Aclaracion" : "Entrevista";

		
		$archivos = "";
		if($archivouno!=""){
			$archivos .= "<a href ='archivosgenerales/".$archivouno."' target='_black' class='btn btn-primary'><i class='far fa-file-word'></i>
			Archivo Uno</a><br><br>";
		}
		if($archivodos!=""){
			$archivos .= "<a href ='archivosgenerales/".$archivodos."' target='_black' class='btn btn-primary'>Archivo Dos</a><br><br>";
		}
		if($archivotres!=""){
			$archivos .= "<a href ='archivosgenerales/".$archivotres."' target='_black' class='btn btn-primary'>Archivo Tres</a><br><br>";
		}

		if($archivoconclusionproceso!=""){
			$archivos .= "<a href ='archivosgenerales/".$archivoconclusionproceso."' target='_black' class='btn btn-primary'>Adjunto Proceso</a><br><br>";
		}

		if($archivoacaraempleado!=""){
			$archivos .= "<a href ='archivosgenerales/".$archivoacaraempleado."' target='_black' class='btn btn-primary'>Adjunto Empleado</a><br><br>";
		}

		

		
		$estadolb = "";
		  
		$modalbotonhoja ='<div class="modal fade" id="exampleModalhv'.$id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Citación Proceso Disciplinario</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" action="home.php?ctr=proceso&acc=guardarcitacion" method="post" enctype="multipart/form-data">
			<input type ="hidden" name="id" id ="id" value="'.$id.'">
			<input type ="hidden" name="tipo" id ="tipo" value="cita">
			<input type ="hidden" name="correo" id ="correo" value="'.$correoempleado.'">
			<div class="form-group row">
    <label for="fechacitacion" class="col-4 col-form-label">Fecha Citacion</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-address-book"></i>
          </div>
        </div> 
        <input id="fechacitacion" name="fechacitacion" placeholder="yyyy-mm-dd hh:mm:ss" type="date" required="required" class="form-control">
      </div>
    </div>
  </div> 
  
  <div class="form-group row">
    <label for="justificacion" class="col-4 col-form-label">Consideraciones Proceso Disciplinario</label> 
    <div class="col-8">
      <textarea id="justificacion" name="justificacion" cols="40" rows="5" required="required" class="form-control"></textarea>
    </div>
  </div> 
  <div class="form-group row">
    <label for="horacita" class="col-4 col-form-label">Hora Citacion</label> 
    <div class="col-8">
      <input id="horacita" name="horacita" placeholder="HH:mm" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="sedelugar" class="col-4 col-form-label">Lugar / Sede</label> 
    <div class="col-8">
      <input id="sedelugar" name="sedelugar" placeholder="Lugar / Sede" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="modalidadcita" class="col-4 col-form-label">Modalidad Citacion</label> 
    <div class="col-8">
      <select id="modalidadcita" name="modalidadcita" class="custom-select" required="required">
	  <option value="presencial">Presencial</option>
	  <option value="Videollamada">Videoteleconferencia</option>
	  <option value="Cuestionario">Cuestionario</option>
	  <option value="Otro">Otro</option>
      </select>
    </div>
  </div> 

  <div class="form-group row">
	  <label for="sedelugar" class="col-4 col-form-label">Informacion Extra Modalidad Cita</label> 
	  <div class="col-8">
		<input id="infoextra" name="infoextra" placeholder="Link, Direccion o Cuestionario" type="text" class="form-control" required="required">
	  </div>
	</div>

  <div class="form-group row">
    <label for="archivo1" class="col-4 col-form-label">Archivo</label> 
    <div class="col-8">
      <input id="archivo1" name="archivo1" type="file" class="form-control" required="required">
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
		



	$modalbotonhojaex ='<div class="modal fade" id="exampleModalrespuesta'.$id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Solicitar Explicación Proceso Disciplinario</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" action="home.php?ctr=proceso&acc=guardarexplicacionempleado" method="post" enctype="multipart/form-data">
			<input type ="hidden" name="id" id ="id" value="'.$id.'">
			<input type ="hidden" name="tipo" id ="tipo" value="solicitud">
			<input type ="hidden" name="correo" id ="correo" value="'.$correoempleado.'">
			<div class="form-group row">
    <label for="fecha" class="col-4 col-form-label">Fecha Limite Explicación</label> 
    <div class="col-8">
      <input id="fecha" name="fecha" type="date" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="razonllamado" class="col-4 col-form-label">Concideraciones Proceso Disciplinario</label> 
    <div class="col-8">
      <textarea id="razonllamado" name="razonllamado" cols="40" rows="5" class="form-control" required="required"></textarea>
    </div>
  </div>
  <div class="form-group row">
    <label for="archivo" class="col-4 col-form-label">Archivo Adjunto</label> 
    <div class="col-8">
      <input id="archivo" name="archivo" type="file" class="form-control" >
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Enviar Solicitud</button>
    </div>
  </div>
			
		  </div>
		  
		</div>
	  </div>
	</div>
	';
		$botonhojaex ='<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalrespuesta'.$id.'">
	  Solicitar Explicacion
	</button>';	
	$botonhoja ='<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalhv'.$id.'">
	  Citar Empleado
	</button>';	

	$modalbotonhojados ='<div class="modal fade" id="exampleModalen'.$id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Conclucion Aclaracion</h5>
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
	  Respuesta Empleado
	</button>';

	$botonhojados="Esperando Respuesta";
	
	$modalbotonhojadose ='<div class="modal fade" id="exampleModalen'.$id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Diligencia a Descargos</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" action="home.php?ctr=proceso&acc=guardarconclucion" method="post" enctype="multipart/form-data">
			<div class="form-group row">
			<input type ="hidden" name="id" id ="id" value="'.$id.'">
    <label for="entrevista" class="col-4 col-form-label">Conclusiones Entrevista</label> 
    <div class="col-8">
      <textarea id="entrevista" name="entrevista" cols="40" rows="5" class="form-control" required="required"></textarea>
    </div>
  </div> <br><br>
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="archivofirmado" name="archivofirmado" required="required">
    <label class="custom-file-label" for="archivo3">Adjuntar Documento</label>
  </div><br><br>
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Guardar Diligencia</button>
    </div>
  </div>
			</form>
	
			
		  </div>
		  
		</div>
	  </div>
	</div>
	';
		$botonhojadose ='<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalen'.$id.'">
	  Conclusion Entrevista
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

  <div class="form-group row">
    <label for="fechainimedida" class="col-4 col-form-label">Fecha Inicio Medida</label> 
    <div class="col-8">
      <input id="fechainimedida" name="fechainimedida" type="date" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="fechafinmedida" class="col-4 col-form-label">Fecha Final Medida</label> 
    <div class="col-8">
      <input id="fechafinmedida" name="fechafinmedida" type="date" class="form-control">
    </div>
  </div> 
  
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="archivofirmado" name="archivofirmado" required="required">
    <label class="custom-file-label" for="archivo3">Archivo Firmado</label>
  </div>
<bt><br><br>
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Enviar Conclusion</button>
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
	  Enviar Conclusion
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
			//$estadolb = $modalbotonhoja.$botonhoja;
			$conclucionentre="Sin Definir";
		}

		if($estado =="E"){
			$modalbotonhoja ="";
			$botonhoja = "";
			$modalbotonhojaex="";
			$botonhojaex = "";
			if($tipoproceso=="solicitud") {
				$conclucionentre="Esperando ".$inforproceso;
				$estadolb = $modalbotonhojados.$botonhojados;

			} else {
				$estadolb = $modalbotonhojadose.$botonhojadose;
				$conclucionentre="Esperando ".$inforproceso;
			}
			
		}

		if($estado =="V"){
			$modalbotonhoja ="";
			$botonhoja = "";
			$modalbotonhojaex="";
			$botonhojaex = "";
			$estadolb = $modalbotonhojatres.$botonhojatres;
		}



		$correo=$listatemporales[$i]['correo'];
		echo  '<tr>
		<td>'.$val.'</td>
		<td>'.$nombrefuncionario.'</td>
		<td>'.$listatemporales[$i]['correo'].'</td>
		<td>'.$cargo.'</td>
		<td>'.$cedula.'</td>
		<td>'.$listatemporales[$i]['lugartrabajo'].'</td>
		<td>'.$listatemporales[$i]['testigo'].'</td>
		<td>'.$listatemporales[$i]['cargotestigo'].'</td>
		<td>'.$listatemporales[$i]['telefonotestigo'].'</td>
		<td>'.$listatemporales[$i]['jefeinmediato'].'</td>
		<td>'.$listatemporales[$i]['coreojefe'].'</td>
		<td>'.$listatemporales[$i]['fechaevento'].'</td>
		<td>'.$listatemporales[$i]['centrocostos'].'</td>
		<td>'.$listatemporales[$i]['descripcion'].'</td>
		<td>'.$archivos.'</td>
		<td>'.$modalbotonhoja.$botonhoja.'</td>
		<td>'.$modalbotonhojaex.$botonhojaex.'</td> 
		<td>'.$conclucionentre.'</td>
		<td>'.$estadolb.'</td></tr>';
	}
	?>
    </tbody>
</table>