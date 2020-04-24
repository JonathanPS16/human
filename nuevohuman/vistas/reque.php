<form class="form-horizontal" method="post" action="home.php?ctr=requisicion&acc=guardarReq">
<input type="hidden" name="id" value="<?php echo $id; ?>">
<fieldset>

<!-- Form Name -->
<legend>Formulario Principal</legend>

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
