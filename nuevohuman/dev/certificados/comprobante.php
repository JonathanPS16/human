<?php
$mysqli = new mysqli("localhost", "byvnilva_drupal", "admByV$", "byvnilva_humantalents");
if ($mysqli->connect_errno) {
    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$numero=$_GET['documento'];
$anios=$_GET['anios'];
$mes=$_GET['mes'];
$periodo=$_GET['periodo'];
$resultado = $mysqli->query("SELECT * FROM volantes where anio='$anios' and mes='$mes' and periodo='$periodo' and cedula='$numero' group by concepto");
$resultado->data_seek(0);
$i=0;
while ($fila = $resultado->fetch_assoc()) {
    $i++;
     $datos[] = $fila;
}
 ob_start(); ?>
<html>
 <!DOCTYPE html>
 <head><meta http-equiv="Content-Type" content="text/html; charset=gb18030"><?php header("Content-Type: text/html;charset=utf-8"); ?>
	
	<style type="text/css">
		.datagrid table {
			 border-collapse: collapse;
			 text-align: left;
			 width: 100%;
		}
		 .datagrid {
			//font: normal 12px/150% Arial, Helvetica, sans-serif;
			 background: #fff;
			 overflow: hidden;
			 border: 1px solid #006699;
			 -webkit-border-radius: 3px;
			 -moz-border-radius: 3px;
			 border-radius: 3px;
		}
		.datagrid table td, .datagrid table th {
			 padding: 3px 10px;
		}
		.datagrid table thead th {
			background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #006699), color-stop(1, #00557F) );
			background:-moz-linear-gradient( center top, #006699 5%, #00557F 100% );
			filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#006699', endColorstr='#00557F');
			background-color:#006699;
			 color:#FFFFFF;
			 font-size: 15px;
			 font-weight: bold;
			 border-left: 1px solid #0070A8;
		}
		 .datagrid table thead th:first-child {
			 border: none;
		}
		.datagrid table tbody td {
			 color: #00496B;
			 border-left: 1px solid #E1EEF4;
			font-size: 12px;
			font-weight: normal;
		}
		.datagrid table tbody .alt td {
			 background: #E1EEF4;
			 color: #00496B;
		}
		.datagrid table tbody td:first-child {
			 border-left: none;
		}
		.datagrid table tbody tr:last-child td {
			 border-bottom: none;
		}
	</style>
 </head>
 <body>
  <table width="80%" border="0" align="center"><br><br><br> <tr><td colspan="6"><img src="img/logo_negro.jpg" width="200px" height="50px"></td></tr></table>
  <table width="95%" border="0"  align="center" cellpadding="1px">
    <tr>
   
    <td colspan="3"><div align="center"><h4>COMPROBANTE DE PAGO</h4></div></td>
    
   </tr>
   <tr>
   <td width="2%">&nbsp;</td>
    <td width="50%"><div align="left">NIT: 900.441.772-6</div></td>
     <!--td width="50%"><div align="left">Per&iacute;odo: <?php echo $datos[1][16].'-'.$datos[1][17].'-'.$datos[1][18]; ?> </div></td--> 
     <td width="50%"><div align="left">Per&iacute;odo: <?php if($periodo==1){echo "Primera quincena";}else{echo "Segunda quincena";} ?> </div></td>    
   </tr>
   <tr>
      <td width="2%">&nbsp;</td>
    <td><div align="left">Empleado:<font size='2'> <?php echo $datos[0][nombre_empleado]; ?> </font> </div></td>
    <td><div align="left">Del  <?php echo substr($datos[0][fecha_inicial],-27,10).' al '.substr($datos[0][fecha_final],-27,10); ?></div></td>
   </tr>
   <tr>
      <td width="2%">&nbsp;</td>
    <td><div align="left">C&eacute;dula: <?php echo $datos[0][cedula]; ?> </div></td>
    <td><div align="left">Sueldo:<?php echo number_format($datos[0][sueldo_actual], 2, ",", "."); ?></div></td>
   </tr>
   <tr>
      <td width="2%">&nbsp;</td>
    <td><div align="left">Centro de costo: <?php echo $datos[0][centro_costo].'-'.$datos[0][nombre_empresa]; ?></div></td>
    <td><div align="left">Cta. Ahorros: <?php echo $datos[0][cuenta_ahorro]; ?></div></td>
   </tr>
   <tr>
      <td width="2%">&nbsp;</td>
    <td><div align="left">Cargo: <?php echo utf8_encode($datos[0][nombre_cargo]); ?></div></td>
    <td><div align="left">Vacaciones Pendientes a la fecha: <?php echo $datos[0][dias_vac_pendientes]; ?> dias.</div></td>
   </tr>
  
  </table><br/>
	<div class="datagrid">
	  <table width="80%" border="0" align="center" cellpadding="1px">
	   <thead><tr><th>C&oacute;digo </th><th>Concepto </th><th>C.C. </th> <th>Cantidad </th> <th>Devengados </th><th>Deducidos</th></tr></thead>
		<?php 
			$totales=0;
			$deducido=0;
			
			$estado=0;
			for($j=0; $j<=$i; $j++)
			{
				if($estado==0)
				{
					echo "<tr class='alt'><td>".$datos[$j][grupo].$datos[$j][consecutivo].$datos[$j][subgrupo]."</td><td><font size='2'>".$datos[$j][concepto]."</font></td><td>".$datos[$j][centro_costo]."</td><td>".$datos[$j][cantidad]."</td><td><div align='right'>".number_format($datos[$j][devengos], 0, '', '.')." </div></td><td><div align='right'>".'-'.number_format($datos[$j][deducciones], 0, '', '.')." </div></td></tr>";
					$estado=1;
				}else{
					echo "<tr><td>".$datos[$j][grupo].$datos[$j][consecutivo].$datos[$j][subgrupo]."</td><td><font size='2'>".$datos[$j][concepto]."</font></td><td>".$datos[$j][centro_costo]."</td><td>".$datos[$j][cantidad]."</td><td><div align='right'>".number_format($datos[$j][devengos], 0, '', '.')." </div></td><td><div align='right'>".'-'.number_format($datos[$j][deducciones], 0, '', '.')." </div></td></tr>";	
					$estado=0;
				}
				$totales=$totales+$datos[$j][devengos];
				$deducido=$deducido+$datos[$j][deducciones];
				$netos=$totales-$deducido;
			}
		?>
	   <tr><td colspan="2">Fondo pensi&oacute;n: <?php echo $datos[0][nombre_fondo]; ?></td><td colspan="2">Totales </td><td><div align='right'><?php echo number_format($totales, 0, '', '.');?></div></td>    <td><div align='right'><?php echo '-'.number_format($deducido, 0, '', '.');?></div></td></tr>
	   <tr class='alt'><td colspan="2">Fondo salud: <?php echo $datos[0][nombre_salud]; ?> </td><td colspan="2"><b>NETO A PAGAR</b> </td><td><div align='right'><b><?php echo number_format($netos, 0, '', '.');?></b></div></td><td>&nbsp;</td></tr>
	   </table>		
	</div><br/>
	<label><div align="left">***Conceptos que no afectan el neto a pagar</div></label>
	<label><div align="left" style="font-size:10px;">Generado desde El portal web www.humantalentsas.com en la fecha <?php echo date("Y-m-d H:i:s ");  ?></div></label>

 </body>
</html>
<?php 
require_once("dev/certificados/dompdf/dompdf_config.inc.php");
/* $f;
$l;
if(headers_sent($f,$l))
{
    echo $f,'<br/>',$l,'<br/>';
    die('now detect line');
}
 */$dompdf = new DOMPDF();
$dompdf->load_html(ob_get_clean());
$dompdf->render();
$pdf = $dompdf->output();
$filename = "Comprobante".'.pdf';
//file_put_contents($filename, $pdf); //esta linea guarda el archivo en el servidor
$dompdf->stream($filename);
?>
