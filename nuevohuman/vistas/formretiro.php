<?php 

if($listatemporales[0]['id_accidente']==""){
  $listatemporales[0]['id_accidente'] = 0;
}
?>
<h5>Formulario de Retiro</h5><br>
<form action="home.php?ctr=retiro&acc=guardarsolicitud" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" id="id" value="<?php echo $listatemporales[0]['id_accidente']; ?>">
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
    <label for="correoempleado" class="col-4 col-form-label">Correo</label> 
    <div class="col-8">
      <input id="correoempleado" name="correoempleado" type="text" class="form-control" required="required" value ="<?php echo $listatemporales[0]['correoempleado']; ?>" placeholder="Correo Empleado">
    </div>
  </div>
  <div class="form-group row">
    <label for="cedula" class="col-4 col-form-label">Horario Trabajo</label> 
    <div class="col-8">
      <input id="horario" name="horario" type="text" value ="<?php echo $listatemporales[0]['horario']; ?>" required="required" class="form-control" placeholder="Horario Laboral">
    </div>
  </div>

  <div class="form-group row">
    <label for="cedula" class="col-4 col-form-label">Centro de Costos</label> 
    <div class="col-8">
      <input id="centrocostos" name="centrocostos" type="text" value ="<?php echo $listatemporales[0]['centrocostos']; ?>" required="required" class="form-control" placeholder="Centro Costos">
    </div>
  </div>

  <div class="form-group row">
    <label for="cedula" class="col-4 col-form-label">Empresa Usuaria</label> 
    <div class="col-8">
      <input id="empresausuaria" name="empresausuaria" type="text" value ="<?php echo $listatemporales[0]['empresausuaria']; ?>" required="required" class="form-control" placeholder="Empresa Usuaria">
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
    <label for="retiro" class="col-4 col-form-label">Motivo Retiro</label> 
    <div class="col-8">
      <select id="retiro" name="retiro" class="custom-select" required="required">
        <option value="terminacion">Terminacion Contrato</option>
        <option value="renuncia">Renuncia voluntaria</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="fecharetiro" class="col-4 col-form-label">Fecha  de Retiro</label> 
    <div class="col-8">
      <input id="fecharetiro" name="fecharetiro" placeholder="yyy-mm-dd" type="text" required="required" class="form-control">
    </div>
  </div> 

  <div class="custom-file">
    <input type="file" class="custom-file-input" id="archivo1" name="archivo1">
    <label class="custom-file-label" for="archivo1"> Renuncia </label>
  </div>

  <div class="custom-file">
    <input type="file" class="custom-file-input" id="archivo2" name="archivo2">
    <label class="custom-file-label" for="archivo2">Paz y Salvo</label>
  </div>

  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Guardar Retiro</button>
    </div>
  </div>
</form>
<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>