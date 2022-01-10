<?php

class WebModel {
    
    private $table = "pagina";
    public $con;

    public function __construct()
    {
        $conexion = new Conexion();
        $this->con = $conexion ->Conectar();
    }

    public function getWeb()
    {
        $query = "SELECT * FROM ".$this->table;
        $stmt = $this->con->prepare($query);
        if ($stmt->execute()) {
            return $stmt->fetch();
        }else{
            return "error";
        }
        $stmt = null;
    }

    public function ActualizarGeneralWeb($data)
    {
        $query = "UPDATE pagina SET nombre_web = :nombre, titulo = :titulo, descripcion = :descripcion, palabras_claves = :claves WHERE id_pagina = 1";
        $pdo = $this->con->prepare($query);

        $pdo->bindParam(":nombre", $data["nombre"], PDO::PARAM_STR);
        $pdo->bindParam(":titulo", $data["titulo"], PDO::PARAM_STR);
        $pdo->bindParam(":descripcion", $data["descripcion"], PDO::PARAM_STR);
        $pdo->bindParam(":claves", $data["claves"], PDO::PARAM_STR);

        if ($pdo->execute()) {
            return "success";
        }else{
            $pdo->errorInfo();
        }
    }

}