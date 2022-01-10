<header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>KRB</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b>KRB</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo URLAD; ?><?php echo $valor["foto_perfil"] ?>" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?php echo $valor["nombre"] ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?php echo URLAD; ?><?php echo $valor["foto_perfil"] ?>" class="img-circle" alt="Admin Foto">

                            <p>
                                <?php echo $valor["nombre"] ?> - Administrador
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Perfil</a>
                            </div>
                            <div class="pull-right">
                                <form action="" method="POST">
                                    <button type="submit" class="btn btn-default btn-flat" name="cerrar">Cerrar Sesión</button>
                                    <?php
                                        $cerrar = new UsuarioController();
                                        echo $cerrar->ctrCerrarSesion();
                                    ?>
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

    </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo URLAD; ?><?php echo $valor["foto_perfil"] ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo $valor["nombre"] ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENU NAVEGACIÓN</li>

            <?php

                $active = ($ruta[1] == "dashboard") ? "active" : "" ;
                $active1 = ($ruta[1] == "usuarios" && $ruta[0] == "admin") ? "active" : "" ;
                $active2 = ($ruta[1] == "productos" && $ruta[0] == "admin") ? "active" : "" ;
                $active3 = ($ruta[1] == "sistema" && $ruta[0] == "admin") ? "active" : "" ;
                $active4 = ($ruta[1] == "configuracion" && $ruta[0] == "admin") ? "active" : "" ;
                $active5 = ($ruta[1] == "ventas" && $ruta[0] == "admin") ? "active" : "" ;
            ?>

            <li class="<?php echo $active ?>">
                <a href="<?php echo URL ?>admin/dashboard">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="<?php echo $active1 ?>">
                <a href="<?php echo URL ?>admin/usuarios">
                    <i class="fa fa-user"></i> <span>Usuarios</span>
                </a>
            </li>
            <li class="<?php echo $active2 ?>">
                <a href="<?php echo URL ?>admin/productos">
                    <i class="fa fa-archive"></i> <span>Productos</span>
                </a>
            </li>
            <li class="<?php echo $active5 ?>">
                <a href="<?php echo URL ?>admin/ventas">
                    <i class="fa fa-calculator"></i> <span>Ventas</span>
                </a>
            </li>
            <li class="<?php echo $active3 ?>">
                <a href="<?php echo URL ?>admin/sistema">
                    <i class="fa fa-fax"></i> <span>Sistema</span>
                </a>
            </li>
            <li class="<?php echo $active4 ?>">
                <a href="<?php echo URL ?>admin/configuracion">
                    <i class="fa fa-wrench"></i> <span>KRBSistema</span>
                </a>
            </li>
            <li>
                <a href="<?php echo URL ?>" target="_blank">
                    <i class="fa fa-globe"></i> <span>Web</span>
                </a>
            </li>


        </ul>
    </section>
    <!-- /.sidebar -->
</aside>