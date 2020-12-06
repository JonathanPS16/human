<?php 
require_once('conect/clases.php');
$objconsulta= new consultas();
$menus=$objconsulta->menulateral();

for($i=0; $i<count($menus); $i++) {
     
     $titulo = $menus[$i]['titulo'];
     $datos = $menus[$i]['datos'];
     if(count($datos)>0){
     ?>
	<li>
                    <a href="#homeSubmenu<?php echo $i; ?>" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><?php echo $titulo;?></a>
                    <ul class="collapse list-unstyled" id="homeSubmenu<?php echo $i; ?>">
						
						<?php 
						for($j=0; $j<count($datos); $j++) {
							$label=$datos[$j]['menu'];
							$url=$datos[$j]['url'];
							$imagen=$datos[$j]['img'];
							?>
								<li>
									<a href="home.php?ctr=<?php echo  $url; ?>"><?php echo $label;?></a>
								</li>

							<?php 
						  }
                 ?>
            
                    </ul>
                </li>
     <?php  
   
    }
    }

?>
       <li>
	<a href="#homeSubmenuusu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Usuario</a>
	 <ul class="collapse list-unstyled" id="homeSubmenuusu">
		 <li>
									<a href="home.php?ctr=admon&acc=cambioclave">Cambiar Clave</a>
			 						<a href="home.php?ctr=cerrarsesion">Cerrar Sesion</a>
								</li>
	</ul>
</li>      
         