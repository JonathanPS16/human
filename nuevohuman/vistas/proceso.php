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
			<th>Jefe Inmediato</th>
			<th>Correo Jefe Inmediato</th>
			<th>Fecha Evento</th>
			<th>Centro Costos</th>
			<th>Descripcion Suceso</td>
			<th>Fecha Grabacion</th>
			<th>Archivos Prueba</th>
			<th>Conclusion Entrevista</th>
			<th>Conclusion Final</th>
			<th>Mi Conclusion</th>
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

		if($estado =="T"){
			$archivos .= "<br><a href='archivosgenerales/".$archivofinals."' target='_black' class='btn btn-primary'>Documento Firmado</a>";

		}

		
		$estadolb = "";
		  
		$modalbotonhojaaa ='<div class="modal fade" id="exampleModalhv'.$id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Validacion Conclusion</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
		  <form class="form-horizontal" action="home.php?ctr=proceso&acc=guardarconclusionfinalvalidada" method="post" enctype="multipart/form-data">
		  <input type ="hidden" name="id" id ="id" value="'.$id.'">
		  <p>Conclusion Envidada : '.$listatemporales[$i]['conclucionfinal']."<br>Fecha Inicio Medida: ".$listatemporales[$i]['fechainimedida']."<br>Fecha Fin Medida: ".$listatemporales[$i]['fechafinmedida'].'</p>
		  <div class="form-group row">
    <label for="conclu" class="col-4 col-form-label">La Conclusion es Correcta?</label> 
    <div class="col-8">
      <select id="conclu" name="conclu" class="custom-select" required="required">
	  <option value="NO">No</option>
	  <option value="SI">Si</option>
	  
      </select>
    </div>
  </div> 
		  <div class="form-group row">
  <label for="efecto" class="col-4 col-form-label">Efecto Diciplinario</label> 
  <div class="col-8">
	<textarea id="efecto" name="efecto" cols="40" rows="5" required="required" class="form-control">'.$listatemporales[$i]['conclucionfinal'].'</textarea>
  </div>
</div> 



<div class="form-group row">
  <label for="fechainimedida" class="col-4 col-form-label">Fecha Inicio Medida</label> 
  <div class="col-8">
	<input id="fechainimedida" name="fechainimedida" type="date" class="form-control" value="'.$listatemporales[$i]['fechainimedida'].'">
  </div>
</div>
<div class="form-group row">
  <label for="fechafinmedida" class="col-4 col-form-label">Fecha Final Medida</label> 
  <div class="col-8">
	<input id="fechafinmedida" name="fechafinmedida" type="date" class="form-control" value ="'.$listatemporales[$i]['fechafinmedida'].'">
  </div>
</div> 
<bt><br><br>
<div class="form-group row">
  <div class="offset-4 col-8">
	<button name="submit" type="submit" class="btn btn-primary">Enviar Conclusion</button>
  </div>
</div>
		  </form>
	
			
		  </div>
		  
		</div>
	  </div>
	</div>
	';
		$botonhojaaa ='<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalhv'.$id.'">
	  	Validar Conclusion
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
		
		

		




		$correo=$listatemporales[$i]['correo'];
		echo  '<td>'.$val.'</td>
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
		<td>'.$fechagrab.'</td>
		<td>'.$archivos.'</td>
		<td>'.$conclucions.'</td>
		<td>'.$conclucionsfinal.'</td>
		<td>'.$listatemporales[$i]['concluaprobadaf'].'</td>
		<td>'.$estadolb.'</td></tr>';
	}
	?>
    </tbody>
</table>
