<h1 class="h2"><?php echo $titulo ;?></h1>

<form class="generador" id="form1" name="form1" method="post" action="consultar.php">

<?php $usuarioregistrado=$_GET['usuario']; 
      $rolusuario=$_GET['rolusuario']; 
   
?>
	<?php /** if(isset($_GET['dato'])):*/ ?>
	<?php if($_GET['dato']==2): ?>
		<div class="message error">No es permitido consultar otro usuario.</div>
	<?php endif; ?>
	<?php if(isset($_GET['message'])): ?>
		<div class="message error">No se encontraron registros para la b�squeda.</div>
	<?php endif; ?>
	<div class="cont" >
        <!-- Text input-->
        <div class="form-group">
        <label class="col-md-4 control-label" for="documento">Documento</label>  
        <div class="col-md-4">
        <input id="documento" name="documento" type="text" placeholder="Documento" class="form-control input-md" required>
        <input type="hidden" name="usuarioregistrado" value=<?php echo $usuarioregistrado;?> />
        <input type="hidden" name="rolusuario" value="administrator"> 
        </div>
        </div>

        <!-- Select Basic -->
        <div class="form-group">
        <label class="col-md-4 control-label" for="tipocertificado">Tipo Certificado</label>
        <div class="col-md-4">
            <select id="tipocertificado" name="tipocertificado" class="form-control" onclick="mostrarReferencia();">
            <option value="3">Certificado laboral</option>
            <option value="1">Comprobante de pago</option>
            <option value="2">Ingresos y Retenciones</option>			
            <option value="4">ARL</option>
            </select>
        </div>
        </div>
	</div>
	
  
	<div id="periodo" style="display:none;" >
		<div class="cont" >
			<div>
				<label>A&ntilde;o</br>
				<select name="anios" required >
				<!--option value="2016">2016</option-->
				<option value="2017">2017</option>
				<option value="2018">2018</option>
				<option value="2019">2019</option>
				</select>
				</label>
			</div>
			<div>	
				<label>Mes</br>
				<select name="mes"  required >
				<option value="1">Enero</option>
				<option value="2">Febrero</option>
				<option value="3">Marzo</option>
				<option value="4">Abril</option>
				<option value="5">Mayo</option>
				<option value="6">Junio</option>
				<option value="7">Julio</option>
				<option value="8">Agosto</option>
				<option value="9">Septiembre</option>
				<option value="10">Octubre</option>
				<option value="11">Noviembre</option>
				<option value="12">Diciembre</option>
				</select>
				</label>
			</div>
			<div>
				<label>Periodo</br>
				<select name="periodo"  required>
				<option value="1">1</option>
				<option value="2">2</option>
				</select>
				</label>
			</div>
		</div>
	</div>
  
    <div id="anio" style="display:none;" >
		<div>
			<label>A&ntilde;o</br>
				<select name="anio" required>
				<option value="2011">2011</option>
				<option value="2012">2012</option>
				<option value="2013">2013</option>
				<option value="2014">2014</option>
				<option value="2015">2015</option>
				<option value="2016">2016</option>
				<option value="2017">2017</option>
				<option value="2018">2018</option>

				</select>
				</label>
		</div>
	</div>
	
    <div id="arl" style="display:none;" >
		<div class="aniomes"> 
		  <label>A&ntilde;o</br>
		  	<!--select multiple name="anyo"-->    
			<select  name="anyoarl">    
				<option value="2017">2017</option>
				<option value="2018">2018</option>    
				<option value="2019">2019</option> 
			</select>
		  </label>
		
		  <label>Mes</br>
		  	<select  name="mesarl">    
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

		  </label>
		 </div> 
	</div>
	
	<input class="btn" type="submit" name="buscar" id="buscar" value="Enviar" />
	<a href="index.php" class="btn">Volver</a>
  	<!--div id="SPACE_TOTAL"></div-->
</form>

<script type="text/javascript">

function mostrarReferencia(){
	if (document.form1.tipocertificado.value == 1) {
		document.getElementById('periodo').style.display = 'block';
		document.getElementById('buscar').value = 'Descargar certificado';
	} else {
		document.getElementById('periodo').style.display='none';
	}
	if (document.form1.tipocertificado.value == 2) {
		document.getElementById('anio').style.display = 'block';
		document.getElementById('buscar').value = 'Enviar';
	} else {
		document.getElementById('anio').style.display='none';
	}
	if (document.form1.tipocertificado.value == 3) {
		document.getElementById('buscar').value = 'Enviar';
	}
	if (document.form1.tipocertificado.value == 4) {
		document.getElementById('arl').style.display = 'block';
		document.getElementById('buscar').value = 'Enviar';
	} else {
		document.getElementById('arl').style.display='none';
	}

}

 
 $(function() {
    $("#buscar").click(function() {
        $('#SPACE_TOTAL')
           .html('<img src="img/ajax-loader.gif" />')
           .window.open();
    });
});

</script>