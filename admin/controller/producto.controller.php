<?php

class ProductoController {

    public function ListarProductos()
    {
        $producto = new Productos();
        $lista = $producto->getListarProductos();
        return $lista;
    }

}