<?php 
$litadoUsuarios = "";
for($a=0; $a<count($listausuariosgenerales);$a++){
  $selecteda ="";
  if($mireq[0]['clientesol']!="" && ($listausuariosgenerales[$a]['usuario']==$mireq[0]['clientesol'])){
    $selecteda ="selected='selected'";
  } else if($_SESSION['usuario']==$listausuariosgenerales[$a]['usuario']){
    $selecteda ="selected='selected'";
  }

  $litadoUsuarios.='<option value="'.$listausuariosgenerales[$a]['usuario'].'" '.$selecteda.'>'.$listausuariosgenerales[$a]['nombre'].'</option>';

}
$title="FORMULARIO REQUISICION";
if($id>0){
  ?>
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">CONDICIONES SALARIALES Y FUNCIONES</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="miga"><i class="fa fa-angle-double-right"></i> <strong>Paso 1 de 4</strong><p>
      <form class="form-horizontal" method="post" action="home.php?ctr=requisicion&acc=guardarReqCondiciones">
      <input type="hidden" id="id" name="id" value="<?=$id?>">
<!-- Text input-->
<div class="form-group">
  <label class="col-md-10 control-label" for="salariobasico">Salario  Básico 	</label>  
  <div class="col-md-8">
  <input id="salariobasico" name="salariobasico" type="text" placeholder="Salario  Básico" class="form-control input-md" value ="<?php echo $mireq[0]['salariobasico']; ?>">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-10 control-label" for="comisiones">Comisiones 	</label>  
  <div class="col-md-8">
  <input id="comisiones" name="comisiones" type="text" placeholder="Comisiones" class="form-control input-md" value ="<?php echo $mireq[0]['comisiones']; ?>">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-10 control-label" for="rodamiento">Rodamiento	</label>  
  <div class="col-md-8">
  <input id="rodamiento" name="rodamiento" type="text" placeholder="Rodamiento	" class="form-control input-md" value ="<?php echo $mireq[0]['rodamiento']; ?>">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-10 control-label" for="bonificacion">Bonificacion 	</label>  
  <div class="col-md-8">
  <input id="bonificacion" name="bonificacion" type="text" placeholder="Bonificacion 	" class="form-control input-md" value ="<?php echo $mireq[0]['bonificacion']; ?>">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-10 control-label" for="otraingreso">Otro 	</label>  
  <div class="col-md-8">
  <input id="otraingreso" name="otraingreso" type="text" placeholder="Otro 	" class="form-control input-md" value ="<?php echo $mireq[0]['otraingreso']; ?>">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-10 control-label" for="funciones">Funciones</label>  
  <div class="col-md-8">
  <textarea id="funciones" name="funciones" cols="40" rows="5" class="form-control"><?php echo $mireq[0]['funciones']; ?></textarea>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-10 control-label" for="singlebutton"></label>
  <div class="col-md-10">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Guardar</button>
  </div>
</div>
</form>


        
      </div>
      
    </div>
  </div>
</div>



    <!-- Modal -->
    <div class="modal fade" id="responsabilidades" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">RESPONSABILIDADES DEL CARGO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <p id="miga"><i class="fa fa-angle-double-right"></i> <strong>Paso 2 de 4</strong><p>
      <form method="post" action="home.php?ctr=requisicion&acc=guardarReqRespo">
      <input type="hidden" id="id" name="id" value="<?=$id?>">
  <div class="form-group row">
    <label class="col-4">Personas a Cargo</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['acargo'] =="SI") { ?> checked <?php } ?> name="acargo" id="acargo_0" type="radio" required="required" class="custom-control-input" value="SI"> 
        <label for="acargo_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['acargo'] =="NO") { ?> checked <?php } ?> name="acargo" id="acargo_1" type="radio" required="required" class="custom-control-input" value="NO"> 
        <label for="acargo_1" class="custom-control-label">NO</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Equipos</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['equipos'] =="SI") { ?> checked <?php } ?> name="equipos" id="equipos_0" type="radio" class="custom-control-input" value="SI" required="required"> 
        <label for="equipos_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['equipos'] =="NO") { ?> checked <?php } ?> name="equipos" id="equipos_1" type="radio" class="custom-control-input" value="NO" required="required"> 
        <label for="equipos_1" class="custom-control-label">NO</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Dinero</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['dinero'] =="SI") { ?> checked <?php } ?> name="dinero" id="dinero_0" type="radio" required="required" class="custom-control-input" value="SI"> 
        <label for="dinero_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['dinero'] =="NO") { ?> checked <?php } ?> name="dinero" id="dinero_1" type="radio" required="required" class="custom-control-input" value="NO"> 
        <label for="dinero_1" class="custom-control-label">NO</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Materiales y Mercancía</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['materiales'] =="SI") { ?> checked <?php } ?> name="materiales" id="materiales_0" type="radio" class="custom-control-input" value="SI" required="required"> 
        <label for="materiales_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['materiales'] =="NO") { ?> checked <?php } ?> name="materiales" id="materiales_1" type="radio" class="custom-control-input" value="NO" required="required"> 
        <label for="materiales_1" class="custom-control-label">NO</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Herramientas</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['herramientas'] =="SI") { ?> checked <?php } ?> name="herramientas" id="herramientas_0" type="radio" class="custom-control-input" value="SI" required="required"> 
        <label for="herramientas_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input  <?php if($mireq[0]['herramientas'] =="NO") { ?> checked <?php } ?> name="herramientas" id="herramientas_1" type="radio" class="custom-control-input" value="NO" required="required"> 
        <label for="herramientas_1" class="custom-control-label">NO</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Documentos</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['documentos'] =="SI") { ?> checked <?php } ?> name="documentos" id="documentos_0" type="radio" class="custom-control-input" value="SI" required="required"> 
        <label for="documentos_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['documentos'] =="NO") { ?> checked <?php } ?> name="documentos" id="documentos_1" type="radio" class="custom-control-input" value="NO" required="required"> 
        <label for="documentos_1" class="custom-control-label">NO</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Información Confidencial</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['confidencial'] =="SI") { ?> checked <?php } ?> name="confidencial" id="confidencial_0" type="radio" class="custom-control-input" value="SI" required="required"> 
        <label for="confidencial_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['confidencial'] =="NO") { ?> checked <?php } ?> name="confidencial" id="confidencial_1" type="radio" class="custom-control-input" value="NO" required="required"> 
        <label for="confidencial_1" class="custom-control-label">NO</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Valores</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['valores'] =="SI") { ?> checked <?php } ?> name="valores" id="valores_0" type="radio" class="custom-control-input" value="SI" required="required"> 
        <label for="valores_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['valores'] =="NO") { ?> checked <?php } ?> name="valores" id="valores_1" type="radio" class="custom-control-input" value="NO" required="required"> 
        <label for="valores_1" class="custom-control-label">NO</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="otrosresponsabilidades" class="col-4 col-form-label">Otros</label> 
    <div class="col-8">
      <textarea id="otrosresponsabilidades" name="otrosresponsabilidades" cols="40" rows="5" class="form-control"><?php echo $mireq[0]['otrosresponsabilidades'];?></textarea>
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

<!--MODAL-->


<div class="modal fade" id="formacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">FORMACION Y EXPERIENCIA LABORAL</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <p id="miga"><i class="fa fa-angle-double-right"></i> <strong>Paso 3 de 4</strong><p>
      <div class="col-8">
    <h6>Formación Académica</h6>
    </div>
    <form  method="post" action="home.php?ctr=requisicion&acc=guardarReqExper">
      <input type="hidden" id="id" name="id" value="<?=$id?>">
  <div class="form-group row">
    <label for="primaria" class="col-4 col-form-label">Primaria</label> 
    <div class="col-8">
      <input id="primaria" name="primaria" placeholder="Titulo Obtenido / Nivel Mínimo" type="text" class="form-control" required="required" value="<?php echo $mireq[0]['primaria'];?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="secundaria" class="col-4 col-form-label">Secundaria</label> 
    <div class="col-8">
      <input id="secundaria" name="secundaria" placeholder="Titulo Obtenido / Nivel Mínimo " type="text" class="form-control" required="required" value="<?php echo $mireq[0]['secundaria'];?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="tecnico" class="col-4 col-form-label">Técnico</label> 
    <div class="col-8">
      <input id="tecnico" name="tecnico" placeholder="Titulo Obtenido / Nivel Mínimo 				" type="text" class="form-control" required="required" value="<?php echo $mireq[0]['tecnico'];?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="tecnologo" class="col-4 col-form-label">Tecnólogo</label> 
    <div class="col-8">
      <input id="tecnologo" name="tecnologo" placeholder="Titulo Obtenido / Nivel Mínimo 	" type="text" class="form-control" required="required" value="<?php echo $mireq[0]['tecnologo'];?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="profesional" class="col-4 col-form-label">Profesional</label> 
    <div class="col-8">
      <input id="profesional" name="profesional" placeholder="Titulo Obtenido / Nivel Mínimo 	" type="text" class="form-control" required="required" value="<?php echo $mireq[0]['profesional'];?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="otrosestudios" class="col-4 col-form-label">Otros</label> 
    <div class="col-8">
      <textarea id="otrosestudios" name="otrosestudios" cols="40" rows="5" class="form-control" required="required"><?php echo $mireq[0]['otrosestudios'];?></textarea>
    </div>
  </div>
  <div class="form-group row">
  <div class="col-8">
    <h6>Experiencia Laboral</h6>
    </div>
  </div>
  <div class="form-group row">
    <label for="minimaexpe" class="col-4 col-form-label">Mínimo de  Experiencia</label> 
    <div class="col-8">
      <input id="minimaexpe" name="minimaexpe" placeholder="Experiencia Minima" type="text" class="form-control" required="required" value="<?php echo $mireq[0]['minimaexpe'];?>">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Educación homologable  por Experiencia</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['experienciahomolo'] =="SI") { ?> checked <?php } ?> name="experienciahomolo" id="experienciahomolo_0" type="radio" class="custom-control-input" value="SI" required="required" > 
        <label for="experienciahomolo_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['experienciahomolo'] =="NO") { ?> checked <?php } ?> name="experienciahomolo" id="experienciahomolo_1" type="radio" class="custom-control-input" value="NO" required="required"> 
        <label for="experienciahomolo_1" class="custom-control-label">NO</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="observacionesexp" class="col-4 col-form-label">Observaciones Experiencia Laboral</label> 
    <div class="col-8">
      <textarea id="observacionesexp" name="observacionesexp" cols="40" rows="5" required="required" class="form-control"><?php echo $mireq[0]['observacionesexp'];?></textarea>
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Guadar</button>
    </div>
  </div>
</form>
    
        
      </div>
      
    </div>
  </div>
</div>

<!--MODAL-->



<div class="modal fade" id="habilidades" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">HABILIDADES Y COMPETENCIAS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <p id="miga"><i class="fa fa-angle-double-right"></i> <strong>Paso 4 de 4</strong><p>
      <div class="alert alert-info" role="alert">
  Recuerde que Debe Escoger las <strong>10</strong> Competencias Mas Importantes Para el Cargo 
</div>
      
    <form  method="post" action="home.php?ctr=requisicion&acc=guardarReqHabilidades" id="formulariogeneralhabildiades" onsubmit="return toSubmit();">
      <input type="hidden" id="id" name="id" value="<?=$id?>">
      <div class="form-group row">
    <label class="col-3">Adaptabilidad a Normas y Ambiente de Trabajo</label> 
    <div class="col-3">
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['adaptabilidad'] =="SI") { ?> checked <?php } ?> name="adaptabilidad" id="adaptabilidad_0" type="radio" class="custom-control-input" value="SI" required="required"> 
        <label for="adaptabilidad_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['adaptabilidad'] =="NO" || $mireq[0]['adaptabilidad']=="") { ?> checked <?php } ?> name="adaptabilidad" id="adaptabilidad_1" type="radio" class="custom-control-input" value="NO" required="required"> 
        <label for="adaptabilidad_1" class="custom-control-label">NO</label>
      </div>
    </div>
    <label class="col-3">Administración del Tiempo</label> 
    <div class="col-3">
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['administracion'] =="SI") { ?> checked <?php } ?> name="administracion" id="administracion_0" type="radio" required="required" class="custom-control-input" value="SI"> 
        <label for="administracion_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['administracion'] =="NO" || $mireq[0]['administracion'] =="") { ?> checked <?php } ?> name="administracion" id="administracion_1" type="radio" required="required" class="custom-control-input" value="NO"> 
        <label for="administracion_1" class="custom-control-label">NO</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-3">Análisis y Solución De Problemas</label> 
    <div class="col-3">
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['analisis'] =="SI") { ?> checked <?php } ?> name="analisis" id="analisis_0" type="radio" required="required" class="custom-control-input" value="SI"> 
        <label for="analisis_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['analisis'] =="NO" || $mireq[0]['analisis'] =="") { ?> checked <?php } ?> name="analisis" id="analisis_1" type="radio" required="required" class="custom-control-input" value="NO"> 
        <label for="analisis_1" class="custom-control-label">NO</label>
      </div>
    </div>
  
    <label class="col-3">Capacidad De Gestión</label> 
    <div class="col-3">
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['gestion'] =="SI") { ?> checked <?php } ?> name="gestion" id="gestion_0" type="radio" required="required" class="custom-control-input" value="SI"> 
        <label for="gestion_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['gestion'] =="NO" || $mireq[0]['gestion'] =="") { ?> checked <?php } ?> name="gestion" id="gestion_1" type="radio" required="required" class="custom-control-input" value="NO"> 
        <label for="gestion_1" class="custom-control-label">NO</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-3">Capacidad De Negociación</label> 
    <div class="col-3">
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['negociacion'] =="SI") { ?> checked <?php } ?> name="negociacion" id="negociacion_0" type="radio" required="required" class="custom-control-input" value="SI"> 
        <label for="negociacion_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['negociacion'] =="NO" || $mireq[0]['negociacion'] =="") { ?> checked <?php } ?> name="negociacion" id="negociacion_1" type="radio" required="required" class="custom-control-input" value="NO"> 
        <label for="negociacion_1" class="custom-control-label">NO</label>
      </div>
    </div>

    <label class="col-3">Orientación al Cumplimiento Normas Y Procesos</label> 
    <div class="col-3">
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['normas'] =="SI") { ?> checked <?php } ?> name="normas" id="normas_0" type="radio" required="required" class="custom-control-input" value="SI"> 
        <label for="normas_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['normas'] =="NO" || $mireq[0]['normas'] =="") { ?> checked <?php } ?> name="normas" id="normas_1" type="radio" required="required" class="custom-control-input" value="NO"> 
        <label for="normas_1" class="custom-control-label">NO</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-3">Disposición Hacia El Aprendizaje</label> 
    <div class="col-3">
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['aprendizaje'] =="SI") { ?> checked <?php } ?> name="aprendizaje" id="aprendizaje_0" type="radio" required="required" class="custom-control-input" value="SI"> 
        <label for="aprendizaje_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['aprendizaje'] =="NO" || $mireq[0]['aprendizaje'] =="") { ?> checked <?php } ?> name="aprendizaje" id="aprendizaje_1" type="radio" required="required" class="custom-control-input" value="NO"> 
        <label for="aprendizaje_1" class="custom-control-label">NO</label>
      </div>
    </div>
  
    <label class="col-3">Flexibilidad</label> 
    <div class="col-3">
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['flexibilidad'] =="SI") { ?> checked <?php } ?> name="flexibilidad" id="flexibilidad_0" type="radio" required="required" class="custom-control-input" value="SI"> 
        <label for="flexibilidad_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['flexibilidad'] =="NO" || $mireq[0]['flexibilidad'] =="") { ?> checked <?php } ?> name="flexibilidad" id="flexibilidad_1" type="radio" required="required" class="custom-control-input" value="NO"> 
        <label for="flexibilidad_1" class="custom-control-label">NO</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-3">Identificación Y Control Del Riesgo</label> 
    <div class="col-3">
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['riesgo'] =="SI") { ?> checked <?php } ?> name="riesgo" id="riesgo_0" type="radio" required="required" class="custom-control-input" value="SI"> 
        <label for="riesgo_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['riesgo'] =="NO" || $mireq[0]['riesgo'] =="") { ?> checked <?php } ?> name="riesgo" id="riesgo_1" type="radio" required="required" class="custom-control-input" value="NO"> 
        <label for="riesgo_1" class="custom-control-label">NO</label>
      </div>
    </div>
  
    <label class="col-3">Innovación Y Creatividad</label> 
    <div class="col-3">
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['innovacion'] =="SI") { ?> checked <?php } ?> name="innovacion" id="innovacion_0" type="radio" required="required" class="custom-control-input" value="SI"> 
        <label for="innovacion_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['innovacion'] =="NO" || $mireq[0]['innovacion'] =="") { ?> checked <?php } ?> name="innovacion" id="innovacion_1" type="radio" required="required" class="custom-control-input" value="NO"> 
        <label for="innovacion_1" class="custom-control-label">NO</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-3">Seguridad, Salud Ocupacional Y Medio Ambiente</label> 
    <div class="col-3">
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['ambiente'] =="SI") { ?> checked <?php } ?> name="ambiente" id="ambiente_0" type="radio" class="custom-control-input" value="SI" required="required"> 
        <label for="ambiente_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['ambiente'] =="NO" || $mireq[0]['ambiente'] =="") { ?> checked <?php } ?> name="ambiente" id="ambiente_1" type="radio" class="custom-control-input" value="NO" required="required"> 
        <label for="ambiente_1" class="custom-control-label">NO</label>
      </div>
    </div>
 
    <label class="col-3">Observación Y Atención Al Detalle</label> 
    <div class="col-3">
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['observacion'] =="SI") { ?> checked <?php } ?> name="observacion" id="observacion_0" type="radio" required="required" class="custom-control-input" value="SI"> 
        <label for="observacion_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['observacion'] =="NO" || $mireq[0]['observacion'] =="") { ?> checked <?php } ?> name="observacion" id="observacion_1" type="radio" required="required" class="custom-control-input" value="NO"> 
        <label for="observacion_1" class="custom-control-label">NO</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-3">Orientación A Los Resultados</label> 
    <div class="col-3">
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['resultados'] =="SI") { ?> checked <?php } ?> name="resultados" id="resultados_0" type="radio" required="required" class="custom-control-input" value="SI"> 
        <label for="resultados_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['resultados'] =="NO" || $mireq[0]['resultados'] =="") { ?> checked <?php } ?> name="resultados" id="resultados_1" type="radio" required="required" class="custom-control-input" value="NO"> 
        <label for="resultados_1" class="custom-control-label">NO</label>
      </div>
    </div>
 
    <label class="col-3">Orientación Al Cliente Interno Y Externo</label> 
    <div class="col-3">
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['cliente'] =="SI") { ?> checked <?php } ?> name="cliente" id="cliente_0" type="radio" required="required" class="custom-control-input" value="SI"> 
        <label for="cliente_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['cliente'] =="NO" || $mireq[0]['cliente'] =="") { ?> checked <?php } ?> name="cliente" id="cliente_1" type="radio" required="required" class="custom-control-input" value="NO"> 
        <label for="cliente_1" class="custom-control-label">NO</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-3">Comunicación</label> 
    <div class="col-3">
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['comunicacion'] =="SI") { ?> checked <?php } ?> name="comunicacion" id="comunicacion_0" type="radio" required="required" class="custom-control-input" value="SI"> 
        <label for="comunicacion_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['comunicacion'] =="NO" || $mireq[0]['comunicacion'] =="") { ?> checked <?php } ?> name="comunicacion" id="comunicacion_1" type="radio" required="required" class="custom-control-input" value="NO"> 
        <label for="comunicacion_1" class="custom-control-label">NO</label>
      </div>
    </div>

    <label class="col-3">Orientación Tecnológica</label> 
    <div class="col-3">
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['tecnologica'] =="SI") { ?> checked <?php } ?> name="tecnologica" id="tecnologica_0" type="radio" required="required" class="custom-control-input" value="SI"> 
        <label for="tecnologica_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['tecnologica'] =="NO" || $mireq[0]['tecnologica'] =="") { ?> checked <?php } ?> name="tecnologica" id="tecnologica_1" type="radio" required="required" class="custom-control-input" value="NO"> 
        <label for="tecnologica_1" class="custom-control-label">NO</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-3">Planeación</label> 
    <div class="col-3">
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['planeacion'] =="SI") { ?> checked <?php } ?> name="planeacion" id="planeacion_0" type="radio" required="required" class="custom-control-input" value="SI"> 
        <label for="planeacion_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['planeacion'] =="NO" || $mireq[0]['planeacion'] =="") { ?> checked <?php } ?> name="planeacion" id="planeacion_1" type="radio" required="required" class="custom-control-input" value="NO"> 
        <label for="planeacion_1" class="custom-control-label">NO</label>
      </div>
    </div>

    <label class="col-3">Relaciones Interpersonales</label> 
    <div class="col-3">
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['relaciones'] =="SI") { ?> checked <?php } ?> name="relaciones" id="relaciones_0" type="radio" required="required" class="custom-control-input" value="SI"> 
        <label for="relaciones_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['relaciones'] =="NO" || $mireq[0]['relaciones'] =="") { ?> checked <?php } ?> name="relaciones" id="relaciones_1" type="radio" required="required" class="custom-control-input" value="NO"> 
        <label for="relaciones_1" class="custom-control-label">NO</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-3">Liderazgo</label> 
    <div class="col-3">
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['liderazgo'] =="SI") { ?> checked <?php } ?> name="liderazgo" id="liderazgo_0" type="radio" required="required" class="custom-control-input" value="SI"> 
        <label for="liderazgo_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['liderazgo'] =="NO" || $mireq[0]['liderazgo'] =="") { ?> checked <?php } ?> name="liderazgo" id="liderazgo_1" type="radio" required="required" class="custom-control-input" value="NO"> 
        <label for="liderazgo_1" class="custom-control-label">NO</label>
      </div>
    </div>

    <label class="col-3">Sensibilidad Organizacional</label> 
    <div class="col-3">
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['sensibilidad'] =="SI") { ?> checked <?php } ?> name="sensibilidad" id="sensibilidad_0" type="radio" required="required" class="custom-control-input" value="SI"> 
        <label for="sensibilidad_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['sensibilidad'] =="NO" || $mireq[0]['sensibilidad'] =="") { ?> checked <?php } ?> name="sensibilidad" id="sensibilidad_1" type="radio" required="required" class="custom-control-input" value="NO"> 
        <label for="sensibilidad_1" class="custom-control-label">NO</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-3">Solución Y Manejo De Conflictos</label> 
    <div class="col-3">
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['conflictos'] =="SI") { ?> checked <?php } ?> name="conflictos" id="conflictos_0" type="radio" required="required" class="custom-control-input" value="SI"> 
        <label for="conflictos_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['conflictos'] =="NO" || $mireq[0]['conflictos'] =="") { ?> checked <?php } ?> name="conflictos" id="conflictos_1" type="radio" required="required" class="custom-control-input" value="NO"> 
        <label for="conflictos_1" class="custom-control-label">NO</label>
      </div>
    </div>
  
    <label class="col-3">Tolerancia Al Trabajo Bajo Presión</label> 
    <div class="col-3">
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['tolerancia'] =="SI") { ?> checked <?php } ?> name="tolerancia" id="tolerancia_0" type="radio" required="required" class="custom-control-input" value="SI"> 
        <label for="tolerancia_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['tolerancia'] =="NO" || $mireq[0]['tolerancia'] =="") { ?> checked <?php } ?> name="tolerancia" id="tolerancia_1" type="radio" required="required" class="custom-control-input" value="NO"> 
        <label for="tolerancia_1" class="custom-control-label">NO</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-3">Trabajo En Equipo</label> 
    <div class="col-3">
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['equipo'] =="SI") { ?> checked <?php } ?>  name="equipo" id="equipo_0" type="radio" required="required" class="custom-control-input" value="SI"> 
        <label for="equipo_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['equipo'] =="NO" || $mireq[0]['equipo'] =="") { ?> checked <?php } ?> name="equipo" id="equipo_1" type="radio" required="required" class="custom-control-input" value="NO"> 
        <label for="equipo_1" class="custom-control-label">NO</label>
      </div>
    </div>
    <label class="col-3">Otros habilidades y competencias</label> 
    <div class="col-3">
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['habilidades'] =="SI") { ?> checked <?php } ?> name="habilidades" id="habilidades_0" type="radio" required="required" class="custom-control-input" value="SI"> 
        <label for="habilidades_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input <?php if($mireq[0]['habilidades'] =="NO" || $mireq[0]['habilidades'] =="") { ?> checked <?php } ?> name="habilidades" id="habilidades_1" type="radio" required="required" class="custom-control-input" value="NO"> 
        <label for="habilidades_1" class="custom-control-label">NO</label>
      </div>
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Guardar</button>
    </div>
  </div>
</form>
<script>
function  toSubmit (){
  var minsel = 0;
  $('#formulariogeneralhabildiades input:radio').each(function() {
     if($(this).is(':checked')) {
       //alert("seleccionado");
       if($(this).val()=='SI'){
        minsel++
       }
     } 
});
if(minsel!=10){
  alert("Recuerde que son 10 Competencias Mas Importantes Para el Cargo");
  return false;
} else {
  return true;
}

}
</script>
    
        
      </div>
      
    </div>
  </div>
</div>

<!--MODAL-->

  
  <?php
  $title.=" #".$id;
}
?>

<form class="form-horizontal" method="post" action="home.php?ctr=requisicion&acc=guardarReq">
<input type="hidden" name="id" value="<?php echo $id; ?>">
<fieldset>

<!-- Form Name -->
<legend><?=$title?></legend>

<div class="container">
  <div class="row">
    <div class="col-sm">
      <div class="form-group">
        <label class="col-md-10 control-label" for="cargo">Tipo Cargo</label>  
        <div class="col-md-10">
        <select id="tipocargosele" name="tipocargosele" class="form-control">
          <option value="1" <?php if($mireq[0]['tipocargosele']==1) { echo 'selected="selected"'; } ?>>Operativo</option>
          <option value="2" <?php if($mireq[0]['tipocargosele']==2) { echo 'selected="selected"';} ?>>Adminsitrativos</option>
          <option value="3" <?php if($mireq[0]['tipocargosele']==3) { echo 'selected="selected"';} ?>>Comercial</option>
          <option value="4" <?php if($mireq[0]['tipocargosele']==4) { echo 'selected="selected"';} ?>>Jefatura</option>
          <option value="5" <?php if($mireq[0]['tipocargosele']==5) { echo 'selected="selected"';} ?>>Directivos</option>

        </select>
        </div>
      </div>
    </div>
    <div class="col-sm">
    <div class="form-group">
      <label class="col-md-10 control-label" for="jornadalaboral">Jornada Laboral y Horario</label>  
      <div class="col-md-10">
      <input id="jornadalaboral" value ="<?php echo $mireq[0]['jornadalaboral']; ?>" name="jornadalaboral" type="text" placeholder="Jornada Laboral y Horario" class="form-control input-md" required="">
      </div>
    </div>
    </div>
    <div class="col-sm">

    <div class="form-group">
      <label class="col-md-10 control-label" for="cargo">Empresa Prestadora</label>  
      <div class="col-md-10">
      <select id="empresaclientet" name="empresaclientet" class="form-control">
      <option value="">Seleccione</option>
      <?php 
      for($i=0; $i<count($listatemporales);$i++){
        $id_temporal=$listatemporales[$i]['id_temporal'];
        $nombretemporal=$listatemporales[$i]['nombretemporal'];
        $slr = "";
        if ($mireq[0]['empresaclientet']== $id_temporal){
          $slr = 'selected="selected"';
        }
        echo '<option value="'.$id_temporal.'"  '.$slr.'>'.$nombretemporal.'</option>';
      }
      ?>
      </select>
      </div>
    </div>


    </div>
   
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-sm">
    <div class="form-group">
      <label class="col-md-10 control-label" for="cargo">Fecha Requerida Cargo </label>  
      <div class="col-md-10">
      <input id="fechareqcargo" value ="<?php echo $mireq[0]['fechareqcargo']; ?>" name="fechareqcargo" type="date" placeholder="YYYY-mm-dd" class="form-control input-md" required="">
        
      </div>
    </div>
    </div>
    <div class="col-sm">
    <div class="form-group">
      <label class="col-md-10 control-label" for="cargo">Nombre Empresa Usuaria</label>  
      <div class="col-md-10">

      <select id="empresacliente" name="empresacliente" class="form-control" required="required">
      <option value="0">Seleccione</option>
      <?php 
      for($i=0; $i<count($listatemporalesusuarias);$i++){
        $id_temporal=$listatemporalesusuarias[$i]['id_centro'];
        $nombretemporal=$listatemporalesusuarias[$i]['empresausuaria'];
        $slr = "";
        if ($mireq[0]['empresacliente']== $id_temporal){
          $slr = 'selected="selected"';
        }
        echo '<option value="'.$id_temporal.'"  '.$slr.'>'.$nombretemporal.'</option>';
      }
      ?>
      </select>
      </div>
    </div>
    </div>
    <div class="col-sm">
      
    <div class="form-group">
      <label class="col-md-10 control-label" for="cargo">Nombre de Cargo</label>  
      <div class="col-md-10">
      <input id="cargo" value ="<?php echo $mireq[0]['cargo']; ?>" name="cargo" type="text" placeholder="Nombre de Cargo" class="form-control input-md" required="">
        
      </div>
    </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
  <div class="col-sm">
      <div class="form-group">
        <label class="col-md-10 control-label" for="edadindiferente">Edad Indiferente</label>  
        <div class="col-md-10">
          <select name="edadindiferente" id="edadindiferente" class="form-control">
            <option value="N" <?php if($mireq[0]['edadindiferente']=="N") { echo "selected='selected'"; } ?>>No</option>
            <option value="S" <?php if($mireq[0]['edadindiferente']=="S") { echo "selected='selected'"; } ?>>Si</option>
          </select>
        </div>
      </div>
    </div>
    <div class="col-sm">
    <div class="form-group">
      <label class="col-md-10 control-label" for="edadminima">Edad Mínima </label>  
      <div class="col-md-10">
      <select name="edadminima" id="edadminima" class="form-control">
        <option value="0">Seleccione</option>
        <?php 
        for($ia=18; $ia<85;$ia++) {
          $selmin = "";
          if($mireq[0]['edadminima'] == $ia){
            $selmin = 'selected="selected"';
          }
          echo '<option value="'.$ia.'" '.$selmin.'>'.$ia.'</option>';

        }
        ?>
      </select>
      </div>
    </div>
    </div>
    <div class="col-sm">
    <div class="form-group">
      <label class="col-md-10 control-label" for="edadmaxima">Edad Máxima </label>  
      <div class="col-md-10">

      <select name="edadmaxima" id="edadmaxima" class="form-control">
        <option value="0">Seleccione</option>
        <?php 
        for($im=18; $im<85;$im++) {
          $selmin = "";
          if($mireq[0]['edadmaxima'] == $im){
            $selmin = 'selected="selected"';
          }
          echo '<option value="'.$im.'" '.$selmin.'>'.$im.'</option>';

        }
        ?>
      </select>
      </div>
    </div>
    </div>
    
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-sm">
    <div class="form-group">
  <label class="col-md-10 control-label" for="horario ">Ciudad Laborar</label>  
  <div class="col-md-10">
  <input id="ciudadlaboral" value ="<?php echo $mireq[0]['ciudadlaboral']; ?>" name="ciudadlaboral" type="text" placeholder="Ciudad a Laborar" class="form-control input-md" required="">
 
  </div>
</div>
    </div>
    <div class="col-sm">
    <div class="form-group">
  <label class="col-md-10 control-label" for="tipocontrato">Tipo de Contrato</label>  
  <div class="col-md-10">
  <input id="tipocontrato" value ="Obra o Labor" name="tipocontrato" type="text" placeholder="Tipo de Contrato" class="form-control input-md" required="" readonly="readonly">
    
  </div>
</div>
    </div>
    <div class="col-sm">
    <?php
$estados = $mireq[0]['estado']; 


?>
<div class="form-group">
      <label class="col-md-10 control-label" for="estadocivil">Estado Civil</label>  
      <div class="col-md-10">
      <select name="estadocivil" id="estadocivil" class="form-control">

        <option value="soltero" <?php if($estados=="soltero") { echo "selected='selected'"; } ?>>Soltero</option>
        <option value="casado" <?php if($estados=="casado") { echo "selected='selected'"; } ?>>Casado</option>
        <option value="indiferente" <?php if($estados=="indiferente") { echo "selected='selected'"; } ?>>Indiferente</option>
      </select>
      </div>
    </div>

    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-sm">
    <?php 
$estados = $mireq[0]['genero']; 

?>

<!-- Multiple Checkboxes -->
<div class="form-group">
<label class="col-md-10 control-label" for="generos">Genero</label>  
  <div class="col-md-10">

  <select name="generos" id="generos" class="form-control">

        <option value="masculino" <?php if($estados=="masculino") { echo "selected='selected'"; } ?>>Masculino</option>
        <option value="femenino" <?php if($estados=="femenino") { echo "selected='selected'"; } ?>>Femenino</option>
        <option value="indiferente" <?php if($estados=="indiferente") { echo "selected='selected'"; } ?>>Indiferente</option>
      </select>
  </div>
</div>
    </div>
    <div class="col-sm">
    <div class="form-group">
  <label class="col-md-10 control-label" for="cantidad">Cantidad</label>  
  <div class="col-md-10">
  <input id="cantidad" value ="<?php echo $mireq[0]['cantidad']; ?>" name="cantidad" type="text" placeholder="Cantidad" class="form-control input-md" required="">
    
  </div>
</div>
    </div>
    <div class="col-sm">
    <div class="form-group">
    <label class="col-md-10 control-label" for="registry">Propietario Requisicion</label>  
  <div class="col-md-10">
<select name="registry" id="registry" class="form-control">
<?=$litadoUsuarios?>
</select>
</div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-sm">
    
    </div>
    <div class="col-sm">
      
    </div>
    <div class="col-sm">
      
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-sm">
    <button id="guardaruno" name="guardaruno" class="btn btn-primary col-md-20"><?php if($_GET['id']>0) { echo "Actualizar Requisicion"; } else { echo "Guardar Requisicion";} ?></button>
    </div>

    <?php if($id>0){
        ?>
     
      <div class="col-sm">
      <button type="button" class="btn btn-secondary col-md-20" data-toggle="modal" data-target="#exampleModal" id="paso1">
        Condiciones y Funciones
      </button>
      </div>
      <div class="col-sm" <?php if($_SESSION['paso']>=2){ echo ""; } else { echo "style='display: none;'"; }  ?>>
      <button type="button" class="btn btn-secondary col-md-20" data-toggle="modal" data-target="#responsabilidades" id="paso2">
        Responsabilidades
      </button>
      </div>
      <div class="col-sm" <?php if($_SESSION['paso']>=3){ echo ""; } else { echo "style='display: none;'"; }  ?>>
      <button type="button" class="btn btn-secondary col-md-20" data-toggle="modal" data-target="#formacion" id="paso3"> 
        Formacion y Experiencia
      </button>
      </div>
      <div class="col-sm" <?php if($_SESSION['paso']>=4){ echo ""; } else { echo "style='display: none;'"; }  ?>>
      <button type="button" class="btn btn-secondary col-md-20" data-toggle="modal" data-target="#habilidades" id="paso4">
      Habildiades y Competencias
      </button>
      </div>

      <div class="col-sm" <?php if($_SESSION['paso']==5){ echo ""; } else { echo "style='display: none;'"; }  ?>>
      <a href="home.php?ctr=requisicion&acc=altareq&id=<?php echo $mireq[0]['id'];?>&empresol=<?php echo $mireq[0]['empresaclientet'];?>" class="btn btn-success col-md-20" id="final">
        Terminar Requisicion
      </a>
      </div>
      <?php } ?>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-sm">
    
    </div>
    <div class="col-sm">
      
    </div>
    <div class="col-sm">
      
    </div>
  </div>
</div>
<br><br><br>


</fieldset>
</form>

<script>




</script>