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
<h5>Contratacion Directa Masiva</h5><br>
<form action="home.php?ctr=carguemasivo&acc=read" method="post" enctype="multipart/form-data">
<div class="form-group row">
    <label for="empresacliente" class="col-4 col-form-label">Propietario Requisicion</label> 
    <div class="col-8">
      <select id="registry" name="registry" class="custom-select" required="required">
      <option value="0">Seleccione</option>
      <?php 
      for($a=0; $a<count($listausuariosgenerales);$a++){
        if($_SESSION['id_perfil']!="4" && $_SESSION['id_perfil']!="1") {
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
    <label class="col-4 col-form-label" for="archivo">Archivo  Max(<?php echo maxfilesizelabel; ?>)</label> 
    <div class="col-8">
      <input id="archivo" name="archivo"  type="file" class="form-control" required="required">
    </div>
  </div>
  <input name="valor" type="hidden" id="valor" value="5">
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Guardar</button>
    </div>
  </div>
</form>
