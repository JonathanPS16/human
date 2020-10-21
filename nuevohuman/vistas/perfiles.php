<h5>Administracion  de Perfiles</h5>
<br><table class="table table-striped" id="tablagrid">
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
		$selecc=$listatemporales[$i]['selecc'].",";
		$pos = strpos($selecc, ",");
		$camposmenu = "";

		for($j=0; $j<count($listamenus);$j++) {
			$idmen = $listamenus[$j]['id'];
			
			$menu = $listamenus[$j]['menu'];
			
			$pos = strpos($selecc, "$idmen,");
			$datomenu = explode(",",$selecc);
			//var_dump($datomenu);
			$seldes ="";
			$selseles ="";
			if(in_array($idmen,$datomenu)){
				$selseles ="selected";
			} else {
				$seldes ="selected";
			}
		  $camposmenu.='<div class="form-group row">
		  <label class="col-4 col-form-label" for="select">'.$menu.'</label> 
		  <div class="col-8">
			<select id="radio'.$idmen.'" name="radio'.$idmen.'" class="custom-select" required="required">
			  <option value="No" '.$seldes.'>No</option>
			  <option value="Si" '.$selseles.'>Si</option>
			</select>
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
