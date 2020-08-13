<a  class="btn btn-primary" href="home.php?ctr=accidentes&acc=formu&id=0">Nuevo Accidente</a>
<br><br><table class="table table-striped" id="tablagrid">
	<thead>
		<tr>
			<th>ID</th>
			<th>Perfil</th>
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
		$id = $listatemporales[$i]['id_perfil'];
		$nombreperfil=$listatemporales[$i]['nombreperfil'];
		$selecc=$listatemporales[$i]['selecc'];
		
		$camposmenu = "";

		for($j=0; $j<count($listamenus);$j++) {
			$idmen = $listamenus[$j]['id'];
			$menu = $listamenus[$j]['menu'];

			$pos = strpos($selecc, "$idmen,");

			$seldes ="";
			$selseles ="";
			if ($pos === false) {
				$seldes ="checked";
			} else {
				$selseles ="checked";
			}
			$camposmenu.='<div class="form-group row">
			<label class="col-4">'.$menu.'</label> 
			<div class="col-8">
			  <div class="custom-control custom-radio custom-control-inline">
				<input name="radio'.$idmen.'" id="radio_0'.$idmen.'" type="radio" class="custom-control-input" value="Si" '.$selseles.'> 
				<label for="radio_0'.$idmen.'" class="custom-control-label">Si</label>
			  </div>
			  <div class="custom-control custom-radio custom-control-inline">
				<input name="radio'.$idmen.'" id="radio_1'.$idmen.'" type="radio" class="custom-control-input" value="No" '.$seldes.'> 
				<label for="radio_1'.$idmen.'" class="custom-control-label">No</label>
			  </div>
			</div>
		  </div> ';
		}


		$estadolb = "";
		  
		$modalbotonhoja ='<div class="modal fade" id="exampleModalhv'.$id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Editar Permisos</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" action="home.php?ctr=admon&acc=guardarpermisos" method="post" enctype="multipart/form-data">
			<input type="hidden" id="id" name="id" value="'.$id.'">
			'.$camposmenu.'
			<div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Guardar</button>
    </div>
  </div>
			</form>
	
			
		  </div>
		  
		</div>
	  </div>
	</div>
	';
		$botonhoja ='<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalhv'.$id.'">
	  Editar Permisos
	</button>';	
		
		echo  '<tr><td>'.$val.'</td>
		<td>'.$nombreperfil.'</td>
  <td>'.$modalbotonhoja.$botonhoja.'</td></tr>';
	}
	?>
    </tbody>
</table>
