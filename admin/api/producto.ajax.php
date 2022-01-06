<?php

require_once "../config/variables.config.php";
require_once "../config/db.config.php";
require_once "../controller/producto.controller.php";
require_once "../model/producto.model.php";

class AjaxProductos {

    public $datos;

    public function ajaxListarProductos()
    {
        $lista = new ProductosController();

        $response = $lista->ListarProductos();

        echo json_encode($response, JSON_UNESCAPED_UNICODE);
    }

    public function ajaxRegistrarProductos()
    {
        echo print_r($this->datos);
    }

}

if (isset($_POST["nombre"])) {
    
    $crear = new AjaxProductos();

    $crear->datos = array(
        "nombre" => $_POST["nombre"],
        "stock" => $_POST["stock"],
        "precio" => $_POST["precio"]
    );

    $crear->ajaxRegistrarProductos();

}else{

    $lista = new AjaxProductos();

    $lista->ajaxListarProductos();

}