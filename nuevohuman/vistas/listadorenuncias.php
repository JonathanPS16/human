<h5>Proceso de Renuncias </h5>
<table class="table table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Motivo</th>
			<th>Fecha Retiro</th>
			<th>Nombre</th>
			<th>Cedula</th>
			<th>Observaciones</th>
			<th>Archivos</th>
			<th>Ver</th>
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
          <label for="checkbox_2" class="custom-control-label">Facturacion</label>
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
  Enviar Documento
</button>';	
$boton ='<a href="archivosgenerales/'.$paz.'" target="_black" >Paz y salvo</a><br>';
$botondos ='<a href="archivosgenerales/'.$renuncia.'" target="_black" >Renuncia</a>';

if($estado=='T'){
	$modalbotonextra ="";
	$botonextra ="Enviado a:<br>".$correo.'<br><a href="archivosgenerales/'.$archivo.'" target="_black" >Archivo</a>';
}
if($mios=="S" && $estado=='C'){
	$modalbotonextra ="";
	$botonextra ="En Proceso";
}
    echo "<tr>
    		<td>".$id."</td>
			<td>".$motivo."</td>
			<td>".$fecharetiro."</td>
			<td>".$nombre."</td>
			<td>".$cedula."</td>
			<td>".$observaciones."</td>
			<td>".$boton.$botondos."</td>
    		<td>".$modalbotonextra.$botonextra."</td>
    </tr>";
  }

?>
</tbody>
</table>