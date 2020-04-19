<?php 
include_once("conexion.php");
 ob_start(); 
$archivo ="archivoentre".date('Ymd').rand(5, 15).".pdf";
$update="UPDATE req_candidatos set 
fechanacimiento='".$_POST['fechanacimiento']."', 
genero='".$_POST['genero']."', 
aspiracion='".$_POST['aspiracion']."', 
residencia='".$_POST['residencia']."', 
estadocivil='".$_POST['estadocivil']."', 
grupon1='".$_POST['grupon1']."', 
grupop1='".$_POST['grupop1']."', 
grupof1='".$_POST['grupof1']."', 
grupoa1='".$_POST['grupoa1']."' ,
grupon2='".$_POST['grupon2']."', 
grupop2='".$_POST['grupop2']."', 
grupof2='".$_POST['grupof2']."', 
grupoa2='".$_POST['grupoa2']."' ,
grupon3='".$_POST['grupon3']."', 
grupop3='".$_POST['grupop3']."', 
grupof3='".$_POST['grupof3']."', 
grupoa3='".$_POST['grupoa3']."' ,
grupon4='".$_POST['grupon4']."', 
grupop4='".$_POST['grupop4']."', 
grupof4='".$_POST['grupof4']."', 
grupoa4='".$_POST['grupoa4']."' ,
grupon5='".$_POST['grupon5']."', 
grupop5='".$_POST['grupop5']."', 
grupof5='".$_POST['grupof5']."', 
grupoa5='".$_POST['grupoa5']."' ,
obsgrup='".$_POST['obsgrup']."',
secundariainst='".$_POST['secundariainst']."',
secundariatitu='".$_POST['secundariatitu']."',
secundariaano='".$_POST['secundariaano']."',
tecnicoinst='".$_POST['tecnicoinst']."',
tecnicotitu='".$_POST['tecnicotitu']."',
tecnicoano='".$_POST['tecnicoano']."',
tecnologoinst='".$_POST['tecnologoinst']."',
tecnologotitu='".$_POST['tecnologotitu']."',
tecnologoano='".$_POST['tecnologoano']."',
universitarioinst='".$_POST['universitarioinst']."',
universitariotitu='".$_POST['universitariotitu']."',
universitarioano='".$_POST['universitarioano']."',
posgradoinst='".$_POST['posgradoinst']."',
posgradotitu='".$_POST['posgradotitu']."',
posgradoano='".$_POST['posgradoano']."',
otroseducacion='".$_POST['otroseducacion']."',
obsereducacion='".$_POST['obsereducacion']."',
expe1='".$_POST['expe1']."',
cargo1='".$_POST['cargo1']."',
tiempo1='".$_POST['tiempo1']."',
salario1='".$_POST['salario1']."',
motivo1='".$_POST['motivo1']."',
funciones1='".$_POST['funciones1']."',
expe2='".$_POST['expe2']."',
cargo2='".$_POST['cargo2']."',
tiempo2='".$_POST['tiempo2']."',
salario2='".$_POST['salario2']."',
motivo2='".$_POST['motivo2']."',
funciones2='".$_POST['funciones2']."',
expe3='".$_POST['expe3']."',
cargo3='".$_POST['cargo3']."',
tiempo3='".$_POST['tiempo3']."',
salario3='".$_POST['salario3']."',
motivo3='".$_POST['motivo3']."',
funciones3='".$_POST['funciones3']."',
corto='".$_POST['corto']."',
mediano='".$_POST['mediano']."',
largo='".$_POST['largo']."',
otrasobsercandi='".$_POST['otrasobsercandi']."',
entrevista='".$archivo."'
WHERE id=".$_POST['idcand'];
mysql_query($update) ;
//echo $update;



$sql = "select * FROM PROPUESTAS";
$results =  mysql_query($sql) ; 
$cont=0;
/*while($datos=mysql_fetch_array($results)){
		
	$cont++;
					$id_requesionbf=$datos['id_requesion'];
					$cedulabf=$datos['empresacliente'];
					$nombrecargobf=$datos['nombrecargo'];
					//echo "<a href='requesion.php?req=".$id_requesionbf."'>Nombre del Cargo: ".$nombrecargobf." Empresa Cliente:".$cedulabf."</a>";
					
}
*/
$sql = "select * FROM req_candidatos where id=".$_POST['idcand'];
$results =  mysql_query($sql) ; 

while($datos=mysql_fetch_array($results)){
		
					$nombre=$datos['nombre'];
					$cedula=$datos['cedula'];
					$telefono=$datos['telefono'];
					$correo=$datos['correo'];
					$id_requisision=$datos['id_requisision'];
					
					$fechanacimiento=$datos['fechanacimiento']; 
                    $genero=$datos['genero']; 
                    $aspiracion=$datos['aspiracion'];  
                    $residencia=$datos['residencia'];  
                    $estadocivil=$datos['estadocivil']; 
                    $grupon1=$datos['grupon1'];  
                    $grupop1=$datos['grupop1']; 
                    $grupof1=$datos['grupof1'];  
                    $grupoa1=$datos['grupoa1'];  
                    
                    $grupon2=$datos['grupon2'];  
                    $grupop2=$datos['grupop2']; 
                    $grupof2=$datos['grupof2'];  
                    $grupoa2=$datos['grupoa2'];  
                    
                    $grupon3=$datos['grupon3'];  
                    $grupop3=$datos['grupop3']; 
                    $grupof3=$datos['grupof3'];  
                    $grupoa3=$datos['grupoa3'];  
                    
                    $grupon4=$datos['grupon4'];  
                    $grupop4=$datos['grupop4']; 
                    $grupof4=$datos['grupof4'];  
                    $grupoa4=$datos['grupoa4'];  
                    
                    $grupon5=$datos['grupon5'];  
                    $grupop5=$datos['grupop5']; 
                    $grupof5=$datos['grupof5'];  
                    $grupoa5=$datos['grupoa5'];  
                    $obsgrup=$datos['obsgrup'];  
                    
                    
                    
                    $secundariainst=$datos['secundariainst'];
                    $secundariatitu=$datos['secundariatitu'];
                    $secundariaano=$datos['secundariaano'];
                    $tecnicoinst=$datos['tecnicoinst'];
                    $tecnicotitu=$datos['tecnicotitu'];
                    $tecnicoano=$datos['tecnicoano'];
                    $tecnologoinst=$datos['tecnologoinst'];
                    $tecnologotitu=$datos['tecnologotitu'];
                    $tecnologoano=$datos['tecnologoano'];
                    $universitarioinst=$datos['universitarioinst'];
                    $universitariotitu=$datos['universitariotitu'];
                    $universitarioano=$datos['universitarioano'];
                    $posgradoinst=$datos['posgradoinst'];
                    $posgradotitu=$datos['posgradotitu'];
                    $posgradoano=$datos['posgradoano'];
                    $otroseducacion=$datos['otroseducacion'];
                    $obsereducacion=$datos['obsereducacion'];
                    $expe1=$datos['expe1'];
                    $cargo1=$datos['cargo1'];
                    $tiempo1=$datos['tiempo1'];
                    $salario1=$datos['salario1'];
                    $motivo1=$datos['motivo1'];
                    $funciones1=$datos['funciones1'];
                    $expe2=$datos['expe2'];
                    $cargo2=$datos['cargo2'];
                    $tiempo2=$datos['tiempo2'];
                    $salario2=$datos['salario2'];
                    $motivo2=$datos['motivo2'];
                    $funciones2=$datos['funciones2'];
                    $expe3=$datos['expe3'];
                    $cargo3=$datos['cargo3'];
                    $tiempo3=$datos['tiempo3'];
                    $salario3=$datos['salario3'];
                    $motivo3=$datos['motivo3'];
                    $funciones3=$datos['funciones3'];
                    $corto=$datos['corto'];
                    $mediano=$datos['mediano'];
                    $largo=$datos['largo'];
                    $otrasobsercandi=$datos['otrasobsercandi'];
                                       

					
					
					
					//echo "<a href='requesion.php?req=".$id_requesionbf."'>Nombre del Cargo: ".$nombrecargobf." Empresa Cliente:".$cedulabf."</a>";
					
}
$sql = "select * FROM PROPUESTAS where id_requesion=".$id_requisision;
$results =  mysql_query($sql) ; 

while($datos=mysql_fetch_array($results)){
		
					$nombrecargo=$datos['nombrecargo'];
					$empresacliente=$datos['empresacliente'];
					
					
					
					//echo "<a href='requesion.php?req=".$id_requesionbf."'>Nombre del Cargo: ".$nombrecargobf." Empresa Cliente:".$cedulabf."</a>";
					
}

?>
<!DOCTYPE html>
<html lang="es">
    <head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        
        <title>Hola Mundo!</title>
        <style>
                table {
                border-collapse: collapse;
                width:100%;
                }

                table, th, td {
                border: 1px solid black;
                }
                th, td {
                text-align: left;
                }
                th{
                     background-color: #D7D7D7; /* The page background will be black */


                }
                
        
</style>
<script>
$( document ).ready(function() {
    function guardar(){
        $.ajax({
            url: "https://reqres.in/api/users",
            success: function(respuesta) {

            var listaUsuarios = $("#lista-usuarios");
            $.each(respuesta.data, function(index, elemento) {
                listaUsuarios.append(
                    '<div>'
                +     '<p>' + elemento.first_name + ' ' + elemento.last_name + '</p>'
                +     '<img src=' + elemento.avatar + '></img>'
                + '</div>'
                );    
            });
            },
            error: function() {
            console.log("No se ha podido obtener la información");
            }
        });
    }

    $( "#guardar" ).click(function() {
       var  nombre = $("#nombre").val();
       var  cedula = $("#cedula").val();
       var  telefono = $("#telefono").val();
       var  correo = $("#correo").val();
        var  idreq = $("#idreq").val();
       
       var msg = "";
       if(msg!=""){
           alert(msg)
       } else {

        $.ajax({
            url: "procesos.php",
            type: "post",
            data: "accion=guardarnuevo&nombre="+nombre+"&cedula="+cedula+"&telefono="+telefono+"&correo="+correo+"&idreq="+idreq ,
            success: function(respuesta) {
                alert("Registro Guardado Correctamente");
                location.reload();
            },
            error: function() {
                alert("Error");
            }
        });



       }
    });

});


</script>
    </head>
    <body>

</table>
<table>
    <tr>
        <th colspan="6"><center>Datos del Candidato</center></th>
    </tr>
     <tr>
        <th>Nombre y Apellidos</th>
        <td colspan="3"><?php echo $nombre; ?></td>

        <th>Cedula</th>
        <td><?php echo $cedula; ?></td>
    </tr>
     <tr>
        <th>Correo Electronico</th>
        <td colspan="3"><?php echo $correo; ?></td>

        <th>Celular</th>
        <td><?php echo $telefono; ?></td>
    </tr>
     <tr>
        <th>Fecha Nacimiento</th>
        <td><?php echo $fechanacimiento?></td>
        <th>Genero</th>
        <td>
            <?php echo $genero?></td>
        <th>Aspiracion Salarial</th>
        <td>$ <?php echo $aspiracion?></td>
    </tr>
     <tr>
        <th>Lugar Residencia</th>
        <td colspan="3"><?php echo $residencia?></td>
        <th>Estado Civil</th>
        <td>
             <?php echo $estadocivil?>
            
        </td>
    </tr>
     <tr>
        <th>Empresa Usuario</th>
        <td colspan="2"><?php echo $empresacliente; ?></td>
        <th>Cargo</th>
        <td><?php echo $nombrecargo; ?></td>
        <td></td>
    </tr>
</table>
<br>
<table>
    <tr>
        <th colspan="5"><center>Informacion Grupo Familiar (Personas con las que vive)</center></th>
    </tr>
     <tr>
        <th></th>
        <th>Nombre</th>
        <th>Parentesco</th>
        <th>Fecha Nacimiento</th>
        <th>Actividad Actual</th>
    </tr>
    <tr>
        <th>1</th>
        <td><?php echo $grupon1?></td>
        <td><?php echo $grupop1?></td>
        <td><?php echo $grupof1?></td>
        <td><?php echo $grupoa1?></td>
    </tr>
     <tr>
        <th>2</th>
        <td><?php echo $grupon2?></td>
        <td><?php echo $grupop2?></td>
        <td><?php echo $grupof2?></td>
        <td><?php echo $grupoa2?></td>
    </tr>
     <tr>
        <th>3</th>
        <td><?php echo $grupon3?></td>
        <td><?php echo $grupop3?></td>
        <td><?php echo $grupof3?></td>
        <td><?php echo $grupoa3?></td>
    </tr>
     <tr>
        <th>4</th>
        <td><?php echo $grupon4?></td>
        <td><?php echo $grupop4?></td>
        <td><?php echo $grupof4?></td>
        <td><?php echo $grupoa4?></td>
    </tr>
     <tr>
        <th>5</th>
        <td><?php echo $grupon5?></td>
        <td><?php echo $grupop5?></td>
        <td><?php echo $grupof5?></td>
        <td><?php echo $grupoa5?></td>
    </tr>
    <tr>
        <td colspan="2"><?php echo $obsgrup?></td></th>
    </tr>
     
</table>
<br>
<table>
    <tr>
        <th colspan="4"><center>Informacion Nivel de Estudios</center></th>
    </tr>
    <tr>
        <th>Secundaria</th>
        <td><?php echo $secundariainst?></td>
        <td><?php echo $secundariatitu?></td>
        <td><?php echo $secundariaano?></td>
    </tr>
    <tr>
        <th>tecnico</th>
        <td><?php echo $tecnicoinst?></td>
        <td><?php echo $tecnicotitu?></td>
        <td><?php echo $tecnicoano?></td>
    </tr>
    <tr>
        <th>tecnologo</th>
        <td><?php echo $tecnologoinst?></td>
        <td><?php echo $tecnologotitu?></td>
        <td><?php echo $tecnologoano?></td>
    </tr>
    <tr>
        <th>universitario</th>
        <td><?php echo $universitarioinst?></td>
        <td><?php echo $universitariotitu?></td>
        <td><?php echo $universitarioano?></td>
    </tr>
    <tr>
        <th>posgrado</th>
        <td><?php echo $posgradoinst?></td>
        <td><?php echo $posgradotitu?></td>
        <td><?php echo $posgradoano?></td>
    </tr>
    <tr>
        <th>Otros</th>
        <td colspan="3"><?php echo $otroseducacion?></td>
    </tr>
     <tr>
        <th>Observaciones</th>
        <td colspan="3"><?php echo $obsereducacion?></td>
    </tr>
</table>

<br>

<table>
    <tr>
        <th colspan="6">Experiencia Laboral</th>
    </tr>
    <tr>
        <th>1.Empresa</th>
        <td><?php echo $expe1?></td>
        <th>cargo</th>
        <td><?php echo $cargo1?></td>
    </tr>
    <tr>
        <th>Tiempo Servicio</th>
        <td><?php echo $tiempo1?></td>
        <th>Salario</th>
        <td><?php echo $salario1?></td>
        <th>Motivo Retiro</th>
        <td><?php echo $motivo1?></td>
    </tr>
    <tr>
        <th>Funciones</th>
        <td><?php echo $funciones1?></td>
    </tr>
    <tr>
        <td colspan="6">&nbsp;</td>
    </tr>
    <tr>
        <th>2.Empresa</th>
        <td><?php echo $expe2?></td>
        <th>cargo</th>
        <td><?php echo $cargo2?></td>
    </tr>
    <tr>
        <th>Tiempo Servicio</th>
        <td><?php echo $tiempo2?></td>
        <th>Salario</th>
        <td><?php echo $salario2?></td>
        <th>Motivo Retiro</th>
        <td><?php echo $motivo2?></td>
    </tr>
    <tr>
        <th>Funciones</th>
        <td><?php echo $funciones2?></td>
    </tr>
    <tr>
        <td colspan="6">&nbsp;</td>
    </tr>
    <tr>
        <th>3.Empresa</th>
        <td><?php echo $expe3?></td>
        <th>cargo</th>
        <td><?php echo $cargo3?></td>
    </tr>
    <tr>
        <th>Tiempo Servicio</th>
        <td><?php echo $tiempo3?></td>
        <th>Salario</th>
        <td><?php echo $salario3?></td>
        <th>Motivo Retiro</th>
        <td><?php echo $motivo3?></td>
    </tr>
    <tr>
        <th>Funciones</th>
        <td><?php echo $funciones3?></td>
    </tr>
    
    
</table>
<br>
<table>
    <tr>
        <th colspan="2"><center>Metas o Proyectos</center></th>
    </tr>
    <tr>
        <th>Corto Plazo</th>
        <td><?php echo $corto?></td>
    </tr>
    <tr>
        <th>Mediano Plazo</th>
        <td><?php echo $mediano?></td>
    </tr>
    <tr>
        <th>Largo Plazo</th>
        <td><?php echo $largo?></td>
    </tr>
</table>
<br>
<table>
    <tr>
        <th colspan="2"><center>Informacion Adicional de Candidato</center></th>
    </tr>
    <tr>
        <td>Observaciones</td>
        <td><?php echo $otrasobsercandi?></td>
    </tr>
</table>
<br>
<table>
    <tr>
        <td>Nombre</td>
        <td></td>
        <td>Cargo</td>
        <td></td>
        <td>Fecha</td>
        <td></td>
    </tr>


    
</table>



</body>
</html>
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
<a href="../gestioncontratacion/requesion.php?req=<?php echo $id_requisision; ?>">Entrevista Correctamente</a>



