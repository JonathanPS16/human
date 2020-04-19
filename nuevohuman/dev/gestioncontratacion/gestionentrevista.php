<?php 
include_once("conexion.php");
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
$sql = "select * FROM PROPUESTAS where id_requesion=".$_GET['req'];
$results =  mysql_query($sql) ; 

while($datos=mysql_fetch_array($results)){
		
					$nombrecargo=$datos['nombrecargo'];
					$empresacliente=$datos['empresacliente'];
					
					
					
					//echo "<a href='requesion.php?req=".$id_requesionbf."'>Nombre del Cargo: ".$nombrecargobf." Empresa Cliente:".$cedulabf."</a>";
					
}
$sql = "select * FROM req_candidatos where id=".$_GET['can'];
$results =  mysql_query($sql) ; 

while($datos=mysql_fetch_array($results)){
		
					$nombre=$datos['nombre'];
					$cedula=$datos['cedula'];
					$telefono=$datos['telefono'];
					$correo=$datos['correo'];
					
					
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
<form action="gestionentrevistagd.php" method="post">
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
        <td><input type="date" id="fechanacimiento" name="fechanacimiento"></td>
        <th>Genero</th>
        <td>
            <select id="genero" name="genero">
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
        </select></td>
        <th>Aspiracion Salarial</th>
        <td><input type="number" id="aspiracion" name="aspiracion"></td>
    </tr>
     <tr>
        <th>Lugar Residencia</th>
        <td colspan="3"><input type="text" name="residencia" id="residencia"></td>
        <th>Estado Civil</th>
        <td>
             <select id="estadocivil" name="estadocivil">
            <option value="soltero">Soltero</option>
            <option value="casado">casado</option>
            <option value="union libre">Union Libre</option>
        </select>
            
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
        <td><input type="text" name="grupon1" id="grupon1"></td>
        <td><input type="text" name="grupop1" id="grupop1"></td>
        <td><input type="date" name="grupof1" id="grupof1"></td>
        <td><input type="text" name="grupoa1" id="grupoa1"></td>
    </tr>
     <tr>
        <th>2</th>
        <td><input type="text" name="grupon2" id="grupon2"></td>
        <td><input type="text" name="grupop2" id="grupop2"></td>
        <td><input type="date" name="grupof2" id="grupof2"></td>
        <td><input type="text" name="grupoa2" id="grupoa2"></td>
    </tr>
     <tr>
        <th>3</th>
        <td><input type="text" name="grupon3" id="grupon3"></td>
        <td><input type="text" name="grupop3" id="grupop3"></td>
        <td><input type="date" name="grupof3" id="grupof3"></td>
        <td><input type="text" name="grupoa3" id="grupoa3"></td>
    </tr>
     <tr>
        <th>4</th>
        <td><input type="text" name="grupon4" id="grupon4"></td>
        <td><input type="text" name="grupop4" id="grupop4"></td>
        <td><input type="date" name="grupof4" id="grupof4"></td>
        <td><input type="text" name="grupoa4" id="grupoa4"></td>
    </tr>
     <tr>
        <th>5</th>
        <td><input type="text" name="grupon5" id="grupon5"></td>
        <td><input type="text" name="grupop5" id="grupop5"></td>
        <td><input type="date" name="grupof5" id="grupof5"></td>
        <td><input type="text" name="grupoa5" id="grupoa5"></td>
    </tr>
    <tr>
        <td colspan="2">Observaciones</td><td colspan="3"><input type="text" name="obsgrup" id="obsgrup"></td></th>
    </tr>
     
</table>
<br>
<table>
    <tr>
        <th colspan="4"><center>Informacion Nivel de Estudios</center></th>
    </tr>
    <tr>
        <th>Secundaria</th>
        <td><input type="text" name="secundariainst" id="secundariainst"></td>
        <td><input type="text" name="secundariatitu" id="secundariatitu"></td>
        <td><input type="text" name="secundariaano" id="secundariaano"></td>
    </tr>
    <tr>
        <th>tecnico</th>
        <td><input type="text" name="tecnicoinst" id="tecnicoinst"></td>
        <td><input type="text" name="tecnicotitu" id="tecnicotitu"></td>
        <td><input type="text" name="tecnicoano" id="tecnicoano"></td>
    </tr>
    <tr>
        <th>tecnologo</th>
        <td><input type="text" name="tecnologoinst" id="tecnologoinst"></td>
        <td><input type="text" name="tecnologotitu" id="tecnologotitu"></td>
        <td><input type="text" name="tecnologoano" id="tecnologoano"></td>
    </tr>
    <tr>
        <th>universitario</th>
        <td><input type="text" name="universitarioinst" id="universitarioinst"></td>
        <td><input type="text" name="universitariotitu" id="universitariotitu"></td>
        <td><input type="text" name="universitarioano" id="universitarioano"></td>
    </tr>
    <tr>
        <th>posgrado</th>
        <td><input type="text" name="posgradoinst" id="posgradoinst"></td>
        <td><input type="text" name="posgradotitu" id="posgradotitu"></td>
        <td><input type="text" name="posgradoano" id="posgradoano"></td>
    </tr>
    <tr>
        <th>Otros</th>
        <td colspan="3"><input type="text" name="otroseducacion" id="otroseducacion"></td>
    </tr>
     <tr>
        <th>Observaciones</th>
        <td colspan="3"><input type="text" name="obsereducacion" id="obsereducacion"></td>
    </tr>
</table>

<br>

<table>
    <tr>
        <th colspan="6">Experiencia Laboral</th>
    </tr>
    <tr>
        <th>1.Empresa</th>
        <td><input type="text" name="expe1" id="expe1"></td>
        <th>cargo</th>
        <td><input type="text" name="cargo1" id="cargo1"></td>
    </tr>
    <tr>
        <th>Tiempo Servicio</th>
        <td><input type="text" name="tiempo1" id="tiempo1"></td>
        <th>Salario</th>
        <td><input type="text" name="salario1" id="salario1"></td>
        <th>Motivo Retiro</th>
        <td><input type="text" name="motivo1" id="motivo1"></td>
    </tr>
    <tr>
        <th>Funciones</th>
        <td><input type="text" name="funciones1" id="funciones1"></td>
    </tr>
    <tr>
        <td colspan="6">&nbsp;</td>
    </tr>
    <tr>
        <th>2.Empresa</th>
        <td><input type="text" name="expe2" id="expe2"></td>
        <th>cargo</th>
        <td><input type="text" name="cargo2" id="cargo2"></td>
    </tr>
    <tr>
        <th>Tiempo Servicio</th>
        <td><input type="text" name="tiempo2" id="tiempo2"></td>
        <th>Salario</th>
        <td><input type="text" name="salario2" id="salario2"></td>
        <th>Motivo Retiro</th>
        <td><input type="text" name="motivo2" id="motivo2"></td>
    </tr>
    <tr>
        <th>Funciones</th>
        <td><input type="text" name="funciones2" id="funciones2"></td>
    </tr>
    <tr>
        <td colspan="6">&nbsp;</td>
    </tr>
    <tr>
        <th>3.Empresa</th>
        <td><input type="text" name="expe3" id="expe3"></td>
        <th>cargo</th>
        <td><input type="text" name="cargo3" id="cargo3"></td>
    </tr>
    <tr>
        <th>Tiempo Servicio</th>
        <td><input type="text" name="tiempo3" id="tiempo3"></td>
        <th>Salario</th>
        <td><input type="text" name="salario3" id="salario3"></td>
        <th>Motivo Retiro</th>
        <td><input type="text" name="motivo3" id="motivo3"></td>
    </tr>
    <tr>
        <th>Funciones</th>
        <td><input type="text" name="funciones3" id="funciones3"></td>
    </tr>
    
    
</table>
<br>
<table>
    <tr>
        <th colspan="2"><center>Metas o Proyectos</center></th>
    </tr>
    <tr>
        <th>Corto Plazo</th>
        <td><input type="text" name="corto" id="corto"></td>
    </tr>
    <tr>
        <th>Mediano Plazo</th>
        <td><input type="text" name="mediano" id="mediano"></td>
    </tr>
    <tr>
        <th>Largo Plazo</th>
        <td><input type="text" name="largo" id="largo"></td>
    </tr>
</table>
<br>
<table>
    <tr>
        <th colspan="2"><center>Informacion Adicional de Candidato</center></th>
    </tr>
    <tr>
        <td>Observaciones</td>
        <td><input type="text" name="otrasobsercandi" id="otrasobsercandi"></td>
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

<tr>
    <input type="hidden" name="idcand" name="idcand" value="<?php echo $_GET['can'];?>">
        <td colspan="6"><input type="submit" value="Guardar"></td>
    </tr>
    
</table>
</form>


</body>
</html>



