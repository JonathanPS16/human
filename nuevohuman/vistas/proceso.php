<a  class="btn btn-primary" href="home.php?ctr=proceso&acc=formu&id=0">Nuevo Proceso</a>
<br><br><table class="table table-striped" id="tablagrid">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nombre de Funcionario</th>
      <th>Cargo</th>
      <th>Cedula</th>
	  <th>Archivos Prueba</th>
	  <th>Conclusion Entrevista</th>
	  <th>Conclusion Final</th>
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
		$conclucions=$listatemporales[$i]['conclucionentre'];
		$conclucionsfinal=$listatemporales[$i]['conclucionfinal'];
		$archivofinals=$listatemporales[$i]['archivofinal'];
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
		
	    $estadolb = '<a class="btn btn-primary" href = "home.php?ctr=proceso&acc=formu&id='.$id.'">Editar</a>';
		if($estado == "C" && $archivos!=""){
			$conclucions="Sin Especificar";
		    $conclucionsfinal="Sin Especificar";
			$estadolb .= ' || <a class="btn btn-primary" href = "home.php?ctr=proceso&acc=notificar&id='.$id.'">Notificar</a><br>';
		}
		if ($archivos==""){
			$archivos="Sin Adjuntos";
			$conclucions="En  Validacion";
		    $conclucionsfinal="En  Validacion";
		}

		if($estado =="N"){
			$estadolb ="En Validacion";
			$conclucions="En  Validacion";
		    $conclucionsfinal="En  Validacion";
		}

		if($estado =="E"){
			$estadolb ="Citado";
			$conclucions="En  Validacion";
		    $conclucionsfinal="En  Validacion";
		}

		if($estado =="T"){
			$estadolb = "<br><a href='archivosgenerales/".$archivofinals."' target='_black'>Documento Firmado</a>";

		}




		$correo=$listatemporales[$i]['correo'];
		echo  '<tr><td>'.$val.'</td>
		<td>'.$nombrefuncionario.'</td>
  <td>'.$cargo.'</td>
  <td>'.$cedula.'</td>
  <td>'.$archivos.'</td>
  <td>'.$conclucions.'</td>
  <td>'.$conclucionsfinal.'</td>
  <td>'.$estadolb.'</td></tr>';
	}
	?>
    </tbody>
</table>
