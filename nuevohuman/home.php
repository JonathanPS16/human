<?php 
session_start();
if (!isset($_SESSION['idusuario'])) {
?>
<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php"> 
<?php 
die();
} 
require_once('conect/clases.php');

if($_GET['ctr']=="admon" && ($_GET['acc']=="listadoextras" || $_GET['acc']=="registrosmas"))
{
    include('validaciones.php');
    die();
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Human</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <!--<link href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" rel="stylesheet">-->

    
    <link href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css" rel="stylesheet">

</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3><img src="img/logoblanco.png" class="logo"></h3>
            </div>

            <ul class="list-unstyled components">
				<?php
      				include('menu.php');
      			?>
            </ul>

            
        </nav>

        <!-- Page Content  -->
        <div id="content" style="font-size: 0.8em !important;">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Menu</span>
                    </button>
                    

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        
                    </div>
                </div>
            </nav>
<?php
      include('validaciones.php');
      
      ?>
        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
 
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
            $('#example').DataTable();
            $('#myTable').DataTable(
                {
                    order: [],
                    dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],    
                language: {
                    "processing": "Procesando...",
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "emptyTable": "Ningún dato disponible en esta tabla",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "search": "Buscar:",
                "infoThousands": ",",
                "loadingRecords": "Cargando...",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                    }
                }
                }
            );

            $( "#edadindiferente" ).change(function() {
            if($( "#edadindiferente" ).val()=="S") {
                $("select[name='edadminima']").find("option[value='0']").attr("selected",true);
                $("select[name='edadmaxima']").find("option[value='0']").attr("selected",true);
                $('#edadminima').prop('disabled', true);
                $('#edadmaxima').prop('disabled', true);
            } else {
                $('#edadminima').prop('disabled', false);
                $('#edadmaxima').prop('disabled', false);
            }
            });

            $( "#final" ).click(function() {
            return confirm("Esta Seguro de Terminar la Requision?");
            });

            $( "#limpiaform" ).click(function() {
                limpiaform();
            });

            function limpiaform(){
                $("#generaldivincapacidades #observacionesdiv" ).hide();
                $("#generaldivincapacidades #fechadiv" ).hide();
               // $("#generaldivincapacidades #guardado" ).hide();
                $("#generaldivincapacidades #estado > option[value=0]").attr("selected",true);
            }
            
            $( "#generaldivincapacidades #estado" ).change(function() {
                $( "#generaldivincapacidades #observacionesdiv" ).hide();
                $( "#generaldivincapacidades #fechadiv" ).hide();
                $( "#generaldivincapacidades #guardado" ).hide();
                var dato = $( "#generaldivincapacidades #estado" ).val();
                if(dato=="negada"){
                    $( "#generaldivincapacidades #observacionesdiv" ).show();
                    $( "#generaldivincapacidades #fechadiv" ).show();
                    $( "#generaldivincapacidades #guardado" ).show();
                }
                if(dato=="liquidada"){
                    $( "#generaldivincapacidades #observacionesdiv" ).show();
                    $( "#generaldivincapacidades #fechadiv" ).show();
                    $( "#generaldivincapacidades #guardado" ).show();
                }
                if(dato!=""){
                    $( "#generaldivincapacidades #observacionesdiv" ).show();
                    $( "#generaldivincapacidades #guardado" ).show();
                }
            });

        });

        function editarlaboratorio (nombrelaboratorio,ciudad,direccion,telefono,correo1,correo2,id)
        {
            $('#laboratoriosadd').click();
            $("#nombre").val(nombrelaboratorio);
            $("#ciudad").val(ciudad);
            $("#direccion").val(direccion);
            $("#telefonos").val(telefono);
            $("#correouno").val(correo1);
            $("#correodos").val(correo2);
            $("#id").val(id);

        }

        function validarusuarias()
        {
            var id = $("#empresaclientet").val();

            var validaeu = $("#validaeu").val();

            
            $.ajax({
            type: "POST",
            url: "home.php?ctr=admon&acc=listadoextras",
            data: 'id=' + id+'&pres='+validaeu,
            success: function(datos) {
                $('#empresacliente').html(datos);
            }
            });
        }

        $( "#filtrador #button").click(function() {
            $('#listausuarios').empty();
            var datos = $( "#filtrador #cedula").val();
            $.ajax({
            type: "POST",
            url: "home.php?ctr=admon&acc=registrosmas",
            data: 'id=' + datos,
            success: function(datos) {
                $('#listausuarios').html(datos);
              
            }
            });
        });
        

    </script>
</body>

</html>