<?php
require_once "config/db.config.php";

class PaginaModel {
    
    private $table = "pagina";
    public $con;

    public function __construct()
    {
        $conexion = new Conexion();
        $this->con = $conexion ->Conectar();
    }

    public function getPagina()
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

}