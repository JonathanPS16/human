<?php 
if($listatemporales[0]['id_proceso']==""){
  $listatemporales[0]['id_proceso'] = 0;
}
$explode = "";
if(isset($_POST['validacion']) && $_POST['validacion']!=""){
  $explode = explode("|", $_POST['validacion']) ;
  //var_export($_POST);
  
}

$litadoUsuarios = "";
for($a=0; $a<count($listausuariosgenerales);$a++){
  $selecteda ="";
  if($listatemporales[0]['grabador']!="" && ($listausuariosgenerales[$a]['usuario']==$listatemporales[0]['grabador'])){
    $selecteda ="selected='selected'";
  } else if($_SESSION['usuario']==$listausuariosgenerales[$a]['usuario']){
    $selecteda ="selected='selected'";
  }
  $litadoUsuarios.='<option value="'.$listausuariosgenerales[$a]['usuario'].'" '.$selecteda.'>'.$listausuariosgenerales[$a]['nombre'].'</option>';

}
?>
<br>
<h5>Solicitud Proceso Disciplinario</h5><br>
<form action="home.php?ctr=proceso&acc=guardarsolicitud" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" id="id" value="<?php echo $listatemporales[0]['id_proceso']; ?>">
<div class="form-group row">
    <label for="jefe" class="col-4 col-form-label">Propietario Solicitud</label> 
    <div class="col-8">
    <select name="registry" id="registry" class="form-control">
      <?php echo $litadoUsuarios; ?>
    </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="funcionario" class="col-4 col-form-label">Nombre Empleado</label> 
    <div class="col-8">
      <input id="funcionario" name="funcionario" value ="<?php 
      if(isset($_POST['validacion']) && $_POST['validacion']!=""){
        echo $explode[0];
      } else {
        echo $listatemporales[0]['nombrefuncionario'];
      }
      
       ?>" type="text" class="form-control" placeholder="Nombre Empleado" readonly="readonly">
    </div>
  </div>
  <div class="form-group row">
    <label for="cargo" class="col-4 col-form-label">Cargo</label> 
    <div class="col-8">
      <input id="cargo" name="cargo" type="text" value ="<?php 
      if(isset($_POST['validacion']) && $_POST['validacion']!=""){
        echo $explode[4];
      } else {
        echo $listatemporales[0]['cargo']; 
      } ?>
      
      " required="required" class="form-control" placeholder="Cargo" readonly="readonly">
    </div>
  </div>
  <div class="form-group row">
    <label for="cedula" class="col-4 col-form-label">Cedula</label> 
    <div class="col-8">
      <input id="cedula" name="cedula" type="text" value ="<?php 
      

      if(isset($_POST['validacion']) && $_POST['validacion']!=""){
        echo $explode[1];
      } else {
        echo $listatemporales[0]['cedula']; 
      }
      
      ?>" required="required" class="form-control" placeholder="Cedula" readonly="readonly">
    </div>
  </div>
  <div class="form-group row">
    <label for="cedula" class="col-4 col-form-label">Telefono</label> 
    <div class="col-8">
      <input id="telefono" name="telefono" type="text" value ="<?php 
      

      if(isset($_POST['validacion']) && $_POST['validacion']!=""){
        echo $explode[5];
      } else {
        echo $listatemporales[0]['cedula']; 
      }
      
      ?>" required="required" class="form-control" placeholder="Telefono" readonly="readonly">
    </div>
  </div>
<div class="form-group row">
    <label for="correoempleado" class="col-4 col-form-label">Correo</label> 
    <div class="col-8">
      <input id="correoempleado" name="correoempleado" type="text" class="form-control" required="required" value ="<?php 
      //echo $listatemporales[0]['correoempleado']; 
      if(isset($_POST['validacion']) && $_POST['validacion']!=""){
        echo $explode[2];
      } else {
        echo $listatemporales[0]['correoempleado']; 
      }
      ?>" placeholder="Correo Empleado" readonly="readonly">
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
      <input id="centrocostos" name="centrocostos" type="text" value ="<?php 
      //echo $listatemporales[0]['centrocostos'];
      if(isset($_POST['validacion']) && $_POST['validacion']!=""){
        echo $explode[3];
      } else {
        echo $listatemporales[0]['centrocostos']; 
      }
      ?>" required="required" class="form-control" placeholder="Centro Costos" readonly="readonly">
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
    <label for="testigo" class="col-4 col-form-label">Nombre Testigo</label> 
    <div class="col-8">
      <input id="testigo" name="testigo" type="text" required="required" value ="<?php echo $listatemporales[0]['testigo']; ?>" class="form-control" placeholder="Nombre Testigo">
    </div>
  </div>
  <div class="form-group row">
    <label for="cargotestigo" class="col-4 col-form-label">Cargo Testigo</label> 
    <div class="col-8">
      <input id="cargotestigo" name="cargotestigo" type="text" required="required" value ="<?php echo $listatemporales[0]['cargotestigo']; ?>" class="form-control" placeholder="Cargo Testigo">
    </div>
  </div>
  <div class="form-group row">
    <label for="correotestigo" class="col-4 col-form-label">Correo Testigo</label> 
    <div class="col-8">
      <input id="correotestigo" name="correotestigo" type="text" required="required" value ="<?php echo $listatemporales[0]['correotestigo']; ?>" class="form-control" placeholder="Correo Testigo">
    </div>
  </div>
  <div class="form-group row">
    <label for="telefonotestigo" class="col-4 col-form-label">Telefono Testigo</label> 
    <div class="col-8">
      <input id="telefonotestigo" name="telefonotestigo" type="text" required="required" value ="<?php echo $listatemporales[0]['telefonotestigo']; ?>" class="form-control" placeholder="Telefono Testigo">
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
    <label for="telefonojefei" class="col-4 col-form-label">Telefono Jefe Inmediato</label> 
    <div class="col-8">
      <input id="telefonojefei" name="telefonojefei" type="text" class="form-control" required="required" value ="<?php echo $listatemporales[0]['telefonojefei']; ?>" placeholder="Telefono Jefe Inmediato">
    </div>
  </div>
  <div class="form-group row">
    <label for="fechaevento" class="col-4 col-form-label">Fecha Evento</label> 
    <div class="col-8">
      <input id="fechaevento" name="fechaevento" type="date" class="form-control" required="required" value ="<?php echo $listatemporales[0]['fechaevento']; ?>" placeholder="yyyy-mm-dd">
    </div>
  </div>
  
  <div class="form-group row">
    <label for="descripcion" class="col-4 col-form-label">Descripcion suceso</label> 
    <div class="col-8">
    <p style="font-weight: bold;"><strong>Describa el Suceso Detalladamente Incluyendo Datos Concretos como Fecha, Hora, Area, ect.</strong></p>
      <textarea id="descripcion" name="descripcion" cols="40" rows="5" class="form-control" required="required"><?php echo $listatemporales[0]['descripcion']; ?></textarea>
    </div>
  </div> 

  <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Primer Archivo  Max(2 Mb)</label> 
    <div class="col-8">
    <input type="file" class="form-control" id="archivo1" name="archivo1">
    </div>
  </div>

  <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Segundo Archivo  Max(2 Mb)</label> 
    <div class="col-8">
    <input type="file" class="form-control" id="archivo2" name="archivo2">
    </div>
  </div>

  <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Tercer Archivo  Max(2 Mb)</label> 
    <div class="col-8">
    <input type="file" class="form-control" id="archivo3" name="archivo3">
    </div>
  </div>


  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Guardar Proceso</button>
      &nbsp;&nbsp;||&nbsp; &nbsp;<a href="home.php?ctr=proceso&acc=validinfo" class="btn btn-primary">Volver</a>
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