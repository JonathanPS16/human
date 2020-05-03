<?php 
$title="FORMULARIO REQUISICION";
if($id>0){
  ?>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  CONDICIONES Y FUNCIONES
</button>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#responsabilidades">
  RESPONSABILIDADES
</button>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formacion">
  FORMACION Y EXPERIENCIA
</button>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#habilidades">
HABILIDADES Y COMPETENCIAS
</button>

    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">CONDICIONES SALARIALES Y FUNCIONES</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      <form class="form-horizontal" method="post" action="home.php?ctr=requisicion&acc=guardarReqCondiciones">
      <input type="hidden" id="id" name="id" value="<?=$id?>">
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="salariobasico">Salario  Básico 	</label>  
  <div class="col-md-8">
  <input id="salariobasico" name="salariobasico" type="text" placeholder="Salario  Básico 	" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="comisiones">Comisiones 	</label>  
  <div class="col-md-8">
  <input id="comisiones" name="comisiones" type="text" placeholder="Comisiones 	" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="rodamiento">Rodamiento	</label>  
  <div class="col-md-8">
  <input id="rodamiento" name="rodamiento" type="text" placeholder="Rodamiento	" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="bonificacion">Bonificacion 	</label>  
  <div class="col-md-8">
  <input id="bonificacion" name="bonificacion" type="text" placeholder="Bonificacion 	" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="otraingreso">Otro 	</label>  
  <div class="col-md-8">
  <input id="otraingreso" name="otraingreso" type="text" placeholder="Otro 	" class="form-control input-md">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="funciones">Funciones</label>  
  <div class="col-md-8">
  <input id="funciones" name="funciones" type="text" placeholder="Funciones" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
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
        
      <form method="post" action="home.php?ctr=requisicion&acc=guardarReqRespo">
      <input type="hidden" id="id" name="id" value="<?=$id?>">
  <div class="form-group row">
    <label class="col-4">Personas a Cargo</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="acargo" id="acargo_0" type="radio" required="required" class="custom-control-input" value="SI"> 
        <label for="acargo_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="acargo" id="acargo_1" type="radio" required="required" class="custom-control-input" value="NO"> 
        <label for="acargo_1" class="custom-control-label">NO</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Equipos</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="equipos" id="equipos_0" type="radio" class="custom-control-input" value="SI" required="required"> 
        <label for="equipos_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="equipos" id="equipos_1" type="radio" class="custom-control-input" value="NO" required="required"> 
        <label for="equipos_1" class="custom-control-label">NO</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Dinero</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="dinero" id="dinero_0" type="radio" required="required" class="custom-control-input" value="SI"> 
        <label for="dinero_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="dinero" id="dinero_1" type="radio" required="required" class="custom-control-input" value="NO"> 
        <label for="dinero_1" class="custom-control-label">NO</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Materiales y Mercancía</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="materiales" id="materiales_0" type="radio" class="custom-control-input" value="SI" required="required"> 
        <label for="materiales_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="materiales" id="materiales_1" type="radio" class="custom-control-input" value="NO" required="required"> 
        <label for="materiales_1" class="custom-control-label">NO</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Herramientas</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="herramientas" id="herramientas_0" type="radio" class="custom-control-input" value="SI" required="required"> 
        <label for="herramientas_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="herramientas" id="herramientas_1" type="radio" class="custom-control-input" value="NO" required="required"> 
        <label for="herramientas_1" class="custom-control-label">NO</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Documentos</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="documentos" id="documentos_0" type="radio" class="custom-control-input" value="SI" required="required"> 
        <label for="documentos_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="documentos" id="documentos_1" type="radio" class="custom-control-input" value="NO" required="required"> 
        <label for="documentos_1" class="custom-control-label">NO</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Información Confidencial</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="confidencial" id="confidencial_0" type="radio" class="custom-control-input" value="SI" required="required"> 
        <label for="confidencial_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="confidencial" id="confidencial_1" type="radio" class="custom-control-input" value="NO" required="required"> 
        <label for="confidencial_1" class="custom-control-label">NO</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Valores</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="valores" id="valores_0" type="radio" class="custom-control-input" value="SI" required="required"> 
        <label for="valores_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="valores" id="valores_1" type="radio" class="custom-control-input" value="NO" required="required"> 
        <label for="valores_1" class="custom-control-label">NO</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="otrosresponsabilidades" class="col-4 col-form-label">Otros</label> 
    <div class="col-8">
      <textarea id="otrosresponsabilidades" name="otrosresponsabilidades" cols="40" rows="5" class="form-control"></textarea>
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
      <div class="col-8">
    <h6>Formación Académica</h6>
    </div>
    <form  method="post" action="home.php?ctr=requisicion&acc=guardarReqExper">
      <input type="hidden" id="id" name="id" value="<?=$id?>">
  <div class="form-group row">
    <label for="primaria" class="col-4 col-form-label">Primaria</label> 
    <div class="col-8">
      <input id="primaria" name="primaria" placeholder="Titulo Obtenido / Nivel Mínimo" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="secundaria" class="col-4 col-form-label">Secundaria</label> 
    <div class="col-8">
      <input id="secundaria" name="secundaria" placeholder="Titulo Obtenido / Nivel Mínimo " type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="tecnico" class="col-4 col-form-label">Técnico</label> 
    <div class="col-8">
      <input id="tecnico" name="tecnico" placeholder="Titulo Obtenido / Nivel Mínimo 				" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="tecnologo" class="col-4 col-form-label">Tecnólogo</label> 
    <div class="col-8">
      <input id="tecnologo" name="tecnologo" placeholder="Titulo Obtenido / Nivel Mínimo 	" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="profesional" class="col-4 col-form-label">Profesional</label> 
    <div class="col-8">
      <input id="profesional" name="profesional" placeholder="Titulo Obtenido / Nivel Mínimo 	" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="otrosestudios" class="col-4 col-form-label">Otros</label> 
    <div class="col-8">
      <textarea id="otrosestudios" name="otrosestudios" cols="40" rows="5" class="form-control" required="required"></textarea>
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
      <input id="minimaexpe" name="minimaexpe" placeholder="Experiencia Minima" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Educación homologable  por Experiencia</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="experienciahomolo" id="experienciahomolo_0" type="radio" class="custom-control-input" value="SI" required="required"> 
        <label for="experienciahomolo_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="experienciahomolo" id="experienciahomolo_1" type="radio" class="custom-control-input" value="NO" required="required"> 
        <label for="experienciahomolo_1" class="custom-control-label">NO</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="observacionesexp" class="col-4 col-form-label">Observaciones Experiencia Laboral</label> 
    <div class="col-8">
      <textarea id="observacionesexp" name="observacionesexp" cols="40" rows="5" required="required" class="form-control"></textarea>
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
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">HABILIDADES Y COMPETENCIAS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
    <form  method="post" action="home.php?ctr=requisicion&acc=guardarReqHabilidades">
      <input type="hidden" id="id" name="id" value="<?=$id?>">
      <div class="form-group row">
    <label class="col-4">Adaptabilidad a Normas y Ambiente de Trabajo</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="adaptabilidad" id="adaptabilidad_0" type="radio" class="custom-control-input" value="SI" required="required"> 
        <label for="adaptabilidad_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="adaptabilidad" id="adaptabilidad_1" type="radio" class="custom-control-input" value="NO" required="required"> 
        <label for="adaptabilidad_1" class="custom-control-label">NO</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Administración del Tiempo</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="administracion" id="administracion_0" type="radio" required="required" class="custom-control-input" value="SI"> 
        <label for="administracion_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="administracion" id="administracion_1" type="radio" required="required" class="custom-control-input" value="NO"> 
        <label for="administracion_1" class="custom-control-label">NO</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Análisis y Solución De Problemas</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="analisis" id="analisis_0" type="radio" required="required" class="custom-control-input" value="SI"> 
        <label for="analisis_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="analisis" id="analisis_1" type="radio" required="required" class="custom-control-input" value="NO"> 
        <label for="analisis_1" class="custom-control-label">NO</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Capacidad De Gestión</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="gestion" id="gestion_0" type="radio" required="required" class="custom-control-input" value="SI"> 
        <label for="gestion_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="gestion" id="gestion_1" type="radio" required="required" class="custom-control-input" value="NO"> 
        <label for="gestion_1" class="custom-control-label">NO</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Capacidad De Negociación</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="negociacion" id="negociacion_0" type="radio" required="required" class="custom-control-input" value="SI"> 
        <label for="negociacion_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="negociacion" id="negociacion_1" type="radio" required="required" class="custom-control-input" value="NO"> 
        <label for="negociacion_1" class="custom-control-label">NO</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Orientación al Cumplimiento Normas Y Procesos</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="normas" id="normas_0" type="radio" required="required" class="custom-control-input" value="SI"> 
        <label for="normas_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="normas" id="normas_1" type="radio" required="required" class="custom-control-input" value="NO"> 
        <label for="normas_1" class="custom-control-label">NO</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Disposición Hacia El Aprendizaje</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="aprendizaje" id="aprendizaje_0" type="radio" required="required" class="custom-control-input" value="SI"> 
        <label for="aprendizaje_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="aprendizaje" id="aprendizaje_1" type="radio" required="required" class="custom-control-input" value="NO"> 
        <label for="aprendizaje_1" class="custom-control-label">NO</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Flexibilidad</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="flexibilidad" id="flexibilidad_0" type="radio" required="required" class="custom-control-input" value="SI"> 
        <label for="flexibilidad_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="flexibilidad" id="flexibilidad_1" type="radio" required="required" class="custom-control-input" value="NO"> 
        <label for="flexibilidad_1" class="custom-control-label">NO</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Identificación Y Control Del Riesgo</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="riesgo" id="riesgo_0" type="radio" required="required" class="custom-control-input" value="SI"> 
        <label for="riesgo_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="riesgo" id="riesgo_1" type="radio" required="required" class="custom-control-input" value="NO"> 
        <label for="riesgo_1" class="custom-control-label">NO</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Innovación Y Creatividad</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="innovacion" id="innovacion_0" type="radio" required="required" class="custom-control-input" value="SI"> 
        <label for="innovacion_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="innovacion" id="innovacion_1" type="radio" required="required" class="custom-control-input" value="NO"> 
        <label for="innovacion_1" class="custom-control-label">NO</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Seguridad, Salud Ocupacional Y Medio Ambiente</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="ambiente" id="ambiente_0" type="radio" class="custom-control-input" value="SI" required="required"> 
        <label for="ambiente_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="ambiente" id="ambiente_1" type="radio" class="custom-control-input" value="NO" required="required"> 
        <label for="ambiente_1" class="custom-control-label">NO</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Observación Y Atención Al Detalle</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="observacion" id="observacion_0" type="radio" required="required" class="custom-control-input" value="SI"> 
        <label for="observacion_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="observacion" id="observacion_1" type="radio" required="required" class="custom-control-input" value="NO"> 
        <label for="observacion_1" class="custom-control-label">NO</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Orientación A Los Resultados</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="resultados" id="resultados_0" type="radio" required="required" class="custom-control-input" value="SI"> 
        <label for="resultados_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="resultados" id="resultados_1" type="radio" required="required" class="custom-control-input" value="NO"> 
        <label for="resultados_1" class="custom-control-label">NO</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Orientación Al Cliente Interno Y Externo</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="cliente" id="cliente_0" type="radio" required="required" class="custom-control-input" value="SI"> 
        <label for="cliente_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="cliente" id="cliente_1" type="radio" required="required" class="custom-control-input" value="NO"> 
        <label for="cliente_1" class="custom-control-label">NO</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Comunicación</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="comunicacion" id="comunicacion_0" type="radio" required="required" class="custom-control-input" value="SI"> 
        <label for="comunicacion_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="comunicacion" id="comunicacion_1" type="radio" required="required" class="custom-control-input" value="NO"> 
        <label for="comunicacion_1" class="custom-control-label">NO</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Orientación Tecnológica</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="tecnologica" id="tecnologica_0" type="radio" required="required" class="custom-control-input" value="SI"> 
        <label for="tecnologica_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="tecnologica" id="tecnologica_1" type="radio" required="required" class="custom-control-input" value="NO"> 
        <label for="tecnologica_1" class="custom-control-label">NO</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Planeación</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="planeacion" id="planeacion_0" type="radio" required="required" class="custom-control-input" value="SI"> 
        <label for="planeacion_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="planeacion" id="planeacion_1" type="radio" required="required" class="custom-control-input" value="NO"> 
        <label for="planeacion_1" class="custom-control-label">NO</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Relaciones Interpersonales</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="relaciones" id="relaciones_0" type="radio" required="required" class="custom-control-input" value="SI"> 
        <label for="relaciones_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="relaciones" id="relaciones_1" type="radio" required="required" class="custom-control-input" value="NO"> 
        <label for="relaciones_1" class="custom-control-label">NO</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Liderazgo</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="liderazgo" id="liderazgo_0" type="radio" required="required" class="custom-control-input" value="SI"> 
        <label for="liderazgo_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="liderazgo" id="liderazgo_1" type="radio" required="required" class="custom-control-input" value="NO"> 
        <label for="liderazgo_1" class="custom-control-label">NO</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Sensibilidad Organizacional</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="sensibilidad" id="sensibilidad_0" type="radio" required="required" class="custom-control-input" value="SI"> 
        <label for="sensibilidad_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="sensibilidad" id="sensibilidad_1" type="radio" required="required" class="custom-control-input" value="NO"> 
        <label for="sensibilidad_1" class="custom-control-label">NO</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Solución Y Manejo De Conflictos</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="conflictos" id="conflictos_0" type="radio" required="required" class="custom-control-input" value="SI"> 
        <label for="conflictos_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="conflictos" id="conflictos_1" type="radio" required="required" class="custom-control-input" value="NO"> 
        <label for="conflictos_1" class="custom-control-label">NO</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Tolerancia Al Trabajo Bajo Presión</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="tolerancia" id="tolerancia_0" type="radio" required="required" class="custom-control-input" value="SI"> 
        <label for="tolerancia_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="tolerancia" id="tolerancia_1" type="radio" required="required" class="custom-control-input" value="NO"> 
        <label for="tolerancia_1" class="custom-control-label">NO</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Trabajo En Equipo</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="equipo" id="equipo_0" type="radio" required="required" class="custom-control-input" value="SI"> 
        <label for="equipo_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="equipo" id="equipo_1" type="radio" required="required" class="custom-control-input" value="NO"> 
        <label for="equipo_1" class="custom-control-label">NO</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Otros habilidades y competencias</label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="habilidades" id="habilidades_0" type="radio" required="required" class="custom-control-input" value="SI"> 
        <label for="habilidades_0" class="custom-control-label">SI</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="habilidades" id="habilidades_1" type="radio" required="required" class="custom-control-input" value="NO"> 
        <label for="habilidades_1" class="custom-control-label">NO</label>
      </div>
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>

    
        
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

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="cargo">Nombre de Cargo</label>  
  <div class="col-md-4">
  <input id="cargo" name="cargo" type="text" placeholder="Nombre de Cargo" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="edadminima">Edad Mínima </label>  
  <div class="col-md-4">
  <input id="edadminima" name="edadminima" type="text" placeholder="Edad Mínima " class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="edadmaxima">Edad Máxima </label>  
  <div class="col-md-4">
  <input id="edadmaxima" name="edadmaxima" type="text" placeholder="Edad Máxima " class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="edadindiferente">Edad Indiferente</label>  
  <div class="col-md-4">
  <input id="edadindiferente" name="edadindiferente" type="text" placeholder="Edad Indiferente" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="horario ">Horario</label>  
  <div class="col-md-4">
  <input id="horario" name="horario" type="text" placeholder="Horario" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="tipocontrato">Tipo de Contrato</label>  
  <div class="col-md-4">
  <input id="tipocontrato" name="tipocontrato" type="text" placeholder="Tipo de Contrato" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Multiple Checkboxes -->
<div class="form-group">
  <label class="col-md-4 control-label" for="checkestados">Estado Civil</label>
  <div class="col-md-4">
  <div class="checkbox">
    <label for="checkestados-0">
      <input type="checkbox" name="checkestados[]" id="checkestados-0" value="1">
      Soltero
    </label>
	</div>
  <div class="checkbox">
    <label for="checkestados-1">
      <input type="checkbox" name="checkestados[]" id="checkestados-1" value="2">
      Casado
    </label>
	</div>
  <div class="checkbox">
    <label for="checkestados-2">
      <input type="checkbox" name="checkestados[]" id="checkestados-2" value="3">
      Indiferente
    </label>
	</div>
  </div>
</div>

<!-- Multiple Checkboxes -->
<div class="form-group">
  <label class="col-md-4 control-label" for="checkgenero">Genero</label>
  <div class="col-md-4">
  <div class="checkbox">
    <label for="checkgenero-0">
      <input type="checkbox" name="checkgenero[]" id="checkgenero-0" value="1">
      Masculino
    </label>
	</div>
  <div class="checkbox">
    <label for="checkgenero-1">
      <input type="checkbox" name="checkgenero[]" id="checkgenero-1" value="2">
      Femenino
    </label>
	</div>
  <div class="checkbox">
    <label for="checkgenero-2">
      <input type="checkbox" name="checkgenero[]" id="checkgenero-2" value="3">
      Otro
    </label>
	</div>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="cantidad">Cantidad</label>  
  <div class="col-md-4">
  <input id="cantidad" name="cantidad" type="text" placeholder="Cantidad" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="ciudadlaboral">Ciudad a Laborar</label>  
  <div class="col-md-4">
  <input id="ciudadlaboral" name="ciudadlaboral" type="text" placeholder="Ciudad a Laborar" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="jornadalaboral">Jornada Laboral</label>  
  <div class="col-md-4">
  <input id="jornadalaboral" name="jornadalaboral" type="text" placeholder="Jornada Laboral" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="guardaruno"></label>
  <div class="col-md-4">
    <button id="guardaruno" name="guardaruno" class="btn btn-primary">Guardar</button>
  </div>
</div>

</fieldset>
</form>


