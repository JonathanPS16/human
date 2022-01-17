<h5>Carga Centro de Costos</h5>
<form  action="home.php?ctr=incapacidad&acc=cargarcentros" method="post" enctype="multipart/form-data">
  <div class="form-group row">
    <label for="archivo" class="col-4 col-form-label">Archivo Centro Costos  Max(2 Mb)</label> 
    <div class="col-8">
      <input id="archivo" name="archivo" type="file" class="form-control">
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Cargar Archivo</button>
    </div>
  </div>
</form>