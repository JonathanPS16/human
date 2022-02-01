<?php
require_once('conect/clases.php');
$objconsulta2= new consultas();
$empresas = $objconsulta2->consultarempresas();
if (isset($_SESSION['idusuario'])) {
            header("Location: ".DIRWEB."home.php?ctr=home");
        }
?>
<!doctype html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Ingreso</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/sign-in/">

    <!-- Bootstrap core CSS -->
<link href="https://getbootstrap.com/docs/4.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="https://getbootstrap.com/docs/4.4/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="manifest" href="https://getbootstrap.com/docs/4.4/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="https://getbootstrap.com/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="https://humantalentsas.com/misc/favicon.ico">
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

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
    <form class="form-signin" action="validacion.php" method="post">
  <img class="mb-4" src="img/LogoAzul.png" alt="" width="228" height="72">
  <h1 class="h3 mb-3 font-weight-normal">Formulario de Ingreso</h1>
  <label for="inputEmail" class="sr-only">Email address</label>
  <input type="number" id="inputEmail" name="inputEmail" class="form-control" placeholder="Usuario" required autofocus>
  <label for="inputPassword" class="sr-only">Password</label>
  <br><input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Clave" required>
  <br>
  <select id="empresa" name="empresa" class="form-control" >
    <?php 
    for($i=0;$i<count($empresas);$i++){
      echo '<option value="'.$empresas[$i]['id_base'].'">'.$empresas[$i]['titulobase'].'</option>';
    }
    ?>
  </select>
  <div class="checkbox mb-3">
  <p class="text-center"> </p>
  </div>
  <div class="g-recaptcha" data-sitekey="6LfFENwZAAAAAI4rMt4FzJF3S406UTp11qmsLf4V"></div>
  <br>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
  <a href="olvide.php">Olvide mi Contraseña</a>
  <p class="mt-5 mb-3 text-muted">&copy;<?php echo date('Y'); ?> Desarrollado por <a href="https://www.linkedin.com/in/omar-ernei-bonilla-franco" target="_black">Humantalentsas</a></p>
</form>
</body>
</html>
<?php 

if(isset($_GET['error']) && $_GET['error']==0){
  echo "<script>alert('usuario o clave invalida');</script>";
}
if(isset($_GET['error']) && $_GET['error']==2){
  echo "<script>alert('Debe Activar su Usuario en el Link Enviado a su Correo Electronico');</script>";
}

if(isset($_GET['error']) && $_GET['error']==3){
  echo "<script>alert('Usuario Activado Correctamente');</script>";
}
if(isset($_GET['error']) && $_GET['error']==12){
  echo "<script>alert('Clave Enviada a Correo Electronico');</script>";
}
if(isset($_GET['error']) && $_GET['error']==21){
  echo "<script>alert('Documento No Encontrado');</script>";
}
?>
