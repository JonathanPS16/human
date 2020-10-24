<h5>Incapacidades Cargadas</h5><br>
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
		</tr>
	</thead>
	<tbody>
 
	<?php 
	$val = 0;
	for($i=0; $i<count($listatemporales);$i++){

		$val ++;
		$conteoreq = 0;
		$empresa=$listatemporales[$i]['empresa'];
		$nit=$listatemporales[$i]['nit'];
		$empresausuaria=$listatemporales[$i]['empresausuaria'];
		$observaciones=$listatemporales[$i]['observaciones'];
		$descripcodigo=$listatemporales[$i]['descripcodigo'];
		$fechaini=$listatemporales[$i]['fechaini'];
		$fechafinal=$listatemporales[$i]['fechafinal'];
		$cantidaddias=$listatemporales[$i]['cantidaddias'];
		$cedula=$listatemporales[$i]['cedula'];
		$nombreper=$listatemporales[$i]['nombreper'];
		$concepto=$listatemporales[$i]['concepto'];
		$estado=$listatemporales[$i]['estado'];

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
  </tr>';
	}
	?>
    </tbody>
</table>
<script>
 $(document).ready( function () {
    $('#example').DataTable();
	$('#myTable').DataTable(
		{
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    }
	);
} );
</script>