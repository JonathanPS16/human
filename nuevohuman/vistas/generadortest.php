<?php
require('fpdf.php');

class PDF extends FPDF
{
// Load data
function LoadData($file)
{
    // Read file lines
    $lines = file($file);
    $data = array();
    foreach($lines as $line)
        $data[] = explode(';',trim($line));
    return $data;
}
/*
// Simple table
function BasicTable($header, $data)
{
    // Header
    foreach($header as $col)
        $this->Cell(40,7,$col,1);
    $this->Ln();
    // Data
    foreach($data as $row)
    {
        foreach($row as $col)
            $this->Cell(40,6,$col,1);
        $this->Ln();
    }
}
*/
// Better table
function ImprovedTable($header, $data)
{
    // Column widths
	//$w = array(40, 35, 40, 45);
	$w = array(90, 90);
    // Header
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C');
    $this->Ln();
    // Data
    foreach($data as $row)
    {
        $this->Cell($w[0],6,utf8_decode($row[0]),'LR');
        $this->Cell($w[1],6,utf8_decode($row[1]),'LR');
       // $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
       // $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R');
        $this->Ln();
    }
    // Closing line
    $this->Cell(array_sum($w),0,'','T');
}
function ImprovedTabletres($header, $data)
{
    // Column widths
	//$w = array(40, 35, 40, 45);
	$w = array(70, 20 , 70);
    // Header
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C');
    $this->Ln();
    // Data
    foreach($data as $row)
    {
        $this->Cell($w[0],6,utf8_decode($row[0]),'LR');
		$this->Cell($w[1],6,utf8_decode($row[1]),'LR');
		$this->Cell($w[2],6,utf8_decode($row[1]),'LR');
       // $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
       // $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R');
        $this->Ln();
    }
    // Closing line
    $this->Cell(array_sum($w),0,'','T');
}
/*
// Colored table
function FancyTable($header, $data)
{
    // Colors, line width and bold font
    $this->SetFillColor(255,0,0);
    $this->SetTextColor(255);
    $this->SetDrawColor(128,0,0);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');
    // Header
    $w = array(40, 35, 40, 45);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
    $this->Ln();
    // Color and font restoration
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');
    // Data
    $fill = false;
    foreach($data as $row)
    {
        $this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
        $this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
        //$this->Cell($w[2],6,number_format($row[2]),'LR',0,'R',$fill);
        //$this->Cell($w[3],6,number_format($row[3]),'LR',0,'R',$fill);
        $this->Ln();
        $fill = !$fill;
    }
    // Closing line
    $this->Cell(array_sum($w),0,'','T');
}*/
}

$pdf = new PDF();
// Column headings
$header = array('Nombre', utf8_decode('Número de Cedula'));
// Data loading
$data = array(0=>array("asdsad","asdsad"));
$pdf->SetFont('Arial','',12);
$pdf->AddPage();
//$pdf->Image('img/CABECERA.png' , 0 ,0, 210 , 38);
$pdf->Ln(5);
$pdf->SetFont('Arial', '', 12);
$pdf->Multicell(0,7,utf8_decode('Bogotá'),0,'L');
$pdf->Ln(8);
$pdf->Ln(8);
$pdf->Multicell(0,7,utf8_decode('Señores'),0,'L');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Multicell(0,7,'BANCOLOMBIA',0,'L');
$pdf->SetFont('Arial', '', 12);
$pdf->Multicell(0,7,'Ciudad',0,'L');
$pdf->Ln(8);
$pdf->Ln(8);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Multicell(0,7,'Referencia: Apertura de Cuenta de Ahorro ',0,'R');
$pdf->SetFont('Arial', '', 12);
$pdf->Multicell(0,7,utf8_decode('Apreciados  Señores:'),0,'L');
$pdf->Ln(5);
$pdf->Multicell(0,7,utf8_decode('Por medio de la presente HUMAN TALENT SAS. Empresa de Servicios Temporales con   NIT.900.441.722,  autoriza abrir cuenta de nómina; bajo el Convenio No 77846 para Pago De Nómina Plan 41,  vigente con ustedes al  siguiente  funcionario: '),0,'L');
$pdf->Ln(5);
//$pdf->BasicTable($header,$data);
$pdf->ImprovedTable($header,$data);
$pdf->Ln(5);

$pdf->Multicell(0,7,'Cordialmente,',0,'L');
$pdf->Multicell(0,7,'Cordialmente,',0,'L');
$pdf->Multicell(0,7,'Cordialmente,',0,'L');
/*$pdf->AddPage();
$pdf->ImprovedTable($header,$data);
$pdf->AddPage();
$pdf->FancyTable($header,$data);*/
$pdf->Output(F,'filename.pdf');

$pdf = new PDF();
// Column headings
$header = array(utf8_decode('Nombre'), utf8_decode('Realizar'),utf8_decode('Observaciones'));
// Data loading
$data = array(0=>array("Descripción Examen","asdsad","asdsd"));
$pdf->SetFont('Arial','',12);
$pdf->AddPage();
//$pdf->Image('img/CABECERA.png' , 0 ,0, 210 , 38);
$pdf->Ln(5);
$pdf->SetFont('Arial', '', 10);
$pdf->Multicell(0,7,utf8_decode('Bogotá'),0,'L');
$pdf->Ln(8);
$pdf->Ln(8);
$pdf->Multicell(0,7,utf8_decode('Señores'),0,'L');
$pdf->SetFont('Arial', 'B', 10);
$pdf->Multicell(0,7,'Laboratorios REYVELT',0,'L');
$pdf->Multicell(0,7,utf8_decode('Medicina Especializada'),0,'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Multicell(0,7,utf8_decode('Calle 85 A No. 22 – 32  Barrio El Polo '),0,'L');
$pdf->Multicell(0,7,utf8_decode('Teléfono (+ 57 1) 702 0903 – 300 1465 '),0,'L');
$pdf->Multicell(0,7,'Ciudad',0,'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Ln(8);
$pdf->Ln(8);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Multicell(0,7,utf8_decode('Referencia: Orden de Exámenes Médicos '),0,'R');
$pdf->SetFont('Arial', '', 10);
$pdf->Multicell(0,7,utf8_decode('Apreciados  Señores:'),0,'L');
$pdf->Ln(5);
$pdf->Multicell(0,7,utf8_decode('Por medio de la presente autorizamos la realización de los siguientes exámenes médicos a:'),0,'L');
$pdf->Ln(5);
$pdf->Multicell(0,7,utf8_decode('Nombre  ${nombre}'),0,'L');
$pdf->Multicell(0,7,utf8_decode('Cedula ${cedula}'),0,'L');
$pdf->Multicell(0,7,utf8_decode('Empresa Usuaria  ${empresacliente}'),0,'L');
$pdf->Multicell(0,7,utf8_decode('Cargo ${cargodesempenar}'),0,'L');
$pdf->Multicell(0,7,utf8_decode('Ciudad donde Laborará  ${ciudad}'),0,'L');
//$pdf->BasicTable($header,$data);
$pdf->SetFont('Arial', '', 9);
$pdf->ImprovedTabletres($header,$data);
$pdf->Ln(5);
$pdf->Multicell(0,7,utf8_decode('Nota. Apreciado Colaborador, por favor presentarse al laboratorio que esta señalado con (X) en el siguiente cuadro '),0,'L');
$pdf->Multicell(0,7,'Cordialmente,',0,'L');
$pdf->Multicell(0,7,'Cordialmente,',0,'L');
/*$pdf->AddPage();
$pdf->ImprovedTable($header,$data);
$pdf->AddPage();
$pdf->FancyTable($header,$data);*/
$pdf->Output(F,'filenamea.pdf');
ob_end_flush();
?><br><br><br>
<div class="form-group">
  <div class="col-md-8">
    <a href="filename.pdf" target="_black" class="btn btn-info">Descargar Archivo</a>
	<a href="filenamea.pdf" target="_black" class="btn btn-info">Descargar Archivo</a>
    <a href="home.php?ctr=buscardorCertificados&acc=buscador" class="btn btn-primary">Nueva Consulta</a>
  </div>
</div>


<?php
die();
setlocale(LC_ALL,"es_ES");
include_once("numerosaletras.php");
$meses = array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");
require('fpdf.php');
  for($i=0; $i<count($certificados);$i++){
    $inf=$certificados[$i];
  }
$pdf = new FPDF();
$pdf->AddPage();
//$pdf->Image('img/CABECERA.png' , 0 ,0, 210 , 38);
	$pdf->Ln(5);
	$pdf->SetFont('Arial', '', 12);
	$pdf->Multicell(0,7,'Bogotá  ${date}',0,'L');
	$pdf->Ln(1);
	$pdf->Multicell(0,7,'Señores',0,'L');
	$pdf->Multicell(0,7,'BANCOLOMBIA',0,'L');
	$pdf->Multicell(0,7,'Ciudad',0,'L');
	$pdf->Multicell(0,7,'Referencia: Apertura de Cuenta de Ahorro ',0,'L');
	$pdf->Multicell(0,7,'Apreciados  Señores:',0,'L');
	$pdf->Multicell(0,7,'Por medio de la presente HUMAN TALENT SAS. Empresa de Servicios Temporales con   NIT.900.441.722,  autoriza abrir cuenta de nómina; bajo el Convenio No 77846 para Pago De Nómina Plan 41,  vigente con ustedes al  siguiente  funcionario: ',0,'L');
	$pdf->Multicell(0,7,'Bogotá  ${date}',0,'L');
	
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
		$pdf->MultiCell(170,5,utf8_decode($tipificador).' '.utf8_decode($inf['nombre_empleado']).' '.$ident.' con C.C. No.'.' '.number_format($inf['cedula'], 0, ",", ".").', '.'laboro mediante contrato de obra o labor determinada, como trabajador en'.' '.utf8_decode('misión').' '.'para la empresa'.' '.utf8_decode($inf['nombrempresa']).', '.' desde el'.' '.$inf['fecha_ingreso'].' '.'a '.' '.$inf['fecha_retiro'].','.utf8_decode(' desempeñando el cargo de').' '.$inf['nombrecargo'].'.'); 	
	}
	$pdf->Ln();
	$pdf->MultiCell(170,5,utf8_decode('Para constancia se firma en Bogotá, D.C, el día').' '.strtolower(num2letras(date("d"))).' de  '.$meses[date('n')-1].' de '.strtolower(num2letras(date("Y"))).'.');
	$pdf->Ln(10);
	$pdf->MultiCell(190,5,'Cordialmente.');
	$pdf->Ln(45);
	$pdf->Multicell(0,7,utf8_decode('Área de Servicio al Cliente'),0,'L');
	
	//$pdf->Image('img/firma.png' , 15,190, 70 , 30);
	//$pdf->Image('img/pie.png' , 0,259, 210 , 38);
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
