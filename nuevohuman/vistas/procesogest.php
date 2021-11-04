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
			<th>Descripcion Suceso&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<th>Archivos Adjuntos</th>
			<th>Cita&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
			<th>Explicación</th>
			<th>Validacion Conclusión</th>
			<th>Estado Proceso</th>
			<th>Accion</th>  
		</tr>
	</thead>
	<tbody>
	<?php 
	$val = 0;
	for($i=0; $i<count($listatemporales);$i++){
		$estadolb ="";
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
		$correoempleado =$listatemporales[$i]['correoempleado'];
		$conclucionentre=$listatemporales[$i]['conclucionentre'];
		$aclaracionempleado=$listatemporales[$i]['aclaracionempleado'];
		
		
		$tipoproceso=$listatemporales[$i]['tipoproceso'];
		$archivoconclusionproceso=$listatemporales[$i]['archivoconclusionproceso'];
		$archivoacaraempleado=$listatemporales[$i]['archivoacaraempleado'];
		$archivoconclusionproceso=$listatemporales[$i]['archivoconclusionproceso'];

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

		

		if($archivoconclusionproceso!=""){
			$archivos .= "<a href ='archivosgenerales/".$archivoconclusionproceso."' target='_black' class='btn btn-primary'>Acta Descargos</a><br><br>";
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
    <label for="razonllamado" class="col-4 col-form-label">Consideraciones Proceso Disciplinario</label> 
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
		</form>	
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
  <div class="form-group row">
    <label class="col-4 col-form-label" for="archivofirmado">Adjuntar Documento</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-cloud-upload"></i>
          </div>
        </div> 
        <input id="archivofirmado" name="archivofirmado" required="required" type="file" class="form-control">
      </div>
    </div>
  </div> 
 
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
		Conclusión Entrevista
	</button>';


	$modalbotonhojatres ='<div class="modal fade" id="exampleModalena'.$id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Conclusión Proceso Disciplinario</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" action="home.php?ctr=proceso&acc=guardarfinalproceso" method="post" enctype="multipart/form-data">
			<input type ="hidden" name="correo" id ="correo" value="'.$correoempleado.'">
			<input type ="hidden" name="id" id ="id" value="'.$id.'">
			<div class="form-group row">
    <label for="efecto" class="col-4 col-form-label">Conclusión Preliminar</label> 
    <div class="col-8">
      <textarea id="efecto" name="efecto" cols="40" rows="5" required="required" class="form-control"></textarea>
    </div>
  </div> 

  
<div class="form-group row">
    <label class="col-4 col-form-label" for="archivofirmado">Archivo Firmado</label> 
    <div class="col-8">
      <div class="input-group">
	  <p>En el archivo adjunto encontrará el modelo de la decision propuesta del proceso</p>
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-cloud-upload"></i>
          </div>
        </div> 
        <input id="archivofirmado" name="archivofirmado" type="file" class="form-control">
      </div>
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Enviar Conclusión</button>
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
	  Enviar Conclusión
	</button>';	

	$modalbotonhojatresa ='<div class="modal fade" id="exampleModalenaa'.$id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Notificacion Proceso Disciplinario</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" action="home.php?ctr=proceso&acc=guardarfinalprocesonotificaciones" method="post" enctype="multipart/form-data">
			
			<div class="form-group row">
            <label for="presentarse" class="col-4 col-form-label">Correos Electronico (Separados por ;)</label> 
            <div class="col-8">
              <input id="correoextra" name="correoextra" placeholder="correo@electronico.com;correo2@electronico.com" type="text" class="form-control" >
            </div>
          </div> 
			<div class="form-group row">
			<label class="col-4 col-form-label">Enviar a</label> 
			<div class="col-8">
			  <div class="custom-controls-stacked">
				<div class="custom-control custom-checkbox">
				  <input name="checkbox_0" id="checkbox_0" type="checkbox" class="custom-control-input" value="1" checked="checked"> 
				  <label for="checkbox_0" class="custom-control-label">Empleado</label>
				</div>
			  </div>
			  <div class="custom-controls-stacked">
				<div class="custom-control custom-checkbox">
				  <input name="checkbox_1" id="checkbox_1" type="checkbox" class="custom-control-input" value="2" checked="checked"> 
				  <label for="checkbox_1" class="custom-control-label">Servicio Cliente</label>
				</div>
			  </div>
			  <div class="custom-controls-stacked">
				<div class="custom-control custom-checkbox">
				  <input name="checkbox_2" id="checkbox_2" type="checkbox" class="custom-control-input" value="3" checked="checked"> 
				  <label for="checkbox_2" class="custom-control-label">Jefe Inmediato</label>
				</div>
			  </div>
			  <div class="custom-controls-stacked">
				<div class="custom-control custom-checkbox">
				  <input name="checkbox_3" id="checkbox_3" type="checkbox" class="custom-control-input" value="3" checked="checked"> 
				  <label for="checkbox_3" class="custom-control-label">Empresa Usuaria</label>
				</div>
			  </div>
			</div>
		  </div> 
		  <div class="form-group row">
    <label class="col-4 col-form-label" for="archivofirmado">Archivo Firmado</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-cloud-upload"></i>
          </div>
        </div> 
        <input id="archivofirmado" name="archivofirmado" type="file" class="form-control">
      </div>
    </div>
  </div> 

		
<bt><br><br>
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Enviar Notificacion</button>
    </div>
  </div>
  <input type ="hidden" name="correo" id ="correo" value="'.$correoempleado.'">
  <input type ="hidden" name="correojefe" id ="correo" value="'.$listatemporales[$i]['coreojefe'].'">
  <input type ="hidden" name="correoempresau" id ="correoempresau" value="'.$listatemporales[$i]['correo'].'">
			<input type ="hidden" name="id" id ="id" value="'.$id.'">
			<input type ="hidden" name="menfinal" id ="menfinal" value="'.$listatemporales[$i]['concluaprobadaf'].'">
			</form>
	
			
		  </div>
		  
		</div>
	  </div>
	</div>
	';
		$botonhojatresa ='<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalenaa'.$id.'">
	  Notificar Conclusión
	</button>';	

	$modalbotonhojacierre ='<div class="modal fade" id="hojacierreaa'.$id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Cerrar Proceso</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
			<div class="modal-body">
				<form class="form-horizontal" id="cierre"'.$id.'" action="home.php?ctr=proceso&acc=cierreprematuro" method="post" enctype="multipart/form-data">
			
					<div class="form-group row">
						<label for="entrevista" class="col-4 col-form-label">Razón Cierre </label> 
						<div class="col-8">
							<textarea id="entrevista" name="entrevista" cols="40" rows="5" class="form-control" required="required"></textarea>
						</div>
					</div>
					<input type ="hidden" name="id" id ="id" value="'.$id.'">
					<div class="form-group row">
						<div class="offset-4 col-8">
							<button name="submit" type="submit" class="btn btn-primary">Cerrar Proceso</button>
						</div>
					</div>
				</form>
		
			</div>
		  
		</div>
	  </div>
	</div>
	';
		$botoncierre ='<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#hojacierreaa'.$id.'">
	  Cerrar Proceso
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

		if($estado =="N" ){
			
			if($listatemporales[$i]['explicacionextrat']!="S"){
				$marcaagua = "";
			$botonexplicacion ='<br><br><a class="btn btn-warning" href="home.php?ctr=proceso&acc=solicitarinfoextra&id='.$id.'">
				Solicitar Ampliacion
				</a>';
			} else {
				$marcaagua = "Ampliación Realizada";
				$botonexplicacion="";
			}
	
			$estadolb = $modalbotonhojacierre.$botoncierre.$botonexplicacion;
			
			$conclucionentre="Sin Definir";
		}

		if($estado =="E"){
			$modalbotonhoja ="";
			$modalbotonhojaex="";
			$botonhojaex="";
			$botonhoja = "";
			
			if($tipoproceso=="solicitud") {
				$conclucionentre="Esperando ".$inforproceso;
				$estadolb = $modalbotonhojados.$botonhojados;
				
				$botonhojaex = "Fecha Limite:".$listatemporales[$i]['fechacita']."<br>Razón:".$listatemporales[$i]['razon']."<br><br><a href ='archivosgenerales/".$listatemporales[$i]['archivo']."' target='_black' class='btn btn-primary'>Adjunto Explicación</a><br><br>";

			} else {
				$estadolb = $modalbotonhojadose.$botonhojadose;
				$conclucionentre="Esperando ".$inforproceso;
				$botonhoja = "Citado Entrevista <br>Modalidad:".$listatemporales[$i]['modalidadcita']."<br>Lugar Citación:".$listatemporales[$i]['sedelugar']."<br>Lugra O link:".$listatemporales[$i]['extradata'];
			
			}
			
		}

		if($estado =="V"){
			$modalbotonhoja ="";
			$botonhoja = "";
			
			$modalbotonhojaex="";
			$botonhojaex = "";
			if($tipoproceso=="solicitud") {
				$botonhojaex = "Respuesta empleado:".$listatemporales[$i]['aclaracionempleado']."<br><br><a href ='archivosgenerales/".$listatemporales[$i]['archivo']."' target='_black' class='btn btn-primary'>Solicitud Explicación</a>"."<br><br><a href ='archivosgenerales/".$archivoacaraempleado."' target='_black' class='btn btn-primary'>Respuesta Explicación</a><br>";
			}else {
				$botonhoja = "Conclusión Entrevista<br>".$listatemporales[$i]['conclucionentre'];
			}
			$conclucionentre = "Pendiente Envio Conclusión";
			$estadolb = $modalbotonhojatres.$botonhojatres;
		}

		if($estado =="TT"){
			$modalbotonhoja ="";
			$botonhoja = "";
			$modalbotonhojaex="";
			$botonhojaex = "";
			if($tipoproceso=="solicitud") {
				$botonhojaex = "Respuesta empleado:".$listatemporales[$i]['aclaracionempleado'];
				if($archivoacaraempleado!=""){
					$botonhojaex .= "<br><br><a href ='archivosgenerales/".$archivoacaraempleado."' target='_black' class='btn btn-primary'>Adjunto Empleado</a><br><br>";
				}
			}else {
				$botonhoja = "Conclusión Entrevista<br>".$listatemporales[$i]['conclucionentre'];
			}
			$conclucionentre = "Por Notificar";
			$estadolb = $modalbotonhojatresa.$botonhojatresa;
		}



		$correo=$listatemporales[$i]['correo'];
		echo  '<tr>
		<td>'.$val.'</td>
		<td>'.$nombrefuncionario.'</td>
		<td>'.$listatemporales[$i]['correoempleado'].'</td>
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
		<td>'.$marcaagua. "   ".$listatemporales[$i]['descripcion'].'</td>
		<td>'.$archivos.'</td>
		<td>'.$modalbotonhoja.$botonhoja.'</td>
		<td>'.$modalbotonhojaex.$botonhojaex.'</td> 
		<td>'.$listatemporales[$i]['concluaprobadaf'].'</td>
		<td>'.$conclucionentre.'</td>
		<td>'.$estadolb.'</td></tr>';
	}
	?>
    </tbody>
</table>