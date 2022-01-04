<?php

    $ruta = explode("/",$_GET["pagina"]);
    

    if (!isset($_SESSION["admin"])) {

        if ($ruta[0] == "admin" && !isset($ruta[1])) {
            die("404");
        }

        if (empty($ruta[1])) {
            die("404");
        }
        
        if ($ruta[1] == "auth" && isset($_GET["auth"]) && $_GET["auth"] == auth) {
            include_once "admin/view/auth/auth.view.php";
        }else{
            die("404");
        }

    }else{

        include_once "admin/view/template/index.view.php";

    }

    