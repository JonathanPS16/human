<?php
$label = "Proceso Gestion Renuncias";
if($mios=="S"){
	$label = "Resumen Informe Retiros Empleados";
}
?>


<h5><?=$label?></h5>

<table class="table table-striped" id="myTable">
	<thead>
		<tr>
			<th>ID</th>
			<th>Gestor</th>
			<th>Fecha Asignación</th>
			<th>Motivo</th>
			<th>Fecha Solicitud</th>
			<th>Fecha Retiro</th>
			<th>Fecha Notificación</th>
			<th>Nombre</th>
			<th>Cedula</th>
			<th>Empresa Usuaria</th>
			<th>Incapacidades</th>
			<th>Accidentes</th>
			<th>Observaciones</th>
			<th>Envio de Carta</th>
			<th>Paz y Salvo</th>
			<th>Renuncia</th>
			<th>Carta Enviada</th>
			<th>Correo Enviados</th>
			<th>Estado</th>
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
	
	
	

	

	
	$modalbotonextra ='<div class="modal fade" id="exampleModalextra'.$id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enviar Documento de Terminacion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="home.php?ctr=retiro&acc=guardarenviar" method="post" enctype="multipart/form-data">
		<fieldset>
		<div class="form-group row">
            <label for="presentarse" class="col-4 col-form-label">Correos Electronico (Separados por ;)</label> 
            <div class="col-8">
              <input id="correo" name="correo" placeholder="correo@electronico.com;correo2@electronico.com" type="text" class="form-control" >
            </div>
          </div> 
		  <div class="form-group row">
    <label class="col-4 col-form-label">Enviar a</label> 
    <div class="col-8">
      <div class="custom-controls-stacked">
        <div class="custom-control custom-checkbox">
          <input name="checkbox_0" id="checkbox_0" type="checkbox" class="custom-control-input" value="1" checked="checked"> 
          <label for="checkbox_0" class="custom-control-label">Candidato</label>
        </div>
      </div>
      <div class="custom-controls-stacked">
        <div class="custom-control custom-checkbox">
          <input name="checkbox_1" id="checkbox_1" type="checkbox" class="custom-control-input" value="2" checked="checked"> 
          <label for="checkbox_1" class="custom-control-label">Servicio Cliente</label>
        </div>
      </div>
      <div class="custom-controls-stacked">
        <div class="custom-control custom-checkbox">
          <input name="checkbox_2" id="checkbox_2" type="checkbox" class="custom-control-input" value="3" checked="checked"> 
          <label for="checkbox_2" class="custom-control-label">Nomina</label>
        </div>
      </div>
    </div>
  </div> 
		
      <input id="id" name="id" type="hidden" value="'.$id.'">
	  <input id="contrato" name="contrato" type="hidden" value="'.$contrato.'">
	  <input id="fechai" name="fechai" type="hidden" value="'.$fi.'">
	  <input id="cedula" name="cedula" type="hidden" value="'.$cedula.'">
	  <input id="ne" name="ne" type="hidden" value="'.$ne.'">
	  <input id="correoempleado" name="correoempleado" type="hidden" value="'.$correoregi.'">
	  <input id="gene" name="gene" type="hidden" value="'.$gene.'">
	  <input id="motivo" name="motivo" type="hidden" value="'.$motivo.'">
	  <input id="renuncia" name="renuncia" type="hidden" value="'.$renunciada.'">
	  <input id="nombrecargo" name="nombrecargo" type="hidden" value="'.$nombrecargo.'">
	  <input id="empresausuaria" name="empresausuaria" type="hidden" value="'.$listatemporales[$i]['nombretemporal'].'">
	  <input id="fechasoli" name="fechasoli" type="hidden" value="'.$fechasoli.'">
	  <input id="nombretemporal" name="nombretemporal" type="hidden" value="'.$nombretemporal.'">
	  		    
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
  Gestionar Retiro
</button>';	
$stylepaz ="btn btn-primary";
$stylerenuncia ="btn btn-primary";
if($paz==""){
	$stylepaz ="btn btn-warning";
}

if($renuncia==""){
	$stylerenuncia ="btn btn-warning";
}


$boton ='<a href="archivosgenerales/'.$paz.'" target="_black" class="'.$stylepaz.'">Paz y salvo</a><br>';
$botondos ='<a href="archivosgenerales/'.$renuncia.'" target="_black" class="'.$stylerenuncia.'">Renuncia</a>';


$botoneliminacion ='<br><br><a href="home.php?ctr=retiro&acc=eliminarretiro&id='.$id.'" class="btn btn-danger" >Cancelar Solicitud</a>';





$archivocorreoenviadocarta = "No Enviado";
if($estado=='T'){
	$modalbotonextra ="";
	if($archivo!=""){
		$archivocorreoenviadocarta = '<a href="archivosgenerales/'.$archivo.'" target="_black" class="btn btn-primary">Carta Enviada</a>';	
	}
	$botonextra ="Enviado a:<br>".$correo.'<br><a href="archivosgenerales/'.$archivo.'" target="_black" >Archivo</a>';
}
if($mios=="S" && $estado=='C'){
	$modalbotonextra ="";
	$botonextra ="En Proceso";
}

if($estado=='T'){
	$modalbotonextra ="";
	$botonextra ="Procesado";
}


if($motivo=="renuncia"){
	$motivo = "RV";
}else if($motivo=="terminacion"){
	$motivo = "TC";
} else {
	$motivo = "OT";
}
$correolbl = "";
if($correo!=""){
	$datosmensaje= explode(";",$correo);
	for($lb=0;$lb<=count($datosmensaje); $lb++){
		if($datosmensaje[$lb]!=""){
			$correolbl .= $datosmensaje[$lb]."<br>";	
		}
	}

}

$hoy = strtotime(date('Y-m-d'));
$fechanot = strtotime($listatemporales[$i]['fechanotificacion']);

$style = "color:green";
if($hoy>strtotime($fechanot)){
	$style = "color:red";
}


$fechaenvio = "Sin Envio";
if($listatemporales[$i]['enviocorreot']!="")
{
	$fechaenvio = $listatemporales[$i]['enviocorreot'];
}

if($listatemporales[$i]['visible']=="N"){
	$modalbotonextra = "";
	$botonextra = "";
	$botoneliminacion = "Retiro Cancelado";
}
$tomador = $listatemporales[$i]['tomador'];
if($listatemporales[$i]['tomador']=="")
{
	if($mios!="S"){
		$tomador ='<a href="home.php?ctr=requisicion&acc=tomargestionretiro&id='.$id.'" class="btn btn-info">Tomar Gestión</a>';
	}
	
}
    echo "<tr>
    		<td>".$id."</td>
			<td>".$tomador."</td>
			<td>".$listatemporales[$i]['fechatomado']."</td>
			<td>".$motivo."</td>
			<td>".$listatemporales[$i]['fechasolicitud']."</td>
			<td>".$fecharetiro."</td>
			<td style='".$style."'>".$listatemporales[$i]['fechanotificacion']."</td>
			<td>".$nombre."</td>
			<td>".$cedula."</td>
			<td>".$listatemporales[$i]['nombretemporal']."</td>
			<td>".$listatemporales[$i]['conteoincapa']."</td>
			<td>".$listatemporales[$i]['conteoaccientes']."</td>
			<td>".$observaciones."</td>
			<td>".$fechaenvio."</td>
			<td>".$boton."</td>
			<td>".$botondos."</td>
			<td>".$archivocorreoenviadocarta."</td>
			<td>".$correolbl."</td>
    		<td>".$modalbotonextra.$botonextra.$botoneliminacion."</td>
    </tr>";
  }

?>
</tbody>
</table>