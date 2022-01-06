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

    public function crearProductos()
    {
        $query = "INSERT INTO producto(nombre_producto,stock,precio_producto,foto_producto,id_usuario) VALUES(:nombre, :stock, :precio, :foto, :id_usuario)";

        $pdo = $this->con->prepare($query);

        $pdo->bindParam(":nombre", $this->nombre, PDO::PARAM_STR);
        $pdo->bindParam(":stock", $this->stock, PDO::PARAM_INT);
        $pdo->bindParam(":precio", $this->precio, PDO::PARAM_STR);
        $pdo->bindParam(":foto", $this->foto, PDO::PARAM_STR);
        $pdo->bindParam(":id_usuario", $this->creador, PDO::PARAM_INT);

        if ($pdo->execute()) {
            return "success";
        }else{
            return $pdo->errorInfo();
        }

        $pdo = null;
    }

}