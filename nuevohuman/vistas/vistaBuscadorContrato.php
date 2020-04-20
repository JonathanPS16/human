				<?php
                $cedula=0;
                $campos= "";
                $nombre_empleado="";
                for($i=0; $i<count($certificados);$i++){
                    $datos = $certificados[$i]; 
                    if($datos['fecha_retiro']==""){
                        $campos1= 'a día de hoy'; 
                    } else { 
                        $campos1='al '.$datos['fecha_retiro'].''; 
                    } 
					$campos.='<div class="radio">
                    <label for="radios-0">
                    <input type="radio" name="contrato" value="'.$datos['contrato'].'" onclick="abrir()" > Contrato No. '.$datos['contrato'].' del  '.$datos['fecha_ingreso'].''.$campos1.'
                    <label>
                    </div>';  ?> 
					<?php	
					$cedula=$datos['cedula'];
                    $nombre_empleado=$datos['nombre_empleado'];
                }
				?>
            <form class="form-horizontal" name='laboral' method='post' action='home.php?ctr=buscardorCertificados&acc=generador'>
<fieldset>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombre">Nombre</label>  
  <div class="col-md-4">
  <input id="nombre" name="nombre" type="text" placeholder="Nombre" class="form-control input-md" readonly="readonly" required value="<?php  echo $nombre_empleado; ?>">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="numero">Número documento</label>  
  <div class="col-md-4">
  <input id="numero" name="numero" type="text" placeholder="Número documento" readonly="readonly" class="form-control input-md" required value="<?php  echo $cedula; ?>">
    
  </div>
</div>

<!-- Multiple Radios -->
<div class="form-group">
  <label class="col-md-4 control-label" for="radios">Contratos</label>
  <div class="col-md-4">
    <?php 
    echo $campos;
    ?>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-8">
    <input class="btn btn-primary" type='submit' value='Generar' />
    <a href="home.php?ctr=buscardorCertificados&acc=buscador" class="btn btn-info">Nueva Consulta</a>
    </div>
</div>

</fieldset>
<input type='hidden' readonly="readonly" name='tipo'  value="C.C." />
					<input type='hidden' name='tipocertificado' value="<?php  echo $tipocertificado; ?>" />
</form>
