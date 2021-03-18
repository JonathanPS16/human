<h5>Asignación de Perfiles</h5>

<table class="table table-striped table-bordered" id="myTable">
	<thead>
		<tr>
			<th>ID</th>
			<th>Usuario</th>
			<th>nombre</th>
			<th>Correo</th>
			<th>Perfil</th>
			<th>Empresa Usuaria</th>
			<th>Restaurar Clave</th>
			<th>Eliminar</th>
		</tr>
	</thead>
	<tbody>
	<?php 
	$val = 0;
	for($i=0; $i<count($listatemporales);$i++){

		$val ++;
		$conteoreq = 0;
		$id_usuario = $listatemporales[$i]['id_usuario'];
		$usuario=$listatemporales[$i]['usuario'];
		$correo=$listatemporales[$i]['correo'];
		$idrol=$listatemporales[$i]['idrol'];
		$nombre=$listatemporales[$i]['nombre'];
		$centro =$listatemporales[$i]['centro'];
		if($centro=="")
		{
			$centro="Sin Asignacion";
		}
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
		
		/*echo  '<tr><td>'.$val.'</td>
		<td>'.$usuario.'</td>
		<td>'.$correo.'</td>
		<td><select onchange="cambiar('.$id_usuario.',this.value)" class="form-control"><option value ="0">Seleccione</option>'.$pefillb.'</select></td>
		<td><button onclick="restaurar('.$id_usuario.','.$usuario.')" class="btn btn-primary col-md-20">Restaurar Clave</button></td>
		<td><button onclick="eliminar('.$id_usuario.')" class="btn btn-primary col-md-20">Eliminar</button></td></tr>';*/
		?><tr>
	<th><?=$val?></th>
			<td><?=$usuario?></td>
			<td><?=$nombre?></td>
			<td><?=$correo?></td>
			<td><select onchange="cambiar(<?=$id_usuario?>,this.value)" class="form-control"><option value ="0">Seleccione</option><?=$pefillb?></select></td>
			<td><?=$centro?></td>
			<td><button onclick="restaurar(<?=$id_usuario?>,'<?=$usuario?>')" class="btn btn-primary col-md-20">Restaurar Clave</button></td>
			<td><button onclick="eliminar(<?=$id_usuario?>)" class="btn btn-primary col-md-20">Eliminar</button></td></tr></th>
	</tr><?php 
	}
	?>
	</tbody>
	</table>
	<?php /*
<table class="table table-striped table-bordered" id="myTablea">
	<thead>
		<tr>
			<th>ID</th>
			<th>Usuario</th>
			<th>Correo</th>
			<th>Perfil</th>
			<th>Restaurar Clave</th>
			<th>Eliminar</th>
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
		<td><select onchange="cambiar('.$id_usuario.',this.value)" class="form-control"><option value ="0">Seleccione</option>'.$pefillb.'</select></td>
		<td><button onclick="restaurar('.$id_usuario.','.$usuario.')" class="btn btn-primary col-md-20">Restaurar Clave</button></td>
		<td><button onclick="eliminar('.$id_usuario.')" class="btn btn-primary col-md-20">Eliminar</button></td></tr>';
	}
	?>
    </tbody>
</table>
*/
?>
<script>
	function cambiar(id,valor){
		
			if (valor!=0) {
				var r = confirm("Seguro que Desea Cambiar el Perfil del Usuario?");
				if (r == true) {
					location.href ="home.php?ctr=admon&acc=cambiarperfilusu&usu="+id+"&perf="+valor;
				} else {
					return false;
				} 
			}
}

function restaurar(id,valor){
		
		if (valor!=0) {
			var r = confirm("Seguro que Desea Restaurar la Clave del Usuario?");
			if (r == true) {
				location.href ="home.php?ctr=admon&acc=restaurarclave&usu="+id+"&perf="+valor;
			} else {
				return false;
			} 
		}
}

function eliminar(id){
		
		if (id!=0) {
			var r = confirm("Seguro que Desea Eliminar el Usuario?");
			if (r == true) {
				location.href ="home.php?ctr=admon&acc=eliminarusu&usu="+id;
			} else {
				return false;
			} 
		}
}

</script>
