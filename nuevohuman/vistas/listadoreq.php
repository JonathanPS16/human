<table class="table table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Cargo</th>
			<th>Fecha Solicitud</th>
			<th>Empresa Usuaria</th>
			<th>Fecha Requerida</th>
			<th>Cantidad</th>
			<th>Salario</th>
			<th>Ciudad</th>
			<th>Estado</th>
			<th>Ver</th>
		</tr>
	</thead>
	<tbody>
<?php 
for($i=0; $i<count($listadoreq);$i++){
    $id=$listadoreq[$i]['id'];
	$cargo=$listadoreq[$i]['cargo'];
	$status=$listadoreq[$i]['status'];
	$id=$listadoreq[$i]['id'];
	$cargo=$listadoreq[$i]['cargo'];
	$horario=$listadoreq[$i]['horario'];
	$tipocontrato=$listadoreq[$i]['tipocontrato'];
	$edadminima=$listadoreq[$i]['edadminima'];
	$edadmaxima=$listadoreq[$i]['edadmaxima'];
	$ciudadlaboral=$listadoreq[$i]['ciudadlaboral'];
	$salariobasico=$listadoreq[$i]['salariobasico'];
	$fechacreacion=$listadoreq[$i]['fechacreacion'];
	$empresacliente=$listadoreq[$i]['empresacliente'];
	$fechareqcargo=$listadoreq[$i]['fechareqcargo'];
	$cantidad=$listadoreq[$i]['cantidad'];
	$estadogene = "Finalizado";
	$cantidadapro =$listadoreq[$i]['cantidadapro'];
	if($cantidadapro!=$cantidad){
		$estadogene = "Abierto <br>($cantidadapro) Aprobados";
	}
	$accion  = "<a class='btn btn-secondary' href='home.php?ctr=requisicion&acc=crearRequisicion&id=".$id."'>Completar Solicitud</a>";
	if ($status == 'E'){
		$accion  = "<a class='btn btn-primary' href='home.php?ctr=requisicion&acc=verreqcan&id=".$id."'>Ver Estado Solicitud</a>";
	}
    echo "<tr>
    		<td>".$id."</td>
			<td>".$cargo."</td>
			<td>".$fechacreacion."</td>
			<td>".$empresacliente."</td>
			<td>".$fechareqcargo."</td>
			<td>".$cantidad."</td>
			<td>".$salariobasico."</td>
			<td>".$ciudadlaboral."</td>
			<td>".$estadogene."</td>
    		<td>".$accion."</td>
    </tr>";
  }

?>
</tbody>
</table>