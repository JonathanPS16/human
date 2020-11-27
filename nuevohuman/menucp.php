<ul class="nav flex-column">
<?php 
require_once('conect/clases.php');
$objconsulta= new consultas();

$menus=$objconsulta->menulateral();
/*
var_dump($menu);
echo "<hr>";

$menus = array (array(
  "titulo"=>"TTULO SECCION",
  "datos"=>  array(
      array("menu"=>"HOLA 1 jajajaj","url"=>"url","img"=>"file"),array("menu"=>"HOLA 2 jajajaj","url"=>"url","img"=>"file")
      )
  )
  );
  var_dump($menus);*/

 for($i=0; $i<count($menus); $i++) {
     
  $titulo = $menus[$i]['titulo'];
  $datos = $menus[$i]['datos'];
  if(count($datos)>0){
  ?>
  <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span><?php echo $titulo;?></span>
          <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
  <?php

        for($j=0; $j<count($datos); $j++) {
          $label=$datos[$j]['menu'];
          $url=$datos[$j]['url'];
          $imagen=$datos[$j]['img'];
        ?>
            <li class="nav-item">
            <a class="nav-link" href="home.php?ctr=<?php echo  $url; ?>">
              <span data-feather="<?php echo  $imagen; ?>"></span>
              <?php echo $label;?>
            </a>
          </li>

            <?php 


       }
 }

 }
?>
<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>AJUSTES</span>
          <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <li class="nav-item">
            <a class="nav-link" href="home.php?ctr=admon&acc=cambioclave">
              <span data-feather="file"></span>
              Cambio Clave </a>
          </li>
        </ul>