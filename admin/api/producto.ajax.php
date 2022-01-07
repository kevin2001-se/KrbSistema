<?php

session_start();
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
        $producto = new ProductosController();

        $response = $producto->CrearProducto($this->datos);

        echo $response;
    }

    public function ajaxEliminarProducto()
    {
        $producto = new ProductosController();

        $response = $producto->EliminarProducto($this->datos);

        echo $response;
    }

}

if (isset($_POST["nombre"])) {
    
    $crear = new AjaxProductos();

    $crear->datos = array(
        "nombre" => $_POST["nombre"],
        "stock" => $_POST["stock"],
        "precio" => $_POST["precio"],
        "file" => $_FILES["file"],
        "user" => $_SESSION["admin"],
    );

    $crear->ajaxRegistrarProductos();

}else if(isset($_POST["idProducto"])) {

    $eliminar = new AjaxProductos();

    $eliminar->datos = $_POST["idProducto"];

    $eliminar->ajaxEliminarProducto();
}
else{

    $lista = new AjaxProductos();

    $lista->ajaxListarProductos();

}