<?php

session_start();
require_once "../config/variables.config.php";
require_once "../config/db.config.php";
require_once "../controller/pagina.controller.php";
require_once "../model/pagina.model.php";

class AjaxWeb {

    public $datos;

    public function EditarWebGeneral()
    {
        
        $data = $this->datos;

        $web = new WebController();

        $response = $web->EditarGeneral($data);

        echo $response;

    }

}

if (isset($_POST["nombre"]) && isset($_POST["titulo"])) {
    
    $web = new AjaxWeb();

    $web->datos = array(
        'nombre' => $_POST["nombre"],
        'titulo' => $_POST["titulo"],
        'descripcion' => $_POST["descripcion"],
        'palabras' => $_POST["palabras"],
    );

    $web->EditarWebGeneral();

}