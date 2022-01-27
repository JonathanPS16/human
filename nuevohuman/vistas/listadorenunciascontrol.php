<?php
$label = "Control de Retiros";

?>

<h5><?=$label?></h5>

<table class="table table-striped" id="myTable">
	<thead>
		<tr>
			<th>ID</th>
			<th>Cedula</th>
			<th>Nombre</th>
			<th>Empresa Usuaria</th>
			<th>Fecha Solicitud</th>
			<th>Fecha Retiro</th>
			<th>Celular</th>
			<th>Correo</th>
			<th>Entrega Carpeta</th>
			<th>Paz y Salvo</th>
			<th>Check Recibo Carpeta</th>
			<th>Check Paz y Savo </th>
			<th>No. Integración ADCI</th>
			<th>Envio Liquidación Empleado  </th>
			<th>Archivo Liquidación</th>
			<th>Liquidación Firmada </th>
			<th>Pago Liquidación </th>
			<th>Editar</th>
		</tr>
	</thead>
	<tbody>
<?php 
for($i=0; $i<count($listatemporales);$i++){	
    $id=$listatemporales[$i]['id_renuncia'];
	$cargo=$listatemporales[$i]['cargo'];
	$nombre=$listatemporales[$i]['nombre'];
	$observaciones=$listatemporales[$i]['observaciones'];
	$motivo=$listatemporales[$i]['motivo'];
	$paz=$listatemporales[$i]['paz'];
	$renuncia=$listatemporales[$i]['renuncia'];
	$fecharetiro=$listatemporales[$i]['fecharetiro'];
	$cedula=$listatemporales[$i]['cedula'];
	$estado=$listatemporales[$i]['estado'];
	$archivo=$listatemporales[$i]['archivo'];
	$correo=$listatemporales[$i]['correo'];
	$correoregi=$listatemporales[$i]['correoregi'];
	
	$fi=$listatemporales[$i]['fi'];
	$gene=$listatemporales[$i]['gene'];
	$nombrecargo=$listatemporales[$i]['nombrecargo'];
	$empresausuaria=$listatemporales[$i]['empresausuaria'];
	$nombretemporal =$listatemporales[$i]['nombretemporal'];
	$fechasoli =$listatemporales[$i]['fechasolicitud'];
	$ne =$listatemporales[$i]['ne'];
	$renunciada = $listatemporales[$i]['fecharetiro'];
	$contrato = $listatemporales[$i]['contrato'];
	

	if($listatemporales[$i]['pazysalvoconsol']=="" || $listatemporales[$i]['pazysalvoconsol']=="No"){
		
		$selepazysalvoconsolsi = "";
		$selepazysalvoconsolno = "selected";
	}else {
		$selefechaentregacarpetasi = "selected";
		$selefechaentregacarpetano = "";
	}

	if($listatemporales[$i]['recibocarpeta']=="" || $listatemporales[$i]['recibocarpeta']=="No"){
		
		$seleprecibocarpetasi = "";
		$seleprecibocarpetano = "selected";
	}else {
		$seleprecibocarpetasi = "selected";
		$seleprecibocarpetano = "";
	}

	if($listatemporales[$i]['checkpazysalvo']=="" || $listatemporales[$i]['checkpazysalvo']=="No"){
		
		$selecheckpazysalvosi = "";
		$selecheckpazysalvono = "selected";
	}else {
		$selecheckpazysalvosi = "selected";
		$selecheckpazysalvono = "";
	}

	if($listatemporales[$i]['envioliquiempleado']=="" || $listatemporales[$i]['envioliquiempleado']=="No"){
		
		$selecenvioliquiempleadosi = "";
		$selecenvioliquiempleadono = "selected";
	}else {
		$selecenvioliquiempleadosi = "selected";
		$selecenvioliquiempleadono = "";
	
	}




if($listatemporales[$i]['liquidacionfirmada']!=""){
	$listatemporales[$i]['liquidacionfirmada'] ="<a href ='archivosgenerales/".$listatemporales[$i]['liquidacionfirmada']."' target='_black' class='btn btn-primary'>Liquidación Firmada</a>";
}

if($listatemporales[$i]['archivoliquidacion']!=""){
	$listatemporales[$i]['archivoliquidacion'] ="<a href ='archivosgenerales/".$listatemporales[$i]['archivoliquidacion']."' target='_black' class='btn btn-primary'>Archivo Liquidación</a>";
}

	$file = '';
	$validaarchivo = 'N';
	if($listatemporales[$i]['archivoliquidacion']==""){

		$file = '<div class="form-group row">
		<label for="envioliquiempleado" class="col-4 col-form-label">Adjuntar Archio Liquidación  Max(<?php echo maxfilesizelabel; ?>)</label> 
		<div class="col-8">
		  <input id="archivoliquidacion" name="archivoliquidacion" type="file" class="form-control">
		</div>
	  </div>';
	} else if(($listatemporales[$i]['envioliquiempleado']=="" || $listatemporales[$i]['envioliquiempleado'] =="No" ) && $listatemporales[$i]['archivoliquidacion']!=""){
		$validaarchivo ="S";
		$file = '
		<div class="form-group row">
		<label for="envioliquiempleado" class="col-4 col-form-label">Envio Liquidación al Empleado</label> 
		<div class="col-8">
		<select id="envioliquiempleado" name="envioliquiempleado" class="custom-select">
		<option value="">Seleccione</option>
        <option value="No" '.$selecenvioliquiempleadono.'>No</option>
        <option value="Si" '.$selecenvioliquiempleadosi.'>Si</option>
      </select>
		</div>
	  </div>
		
		';
	} 
	$modalbotonextra ='<div class="modal fade" id="exampleModalextra'.$id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Información<br>Nombre:'.$listatemporales[$i]['nombre'].'<br>Cedula:'.$listatemporales[$i]['cedula'].'</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="home.php?ctr=retiro&acc=guardarconsolidado" method="post" enctype="multipart/form-data">
		<fieldset>
  <div class="form-group row">
    <label for="fechaentregacarpeta" class="col-4 col-form-label">Fecha Entrega Carpeta</label> 
    <div class="col-8">
      <input id="fechaentregacarpeta" name="fechaentregacarpeta" type="date" class="form-control" value="'.$listatemporales[$i]['fechaentregacarpeta'].'">
    </div>
  </div>
  <div class="form-group row">
    <label for="pazysalvoconsol" class="col-4 col-form-label">Paz y Salvo</label> 
    <div class="col-8">
      <select id="pazysalvoconsol" name="pazysalvoconsol" class="custom-select">
	  <option value="">Seleccione</option>
        <option value="No" '.$selepazysalvoconsolno.'>No</option>
        <option value="Si" '.$selepazysalvoconsolsi.'>Si</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="recibocarpeta" class="col-4 col-form-label">Check Recibido Carpeta</label> 
    <div class="col-8">
	  <input id="recibocarpeta" name="recibocarpeta" type="date" class="form-control" value ="'.$listatemporales[$i]['recibocarpeta'].'">
    </div>
  </div>
  <div class="form-group row">
    <label for="checkpazysalvo" class="col-4 col-form-label">Check Paz y salvo</label> 
    <div class="col-8">
      <select id="checkpazysalvo" name="checkpazysalvo" class="custom-select">
	  <option value="">Seleccione</option>
        <option value="No" '.$selecheckpazysalvono.'>No</option>
        <option value="Si" '.$selecheckpazysalvosi.'>Si</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="referliquidacion" class="col-4 col-form-label">No. Integración ADCI</label> 
    <div class="col-8">
      <input id="referliquidacion" name="referliquidacion" type="text" class="form-control" value="'.$listatemporales[$i]['referliquidacion'].'">
    </div>
  </div>
  '.$file.'
  <div class="form-group row">
    <label for="fechapagoliqui" class="col-4 col-form-label">Fecha de Pago Liquidación</label> 
    <div class="col-8">
      <input id="fechapagoliqui" name="fechapagoliqui" type="date" class="form-control" value ="'.$listatemporales[$i]['fechapagoliqui'].'">
    </div>
  </div> 
  
      <input id="id" name="id" type="hidden" value="'.$id.'">	
	  <input id="correoempleado" name="correoempleado" type="hidden" value="'.$listatemporales[$i]['correoempleado'].'">
	  <input id="archivoexiste" name="archivoexiste" type="hidden" value="'.$listatemporales[$i]['archivoliquidacion'].'">
	  <input id="nombre" name="nombre" type="hidden" value="'.$nombre.'">		
	  
	  
		<!-- Button -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="guardar"></label>
		  <div class="col-md-4">
		    <button id="guardar" name="guardar" class="btn btn-primary">Guardar</button>
		  </div>
		</div>

		</fieldset>
		</form>

        
      </div>
      
    </div>
  </div>
</div>
';
    $botonextra ='<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalextra'.$id.'">
  Editar
</button>';	

if($listatemporales[$i]['fechapagoliqui']!=""){
	$modalbotonextra="";
	$botonextra="Proceso Cerrado";
}

    echo "<tr>
    		<td>".$id."</td>
			<td>".$listatemporales[$i]['cedula']."</td>
			<td>".$listatemporales[$i]['nombre']."</td>
			<td>".$listatemporales[$i]['centrocostos']."</td>
			<td>".$listatemporales[$i]['fechasolicitud']."</td>
			<td>".$fecharetiro."</td>
			<td>".$listatemporales[$i]['celularempleado']."</td>
			<td>".$listatemporales[$i]['correoempleado']."</td>
			<td>".$listatemporales[$i]['fechaentregacarpeta']."</td>
			<td>".$listatemporales[$i]['pazysalvoconsol']."</td>
			<td>".$listatemporales[$i]['recibocarpeta']."</td>
			<td>".$listatemporales[$i]['checkpazysalvo']."</td>
			<td>".$listatemporales[$i]['referliquidacion']."</td>
			<td>".$listatemporales[$i]['envioliquiempleado']." ".$listatemporales[$i]['fechaarchivoliquidacion']."</td>
			<td>".$listatemporales[$i]['archivoliquidacion']."</td>
			<td>".$listatemporales[$i]['liquidacionfirmada']."</td>
			<td>".$listatemporales[$i]['fechapagoliqui']."</td>
    		<td>".$modalbotonextra.$botonextra."</td>
    </tr>";
  }

?>
</tbody>
</table>