<?php 
session_start();
if (!isset($_SESSION['idusuario'])) {
?>
<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php"> 
<?php 
die();
} 
require_once('conect/clases.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formalsi</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap-4.3.1.css" rel="stylesheet">

  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
       <a class="navbar-brand" href="#"><?php echo PROYECTO; ?></a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
       </button>
       <div class="collapse navbar-collapse" id="navbarSupportedContent">
       <?php include('menu.php');?>
       </div>
    </nav>
  <nav aria-label="breadcrumb"> </nav>
  <div class="container">
  <?php
      include('validaciones.php');
      
      ?>
  </div>
  <div class="container">
<div class="row text-center"> </div>
       <br>
       <hr>
       <br>
<br/>
       <br/>
<br/>
       <br/>
<br>
       <hr>
       <div class="row">
          <div class="text-center col-lg-6 offset-lg-3">
            
            
             <p>Copyright &copy; <?php echo date('Y'); ?> &middot; All Rights Reserved &middot; <a href="https://www.linkedin.com/in/omar-ernei-bonilla-franco" target="_black" >Omar Bonilla</a></p>
          </div>
       </div>
  </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
    <script src="js/jquery-3.3.1.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed --> 
    <script src="js/popper.min.js"></script>
  <script src="js/bootstrap-4.3.1.js"></script>
  </body>
</html>
