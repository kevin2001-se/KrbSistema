<?php 
    if (!isset($ruta[1])) {
        die(404);
    }
    $admin = new UsuarioController();
    $valor = $admin->obtenerAdministrador();
    print_r($valor);
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
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo URLAD; ?>bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo URLAD; ?>dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo URLAD; ?>dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?php echo URLAD; ?>bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo URLAD; ?>bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?php echo URLAD; ?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo URLAD; ?>bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo URLAD; ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <title>KrbAdmin</title>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <?php
        include_once "admin/view/template/shared/menu.shared.php";
    ?>

    <div class="content-wrapper">

    <?php

        if($ruta[1] == "") {
            echo "<script>window.location.href = '".URL."admin/dashboard'</script>";
        }

        if ($ruta[1] == "dashboard" || $ruta[1] == "usuarios" || $ruta[1] == "productos" || $ruta[1] == "sistema" || $ruta[1] == "config") {
            
            include_once "admin/view/template/include/dashboard.view.php";

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
    <!-- FastClick -->
    <script src="<?php echo URLAD; ?>bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo URLAD; ?>dist/js/adminlte.min.js"></script>
    <!-- Sparkline -->
    <script src="<?php echo URLAD; ?>bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- jvectormap  -->
    <script src="<?php echo URLAD; ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?php echo URLAD; ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- SlimScroll -->
    <script src="<?php echo URLAD; ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- ChartJS -->
    <script src="<?php echo URLAD; ?>bower_components/chart.js/Chart.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo URLAD; ?>dist/js/pages/dashboard2.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo URLAD; ?>dist/js/demo.js"></script>
</body>
</html>