<h5>Consulta Incapacidades Cargadas</h5><br>
<table class="table table-striped table-bordered" id="myTable">
	<thead>
		<tr>
			<th>Empresa</th>
			<th>Nit</th>
			<th>Centro de Costos</th>
			<th>Incapacidad</th>
			<th>Fecha Inicial</th>
			<th>Fecha Final</th>
			<th>Cantidad Dias</th>
			<th>Cedula</th>
			<th>Nombre Persona</th>
			<th>Concepto</th>
			<th>Responsable</th>
			<th>Valor</th>
			<th>Estado</th>
			<th>Observaciones</th>
			<th>Fecha Registrada</th>
			<th>Valor Reconocido</th>
			<th>No Incapacidad</th>
			<th>Fecha Inicio</th>
			<th>Diagnostico</th>
			<th>Fecha Transcripcion</th>
			<th>Fecha Final</th>
			<th>No Dias</th>
			<th>No Transcripcion</th>
			<th>Prorroga</th>
			<th>Dias Acumulados</th>
			<th>Archivo Incapacidad</th>
			<th>Archivo Transcripcion</th>
			<th>Estado</th>
			<th>Fecha</th>
			<th>Fecha Pago EPS</th>
			<th>Valor Reconocido</th>
			<th>Observaciones EPS/ARL</th>
			<th>Fecha Ingreso Banco</th>
			<th>Valor Ingreso Banco</th>
			<th>Recibo Caja ADCI</th>
			<th>Nota Credito</th>
			<th>Fecha Nota ADCI</th>
			<th>Valor Nota ADCI</th>
			<th>Imagen</th>
			<th>Observaciones Nota Credito</th>
		</tr>
	</thead>
	<tbody>
 
	<?php 
	$val = 0;
	for($i=0; $i<count($listatemporales);$i++){

		$val ++;
		$conteoreq = 0;
		$empresa=$listatemporales[$i]['nombretemporal'];
		$nit=$listatemporales[$i]['nit'];
		$empresausuaria=$listatemporales[$i]['empresausuaria'];
		$observaciones=$listatemporales[$i]['observaciones'];
		$descripcodigo=$listatemporales[$i]['descripcodigo'];
		$fechaini=$listatemporales[$i]['fechaini'];
		$fechafinal=$listatemporales[$i]['fechafinal'];
		$cantidaddias=$listatemporales[$i]['cantidaddias'];
		$cedula=$listatemporales[$i]['cedula'];
		$nombreper=$listatemporales[$i]['nombreper'];
		$concepto=$listatemporales[$i]['codigoconcepto'];
		$estado=$listatemporales[$i]['estado'];
		$observacioneseps=$listatemporales[$i]['observacioneseps'];
		$valorreco=$listatemporales[$i]['valorreco'];
		$fechapagoeps=$listatemporales[$i]['fechapagoeps'];

		$excluye=$listatemporales[$i]['excluye'];
		$responsable = $listatemporales[$i]['responsable'];
		if($excluye=="S"){
			$responsable ="ARL";
		}
		$valorliqui = $listatemporales[$i]['valorliqui'];
		$observaciones = $listatemporales[$i]['observaciones'];
		$valorliqui = $listatemporales[$i]['valorliqui'];
		$estadolblmu="";
		if($estado == "C") {
			$estadolblmu="Cargado";
		}
		if($estado == "T") {
			$estadolblmu="Transcrita";
		}
		if($estado == "B") {
			$estadolblmu="Proceso Decision";
		}
		if($estado == "F") {
			$estadolblmu="Ingreso a Banco";
		}
		if($estado == "O") {
			$estadolblmu="Proceso Terminado";
		}

		if($valorreco=="" || !is_numeric($valorreco)){
			$valorreco="0";
		}

		echo  '<tr>
		<td>'.$empresa.'</td>
  <td>'.$nit.'</td>
  <td>'.$empresausuaria.'</td>
  <td>'.$observaciones.'</td>
  <td>'.$fechaini.'</td>
  <td>'.$fechafinal.'</td>
  <td>'.$cantidaddias.'</td>
  <td>'.$cedula.'</td>
  <td>'.$nombreper.'</td>
  <td>'.$concepto.'</td>
  <td>'.$responsable.'</td>
  <td>$'.number_format($valorliqui, 2, '.', ',').'</td>
  <td>'.$estadolblmu.'</td>
  <td>'.$observacioneseps.'</td>
  <td>'.$fechapagoeps.'</td>
  <td>$'.number_format($valorreco, 2, '.', ',').'</td>
  <td>'.$listatemporales[$i]['noincapacidad'].'</td>
	<td>'.$listatemporales[$i]['fechaincio'].'</td>
	<td>'.$listatemporales[$i]['diagnostico'].'</td>
	<td>'.$listatemporales[$i]['fechatrans'].'</td>
	<td>'.$listatemporales[$i]['fechafinaltra'].'</td>
	<td>'.$listatemporales[$i]['nodias'].'</td>
	<td>'.$listatemporales[$i]['notranscip'].'</td>
	<td>'.$listatemporales[$i]['prorroga'].'</td>
	<td>'.$listatemporales[$i]['diasacum'].'</td>';
	if(file_exists("archivosgenerales/".$listatemporales[$i]['archivouno'])) {
		echo '<td><a href="archivosgenerales/'.$listatemporales[$i]['archivouno'].'" target="_black" class="btn btn-primary">Descargar</a></td>';
	} else {
		echo '<td></td>';
	}
	if(file_exists("archivosgenerales/".$listatemporales[$i]['archivodos'])) {
		echo '<td><a href="archivosgenerales/'.$listatemporales[$i]['archivodos'].'" target="_black" class="btn btn-primary">Descargar</a></td>';
	} else {
		echo '<td></td>';
	}
echo '
	<td>'.$listatemporales[$i]['estadoeps'].'</td>
	<td>'.$listatemporales[$i]['fechaeps'].'</td>
	<td>'.$listatemporales[$i]['fechapagoeps'].'</td>
	<td>'.$listatemporales[$i]['valorreco'].'</td>
	<td>'.$listatemporales[$i]['observacioneseps'].'</td>
	<td>'.$listatemporales[$i]['fechabanco'].'</td>
	<td>'.$listatemporales[$i]['valoringresobanco'].'</td>
	<td>'.$listatemporales[$i]['noreciboadci'].'</td>
	<td>'.$listatemporales[$i]['notacredito'].'</td>
	<td>'.$listatemporales[$i]['fechanotadci'].'</td>
	<td>'.$listatemporales[$i]['valornotaadci'].'</td>';
	if(file_exists("archivosgenerales/".$listatemporales[$i]['imagen'])) {
		echo '<td><a href="archivosgenerales/'.$listatemporales[$i]['imagen'].'" target="_black" class="btn btn-primary">Descargar</a></td>';
	} else {
		echo '<td></td>';
	}
echo '<td>'.$listatemporales[$i]['otrasobserva'].'</td>
  </tr>';
	}
	?>
    </tbody>
</table>