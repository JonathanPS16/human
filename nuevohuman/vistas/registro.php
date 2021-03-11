<article class="card-body mx-auto" style="max-width: 60%;"><center>
<img class="mb-4" src="img/logo_negro.jpg" alt="" width="228" height="72"></center>
  <form action="home.php?ctr=admon&acc=guardarUsuario" method="post">
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="nombre" id="nombre" class="form-control" placeholder="Nombre y Apellido" type="text" required="required">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-id-badge"></i> </span>
		 </div>
        <input name="documento" id="documento" class="form-control" placeholder="Documento" type="number" required="required">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input name="correo" id="correo" class="form-control" placeholder="Correo Electronico" type="email" required="required">
    </div> <!-- form-group// -->
    <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-building"></i> </span>
		</div>
		<select class="form-control" id="perfilinicial" name="perfilinicial" required="required">
			<option selected="">Seleccion Tipo Perfil</option>
		<?php
			for($ja=0; $ja<count($listamenus);$ja++) {
			$id_perfil = $listamenus[$ja]['id_perfil'];
			$menu = $listamenus[$ja]['nombreperfil'];
			echo '<option value="'.$id_perfil.'" '.$sel.'>'.$menu.'</option>';
		}
		?>	
		</select>
	</div> <!-- form-group end.// -->
	<div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-building"></i> </span>
		</div>
		<select class="form-control" id="centrocostos[]" name="centrocostos[]" required="required" multiple>
		<?php
			for($ja=0; $ja<count($listacentros);$ja++) {
			$id_centro = $listacentros[$ja]['id_centro'];
			$empresausuaria = $listacentros[$ja]['empresausuaria'];
			$empresagen = $listacentros[$ja]['nombretemporal'];

			echo '<option value="'.$id_centro.'">'.$empresausuaria.' ('.$empresagen.')</option>';
		}
		?>	
		</select>
	</div> <!-- form-group end.// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input class="form-control" id="clave" name="clave" placeholder="Clave" type="password" required="required">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input class="form-control" id="clavere" name="clavere" placeholder="Repertir Clave" type="password" required="required">
    </div> <!-- form-group// -->                                      
    <div class="form-group">
    <input type="hidden" id="vali" name="vali" value="si">
        <button type="submit" class="btn btn-primary btn-block">Crear Cuenta</button>
    </div> <!-- form-group// -->                                                                     
</form>
</article>