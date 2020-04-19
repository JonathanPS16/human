<?php
$meses = array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");

setlocale(LC_ALL,"es_ES");
include_once("numerosaletras.php");
include_once("conexion.php");


	$anio=$_GET['anio'];
	$documento=$_GET['documento'];
	$sql = "SELECT * FROM ingresos_ret_2017 where CEDULA='$documento'";
	$results =  mysql_query($sql); 
	while($datos=mysql_fetch_array($results)){
		$inf=$datos;
	}
	$nombre=$inf[PRIMERAPELLIDO].' '.$inf[SEGUNDOAPELLIDO].' '.$inf[PRIMERNOMBRE].' '.$inf[SEGUNDONOMBRE];
	
	$total=intval($inf[PAGOSSALARIOSOECLESISTICOS])+intval($inf[PAGOSHONORARIOS])+intval($inf[PAGOSSERVICIOS])+intval($inf[PAGOSCOMISIONES])+intval($inf[PAGOSPRESTACIONES])+intval($inf[PAGOSVIATICOS])+intval($inf[PAGOSREPRESENTACION])+intval($inf[PAGOSCOOPERATIVO])+intval($inf[CESANTIASPERIODO])+intval($inf[PENSIONES])+intval($inf[OTROSPAGOS]);
	$total=number_format($total, 0, '', '.');

	/* mysql_free_result($resultado);		
	?><pre><?php print_r($inf); ?></pre><?php */
	
require('fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();

		$pdf->SetFont('Helvetica', '', 12);
		$pdf->Image('img/dian1.png' , 20 ,12, 35 ,10,'png', "http://www.humantalentsas.com/");
		$pdf->Cell(190,5, 'Certificado de Ingresos y Retenciones', 0,0,"C");$pdf->Ln();
		
	/*año*/		
		$pdf->Cell(190,5, 'para Personas Naturales Empleados', 0,0,"C");$pdf->Ln();
		$pdf->Cell(190,5, utf8_decode("Año Gravable ").$anio.'', 0,0,"C");
	/* cierre año*/		

		$pdf->Image('img/dian2.png' ,150 ,12, 35 ,10,'png', "http://www.humantalentsas.com/");	$pdf->Ln();
		$pdf->SetFont('Helvetica', '', 9);
		$pdf->Cell(190,5, utf8_decode('(4). Número de formulario: ').$inf[CEDULA].'', 0,0,"C");$pdf->Ln();
		$pdf->Cell(190,5, 'RETENEDOR', 1,0,"C");$pdf->Ln();
		$pdf->SetFont('Helvetica', '', 7);
		$texto="(5). Número de identificación Tributaria (NIT) 900.441.722 -6 \n (11). RAZON SOCIAL HUMAN TALENT EMPRESA DE SERVICIOS TEMPORALES S.A.S \n";
		$pdf->MultiCell(190,3,utf8_decode("$texto"),1,'L');$pdf->Ln(0);

		
		$pdf->SetFont('Helvetica', '', 9);
		$pdf->MultiCell(190,5, 'EMPLEADO', 1,"C");$pdf->Ln(0);
		$pdf->SetFont('Helvetica', '', 7); 
		$pdf->MultiCell(190,5,'(24). TIPO: CEDULA  (25).'.$inf[CEDULA].'                                                          (26-29). NOMBRES Y APELLIDOS   '.utf8_decode("$nombre").'', 1,"L");$pdf->Ln(0);
		  
		$texto="PERIODO DE CERTIFICACION:         (30).".$inf[FECHAINICIAL]."                       							  AL			(31).".$inf[FECHAFINAL]."	               FECHA DE EXPEDICION          (32).".$inf[FECHAEXPEDICION]." \nLUGAR DONDE SE PRACTICO LA RETENCION (33).BOGOTA                       							    DEPARTAMENTO: (34).D.C. BOGOTA                  CIUDAD: (35).BOGOTA";
		$pdf->MultiCell(190,3,"$texto",1,'L');$pdf->Ln(0);
		$pdf->MultiCell(190,3,"",1,'L');$pdf->Ln(0);
		$texto="(36). NÚMERO DE AGENCIAS, SUCURSALES, FILIALES O SUBSIDIARIAS DE LA EMPRESA RETENEDORA\n CUYOS MONTOS DE RETENCIÓN SE CONSOLIDAN ";
		$pdf->MultiCell(190,4,utf8_decode("$texto"),1,'L');$pdf->Ln(0);
		
		
		$pdf->Cell(145,4,"CONCEPTO DE LOS INGRESOS",1,0,'C');
		$pdf->Cell(45,4,"VALOR",1,0,'C');$pdf->Ln();

		$pdf->Cell(145,4,utf8_decode("(37). Pagos por salarios o emolumentos eclesiásticos"),0,0,'L');
		$pdf->Cell(45,4,$inf[PAGOSSALARIOSOECLESISTICOS],0,0,'R');$pdf->Ln();

		$pdf->Cell(145,4,utf8_decode("(38). Pagos por honorarios"),0,0,'L');
		$pdf->Cell(45,4,$inf[PAGOSHONORARIOS],0,0,'R');$pdf->Ln();

		$pdf->Cell(145,4,utf8_decode("(39). Pagos por servicios"),0,0,'L');
		$pdf->Cell(45,4,$inf[PAGOSSERVICIOS],0,0,'R');$pdf->Ln();

		$pdf->Cell(145,4,utf8_decode("(40). Pagos por comisiones"),0,0,'L');
		$pdf->Cell(45,4,$inf[PAGOSCOMISIONES],0,0,'R');$pdf->Ln();

		$pdf->Cell(145,4,"(41). Pagos por prestaciones sociales",0,0,'L');
		$pdf->Cell(45,4,$inf[PAGOSPRESTACIONES],0,0,'R');$pdf->Ln();
		$pdf->Cell(145,4,utf8_decode("(42). Pagos por viáticos"),0,0,'L');
		$pdf->Cell(45,4,$inf[PAGOSVIATICOS],0,0,'R');$pdf->Ln();
		$pdf->Cell(145,4,utf8_decode("(43). Pagos por gastos de representación"),0,0,'L');
		$pdf->Cell(45,4,$inf[PAGOSREPRESENTACION],0,0,'R');$pdf->Ln();
		$pdf->Cell(145,4,"(44). Pagos por compensaciones por el trabajo asociado cooperativo",0,0,'L');
		$pdf->Cell(45,4,$inf[PAGOSCOOPERATIVO],0,0,'R');$pdf->Ln();
		$pdf->Cell(145,4,"(45). Otros pagos",0,0,'L');
		$pdf->Cell(45,4,$inf[OTROSPAGOS],0,0,'R');$pdf->Ln();
		$pdf->Cell(145,4,utf8_decode("(46). Cesantías e intereses de cesantías efectivamente pagadas, consignadas o reconocidas en el periodo"),0,0,'L');
		$pdf->Cell(45,4,$inf[CESANTIASPERIODO],0,0,'R');$pdf->Ln();
		$pdf->Cell(145,4,utf8_decode("(47). Pensiones de jubilación, vejez o invalidez"),0,0,'L');
		$pdf->Cell(45,4,$inf[PENSIONES],0,0,'R');$pdf->Ln();
		
		$pdf->SetFont('Helvetica', 'B', 7); 
		$pdf->Cell(145,4,"(48). Total de ingresos brutos ",0,0,'L');
		$pdf->Cell(45,4,$total,0,0,'R');$pdf->Ln();
		$pdf->SetFont('Helvetica', '', 7); 
		
		$pdf->Cell(145,4,"CONCEPTO DE LOS APORTES",1,0,'C');
		$pdf->Cell(45,4,"",1,0,'C');$pdf->Ln();

		$pdf->Cell(145,4,"(49). Aportes obligatorios por salud",0,0,'L');
		$pdf->Cell(45,4,$inf[APORTESSALUD],0,0,'R');$pdf->Ln();

		$pdf->Cell(145,4,"(50). Aportes obligatorios a fondos de pensiones y solidaridad pensional y Aportes voluntarios al - RAIS",0,0,'L');
		$pdf->Cell(45,4,$inf[APORTESPENSIONESRAIS],0,0,'R');$pdf->Ln();

		$pdf->Cell(145,4,"(51). Aportes voluntarios a fondos de pensiones voluntarias",0,0,'L');
		$pdf->Cell(45,4,"0",0,0,'R');$pdf->Ln();
		
		$pdf->Cell(145,4,"(52). Aportes a cuentas AFC.",0,0,'L');
		$pdf->Cell(45,4,"0",0,0,'R');$pdf->Ln();
		
		$pdf->SetFont('Helvetica', 'B', 7); 
		$pdf->Cell(145,4,utf8_decode("(53). Valor de la retención en la fuente por rentas de trabajo y pensiones"),0,0,'L');
		$pdf->Cell(45,4,'0',0,0,'R');$pdf->Ln();
		$pdf->SetFont('Helvetica', '', 7); 
		
		$texto="Nombre del pagador o agente retenedor  HUMAN TALENT EMPRESA DE SERVICIOS TEMPORALES S.A.S \n NIT o CC    900.441.772 - 6 \n                                                                                      No Necesita firma autográfa D.R. 836/91, Art.10";
		$pdf->MultiCell(190,4,utf8_decode("$texto"),1,'L');$pdf->Ln(0);
		$pdf->MultiCell(190,5, 'DATOS A CARGO DEL EMPLEADO', 1,"C");$pdf->Ln(0);
		
		$pdf->Cell(100,4,"CONCEPTO DE OTROS INGRESOS",1,0,'C');
		$pdf->Cell(45,4,"VALOR RECIBIDO",1,0,'C');
		$pdf->Cell(45,4,"VALOR RETENIDO",1,0,'C');$pdf->Ln();

		$pdf->Cell(100,4,"Arrendamientos",0,0,'L');
		$pdf->Cell(45,4,"(54).",0,0,'L');
		$pdf->Cell(45,4,"(61).",0,0,'L');$pdf->Ln();

		$pdf->Cell(100,4,"Honorarios, comisiones y servicios",0,0,'L');
		$pdf->Cell(45,4,"(55).",0,0,'L');
		$pdf->Cell(45,4,"(62).",0,0,'L');$pdf->Ln();

		$pdf->Cell(100,4,"Intereses y rendimientos financieros",0,0,'L');
		$pdf->Cell(45,4,"(56).",0,0,'L');
		$pdf->Cell(45,4,"(63).",0,0,'L');$pdf->Ln();

		$pdf->Cell(100,4,utf8_decode("Enajenación de activos fijos"),0,0,'L');
		$pdf->Cell(45,4,"(57).",0,0,'L');
		$pdf->Cell(45,4,"(64).",0,0,'L');$pdf->Ln();

		$pdf->Cell(100,4,utf8_decode("Loterías, rifas, apuestas y similares"),0,0,'L');
		$pdf->Cell(45,4,"(58).",0,0,'L');
		$pdf->Cell(45,4,"(65).",0,0,'L');$pdf->Ln();

		$pdf->Cell(100,4,"Otros",0,0,'L');
		$pdf->Cell(45,4,"(59).",0,0,'L');
		$pdf->Cell(45,4,"(66).",0,0,'L');$pdf->Ln();

		$pdf->Cell(100,4,"Total",1,0,'L');
		$pdf->Cell(45,4,"(60).",1,0,'L');
		$pdf->Cell(45,4,"(67).",1,0,'L');$pdf->Ln();

		$pdf->Cell(145,4,utf8_decode("(69). IDENTIFICACIÓN DE LOS BIENES POSEÍDOS"),1,0,'C');
		$pdf->Cell(45,4,"(70). VALOR PATRIMONIO",1,0,'C');$pdf->Ln();
	/*	
		$pdf->Cell(145,4,"",0,0,'C');
		$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();
		
		$pdf->Cell(145,4,"",0,0,'C');
		$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();
		
		$pdf->Cell(145,4,"",0,0,'C');
		$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();
	*/	
		$pdf->Cell(145,4,"",0,0,'C');
		$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();
		
		$pdf->Cell(145,4,"",0,0,'C');
		$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();
		
		$pdf->Cell(145,4,"",0,0,'C');
		$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();

		$pdf->MultiCell(190,5,utf8_decode( 'Identificación de las personas dependientes de acuerdo al parágrafo 2 del artículo 387 del Estatuto Tributario'), 1,"C");$pdf->Ln(0);
		
		$pdf->Cell(50,4,"(72). CEDULA",1,0,'C');
		$pdf->Cell(95,4,"(73). APELLIDOS Y NOMBRES",1,0,'C');
		$pdf->Cell(45,4,"(74). PARENTESCO",1,0,'C');$pdf->Ln();
			
		$pdf->Cell(50,4,"",0,0,'C');
		$pdf->Cell(95,4," ",0,0,'C');
		$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();
/*				
		$pdf->Cell(50,4,"",0,0,'C');
		$pdf->Cell(95,4," ",0,0,'C');
		$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();
		
		$pdf->Cell(50,4,"",0,0,'C');
		$pdf->Cell(95,4," ",0,0,'C');
		$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();
			
		$pdf->Cell(50,4,"",0,0,'C');
		$pdf->Cell(95,4," ",0,0,'C');
		$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();
*/
		
		//$pdf->Line(200,218,10,2128);
		
		$pdf->Line(200,258,10,258);//$pdf->Line(200,254,10,254); linea inferior
		
		$pdf->Line(200,258,200,35);//$pdf->Line(200,254,200,35); linea latral derecha
		$pdf->Line(10,258,10,70);//$pdf->Line(10,254,10,70); linea latral izquierda
		
		
		
		$pdf->Line(155,144,155,70); // linea concepto ingresos y valor
		$pdf->Line(155,161,155,209);//VALOR RECIBIDO VALOR RETENIDO
		$pdf->Line(110,161,110,189); //CONCEPTO DE OTROS INGRESOS VALOR RECIBIDO

		//$pdf->Line(60,200,60,218);
		$pdf->Line(155,214,155,258);//$pdf->Line(155,200,155,254);APELLIDOS Y NOMBRES PARENTESCO


		$pdf->Cell(145,4,utf8_decode("Certifico que durante el año gravable de ").$anio.'',0,0,'L');
		
		
		/*año*/
		
		switch ($anio) {
			case 2017:
				
				$pdf->Cell(45,4,"Firma del empleado",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("1. Mi patrimonio bruto era igual o inferior a 4.500 UVT ($143.366.000)."),0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("2. No fui responsable del impuesto sobre las ventas ni del impuesto nacional al consumo."),0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("3. Mis ingresos brutos fueron inferiores a 1.400 UVT ($44.603.000)."),0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("4. Mis consumos mediante tarjeta de crédito no excedieron la suma de 1.400 UVT ($44.603.000)"),0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("5. Que el total de mis compras y consumos no superaron la suma de 1.400 UVT ($44.603.000)"),0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("6. Que el valor total de mis consignaciones bancarias, depósitos o inversiones financieras no excedieron los "),0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("	1.400 UVT ($44.603.000)."),0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("Por lo tanto, manifiesto que no estoy obligado a presentar declaración de renta y complementarios por el año gravable ").$anio.'',0,0,'L');
				$pdf->Cell(45,4,"c.c. o Nit Nro",0,0,'C');$pdf->Ln();	

			break;
			case 2018:
				
				$pdf->Cell(45,4,"Firma del empleado",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("1. Mi patrimonio bruto era igual o inferior a 4.500 UVT ($149.202.000)."),0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("2. No fui responsable del impuesto sobre las ventas ni del impuesto nacional al consumo."),0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("3. Mis ingresos brutos fueron inferiores a 1.400 UVT ($46.418.000)."),0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("4. Mis consumos mediante tarjeta de crédito no excedieron la suma de 1.400 UVT ($46.418.000)"),0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("5. Que el total de mis compras y consumos no superaron la suma de 1.400 UVT ($46.418.000)"),0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("6. Que el valor total de mis consignaciones bancarias, depósitos o inversiones financieras no excedieron los "),0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("	1.400 UVT ($46.418.000)."),0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("Por lo tanto, manifiesto que no estoy obligado a presentar declaración de renta y complementarios por el año gravable ").$anio.'',0,0,'L');
				$pdf->Cell(45,4,"c.c. o Nit Nro",0,0,'C');$pdf->Ln();	

			break;
		
		}

		$pdf->Cell(190,4,utf8_decode("NOTA: Este certificado sustituye para todos los efectos legales la declaración de Renta y Complementarios para el empleado que lo firme. "),0,0,'C');	
		$pdf->Cell(190,4,utf8_decode("Generado desde El portal web www.humantalentsas.com en la fecha. "),0,0,'C');	
		
	
	
	
	/*
$texto="\n\n\n\n\n			";		
	$pdf->MultiCell(145,1.5,"$texto",1,'L');$pdf->Ln(0);
	$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();
		
	*/
	$pdf->Output("certificado.pdf",'D');
	//$pdf->Output();

?>
