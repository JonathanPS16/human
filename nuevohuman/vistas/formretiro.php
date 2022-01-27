<?php //print_r($_POST);
$datos= explode("|", $_POST['validacion']);
//var_dump($datos);
?>
<h5>Formulario de Retiro</h5><br>
<form action="home.php?ctr=retiro&acc=guardarsolicitud" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" id="id" value="<?php echo $listatemporales[0]['id_accidente']; ?>">
  <div class="form-group row">
    <label for="funcionario" class="col-4 col-form-label">Nombre Funcionario</label> 
    <div class="col-8">
      <input id="funcionario" name="funcionario"  type="text" class="form-control" placeholder="Nombre Funcionario" value="<?php echo $datos[0]; ?>" readonly>
    </div>
  </div>
  <div class="form-group row">
    <label for="cedula" class="col-4 col-form-label">Cedula</label> 
    <div class="col-8">
      <input id="cedula" name="cedula" type="text" value ="<?php echo $datos[1]; ?>" required="required" class="form-control" placeholder="Cedula" readonly>
    </div>
  </div>
  <div class="form-group row">
    <label for="fecharetiro" class="col-4 col-form-label">Correo Electronico</label> 
    <div class="col-8">
      <input id="correo" name="correo"  type="text" required="required" class="form-control" value="<?php echo $datos[2]; ?>" readonly>
    </div>
  </div> 
  <div class="form-group row">
    <label for="celular" class="col-4 col-form-label">Celular</label> 
    <div class="col-8">
      <input id="celular" name="celular"  type="text" required="required" class="form-control" value="<?php echo $datos[5]; ?>" readonly>
    </div>
  </div> 
  <div class="form-group row">
    <label for="celular" class="col-4 col-form-label">Direccion</label> 
    <div class="col-8">
      <input id="direccion" name="direccion"  type="text" required="required" class="form-control" value="<?php echo $datos[8]; ?>" readonly>
    </div>
  </div> 
  <div class="form-group row">
    <label for="fecharetiro" class="col-4 col-form-label">Cargo</label> 
    <div class="col-8">
      <input id="cargo" name="cargo"  type="text" required="required" class="form-control" value="<?php echo $datos[4]; ?>" readonly>
    </div>
  </div> 
  <div class="form-group row">
    <label for="fecharetiro" class="col-4 col-form-label">Empresa Usuaria</label> 
    <div class="col-8">
      <input id="empresausuaria" name="empresausuaria"  type="text" required="required" class="form-control" value="<?php echo $datos[7]; ?>" readonly>
    </div>
  </div> 
  <div class="form-group row">
    <label for="fecharetiro" class="col-4 col-form-label">Centro de Costos</label> 
    <div class="col-8">
      <input id="centrocostos" name="centrocostos"  type="text" required="required" class="form-control" value="<?php echo $datos[6]; ?>" readonly>
    </div>
  </div> 
  <div class="form-group row">
    <label for="retiro" class="col-4 col-form-label">Motivo Retiro</label> 
    <div class="col-8">
      <select id="retiro" name="retiro" class="custom-select" required="required">
        <option value="terminacion">Terminacion Contrato</option>
        <option value="renuncia">Renuncia voluntaria</option>
        <option value="otro">Otro Motivo</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="fecharetiro" class="col-4 col-form-label">Fecha  de Retiro</label> 
    <div class="col-8">
      <input id="fecharetiro" name="fecharetiro" placeholder="yyy-mm-dd" type="date" required="required" class="form-control">
    </div>
  </div>

  <div class="form-group row">
    <label for="fecharetiro" class="col-4 col-form-label">Fecha Notificacion</label> 
    <div class="col-8">
      <input id="fechanotificacion" name="fechanotificacion" placeholder="yyy-mm-dd" type="date" required="required" class="form-control">
    </div>
  </div>
  
  <div class="form-group row">
    <label for="observaciones" class="col-4 col-form-label">Observaciones</label> 
    <div class="col-8">
      <textarea id="observaciones" name="observaciones" cols="40" rows="5" class="form-control" required="required"></textarea>
    </div>
  </div> 


  <div class="form-group row">
    <label for="archivo1" class="col-4 col-form-label">Renuncia  Max(<?php echo maxfilesizelabel; ?>)</label> 
    <div class="col-8">
    <input type="file"  id="archivo1" name="archivo1">
    </div>
  </div> 

  <div class="form-group row">
    <label for="archivo2" class="col-4 col-form-label">Paz y Salvo  Max(<?php echo maxfilesizelabel; ?>)</label> 
    <div class="col-8">
    <input type="file" id="archivo2" name="archivo2" >
    </div>
  </div> 
  <input type="hidden" name="fechaingreso" id="fechaingreso" value ="<?php echo $datos[9]; ?>">
  <div >
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Guardar Retiro</button>
    </div>
  </div>
</form>
<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  alert($(this).id());
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>