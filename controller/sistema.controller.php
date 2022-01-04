<?php

class SistemaController {

    private $model;

    public function __construct()
    {
        $this->model = new Sistema();
    }

    public function SistemaRegistrados()
    {
        $respuesta = $this->model->getSistemaFarmacia();

        return $respuesta;
    }

}