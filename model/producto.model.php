<?php

class Producto {

    private $table = "producto";
    public $con;

    public function __construct()
    {
        $conexion = new Conexion();
        $this->con = $conexion ->Conectar();
    }

    public function getProductos(){
        $query = "SELECT * FROM ".$this->table;
        $stmt = $this->con->prepare($query);
        if ($stmt->execute()) {
            return $stmt->fetchAll();
        }else{
            return "error";
        }
        $stmt = null;
    }

}