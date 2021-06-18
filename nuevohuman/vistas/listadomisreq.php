<h5>Gestionar Requisiciones Solicitadas</h5>
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
			<th>Detalle Requisicion</th>
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

	$modaleditnota ='<div class="modal fade" id="exampleModalnotaseg'.$id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Editar Nota General</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" action="home.php?ctr=incapacidad&acc=editarNotaGeneral" method="post" enctype="multipart/form-data">
			
		  <input id="id" name="id" type="hidden" value="'.$id.'">
		<div class="form-group row">
		  <label for="descgeneral" class="col-4 col-form-label">Observaciones Generales</label> 
		  <div class="col-8">
			<textarea id="descgeneral" name="descgeneral" cols="40" rows="5" class="form-control" required="required"></textarea>
		  </div>
		</div>
		
		<div class="form-group row">
		  <div class="offset-4 col-8">
			
		  </div>
		</div>
			</form>	
		  </div>
		</div>
	  </div>
	</div>
	';
		$btnEditNota  ='<a  data-toggle="modal" class="btn btn-primary" data-target="#exampleModalnotaseg'.$id.'" style="color: white">Ver Detalle</a>';

	$detallereg = "asdasdsa00";
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
			<td>".$modaleditnota.$btnEditNota."</td>
    		<td><a href='home.php?ctr=requisicion&acc=listaCandidatos&id=".$id."' class='btn btn-primary'>Gestionar Solicitud</a></td>
    </tr>";
  }

?>
</tbody>
</table>