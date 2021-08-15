<?php
$litadoUsuarios = "";
for($a=0; $a<count($listausuariosgenerales);$a++){
  $selecteda ="";
  if($_SESSION['usuario']==$listausuariosgenerales[$a]['usuario']){
    $selecteda ="selected='selected'";
  }

  $litadoUsuarios.='<option value="'.$listausuariosgenerales[$a]['usuario'].'" '.$selecteda.'>'.$listausuariosgenerales[$a]['nombre'].'</option>';

}
?>
<h5>Contratacion Directa</h5><br>
<form action="home.php?ctr=requisicion&acc=savefirecta" method="post" enctype="multipart/form-data">
<div class="form-group row">
    <label for="empresacliente" class="col-4 col-form-label">Propietario Requisicion</label> 
    <div class="col-8">
      <select id="registry" name="registry" class="custom-select" required="required">
      <option value="0">Seleccione</option>
      <?php 
      for($a=0; $a<count($listausuariosgenerales);$a++){
        if($_SESSION['id_perfil']!="1") {
          $selecteda ="";
        if($_SESSION['usuario']==$listausuariosgenerales[$a]['usuario']){
          $selecteda ="selected='selected'";
          echo '<option value="'.$listausuariosgenerales[$a]['usuario'].'" '.$selecteda.'>'.$listausuariosgenerales[$a]['nombre'].'</option>';
        }
      
        } else {
          $selecteda ="";
          if($_SESSION['usuario']==$listausuariosgenerales[$a]['usuario']){
            $selecteda ="selected='selected'";
          }
        
          echo '<option value="'.$listausuariosgenerales[$a]['usuario'].'" '.$selecteda.'>'.$listausuariosgenerales[$a]['nombre'].'</option>';

        }
        
      
      }
      ?>
      </select>
    </div>
  </div>

  
  <div class="form-group row">
    <label for="empresaclientet" class="col-4 col-form-label">Empresa Temporal</label> 
    <div class="col-8">
      <?php 
      $valfuncion = 'onchange="validarusuarias()"';
      if(count($listatemporales)==1){
        $valfuncion = "";
      }
      ?>
      <select id="empresaclientet" name="empresaclientet" class="custom-select" required="required" <?php echo $valfuncion; ?>>
      <?php 
      if($valfuncion!=""){
        ?>
        <option value="">Seleccione</option>
        <?php 
      }
      
      for($i=0; $i<count($listatemporales);$i++){
        $id_temporal=$listatemporales[$i]['id_temporal'];
        $nombretemporal=$listatemporales[$i]['nombretemporal'];
        $slr = "";
        if ($mireq[0]['empresaclientet']== $id_temporal){
          $slr = 'selected="selected"';
        } else if(count($listatemporales)==1){
          $slr = 'selected="selected"';
        }

        echo '<option value="'.$id_temporal.'"  '.$slr.'>'.$nombretemporal.'</option>';
      }
      ?>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="empresacliente" class="col-4 col-form-label">Nombre Empresa Usuaria</label> 
    <div class="col-8">
      <select id="empresacliente" name="empresacliente" class="custom-select" required="required">
        <?php 
        if(count($listatemporalesusuarias)>1){
          ?>
          <option value="0">Seleccione</option>
          <?php
        } 
      for($i=0; $i<count($listatemporalesusuarias);$i++){
        $id_temporal=$listatemporalesusuarias[$i]['id_centro'];
        $nombretemporal=$listatemporalesusuarias[$i]['empresausuaria'];
        $empresapresaaaa=$listatemporalesusuarias[$i]['empresapres'];
        $slr = "";
        if ($mireq[0]['empresacliente']== $id_temporal){
          $slr = 'selected="selected"';
        }else if(count($listatemporalesusuarias)==1){
          $slr = 'selected="selected"';
        }
        echo '<option value="'.$id_temporal.'"  '.$slr.'>'.$nombretemporal.' ('.$empresapresaaaa.')</option>';
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
    <label for="centrocostosor" class="col-4 col-form-label">Centro Costros Empresa Cliente</label> 
    <div class="col-8">
      <input id="centrocostosor" name="centrocostosor" placeholder="Centro Costros Empresa Cliente" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="centrosucursal" class="col-4 col-form-label">Ciudad/Sucursal</label> 
    <div class="col-8">
      <input id="centrosucursal" name="centrosucursal" placeholder="Ciudad/Sucursal" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="funcionarioaut" class="col-4 col-form-label">Nombre Funcionario que Autoriza</label> 
    <div class="col-8">
      <input id="funcionarioaut" name="funcionarioaut" placeholder="Nombre Funcionario que Autoriza" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="cargofuncionarioaut" class="col-4 col-form-label">Cargo Funcionario que Autoriza</label> 
    <div class="col-8">
      <input id="cargofuncionarioaut" name="cargofuncionarioaut" placeholder="Cargo Funcionario que Autoriza" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="opbservacioncontratacion" class="col-4 col-form-label">Observaciones de Contratacion</label> 
    <div class="col-8">
      <input id="opbservacioncontratacion" name="opbservacioncontratacion" placeholder="Observaciones de Contratacion" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="funcionarioautorizath" class="col-4 col-form-label">Funcionario que Autoriza Talento Humano</label> 
    <div class="col-8">
      <input id="funcionarioautorizath" name="funcionarioautorizath" placeholder="Funcionario que Autoriza Talento Humano" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="cargofuncionarioth" class="col-4 col-form-label">Cargo Funcionario Talento Humano</label> 
    <div class="col-8">
      <input id="cargofuncionarioth" name="cargofuncionarioth" placeholder="Cargo Funcionario Talento Humano" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="fechaautori" class="col-4 col-form-label">Fecha Autorizacion</label> 
    <div class="col-8">
      <input id="fechaautori" name="fechaautori" type="date" class="form-control" required="required">
    </div>
  </div>

      <input id="firmaautoriza" name="firmaautoriza" placeholder="Presentarse con " type="hidden" value="Firmado Digitalmente" class="form-control" required="required">
  

  <div class="form-group row">
    <label for="archivo" class="col-4 col-form-label">Hoja de Vida</label> 
    <div class="col-8">
      <input id="archivo" name="archivo" placeholder="Hoja de Vida" type="file" class="form-control" required="required">
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Guardar</button>
    </div>
  </div>
</form>
