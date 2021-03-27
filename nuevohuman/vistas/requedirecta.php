<h5>Contratacion Directa</h5><br>
<form action="home.php?ctr=requisicion&acc=savefirecta" method="post" enctype="multipart/form-data">
<div class="form-group row">
    <label for="empresacliente" class="col-4 col-form-label">Nombre Empresa Usuaria</label> 
    <div class="col-8">
      <select id="empresacliente" name="empresacliente" class="custom-select" required="required">
      <option value="0">Seleccione</option>
      <?php 
      for($i=0; $i<count($listatemporalesusuarias);$i++){
        $id_temporal=$listatemporalesusuarias[$i]['id_centro'];
        $nombretemporal=$listatemporalesusuarias[$i]['empresausuaria'];
        $empresapresaaaa=$listatemporalesusuarias[$i]['empresapres'];
        $slr = "";
        if ($mireq[0]['empresacliente']== $id_temporal){
          $slr = 'selected="selected"';
        }
        echo '<option value="'.$id_temporal.'"  '.$slr.'>'.$nombretemporal.' ('.$empresapresaaaa.')</option>';
      }
      ?>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="empresaclientet" class="col-4 col-form-label">Empresa Temporal</label> 
    <div class="col-8">
      <select id="empresaclientet" name="empresaclientet" class="custom-select" required="required">
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
<div class="form-group row">
    <label class="col-4 col-form-label" for="nombre">Nombre completo y Apellidos</label> 
    <div class="col-8">
      <input id="nombre" name="nombre" placeholder="Nombre completo y Apellidos" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="cedula" class="col-4 col-form-label">Cedula</label> 
    <div class="col-8">
      <input id="cedula" name="cedula" placeholder="# Cedula" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="numerocontacto" class="col-4 col-form-label">Numero de Contacto</label> 
    <div class="col-8">
      <input id="numerocontacto" name="numerocontacto" placeholder="Número telefónico de contacto" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="fechaingreso" class="col-4 col-form-label">Fecha Ingreso</label> 
    <div class="col-8">
      <input id="fechaingreso" name="fechaingreso" type="date" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="cargo" class="col-4 col-form-label">Correo Electronico</label> 
    <div class="col-8">
      <input id="correo" name="correo" placeholder="Correo Electronico" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="cargo" class="col-4 col-form-label">Cargo Desempeñar</label> 
    <div class="col-8">
      <input id="cargo" name="cargo" placeholder="Cargo Desempeñar" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Salario Devengar</label> 
    <div class="col-8">
      <input id="text" name="text" placeholder="Salario Devengar" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="tasaarl" class="col-4 col-form-label">Tasa de riesgo ARL</label> 
    <div class="col-8">
      <select id="tasaarl" name="tasaarl" class="custom-select" required="required">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
	<option value="5">5</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="jornadalaboral" class="col-4 col-form-label">Horario y Sitio de Trabajo</label> 
    <div class="col-8">
      <input id="jornadalaboral" name="jornadalaboral" placeholder="Horario y Sitio de Trabajo" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="ciudadlaboral" class="col-4 col-form-label">Ciudad Donde va a Laborar</label> 
    <div class="col-8">
      <input id="ciudadlaboral" name="ciudadlaboral" placeholder="Ciudad Donde va a Laborar" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="presentarsea" class="col-4 col-form-label">Presentarse con</label> 
    <div class="col-8">
      <input id="presentarsea" name="presentarsea" placeholder="Presentarse con " type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="archivo" class="col-4 col-form-label">Hoja de Vida</label> 
    <div class="col-8">
      <input id="archivo" name="archivo" placeholder="Hoja de Vida" type="file" class="form-control">
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Guardar</button>
    </div>
  </div>
</form>
