<h5>Mis Contrataciones</h5>

<table class="table table-striped" id="myTable">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>Cedula</th>
			<th>Cargo</th>
			<th>Correo</th>
			<th>Fecha de Ingreso</th>
			<th>Sueldo</th>
			<th>Empresa Usuaria</th>
			<th>Orden de Ingreso</th>
			<th>Contrato</th>
			<th>Fecha ARL</th>
			<th>Archivo ARL</th>
			<th>Fecha EPS</th>
			<th>Archivo EPS</th>
			<th>Fecha Caja de Compensación</th>
			<th>Archivo Caja de Compensación</th>
      <th>Fecha Fondo Pensiones</th>
			<th>Archivo Fondo Pensiones</th>
      <th>Archivo Beneficiarios</th>
      <th>Check Afiliaciones</th>
      <th>Check Contrato</th>
      <th>Check Orden Ingreso</th>
      <th>Check Sueldo</th>
      <th>Check Web</th>
			<th>Estado</th>
		</tr>
	</thead>
	<tbody>
<?php 
for($i=0; $i<count($listatemporales);$i++){	
    $id=$listatemporales[$i]['idcand'];
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

  $archivosenvio = "";

  if($listatemporales[$i]['afiliaciones']!="Si" && $listatemporales[$i]['contratocheck']!="Si" && $listatemporales[$i]['ordencheck']!="Si" && $listatemporales[$i]['sueldocheck']!="Si" && $listatemporales[$i]['wp']!="Si" )
  {
    $concatena = $listatemporales[$i]['correo']."|".$listatemporales[$i]['nombre']."|".$listatemporales[$i]['contratocontratacion']."|".$listatemporales[$i]['archivoarl']."|".$listatemporales[$i]['archivoeps']."|".$listatemporales[$i]['archivocompensa']."|".$listatemporales[$i]['archivofondo'];
    $archivosenvio = '<a href="home.php?ctr=requisicion&acc=enviarcorreodocumentacion&valida='.base64_encode($concatena).'" class="btn btn-secondary">Alertar Documentación</a><br><br>';
  }
  
	
	if($listatemporales[$i]['contratocontratacion']!=""){
    $listatemporales[$i]['contratocontratacion'] = '<a href="archivosgenerales/'.$listatemporales[$i]['contratocontratacion'].'" target="_black" class="btn btn-primary">Contrato</a>';
  } else {
    $listatemporales[$i]['contratocontratacion'] = "No Aplica";
  }

  if($listatemporales[$i]['archivoarl']!=""){
    $listatemporales[$i]['archivoarl'] = '<a href="archivosgenerales/'.$listatemporales[$i]['archivoarl'].'" target="_black" class="btn btn-primary">Archivo Arl</a>';
  } else {
    $listatemporales[$i]['archivoarl'] = "No Aplica";
  }

  if($listatemporales[$i]['archivoeps']!=""){
    $listatemporales[$i]['archivoeps'] = '<a href="archivosgenerales/'.$listatemporales[$i]['archivoeps'].'" target="_black" class="btn btn-primary">Archivo Eps</a>';
  } else {
    $listatemporales[$i]['archivoeps'] = "No Aplica";
  }


  if($listatemporales[$i]['archivocompensa']!=""){
    $listatemporales[$i]['archivocompensa'] = '<a href="archivosgenerales/'.$listatemporales[$i]['archivocompensa'].'" target="_black" class="btn btn-primary">Archivo Caja Compensación</a>';
  } else {
    $listatemporales[$i]['archivocompensa'] = "No Aplica";
  }


  if($listatemporales[$i]['archivofondo']!=""){
    $listatemporales[$i]['archivofondo'] = '<a href="archivosgenerales/'.$listatemporales[$i]['archivofondo'].'" target="_black" class="btn btn-primary">Archivo Fondo</a>';
  } else {
    $listatemporales[$i]['archivofondo'] = "No Aplica";
  }
  $nobene = "";
  if($listatemporales[$i]['archivobenediciarios']!=""){
    $nobene = "S";
    $listatemporales[$i]['archivobenediciarios'] = '<a href="archivosgenerales/'.$listatemporales[$i]['archivobenediciarios'].'" target="_black" class="btn btn-primary">Archivo Beneficiarios</a>';
  } else {

    $registros = $listatemporales[$i]['correo']."|".$listatemporales[$i]['nombre'];
    $listatemporales[$i]['archivobenediciarios'] = '<a href="home.php?ctr=requisicion&acc=enviarcorreobeneficiario&valida='.base64_encode($registros).'" class="btn btn-secondary">Solicitar Documento</a>';
  }
	
  
  
  

  




	

	
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
	  <input id="empresausuaria" name="empresausuaria" type="hidden" value="'.$empresausuaria.'">
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

$ordeningreso ='<a href="archivosgenerales/'.$listatemporales[$i]['ordeningreso'].'" target="_black" class="btn btn-primary">Orden Ingreso</a><br>';

$selectedafiliacionesS = "";
$selectedafiliacionesN = "selected";

if($listatemporales[$i]['afiliaciones']=="Si"){
  $selectedafiliacionesS = "selected";
  $selectedafiliacionesN = "";
}
$selectedcontratocheckS = "";
$selectedcontratocheckN = "selected";
if($listatemporales[$i]['contratocheck']=="Si"){
  $selectedcontratocheckS = "selected";
  $selectedcontratocheckN = "";
}

$selectedordencheckS = "";
$selectedordencheckN = "selected";

if($listatemporales[$i]['ordencheck']=="Si"){
  $selectedordencheckS = "selected";
  $selectedordencheckN = "";
}



$selectedsueldocheckS = "";
$selectedsueldocheckN = "selected";

if($listatemporales[$i]['sueldocheck']=="Si"){
  $selectedsueldocheckS = "selected";
  $selectedsueldocheckN = "";
}

$selectedwpS = "";
$selectedwpN = "selected";
if($listatemporales[$i]['wp']=="Si"){
  $selectedwpS = "selected";
  $selectedwpN = "";
}


$modalbotonextra ='<div class="modal fade" id="exampleModalextra'.$id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Gestionar validación</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="home.php?ctr=requisicion&acc=gestionarchecks" method="post" enctype="multipart/form-data">
		<fieldset>
    <div class="form-group row">
    <label for="afiliaciones" class="col-4 col-form-label">Afiliaciones</label> 
    <div class="col-8">
      <select id="afiliaciones" name="afiliaciones" class="custom-select">
        <option value="No" '.$selectedafiliacionesN.'>No</option>
        <option value="Si" '.$selectedafiliacionesS.'>Si</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="contratocheck" class="col-4 col-form-label">Contrato</label> 
    <div class="col-8">
      <select id="contratocheck" name="contratocheck" class="custom-select">
        <option value="No" '.$selectedcontratocheckN.'>No</option>
        <option value="Si" '.$selectedcontratocheckS.'>Si</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="ordencheck" class="col-4 col-form-label">Orden de Ingreso</label> 
    <div class="col-8">
      <select id="ordencheck" name="ordencheck" class="custom-select">
        <option value="No" '.$selectedordencheckN.'>No</option>
        <option value="Si" '.$selectedordencheckS.'>Si</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="sueldocheck" class="col-4 col-form-label">Sueldo</label> 
    <div class="col-8">
      <select id="sueldocheck" name="sueldocheck" class="custom-select">
        <option value="No" '.$selectedsueldocheckN.'>No</option>
        <option value="Si" '.$selectedsueldocheckS.'>Si</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="wp" class="col-4 col-form-label">Pagina Web información</label> 
    <div class="col-8">
      <select id="wp" name="wp" class="custom-select">
        <option value="No" '.$selectedwpN.'>No</option>
        <option value="Si" '.$selectedwpS.'>Si</option>
      </select>
    </div>
  </div> 
      <input id="id" name="id" type="hidden" value="'.$id.'">
	 
	  		    
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
  Gestionar Contratación
</button>';	

$styleafiliaciones = "color:green";
if($listatemporales[$i]['afiliaciones']=="" || $listatemporales[$i]['afiliaciones'] =="No"){
	$styleafiliaciones = "color:red";
}

$stylecontratocheck = "color:green";
if($listatemporales[$i]['contratocheck']=="" || $listatemporales[$i]['contratocheck'] =="No"){
	$stylecontratocheck = "color:red";
}

$styleordencheck = "color:green";
if($listatemporales[$i]['ordencheck']=="" || $listatemporales[$i]['ordencheck'] =="No"){
	$styleordencheck = "color:red";
}

$stylesueldocheck = "color:green";
if($listatemporales[$i]['sueldocheck']=="" || $listatemporales[$i]['sueldocheck'] =="No"){
	$stylesueldocheck = "color:red";
}

$stylewp = "color:green";
if($listatemporales[$i]['wp']=="" || $listatemporales[$i]['wp'] =="No"){
	$stylewp = "color:red";
}

    echo "<tr>
    		<td>".$id."</td>
			<td>".$listatemporales[$i]['nombre']."</td>
			<td>".$listatemporales[$i]['cedula']."</td>
			<td>".$listatemporales[$i]['cargo']."</td>
			<td>".$listatemporales[$i]['correo']."</td>
			<td>".$listatemporales[$i]['fechareqcargo']."</td>
			<td>".$listatemporales[$i]['salariorh']."</td>
			<td>".$listatemporales[$i]['nombreempresausu']."</td>
      <td>".$ordeningreso."</td>
			<td>".$listatemporales[$i]['contratocontratacion']."</td>
      <td>".$listatemporales[$i]['fechaarl']."</td>
			<td>".$listatemporales[$i]['archivoarl']."</td>
      <td>".$listatemporales[$i]['fechaeps']."</td>
			<td>".$listatemporales[$i]['archivoeps']."</td>
      <td>".$listatemporales[$i]['fechacompensa']."</td>
			<td>".$listatemporales[$i]['archivocompensa']."</td>
      <td>".$listatemporales[$i]['fechafondo']."</td>
			<td>".$listatemporales[$i]['archivofondo']."</td>
			<td>".$listatemporales[$i]['archivobenediciarios']."</td>
      <td style = '$styleafiliaciones'>".$listatemporales[$i]['afiliaciones']."</td>
      <td style = '$stylecontratocheck'>".$listatemporales[$i]['contratocheck']."</td>
      <td style = '$styleordencheck'>".$listatemporales[$i]['ordencheck']."</td>
      <td style = '$stylesueldocheck'>".$listatemporales[$i]['sueldocheck']."</td>
      <td style = '$stylewp' >".$listatemporales[$i]['wp']."</td>
    		<td>".$archivosenvio.$modalbotonextra.$botonextra."</td>
    </tr>";
  }

?>
</tbody>
</table>