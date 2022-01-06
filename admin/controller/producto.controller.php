<?php

class ProductosController {

    public function ListarProductos()
    {
        $producto = new Productos();
        $lista = $producto->getListarProductos();
        return $lista;
    }

}