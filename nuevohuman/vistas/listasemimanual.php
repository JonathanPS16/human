<h5>Requisiciones Solicitadas</h5>
<div class="table-responsive">
<table class="table table-striped table-bordered" id="myTable">
	<thead>
		<tr>
			<?php 
			for($i=0;$i<count($dato);$i++){
				echo "<th>".$dato[$i]."</th>"; 
				//array_push($dato,$listatemporalesa[$i]['Field']);
			}
			
			?>
			<th>Editar</th>
		</tr>
	</thead>
	<tbody>
<?php 
for($j=0;$j<count($listatemporalesadata);$j++){
	echo "<tr>";
	for($k=0;$k<count($dato);$k++){
		echo "<td>".$listatemporalesadata[$j][$dato[$k]]."</td>"; 
		//array_push($dato,$listatemporalesa[$i]['Field']);
	}
	echo "<td><a href='home.php?ctr=incapacidad&acc=editsemimanual&id=".$listatemporalesadata[$j]['id_registro']."' class='btn btn-primary'>Editar</a></td>";
	echo "</tr>";
}

/*for($i=0; $i<count($listadoreq);$i++){
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
	$estadogene = "Finalizado";
	if($cantidadapro!=$cantidad){
		$estadogene = "Abierto <br>($cantidadapro) Aprobados";
	}
    echo "<tr>
    		<td>".$id."</td>
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
*/
?>
</tbody>
</table>
</div>