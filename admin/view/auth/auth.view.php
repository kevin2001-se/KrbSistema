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
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo URLAD; ?>plugins/iCheck/square/blue.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <title>KrbAdmin</title>
</head>
<body class="hold-transition login-page">

    <div class="login-box">
        <div class="login-logo">
            <a href="">KRB<b>Admin</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Logueate para iniciar sesión</p>

            <form action="" method="post" id="formAuth">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Usuario" name="usuario" id="usuario">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Contraseña" name="password" id="password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                <!-- <div class="checkbox icheck">
                    <label>
                    <input type="checkbox" name="recordar" id="recordar"> Recordarme
                    </label>
                </div> -->
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Iniciar</button>
                </div>
            </div>
             <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $auth = new UsuarioController();
                    $resp = $auth->ctrAuthUsuario();
                    if ($resp == "success") {
                        echo '
                            <script>
                                Swal.fire({
                                    icon: "success",
                                    title: "Bienvenido",
                                    confirmButtonText: "Iniciar",
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = "'.URL.'admin/dashboard";
                                    } else  {
                                        window.location.href = "'.URL.'admin/dashboard";
                                    }
                                })
                            </script>
                        ';
                    }else{
                        echo '
                            <script>
                                Swal.fire({
                                    icon: "error",
                                    title: "Ups!",
                                    text: "'.$resp.'"
                                })
                            </script>
                        ';
                    }
                }
                
            ?> 
            </form>

            <a href="#">Olvidastes tu Contraseña</a>

        </div>
    </div>

    <!-- jQuery 3 -->
    <script src="<?php echo URLAD; ?>bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo URLAD; ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo URLAD; ?>plugins/iCheck/icheck.min.js"></script>
    <script>
    $(function () {
        $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' /* optional */
        });
    });
    </script> 
    <script src="<?php echo URLAD; ?>js/auth.main.js"></script>  
</body>
</html>