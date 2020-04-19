<?php 
include_once("conexion.php");
$sql = "select * FROM PROPUESTAS";
$results =  mysql_query($sql) ; 
$cont=0;
while($datos=mysql_fetch_array($results)){
		
	$cont++;
					$id_requesionbf=$datos['id_requesion'];
					$cedulabf=$datos['empresacliente'];
					$nombrecargobf=$datos['nombrecargo'];
					echo "<a href='requesion.php?req=".$id_requesionbf."'>Nombre del Cargo: ".$nombrecargobf." Empresa Cliente:".$cedulabf."</a>";
					
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
                }

                table, th, td {
                border: 1px solid black;
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
<h2>ID REQUISICION # <?php echo "REQ".$_GET['req']; ?></h2>
<select id="tipo" name="tipo">
<option value="elempleo">El Empleo</option>
<option value="Computrabajo">Computrabajo</option>
<option value="Envio Directo cliente">Envio Directo Cliente</option>

</select>
<br>
<br>
<br>
<br>
<br>
<br>

    Nombre <input type="text" name="nombre" id="nombre"><br>
    Cedula <input type="text" name="cedula" id="cedula"><br>
    Telefono <input type="text" name="telefono" id="telefono"><br>
    Correo <input type="text" name="correo" id="correo"><br>
    <input id="idreq" name="idreq" value="<?=$_GET['req']?>" type="hidden">
    <button id="guardar">Guardar</button>
<br><br>
<table>
<tr>
<th>
ID
</th>
<th>
Nombre
</th>
<th>
Cedula
</th>
<th>
Telefono
</th>
<th>
Correo
</th>
<th>
Prueba Psicotecnica
</th>
<th>
Entrevista
</th>
</tr>
<?php 


$sql = "select * FROM req_candidatos WHERE id_requisision=".$_GET['req'];
$results =  mysql_query($sql) ; 
$cont=0;
while($datos=mysql_fetch_array($results)){
		
	$cont++;
					$nombre=$datos['nombre'];
					$cedula=$datos['cedula'];
					$telefono=$datos['telefono'];
					$correo=$datos['correo'];
					$correo=$datos['correo'];
					$idcand=$datos['id'];
					$enviocorreo=$datos['enviocorreo'];
					$archivoprueba=$datos['archivoprueba'];
					$entrevista=$datos['entrevista'];
					
					$envio="";
					if($enviocorreo==0) {
					    $envio='<button onclick="enviarprueba('.$_GET['req'].','.$idcand.')">Enviar Prueba</button>';
					} else if($archivoprueba==""){
					    $envio='<button onclick="cargarprueba('.$_GET['req'].','.$idcand.')">Enviar Prueba</button>';
					} else {
					    $envio='Prueba Cargada';
					}
					
					$envioentre="";
					if($entrevista=="N") {
					    $envioentre='<a href ="gestionentrevista.php?req='.$_GET['req'].'&can='.$idcand.'">Realizar Entrevista</a>';
					} else {
					    $envioentre='Entrevista Realizada';
					}
					
					
					echo "<tr><td>$cont</td><td>$nombre</td><td>$cedula</td><td>$telefono</td><td>$correo</td><td>$envio</td><td>$envioentre</td></tr>"; 
}
if($cont==0){
    echo "<tr><td colspan='5'><center><h4>Ningun candidato Registrado</h4></center></td></tr>"; 
}


?>
</table>
</body>
</html>



