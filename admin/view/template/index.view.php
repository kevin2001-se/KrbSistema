<?php 
    if (!isset($ruta[1])) {
        die(404);
    }
    $admin = new UsuarioController();
    $valor = $admin->obtenerAdministrador();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo URLAD; ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo URLAD; ?>bower_components/font-awesome/css/font-awesome.min.css">

    
    <link rel="stylesheet" href="<?php echo URLAD; ?>bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo URLAD; ?>dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo URLAD; ?>dist/css/skins/_all-skins.min.css">


    <link rel="stylesheet" href="<?php echo URLAD; ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo URLAD; ?>plugins/toastr/toastr.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="<?php echo URLAD; ?>dist/css/estilosKRB.css">
    <title>KrbAdmin</title>
</head>
<body class="hold-transition skin-blue sidebar-mini fixed">
<div class="wrapper">
    <?php
        include_once "admin/view/template/shared/menu.shared.php";
    ?>

    <div class="content-wrapper">

    <?php

        if($ruta[1] == "") {
            echo "<script>window.location.href = '".URL."admin/dashboard'</script>";
        }

        if ($ruta[1] == "dashboard" || $ruta[1] == "usuarios" || $ruta[1] == "productos" || $ruta[1] == "sistema" || $ruta[1] == "configuracion" || $ruta[1] == "ventas") {
            
            include_once "admin/view/template/include/".$ruta[1].".view.php";

        }else{
            echo "<script>window.location.href = '".URL."admin/dashboard'</script>";
        }

    ?>
    
        
    </div>

    <?php
        include_once "admin/view/template/shared/footer.shared.php";
    ?>

</div>

    <!-- jQuery 3 -->
    <script src="<?php echo URLAD; ?>bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo URLAD; ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  
    <script src="<?php echo URLAD; ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo URLAD; ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo URLAD; ?>dist/js/adminlte.min.js"></script>

    <script src="<?php echo URLAD; ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo URLAD; ?>plugins/toastr/toastr.min.js"></script>
    <!-- DataTables -->

    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo URLAD; ?>dist/js/demo.js"></script>
    <script src="<?php echo URLAD; ?>dist/js/pages/dashboard2.js"></script>
    <?php

    if ($ruta[1] == "dashboard" || $ruta[1] == "usuarios" || $ruta[1] == "productos" || $ruta[1] == "sistema" || $ruta[1] == "configuracion" || $ruta[1] == "ventas") {
        
        echo '<script src="'.URLAD.'js/'.$ruta[1].'.js"></script>';

    }

    ?>
    
   <input type="hidden" value="<?php echo URLAD;?>img/Products/" id="url">
</body>
</html>