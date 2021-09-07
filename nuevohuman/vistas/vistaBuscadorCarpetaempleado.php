<?php 
$valida = "";
$select = "";
if($_SESSION['id_perfil']==8)
{
    $valida = $_SESSION['usuario'];
    $select = "readonly";
}
?>
<form class="generador" id="form1" name="form1" method="post" action="home.php?ctr=buscardorCarpetas&acc=buscadorFiltro&distinto=S">
<!-- Form Name -->

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="documento">Documento</label>  
  <div class="col-md-4">
  <input id="documento" name="documento" type="text" placeholder="documento" class="form-control input-md" required="" value="<?php echo $valida;?>" <?php echo $select;?>>
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


