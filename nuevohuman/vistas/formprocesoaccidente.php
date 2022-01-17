<?php 

if($listatemporales[0]['id_accidente']==""){
  $listatemporales[0]['id_accidente'] = 0;
}
?>
<h5>Registro de Accidentes</h5><br>
<form action="home.php?ctr=accidentes&acc=guardarsolicitud" method="post" enctype="multipart/form-data">
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
    <label for="direccionempleado" class="col-4 col-form-label">Direccion Empleado</label> 
    <div class="col-8">
      <input id="direccionempleado" name="direccionempleado" type="text" value ="<?php echo $listatemporales[0]['direccionempleado']; ?>" required="required" class="form-control" placeholder="Direccion Empleado">
    </div>
  </div>
  <div class="form-group row">
    <label for="telefononempleado" class="col-4 col-form-label">Telefono Empleado</label> 
    <div class="col-8">
      <input id="telefononempleado" name="telefononempleado" type="text" value ="<?php echo $listatemporales[0]['telefononempleado']; ?>" required="required" class="form-control" placeholder="Telefono Empleado">
    </div>
  </div>

  <div class="form-group row">
    <label for="fechahoraacci" class="col-4 col-form-label">Fecha de Accidente y Hora </label> 
    <div class="col-8">
      <input id="fechahoraacci" name="fechahoraacci" type="text" value ="<?php echo $listatemporales[0]['fechahoraacci']; ?>" required="required" class="form-control" placeholder="Fecha de Accidente y Hora">
    </div>
  </div>

  <div class="form-group row">
    <label for="tiempoprevio" class="col-4 col-form-label">Total Tiempo Laborado Previo Al Accidente</label> 
    <div class="col-8">
      <input id="tiempoprevio" name="tiempoprevio" type="text" value ="<?php echo $listatemporales[0]['tiempoprevio']; ?>" required="required" class="form-control" placeholder="Total Tiempo Laborado Previo Al Accidente">
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
    <label for="fechaevento" class="col-4 col-form-label">Fecha Accidente</label> 
    <div class="col-8">
      <input id="fechaevento" name="fechaevento" type="date" class="form-control" required="required" value ="<?php echo $listatemporales[0]['fechaevento']; ?>" placeholder="yyyy-mm-dd">
    </div>
  </div>
  <div class="form-group row">
    <label for="descripcion" class="col-4 col-form-label">Descripcion suceso</label> 
    <div class="col-8">
      <textarea id="descripcion" name="descripcion" cols="40" rows="5" class="form-control" required="required"><?php echo $listatemporales[0]['descripcion']; ?></textarea>
    </div>
  </div> 
  <div class="form-group row">
    <label for="laborhabitual" class="col-4 col-form-label">¿Estaba realizando su Labor Habitual?</label> 
    <div class="col-8">
      <select id="laborhabitual" name="laborhabitual" class="custom-select">
        <option value="SI">SI</option>
        <option value="NO">NO</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="laborreal" class="col-4 col-form-label">Labor Realizada</label> 
    <div class="col-8">
      <textarea id="laborreal" name="laborreal" cols="40" rows="5" class="form-control"></textarea>
    </div>
  </div>
  <div class="form-group row">
    <label for="tipoaccidente" class="col-4 col-form-label">Tipo de Accidente</label> 
    <div class="col-8">
      <select id="tipoaccidente" name="tipoaccidente" class="custom-select" required="required">
        <option value="Deportivo">Deportivo</option>
        <option value="Propios del Trabajo">Propios del Trabajo</option>
        <option value="Recreativo o culturales">Recreativo o culturales</option>
        <option value="Transito">Transito</option>
        <option value="Violencia">Violencia</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="muerte" class="col-4 col-form-label">¿Causó la muerte del Trabajador?</label> 
    <div class="col-8">
      <select id="muerte" name="muerte" required="required" class="custom-select">
        <option value="No">No</option>
        <option value="Si">Si</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="lugaracciente" class="col-4 col-form-label">Lugar Donde Ocurrió el Accidente</label> 
    <div class="col-8">
      <select id="lugaracciente" name="lugaracciente" class="custom-select" required="required">
        <option value="Dentro de la Empresa">Dentro de la Empresa</option>
        <option value="Fuera de la Empresa">Fuera de la Empresa</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="sitioindicado" class="col-4 col-form-label">Indique cual sitio</label> 
    <div class="col-8">
      <select id="sitioindicado" name="sitioindicado" class="custom-select" required="required">
        <option value="Almacenes o Depósitos">Almacenes o Depósitos</option>
        <option value="Áreas de Producción">Áreas de Producción</option>
        <option value="Áreas recreativas O Deportivas">Áreas recreativas O Deportivas</option>
        <option value="Corredores o Pasillos">Corredores o Pasillos</option>
        <option value="Escaleras">Escaleras</option>
        <option value="Parqueadero o Áreas de Circulación Vehicular">Parqueadero o Áreas de Circulación Vehicular</option>
        <option value="Oficinas">Oficinas</option>
        <option value="Otras Áreas Comunes">Otras Áreas Comunes</option>
        <option value="Otro">Otro</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="otrolugar" class="col-4 col-form-label">Otro Lugar</label> 
    <div class="col-8">
      <input id="otrolugar" name="otrolugar" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="tipolesion" class="col-4 col-form-label">Tipo de Lesión</label> 
    <div class="col-8">
      <select id="tipolesion" name="tipolesion" class="custom-select" required="required">
        <option value="Fractura">Fractura</option>
        <option value="Luxación">Luxación</option>
        <option value="Torcedura, Esguince, Desgarro Muscular, Herida o Laceración De Músculo o Tendón Sin Herida">Torcedura, Esguince, Desgarro Muscular, Herida o Laceración De Músculo o Tendón Sin Herida</option>
        <option value="Conmoción o Trauma Interno">Conmoción o Trauma Interno</option>
        <option value="Amputación o Enucleación (Exclución o Pérdida De Ojo).">Amputación o Enucleación (Exclución o Pérdida De Ojo).</option>
        <option value="Herida">Herida</option>
        <option value="Trauma Superficial (Incluyen Rasguño, Punción o Pinchazo) ">Trauma Superficial (Incluyen Rasguño, Punción o Pinchazo)</option>
        <option value="Lesión en Ojo por Cuerpo Extraño">Lesión en Ojo por Cuerpo Extraño</option>
        <option value="Golpe o Contusión o Aplastamiento">Golpe o Contusión o Aplastamiento</option>
        <option value="Quemadura">Quemadura</option>
        <option value="Envenenamiento o Intoxicación Aguda o Alergia">Envenenamiento o Intoxicación Aguda o Alergia</option>
        <option value="Efecto Del Tiempo, Clima u otro Relacionado con el Ambiente">Efecto Del Tiempo, Clima u otro Relacionado con el Ambiente</option>
        <option value="Asfixia">Asfixia</option>
        <option value="Efecto de la Electricidad">Efecto de la Electricidad</option>
        <option value="Efecto Nocivo de la Radiación">Efecto Nocivo de la Radiación</option>
        <option value="Lesiones Múltiples">Lesiones Múltiples</option>
        <option value="Otro">Otro</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="otrotipolesion" class="col-4 col-form-label">Otro Tipo Lesion</label> 
    <div class="col-8">
      <input id="otrotipolesion" name="otrotipolesion" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="parteafectada" class="col-4 col-form-label">Parte del Cuerpo Aparentemente Afectado</label> 
    <div class="col-8">
      <select id="parteafectada" name="parteafectada" class="custom-select" required="required">
        <option value="Cabeza">Cabeza</option>
        <option value="Ojo">Ojo</option>
        <option value="Cuello">Cuello</option>
        <option value="Tronco (Incluye Espalda, Columna Vertebral, Médula Espinal, Pelvis).">Tronco (Incluye Espalda, Columna Vertebral, Médula Espinal, Pelvis).</option>
        <option value="Torax">Torax</option>
        <option value="Abdomen">Abdomen</option>
        <option value="Miembros Superiores">Miembros Superiores</option>
        <option value="Manos">Manos</option>
        <option value="Miembros Inferiores">Miembros Inferiores</option>
        <option value="Pies">Pies</option>
        <option value="Ubicaciones Múltiples ">Ubicaciones Múltiples</option>
        <option value="Lesiones Generales u Otras">Lesiones Generales u Otras</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="agenteaccidente" class="col-4 col-form-label">Agente del Accidente (Con que se Lesionó el Trabajador)</label> 
    <div class="col-8">
      <select id="agenteaccidente" name="agenteaccidente" class="custom-select" required="required">
        <option value="Máquinas y/o Equipos">Máquinas y/o Equipos</option>
        <option value="Medios De Transporte">Medios De Transporte</option>
        <option value="Aparatos">Aparatos</option>
        <option value="Herramientas, Implementos o Utensilios">Herramientas, Implementos o Utensilios</option>
        <option value="Materiales o Sustancias">Materiales o Sustancias</option>
        <option value="Radiaciones">Radiaciones</option>
        <option value="Ambiente De Trabajo (Incluyen Superficies de Tránsito y de Trabajo, Muebles, Tejados, En el Exterior, Interior o Subterráneos)">Ambiente De Trabajo (Incluyen Superficies de Tránsito y de Trabajo, Muebles, Tejados, En el Exterior, Interior o Subterráneos)</option>
        <option value="Otros Agentes no Calificados ">Otros Agentes no Calificados</option>
        <option value="Animales ( Vivos o Productos Animales)">Animales ( Vivos o Productos Animales)</option>
        <option value="Agentes No Clasificados por Falta de Dato">Agentes No Clasificados por Falta de Dato</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="mecanismo" class="col-4 col-form-label">Mecanismo o Forma del Accidente</label> 
    <div class="col-8">
      <select id="mecanismo" name="mecanismo" class="custom-select" required="required">
        <option value="Caída de Personas">Caída de Personas</option>
        <option value="Caída de Objetos">Caída de Objetos</option>
        <option value="Pisadas, Choques o Golpes">Pisadas, Choques o Golpes</option>
        <option value="Atrapamientos ">Atrapamientos</option>
        <option value="Sobre Esfuerzo, Esfuerzo Excesivo o Falso Movimiento">Sobre Esfuerzo, Esfuerzo Excesivo o Falso Movimiento</option>
        <option value="Exposición o Contacto Con Temperatura Extrema">Exposición o Contacto Con Temperatura Extrema</option>
        <option value="Exposición o Contacto Con La Electricidad">Exposición o Contacto Con La Electricidad</option>
        <option value="Exposición o Contacto Con Sustancias Nocivas O Radiaciones O Salpicaduras">Exposición o Contacto Con Sustancias Nocivas O Radiaciones O Salpicaduras</option>
        <option value="Otro">Otro</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="otromecanismo" class="col-4 col-form-label">Otro Mecanismo o Forma de Accidente</label> 
    <div class="col-8">
      <input id="otromecanismo" name="otromecanismo" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="personasprese" class="col-4 col-form-label">¿Hubo Personas Que Presenciaron El Accidente?</label> 
    <div class="col-8">
      <select id="personasprese" name="personasprese" class="custom-select" required="required">
        <option value="No">No</option>
        <option value="Si">Si</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="presenciantes" class="col-4 col-form-label">Datos Personas Presenciantes</label> 
    <div class="col-8">
      <textarea id="presenciantes" name="presenciantes" cols="40" rows="5" class="form-control"></textarea>
    </div>
  </div> 

  <div class="custom-file">
    <input type="file" class="custom-file-input" id="archivo1" name="archivo1">
    <label class="custom-file-label" for="archivo1"> Primer Archivo  Max(2 Mb)</label>
  </div>

  <div class="custom-file">
    <input type="file" class="custom-file-input" id="archivo2" name="archivo2">
    <label class="custom-file-label" for="archivo2">Segundo Archivo  Max(2 Mb)</label>
  </div>

  <div class="custom-file">
    <input type="file" class="custom-file-input" id="archivo3" name="archivo3">
    <label class="custom-file-label" for="archivo3">Tercer Archivo  Max(2 Mb)</label>
  </div>
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Guardar Accidente</button>
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