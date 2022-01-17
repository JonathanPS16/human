<?php
  $datos = explode("|",$tituloaaa);

?>

<h5>Solicitud #<?=$_GET['id']." ".$datos[0];?></h5>
<br>
<?php 

if($datos[1]!="D"){
?>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Agregar Candidato
</button>
<?php 
}
?>
<br>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Candidato</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<form action="home.php?ctr=requisicion&acc=guardarNuevoCandidato" method="post">
			<input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>">
      <input type="hidden" name="idcand" id="idcand" value="0">
	  <div class="form-group row">
	    <label class="col-4 col-form-label" for="nombre">Nombre Candidato</label> 
	    <div class="col-8">
	      <input id="nombre" name="nombre" placeholder="Nombre Candidato" type="text" class="form-control" required="required">
	    </div>
	  </div>
	  <div class="form-group row">
	    <label for="cedula" class="col-4 col-form-label">Cedula</label> 
	    <div class="col-8">
	      <input id="cedula" name="cedula" placeholder="Cedula" type="number" class="form-control" required="required">
	    </div>
	  </div>
	  <div class="form-group row">
	    <label for="telefono" class="col-4 col-form-label">Telefono</label> 
	    <div class="col-8">
	      <input id="telefono" name="telefono" placeholder="Telefono" type="number" class="form-control" required="required">
	    </div>
	  </div>
	  <div class="form-group row">
	    <label for="correo" class="col-4 col-form-label">Correo</label> 
	    <div class="col-8">
	      <input id="correo" name="correo" placeholder="Correo" type="email" class="form-control" required="required">
	    </div>
	  </div>
    <div class="form-group row">
	    <label for="correo" class="col-4 col-form-label">Direccion</label> 
	    <div class="col-8">
	      <input id="direccioncan" name="direccioncan" placeholder="Direccion Vivienda" type="text" class="form-control" required="required">
	    </div>
	  </div>
    <div class="form-group row">
	    <label for="correo" class="col-4 col-form-label">Barrio</label> 
	    <div class="col-8">
	      <input id="barriocan" name="barriocan" placeholder="Barrio Vivienda" type="text" class="form-control" required="required">
	    </div>
	  </div> 
    <div class="form-group row">
	    <label for="correo" class="col-4 col-form-label">Ciudad</label> 
	    <div class="col-8">
	      <input id="ciudad" name="ciudad" placeholder="Ciudad Vivienda" type="text" class="form-control" required="required">
	    </div>
	  </div> 
	  <div class="form-group row">
	    <div class="offset-4 col-8">
	      <button name="submit" type="submit" class="btn btn-primary">Guardar</button>
	    </div>
	  </div>
</form>
<?php
$labo  ="<option value ='LP'>-Laboratorio Propio-</option>"; 
for($i=0; $i<count($laboratorios);$i++){
$labo.='<option value="'.$laboratorios[$i]['id'].'">'.$laboratorios[$i]['nombrelaboratorio'].' ('.$laboratorios[$i]['ciudad'].')</option>';
}

?>
        
      </div>
      
    </div>
  </div>
</div>
<br>
<table class="table table-striped" id="myTable">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nombre Candidato</th>
      <th>Numero Contacto</th>
      <th>Documento</th>
      <th>Correo</th>
      <th>Hoja de Vida</th>
      <th>Prueba Psicotecnica</th>
      <th>Adjunto Extra</th>
      <th>Entrevista</th>    
      <th>Orden de Ingreso</th>
      <th>Editar</th>
      <th>Estado Candidato</th>
      <th>Documentos Enviados</th>
      <th>Referenciación</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
<?php 
for($i=0; $i<count($listadoreq);$i++){
    $jaja = $i+1;
    $conteoreq = 0;

    //$conteoreq++;
    $idper=$listadoreq[$i]['id'];
    $idreq=$listadoreq[$i]['id_requisision'];
    $nombre=$listadoreq[$i]['nombre'];
    $cedula=$listadoreq[$i]['cedula'];
    $telefono=$listadoreq[$i]['telefono'];
    $correo=$listadoreq[$i]['correo'];
    $archivoprueba=$listadoreq[$i]['archivoprueba'];
    $enviocorreo=$listadoreq[$i]['enviocorreo'];
    $hojavida=$listadoreq[$i]['hojavida']; 
    $conteoentre=$listadoreq[$i]['conteoentre'];
    $estadopresen=$listadoreq[$i]['estado'];
    $fechacitan=$listadoreq[$i]['fechacita'];
    $motivorechazo=$listadoreq[$i]['motivorechazo'];  
    $lugar = $listadoreq[$i]['lugar'];
    $salariorh =$listadoreq[$i]['salariorh']; 
    $ordeningreso=$listadoreq[$i]['ordeningreso'];
    $conceptofinal=$listadoreq[$i]['conceptofinal']; 
    $observacionesfami=$listadoreq[$i]['observacionesfami']; 
    $observacioneslabo=$listadoreq[$i]['observacioneslabo'];
    $observacionesestu=$listadoreq[$i]['observacionesestu']; 
    $direccioncan=$listadoreq[$i]['direccioncan']; 
    $barriocan=$listadoreq[$i]['barriocan']; 
    $ciudadcan=$listadoreq[$i]['ciudad']; 
    $archivootro=$listadoreq[$i]['archivootro']; 
    $observacionrechazo=$listadoreq[$i]['observacionrechazo'];
    $estadoreal=$listadoreq[$i]['estadoreal']; 

    $referenciacion ="";

    $modalbotonedit ='<div class="modal fade" id="exampleModaledit'.$idper.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="home.php?ctr=requisicion&acc=guardarNuevoCandidatoe" method="post">
        <input type="hidden" name="idcande" id="idcande" value="'.$idper.'">
        <input type="hidden" name="ide" id="ide" value="'.$_GET['id'].'">
      <div class="form-group row">
        <label class="col-4 col-form-label" for="nombre">Nombre Candidato</label> 
        <div class="col-8">
          <input id="nombree" name="nombree" placeholder="Nombre Candidato" type="text" class="form-control" required="required" value ="'.$nombre.'">
        </div>
      </div>
      <div class="form-group row">
        <label for="cedula" class="col-4 col-form-label">Cedula</label> 
        <div class="col-8">
          <input id="cedulae" name="cedulae" placeholder="Cedula" type="number" class="form-control" required="required" value ="'.$cedula.'">
        </div>
      </div>
      <div class="form-group row">
        <label for="telefono" class="col-4 col-form-label">Telefono</label> 
        <div class="col-8">
          <input id="telefonoe" name="telefonoe" placeholder="Telefono" type="number" class="form-control" required="required" value ="'.$telefono.'">
        </div>
      </div>
      <div class="form-group row">
        <label for="correo" class="col-4 col-form-label">Correo</label> 
        <div class="col-8">
          <input id="correoe" name="correoe" placeholder="Correo" type="email" class="form-control" required="required" value ="'.$correo.'">
        </div>
      </div>
      <div class="form-group row">
        <label for="correo" class="col-4 col-form-label">Direccion</label> 
        <div class="col-8">
          <input id="direccioncane" name="direccioncane" placeholder="Direccion Vivienda" type="text" class="form-control" required="required" value ="'.$direccioncan.'">
        </div>
      </div>
      <div class="form-group row">
        <label for="correo" class="col-4 col-form-label">Barrio</label> 
        <div class="col-8">
          <input id="barriocane" name="barriocane" placeholder="Barrio Vivienda" type="text" class="form-control" required="required" value ="'.$barriocan.'">
        </div>
      </div> 
      <div class="form-group row">
	    <label for="correo" class="col-4 col-form-label">Ciudad</label> 
	    <div class="col-8">
	      <input id="ciudade" name="ciudade" placeholder="Ciudad Vivienda" type="text" class="form-control" required="required" value ="'.$ciudadcan.'">
	    </div>
	  </div> 
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
      $botonedit ='<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModaledit'.$idper.'">
    Editar
  </button>';
     

  if($conteoentre>0){

    $conteoreq++;
  }
    $minfor="";
    $laboges = "<option value='N'>NO</option><option value='S'>SI</option>";
    for($iaa=0; $iaa<count($laboratoriosexamenes);$iaa++){
      $minfor.='      
      <div class="form-group row">
        <label class="col-4 col-form-label" for="checkbox'.$laboratoriosexamenes[$iaa]['id_examen'].'">'.$laboratoriosexamenes[$iaa]['nombreexamen'].'</label> 
        <div class="col-8">
        <select id="exalaboratorio'.$laboratoriosexamenes[$iaa]['id_examen'].'" name="exalaboratorio'.$laboratoriosexamenes[$iaa]['id_examen'].'" class="custom-select"  class="custom-select" required="required">
          '.$laboges.'
          </select>
        </div>
      </div>';



     // $labo.='<option value="'.$laboratorios[$ia]['id'].'">'.$laboratorios[$ia]['nombrelaboratorio'].' ('.$laboratorios[$ia]['ciudad'].')</option>';
      }

    $labola = "<option value='N'>NO</option><option value='S'>SI</option>";

    $modalbotonfinal ='<div class="modal fade" id="exampleModalfinal'.$idper.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Completar Orden</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" action="home.php?ctr=requisicion&acc=ajustarorden" method="post" enctype="multipart/form-data">
          <div class="form-group row">
            <label for="salario" class="col-4 col-form-label">Salario</label> 
            <div class="col-8">
              <input id="salario" name="salario" type="text" class="form-control" required="required">
            </div>
          </div>
          <div class="form-group row">
            <label for="tasa" class="col-4 col-form-label">Tasa</label> 
            <div class="col-8">
              <select id="tasa" name="tasa" required="required" class="custom-select">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
            </div>
          </div> 
          <div class="form-group row">
            <label for="fechainicio" class="col-4 col-form-label">Fecha Inicio</label> 
            <div class="col-8">
              <input id="fechainicio" name="fechainicio" placeholder="fechainicio" type="date" class="form-control" required="required">
            </div>
          </div>
          <div class="form-group row">
            <label for="direccion" class="col-4 col-form-label">Direccion</label> 
            <div class="col-8">
              <input id="direccion" name="direccion" placeholder="Direccion" type="text" class="form-control" required="required">
            </div>
          </div>
          <div class="form-group row">
            <label for="presentarse" class="col-4 col-form-label">Presentarse a</label> 
            <div class="col-8">
              <input id="presentarse" name="presentarse" placeholder="Presentarse a " type="text" class="form-control" required="required">
            </div>
          </div> 
        <div class="form-group row">
          <div class="offset-4 col-8">
            <button name="submit" type="submit" class="btn btn-primary">Guardar</button>
          </div>
        </div>
        <input id="id" name="id" type="hidden" value="'.$idper.'">
        <input id="idreq" name="idreq" type="hidden" value="'.$idreq.'">
        <input id="orden" name="orden" type="hidden" value="'.$ordeningreso.'">
  
      </form>
  
          
        </div>
        
      </div>
    </div>
  </div>
  ';
      $botonfinal ='<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalfinal'.$idper.'">
      Completar Orden
  </button>';	
  $botonfinal = "En Espera Complemento de Orden";

    $modalbotonexamenes ='<div class="modal fade" id="exampleModalexamenes'.$idper.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Examenes Medicos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="home.php?ctr=requisicion&acc=ordenmedica" method="post" enctype="multipart/form-data">
        <div class="form-group row">
        <label class="col-4 col-form-label" for="laboratorio">Laboratorio</label> 
        <div class="col-8">
          <select id="laboratorio" name="laboratorio" class="custom-select" required="required">
          '.$labo.'
          </select>
          
        </div>
      </div>
    '.$minfor.'
      <div class="form-group row">
        <div class="offset-4 col-8">
          <button name="submit" type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </div>
      <input id="id" name="id" type="hidden" value="'.$idper.'">
      <input id="idreq" name="idreq" type="hidden" value="'.$idreq.'">

		</form>

        
      </div>
      
    </div>
  </div>
</div>
';
    $botonexamenes ='<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalexamenes'.$idper.'">
    Examenes Medicos
</button>';	

    $modalbotonarchivos ='<div class="modal fade" id="exampleModalarchivos'.$idper.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Documentos Diligenciados</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" action="home.php?ctr=requisicion&acc=jajajajaj" method="post" enctype="multipart/form-data">
          <fieldset>
          <!-- File Button --> 
          <div class="form-group">
            <label class="col-md-4 control-label" for="hv">Hoja de Vida  Max(2 Mb)</label>
            <div class="col-md-4">
              <input id="hv" name="hv" class="input-file" type="file">
            </div>
          </div>

          <!-- File Button --> 
          <div class="form-group">
            <label class="col-md-4 control-label" for="orden">Orden Ingreso  Max(2 Mb)</label>
            <div class="col-md-4">
              <input id="orden" name="orden" class="input-file" type="file">
            </div>
          </div>

          <!-- File Button --> 
          <div class="form-group">
            <label class="col-md-4 control-label" for="documentacion">Documentacion  Max(2 Mb)</label>
            <div class="col-md-4">
              <input id="documentacion" name="documentacion" class="input-file" type="file">
            </div>
          </div>

          <!-- Button -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="guardar"></label>
            <div class="col-md-4">
              <button id="guardar" name="guardar" class="btn btn-primary">Finalizar</button>
            </div>
          </div>

          </fieldset>
          </form>
  
          
        </div>
        
      </div>
    </div>
  </div>
  ';
      $botonarchivos ='<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalarchivos'.$idper.'">
    Adjuntar Documentos
  </button>';	
  $modalbotonhoja ='<div class="modal fade" id="exampleModalhv'.$idper.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">CARGA HOJA DE VIDA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="home.php?ctr=requisicion&acc=guardarhv" method="post" enctype="multipart/form-data">
		<fieldset>
		<!-- File Button --> 
		<div class="form-group">
		  <label class="col-md-4 control-label" for="filebutton"> Max(2 Mb)</label>
		  <div class="col-md-4">
      <input id="id" name="id" type="hidden" value="'.$idper.'">
      <input id="idreq" name="idreq" type="hidden" value="'.$idreq.'">
		    <input id="filebutton" name="filebutton" class="input-file" type="file">
		  </div>
		</div>
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
    if ($hojavida==""){
    $botonhoja ='<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalhv'.$idper.'">
  Adjuntar HV
</button>';	
    } else {
      $conteoreq++;
      $botonhoja ='<a href="archivosgenerales/'.$hojavida.'" target="_black" class="btn btn-primary" >Descargar</a><br><br>';
      $botonhoja .='<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalhv'.$idper.'">
  Volver a Cargar
</button>';	
    }
   
    $modalboton ='<div class="modal fade" id="exampleModal'.$idper.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">CARGA DE PRUEBA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="home.php?ctr=requisicion&acc=guardarPrueba" method="post" enctype="multipart/form-data">
		<fieldset>
		<!-- File Button --> 
		<div class="form-group">
		  <label class="col-md-4 control-label" for="filebutton"> Max(2 Mb)</label>
		  <div class="col-md-4">
      <input id="id" name="id" type="hidden" value="'.$idper.'">
      <input id="idreq" name="idreq" type="hidden" value="'.$idreq.'">
		    <input id="filebutton" name="filebutton" class="input-file" type="file">
		  </div>
		</div>
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
$amarillo = "warning";
if($archivoprueba!="")
{
  $amarillo = "primary";
}
    $boton ='<button type="button" class="btn btn-'.$amarillo.'" data-toggle="modal" data-target="#exampleModal'.$idper.'">
  Adjuntar Prueba
</button>';	
if($archivoprueba!="") {
  $conteoreq++;
  $boton ='<a href="archivosgenerales/'.$archivoprueba.'" target="_black" class="btn btn-primary" >Descargar</a>';
  $boton .='<br><br><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal'.$idper.'">Volver a Cargar</button>';
  	

} 




$cantidad="";

$cantidadestudios="";

$datos = array("secundaria","tecnico","tecnologo","universitario","postgrado","otros");

foreach ($datos as $estado) {
  //echo $estado."<br>";
  $campo = "'".$estado."'";
  $cantidadestudios.='
  <p onclick="changeestudio('.$campo.')"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg> '.ucfirst($estado).'</p>
  <div id="cona'.$estado.'" class="cona" style="display:none"><h5>'.ucfirst($estado).'</h5><div class="form-group row">
    <label for="'.$estado.'" class="col-4 col-form-label">Institución Educativa</label> 
    <div class="col-8">
      <input id="estudio['.$estado.'][\'institucion\']" name="estudio['.$estado.'][\'institucion\']" placeholder="Institución Educativa" type="text" class="form-control" value="'.$listadoreq[$i]['institucion'.$estado].'">
    </div>
  </div>
  <div class="form-group row">
    <label for="'.$estado.'" class="col-4 col-form-label">Titulo Obtenido</label> 
    <div class="col-8">
      <input id="estudio['.$estado.'][\'titulo\']" name="estudio['.$estado.'][\'titulo\']" placeholder="Titulo Obtenido" type="text" class="form-control" value="'.$listadoreq[$i]['titulo'.$estado].'">
    </div>
  </div>
  <div class="form-group row">
    <label for="'.$estado.'" class="col-4 col-form-label">Fecha Inicio</label> 
    <div class="col-8">
      <input id="estudio['.$estado.'][\'inicio\']" name="estudio['.$estado.'][\'inicio\']" placeholder="Fecha Inicio" type="text" class="form-control" value="'.$listadoreq[$i]['inicio'.$estado].'">
    </div>
  </div>
  <div class="form-group row">
    <label for="'.$estado.'" class="col-4 col-form-label">Año Terminación</label> 
    <div class="col-8">
      <input id="estudio['.$estado.'][\'terminacion\']" name="estudio['.$estado.'][\'terminacion\']" placeholder="Año Terminación" type="text" class="form-control" value="'.$listadoreq[$i]['terminacion'.$estado].'">
    </div>
  </div></div>';
	# code...
}

for($j=0; $j<5;$j++){

    $cantidad .= '<p onclick="change('.$j.',\'parentesco\','.$idper.')"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg> Pariente '.($j+1).'</p><div class="cona" id="parentesco'.$j.$idper.'" style="display:none"><h5>Familiar '.($j+1).'</h5><br><div class="form-group row">

    <label for="parentesco['.$j.'][\'nombre\']" class="col-4 col-form-label">Nombre</label> 
    <div class="col-8">
      <input id="parentesco['.$j.'][\'nombre\']" name="parentesco['.$j.'][\'nombre\']" placeholder="Nombre de Familiar" type="text" class="form-control" value ="'.$listadoreq[$i]['nombre'.$j].'">
    </div>
  </div>
  <div class="form-group row">
    <label for="parentesco['.$j.'][\'parentesco\']" class="col-4 col-form-label">Parentesco</label> 
    <div class="col-8">
      <input id="parentesco['.$j.'][\'parentesco\']" name="parentesco['.$j.'][\'parentesco\']" placeholder="Parentesco" type="text" class="form-control" value ="'.$listadoreq[$i]['parentesco'.$j].'">
    </div>
  </div>
  <div class="form-group row">
    <label for="parentesco['.$j.'][\'fecha\']" class="col-4 col-form-label">Fecha Nacimiento</label> 
    <div class="col-8">
      <input id="parentesco['.$j.'][\'fecha\']" name="parentesco['.$j.'][\'fecha\']" placeholder="Fecha Nacimiento" type="date" class="form-control" value ="'.$listadoreq[$i]['fecha'.$j].'">
    </div>
  </div>
  <div class="form-group row">
    <label for="parentesco['.$j.'][\'actividad\']" class="col-4 col-form-label">Actividad Actual</label> 
    <div class="col-8">
      <input id="parentesco['.$j.'][\'actividad\']" name="parentesco['.$j.'][\'actividad\']" placeholder="Actividad Actual" type="text" class="form-control" value ="'.$listadoreq[$i]['actividad'.$j].'">
    </div>
   
  </div></div>';
}


$cantidadexplab="";

for($j=0; $j<5;$j++){

	$cantidadexplab.='<p onclick="change('.$j.',\'experiencia\','.$idper.')"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg> Experiencia '.($j+1).'</p><div class="cona" id ="experiencia'.$j.$idper.'" style="display:none"><h5>Experiencia '.($j+1).'</h5><br><div class="form-group row">
    <label for="experiencia['.$j.'][\'empresa\']" class="col-4 col-form-label">Empresa</label> 
    <div class="col-8">
      <input id="experiencia['.$j.'][\'empresa\']" name="experiencia['.$j.'][\'empresa\']" placeholder="Empresa" type="text" class="form-control" value ="'.$listadoreq[$i]['empresa'.$j].'">
    </div>
  </div>
  <div class="form-group row">
    <label for="experiencia['.$j.'][\'cargo\']" class="col-4 col-form-label">Cargo</label> 
    <div class="col-8">
      <input id="experiencia['.$j.'][\'cargo\']" name="experiencia['.$j.'][\'cargo\']" placeholder="Cargo " type="text" class="form-control" value ="'.$listadoreq[$i]['cargo'.$j].'">
    </div>
  </div>
  <div class="form-group row">
  <label for="experiencia['.$j.'][\'funciones\']" class="col-4 col-form-label">Funciones</label> 
  <div class="col-8">
    <textarea id="experiencia['.$j.'][\'funciones\']" name="experiencia['.$j.'][\'funciones\']" cols="40" rows="5" class="form-control">'.$listadoreq[$i]['funciones'.$j].'</textarea>
  </div>
</div>

  <div class="form-group row">
    <label for="experiencia['.$j.'][\'fechaingreso\']" class="col-4 col-form-label">Fecha Ingreso</label> 
    <div class="col-8">
      <input id="experiencia['.$j.'][\'fechaingreso\']" name="experiencia['.$j.'][\'fechaingreso\']" placeholder="Salario " type="date" class="form-control" value ="'.$listadoreq[$i]['fechaingreso'.$j].'">
    </div>
  </div>
  <div class="form-group row">
    <label for="experiencia['.$j.'][\'fecharetiro\']" class="col-4 col-form-label">Fecha Retiro</label> 
    <div class="col-8">
      <input id="experiencia['.$j.'][\'fecharetiro\']" name="experiencia['.$j.'][\'fecharetiro\']" placeholder="Salario " type="date" class="form-control" value ="'.$listadoreq[$i]['fecharetiro'.$j].'">
    </div>
  </div>
  <div class="form-group row">
    <label for="experiencia['.$j.'][\'tiempo\']" class="col-4 col-form-label">Tiempo Servicio</label> 
    <div class="col-8">
      <input id="experiencia['.$j.'][\'tiempo\']" name="experiencia['.$j.'][\'tiempo\']" placeholder="Tiempo Servicio" type="text" class="form-control" value ="'.$listadoreq[$i]['tiempo'.$j].'">
    </div>
  </div>
  
  <div class="form-group row">
    <label for="experiencia['.$j.'][\'salario\']" class="col-4 col-form-label">Salario</label> 
    <div class="col-8">
      <input id="experiencia['.$j.'][\'salario\']" name="experiencia['.$j.'][\'salario\']" placeholder="Salario " type="text" class="form-control" value ="'.$listadoreq[$i]['salario'.$j].'">
    </div>
  </div>
  <div class="form-group row">
    <label for="experiencia['.$j.'][\'motivo\']" class="col-4 col-form-label">Motivo Retiro</label> 
    <div class="col-8">
      <input id="experiencia['.$j.'][\'motivo\']" name="experiencia['.$j.'][\'motivo\']" placeholder="Motivo Retiro " type="text" class="form-control" value ="'.$listadoreq[$i]['motivo'.$j].'">
    </div>
  </div>
  </div> ';

}

    $modalbotonentre ='<div class="modal fade" id="exampleModalentre'.$idper.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="min-width: 50% !important" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ENTREVISTA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <img src="img/logo_negro.jpg" style="display: block;
      margin: auto;width: 35%;">
<br>
        <form class="form-horizontal" action="home.php?ctr=requisicion&acc=guardarentrevista" method="post" enctype="multipart/form-data">
		<fieldset>
		<div id ="listadoparientes">
		<center><h4>Información Grupo Familiar <br>(Personas con las que vive )</h4><hr></center>
    '.$cantidad.'
    <div class="form-group row">
      <label for="observacionesfami" class="col-4 col-form-label">Observaciones Familiares</label> 
      <div class="col-8">
        <textarea id="observacionesfami" name="observacionesfami" cols="40" rows="5" class="form-control">'.$observacionesfami.'</textarea>
      </div>
    </div> 
      </div>
       
  		<div id ="listadoparientes">
		<center><h4>Información  Nivel de Estudios</h4><hr></center>
    '.$cantidadestudios.'
    
    <div class="form-group row">
      <label for="observacionesestu" class="col-4 col-form-label">Observaciones Estudios</label> 
      <div class="col-8">
        <textarea id="observacionesestu" name="observacionesestu" cols="40" rows="5" class="form-control">'.$observacionesestu.'</textarea>
      </div>
    </div> 
  		</div>

  		<div id ="listadoparientes">
		<center><h4>Experiencia Laboral</h4><hr></center>
    '.$cantidadexplab.'
    <div class="form-group row">
      <label for="observacioneslabo" class="col-4 col-form-label">Observaciones Laborales</label> 
      <div class="col-8">
        <textarea id="observacioneslabo" name="observacioneslabo" cols="40" rows="5" class="form-control">'.$observacioneslabo.'</textarea>
      </div>
    </div> 
      </div>
      <div class="form-group row">
    <label for="conceptofinal" class="col-4 col-form-label">Concepto Final Psicóloga </label> 
    <div class="col-8">
      <textarea id="conceptofinal" name="conceptofinal" cols="40" rows="5" class="form-control">'.$conceptofinal.'</textarea>
    </div>
  </div>
      
  <div class="form-group row">
    <div class="offset-4 col-8">
    <input type="hidden" name="idreq" id="idreq" value="'.$idreq.'">
    <input type="hidden" name="idcan" id="idcan" value="'.$idper.'">
      <button name="submit" type="submit" class="btn btn-primary">Guardar Entrevista</button>
    </div>

  </div>
  
  </div>
		</form>

        
      </div>
      
    
  </div>
</div>
';
$styleentre= "btn btn-primary";
if($conteoentre==0){
  $styleentre= "btn btn-warning";
}
$botonentre ='<button type="button" class="'.$styleentre.'" data-toggle="modal" data-target="#exampleModalentre'.$idper.'">Entrevista
</button>';	
/*if ($conteoentre>0){
  $botonentre ='Entrevista Realizada';	
  $conteoreq++;
}*/


$botnenvi = "Le falta <strong>".(3-$conteoreq)."</strong> Paso(s) para Enviar Candidato";
$conteoreq=3;
if($fechacitan !="" && $estadopresen=="P")
{
  $botnenvi = "Citado a Entrevista<br><strong>
  $fechacitan
  </strong>";
} else if($motivorechazo!="" && $estadopresen=="R"){
  $botonedit ="";
  $botnenvi = "Rechazado <br><strong>
  $motivorechazo:<br>$observacionrechazo
  </strong>";

} else if($estadopresen=="EM" && $lugar!="" && $salariorh!="") {
  $botnenvi = "<a class='btn btn-success' href='home.php?ctr=requisicion&acc=enviardocumentacion&idper=".$idper."&idreq=".$idreq."'>Enviar Documentos</a>";
} else if($estadopresen=="A" && $salariorh==""){
  $botnenvi = $modalbotonfinal.$botonfinal;
} else if($estadopresen=="EM"){
  $botonedit ="";
  $botnenvi = $modalbotonexamenes.$botonexamenes; 
} else if ($estadopresen=="F")
{

  //$botnenvi = $modalbotonarchivos.$botonarchivos;
  
  
  
  
  
  
  $botnenvi = "Proceso Terminado";
if($listadoreq[$i]['formatorefer']==""){
  $referenciacion.='<br><div class="modal fade" id="exampleModalextraref'.$idper.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Referenciación</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="home.php?ctr=requisicion&acc=guardarreferenciacion" method="post" enctype="multipart/form-data">
		<fieldset>
		<input id="idper" name="idper" type="hidden" value="'.$idper.'">
      <input id="idreq" name="idreq" type="hidden" value="'.$idreq.'">
    <div class="form-group row">
    <label for="nombreempresa" class="col-4 col-form-label">Nombre de la Empresa</label> 
    <div class="col-8">
      <input id="nombreempresa" name="nombreempresa" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="nombrereferencia" class="col-4 col-form-label">Nombre quien da la Referencia</label> 
    <div class="col-8">
      <input id="nombrereferencia" name="nombrereferencia" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="cargo" class="col-4 col-form-label">Cargo</label> 
    <div class="col-8">
      <input id="cargo" name="cargo" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="telefono" class="col-4 col-form-label">Teléfono o Celular</label> 
    <div class="col-8">
      <input id="telefono" name="telefono" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="ultimocargo" class="col-4 col-form-label">Ultimo Cargo Desempeñado</label> 
    <div class="col-8">
      <input id="ultimocargo" name="ultimocargo" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="tiempodesemp" class="col-4 col-form-label">Tiempo  de desempeño en el cargo</label> 
    <div class="col-8">
      <input id="tiempodesemp" name="tiempodesemp" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="motivoretiro" class="col-4 col-form-label">Motivo del Retiro</label> 
    <div class="col-8">
      <input id="motivoretiro" name="motivoretiro" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="conceptodesempeno" class="col-4 col-form-label">Concepto Desempeño</label> 
    <div class="col-8">
      <input id="conceptodesempeno" name="conceptodesempeno" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="fortalezas" class="col-4 col-form-label">Fortalezas</label> 
    <div class="col-8">
      <input id="fortalezas" name="fortalezas" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="aspectosmejorar" class="col-4 col-form-label">Aspecto a Mejorar</label> 
    <div class="col-8">
      <input id="aspectosmejorar" name="aspectosmejorar" type="text" class="form-control" required="required">
    </div>
  </div>
  

  <div class="form-group row">
    <label for="resp" class="col-4 col-form-label">Personas a Cargo</label> 
    <div class="col-8">
      <select id="personascargo" name="personascargo" class="custom-select" required="required">
        <option value="No">No</option>
        <option value="Si">Si</option>
      </select>
    </div>
  </div> 

  <div class="form-group row">
    <label for="resp" class="col-4 col-form-label">Responsabilidad</label> 
    <div class="col-8">
      <select id="responsabilidad" name="responsabilidad" class="custom-select" required="required">
        <option value="">Seleccione</option>
        <option value="Excelente">Excelente</option>
        <option value="Bueno">Bueno</option>
        <option value="Regular">Regular</option>
        <option value="Deficiente">Deficiente</option> 
      </select>
    </div>
  </div> 

  <div class="form-group row">
    <label for="resp" class="col-4 col-form-label">Calidad de Trabajo</label> 
    <div class="col-8">
      <select id="calidad" name="calidad" class="custom-select" required="required">
        <option value="">Seleccione</option>
        <option value="Excelente">Excelente</option>
        <option value="Bueno">Bueno</option>
        <option value="Regular">Regular</option>
        <option value="Deficiente">Deficiente</option> 
      </select>
    </div>
  </div> 

  <div class="form-group row">
    <label for="resp" class="col-4 col-form-label">Manejo de Tiempo (Prioridades)</label> 
    <div class="col-8">
      <select id="manejot" name="manejot" class="custom-select" required="required">
        <option value="">Seleccione</option>
        <option value="Excelente">Excelente</option>
        <option value="Bueno">Bueno</option>
        <option value="Regular">Regular</option>
        <option value="Deficiente">Deficiente</option> 
      </select>
    </div>
  </div> 

  <div class="form-group row">
    <label for="resp" class="col-4 col-form-label">Toma de decisiones propias de su puesto de trabajo</label> 
    <div class="col-8">
      <select id="tomad" name="tomad" class="custom-select" required="required">
        <option value="">Seleccione</option>
        <option value="Excelente">Excelente</option>
        <option value="Bueno">Bueno</option>
        <option value="Regular">Regular</option>
        <option value="Deficiente">Deficiente</option> 
      </select>
    </div>
  </div> 

  <div class="form-group row">
    <label for="resp" class="col-4 col-form-label">Agilidad y precisión en sus funciones</label> 
    <div class="col-8">
      <select id="agilidad" name="agilidad" class="custom-select" required="required">
        <option value="">Seleccione</option>
        <option value="Excelente">Excelente</option>
        <option value="Bueno">Bueno</option>
        <option value="Regular">Regular</option>
        <option value="Deficiente">Deficiente</option> 
      </select>
    </div>
  </div> 

  <div class="form-group row">
    <label for="resp" class="col-4 col-form-label">Actitud de servicio</label> 
    <div class="col-8">
      <select id="actitudse" name="actitudse" class="custom-select" required="required">
        <option value="">Seleccione</option>
        <option value="Excelente">Excelente</option>
        <option value="Bueno">Bueno</option>
        <option value="Regular">Regular</option>
        <option value="Deficiente">Deficiente</option> 
      </select>
    </div>
  </div> 
  <div class="form-group row">
    <label for="resp" class="col-4 col-form-label">Manejo de conflictos</label> 
    <div class="col-8">
      <select id="manejoco" name="manejoco" class="custom-select" required="required">
        <option value="">Seleccione</option>
        <option value="Excelente">Excelente</option>
        <option value="Bueno">Bueno</option>
        <option value="Regular">Regular</option>
        <option value="Deficiente">Deficiente</option> 
      </select>
    </div>
  </div> 

  <div class="form-group row">
    <label for="resp" class="col-4 col-form-label">Adaptabilidad a diversos contextos</label> 
    <div class="col-8">
      <select id="adaptabilidad" name="adaptabilidad" class="custom-select" required="required">
        <option value="">Seleccione</option>
        <option value="Excelente">Excelente</option>
        <option value="Bueno">Bueno</option>
        <option value="Regular">Regular</option>
        <option value="Deficiente">Deficiente</option> 
      </select>
    </div>
  </div> 

  <div class="form-group row">
    <label for="resp" class="col-4 col-form-label">Relaciones con compañeros de trabajo</label> 
    <div class="col-8">
      <select id="relacionesct" name="relacionesct" class="custom-select" required="required">
        <option value="">Seleccione</option>
        <option value="Excelente">Excelente</option>
        <option value="Bueno">Bueno</option>
        <option value="Regular">Regular</option>
        <option value="Deficiente">Deficiente</option> 
      </select>
    </div>
  </div> 

  <div class="form-group row">
    <label for="resp" class="col-4 col-form-label">Relaciones con superiores</label> 
    <div class="col-8">
      <select id="relacionessuper" name="relacionessuper" class="custom-select" required="required">
        <option value="">Seleccione</option>
        <option value="Excelente">Excelente</option>
        <option value="Bueno">Bueno</option>
        <option value="Regular">Regular</option>
        <option value="Deficiente">Deficiente</option> 
      </select>
    </div>
  </div> 
  
  <div class="form-group row">
    <label for="observacionesgenerales" class="col-4 col-form-label">Observaciones Generales</label> 
    <div class="col-8">
      <textarea id="observacionesgenerales" name="observacionesgenerales" cols="40" rows="5" class="form-control" required="required"></textarea>
    </div>
  </div>
  <div class="form-group row">
    <label for="resp" class="col-4 col-form-label">Volvería a contratarlo</label> 
    <div class="col-8">
      <select id="volveriaa" name="volveriaa" class="custom-select" required="required">
        <option value="No">No</option>
        <option value="Si">Si</option>
      </select>
    </div>
  </div> 

  <div class="form-group row">
    <label for="porquecontra" class="col-4 col-form-label">Porque?</label> 
    <div class="col-8">
      <input id="porquecontra" name="porquecontra" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="resp" class="col-4 col-form-label">Recomienda Usted al Candidato</label> 
    <div class="col-8">
      <select id="lorecomienda" name="lorecomienda" class="custom-select" required="required">
        <option value="No">No</option>
        <option value="Si">Si</option>
      </select>
    </div>
  </div> 
  <div class="form-group row">
    <label for="porquelorecomienda" class="col-4 col-form-label">Porque?</label> 
    <div class="col-8">
      <input id="porquelorecomienda" name="porquelorecomienda" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="personareferenciacion" class="col-4 col-form-label">Persona que realiza la Referenciación</label> 
    <div class="col-8">
      <input id="personareferenciacion" name="personareferenciacion" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="cargoguar" class="col-4 col-form-label">Cargo</label> 
    <div class="col-8">
      <input id="cargoguar" name="cargoguar" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="fechareferenciacion" class="col-4 col-form-label">Fecha Referenciación</label> 
    <div class="col-8">
      <input id="fechareferenciacion" name="fechareferenciacion" type="date" required="required" class="form-control">
    </div>
  </div>
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

$amarillo = "warning";
if($botnenvi!=""){
  $amarillo = "primary";
}
    $referenciacion.='<button type="button" class="btn btn-'.$amarillo.'" data-toggle="modal" data-target="#exampleModalextraref'.$idper.'">
    Referenciación
</button>';
} else {
  $referenciacion = '<a href="archivosgenerales/'.$listadoreq[$i]['formatorefer'].'" target="_black" class="btn btn-primary" >Descargar</a>';
  //$botnenvi.='<a href="archivosgenerales/'.$listadoreq[$i]['formatorefer'].'" target="_black" class="btn btn-primary" >Descargar Referenciación</a>';
  
}




  $botonedit ="";
} else if ($estadopresen=="E"){
  $botnenvi = "Candidato Presentado";
  $botonedit ="";
} else if($conteoreq==3){
  $botnenvi = "<a class='btn btn-success' href='home.php?ctr=requisicion&acc=enviarCandidatos&idper=".$idper."&idreq=".$idreq."'>Enviar Candidato</a>";
}
$ordenbtn= "En Proceso"; 
if($ordeningreso!="")
{
  $ordenbtn ='<a href="archivosgenerales/'.$ordeningreso.'" target="_black" class="btn btn-primary">Descargar</a>';	
}
$modalbotonextra ='<div class="modal fade" id="exampleModalextra'.$idper.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adjunto Extra</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="home.php?ctr=requisicion&acc=guardarotro" method="post" enctype="multipart/form-data">
		<fieldset>
		<!-- File Button --> 
		<div class="form-group">
		  <label class="col-md-4 control-label" for="filebutton"> Max(2 Mb)</label>
		  <div class="col-md-4">
      <input id="id" name="id" type="hidden" value="'.$idper.'">
      <input id="idreq" name="idreq" type="hidden" value="'.$idreq.'">
		    <input id="filebutton" name="filebutton" class="input-file" type="file">
		  </div>
		</div>
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
$amarillo = "warning";
if($archivootro!=""){
  $amarillo = "primary";
}
    $botonextra ='<button type="button" class="btn btn-'.$amarillo.'" data-toggle="modal" data-target="#exampleModalextra'.$idper.'">
  Adjunto Extra
</button>';	
if($archivootro!=""){
  $botonextra ='<a href="archivosgenerales/'.$archivootro.'" target="_black" class="btn btn-primary">Descargar</a>';
  $amarillo = "primary";
    $botonextra .='<br><br><button type="button" class="btn btn-'.$amarillo.'" data-toggle="modal" data-target="#exampleModalextra'.$idper.'">
  Volver a Cargar
</button>';	
}
if($estadoreal == "A"){
$modalcerrar ='<div class="modal fade" id="exampleModalcerrar'.$idper.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Rechazar por Inconsistencia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="home.php?ctr=requisicion&acc=rechazaraprobado" method="post" enctype="multipart/form-data">
		<fieldset>
    <div class="form-group row">
    <label for="motivo" class="col-4 col-form-label">Motivo</label> 
    <div class="col-8">
      <input id="motivo" name="motivo" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="descipcion" class="col-4 col-form-label">Descripcion Motivo</label> 
    <div class="col-8">
      <textarea id="descipcion" name="descipcion" cols="40" rows="5" class="form-control" required="required"></textarea>
    </div>
    <input id="id" name="id" type="hidden" value="'.$idper.'">
      <input id="idreq" name="idreq" type="hidden" value="'.$idreq.'">
  </div> 
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

$modalcerrar .='<br><br><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalcerrar'.$idper.'">
  Rechazar por Inconsistencia
</button>';	} else {
  $modalcerrar = "";
}
$hola = "";
$listarchivossend = "";
if($estadoreal.$estadopresen=="AF" || $estadoreal.$estadopresen=="CF") {
  $hola= "Aprobado Finalizado";
  $listarchivossend = "<a target='_black' href='archivosgenerales/".$listadoreq[$i]['examenesar']."'>Examenes</a><br>"; 
  $listarchivossend .= "<a target='_black' href='archivosgenerales/".$listadoreq[$i]['hvhuman']."'>Hoja de Vida</a><br>";
  $listarchivossend .= "<a target='_black' href='archivosgenerales/".$listadoreq[$i]['ordeningreso']."'>Orden Ingreso</a><br>";
  $listarchivossend .= "<a target='_black' href='archivosgenerales/".$listadoreq[$i]['apertura']."'>Apertura Cuenta</a><br>";
  $listarchivossend .= "<a target='_black' href='archivosgenerales/".$listadoreq[$i]['docdocumen']."'>Documentacion</a><br>";

} else if($estadoreal.$estadopresen=="RR") {
  $hola= "Rechazado";
} else if($estadoreal.$estadopresen=="CC") {
  $hola = "Registrado";
} else if($estadoreal.$estadopresen=="EP" ){ 
  $hola = "Proceso Entrevista";
} else if($estadoreal.$estadopresen=="EE" ){ 
  $hola = "Presentado";
} else if($estadoreal.$estadopresen=="AEM" ){ 
  $hola = "Aprobado";
} else {
  $hola = $estadoreal.$estadopresen;
}
    echo "<tr>
    		<td>".$jaja ."</td>
    		<td>".$nombre."</td>
        <td>".$telefono."</td>
        <td>".$cedula."</td>
        <td>".$correo."</td>
        <td>".$botonhoja.$modalbotonhoja."</td>
        <td>".$boton.$modalboton."</td>
        <td>".$botonextra.$modalbotonextra."</td>
        <td>".$botonentre.$modalbotonentre."</td>
        <td>".$ordenbtn."</td>
        <td>".$botonedit.$modalbotonedit."</td>
        <td>".$hola."</td>
        <td>".$listarchivossend."</td>
        <td>".$referenciacion."</td>
    		<td>".$botnenvi.$modalcerrar."</td>
    </tr>";
  }

?>
</tbody>
</table>
<style type="text/css">
	#listadoparientes{
		border: 1px solid gray;
		padding: 5px;
		margin-bottom: 10px;
	}
	#cona{
		border: 1px solid black;
		padding: 5px;
		margin-bottom: 10px;
	}
	#cona h5 {
    color: blue;
    text-align: center;
    background-color: #BDBDBD;
    padding: 10px;
    color: white;
}

.cona{
		border: 1px solid black;
		padding: 5px;
		margin-bottom: 10px;
	}
	.cona h5 {
    color: blue;
    text-align: center;
    padding: 10px;
    color: #0069d9;

}

#listadoparientes h4{
	color: #0069d9;
}

</style>
<script>
function change(id,campo,per){
  var campo = campo+''+id+''+per;
  //alert(campo);
  if (document.getElementById){ //se obtiene el id
    var el = document.getElementById(campo); //se define la variable "el" igual a nuestro div
    el.style.display = (el.style.display == 'none') ? 'block' : 'none'; //damos un atributo display:none que oculta el div
  }
}
function changeestudio(id){
  var campo = 'cona'+''+id+'';
  //alert(campo);
  if (document.getElementById){ //se obtiene el id
    var el = document.getElementById(campo); //se define la variable "el" igual a nuestro div
    el.style.display = (el.style.display == 'none') ? 'block' : 'none'; //damos un atributo display:none que oculta el div
  }
}

</script>
