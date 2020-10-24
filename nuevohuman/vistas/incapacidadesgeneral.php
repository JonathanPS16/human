<h5>Incapacidades Cargadas</h5><br>
<table class="table table-striped" id="tablagrid">
	<thead>
		<tr>
			<th>ID</th>
			<th>Documento</th>
			<th>Nompre Persona</th>
			<th>Observaciones</th>
			<th>Responsable</th>
			<th>Valor Liquidacion</th>
			<th>Estado</th>
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
		$id=$listatemporales[$i]['id_registro'];
		$cedula=$listatemporales[$i]['cedula'];
		$nombreper=$listatemporales[$i]['nombreper'];
		$observaciones=$listatemporales[$i]['observaciones'];
		$valorliqui=$listatemporales[$i]['valorliqui'];
		$estado=$listatemporales[$i]['estado'];
		$codigoconcepto=$listatemporales[$i]['codigoconcepto'];
		$responsable=$listatemporales[$i]['responsable'];
		if(trim($codigoconcepto) == "1046" || trim($codigoconcepto) == "1046"){
			$responsable ="ARL";
		}

		
		if($archivofurat!=""){
			$archivos .= "<a href ='archivosgenerales/".$archivofurat."' target='_black'>Archivo</a><br>";
		}
		$reco = "";
		if($fechainimedicas!="" && $fechafinmedicas !=""){
			$recomendacionesmedicas.="<br>Desde ".$fechainimedicas." Hasta ".$fechafinmedicas;
		}
		$estadolblmu ="";
		$modal ="";
		$boton ="";

		if($estado == "C") {
			$estadolblmu="Cargado";
			$modal ='<div class="modal fade" id="exampleModalhv'.$id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">TRANSCRIPCION</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" action="home.php?ctr=incapacidad&acc=guardartranscrip" method="post" enctype="multipart/form-data">
			
		  <input id="id" name="id" type="hidden" value="'.$id.'">
		  <div class="form-group row">
		  <label for="noincapacidad" class="col-4 col-form-label">No Incapacidad</label> 
		  <div class="col-8">
			<input id="noincapacidad" name="noincapacidad" placeholder="#incapacidad" type="text" class="form-control" required="required">
		  </div>
		</div>
		<div class="form-group row">
		  <label for="fechaincio" class="col-4 col-form-label">Fecha Inicio</label> 
		  <div class="col-8">
			<input id="fechaincio" name="fechaincio" type="date" class="form-control" required="required">
		  </div>
		</div>
		<div class="form-group row">
		  <label for="diagnostico" class="col-4 col-form-label">Diagnostico</label> 
		  <div class="col-8">
			<textarea id="diagnostico" name="diagnostico" cols="40" rows="5" class="form-control" required="required"></textarea>
		  </div>
		</div>
		<div class="form-group row">
		  <label for="fechatrans" class="col-4 col-form-label">Fecha Transcripcion</label> 
		  <div class="col-8">
			<input id="fechatrans" name="fechatrans" type="date" required="required" class="form-control" required="required">
		  </div>
		</div>
		<div class="form-group row">
		  <label for="fechafinal" class="col-4 col-form-label">Fecha Final</label> 
		  <div class="col-8">
			<input id="fechafinal" name="fechafinal" type="date" class="form-control" required="required">
		  </div>
		</div>
		<div class="form-group row">
		  <label for="nodias" class="col-4 col-form-label">No Dias</label> 
		  <div class="col-8">
			<input id="nodias" name="nodias" placeholder="# Dias" type="text" class="form-control" required="required">
		  </div>
		</div>
		<div class="form-group row">
		  <label for="notranscip" class="col-4 col-form-label">No Transcripcion</label> 
		  <div class="col-8">
			<input id="notranscip" name="notranscip" placeholder="# Transcripcion" type="text" class="form-control" required="required">
		  </div>
		</div>
		<div class="form-group row">
		  <label for="prorroga" class="col-4 col-form-label">Prorroga</label> 
		  <div class="col-8">
			<input id="prorroga" name="prorroga" placeholder="Prorroga" type="text" class="form-control" required="required">
		  </div>
		</div>
		<div class="form-group row">
		  <label for="diasacum" class="col-4 col-form-label">Dias Acumulados</label> 
		  <div class="col-8">
			<input id="diasacum" name="diasacum" placeholder="Dias Acumulados" type="text" class="form-control" required="required">
		  </div>
		</div>
		<div class="form-group row">
		  <label for="archivoincapacidad" class="col-4 col-form-label">Archivo Incapacidad</label> 
		  <div class="col-8">
			<input id="archivoincapacidad" name="archivoincapacidad" type="file" class="form-control" required="required">
		  </div>
		</div>
		<div class="form-group row">
		  <label for="archivotranscri" class="col-4 col-form-label">Archivo Transcripcion</label> 
		  <div class="col-8">
			<input id="archivotranscri" name="archivotranscri" type="file" class="form-control" required="required">
		  </div>
		</div> 
		<div class="form-group row">
		  <div class="offset-4 col-8">
			<button name="submit" type="submit" class="btn btn-primary">Guardar Transcripcion</button>
		  </div>
		</div>
			</form>
	
			
		  </div>
		  
		</div>
	  </div>
	</div>
	';
		$boton ='<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalhv'.$id.'">Transcribir</button>';

		}

		if($estado == "T") {
			$estadolblmu="Transcrita";
			$modal ='<div class="modal fade" id="exampleModalhv'.$id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Proceso Decision EPS/ARL</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" action="home.php?ctr=incapacidad&acc=guardarproceeps" method="post" enctype="multipart/form-data">
			
		  <input id="id" name="id" type="hidden" value="'.$id.'">
		  <div class="form-group row">
    <label for="estado" class="col-4 col-form-label">Estado</label> 
    <div class="col-8">
	<select id="estado" name="estado" class="custom-select" required="required">
	<option value="">Seleccione</option>
	<option value="liquidada">Liquidada</option>
	<option value="negada">Negada</option>
	<option value="pagada">Pagada</option>
  </select>
    </div>
  </div>
  <div class="form-group row" id="fechadiv">
    <label for="fecha" class="col-4 col-form-label">Fecha</label> 
    <div class="col-8">
      <input id="fecha" name="fecha" type="date" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="fechapagoeps" class="col-4 col-form-label">Fecha Pago EPS</label> 
    <div class="col-8">
      <input id="fechapagoeps" name="fechapagoeps" type="date" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="valorreco" class="col-4 col-form-label">Valor Reconocido</label> 
    <div class="col-8">
      <input id="valorreco" name="valorreco" placeholder="Valor Reconocido" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row" id="observacionesdiv">
    <label for="observaciones" class="col-4 col-form-label">Observaciones</label> 
    <div class="col-8">
      <textarea id="observaciones" name="observaciones" cols="40" rows="5" class="form-control" required="required"></textarea>
    </div>
  </div> 
  <div class="form-group row" id="guardado">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Guardar</button>
    </div>
  </div>
			</form>
	
			
		  </div>
		  
		</div>
	  </div>
	</div>
	';
		$boton ='<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalhv'.$id.'">Decision EPS/ARL</button>';

		}

		if($estado == "B") {
			$estadolblmu="Proceso Decision";
			$modal ='<div class="modal fade" id="exampleModalhv'.$id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Proceso Ingreso Banco</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" action="home.php?ctr=incapacidad&acc=guardarprocebanco" method="post" enctype="multipart/form-data">
			
		  <input id="id" name="id" type="hidden" value="'.$id.'">
		  <div class="form-group row">
		  <label for="fechabanco" class="col-4 col-form-label">Fecha Ingreso Banco</label> 
		  <div class="col-8">
			<input id="fechabanco" name="fechabanco" placeholder="Fecha Ingreso Banco" type="date" required="required" class="form-control">
		  </div>
		</div>
		<div class="form-group row">
		  <label for="valoringresobanco" class="col-4 col-form-label">Valor Ingreso Banco</label> 
		  <div class="col-8">
			<input id="valoringresobanco" name="valoringresobanco" placeholder="Valor Ingreso Banco" type="text" required="required" class="form-control">
		  </div>
		</div>
		<div class="form-group row">
		  <label for="noreciboadci" class="col-4 col-form-label">No Recibo Pago  ADCI</label> 
		  <div class="col-8">
			<input id="noreciboadci" name="noreciboadci" placeholder="No Recibo Pago  ADCI" type="text" required="required" class="form-control">
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
	';
		$boton ='<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalhv'.$id.'">Ingreso Banco</button>';

		}
		if($estado == "F") {
			$estadolblmu="Ingreso a Banco";
			$modal ='<div class="modal fade" id="exampleModalhv'.$id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Proceso Nota Credito - ADCI </h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" action="home.php?ctr=incapacidad&acc=guardarcreit" method="post" enctype="multipart/form-data">
			
		  <input id="id" name="id" type="hidden" value="'.$id.'">
		  <div class="form-group row">
		  <label for="notacredito" class="col-4 col-form-label">No Nota Credito</label> 
		  <div class="col-8">
			<input id="notacredito" name="notacredito" placeholder="No Nota Credito" type="text" required="required" class="form-control">
		  </div>
		</div>
		<div class="form-group row">
		  <label for="fechanotadci" class="col-4 col-form-label">Fecha Nota Credto ADCI</label> 
		  <div class="col-8">
			<input id="fechanotadci" name="fechanotadci" placeholder="Fecha Nota Credto ADCI" type="text" required="required" class="form-control">
		  </div>
		</div>
		<div class="form-group row">
		  <label for="valornotaadci" class="col-4 col-form-label">Valor Nota Credito ADCI</label> 
		  <div class="col-8">
			<input id="valornotaadci" name="valornotaadci" placeholder="Valor Nota Credito ADCI" type="text" required="required" class="form-control">
		  </div>
		</div>
		<div class="form-group row">
		  <label for="imagen" class="col-4 col-form-label">Imagen</label> 
		  <div class="col-8">
			<input id="imagen" name="imagen" placeholder="Imagen" type="text" class="form-control">
		  </div>
		</div>
		<div class="form-group row">
		  <label for="otrasobserva" class="col-4 col-form-label">Otras Observaciones</label> 
		  <div class="col-8">
			<textarea id="otrasobserva" name="otrasobserva" cols="40" rows="5" class="form-control" required="required"></textarea>
		  </div>
		</div>
		<div class="form-group row">
		  <label for="digivsfisi" class="col-4 col-form-label">Digital Vrs Fisico</label> 
		  <div class="col-8">
			<input id="digivsfisi" name="digivsfisi" placeholder="Digital Vrs Fisico " type="text" required="required" class="form-control">
		  </div>
		</div> 
		<div class="form-group row">
		  <div class="offset-4 col-8">
			<button name="submit" type="submit" class="btn btn-primary">Guardar Nota</button>
		  </div>
		</div>
			</form>
	
			
		  </div>
		  
		</div>
	  </div>
	</div>
	';
		$boton ='<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalhv'.$id.'">Nota Credito</button>';

		}


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
		
	   /* $estadolb = '<a class="btn btn-primary" href = "home.php?ctr=accidentes&acc=formu&id='.$id.'">Editar</a>';
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

		$correo=$listatemporales[$i]['correo'];*/
		echo  '<tr><td>'.$val.'</td>
		<td>'.$cedula.'</td>
  <td>'.$nombreper.'</td>
  <td>'.$observaciones.'</td>
  <td>'.$responsable.'</td>
  <td>$ '.$valorliqui.'</td>
  <td>'.$estadolblmu.'</td>
  <td>'.$modal.$boton.'</td></tr>';
	}
	?>
    </tbody>
</table>
<script>
 $( "#observacionesdiv" ).hide();
 $( "#fechadiv" ).hide();
 $( "#guardado" ).hide();
 
 
$( "#estado" ).change(function() {
	$( "#observacionesdiv" ).hide();
	$( "#fechadiv" ).hide();
	$( "#guardado" ).hide();
	var dato = $( "#estado" ).val();
	if(dato=="negada"){
		$( "#observacionesdiv" ).show();
		$( "#fechadiv" ).show();
		$( "#guardado" ).show();
	}
	if(dato=="liquidada"){
		$( "#fechadiv" ).show();
		$( "#guardado" ).show();
	}
	if(dato!=""){
		$( "#guardado" ).show();
	}
});
</script>