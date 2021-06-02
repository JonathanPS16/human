<div id="generaldivincapacidades">
<h5>Incapacidades Cargadas</h5><br>
<table class="table table-striped table-bordered dataTable no-footer" id="myTable" role="grid" aria-describedby="myTable_info">
	<thead>
	<tr>
	<th>ID</th>
	<th>Empresa</th>
			<th>Documento</th>
			<th>Nombre Persona</th>
			<th>Fecha Inicial ADCI</th>
			<th>Fecha Final ADCI</th>
			<th>Dias ADCI</th>
			<th>Centro Costos</th>
			<th>Observaciones</th>
			<th>Responsable</th>
			<th>Fecha Inicial</th>
			<th>Fecha Final</th>
			<th>Numero de Dias</th>
			<th>Codigo Concepto</th>
			<th>No de la Incapacidad</th>
			<th>Archivo Incapacidad</th>
			<th>Archivo Transcripcion</th>
			<th>Valor Liquidacion</th>
			<th>Estado Proceso</th>
			<th>Estado Incapacidad</th>
			<th>Duplicado</th>
			<th>Observacion General</th>
			<th>Accion</th>
	</tr>
	</thead>
	<tbody>
	<?php 
	
	$val = 0;
	for($i=0; $i<count($listatemporales);$i++){

		$val ++;
		$conteoreq = 0;
		$id=$listatemporales[$i]['id_registro'];
		$empresa=$listatemporales[$i]['nombretemporal'];
		$fechainigenere=$listatemporales[$i]['fechaini'];
		$fechafinalgenere=$listatemporales[$i]['fechafinal'];
		$diasad=$listatemporales[$i]['cantidaddias'];
		$empresausuaria=$listatemporales[$i]['empresausuaria'];
		$cedula=$listatemporales[$i]['cedula'];
		$nombreper=$listatemporales[$i]['nombreper'];
		$observaciones=$listatemporales[$i]['observaciones'];
		$codigoconcepto=$listatemporales[$i]['codigoconcepto'];
		$valorliqui=$listatemporales[$i]['valorliqui'];
		$estado=$listatemporales[$i]['estado'];
		$fechaincio=$listatemporales[$i]['fechaincio'];
		$fechafinaltra=$listatemporales[$i]['fechafinaltra'];
		$nodias=$listatemporales[$i]['nodias'];
		$noincapacidad=$listatemporales[$i]['noincapacidad'];
		$estadoeps=ucwords($listatemporales[$i]['estadoeps']);
		$duplicado=$listatemporales[$i]['duplicado'];
		$otrasobserva=$listatemporales[$i]['descgeneral'];

		if($estadoeps==""){
			$estadoeps="Sin Estado";
		}

		$archivoinca=$listatemporales[$i]['archivouno'];
		$archivotrans=$listatemporales[$i]['archivodos'];

		if($archivoinca==""){

			$archivoinca ="No Cargado";
		} else {
			
			$archivoinca ='<a href="archivosgenerales/'.$archivoinca.'" target="_black" class="btn btn-primary">Descargar</a>';
		}
		
		if($archivotrans==""){
			$archivotrans ="No Cargado";
		} else {
			$archivotrans ='<a href="archivosgenerales/'.$archivotrans.'" target="_black" class="btn btn-primary">Descargar</a>';
		}
		
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
	<option value="0">Seleccione</option>
	<option value="liquidada">Liquidada</option>
	<option value="negada">Negada</option>
	<option value="pagada">Pagada</option>
  </select>
    </div>
  </div>
  <div class="form-group row" id="fechadiv">
    <label for="fecha" class="col-4 col-form-label">Fecha</label> 
    <div class="col-8">
      <input id="fecha" name="fecha" type="date" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="fechapagoeps" class="col-4 col-form-label">Fecha Pago EPS</label> 
    <div class="col-8">
      <input id="fechapagoeps" name="fechapagoeps" type="date" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="valorreco" class="col-4 col-form-label">Valor Reconocido</label> 
    <div class="col-8">
      <input id="valorreco" name="valorreco" placeholder="Valor Reconocido" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row" id="observacionesdiv">
    <label for="observaciones" class="col-4 col-form-label">Observaciones</label> 
    <div class="col-8">
      <textarea id="observaciones" name="observaciones" cols="40" rows="5" class="form-control" ></textarea>
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
		$boton ='<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalhv'.$id.'" id="limpiaform">Decision EPS/ARL</button>';

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
		  <label for="noreciboadci" class="col-4 col-form-label">Recibo Caja ADCI</label> 
		  <div class="col-8">
			<input id="noreciboadci" name="noreciboadci" placeholder="Recibo Caja ADCI" type="text" required="required" class="form-control">
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
		if($estadoeps =="Negada" && $estado!="C")
		{
			$modal = "";
			$boton = '<a href="home.php?ctr=incapacidad&acc=reabrirnegada&id='.$id.'" class="btn btn-primary" >Volver a Abrir</a>';
		}
		if($duplicado =="No"  || $duplicado =="NO"){
			$duplicado = '<a href="home.php?ctr=incapacidad&acc=marcarduplicado&id='.$id.'">Marcar Como Duplicado</a>';
		}
		
		$reabre = "";
		if($estadolblmu=="Transcrita"){
			$reabre = '<br><br><a href="home.php?ctr=incapacidad&acc=reabrirnegada&id='.$id.'" style="color: #0069d9;">Volver a Abrir</a>';
		}


		$modaleditnota ='<div class="modal fade" id="exampleModalnotaseg'.$id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Editar Nota General</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" action="home.php?ctr=incapacidad&acc=editarNotaGeneral" method="post" enctype="multipart/form-data">
			
		  <input id="id" name="id" type="hidden" value="'.$id.'">
		<div class="form-group row">
		  <label for="descgeneral" class="col-4 col-form-label">Observaciones Generales</label> 
		  <div class="col-8">
			<textarea id="descgeneral" name="descgeneral" cols="40" rows="5" class="form-control" required="required"></textarea>
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
		$btnEditNota  ='<br><br><a  data-toggle="modal" data-target="#exampleModalnotaseg'.$id.'" style="color: #0069d9;">Editar Nota</a>';

		/*echo  '<tr><td>'.$val.'</td>
		<td>'.$cedula.'</td>
  <td>'.$nombreper.'</td>
  <td>'.$observaciones.'</td>
  <td>'.$responsable.'</td>
  <td>'.$fechaincio.'</td>
  <td>'.$fechafinaltra.'</td>
  <td>'.$nodias.'</td>
  <td>'.$codigoconcepto.'</td>
  <td>'.$noincapacidad.'</td>
  <td>'.$archivoinca.'</td>
  <td>'.$archivotrans.'</td>
  <td>$ '.$valorliqui.'</td>
  <td>'.$estadolblmu.'</td>
  <td>'.$estadoeps.'</td>
  <td>'.$duplicado.'</td>
  <td>'.$modal.$boton.'</td></tr>';*/
?>
<tr>
	<th><?php echo $val ?></th>
	<td><?php echo $empresa;?></td>
			<td><?php echo $cedula;?></td>
			<td><?php echo $nombreper;?></td>
			<td><?php echo $fechainigenere;?></td>
			<td><?php echo $fechafinalgenere;?></td>
			<td><?php echo $diasad;?></td>
			<td><?php echo $empresausuaria;?></td>
			<td><?php echo $observaciones;?></td>
			<td><?php echo $responsable;?></td>
			<td><?php echo $fechaincio;?></td>
			<td><?php echo $fechafinaltra;?></td>
			<td><?php echo $nodias;?></td>
			<td><?php echo $codigoconcepto;?></td>
			<td><?php echo $noincapacidad;?></td>
			<td><?php echo $archivoinca;?></td>
			<td><?php echo $archivotrans;?></td>
			<td>$ <?php echo $valorliqui;?></td>
			<td><?php echo $estadolblmu;?></td>
			<td><?php echo $estadoeps;?></td>
			<td><?php echo $duplicado;?></td>
			<td><?php echo $otrasobserva.$modaleditnota.$btnEditNota;?></td>
			<td><?php echo $modal.$boton.$reabre;?></td>
	</tr>
<?php 
	} ?>
	
	</tbody>
</table>
</div>
<?php
/*


<table class="table table-striped" id="myTable">
	<thead>
		<tr>
			<th>ID</th>
			<th>Documento</th>
			<th>Nompre Persona</th>
			<th>Observaciones</th>
			<th>Responsable</th>
			<th>Fecha Inicial</th>
			<th>Fecha Final</th>
			<th>Numero de Dias</th>
			<th>Codigo Concepto</th>
			<th>No de la Incapacidad</th>
			<th>Archivo Incapacidad</th>
			<th>Archivo Transcripcion</th>
			<th>Valor Liquidacion</th>
			<th>Estado Proceso</th>
			<th>Estado Incapacidad</th>
			<th>Duplicado</th>
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
		$codigoconcepto=$listatemporales[$i]['codigoconcepto'];
		$valorliqui=$listatemporales[$i]['valorliqui'];
		$estado=$listatemporales[$i]['estado'];
		$fechaincio=$listatemporales[$i]['fechaincio'];
		$fechafinaltra=$listatemporales[$i]['fechafinaltra'];
		$nodias=$listatemporales[$i]['nodias'];
		$noincapacidad=$listatemporales[$i]['noincapacidad'];
		$estadoeps=ucwords($listatemporales[$i]['estadoeps']);
		$duplicado=$listatemporales[$i]['duplicado'];

		if($estadoeps==""){
			$estadoeps="Sin Estado";
		}

		$archivoinca=$listatemporales[$i]['archivouno'];
		$archivotrans=$listatemporales[$i]['archivodos'];

		if($archivoinca==""){

			$archivoinca ="No Cargado";
		} else {
			
			$archivoinca ='<a href="archivosgenerales/'.$archivoinca.'" target="_black" class="btn btn-primary">Descargar</a>';
		}
		
		if($archivotrans==""){
			$archivotrans ="No Cargado";
		} else {
			$archivotrans ='<a href="archivosgenerales/'.$archivotrans.'" target="_black" class="btn btn-primary">Descargar</a>';
		}
		
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
	<option value="0">Seleccione</option>
	<option value="liquidada">Liquidada</option>
	<option value="negada">Negada</option>
	<option value="pagada">Pagada</option>
  </select>
    </div>
  </div>
  <div class="form-group row" id="fechadiv">
    <label for="fecha" class="col-4 col-form-label">Fecha</label> 
    <div class="col-8">
      <input id="fecha" name="fecha" type="date" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="fechapagoeps" class="col-4 col-form-label">Fecha Pago EPS</label> 
    <div class="col-8">
      <input id="fechapagoeps" name="fechapagoeps" type="date" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="valorreco" class="col-4 col-form-label">Valor Reconocido</label> 
    <div class="col-8">
      <input id="valorreco" name="valorreco" placeholder="Valor Reconocido" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row" id="observacionesdiv">
    <label for="observaciones" class="col-4 col-form-label">Observaciones</label> 
    <div class="col-8">
      <textarea id="observaciones" name="observaciones" cols="40" rows="5" class="form-control" ></textarea>
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
		$boton ='<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalhv'.$id.'" id="limpiaform">Decision EPS/ARL</button>';

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
		  <label for="noreciboadci" class="col-4 col-form-label">Recibo Caja ADCI</label> 
		  <div class="col-8">
			<input id="noreciboadci" name="noreciboadci" placeholder="Recibo Caja ADCI" type="text" required="required" class="form-control">
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
		if($estadoeps =="Negada")
		{
			$modal = "";
			$boton = '<a href="home.php?ctr=incapacidad&acc=reabrirnegada&id='.$id.'" class="btn btn-primary" >Volver a Abrir</a>';
		}
		if($duplicado =="No"  || $duplicado =="NO"){
			$duplicado = '<a href="home.php?ctr=incapacidad&acc=marcarduplicado&id='.$id.'">Marcar Como Duplicado</a>';
		}
		echo  '<tr><td>'.$val.'</td>
		<td>'.$cedula.'</td>
  <td>'.$nombreper.'</td>
  <td>'.$observaciones.'</td>
  <td>'.$responsable.'</td>
  <td>'.$fechaincio.'</td>
  <td>'.$fechafinaltra.'</td>
  <td>'.$nodias.'</td>
  <td>'.$codigoconcepto.'</td>
  <td>'.$noincapacidad.'</td>
  <td>'.$archivoinca.'</td>
  <td>'.$archivotrans.'</td>
  <td>$ '.$valorliqui.'</td>
  <td>'.$estadolblmu.'</td>
  <td>'.$estadoeps.'</td>
  <td>'.$duplicado.'</td>
  <td>'.$modal.$boton.'</td></tr>';
	}

	?>
    </tbody>
</table>
</div>