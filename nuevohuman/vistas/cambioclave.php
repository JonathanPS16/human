<h5>Cambio de Contraseña</h5>

<form action="home.php?ctr=admon&acc=cambiarclave" method="post">
  <div class="form-group row">
    <label for="pass" class="col-4 col-form-label">Contraseña</label> 
    <div class="col-8">
      <input id="pass" name="pass" placeholder="Contraseña" type="password" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="passverifi" class="col-4 col-form-label">Repetir Contraseña</label> 
    <div class="col-8">
      <input id="passverifi" name="passverifi" placeholder="Repetir Contraseña" type="password" class="form-control" required="required">
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Cambiar Clave</button>
    </div>
  </div>
</form>