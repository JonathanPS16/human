<?php
setlocale(LC_ALL,"es_ES");
include_once("numerosaletras.php");
$meses = array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");
require('fpdf.php');
  for($i=0; $i<count($certificados);$i++){
    $inf=$certificados[$i];
  }
$pdf = new FPDF();
$pdf->AddPage();
$pdf->Image('img/CABECERA.png' , 0 ,0, 210 , 38);
	$pdf->Ln(50);
	$pdf->SetFont('Helvetica', 'B', 14);
	$pdf->Multicell(122,7,'HUMAN TALENT EST S.A.S',0,'R');
	$pdf->Ln(1);
	$pdf->Multicell(114,7,'NIT. 900.441.722-6',0,'R');
	$pdf->Ln(15);
	$pdf->Multicell(107,7,'CERTIFICA',0,'R');
	$pdf->Ln(25);$pdf->SetLeftMargin(20);
	$genero = $inf['genero'];
	  $tipificador ="Que el Señor";
	  $ident="Identificado";
	  $vicula="vinculado";
	  $trabaja="trabajador";
  	if($genero=="Femenino"){
		$tipificador ="Que la señora";
	  $ident="Identificada";
	  $vicula="vinculada";
	  $trabaja="trabajadora";
	  }
	

	if(empty($inf['fecha_retiro']))
	{
		$pdf->MultiCell(170,5,utf8_decode($tipificador).' '.utf8_decode($inf['nombre_empleado']).' '.$ident.' con C.C. No.'.' '.number_format($inf['cedula'], 0, ",", ".").', '.'se encuentra '.$vicula.' mediante contrato de obra o labor determinada, como '.$trabaja.' en'.' '.utf8_decode('misión').' '.'para la empresa'.' '.utf8_decode($inf['nombrempresa']).', '.' desde el'.' '.$inf['fecha_ingreso'].','.utf8_decode(' desempeñando el cargo de').' '.$inf['nombrecargo'].', '.utf8_decode('con una asignación salarial mensual de ').' ($'.number_format($inf['salarioactual'], 2, ",", ".") .') '.num2letras($inf['salarioactual'],false).' '.'pesos mcte.');
	}
	else
	{
		$pdf->MultiCell(170,5,utf8_decode($tipificador).' '.utf8_decode($inf['nombre_empleado']).' '.$ident.' con C.C. No.'.' '.number_format($inf['cedula'], 0, ",", ".").', '.'laboro mediante contrato de obra o labor determinada, como trabajador en'.' '.utf8_decode('misión').' '.'para la empresa'.' '.utf8_decode($inf['nombrempresa']).', '.' desde el'.' '.$inf['fecha_ingreso'].' '.'a '.' '.$inf['fecha_retiro'].','.utf8_decode(' desempeñando el cargo de').' '.utf8_decode($inf['nombrecargo']).'.'); 	
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

$pdf->Output(F,'filename.pdf');
ob_end_flush();
?><br><br><br>
<div class="form-group">
  <div class="col-md-8">
    <a href="filename.pdf" target="_black" class="btn btn-info">Descargar Archivo</a>
    <a href="home.php?ctr=buscardorCertificados&acc=buscador" class="btn btn-primary">Nueva Consulta</a>
  </div>
</div>
