<?php

class PaginaController {

    private $model;

    public function __construct()
    {
        $this->model = new PaginaModel();
    }

    public function ObtenerInfoPagina()
    {
        $respuesta = $this->model->getPagina();

        if (!empty($respuesta)) {
            return $respuesta;
        }else{
            die();
        }
    }

}