<?php
require_once('conect/clases.php');

if(isset($_POST) && $_POST['vali']=='si')
{
  $objconsulta= new consultas();
  $archivo=""; 
  $nombre_archivo = date('YmdHms').$_FILES['archivo']['name'];
  if($nombre_archivo!="") {
    $tipo_archivo = $_FILES['archivo']['type'];
    $tamano_archivo = $_FILES['archivo']['size'];
    $mensaje = "";    
    //compruebo si las características del archivo son las que deseo
    if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "pdf")))) {
        $mensaje = "La extensión o el tamaño de los archivos no es correcta. Se permiten archivos .gif .jpg .pdf .png ";
    }else{
        if (move_uploaded_file($_FILES['archivo']['tmp_name'],  "archivosgenerales/".$nombre_archivo)){
            $archivo =$nombre_archivo;
        }else{
            $mensaje =  "Ocurrió algún error al subir el fichero. No pudo guardarse.";
        }
    }
}
  $ret=$objconsulta->guardarrespuestaempleado($_POST['id'],$_POST['aclaracion'],$archivo);
  echo "<script>
  alert('Respuesta enviada correctamente');
  window.location.href = 'https://humantalentsas.com';</script>";
} else {
    $objconsulta= new consultas();
    $ret=$objconsulta->validarrellenado($_GET['id']);
    $archivoenviado=$objconsulta->validararchivoexplicacion($_GET['id']);
    
    if($ret=="T"){
?>
    <html>
<title>Acceso Caducado</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body class="w3-container">
<div class="w3-panel w3-pale-red w3-border">
  <h3>Acceso Caducado</h3>
  <p>El formulario Ya No Se Encuentra Disponible</p>
</div>

</body>
</html>
    <?php
    die();
    }
}

?>
<!doctype html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Aclaracion</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/sign-in/">

    <!-- Bootstrap core CSS -->
<link href="https://getbootstrap.com/docs/4.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Favicons -->

<link rel="manifest" href="https://getbootstrap.com/docs/4.4/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="https://getbootstrap.com/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<meta name="msapplication-config" content="https://getbootstrap.com/docs/4.4/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.4/examples/sign-in/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">


<div class="container">
<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
<img class="mb-4" src="img/logo_negro.jpg" alt="" width="228" height="72">
	<br>
	<h4 class="card-title mt-3 text-center">Aclaración Proceso Disciplinario</h4><br>
  <p style="text-align: justify; text-justify: inter-word;">En el archivo anexo encontrará el  cuestionario sobre el evento reportado; el cual Usted deberá dar respuesta a cada una de las preguntas relacionadas en dicho documento y proceder a enviar sus aclaraciones y soportes que considere pertinentes.<br><a href="archivosgenerales/<?php echo $archivoenviado; ?>" target="_black">Archivo Anexo</a></p>
  <form action="registro.php" method="post" enctype="multipart/form-data">
    <div class="form-group row">
    <label for="aclaracion" class="col-4 col-form-label">Aclaracion</label> 
    <div class="col-8">
      <textarea id="aclaracion" name="aclaracion" cols="40" rows="5" class="form-control" required="required"></textarea>
    </div>
  </div>
  <div class="form-group row">
    <label for="archivo" class="col-4 col-form-label">Archivo Adjunto</label> 
    <div class="col-8">
      <input id="archivo" name="archivo" type="file" class="form-control">
    </div>
  </div> 
  <input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>">
  <input type="hidden" name="vali" value="si" id="vali">
  <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Enviar Aclaración</button>
    </div>                                                              
</form>
</article>
</div> <!-- card.// -->

</div> 
<!--container end.//-->
</body>
</html>
<?php 

if(isset($_GET['error']) && $_GET['error']==0){
  echo "<script>alert('usuario o clave invalida');</script>";
}
?>
