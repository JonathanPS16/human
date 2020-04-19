<?php 
include_once("conexion.php");
 ob_start(); 
$values = $_POST;
$claves = "";
$valores = "";
foreach ($values as $item => $value){
    $claves.=$item.",";
    $valores.="'".$value."',";
}
$claves = substr($claves, 0, -1);
$valores = substr($valores, 0, -1);
$hoy = date('Y-m-d');
$archivo ="archivo".date('Ymd').rand(5, 15).".pdf";
$sql = "INSERT INTO PROPUESTAS (".$claves.",fechasolicitud,archivo) VALUES (".$valores.",'".$hoy."','".$archivo."') ";
$results =  mysql_query($sql) ; 

$sql = "select * FROM PROPUESTAS ORDER BY 1 DESC LIMIT 1";
$results =  mysql_query($sql) ; 

while($datos=mysql_fetch_array($results)){
		
	
					$numreq=$datos['id_requesion'];
					$empresacliente=$datos['empresacliente'];
					$fechasolicitud =$datos['fechasolicitud'];
					$fecharequerida =$datos['fecharequerida'];
					$empresatemporal =$datos['empresatemporal'];
					$tipocargo =$datos['tipocargo'];
					$nombrecargo =$datos['nombrecargo'];
					$cantidad =$datos['cantidad'];
					$jornadalaboral =$datos['jornadalaboral'];
					$horario =$datos['horario'];
					$ciudadlaboral =$datos['ciudadlaboral'];
					$tipocontrato =$datos['tipocontrato'];
					$salariobasico =$datos['salariobasico'];
					$genero =$datos['genero'];
					$comisiones =$datos['comisiones'];
					$minima =$datos['minima'];
					$maxima =$datos['maxima'];
					$indiferenteedad =$datos['indiferenteedad'];
					$acargo =$datos['acargo'];
					$equipos =$datos['equipos'];
					$dinero =$datos['dinero'];
					$materiales =$datos['materiales'];
					$herramientas =$datos['herramientas'];
					$documentos=$datos['documentos'];
					$confidencial =$datos['confidencial'];
					$valores=$datos['valores'];
					$otrosresponsabilidades =$datos['otrosresponsabilidades'];
					$rodamiento =$datos['rodamiento'];
					$bonificaciones =$datos['bonificaciones'];
					$otro =$datos['otros'];
					$funciones =$datos['funciones'];
					$primaria =$datos['primaria'];
					$secundaria =$datos['secundaria'];
					$tecnico =$datos['tecnico'];
					$tecnologo =$datos['tecnologo'];
					$profesional =$datos['profesional'];
					$postgrado =$datos['postgrados'];
					$otroeducacion =$datos['otroeducacion'];
					$adaptabilidad=$datos['valores'];
                    $orientacion=$datos['valores'];
                    $administracion=$datos['admintiempo'];
                    $orientacioncliente =$datos['orientacioninternoexte'];
                    $analisis =$datos['analisisproblemas'];
                    $cominicacion =$datos['comunicacion'];
                    $capacidad =$datos['gestion'];
                    $planeacion =$datos['tecnologia'];
                    $normasyprocesos =$datos['orientacionprocesos'];
                    $relaciones =$datos['interpersonales'];
                    $aprendizaje =$datos['aprendizaje'];
                    $liderazgo =$datos['liderazgo'];
                    $felxibilidad=$datos['flexibilidad'];  
                    $sensibilidad =$datos['sencibilidad'];
                    $controlriesgo =$datos['riesgos'];
                    $conflictos=$datos['conflictos'];
                    $innovacion =$datos['innovacion'];
                    $tolerancia =$datos['tolerancia'];
                    $seguridad=$datos['seguridadsalud'];
                    $trabajoenequipo =$datos['trabajoequipo'];
                    $observacionalcliente=$datos['atenciondetalle'];
                    $orientaciontecnologica=$datos['tecnologia'];
                    $conclictos=$datos['conflictos'];
                    $otrashabilidades=$datos['otrashabilidades'];
                    $solicitante=$datos['solicitante'];
                    $nombrecargosolicitante=$datos['nombrecargosolicitante'];
                    
                    
                    
                    
					
					
					
				}
				

?>
<style>
                table {
                border-collapse: collapse;

                table-layout: fixed;
    width: 1200px;
                }

                table, th, td {
                    border: 1px solid black;
    width: 400px;
    word-wrap: break-word;
                    /*
                border: 1px solid black;*/
                
                }
                
        
</style>
<table width="100%"> 
    <tbody>
        <tr>
            <th colspan="8"><center><h3>FORMATO REQUISICIÓN DE PERSONAL</h3></center> 								</th>
        </tr>
        <tr>
        <td rowspan="2"  colspan="2">Nombre Empresa Cliente</td>
        <td rowspan="2" colspan="2"> 
            <?php echo $empresacliente;?>
    </td>
    <td  colspan="2">Fecha Solicitud</td>
    <td  colspan="2"><?php echo $fechasolicitud; ?></td>
    </tr>
    <tr>
        <td colspan="2">Fecha Requerida Cargo</td>
        <td colspan="2"><?=$fecharequerida?></td>
    </tr>
    <tr>
        <td colspan="2">Empresa Temporal</td>
        <td colspan="2">
            <?=$empresatemporal?>
        </td colspan="2">
        <td colspan="2">Tipo Cargo</td>
        <td colspan="2">
           <?=$tipocargo?>
        </td>
    </tr>
    <tr>
        <td colspan="8">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="8"><center>Descripción Perfil del  Cargo</center></td>
    </tr>

    <tr>
        <td colspan="2"> Nombre del Cargo</td>
        <td colspan="4">
            <?=$nombrecargo?>
        </td>
        <td>Cantidad</td>
        <td>
            <?=$cantidad?>
        </td>
    </tr>
    <tr>
        <td colspan="2">Jornada Laboral</td>
        <td colspan="4">
            <?=$jornadalaboral?>
        </td>
        <td>Horario</td>
        <td>
           <?=$horario?>
        </td>
    </tr>

    <tr>
        <td colspan="2">Ciudad a Laborar</td>
        <td colspan="4">
            <?=$ciudadlaboral?>
        </td>
        <td colspan="2"><center>Condiciones Salariales</center></td>
    </tr>

    <tr>
        <td colspan="2">Tipo de Contrato</td>
        <td colspan="4">
        <?=$tipocontrato?>
        </td>
        <td>Salario  Básico</td>
        <td>
            $<?=$salariobasico ?>
        </td>
    </tr>

    <tr>
        <td colspan="2">Edad</td>
        <td colspan="2">
            Estado Civil
        </td>
        <td colspan="2">Genero</td>
        <td>Comisiones</td>
        <td>$<?=$comisiones?></td>
        
    </tr>
    <tr>
        <td>
            Minima
        </td>
        <td><?=$minima?></td>
        <td>Soltero</td>
        <td><?php if($estadocivil==1){
                echo "X";
            }?></td>
        <td>Masculino</td>
        <td><?php 
            if($genero==1){
                echo "X";
            }
            
            ?></td>
        <td>Rodamiento</td>
        <td><?=$rodamiento?></td>

    </tr>
    <tr>
        <td>
              Máxima 
        </td>
        <td><?=$maxima?></td>
        <td> Casado  </td>
        <td><?php if($estadocivil==2){
                echo "X";
            }?></td>
        <td> Femenino</td>
        <td><?php 
            if($genero==2){
                echo "X";
            }
            
            ?></td>
        <td>Bonificacion 	</td>
        <td><?=$bonificaciones?></td>

    </tr>
    
    <tr>
        <td>
                Indiferente  
        </td>
        <td><?=$indiferenteedad?></td>
        <td>  Indiferente   </td>
        <td><?php if($estadocivil==0){
                echo "X";
            }?></td>
        <td>  Otro</td>
        <td><?php 
            if($genero==3){
                echo "X";
            }
            
            ?></td>
        <td>Otro 	 	</td>
        <td><?=$otro?></td>
    </tr>
    
    <tr>
        <td colspan="8">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="8"><center>Funciones Principales del Cargo</center></td>
    </tr>
    <tr>
        <td colspan="8"><?=$funciones?><br><br></td>
    </tr>

    <tr>
        <td colspan="8">&nbsp;</td>
    </tr>

    <tr>
        <td colspan="8"><center>Responsabilidad del Cargo (Marcar con una X)</center></td>
    </tr>
    
    
    <tr>
        <td colspan="2">Personal a Cargo</td>
        <td colspan="2">
           <?php
           if($acargo=="S") {
               echo "X";
           }
           ?>
        </td>
        <td colspan="2">Equipos </td>
        <td colspan="2">
       <?php
           if($equipos=="S") {
               echo "X";
           }
           ?>
        </td>
    </tr>
    <tr>
        <td colspan="2">Dinero</td>
        <td colspan="2">
            <?php
           if($dinero=="S") {
               echo "X";
           }
           ?>
        </td>
        <td colspan="2">Materiales y Mercancía </td>
        <td colspan="2">
       <?php
           if($materiales=="S") {
               echo "X";
           }
           ?>
        </td>
    </tr>

    <tr>
        <td colspan="2">Herramientas</td>
        <td colspan="2">
            <?php
           if($herramientas=="S") {
               echo "X";
           }
           ?>
        </td>
        <td colspan="2">Documentos</td>
        <td colspan="2">
        <?php
           if($documentos=="S") {
               echo "X";
           }
           ?>
        </td>
    </tr>

    <tr>
        <td colspan="2">Información Confidencial</td>
        <td colspan="2">
            <?php
           if($confidencial=="S") {
               echo "X";
           }
           ?>
        </td>
        <td colspan="2">Valores</td>
        <td colspan="2">
        <?php
           if($valores=="S") {
               echo "X";
           }
           ?>
        </td>
    </tr>
    <tr>
        <td colspan="2">Otros</td>
        <td colspan="2">
            <?=$otrosresponsabilidades ?>
        </td>
        <td colspan="4"></td>
        
    </tr>

    <tr>
        <td colspan="8">&nbsp;</td>
    </tr>

    <tr>
        <td colspan="8"><center>Formación Académica</center></td>
    </tr>

    <tr>
        <td colspan="2">Primaria </td>
        <td colspan="2">
            <?=$primaria ?>
        </td> 
    </tr>
    <tr>
        <td colspan="2">Secundaria  </td>
        <td colspan="2">
            <?=$secundaria ?>
        </td> 
    </tr>
    <tr>
        <td colspan="2">Técnico  </td>
        <td colspan="2">
            <?=$tecnico ?>
        </td> 
    </tr>
    <tr>
        <td colspan="2">Tecnólogo  </td>
        <td colspan="2">
            <?=$tecnologo ?>
        </td> 
    </tr>
    <tr>
        <td colspan="2">Profesional  </td>
        <td colspan="2">
           <?=$profesional ?>
        </td> 
    </tr>
    <tr>
        <td colspan="2">Postgrado  </td>
        <td colspan="2">
            <?=$postgrado ?>
        </td> 
    </tr>
    <tr>
        <td colspan="2">Otros</td>
        <td colspan="2">
            <?=$otroeducacion ?>
        </td> 
    </tr>

    <tr>
        <td colspan="8">&nbsp;</td>
    </tr>

    <tr>
        <td colspan="8"><center>Habilidades y Competencias</center></td>
    </tr>
    <tr>
        <td colspan="2">Adaptabilidad a Normas y Ambiente de Trabajo				</td>
        <td colspan="2">
        <?php
           if($adaptabilidad=="S") {
               echo "X";
           }
           ?>
        </td>
        <td colspan="2">Orientación A Los Resultados		</td>
        <td colspan="2">
       <?php
           if($orientacion=="S") {
               echo "X";
           }
           ?>
        </td>
    </tr>

    <tr>
        <td colspan="2">Administración del Tiempo		</td>
        <td colspan="2">
       <?php
           if($administracion=="S") {
               echo "X";
           }
           ?>
        </td>
        <td colspan="2">Orientación Al Cliente Interno Y Externo				</td>
        <td colspan="2">
        <?php
           if($orientacioncliente=="S") {
               echo "X";
           }
           ?>
        </td>
    </tr>


    <tr>
        <td colspan="2">Análisis y Solución De Problemas				</td>
        <td colspan="2">
        <?php
           if($analisis=="S") {
               echo "X";
           }
           ?>
        </td>
        <td colspan="2">Comunicación		</td>
        <td colspan="2">
        <?php
           if($cominicacion=="S") {
               echo "X";
           }
           ?>
        </td>
    </tr>

    <tr>
        <td colspan="2">Capacidad De Gestión</td>
        <td colspan="2">
        <?php
           if($capacidad=="S") {
               echo "X";
           }
           ?>
        </td>
        <td colspan="2">Orientación Tecnológica		</td>
        <td colspan="2">
       <?php
           if($orientaciontecnologica=="S") {
               echo "X";
           }
           ?>
        </td>
    </tr>

    <tr>
        <td colspan="2">Capacidad De Negociación				</td>
        <td colspan="2">
        <?php
           if($capacidad=="S") {
               echo "X";
           }
           ?>
        </td>
        <td colspan="2">Planeación		</td>
        <td colspan="2">
        <?php
           if($planeacion=="S") {
               echo "X";
           }
           ?>
        </td>
    </tr>


    <tr>
        <td colspan="2">Orientación al Cumplimiento Normas Y Procesos				</td>
        <td colspan="2">
        <?php
           if($normasyprocesos=="S") {
               echo "X";
           }
           ?>
        </td>
        <td colspan="2">Relaciones Interpersonales		</td>
        <td colspan="2">
        <?php
           if($relaciones=="S") {
               echo "X";
           }
           ?>
        </td>
    </tr>


    <tr>
        <td colspan="2">Disposición Hacia El Aprendizaje								</td>
        <td colspan="2">
        <?php
           if($aprendizaje=="S") {
               echo "X";
           }
           ?>
        </td>
        <td colspan="2">Liderazgo		</td>
        <td colspan="2">
        <?php
           if($liderazgo=="S") {
               echo "X";
           }
           ?>
        </td>
    </tr>


    <tr>
        <td colspan="2">Flexibilidad				</td>
        <td colspan="2">
        <?php
           if($felxibilidad=="S") {
               echo "X";
           }
           ?>
        </td>
        <td colspan="2">Sensibilidad Organizacional		</td>
        <td colspan="2">
        <?php
           if($sensibilidad=="S") {
               echo "X";
           }
           ?>
        </td>
    </tr>


    <tr>
        <td colspan="2">Identificación Y Control Del Riesgo				</td>
        <td colspan="2">
       <?php
           if($controlriesgo=="S") {
               echo "X";
           }
           ?>
        </td>
        <td colspan="2">Solución Y Manejo De Conflictos			</td>
        <td colspan="2">
        <?php
           if($conclictos=="S") {
               echo "X";
           }
           ?>
        </td>
    </tr>


    <tr>
        <td colspan="2">Innovación Y Creatividad								</td>
        <td colspan="2">
        <?php
           if($innovacion=="S") {
               echo "X";
           }
           ?>
        </td>
        <td colspan="2">Tolerancia Al Trabajo Bajo Presión				</td>
        <td colspan="2">
        <?php
           if($tolerancia=="S") {
               echo "X";
           }
           ?>
        </td>
    </tr>

    <tr>
        <td colspan="2">Seguridad, Salud Ocupacional Y Medio Ambiente												</td>
        <td colspan="2">
        <?php
           if($seguridad=="S") {
               echo "X";
           }
           ?>
        </td>
        <td colspan="2">Trabajo En Equipo						</td>
        <td colspan="2">
        <?php
           if($trabajoenequipo=="S") {
               echo "X";
           }
           ?>
        </td>
    </tr>
    <tr>
        <td colspan="2">Observación Y Atención Al Detalle																</td>
        <td colspan="2">
        <?php
           if($observacionalcliente=="S") {
               echo "X";
           }
           ?>
        </td>
        <td colspan="2">Otros 					</td>
        <td colspan="2">
        <?=$otrashabilidades?>
        </td>
    </tr>
    <tr>
        <td colspan="8">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="2"> Nombre Quien Solicita 	</td>
        <td colspan="2"> <?=$solicitante?>	</td>
        <td colspan="2"> Nombre del Cargo </td>
        <td colspan="2"> <?=$nombrecargosolicitante?>	</td>
    </tr>
</tbody></table>





<?php 

require_once("../certificados/dompdf/dompdf_config.inc.php");

$dompdf = new DOMPDF();
$dompdf->load_html(ob_get_clean());
$dompdf->render();
$pdf = $dompdf->output();
//$filename = "Comprobante".'.pdf';
file_put_contents($archivo, $pdf); //esta linea guarda el archivo en el servidor
//$dompdf->stream($filename);
//file_put_contents($archivo', $dompdf->output());
?>
<a href="../index.php">Requision generada  codigo REQ<?=$numreq?></a>