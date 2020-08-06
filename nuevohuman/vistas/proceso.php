
<a  class="btn btn-primary" href="home.php?ctr=proceso&acc=formu&id=0">Nuevo Proceso</a>
<br><br><table class="table table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nombre de Funcionario</th>
      <th>Cargo</th>
      <th>Cedula</th>
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
		$nombrefuncionario=$listatemporales[$i]['nombrefuncionario'];
		$cargo=$listatemporales[$i]['cargo'];
		$id=$listatemporales[$i]['id_proceso'];
		$cedula=$listatemporales[$i]['cedula'];
		$estado=$listatemporales[$i]['estado'];
		$estadolb = "";
		if($estado == "C"){
			$estadolb = '<a class="btn btn-primary" href = "home.php?ctr=proceso&acc=formu&id='.$id.'">Editar</a>
			<a class="btn btn-primary" href = "home.php?ctr=proceso&acc=formu&id='.$id.'">Notificar</a><br>';
		}
		$correo=$listatemporales[$i]['correo'];
		echo  '<tr><td>'.$val.'</td>
		<td>'.$nombrefuncionario.'</td>
  <td>'.$cargo.'</td>
  <td>'.$cedula.'</td>
  <td>'.$estadolb.'</td></tr>';
	}
	?>
    </tbody>
</table>