<h5>Mis Procesos Disciplinarios</h5>
<a  class="btn btn-primary" href="home.php?ctr=proceso&acc=validinfo">Nuevo Proceso</a>
<br><br><table class="table table-striped table-bordered" id="myTable">
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
			<th>Correo Testigo</th>
			<th>Jefe Inmediato</th>
			<th>Correo Jefe Inmediato</th>
			<th>Telefono Jefe Inmediato</th>
			<th>Fecha Evento</th>
			<th>Centro Costos</th>
			<th>Descripcion Suceso&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<th>Fecha Grabacion</th>
			<th>Archivos Prueba</th>
			<th>Conclusión Entrevista</th>
			<th>Decisión Preliminar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
			<th>Mi Conclusión&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
			<th>Tipificación</th>
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
		$fechaevento=$listatemporales[$i]['fechaevento'];
		$fechagrab=$listatemporales[$i]['fechagrab'];
		$archivouno=$listatemporales[$i]['archivouno'];
		$archivodos=$listatemporales[$i]['archivodos'];
		$archivotres=$listatemporales[$i]['archivotres'];
		$conclucions=$listatemporales[$i]['conclucionentre'];
		$conclucionsfinal=$listatemporales[$i]['conclucionfinal'];
		$archivofinals=$listatemporales[$i]['archivofinal'];
		$archivoconclusionproceso=$listatemporales[$i]['archivoconclusionproceso'];
		$archivoacaraempleado=$listatemporales[$i]['archivoacaraempleado'];
		$archivofinald=$listatemporales[$i]['archivofinald'];
		$aclaracionempleado=$listatemporales[$i]['aclaracionempleado'];
		if($aclaracionempleado!=""){
			$conclucions=$aclaracionempleado;
		}
		$archivos = "";
		if($archivouno!=""){
			$archivos .= "<a href ='archivosgenerales/".$archivouno."' target='_black' class='btn btn-primary'>Archivo Uno</a><br>";
		}
		if($archivodos!=""){
			$archivos .= "<br><a href ='archivosgenerales/".$archivodos."' target='_black' class='btn btn-primary'>Archivo Dos</a><br>";
		}
		if($archivotres!=""){
			$archivos .= "<br><a href ='archivosgenerales/".$archivotres."' target='_black' class='btn btn-primary'>Archivo Tres</a><br>";
		}

		if($archivoconclusionproceso!=""){
			$archivos .= "<br><a href ='archivosgenerales/".$archivoconclusionproceso."' target='_black' class='btn btn-primary'>Adjunto Proceso</a><br>";
		}

		if($archivoacaraempleado!=""){
			$archivos .= "<br><a href ='archivosgenerales/".$archivoacaraempleado."' target='_black' class='btn btn-primary'>Adjunto Empleado</a><br>";
		}

		

		

		
		$estadolb = "";
		  
		$modalbotonhojaaa ='<div class="modal fade" id="exampleModalhv'.$id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Validación Conclusión</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
		  <form class="form-horizontal" action="home.php?ctr=proceso&acc=guardarconclusionfinalvalidada" method="post" enctype="multipart/form-data">
		  <input type ="hidden" name="id" id ="id" value="'.$id.'">
		  <p>Conclusión Envidada : '.$listatemporales[$i]['conclucionfinal'].'</p>
		  <div class="form-group row">
    <label for="conclu" class="col-4 col-form-label">La Conclusión es Correcta?</label> 
    <div class="col-8">
      <select id="conclu" name="conclu" class="custom-select" required="required">
	  <option value="NO">No</option>
	  <option value="SI">Si</option>
	  
      </select>
    </div>
  </div> 
		  <div class="form-group row">
  <label for="efecto" class="col-4 col-form-label">Decisión Final Empresa Usuaria</label> 
  <div class="col-8">
	<textarea id="efecto" name="efecto" cols="40" rows="5" required="required" class="form-control"></textarea>
  </div>
</div> 



<div class="form-group row">
  <label for="fechainimedida" class="col-4 col-form-label">Fecha Inicio Sanción</label> 
  <div class="col-8">
	<input id="fechainimedida" name="fechainimedida" type="date" class="form-control" value="'.$listatemporales[$i]['fechainimedida'].'">
  </div>
</div>
<div class="form-group row" style="display:none">
  <label for="fechafinmedida" class="col-4 col-form-label">Fecha Final Medida</label> 
  <div class="col-8">
	<input id="fechafinmedida" name="fechafinmedida" type="date" class="form-control" value ="'.$listatemporales[$i]['fechafinmedida'].'">
  </div>
</div> 
<bt><br><br>
<div class="form-group row">
  <div class="offset-4 col-8">
	<button name="submit" type="submit" class="btn btn-primary">Enviar Conclusión</button>
  </div>
</div>
		  </form>
	
			
		  </div>
		  
		</div>
	  </div>
	</div>
	';
		$botonhojaaa ='<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalhv'.$id.'">
	  	Validar Conclusión
	</button>';	
		
	    $estadolb = '<a class="btn btn-primary" href = "home.php?ctr=proceso&acc=formu&id='.$id.'">Editar</a>';
		if($estado == "C" && $archivos!=""){
			$conclucions="Sin Especificar";
		    $conclucionsfinal="Sin Especificar";
			$estadolb .= ' || <a class="btn btn-primary" href = "home.php?ctr=proceso&acc=notificar&id='.$id.'">Notificar</a><br>';
		}
		if ($archivos==""){
			$archivos="Sin Adjuntos";
			$conclucions="En Proceson";
		    $conclucionsfinal="En Proceso";
		}

		if($estado =="N"){
			$estadolb ="En Proceso ";
			$conclucions="En Proceso";
		    $conclucionsfinal="En Proceso";
		}

		if($estado =="E"){
			$estadolb ="Citado";
			$conclucions="En Proceso";
		    $conclucionsfinal="En Proceso";
		}

		if($estado =="T"){
			$estadolb = $modalbotonhojaaa.$botonhojaaa;

		}
		if($estado =="TT"){
			$estadolb = "En Notificación";

		}

		if($estado =="TN"){
			$estadolb = "Proceso Finalizado";

		}

		if($estado =="NA"){
			//$estadolb = "Proceso Finalizado";
			$estadolb='<div class="modal fade" id="exampleModalaclaracion'.$id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Ampliación de Detalles</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
		  <form class="form-horizontal" action="home.php?ctr=proceso&acc=guardarinformacionextrasoli" method="post" enctype="multipart/form-data">
		  <input type ="hidden" name="id" id ="id" value="'.$id.'">
		  <div class="form-group row">
  <label for="efecto" class="col-4 col-form-label">Efecto Disciplinario</label> 
  <div class="col-8">
	<textarea id="efecto" name="efecto" cols="40" rows="5" required="required" class="form-control">'.$listatemporales[$i]['descripcion'].'</textarea>
  </div>
</div> 
<bt><br><br>
<div class="form-group row">
  <div class="offset-4 col-8">
	<button name="submit" type="submit" class="btn btn-primary">Enviar</button>
  </div>
</div>
		  </form>
	
			
		  </div>
		  
		</div>
	  </div>
	</div>
	';
		$estadolb.='<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalaclaracion'.$id.'">
	  	Ampliar Aclaración
	</button>';	

		}
		
		

		




		$correo=$listatemporales[$i]['correo'];
		$filefi = "";
		if($estado =="T" || $archivofinals!=""){
			$filefi= "<br><br><a href='archivosgenerales/".$archivofinals."' target='_black' class='btn btn-primary'>Decisión Preliminar</a>";

		}

		$archivofinalc = "";
		if($archivofinald!=""){
			$archivofinalc .= "<br><a href ='archivosgenerales/".$archivofinald."' target='_black' class='btn btn-primary'>Archivo Definicion</a><br>";
		}

		echo  '<td>'.$val.'</td>
		<td>'.$nombrefuncionario.'</td>
		<td>'.$listatemporales[$i]['correoempleado'].'</td>
		<td>'.$cargo.'</td>
		<td>'.$cedula.'</td>
		<td>'.$listatemporales[$i]['lugartrabajo'].'</td>
		<td>'.$listatemporales[$i]['testigo'].'</td>
		<td>'.$listatemporales[$i]['cargotestigo'].'</td>
		<td>'.$listatemporales[$i]['telefonotestigo'].'</td>
		<td>'.$listatemporales[$i]['correotestigo'].'</td>
		<td>'.$listatemporales[$i]['jefeinmediato'].'</td>
		<td>'.$listatemporales[$i]['coreojefe'].'</td>
		<td>'.$listatemporales[$i]['telefonojefei'].'</td>
		<td>'.$listatemporales[$i]['fechaevento'].'</td>
		<td>'.$listatemporales[$i]['centrocostos'].'</td>
		<td>'.$listatemporales[$i]['descripcion'].'</td>
		<td>'.$fechagrab.'</td>
		<td>'.$archivos.'</td>
		<td>'.$conclucions.'</td>
		<td>'.$conclucionsfinal.$filefi.'</td>
		<td>'.$listatemporales[$i]['concluaprobadaf'].'<br>'.$archivofinalc.'</td>
		<td>'.$listatemporales[$i]['tipificacion'].'</td>
		<td>'.$estadolb.'</td></tr>';
	}
	?>
    </tbody>
</table>
