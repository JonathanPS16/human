<h4>Proceso Aprobacion - Rechazo  Requisicion #<?=$_GET['id']." ".$listadoreqcrea[0]['cargo']; ?></h4><br>
<table class="table table-striped" id="myTable">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nombre Candidato</th>
      <th>Prueba Psicotecnica</th>
      <th>Adjunto Extra</th>
      <th>Entrevista</th>
      <th>Hoja de Vida</th>
      <th>Informacion Citacion</th>
			<th colspan ="2">Acciones Candidato</th>
		</tr>
	</thead>
	<tbody>
<?php 
$contadorgene = 0;
for($i=0; $i<count($listadoreq);$i++){
    $contadorgene ++;
    $conteoreq = 0; 
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
    $conclusionentrevistagen=$listadoreq[$i]['conclusionentrevistagen'];
    $conclusionentrevistagendos=$listadoreq[$i]['conclusionentrevistagendos'];
    $estadoreal=$listadoreq[$i]['estadoreal'];
    $fortalezaentre = $listadoreq[$i]['fortalezaentre'];
    $aspectosentre = $listadoreq[$i]['aspectosentre'];
    $otrosentrev = $listadoreq[$i]['otrosentrev'];
    $fortalezaentredos = $listadoreq[$i]['fortalezaentredos'];
    $aspectosentredos = $listadoreq[$i]['aspectosentredos'];
    $otrosentrevdos = $listadoreq[$i]['otrosentrevdos'];
    $tipocita = $listadoreq[$i]['tipocita'];
    $observacionrechazo  = $listadoreq[$i]['observacionrechazo'];


    
     

    if ($estadopresen=="E" && $fechacitan ==""){
      $modalbotoncita ='<div class="modal fade" id="exampleModalhv'.$idper.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cita a Entrevista</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="home.php?ctr=requisicion&acc=citar" method="post" enctype="multipart/form-data">
        <div class="form-group row">
        <label for="fechahora" class="col-4 col-form-label">Fecha</label> 
        <div class="col-8">
          <input id="fechahora" name="fechahora" placeholder="AAAA-MM-DD HH:MM" type="date" class="form-control" required="required">
        </div>
      </div> 

      <div class="form-group row">
        <label for="hora" class="col-4 col-form-label">Hora</label> 
        <div class="col-8">
          <input id="hora" name="hora" placeholder="HH:mm" type="text" class="form-control" required="required">
        </div>
      </div> 
      <div class="form-group row">
        <label class="col-4 col-form-label" for="tipocita">Tipo de Cita</label> 
        <div class="col-8">
          <select id="tipocita" name="tipocita" class="custom-select">
            <option value="Video Conferencia">Video Conferencia</option>
            <option value="Presencial">Presencial</option>
            <option value="Telefonica">Telefonica</option>
            <option value="Otros">Otros</option>
          </select>
        </div>
      </div> 
      <div class="form-group row">
        <label for="lugarentre" class="col-4 col-form-label">Lugar o Link de Reunion</label> 
        <div class="col-8">
          <input id="lugarentre" name="lugarentre" placeholder="Lugar o Link de Entrevista" type="text" class="form-control" required="required">
        </div>
      </div> 
      <div class="form-group row">
        <div class="offset-4 col-8">
          <input type="hidden" name="id_req" id="id_req" value="'.$idreq.'">
          <input type="hidden" name="id_per" id="id_per" value="'.$idper.'">
          <button name="submit" type="submit" class="btn btn-primary">Gestionar Cita</button>
        </div>
      </div>
		</form>

        
      </div>
      
    </div>
  </div>
</div>
';

    $botoncita ='<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalhv'.$idper.'">
  Citar
</button>';	
    } else if(($conclusionentrevistagen!="" && $listadoreq[$i]['citanum']!="S") || ($conclusionentrevistagendos!="" && $listadoreq[$i]['citanum']=="S")) {

      $modalbotoncitaconcluresumen ='<div class="modal fade" id="conclumodalModalhv'.$idper.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Conclusiones Citas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <div class="form-group row">
        <label for="fechahora" class="col-4 col-form-label">Observaciones Generales</label> 
        <div class="col-8">
          '.$conclusionentrevistagen.'
        </div>
      </div> 

      <div class="form-group row">
        <label for="hora" class="col-4 col-form-label">Fortalezas</label> 
        <div class="col-8">
          '.$fortalezaentre.'
        </div>
      </div> 
      <div class="form-group row">
        <label class="col-4 col-form-label" for="tipocita">Aspectos a Mejorar</label> 
        <div class="col-8">
          '.$aspectosentre.'
        </div>
      </div> 
      <div class="form-group row">
        <label for="lugarentre" class="col-4 col-form-label">Otros</label> 
        <div class="col-8">
         '.$otrosentrev.'
        </div>
      </div> 

      <div class="form-group row">
        <label for="fechahora" class="col-4 col-form-label">Observaciones Generales Segunda Cita</label> 
        <div class="col-8">
          '.$conclusionentrevistagendos.'
        </div>
      </div> 

      <div class="form-group row">
        <label for="hora" class="col-4 col-form-label">Fortalezas Segunda Cita</label> 
        <div class="col-8">
          '.$fortalezaentredos.'
        </div>
      </div> 
      <div class="form-group row">
        <label class="col-4 col-form-label" for="tipocita">Aspectos a Mejorar Segunda Cita</label> 
        <div class="col-8">
          '.$aspectosentredos.'
        </div>
      </div> 
      <div class="form-group row">
        <label for="lugarentre" class="col-4 col-form-label">Otros Segunda Cita</label> 
        <div class="col-8">
         '.$otrosentrevdos.'
        </div>
      </div> 
      </div>
      
    </div>
  </div>
</div>
';
      $botoncitaconcluresumen ='<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#conclumodalModalhv'.$idper.'">
  Ver Conclusiones Cita
</button>';	

$modalbotoncitados ='<div class="modal fade" id="exampleModalhvaa'.$idper.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cita Segunda Entrevista</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="home.php?ctr=requisicion&acc=citar" method="post" enctype="multipart/form-data">
        <div class="form-group row">
        <label for="fechahora" class="col-4 col-form-label">Fecha</label> 
        <div class="col-8">
          <input id="fechahora" name="fechahora" placeholder="AAAA-MM-DD HH:MM" type="date" class="form-control" required="required">
        </div>
      </div> 

      <div class="form-group row">
        <label for="hora" class="col-4 col-form-label">Hora</label> 
        <div class="col-8">
          <input id="hora" name="hora" placeholder="HH:mm" type="text" class="form-control" required="required">
        </div>
      </div> 
      <div class="form-group row">
        <label class="col-4 col-form-label" for="tipocita">Tipo de Cita</label> 
        <div class="col-8">
          <select id="tipocita" name="tipocita" class="custom-select">
            <option value="Video Conferencia">Video Conferencia</option>
            <option value="Presencial">Presencial</option>
            <option value="Telefonica">Telefonica</option>
            <option value="Otros">Otros</option>
          </select>
        </div>
      </div> 
      <div class="form-group row">
        <label for="lugarentre" class="col-4 col-form-label">Lugar o Link de Reunion</label> 
        <div class="col-8">
          <input id="lugarentre" name="lugarentre" placeholder="Lugar o Link de Entrevista" type="text" class="form-control" required="required">
        </div>
      </div> 
      <div class="form-group row">
        <div class="offset-4 col-8">
          <input type="hidden" name="id_req" id="id_req" value="'.$idreq.'">
          <input type="hidden" name="id_per" id="id_per" value="'.$idper.'">
          <input type="hidden" name="tipo" id="tipo" value="S">
          <button name="submit" type="submit" class="btn btn-primary">Gestionar Cita</button>
        </div>
      </div>
		</form>

        
      </div>
      
    </div>
  </div>
</div>
';

    $botoncitados ='<br><br><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalhvaa'.$idper.'">
  Citar Segunda Vez
</button>';	
      if($listadoreq[$i]['citanum'] == "S"){
        $botoncita = $modalbotoncitaconcluresumen.$botoncitaconcluresumen;
      } else {
        $botoncita = $modalbotoncitaconcluresumen.$botoncitaconcluresumen.$modalbotoncitados.$botoncitados;
      }
      
    } else {

      $modalbotoncitaconclu ='<div class="modal fade" id="exampleModalcitaconclu'.$idper.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Conclusion Entrevista '.$listadoreqcrea[0]['cargo'].'</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <strong><p>Nombre Candidato: </strong>'.$nombre.'</p>
          <strong><p>Cedula Candidato: </strong>'.$cedula.'</p>
            <form class="form-horizontal" action="home.php?ctr=requisicion&acc=conclusionentrevistac" method="post" enctype="multipart/form-data">
            <div class="form-group row">
              <label for="concuentre" class="col-4 col-form-label">Observaciones Generales</label> 
              <div class="col-8">
                <textarea id="concuentre" name="concuentre" cols="40" rows="5" class="form-control" required="required"></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label for="fortalezaentre" class="col-4 col-form-label">Fortalezas</label> 
              <div class="col-8">
                <textarea id="fortalezaentre" name="fortalezaentre" cols="40" rows="5" class="form-control" required="required"></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label for="aspectosentre" class="col-4 col-form-label">Aspectos a Reforzar</label> 
              <div class="col-8">
                <textarea id="aspectosentre" name="aspectosentre" cols="40" rows="5" class="form-control" required="required"></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label for="otrosentrev" class="col-4 col-form-label">Otros</label> 
              <div class="col-8">
                <textarea id="otrosentrev" name="otrosentrev" cols="40" rows="5" class="form-control" required="required"></textarea>
              </div>
            </div>
          <div class="form-group row">
            <div class="offset-4 col-8">
              <input type="hidden" name="id_req" id="id_req" value="'.$idreq.'">
              <input type="hidden" name="id_per" id="id_per" value="'.$idper.'">
              <input type="hidden" name="tipo" id="tipo" value="'.$listadoreq[$i]['citanum'].'">
              <button name="submit" type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </div>
        </form>
    
            
          </div>
          
        </div>
      </div>
    </div>
    ';
    if($listadoreq[$i]['citanum']=="S"){
        $botoncitaconclu ='<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalcitaconclu'.$idper.'"> Conclusion Cita
        '.$listadoreq[$i]['fechacitados'].'</button>';
    }else {
      $botoncitaconclu ='<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalcitaconclu'.$idper.'"> Conclusion Cita
        '.$fechacitan.'</button>';
    }


      $botoncita =$modalbotoncitaconclu.$botoncitaconclu.'';
      

    }
    $botaceptar = "<a class='btn btn-success' href='home.php?ctr=requisicion&acc=aceptarcandidato&idper=".$idper."&idreq=".$idreq."'>Aprobar</a>";
    if (($estadopresen=="E" || $estadopresen=="P") && $motivorechazo ==""){
      $modalbotonrechazo ='<div class="modal fade" id="exampleModalre'.$idper.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Rechazo Candidato</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <strong><p>Nombre Candidato: </strong>'.$nombre.'</p>
          <strong><p>Cedula Candidato: </strong>'.$cedula.'</p>
        <form class="form-horizontal" action="home.php?ctr=requisicion&acc=rechazo" method="post" enctype="multipart/form-data">
        <div class="form-group row">
          <label for="rechazo" class="col-4 col-form-label">Motivo Rechazo</label> 
          <div class="col-8">
            <select id="rechazo" name="rechazo" required="required" class="custom-select">
              <option value="Mal perfilado">Mal perfilado</option>
              <option value="Informacion Inconsistente">Informacion Inconsistente</option>
              <option value="Edad Insuficiente">Edad Insuficiente</option>
              <option value="Perfil No Se Ajusta">Perfil No Se Ajusta</option>
              <option value="Estudios">Estudios</option>
              <option value="Experiencia Laboral">Experiencia Laboral</option>
              <option value="Estabilidad Laboral">Estabilidad Laboral</option>
            </select>
          </div>
        </div> 
        <div class="form-group row">
          <label for="observacionesrechazo" class="col-4 col-form-label">Observaciones</label> 
          <div class="col-8">
            <textarea id="observacionesrechazo" name="observacionesrechazo" cols="40" rows="5" class="form-control" required="required"></textarea>
          </div>
        </div>
        <div class="form-group row">
          <div class="offset-4 col-8">
            <input type="hidden" name="id_req" id="id_req" value="'.$idreq.'">
            <input type="hidden" name="id_per" id="id_per" value="'.$idper.'">
            <button name="submit" type="submit" class="btn btn-primary">Rechazar</button>
          </div>
        </div>
		</form>

        
      </div>
      
    </div>
  </div>
</div>
';
    $botonrechazo ='<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalre'.$idper.'">
  Rechazar
</button>';	
    } else if($estadopresen=="A") {
      $botonrechazo ='';
      $botaceptar ="";
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
              <label for="tasa" class="col-4 col-form-label">Tasa ARL</label> 
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
    <label for="centrocostosor" class="col-4 col-form-label">Centro Costros Empresa Cliente</label> 
    <div class="col-8">
      <input id="centrocostosor" name="centrocostosor" placeholder="Centro Costros Empresa Cliente" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="centrosucursal" class="col-4 col-form-label">Ciudad/Sucursal</label> 
    <div class="col-8">
      <input id="centrosucursal" name="centrosucursal" placeholder="Ciudad/Sucursal" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="funcionarioaut" class="col-4 col-form-label">Nombre Funcionario que Autoriza</label> 
    <div class="col-8">
      <input id="funcionarioaut" name="funcionarioaut" placeholder="Nombre Funcionario que Autoriza" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="cargofuncionarioaut" class="col-4 col-form-label">Cargo Funcionario que Autoriza</label> 
    <div class="col-8">
      <input id="cargofuncionarioaut" name="cargofuncionarioaut" placeholder="Cargo Funcionario que Autoriza" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="opbservacioncontratacion" class="col-4 col-form-label">Observaciones de Contratacion</label> 
    <div class="col-8">
      <input id="opbservacioncontratacion" name="opbservacioncontratacion" placeholder="Observaciones de Contratacion" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="funcionarioautorizath" class="col-4 col-form-label">Funcionario que Autoriza Talento Humano</label> 
    <div class="col-8">
      <input id="funcionarioautorizath" name="funcionarioautorizath" placeholder="Funcionario que Autoriza Talento Humano" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="cargofuncionarioth" class="col-4 col-form-label">Cargo Funcionario Talento Humano</label> 
    <div class="col-8">
      <input id="cargofuncionarioth" name="cargofuncionarioth" placeholder="Cargo Funcionario Talento Humano" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="fechaautori" class="col-4 col-form-label">Fecha Autorizacion</label> 
    <div class="col-8">
      <input id="fechaautori" name="fechaautori" type="date" class="form-control" required="required">
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
    $botonrechazo = $modalbotonfinal.$botonfinal;

    } else {
      
      $botoncita ="";
      $botonrechazo ='Motivo Rechazo<br><strong>'.$motivorechazo.':<br>'.$observacionrechazo.'</strong>';
      if($motivorechazo=="" && $observacionrechazo==""){
        $botonrechazo = "Pendiente por Presentar";
      }
      if(($estadopresen=="EM" || $estadopresen=="F") && $estadoreal=='A')
      {
        $botonrechazo = "Aprobado";
      }

      if( $estadopresen=="F" && $estadoreal=='A')
      {
        $botonrechazo = "Finalizado";
      }

      
      $botaceptar ="";
      

      
    }

      

      if($hojavida!=""){
        $botonhoja ='<a href="archivosgenerales/'.$hojavida.'" target="_black" class="btn btn-primary">Descargar</a>';
      } else {
        $botonhoja ="<p class='btn btn-warning'>Sin Archivo</p>";
      }
      if($archivoprueba!=""){
        $boton ='<a href="archivosgenerales/'.$archivoprueba.'" target="_black" class="btn btn-primary">Descargar</a>';
      } else {
        $boton ="<p class='btn btn-warning'>Sin Archivo</p>";
      }

      //$boton ='<a href="archivosgenerales/'.$archivoprueba.'" target="_black">Descargar asdasd</a>';	
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

    $modalbotonentre ='<div class="modal fade" id="exampleModalentreges'.$idper.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
      </div>
  
    </div>
    
    </div>
      </form>
  
          
        </div>
        
      
    </div>
  </div>
';
$botonentre ='<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalentreges'.$idper.'">
  Ver Entrevista
</button>';	

if($archivootro!=""){
  $botonextra ='<a class="btn btn-primary" href="archivosgenerales/'.$archivootro.'" target="_black" >Descargar</a>';
} else {
  $botonextra ="<p class='btn btn-warning'>Sin Archivo</p>";
} 
if($estadopresen=="EM" && $listadoreqcrea[0]['tipo']=="D"){
 // echo "Examnes Directos";$botonrechazo
 $botonrechazo ="";
  $botaceptar="Deteminar Examenes Medicos";
}

if($estadopresen=="F" && $listadoreqcrea[0]['tipo']=="D"){
  // echo "Examnes Directos";$botonrechazo
  $botonrechazo ="";
   $botaceptar="Proceso Finalizado";
 }
    echo "<tr>
    		<td>".$contadorgene."</td>
    		<td>".ucfirst($nombre)."</td>
        <td>".$boton.$modalboton."</td>
        <td>".$botonextra.$modalbotonextra."</td>
        <td>".$botonentre.$modalbotonentre."</td>
        <td>".$botonhoja.$modalbotonhoja."</td>
        <td>".$botoncita.$modalbotoncita."</td>
        <td>".$botonrechazo.$modalbotonrechazo."</td>
        <td>".$botaceptar."</td>
        
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
    background-color: #BDBDBD;
    padding: 10px;
    color: white;
}

#listadoparientes h4{
	color: gray;
}
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
