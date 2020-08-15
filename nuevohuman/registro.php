<?php
require_once('conect/clases.php');
if (isset($_SESSION['idusuario'])) {
            header("Location: ".DIRWEB."home.php?ctr=home");
}

if(isset($_POST) && $_POST['vali']=='si')
{
  if($_POST['documento']!="" && $_POST['clave']==$_POST['clavere'] && $_POST['clave']!=""){
    $objconsulta= new consultas();
    $ret=$objconsulta->valdiaryguardar($_POST['documento'],base64_encode($_POST['clave']),$_POST['nombre'],$_POST['correo'],$_POST['perfilinicial']);
    if($ret) {
      echo "<script>alert('Usuario Creado Correctamente');";
      echo 'window.location.replace("https://humantalentsas.com/nuevohuman/");';
      echo "</script>";
    } else {
      echo "<script>alert('Usuario Ya Creado en Sistema');";
      echo 'window.location.replace("https://humantalentsas.com/nuevohuman/registro.php");';
      echo "</script>";

    }
  } else {
    echo "<script>alert('Complete la Informacion Correctamente');</script>";
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
    <title>Registro</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/sign-in/">

    <!-- Bootstrap core CSS -->
<link href="https://getbootstrap.com/docs/4.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="https://getbootstrap.com/docs/4.4/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="https://getbootstrap.com/docs/4.4/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="https://getbootstrap.com/docs/4.4/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="https://getbootstrap.com/docs/4.4/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="https://getbootstrap.com/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="https://getbootstrap.com/docs/4.4/assets/img/favicons/favicon.ico">
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
	<h4 class="card-title mt-3 text-center">Creacion de Cuentas</h4><br>
  <form action="registro.php" method="post">
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="nombre" id="nombre" class="form-control" placeholder="Nombre y Apellido" type="text" required="required">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-id-badge"></i> </span>
		 </div>
        <input name="documento" id="documento" class="form-control" placeholder="Documento" type="number" required="required">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input name="correo" id="correo" class="form-control" placeholder="Correo Electronico" type="email" required="required">
    </div> <!-- form-group// -->
    <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-building"></i> </span>
		</div>
		<select class="form-control" id="perfilinicial" name="perfilinicial" required="required">
			<option selected="">Seleccion Tipo Perfil</option>
			<option value ="1">Cliente</option>
			<option value="2">Empresa</option>
		</select>
	</div> <!-- form-group end.// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input class="form-control" id="clave" name="clave" placeholder="Clave" type="password" required="required">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input class="form-control"  id="clavere" name="clavere" placeholder="Repertir Clave" type="password" required="required">
    </div> <!-- form-group// -->                                      
    <div class="form-group">
    <input type="hidden" id="vali" name="vali" value="si">
        <button type="submit" class="btn btn-primary btn-block">Crear Cuenta</button>
    </div> <!-- form-group// -->      
    <p class="text-center">Tienes una Cuenta? <a href="index.php">Ingresar</a> </p>                                                                 
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
