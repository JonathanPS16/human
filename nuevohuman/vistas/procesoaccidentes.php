<a  class="btn btn-primary" href="home.php?ctr=accidentes&acc=formu&id=0">Nuevo Accidente</a>
<br><br><table class="table table-striped" id="tablagrid">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nombre de Funcionario</th>
			<th>Cargo</th>
			<th>Lugar Trabajo</th>
			<th>Archivo</th>
			<th>Recomendaciones</th>
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
		$diasincapacidad=$listatemporales[$i]['diasincapacidad'];
		$recomendacionesdoc=$listatemporales[$i]['recomendaciones'];
		$fecharecom=$listatemporales[$i]['fecharecom'];
		$archivos = "";
		if($archivofurat!=""){
			$archivos .= "<a href ='archivosgenerales/".$archivofurat."' target='_black'>Archivo</a><br>";
		}
		$reco = "";
		
		
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
			$reco = "En validacion";
			$estadolb .= ' || <a class="btn btn-primary" href = "home.php?ctr=accidentes&acc=notificar&id='.$id.'">Notificar</a><br>';
		}
		if ($archivos==""){
			$archivos="Sin Adjuntos";
			$conclucions="En  Validacion";
			$conclucionsfinal="En  Validacion";
			$reco = "En validacion";
		}

		if($estado =="N"){
			$estadolb ="En Validacion";
			$conclucions="En  Validacion";
			$conclucionsfinal="En  Validacion";
			$reco = "En validacion";
		}

		if($estado =="E"){
			$estadolb ="Citado";
			$conclucions="En  Validacion";
			$conclucionsfinal="En  Validacion";
			$reco = "En validacion";
		}

		if($estado =="T"){
			$reco = "Se otorga <strong>({$diasincapacidad}) </strong>dias de incapacidad<br>Se recomienda: {$recomendacionesdoc}<br>Hasta la Fecha: {$fecharecom}";
			$estadolb ="Finalizado";
	
		}

		$correo=$listatemporales[$i]['correo'];
		echo  '<tr><td>'.$val.'</td>
		<td>'.$nombrefuncionario.'</td>
  <td>'.$cargo.'</td>
  <td>'.$lugartrabajo.'</td>
  <td>'.$archivos.'</td>
  <td>'.$reco.'</td>
  <td>'.$estadolb.'</td></tr>';
	}
	?>
    </tbody>
</table>
