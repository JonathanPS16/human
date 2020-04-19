
<html>
<head>
    <a href="cargar.html">Volver</a>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>JQuery Excel</title>
<script type="text/javascript" src="jquery-1.3.2.min.js"></script>
<script language="javascript">
$(document).ready(function() {
	$(".botonExcel").click(function(event) {
		$("#datos_a_enviar").val( $("<div>").append( $("#Exportar_a_Excel").eq(0).clone()).html());
		$("#FormularioExportacion").submit();
});
});
</script>
<style type="text/css">
.botonExcel{cursor:pointer;}
</style>
</head>
<body>
<?php

if ($_FILES['archivo']["error"] > 0)
{
	echo "Error: " . $_FILES['archivo']['error'] . "<br>";
}
else
{
	echo "Nombre: " . $_FILES['archivo']['name'] . "<br>";
	//echo "Tipo: " . $_FILES['archivo']['type'] . "<br>";
	echo "Tamaño: " . ($_FILES["archivo"]["size"] / 1024) . " kB<br>";
	//echo "Carpeta temporal: " . $_FILES['archivo']['tmp_name'];
	move_uploaded_file($_FILES['archivo']['tmp_name'],"subidas/".$_FILES['archivo']['name']); 
}
//break;
	require 'PHPExcel/Classes/PHPExcel/IOFactory.php'; //Agregamos la librería 
	//require 'conexion.php'; //Agregamos la conexión
	
	//Variable con el nombre del archivo
	//$nombreArchivo = '$doc';
	//$nombreArchivo = 'FRNN.xlsx';
	
	$nombreArchivo = "subidas/".$_FILES['archivo']['name'];

	// Cargo la hoja de cálculo
	$objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);
	
	//Asigno la hoja de calculo activa
	$objPHPExcel->setActiveSheetIndex(0);
	//Obtengo el numero de filas del archivo
	$numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
	$CODIGOS=array("1032", "1033", "1034", "1035","1039", "1041", "1043", "1047","1050", "1011", "1014", "1019","1020", "1044", "1128", "1141","2056", "2061", "2073", "1036","1049", "1052", "1054", "2053","2062", "Observaciones");

	echo '<table width="50%" border="1" cellpadding="10" cellspacing="0" bordercolor="#666666" id="Exportar_a_Excel" style="border-collapse:collapse;">
	';
	$j = 0;
	for ($i = 14; $i <= $numRows; $i++) {
		
	/*	$CEDULA[] = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();*/
		$CEDULA[] = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
	/*	$VAL[] = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
		$VAL[] = $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
		$VAL[] = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
		$VAL[] = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();*/
		$VAL[] = $objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
		$VAL[] = $objPHPExcel->getActiveSheet()->getCell('G'.$i)->getCalculatedValue();
		$VAL[] = $objPHPExcel->getActiveSheet()->getCell('H'.$i)->getCalculatedValue();
		$VAL[] = $objPHPExcel->getActiveSheet()->getCell('I'.$i)->getCalculatedValue();
		$VAL[] = $objPHPExcel->getActiveSheet()->getCell('J'.$i)->getCalculatedValue();
		$VAL[] = $objPHPExcel->getActiveSheet()->getCell('K'.$i)->getCalculatedValue();
		$VAL[] = $objPHPExcel->getActiveSheet()->getCell('L'.$i)->getCalculatedValue();
		$VAL[] = $objPHPExcel->getActiveSheet()->getCell('M'.$i)->getCalculatedValue();
		$VAL[] = $objPHPExcel->getActiveSheet()->getCell('N'.$i)->getCalculatedValue();
		$VAL[] = $objPHPExcel->getActiveSheet()->getCell('O'.$i)->getCalculatedValue();
		$VAL[] = $objPHPExcel->getActiveSheet()->getCell('P'.$i)->getCalculatedValue();
		$VAL[] = $objPHPExcel->getActiveSheet()->getCell('Q'.$i)->getCalculatedValue();
		$VAL[] = $objPHPExcel->getActiveSheet()->getCell('R'.$i)->getCalculatedValue();
		$VAL[] = $objPHPExcel->getActiveSheet()->getCell('S'.$i)->getCalculatedValue();
		$VAL[] = $objPHPExcel->getActiveSheet()->getCell('T'.$i)->getCalculatedValue();
		$VAL[] = $objPHPExcel->getActiveSheet()->getCell('U'.$i)->getCalculatedValue();
		$VAL[] = $objPHPExcel->getActiveSheet()->getCell('V'.$i)->getCalculatedValue();
		$VAL[] = $objPHPExcel->getActiveSheet()->getCell('W'.$i)->getCalculatedValue();
		$VAL[] = $objPHPExcel->getActiveSheet()->getCell('X'.$i)->getCalculatedValue();
		$VAL[] = $objPHPExcel->getActiveSheet()->getCell('Y'.$i)->getCalculatedValue();
		$VAL[] = $objPHPExcel->getActiveSheet()->getCell('Z'.$i)->getCalculatedValue();
		$VAL[] = $objPHPExcel->getActiveSheet()->getCell('AA'.$i)->getCalculatedValue();
		$VAL[] = $objPHPExcel->getActiveSheet()->getCell('AB'.$i)->getCalculatedValue();
		$VAL[] = $objPHPExcel->getActiveSheet()->getCell('AC'.$i)->getCalculatedValue();
		$VAL[] = $objPHPExcel->getActiveSheet()->getCell('AD'.$i)->getCalculatedValue();
		$VAL[] = $objPHPExcel->getActiveSheet()->getCell('AE'.$i)->getCalculatedValue();

		/*
		?><pre><?php print_r($VAL); ?></pre><?php
		*/
		

			/*
		$sql = "INSERT INTO productos (nombre, precio, existencia) VALUES('$nombre','$precio','$existencia')";
		$result = $mysqli->query($sql);*/
	}
	$j = 0;
	$i = 0;
	foreach ($VAL as $key => $value) {
		if (!empty($value)) {
		//	echo '$var es o bien 0, vacía, o no se encuentra definida en absoluto';
			echo '<tr>';
			echo '<td>'. $CEDULA[$i].'</td>';
			echo '<td>'. $CODIGOS[$j] .'</td>';		
			echo '<td>'.  $value.'</td>';
			echo '</tr>';
		}	
		$j++;
		if ($j==26) {
			$i++;
			$j=0;
		}
	}	
	echo '<table>';
?>

<form action="ficheroExcel.php" method="post" target="_blank" id="FormularioExportacion">
<p>Exportar a Excel  <img src="export_to_excel.gif" class="botonExcel" /></p>
<input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
</form>
</body>

</html>
<style>
table#Exportar_a_Excel {
    width: auto;
}
td {
    padding: 3px;
}
</style>
