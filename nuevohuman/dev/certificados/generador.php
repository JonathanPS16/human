<?php
$meses = array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");

setlocale(LC_ALL,"es_ES");
include_once("numerosaletras.php");
include_once("conexion.php");
require('fpdf.php');

$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();

if($_POST['tipocertificado']==3) 
{
	$contrato=$_POST['contrato'];
	$numero=$_POST['numero'];
	$sql = "SELECT * FROM certificados where contrato='$contrato' and cedula='$numero'";
	//echo $sql;
	$results =  mysql_query($sql); 
	while($datos=mysql_fetch_array($results)){
		$inf=$datos;
	}
	//var_dump($inf);
	mysql_free_result($resultado);
	

	$pdf->Image('img/CABECERA.png' , 0 ,0, 210 , 38);
	$pdf->Ln(50);
	$pdf->SetFont('Helvetica', 'B', 14);
	$pdf->Multicell(122,7,'HUMAN TALENT EST S.A.S',0,'R');
	$pdf->Ln(1);
	$pdf->Multicell(114,7,'NIT. 900.441.722-6',0,'R');
	$pdf->Ln(15);
	$pdf->Multicell(107,7,'CERTIFICA',0,'R');
	$pdf->Ln(25);$pdf->SetLeftMargin(20);
	if(empty($inf['fecha_retiro']))
	{
		$pdf->MultiCell(170,5,utf8_decode('Que El(a) señor(a)').' '.utf8_decode("$inf[nombre_empleado]").' '.'identificado(a) con C.C. No.'.' '.number_format($inf[cedula], 0, ",", ".").', '.'se encuentra vinculado mediante contrato de obra o labor determinada, como trabajador en'.' '.utf8_decode('misión').' '.'para la empresa'.' '.utf8_decode("$inf[nombre_empresa]").', '.' desde el'.' '.$inf[fecha_ingreso].','.utf8_decode(' desempeñando el cargo de').' '.$inf[nombre_cargo].', '.utf8_decode('con una asignación salarial mensual de ').' ($'.number_format($inf[sueldo_actual], 2, ",", ".") .') '.num2letras($inf[sueldo_actual],false).' '.'pesos mcte.');
	}
	else
	{
		$pdf->MultiCell(170,5,utf8_decode('Que El(a) señor(a)').' '.utf8_decode("$inf[nombre_empleado]").' '.'identificado(a) con C.C. No.'.' '.number_format($inf[cedula], 0, ",", ".").', '.'laboro mediante contrato de obra o labor determinada, como trabajador en'.' '.utf8_decode('misión').' '.'para la empresa'.' '.utf8_decode("$inf[nombre_empresa]").', '.' desde el'.' '.$inf[fecha_ingreso].' '.'a '.' '.$inf[fecha_retiro].','.utf8_decode(' desempeñando el cargo de').' '.$inf[nombre_cargo].'.'); 	
	}
	$pdf->Ln();
	$pdf->MultiCell(170,5,utf8_decode('Para constancia se firma en Bogotá, D.C, el día').' '.strtolower(num2letras(date("d"))).' de  '.$meses[date('n')-1].' de '.strtolower(num2letras(date("Y"))).'.');
	$pdf->Ln(10);
	$pdf->MultiCell(190,5,'Cordialmente.');
	$pdf->Ln(45);
	$pdf->Multicell(0,7,utf8_decode('Área de Servicio al Cliente'),0,'L');
	
	$pdf->Image('img/firma.png' , 15,190, 70 , 30);
	$pdf->Image('img/pie.png' , 0,259, 210 , 38);
	$pdf->Ln(10);
	$pdf->SetFont('Helvetica', 'B', 7);
	$pdf->MultiCell(170,5,utf8_decode('Nota: Esta certificación fué generada desde el sitio web www.humantalentsas.com el día').' '.strtolower(num2letras(date("d"))).' de  '.$meses[date('n')-1].' de '.strtolower(num2letras(date("Y"))).'.');

$pdf->Output("certificado.pdf",'D');
}

?>
