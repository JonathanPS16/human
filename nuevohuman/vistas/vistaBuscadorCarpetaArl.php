<form class="generador" id="form1" name="form1" method="post" action="home.php?ctr=buscardorCarpetas&acc=buscadorArlFiltro">
<!-- Form Name -->




<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="anyo">Año</label>
  <div class="col-md-4">
    <select id="anyo" name="anyo" class="form-control">
	<?php 
	for($i=2017;$i<=date('Y');$i++){
		echo '<option value="'.$i.'">'.$i.'</option>';
	}
	?>
    </select>
  </div>
</div>
<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="mes">Mes</label>
  <div class="col-md-4">
    <select id="mes" name="mes" class="form-control" required>
        <option value="01">Enero</option>    
				<option value="02">Febrero</option>    
				<option value="03">Marzo</option>    
				<option value="04">Abril</option>    
				<option value="05">Mayo</option>   
				<option value="06">Junio</option>   
				<option value="07">Julio</option>   
				<option value="08">Agosto</option>   
				<option value="09">Septiembre</option>   
				<option value="10">Octubre</option>   
				<option value="11">Noviembre</option>   
				<option value="12">Diciembre</option> 
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="documento">Documento</label>  
  <div class="col-md-4">
  <input id="documento" name="documento" type="text" placeholder="documento" class="form-control input-md" required="">
    
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


