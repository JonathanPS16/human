<?php 

if($listatemporales[0]['id_proceso']==""){
  $listatemporales[0]['id_proceso'] = 0;
}
?>

<form action="home.php?ctr=proceso&acc=guardarsolicitud" method="post" >
<input type="hidden" name="id" id="id" value="<?php echo $listatemporales[0]['id_proceso']; ?>">
  <div class="form-group row">
    <label for="funcionario" class="col-4 col-form-label">Nombre Funcionario</label> 
    <div class="col-8">
      <input id="funcionario" name="funcionario" value ="<?php echo $listatemporales[0]['nombrefuncionario']; ?>" type="text" class="form-control" placeholder="Nombre Funcionario">
    </div>
  </div>
  <div class="form-group row">
    <label for="cargo" class="col-4 col-form-label">Cargo</label> 
    <div class="col-8">
      <input id="cargo" name="cargo" type="text" value ="<?php echo $listatemporales[0]['cargo']; ?>" required="required" class="form-control" placeholder="Cargo">
    </div>
  </div>
  <div class="form-group row">
    <label for="cedula" class="col-4 col-form-label">Cedula</label> 
    <div class="col-8">
      <input id="cedula" name="cedula" type="text" value ="<?php echo $listatemporales[0]['cedula']; ?>" required="required" class="form-control" placeholder="Cedula">
    </div>
  </div>
  <div class="form-group row">
    <label for="lugartrabajo" class="col-4 col-form-label">Lugar Trabajo</label> 
    <div class="col-8">
      <input id="lugartrabajo" name="lugartrabajo" type="text" value ="<?php echo $listatemporales[0]['lugartrabajo']; ?>" class="form-control" placeholder="Lugar Trabajo">
    </div>
  </div>
  <div class="form-group row">
    <label for="jefe" class="col-4 col-form-label">Jefe Inmediato</label> 
    <div class="col-8">
      <input id="jefe" name="jefe" type="text" required="required" value ="<?php echo $listatemporales[0]['jefeinmediato']; ?>" class="form-control" placeholder="Jefe Inmediato">
    </div>
  </div>
  <div class="form-group row">
    <label for="correojefe" class="col-4 col-form-label">Correo Jefe Inmediato</label> 
    <div class="col-8">
      <input id="correojefe" name="correojefe" type="text" class="form-control" required="required" value ="<?php echo $listatemporales[0]['coreojefe']; ?>" placeholder="Correo Jefe Inmediato">
    </div>
  </div>
  <div class="form-group row">
    <label for="fechaevento" class="col-4 col-form-label">Fecha Evento</label> 
    <div class="col-8">
      <input id="fechaevento" name="fechaevento" type="text" class="form-control" required="required" value ="<?php echo $listatemporales[0]['fechaevento']; ?>" placeholder="yyyy-mm-dd">
    </div>
  </div>
  <div class="form-group row">
    <label for="descripcion" class="col-4 col-form-label">Descripcion suseso</label> 
    <div class="col-8">
      <textarea id="descripcion" name="descripcion" cols="40" rows="5" class="form-control" required="required"><?php echo $listatemporales[0]['descripcion']; ?></textarea>
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Guardar Proceso</button>
    </div>
  </div>
</form>