<?php

class Productos {

    public $con;
    public $codigo;
    public $nombre;
    public $stock;
    public $precio;
    public $foto;
    public $creador;
    public $fecha_actualizada;
    public $actualizador;

    public function __construct()
    {
        $conexion = new Conexion();
        $this->con = $conexion ->Conectar();
    }

  public function getListarProductos()
  {
      $query = "SELECT * FROM producto p Inner join usuario u ON p.id_usuario = u.id_usuario";
      $pdo = $this->con->prepare($query);
      $pdo->execute();
      return $pdo->fetchAll();
  }

}