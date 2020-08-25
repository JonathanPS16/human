<table class="table table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Cargo</th>
			<th>Horario</th>
			<th>Tipo Contrato</th>
			<th>Caracteristicas Generales</th>
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
	$salariobasico=$listadoreq[$i]['salariobasico'];;
    echo "<tr>
    		<td>".$id."</td>
			<td>".$cargo."</td>
			<td>".$horario."</td>
			<td>".$tipocontrato."</td>
			<td>Edad Minima: <strong>".$edadminima ."</strong>
			<br>Edad Maxima: <strong>".$edadmaxima."</strong>
			<br>Ciudad Laborar: <strong>".$ciudadlaboral."</strong>
			<br>Salario Basico:<strong>$".$salariobasico."</strong></td>
    		<td><a href='home.php?ctr=requisicion&acc=listaCandidatos&id=".$id."'>Gestionar Solicitud</a></td>
    </tr>";
  }

?>
</tbody>
</table>