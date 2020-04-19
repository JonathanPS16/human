<?php 
        $objconsulta= new consultas();
        if (!isset($_SESSION['idusuario'])) {
            ?>
            <meta http-equiv="refresh" content="0; url=<?php echo DIRWEB;?>">
            <?php
        }

        $ctr = $_GET['ctr'];
        switch ($ctr) {
        case "home":
            $titulo = "Home";
            include('principal.php');
            break;
        case "cerrarsesion":
            $objconsulta->cerrarsesion();
            ?>
            <meta http-equiv="refresh" content="0; url=<?php echo DIRWEB;?>">
            <?php
            break;
        case "getionusuarios":
            echo "i es un pastel";
            break;

        case "buscardorCertificados":
            $titulo = "Buscador de Certificados";
            include('vistas/vistaBuscadorCertificados.php');
        break;  

        default;
            $titulo = "Inicial";
            include('principal.php');
        break;    
      }
    ?>