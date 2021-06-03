<h5>Usuarios Externos</h5>
<br><br>

<table class="table table-striped table-bordered" id="myTable">
	<thead>
		<tr>
			<th>Documento</th>
			<th>Correo</th>
			<th>Estado</th>
			<th>Eliminar</th>
		</tr>
	</thead>
	<tbody>
	<?php 
	$val = 0;
	for($i=0; $i<count($listatemporales);$i++){

		$val ++;
		$conteoreq = 0;
		$id_usuario = $listatemporales[$i]['id_ingreso'];
		$usuario=$listatemporales[$i]['documento'];
		$correo=$listatemporales[$i]['correo'];
		$estado=$listatemporales[$i]['estado'];
		$estado="Activa";
		if($estado=="P")
		{
			$estado="Pendiente Activacion";
		} 
	
		
		/*echo  '<tr><td>'.$val.'</td>
		<td>'.$usuario.'</td>
		<td>'.$correo.'</td>
		<td><select onchange="cambiar('.$id_usuario.',this.value)" class="form-control"><option value ="0">Seleccione</option>'.$pefillb.'</select></td>
		<td><button onclick="restaurar('.$id_usuario.','.$usuario.')" class="btn btn-primary col-md-20">Restaurar Clave</button></td>
		<td><button onclick="eliminar('.$id_usuario.')" class="btn btn-primary col-md-20">Eliminar</button></td></tr>';*/
		?><tr>
			<td><?=$usuario?></td>
			<td><?=$correo?></td>
			<td><?=$estado?></td>
			<td><button onclick="eliminar(<?=$id_usuario?>)" class="btn btn-primary col-md-20">Eliminar</button></td></tr></th>
	</tr><?php 
	}
	?>
	</tbody>
	</table>
<script>
function crearnuevo(){
	location.href ="home.php?ctr=admon&acc=creacionusuarios";
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
				location.href ="home.php?ctr=admon&acc=eliminarusu&ext=S&usu="+id;
			} else {
				return false;
			} 
		}
}

</script>
