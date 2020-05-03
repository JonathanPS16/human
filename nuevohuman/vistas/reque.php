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
  RESPONSABILIDADES
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
        
      
    
        
      </div>
      
    </div>
  </div>
</div>

<!--MODAL-->

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#responsabilidades">
      RESPONSABILIDADES
    </button>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formacion">
      FORMACION ACADEMICA LABORAL
    </button>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#habilidades">
      HABILIDADES Y COMPETENCIAS
    </button>
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


