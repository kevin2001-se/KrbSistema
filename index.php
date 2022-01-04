<?php
session_start();

require_once "config/variables.config.php";
require_once "controller/plantilla.controller.php";
require_once "controller/pagina.controller.php";
require_once "controller/producto.controller.php";
require_once "controller/sistema.controller.php";

require_once "model/pagina.model.php";
require_once "model/producto.model.php";
require_once "model/sistema.model.php";


/*ADMIN*/
require_once "admin/controller/plantilla.controller.php";
require_once "admin/controller/pagina.controller.php";
require_once "admin/controller/producto.controller.php";
require_once "admin/controller/sistema.controller.php";
require_once "admin/controller/usuario.controller.php";

require_once "admin/model/pagina.model.php";
require_once "admin/model/producto.model.php";
require_once "admin/model/sistema.model.php";
require_once "admin/model/usuario.model.php";


if (isset($_GET["pagina"])) {
    $ruta = explode("/",$_GET["pagina"]);
    if ($ruta[0] == "admin") {
        $plantilla = new AdminPlantillaController();
        $plantilla->AdminPlantillaView();
    }
}else{
    $plantilla = new PlantillaController();
    $plantilla->ctrPlantillaView();
}
