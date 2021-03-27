<h5>Requisiciones Solicitadas</h5>
<table class="table table-striped table-bordered" id="myTable">
	<thead>
		<tr>
			<th>ID</th>
			<th>Tipo Solicitud</th>
			<th>Cargo</th>
			<th>Fecha Solicitud</th>
			<th>Empresa Temporal</th>
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
	$horario=$listadoreq[$i]['horario'];
	$tipocontrato=$listadoreq[$i]['tipocontrato'];
	$edadminima=$listadoreq[$i]['edadminima'];
	$edadmaxima=$listadoreq[$i]['edadmaxima'];
	$ciudadlaboral=$listadoreq[$i]['ciudadlaboral'];
	$salariobasico=$listadoreq[$i]['salariobasico'];
	$fechacreacion=$listadoreq[$i]['fechacreacion'];
	$empresacliente=$listadoreq[$i]['nombreempresausu'];
	$empresatemporal=$listadoreq[$i]['nombretemporal'];
	$fechareqcargo=$listadoreq[$i]['fechareqcargo'];
	$cantidad=$listadoreq[$i]['cantidad'];
	$cantidadapro =$listadoreq[$i]['cantidadapro'];
	$tiporeq=$listadoreq[$i]['tiporeq'];
	$estadogene = "Finalizado";
	if($cantidadapro!=$cantidad){
		$estadogene = "Abierto <br>($cantidadapro) Aprobados";
	}
    echo "<tr>
    		<td>".$id."</td>
			<td>".$tiporeq."</td>
			<td>".$cargo."</td>
			<td>".$fechacreacion."</td>
			<td>".$empresatemporal."</td>
			<td>".$empresacliente."</td>
			<td>".$fechareqcargo."</td>
			<td>".$cantidad."</td>
			<td>".$salariobasico."</td>
			<td>".$ciudadlaboral."</td>
			<td>".$estadogene."</td>
    		<td><a href='home.php?ctr=requisicion&acc=listaCandidatos&id=".$id."' class='btn btn-primary'>Gestionar Solicitud</a></td>
    </tr>";
  }

?>
</tbody>
</table>