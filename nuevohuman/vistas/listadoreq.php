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
    echo "<tr>
    		<td>".$id."</td>
    		<td>".$cargo."</td>
    		<td><a href='home.php?ctr=requisicion&acc=crearRequisicion&id=".$id."'>Ver</a></td>
    </tr>";
  }

?>
</tbody>
</table>