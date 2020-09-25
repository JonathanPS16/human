<h5>Resportes Accidentes</h5><br>
<table class="table table-striped" id="tablagrid">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nombre de Funcionario</th>
			<th>Cargo</th>
			<th>Fecha Accidente</th>
			<th>Fecha Grabacion</th>
			<th>Lugar Trabajo</th>
			<th>Archivo</th>
			<th>Recomendaciones</th>
			<th>Recomendaciones Medicas</th>
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
		$id=$listatemporales[$i]['id_accidente'];
		$lugartrabajo=$listatemporales[$i]['lugartrabajo'];
		$estado=$listatemporales[$i]['estado'];
		$archivofurat=$listatemporales[$i]['archivofurat'];
		$fechaaccidente=$listatemporales[$i]['fechaaccidente'];
		$fechagrab=$listatemporales[$i]['fechagrab'];

		

		
		$diasincapacidad=$listatemporales[$i]['diasincapacidad'];
		$recomendacionesdoc=$listatemporales[$i]['recomendaciones'];
		$recomendacionesmedicas =$listatemporales[$i]['recomendacionesmedicas'];
		
		$fecharecom=$listatemporales[$i]['fecharecom'];
		$inicioinca=$listatemporales[$i]['fechainicioreco'];
		$fechainimedicas=$listatemporales[$i]['fechainimedicas'];
		$fechafinmedicas=$listatemporales[$i]['fechafinmedicas'];
		$archivos = "";
		if($archivofurat!=""){
			$archivos .= "<a href ='archivosgenerales/".$archivofurat."' target='_black'>Archivo</a><br>";
		}
		$reco = "";
		if($fechainimedicas!="" && $fechafinmedicas !=""){
			$recomendacionesmedicas.="<br>Desde ".$fechainimedicas." Hasta ".$fechafinmedicas;
		}
		
		$estadolb = "";
		  /*
		$modalbotonhoja ='<div class="modal fade" id="exampleModalhv'.$id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">CARGA HOJA DE VIDA</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" action="home.php?ctr=requisicion&acc=guardarhv" method="post" enctype="multipart/form-data">
			<fieldset>
			<!-- File Button --> 
			<div class="form-group">
			  <label class="col-md-4 control-label" for="filebutton"></label>
			  <div class="col-md-4">
		  <input id="id" name="id" type="hidden" value="'.$id.'">
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
		$botonhoja ='<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalhv'.$id.'">
	  Adjuntar Hoja de Vida
	</button>';	*/
		
	    $estadolb = '<a class="btn btn-primary" href = "home.php?ctr=accidentes&acc=formu&id='.$id.'">Editar</a>';
		if($estado == "C"){
			$recomendaciones="Sin Recomendaciones"; 
			$reco = "En Proceso";
			$estadolb .= ' || <a class="btn btn-primary" href = "home.php?ctr=accidentes&acc=notificar&id='.$id.'">Notificar</a><br>';
			$recomendacionesmedicas= "En Proceso";
		}
		if ($archivos==""){
			$archivos="Sin Adjuntos";
			$conclucions="En Proceso";
			$conclucionsfinal="En Proceso";
			$reco = "En Proceso";
			$recomendacionesmedicas= "En Proceso";
		}

		if($estado =="N"){
			$estadolb ="En Proceso";
			$conclucions="En Proceso";
			$conclucionsfinal="En Proceso";
			$reco = "En Proceso";
			$recomendacionesmedicas= "En Proceso";
		}

		if($estado =="E"){
			$estadolb ="En Proceso";
			$conclucions="En Proceso";
			$conclucionsfinal="En Proceso";
			$reco = "En Proceso";
			$recomendacionesmedicas= "En Proceso";
		}

		if($estado =="T"){
			$reco = "Se otorga <strong>({$diasincapacidad}) </strong>dias de incapacidad<br>Se recomienda: {$recomendacionesdoc}<br>Desde $inicioinca Hasta {$fecharecom}";
			$estadolb ="Finalizado";
	
		}

		$correo=$listatemporales[$i]['correo'];
		echo  '<tr><td>'.$val.'</td>
		<td>'.$nombrefuncionario.'</td>
  <td>'.$cargo.'</td>
  <td>'.$fechaaccidente.'</td>
  <td>'.$fechagrab.'</td>
  <td>'.$lugartrabajo.'</td>
  <td>'.$archivos.'</td>
  <td>'.$reco.'</td>
  <td>'.$recomendacionesmedicas.'</td>
  <td>'.$estadolb.'</td></tr>';
	}
	?>
    </tbody>
</table>
