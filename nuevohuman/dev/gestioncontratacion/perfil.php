<?php 
include_once("conexion.php");
$sql = "select * FROM masterempresas ORDER BY nombreemrpesa DESC";
$results =  mysql_query($sql) ; 
$select="<option value='0'>Seleccione</option>";
while($datos=mysql_fetch_array($results)){
    $idempresa=$datos['idempresa'];
    $nombreemrpesa=$datos['nombreemrpesa'];
		$select.='<option value="'.$idempresa.'">'.$nombreemrpesa.'</option>';
				}
$_SESSION['empresa']="human";
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Hola Mundo!</title>
        <style>
                table {
                border-collapse: collapse;
                }

                table, th, td {
                border: 1px solid black;
                }
                
        
</style>
    </head>
    <body>

    <form action="gestion.php" method="post">
<table> 
    <tr>
        <input type="hidden" name="empresacliente" id="empresacliente" value="<?php echo $_SESSION['empresa'];?>">
        <td rowspan="2">Nombre Empresa Cliente</td>
        <td rowspan="2"> 
          <?php echo $_SESSION['empresa'];?>
    </td>
    <td>Fecha Solicitud</td>
    <td><?php echo date('Y-m-d'); ?></td>
    </tr>
    <tr>
        <td>Fecha Requerida Cargo</td>
        <td><input type="date" id="fecharequerida" name="fecharequerida" required></td>
    </tr>
    <tr>
        <td>Empresa Temporal</td>
        <td>
            <select id="empresatemporal" name="empresatemporal">
                    <?php echo $select;?>
                </select>
        </td>
        <td>Tipo Cargo</td>
        <td>
            <select id="tipocargo" name="tipocargo">
                    <option value="0">Seleccione</option>
                    <option value="cargo">cargo</option>
                </select>
        </td>
    </tr>
    <tr>
        <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="4">Descripción Perfil del  Cargo</td>
    </tr>

    <tr>
        <td> Nombre del Cargo</td>
        <td>
            <input type="text" id="nombrecargo" name="nombrecargo" required>
        </td>
        <td>Cantidad</td>
        <td>
            <input type="number" id="cantidad" name ="cantidad" required>
        </td>
    </tr>
    <tr>
        <td>Jornada Laboral</td>
        <td>
            <input type="text" id="jornadalaboral" name ="jornadalaboral" required>
        </td>
        <td>Horario</td>
        <td>
            <input type="text" id="horario" name ="horario" required>
        </td>
    </tr>

    <tr>
        <td>Ciudad a Laborar</td>
        <td>
            <input type="text" id="ciudadlaboral" name ="ciudadlaboral" required>
        </td>
        <td colspan="2">Condiciones Salariales</td>
    </tr>

    <tr>
        <td>Tipo de Contrato</td>
        <td>
        <select id="tipocontrato" name="tipocontrato">
                    <option value="0">Seleccione</option>
                    <option value="indefinido">indefinido</option>
                </select>
        </td>
        <td>Salario  Básico</td>
        <td>
            <input type="number" id="salariobasico" name="salariobasico" required>
        </td>
    </tr>

    <tr>
        <td colspan="2">Edad</td>
        <td>
            Estado Civil
        </td>
        <td>Genero</td>
        
    </tr>
    <tr>
        <td colspan="2">
            Minima <input type="number" id="minima" name ="minima" required><BR>
            Maxima <input type="number" id="maxima" name ="maxima" required><BR>
            Indiferente <select id="indiferenteedad" name ="indiferenteedad">
                <option value="">NO</option>
                <option value="X">SI</option>
            </select>
        </td>
        <td>
            <select id="estadocivil" name ="estadocivil">
                <option value="0">Indiferente</option>
                <option value="1">Soltero</option>
                <option value="2">Casado</option>
                
            </select>
        </td>
        <td>
            <select id="genero" name="genero">
                <option value ="0">Seleccione Genero</option>
                <option value ="1">Masculino</option>
                <option value ="2">Femenino</option>
                <option value ="3">Otro</option>
            </select>
        </td>
    </tr>
    <tr>
        <td colspan="4">Condiciones Salariales</td>
    </tr>
    <tr>
        <td>Salario  Básico</td>
        <td><input type="text" id="salario" name="salario" required></td>
        <td>Comisiones </td>
        <td><input type="text" id="comisiones" name="comisiones" required></td>
    </tr>
    <tr>
        <td>Rodamiento</td>
        <td><input type="text" id="rodamiento" name="rodamiento" required></td>
        <td>Bonificacion </td>
        <td><input type="text" id="bonificaciones" name="bonificaciones" required></td>
    </tr>
    <tr>
        <td>Otros</td>
        <td><input type="text" id="otros" name="otros" required></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="4">Funciones Principales del Cargo</td>
    </tr>
    <tr>
        <td colspan="4"><textarea name="funciones" id="funciones" rows="5" cols="120" required></textarea></td>
    </tr>

    <tr>
        <td colspan="4">&nbsp;</td>
    </tr>

    <tr>
        <td colspan="4">Responsabilidad del Cargo</td>
    </tr>
    <tr>
        <td>Personal a Cargo</td>
        <td>
            <select id="acargo" name="acargo">
                <option value="N">No</option>
                <option value="S">Sí</option>
            </select>
        </td>
        <td>Equipos </td>
        <td>
        <select id="equipos" name="equipos">
                <option value="N">No</option>
                <option value="S">Sí</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>Dinero</td>
        <td>
            <select id="dinero" name="dinero">
                <option value="N">No</option>
                <option value="S">Sí</option>
            </select>
        </td>
        <td>Materiales y Mercancía </td>
        <td>
        <select id="materiales" name="materiales">
                <option value="N">No</option>
                <option value="S">Sí</option>
            </select>
        </td>
    </tr>

    <tr>
        <td>Herramientas</td>
        <td>
            <select id="herramientas" name="herramientas">
                <option value="N">No</option>
                <option value="S">Sí</option>
            </select>
        </td>
        <td>Documentos</td>
        <td>
        <select id="documentos" name="documentos" >
                <option value="N">No</option>
                <option value="S">Sí</option>
            </select>
        </td>
    </tr>

    <tr>
        <td>Información Confidencial</td>
        <td>
            <select id="confidencial" name="confidencial">
                <option value="N">No</option>
                <option value="S">Sí</option>
            </select>
        </td>
        <td>Valores</td>
        <td>
        <select id="valores" name="valores">
                <option value="N">No</option>
                <option value="S">Sí</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>Otros</td>
        <td>
            <input type="text" id="otrosresponsabilidades" name="otrosresponsabilidades">
        </td>
        <td colspan="2"></td>
        
    </tr>

    <tr>
        <td colspan="4">&nbsp;</td>
    </tr>

    <tr>
        <td colspan="4">Formación Académica</td>
    </tr>

    <tr>
        <td colspan="2">Primaria </td>
        <td colspan="2">
            <input type="text" id="primaria" name="primaria">
        </td> 
    </tr>
    <tr>
        <td colspan="2">Secundaria  </td>
        <td colspan="2">
            <input type="text" id="secundaria" name="secundaria">
        </td> 
    </tr>
    <tr>
        <td colspan="2">Técnico  </td>
        <td colspan="2">
            <input type="text" id="tecnico" name="tecnico">
        </td> 
    </tr>
    <tr>
        <td colspan="2">Tecnólogo  </td>
        <td colspan="2">
            <input type="text" id="tecnologo" name="tecnologo">
        </td> 
    </tr>
    <tr>
        <td colspan="2">Profesional  </td>
        <td colspan="2">
            <input type="text" id="profesional" name="profesional">
        </td> 
    </tr>
    <tr>
        <td colspan="2">Postgrado  </td>
        <td colspan="2">
            <input type="text" id="postgrados" name="postgrados">
        </td> 
    </tr>
    <tr>
        <td colspan="2">Otros</td>
        <td colspan="2">
            <input type="text" id="otros" name="otros">
        </td> 
    </tr>

    <tr>
        <td colspan="4">&nbsp;</td>
    </tr>

    <tr>
        <td colspan="4">Habilidades y Competencias</td>
    </tr>
    <tr>
        <td>Adaptabilidad a Normas y Ambiente de Trabajo				</td>
        <td>
        <select id="valores" name="valores">
                <option value="N">No</option>
                <option value="S">Sí</option>
            </select>
        </td>
        <td>Orientación A Los Resultados		</td>
        <td>
        <select id="valores" name="valores">
                <option value="N">No</option>
                <option value="S">Sí</option>
            </select>
        </td>
    </tr>

    <tr>
        <td>Administración del Tiempo		</td>
        <td>
        <select id="admintiempo" name="admintiempo">
                <option value="N">No</option>
                <option value="S">Sí</option>
            </select>
        </td>
        <td>Orientación Al Cliente Interno Y Externo				</td>
        <td>
        <select id="orientacioninternoexte" name="orientacioninternoexte">
                <option value="N">No</option>
                <option value="S">Sí</option>
            </select>
        </td>
    </tr>


    <tr>
        <td>Análisis y Solución De Problemas				</td>
        <td>
        <select id="analisisproblemas" name="analisisproblemas">
                <option value="N">No</option>
                <option value="S">Sí</option>
            </select>
        </td>
        <td>Comunicación		</td>
        <td>
        <select id="comunicacion" name="comunicacion">
                <option value="N">No</option>
                <option value="S">Sí</option>
            </select>
        </td>
    </tr>

    <tr>
        <td>Capacidad De Gestión</td>
        <td>
        <select id="gestion" name="gestion">
                <option value="N">No</option>
                <option value="S">Sí</option>
            </select>
        </td>
        <td>Orientación Tecnológica		</td>
        <td>
        <select id="tecnologia" name="tecnologia">
                <option value="N">No</option>
                <option value="S">Sí</option>
            </select>
        </td>
    </tr>

    <tr>
        <td>Capacidad De Negociación				</td>
        <td>
        <select id="negociacion" name="negociacion">
                <option value="N">No</option>
                <option value="S">Sí</option>
            </select>
        </td>
        <td>Planeación		</td>
        <td>
        <select id="planeacion" name="planeacion">
                <option value="N">No</option>
                <option value="S">Sí</option>
            </select>
        </td>
    </tr>


    <tr>
        <td>Orientación al Cumplimiento Normas Y Procesos				</td>
        <td>
        <select id="orientacionprocesos" name="orientacionprocesos">
                <option value="N">No</option>
                <option value="S">Sí</option>
            </select>
        </td>
        <td>Relaciones Interpersonales		</td>
        <td>
        <select id="interpersonales" name="interpersonales">
                <option value="N">No</option>
                <option value="S">Sí</option>
            </select>
        </td>
    </tr>


    <tr>
        <td>Disposición Hacia El Aprendizaje								</td>
        <td>
        <select id="aprendizaje" name="aprendizaje">
                <option value="N">No</option>
                <option value="S">Sí</option>
            </select>
        </td>
        <td>Liderazgo		</td>
        <td>
        <select id="liderazgo" name="liderazgo">
                <option value="N">No</option>
                <option value="S">Sí</option>
            </select>
        </td>
    </tr>


    <tr>
        <td>Flexibilidad				</td>
        <td>
        <select id="flexibilidad" name="flexibilidad">
                <option value="N">No</option>
                <option value="S">Sí</option>
            </select>
        </td>
        <td>Sensibilidad Organizacional		</td>
        <td>
        <select id="sencibilidad" name="sencibilidad">
                <option value="N">No</option>
                <option value="S">Sí</option>
            </select>
        </td>
    </tr>


    <tr>
        <td>Identificación Y Control Del Riesgo				</td>
        <td>
        <select id="riesgos" name="riesgos">
                <option value="N">No</option>
                <option value="S">Sí</option>
            </select>
        </td>
        <td>Solución Y Manejo De Conflictos			</td>
        <td>
        <select id="conflictos" name="conflictos">
                <option value="N">No</option>
                <option value="S">Sí</option>
            </select>
        </td>
    </tr>


    <tr>
        <td>Innovación Y Creatividad								</td>
        <td>
        <select id="innovacion" name="innovacion">
                <option value="N">No</option>
                <option value="S">Sí</option>
            </select>
        </td>
        <td>Tolerancia Al Trabajo Bajo Presión				</td>
        <td>
        <select id="tolerancia" name="tolerancia">
                <option value="N">No</option>
                <option value="S">Sí</option>
            </select>
        </td>
    </tr>

    <tr>
        <td>Seguridad, Salud Ocupacional Y Medio Ambiente												</td>
        <td>
        <select id="seguridadsalud" name="seguridadsalud">
                <option value="N">No</option>
                <option value="S">Sí</option>
            </select>
        </td>
        <td>Trabajo En Equipo						</td>
        <td>
        <select id="trabajoequipo" name="trabajoequipo">
                <option value="N">No</option>
                <option value="S">Sí</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>Observación Y Atención Al Detalle																</td>
        <td>
        <select id="atenciondetalle" name="atenciondetalle">
                <option value="N">No</option>
                <option value="S">Sí</option>
            </select>
        </td>
        <td>Otros 					</td>
        <td>
        <input type ="text" id="otrashabilidades" name="otrashabilidades" required>
        </td>
    </tr>
    <tr>
        <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
        <td> Nombre Quien Solicita 	</td>
        <td> <input type="text" id="solicitante" name="solicitante" required> 	</td>
        <td> Nombre del Cargo </td>
        <td> <input type="text" id="nombrecargo" name="nombrecargosolicitante" required>	</td>
    </tr>
    <tr>
        <td colspan="4"><input type="submit" value="Guardar"></td>
    </tr>
    
</table>
</form>
</body>
</html>