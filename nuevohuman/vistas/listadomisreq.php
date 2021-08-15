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
			<th>Estado Candidatos</th>
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
	$cantidadrechazados =$listadoreq[$i]['cantidadrechazados'];
	$cantidadtotal =$listadoreq[$i]['cantidadtotal'];
	$tiporeq=$listadoreq[$i]['tiporeq'];
	//$estadogene = "Finalizado";
	//if($cantidadapro!=$cantidad){
		$estadogene = "Aprobados: $cantidadapro<br>Rechazados:$cantidadrechazados<br>Total Registros:$cantidadtotal ";
	//}



	$nanana = "";
 if($listadoreq[$i]['adaptabilidad'] =="SI") { $nanana.="Adaptabilidad a Normas y Ambiente de Trabajo<br>"; } 
 if($listadoreq[$i]['administracion'] =="SI") { $nanana.="Administración del Tiempo<br>"; } 
 if($listadoreq[$i]['analisis'] =="SI") { $nanana.="Análisis y Solución De Problemas<br>"; }   
 if($listadoreq[$i]['gestion'] =="SI") { $nanana.="Capacidad De Gestión<br>"; } 
 if($listadoreq[$i]['negociacion'] =="SI") { $nanana.="Capacidad De Negociación<br>"; } 
 if($listadoreq[$i]['normas'] =="SI") {  $nanana.="Orientación al Cumplimiento Normas Y Procesos<br>"; } 
 if($listadoreq[$i]['aprendizaje'] =="SI") { $nanana.="Disposición Hacia El Aprendizaje<br>"; }  
 if($listadoreq[$i]['flexibilidad'] =="SI") { $nanana.="Flexibilidad<br>"; }       
 if($listadoreq[$i]['riesgo'] =="SI") { $nanana.="Identificación Y Control Del Riesgo<br>"; }
 if($listadoreq[$i]['innovacion'] =="SI") { $nanana.="Innovación Y Creatividad<br>"; } 
 if($listadoreq[$i]['ambiente'] =="SI") { $nanana.="Seguridad, Salud Ocupacional Y Medio Ambiente<br>"; }
 if($listadoreq[$i]['observacion'] =="SI") { $nanana.="Observación Y Atención Al Detalle<br>"; }     
 if($listadoreq[$i]['resultados'] =="SI") { $nanana.="Orientación A Los Resultados<br>"; } 
 if($listadoreq[$i]['cliente'] =="SI") { $nanana.="Orientación Al Cliente Interno Y Externo<br>"; }       
 if($listadoreq[$i]['comunicacion'] =="SI") { $nanana.="Comunicación<br>"; } 
 if($listadoreq[$i]['tecnologica'] =="SI") { $nanana.="Orientación Tecnológica<br>"; }      
 if($listadoreq[$i]['planeacion'] =="SI") { $nanana.="Planeación<br>"; }  
 if($listadoreq[$i]['relaciones'] =="SI") { $nanana.="Relaciones Interpersonales<br>"; }
 if($listadoreq[$i]['liderazgo'] =="SI") { $nanana.="Liderazgo<br>"; } 
 if($listadoreq[$i]['sensibilidad'] =="SI") { $nanana.="Sensibilidad Organizacional<br>"; }   
 if($listadoreq[$i]['conflictos'] =="SI") { $nanana.="Solución Y Manejo De Conflictos<br>"; }   
 if($listadoreq[$i]['tolerancia'] =="SI") { $nanana.="Tolerancia Al Trabajo Bajo Presión<br>"; } 
 if($listadoreq[$i]['equipo'] =="SI") { $nanana.="Trabajo En Equipo<br>"; }  
 if($listadoreq[$i]['habilidades'] =="SI") { $nanana.="Otros habilidades y competencias<br>";  } 

	$modaleditnota ='<div class="modal fade" id="exampleModalnotaseg'.$id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Detalle Requisicion</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
		<div class="form-group row">
		  <label for="descgeneral" class="col-4 col-form-label">Tipo Requisicion</label> 
		  <div class="col-8">
			'.$tiporeq.'
		  </div>
		</div>

		<div class="form-group row">
		  <label for="descgeneral" class="col-4 col-form-label">Cargo</label> 
		  <div class="col-8">
			'.$cargo.'
		  </div>
		</div>

		<div class="form-group row">
		  <label for="descgeneral" class="col-4 col-form-label">Edad Minima</label> 
		  <div class="col-8">
			'.$edadminima.'
		  </div>
		</div>

		<div class="form-group row">
		  <label for="descgeneral" class="col-4 col-form-label">Edad Maxima</label> 
		  <div class="col-8">
			'.$edadmaxima.'
		  </div>
		</div>

		<div class="form-group row">
		  <label for="descgeneral" class="col-4 col-form-label">Edad Indiferente</label> 
		  <div class="col-8">
		  '.$listadoreq[$i]['edadindiferente'].'
		  </div>
		</div>

		<div class="form-group row">
		  <label for="descgeneral" class="col-4 col-form-label">Tipo Contrato</label> 
		  <div class="col-8">
			'.$tipocontrato.'
		  </div>
		</div>

		<div class="form-group row">
		  <label for="descgeneral" class="col-4 col-form-label">Estado Civil</label> 
		  <div class="col-8">
			'.$listadoreq[$i]['estado'].'
		  </div>
		</div>

		<div class="form-group row">
		  <label for="descgeneral" class="col-4 col-form-label">Genero</label> 
		  <div class="col-8">
		  '.$listadoreq[$i]['genero'].'
		  </div>
		</div>

		<div class="form-group row">
		  <label for="descgeneral" class="col-4 col-form-label">Cantidad Solicitados</label> 
		  <div class="col-8">
		  '.$listadoreq[$i]['cantidad'].'
		  </div>
		</div>

		<div class="form-group row">
		  <label for="descgeneral" class="col-4 col-form-label">Ciudad Laborar</label> 
		  <div class="col-8">
		  '.$listadoreq[$i]['ciudadlaboral'].'
		  </div>
		</div>

		<div class="form-group row">
		  <label for="descgeneral" class="col-4 col-form-label">Jornada Laboral</label> 
		  <div class="col-8">
		  '.$listadoreq[$i]['jornadalaboral'].'
		  </div>
		</div>
		<div class="col-8">
			<h6>Condiciones Salariales y Funciones</h6>
		</div>
		<div class="form-group row">
		  <label for="descgeneral" class="col-4 col-form-label">Salario Basico</label> 
		  <div class="col-8">
		  '.$listadoreq[$i]['salariobasico'].'
		  </div>
		</div>

		<div class="form-group row">
		  <label for="descgeneral" class="col-4 col-form-label">Comisiones</label> 
		  <div class="col-8">
		  '.$listadoreq[$i]['comisiones'].'
		  </div>
		</div>
		<div class="form-group row">
		  <label for="descgeneral" class="col-4 col-form-label">Rodamiento</label> 
		  <div class="col-8">
		  '.$listadoreq[$i]['rodamiento'].'
		  </div>
		</div>
		<div class="form-group row">
		  <label for="descgeneral" class="col-4 col-form-label">Bonificacion</label> 
		  <div class="col-8">
		  '.$listadoreq[$i]['bonificacion'].'
		  </div>
		</div>
		<div class="form-group row">
		  <label for="descgeneral" class="col-4 col-form-label">Otra Ingreso</label> 
		  <div class="col-8">
		  '.$listadoreq[$i]['otraingreso'].'
		  </div>
		</div>
		<div class="form-group row">
		  <label for="descgeneral" class="col-4 col-form-label">Funciones</label> 
		  <div class="col-8">
		  '.$listadoreq[$i]['funciones'].'
		  </div>
		</div>

		<div class="col-8">
			<h6>Responsabilidades</h6>
		</div>
		
		<div class="form-group row">
			<label for="descgeneral" class="col-4 col-form-label">Personas a Cargo</label> 
			<div class="col-8">
			'.$listadoreq[$i]['acargo'].'
			</div>
		</div>
		<div class="form-group row">
			<label for="descgeneral" class="col-4 col-form-label">Dinero</label> 
			<div class="col-8">
			'.$listadoreq[$i]['dinero'].'
			</div>
		</div>
		<div class="form-group row">
			<label for="descgeneral" class="col-4 col-form-label">Equipos</label> 
			<div class="col-8">
			'.$listadoreq[$i]['equipos'].'
			</div>
		</div>
		<div class="form-group row">
			<label for="descgeneral" class="col-4 col-form-label">Materiales y Mercancía</label> 
			<div class="col-8">
			'.$listadoreq[$i]['materiales'].'
			</div>
		</div>
		<div class="form-group row">
			<label for="descgeneral" class="col-4 col-form-label">Herramientas</label> 
			<div class="col-8">
			'.$listadoreq[$i]['herramientas'].'
			</div>
		</div>

		
		<div class="form-group row">
			<label for="descgeneral" class="col-4 col-form-label">Documentos</label> 
			<div class="col-8">
			'.$listadoreq[$i]['documentos'].'
			</div>
		</div>

		<div class="form-group row">
			<label for="descgeneral" class="col-4 col-form-label">Información Confidencial</label> 
			<div class="col-8">
			'.$listadoreq[$i]['confidencial'].'
			</div>
		</div>

		<div class="form-group row">
			<label for="descgeneral" class="col-4 col-form-label">Valores</label> 
			<div class="col-8">
			'.$listadoreq[$i]['valores'].'
			</div>
		</div>

		<div class="form-group row">
			<label for="descgeneral" class="col-4 col-form-label">Otras Responsabilidades</label> 
			<div class="col-8">
			'.$listadoreq[$i]['otrosresponsabilidades'].'
			</div>
		</div>

		<div class="col-8">
			<h6>Formacion y Experiencia</h6>
		</div>
		<div class="form-group row">
		  <label for="descgeneral" class="col-4 col-form-label">Educacion Primaria</label> 
		  <div class="col-8">
		  '.$listadoreq[$i]['primaria'].'
		  </div>
		</div>


		<div class="form-group row">
		  <label for="descgeneral" class="col-4 col-form-label">Educacion Secundaria</label> 
		  <div class="col-8">
		  '.$listadoreq[$i]['secundaria'].'
		  </div>
		</div>



		<div class="form-group row">
		  <label for="descgeneral" class="col-4 col-form-label">Educacion Tecnica</label> 
		  <div class="col-8">
		  '.$listadoreq[$i]['tecnico'].'
		  </div>
		</div>


		<div class="form-group row">
		  <label for="descgeneral" class="col-4 col-form-label">Educacion Tecnologica</label> 
		  <div class="col-8">
		  '.$listadoreq[$i]['tecnologo'].'
		  </div>
		</div>


		<div class="form-group row">
		  <label for="descgeneral" class="col-4 col-form-label">Educacion Profesional</label> 
		  <div class="col-8">
		  '.$listadoreq[$i]['profesional'].'
		  </div>
		</div>
		

		<div class="form-group row">
		  <label for="descgeneral" class="col-4 col-form-label">Experiencia Minima</label> 
		  <div class="col-8">
		  '.$listadoreq[$i]['minimaexpe'].'
		  </div>
		</div>
		
		<div class="form-group row">
		<label for="descgeneral" class="col-4 col-form-label">Habilidades y Competencias</label> 
		<div class="col-8">	
		'.$nanana.'
		</div>
		</div>
		

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