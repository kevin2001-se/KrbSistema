<?php

class ProductoController {
    
    private $model;

    public function __construct()
    {
        $this->model = new Producto();
    }

    public function ProductosRegistrados()
    {
        $respuesta = $this->model->getProductos();

        return $respuesta;
    }

}