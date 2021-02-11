<h5>Formulario de Retiro</h5><br>
<form action="home.php?ctr=retiro&acc=guardarsolicitud" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" id="id" value="<?php echo $listatemporales[0]['id_accidente']; ?>">
  <div class="form-group row">
    <label for="funcionario" class="col-4 col-form-label">Nombre Funcionario</label> 
    <div class="col-8">
      <input id="funcionario" name="funcionario" value ="" type="text" class="form-control" placeholder="Nombre Funcionario">
    </div>
  </div>
  <div class="form-group row">
    <label for="cedula" class="col-4 col-form-label">Cedula</label> 
    <div class="col-8">
      <input id="cedula" name="cedula" type="text" value ="<?php echo $listatemporales[0]['cedula']; ?>" required="required" class="form-control" placeholder="Cedula">
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
    <label for="observaciones" class="col-4 col-form-label">Observaciones</label> 
    <div class="col-8">
      <textarea id="observaciones" name="observaciones" cols="40" rows="5" class="form-control" required="required"></textarea>
    </div>
  </div> 

  <div class="custom-file">
    <input type="file" class="custom-file-input" id="archivo1" name="archivo1">
    <label class="custom-file-label" for="archivo1"> Renuncia </label>
  </div>

  <div class="custom-file">
    <input type="file" class="custom-file-input" id="archivo2" name="archivo2" >
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