<?php 
$txt = "";

if($tipo=="1"){
  $txt = "Certificaciones Laborales";
}


if($tipo=="2"){
  $txt = "Volantes de Pago";
}


if($tipo=="3"){
  $txt = "Ingresos y Retenciones";
}

?>
<h5>Carga de Archivo de <?php  echo  $txt;?></h5>
<form  action="home.php?ctr=carguemasivo&acc=read" method="post" enctype="multipart/form-data">
  <div class="form-group row">
    <label for="empresaprestadora" class="col-4 col-form-label">Empresa Prestadora</label> 
    <div class="col-8">
      <select id="empresaprestadora" name="empresaprestadora" class="custom-select" required="required">
      <?php 
        for($j=0; $j<count($listatemporalesa);$j++){
        $id_temporal=$listatemporalesa[$j]['id_temporal'];
        $nombretemporal =$listatemporalesa[$j]['nombretemporal'];	
        echo  '<option value="'.$id_temporal.'">'.$nombretemporal.'</option>';
      }?>
      </select>
    </div>
  </div>
  <input type="hidden" name="valor" id="valor" value="<?php echo $tipo; ?>">
  <div class="form-group row">
    <label for="archivo" class="col-4 col-form-label">Archivo</label> 
    <div class="col-8">
      <input id="archivo" name="archivo" type="file" class="form-control" required="required">
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Cargar Archivo</button>
    </div>
  </div>
</form>