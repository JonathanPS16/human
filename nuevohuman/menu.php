<?php 
require_once('conect/clases.php');
$objconsulta= new consultas();

$menus=$objconsulta->menulateral();
//var_export($menus);
?>

<ul class="navbar-nav mr-auto">
<li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Usuario
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                   <a class="dropdown-item" href="home.php?ctr=admon&acc=cambioclave">Cambio Clave</a>
                   <div class="dropdown-divider"></div>
                   <a class="dropdown-item" href="home.php?ctr=cerrarsesion">Cerrar Sesion</a>
                </div>
            </li>

<?php
            for($i=0; $i<count($menus); $i++) {
     
     $titulo = $menus[$i]['titulo'];
     $datos = $menus[$i]['datos'];
     if(count($datos)>0){
     ?>
     <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $titulo;?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <?php 
                for($j=0; $j<count($datos); $j++) {
                    $label=$datos[$j]['menu'];
                    $url=$datos[$j]['url'];
                    $imagen=$datos[$j]['img'];
                    ?>
                    <a class="dropdown-item" href="home.php?ctr=<?php echo  $url; ?>"><?php echo $label;?></a>
                    <?php 
                  }
                 ?>
                </div>
            </li>
     <?php
   
           /*for($j=0; $j<count($datos); $j++) {
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
   
   
          }*/
    }
   
    }
?>
             
          </ul>