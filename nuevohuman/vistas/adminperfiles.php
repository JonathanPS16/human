<a  class="btn btn-primary" href="home.php?ctr=accidentes&acc=formu&id=0">Nuevo Accidente</a>
<br><br><table class="table table-striped" id="tablagrid">
	<thead>
		<tr>
			<th>ID</th>
			<th>Usuario</th>
			<th>Correo</th>
		</tr>
	</thead>
	<tbody>
    <tr>
	<?php 
	$val = 0;
	for($i=0; $i<count($listatemporales);$i++){

		$val ++;
		$conteoreq = 0;
		$id_usuario = $listatemporales[$i]['id_usuario'];
		$usuario=$listatemporales[$i]['usuario'];
		$correo=$listatemporales[$i]['correo'];
		$idrol=$listatemporales[$i]['idrol'];
		$pefillb = "";
		for($j=0; $j<count($listamenus);$j++) {
			$id_perfil = $listamenus[$j]['id_perfil'];
			$menu = $listamenus[$j]['nombreperfil'];
			$sel = "";
			if($id_perfil==$idrol) {
				$sel ="selected";
			}
			$pefillb.='<option value="'.$id_perfil.'" '.$sel.'>'.$menu.'</option>';
		}
		
		echo  '<tr><td>'.$val.'</td>
		<td>'.$usuario.'</td>
		<td>'.$correo.'</td>
		<td><select onchange="cambiar('.$id_usuario.',this.value)"><option value ="0">Seleccione</option>'.$pefillb.'</select></td></tr>';
	}
	?>
    </tbody>
</table>

<script>
function cambiar(id,valor){
	if (valor!=0) {
		var r = confirm("Seguro que Desea Cambiar eL Perfil del Usuario?");
		if (r == true) {
			console.log(id+"+"+valor+" HOLA");
		} else {
			return false;
		} 
	}
}
</script>