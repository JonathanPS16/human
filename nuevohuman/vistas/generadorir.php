<?php
$meses = array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");

setlocale(LC_ALL,"es_ES");
include_once("numerosaletras.php");

	
		$inf=$certificados[0];
        
	$nombre=$inf['PRIMERAPELLIDO'].' '.$inf['SEGUNDOAPELLIDO'].' '.$inf['PRIMERNOMBRE'].' '.$inf['SEGUNDONOMBRE'];
    //die($nombre);
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
		$pdf->Cell(190,5, utf8_decode('(4). Número de formulario: ').$inf['CEDULA'].'', 0,0,"C");$pdf->Ln();
		$pdf->Cell(190,5, 'RETENEDOR', 1,0,"C");$pdf->Ln();
		$pdf->SetFont('Helvetica', '', 7);
		$texto="(5). Número de identificación Tributaria (NIT) 900.441.722 -6 \n (11). RAZON SOCIAL HUMAN TALENT EMPRESA DE SERVICIOS TEMPORALES S.A.S \n";
		$pdf->MultiCell(190,3,utf8_decode("$texto"),1,'L');$pdf->Ln(0);

		
		$pdf->SetFont('Helvetica', '', 9);
		$pdf->MultiCell(190,5, 'EMPLEADO', 1,"C");$pdf->Ln(0);
		$pdf->SetFont('Helvetica', '', 7); 
		$pdf->MultiCell(190,5,'(24). TIPO: CEDULA  (25).'.$inf['CEDULA'].'                                                          (26-29). NOMBRES Y APELLIDOS:  '.utf8_decode("$nombre").'', 1,"L");$pdf->Ln(0);
		  
		$texto="PERIODO DE CERTIFICACION:         (30).".$inf['FECHAINICIAL']."                       							  AL			(31).".$inf[FECHAFINAL]."	               FECHA DE EXPEDICION          (32).".$inf[FECHAEXPEDICION]." \nLUGAR DONDE SE PRACTICO LA RETENCION (33).BOGOTA                       							    DEPARTAMENTO: (34).D.C. BOGOTA                  CIUDAD: (35).BOGOTA";
		$pdf->MultiCell(190,3,"$texto",1,'L');$pdf->Ln(0);
		$pdf->MultiCell(190,3,"",1,'L');$pdf->Ln(0);
		$texto="(36). NÚMERO DE AGENCIAS, SUCURSALES, FILIALES O SUBSIDIARIAS DE LA EMPRESA RETENEDORA\n CUYOS MONTOS DE RETENCIÓN SE CONSOLIDAN ";
		$pdf->MultiCell(190,4,utf8_decode("$texto"),1,'L');$pdf->Ln(0);
		
		$pdf->Cell(145,4,"CONCEPTO DE LOS INGRESOS",1,0,'C');
		$pdf->Cell(45,4,"VALOR",1,0,'C');$pdf->Ln();

		$pdf->Cell(145,4,"(37). Pagos al empleado (No incluya los demas valores relacionados)",0,0,'L');
		$pdf->Cell(45,4,number_format($inf['SALARIOSLABORALES'][0], 0, '', '.'),0,0,'R');$pdf->Ln();

		$pdf->Cell(145,4,utf8_decode("(38). Cesantías e intereses de cesantías efectivamente pagadas en el período"),0,0,'L');
		$pdf->Cell(45,4,$inf['CESANTIAS'],0,0,'R');$pdf->Ln();

		$pdf->Cell(145,4,utf8_decode("(39). Gastos de representación"),0,0,'L');
		$pdf->Cell(45,4,"0",0,0,'R');$pdf->Ln();

		$pdf->Cell(145,4,utf8_decode("(40). Pensiones de jubilación, vejez o invalidez"),0,0,'L');
		$pdf->Cell(45,4,"0",0,0,'R');$pdf->Ln();

		$pdf->Cell(145,4,"(41). Otros ingresos como empleado",0,0,'L');
		$pdf->Cell(45,4,"0",0,0,'R');$pdf->Ln();
		
		$pdf->SetFont('Helvetica', 'B', 7); 
		$pdf->Cell(145,4,"(42). Total de ingresos brutos ",0,0,'L');
		$pdf->Cell(45,4,$inf['TOTALBRUTOS'],0,0,'R');$pdf->Ln();
		$pdf->SetFont('Helvetica', '', 7); 
		
		$pdf->Cell(145,4,"CONCEPTO DE LOS APORTES",1,0,'C');
		$pdf->Cell(45,4,"",1,0,'C');$pdf->Ln();

		$pdf->Cell(145,4,"(43). Aportes obligatorios por salud",0,0,'L');
		$pdf->Cell(45,4,$inf['AportesSalud'],0,0,'R');$pdf->Ln();

		$pdf->Cell(145,4,"(44). Aportes obligatorios a fondos de pensiones y solidaridad pensional",0,0,'L');
		$pdf->Cell(45,4,$inf['Aportespensional'],0,0,'R');$pdf->Ln();

		$pdf->Cell(145,4,"(45). Aportes voluntarios, a fondos de pensiones y cuentas AFC",0,0,'L');
		$pdf->Cell(45,4,"0",0,0,'R');$pdf->Ln();
		
		$pdf->SetFont('Helvetica', 'B', 7); 
		$pdf->Cell(145,4,utf8_decode("(46). Valor de la retención en la fuente por pagos al empleado "),0,0,'L');
		$pdf->Cell(45,4,'0',0,0,'R');$pdf->Ln();
		$pdf->SetFont('Helvetica', '', 7); 
		
		$texto="Nombre del pagador o agente retenedor  HUMAN TALENT EMPRESA DE SERVICIOS TEMPORALES S.A.S \n NIT o CC    900.441.772 - 6 \n                                                                                      No Necesita firma autográfa D.R. 836/91, Art.10";
		$pdf->MultiCell(190,4,utf8_decode("$texto"),1,'L');$pdf->Ln(0);
		$pdf->MultiCell(190,5, 'DATOS A CARGO DEL EMPLEADO', 1,"C");$pdf->Ln(0);
		
		$pdf->Cell(100,4,"CONCEPTO DE OTROS INGRESOS",1,0,'C');
		$pdf->Cell(45,4,"VALOR RECIBIDO",1,0,'C');
		$pdf->Cell(45,4,"VALOR RETENIDO",1,0,'C');$pdf->Ln();

		$pdf->Cell(100,4,"Arrendamientos",0,0,'L');
		$pdf->Cell(45,4,"(47).",0,0,'L');
		$pdf->Cell(45,4,"(54).",0,0,'L');$pdf->Ln();

		$pdf->Cell(100,4,"Honorarios, comisiones y servicios",0,0,'L');
		$pdf->Cell(45,4,"(48).",0,0,'L');
		$pdf->Cell(45,4,"(55).",0,0,'L');$pdf->Ln();

		$pdf->Cell(100,4,"Intereses y rendimientos financieros",0,0,'L');
		$pdf->Cell(45,4,"(49).",0,0,'L');
		$pdf->Cell(45,4,"(56).",0,0,'L');$pdf->Ln();

		$pdf->Cell(100,4,utf8_decode("Enajenación de activos fijos"),0,0,'L');
		$pdf->Cell(45,4,"(50).",0,0,'L');
		$pdf->Cell(45,4,"(57).",0,0,'L');$pdf->Ln();

		$pdf->Cell(100,4,utf8_decode("Loterías, rifas, apuestas y similares"),0,0,'L');
		$pdf->Cell(45,4,"(51).",0,0,'L');
		$pdf->Cell(45,4,"(58).",0,0,'L');$pdf->Ln();

		$pdf->Cell(100,4,"Otros",0,0,'L');
		$pdf->Cell(45,4,"(52).",0,0,'L');
		$pdf->Cell(45,4,"(59).",0,0,'L');$pdf->Ln();

		$pdf->Cell(100,4,"Total",1,0,'L');
		$pdf->Cell(45,4,"(53).",1,0,'L');
		$pdf->Cell(45,4,"(60).",1,0,'L');$pdf->Ln();

		$pdf->Cell(145,4,utf8_decode("(62). IDENTIFICACIÓN DE LOS BIENES POSEÍDOS"),1,0,'C');
		$pdf->Cell(45,4,"(63). VALOR PATRIMONIO",1,0,'C');$pdf->Ln();
		
		$pdf->Cell(145,4,"",0,0,'C');
		$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();
		
		$pdf->Cell(145,4,"",0,0,'C');
		$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();
		
		$pdf->Cell(145,4,"",0,0,'C');
		$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();
		
		$pdf->Cell(145,4,"",0,0,'C');
		$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();
		
		$pdf->Cell(145,4,"",0,0,'C');
		$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();
		
		$pdf->Cell(145,4,"",0,0,'C');
		$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();

		$pdf->MultiCell(190,5,utf8_decode( 'Identificación de las personas dependientes de acuerdo al parágrafo 2 del artículo 387 del Estatuto Tributario'), 1,"C");$pdf->Ln(0);
		
		$pdf->Cell(50,4,"(65). CEDULA",1,0,'C');
		$pdf->Cell(95,4,"(66). APELLIDOS Y NOMBRES",1,0,'C');
		$pdf->Cell(45,4,"(67). PARENTESCO",1,0,'C');$pdf->Ln();
			
		$pdf->Cell(50,4,"",0,0,'C');
		$pdf->Cell(95,4," ",0,0,'C');
		$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();
			
		$pdf->Cell(50,4,"",0,0,'C');
		$pdf->Cell(95,4," ",0,0,'C');
		$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();
			
		$pdf->Cell(50,4,"",0,0,'C');
		$pdf->Cell(95,4," ",0,0,'C');
		$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();
			
		$pdf->Cell(50,4,"",0,0,'C');
		$pdf->Cell(95,4," ",0,0,'C');
		$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();

		
		$pdf->Line(200,218,10,218);
		
		$pdf->Line(200,258,10,258);//$pdf->Line(200,254,10,254);
		
		$pdf->Line(200,258,200,35);//$pdf->Line(200,254,200,35);
		$pdf->Line(10,258,10,70);//$pdf->Line(10,254,10,70);
		
		
		
		$pdf->Line(155,116,155,70);
		$pdf->Line(155,133,155,193);
		$pdf->Line(110,133,110,161);

		$pdf->Line(60,200,60,218);
		$pdf->Line(155,200,155,258);//$pdf->Line(155,200,155,254);

		$pdf->Cell(145,4,utf8_decode("Certifico que durante el año gravable de ").$anio.'',0,0,'L');
		
		
		/*año*/
		
		switch ($anio) {
			case 2011:
				
				$pdf->Cell(45,4,"Firma del empleado",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("1. Por lo menos el 80% de mis ingresos brutos provinieron de una relación laboral o legal y reglamentaria."),0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("2. Mi patrimonio bruto era igual o inferior a cuatro mil quinientos (4.500) UVT ($113.094.000)."),0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("3. No fui responsable del impuesto sobre las ventas."),0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("4. Mis ingresos totales fueron iguales o inferiores a cuatro mil setenta y tres (4.073) UVT ($102.363.000)."),0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("5. Mis consumos mediante tarjeta de crédito no excedieron la suma de dos mil ochocientos (2.800) UVT ($70.370.000)."),0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("6. Que el total de mis compras y consumos no superaron la suma de dos mil ochocientos (2.800) UVT ($70.370.000)."),0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("7. Que el valor total de mis consignaciones bancarias, depósitos o inversiones financieras no excedieron los cuatro mil quinientos "),0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("	(4.500) UVT ($113.094.000)."),0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("Por lo tanto, manifiesto que no estoy obligado a presentar declaración de renta y complementarios por el año gravable ").$anio.'',0,0,'L');
				$pdf->Cell(45,4,"c.c. o Nit Nro",0,0,'C');$pdf->Ln();	

			break;
			case 2012:
				
				$pdf->Cell(45,4,"Firma del empleado",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("1. Por lo menos el 80% de mis ingresos brutos provinieron de una relación laboral o legal y reglamentaria."),0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("2. Mi patrimonio bruto era igual o inferior a cuatro mil quinientos (4.500) UVT ($117.221.000)."),0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("3. No fui responsable del impuesto sobre las ventas."),0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("4. Mis ingresos totales fueron iguales o inferiores a cuatro mil setenta y tres (4.073) UVT ($106.098.000)."),0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("5. Mis consumos mediante tarjeta de crédito no excedieron la suma de dos mil ochocientos (2.800) UVT ($72.937.000)."),0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("6. Que el total de mis compras y consumos no superaron la suma de dos mil ochocientos (2.800) UVT ($72.937.000)."),0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("7. Que el valor total de mis consignaciones bancarias, depósitos o inversiones financieras no excedieron los cuatro mil quinientos "),0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("	(4.500) UVT ($117.221.000)."),0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("Por lo tanto, manifiesto que no estoy obligado a presentar declaración de renta y complementarios por el año gravable ").$anio.'',0,0,'L');
				$pdf->Cell(45,4,"c.c. o Nit Nro",0,0,'C');$pdf->Ln();	

			break;
			case 2013:
				
				$pdf->Cell(45,4,"Firma del empleado",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("1. Mi patrimonio bruto era igual o inferior a cuatro mil quinientas (4.500) UVT ($120.785.000)."),0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("2. No fui responsable del impuesto sobre las ventas."),0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("3. Mis ingresos brutos fueron inferiores a mil cuatrocientas (1.400) UVT ($37.577.000)."),0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("4. Mis consumos mediante tarjeta de crédito no excedieron la suma de dos mil ochocientas (2.800) UVT ($75.155.000)."),0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("5. Que el total de mis compras y consumos no superaron la suma de dos mil ochocientas (2.800) UVT ($75.155.000)."),0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("6. Que el valor total de mis consignaciones bancarias, depósitos o inversiones financieras no excedieron los cuatro mil quinientas"),0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("	(4.500) UVT ($120.785.000)."),0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("Por lo tanto, manifiesto que no estoy obligado a presentar declaración de renta y complementarios por el año gravable ").$anio.'',0,0,'L');
				$pdf->Cell(45,4,"c.c. o Nit Nro",0,0,'C');$pdf->Ln();	
				$pdf->Ln();

			break;
			case 2014:
						
				$pdf->Cell(45,4,"Firma del empleado",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("1. Mi patrimonio bruto era igual o inferior a cuatro mil quinientas (4.500) UVT ($123.683.000)."),0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("2. No fui responsable del impuesto sobre las ventas."),0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("3. Mis ingresos brutos fueron inferiores a mil cuatrocientas (1.400) UVT ($38.479.000)."),0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("4. Mis consumos mediante tarjeta de crédito no excedieron la suma de dos mil ochocientas (2.800) UVT ($76.958.000)."),0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("5. Que el total de mis compras y consumos no superaron la suma de dos mil ochocientas (2.800) UVT ($76.958.000)."),0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("6. Que el valor total de mis consignaciones bancarias, depósitos o inversiones financieras no excedieron los cuatro mil quinientas"),0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("	(4.500) UVT ($123.683.000)."),0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("Por lo tanto, manifiesto que no estoy obligado a presentar declaración de renta y complementarios por el año gravable ").$anio.'',0,0,'L');
				$pdf->Cell(45,4,"c.c. o Nit Nro",0,0,'C');$pdf->Ln();	
				$pdf->Ln();

			break;
			case 2015:
						
				$pdf->Cell(45,4,"Firma del empleado",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("1. Mi patrimonio bruto era igual o inferior a cuatro mil quinientas (4.500) UVT ($127.256.000)."),0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("2. No fui responsable del impuesto sobre las ventas."),0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("3. Mis ingresos brutos fueron inferiores a mil cuatrocientas (1.400) UVT ($39.591.000)."),0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("4. Mis consumos mediante tarjeta de crédito no excedieron la suma de dos mil ochocientas (2.800) UVT ($79.181.000)."),0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("5. Que el total de mis compras y consumos no superaron la suma de dos mil ochocientas (2.800) UVT ($79.181.000)."),0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("6. Que el valor total de mis consignaciones bancarias, depósitos o inversiones financieras no excedieron los cuatro mil quinientas "),0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("	(4.500) UVT ($127.256.000)."),0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("Por lo tanto, manifiesto que no estoy obligado a presentar declaración de renta y complementarios por el año gravable ").$anio.'',0,0,'L');
				$pdf->Cell(45,4,"c.c. o Nit Nro",0,0,'C');$pdf->Ln();	
				$pdf->Ln();

			break;
			case 2016:
			
				$pdf->Cell(45,4,"Firma del empleado",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,"1. Mi patrimonio bruto era igual o inferior a cuatro mil quinientas (4.500) UVT ($133.889.000).",0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,"2. No fui responsable del impuesto sobre las ventas.",0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,"3. Mis ingresos brutos fueron inferiores a mil cuatrocientas (1.400) UVT ($41.654.000).",0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("4. Mis consumos mediante tarjeta de crédito no excedieron la suma de dos mil ochocientas (2.800) UVT ($83.308.000)."),0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,"5. Que el total de mis compras y consumos no superaron la suma de dos mil ochocientas (2.800) UVT ($83.308.000).",0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,"6. Que el valor total de mis consignaciones bancarias, depósitos o inversiones financieras no excedieron los cuatro mil quinientas ",0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,"	(4.500) UVT ($133.889.000).",0,0,'L');
				$pdf->Cell(45,4,"",0,0,'C');$pdf->Ln();	
				$pdf->Cell(145,4,utf8_decode("Por lo tanto, manifiesto que no estoy obligado a presentar declaración de renta y complementarios por el año gravable 2016."),0,0,'L');
				$pdf->Cell(45,4,"c.c. o Nit Nro",0,0,'C');$pdf->Ln();	
				$pdf->Ln();

			break;
		
		}

		$pdf->Cell(190,4,utf8_decode("NOTA: Este certificado sustituye para todos los efectos legales la declaración de Renta y Complementarios para el empleado que lo firme. "),0,0,'C');	

		$pdf->Cell(190,4,utf8_decode("Generado desde El portal web www.humantalentsas.com en la fecha. "),0,0,'C');	
		

$pdf->Output(F,'filenameingresos.pdf');
ob_end_flush();
?>
<br><br><br>
<div class="form-group">
  <div class="col-md-8">
    <a href="filenameingresos.pdf" target="_black" class="btn btn-info">Descargar Archivo</a>
    <a href="home.php?ctr=buscardorCertificados&acc=buscador" class="btn btn-primary">Nueva Consulta</a>
  </div>
</div>