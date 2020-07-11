<table class="table table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Cargo</th>
			<th>Ver</th>
		</tr>
	</thead>
	<tbody>
<?php 
for($i=0; $i<count($listadoreq);$i++){
    $id=$listadoreq[$i]['id'];
	$cargo=$listadoreq[$i]['cargo'];
	$status=$listadoreq[$i]['status'];
	$accion  = "<a class='btn btn-secondary' href='home.php?ctr=requisicion&acc=crearRequisicion&id=".$id."'>Completar Solicitud</a>";
	if ($status == 'E'){
		$accion  = "<a class='btn btn-primary' href='home.php?ctr=requisicion&acc=verreqcan&id=".$id."'>Ver Estado Solicitud</a>";
	}
    echo "<tr>
    		<td>".$id."</td>
    		<td>".$cargo."</td>
    		<td>".$accion."</td>
    </tr>";
  }

?>
</tbody>
</table>