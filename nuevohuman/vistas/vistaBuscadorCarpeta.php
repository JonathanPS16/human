<form class="generador" id="form1" name="form1" method="post" action="home.php?ctr=buscardorCarpetas&acc=buscadorFiltro">
<!-- Form Name -->

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="documento">Documento</label>  
  <div class="col-md-4">
  <input id="documento" name="documento" type="text" placeholder="documento" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="contrato"># Contrato</label>  
  <div class="col-md-4">
  <input id="contrato" name="contrato" type="text" placeholder="# Contrato" class="form-control input-md" >
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="anio">Año</label>
  <div class="col-md-4">
    <select id="anio" name="anio" class="form-control">
	<?php 
	for($i=2017;$i<=date('Y');$i++){
		echo '<option value="'.$i.'">'.$i.'</option>';
	}
	?>
    </select>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Consultar</button>
  </div>
</div>

</fieldset>
</form>


