<?php

class Usuario {

    public $con;
    public $codigo;
    public $nombre;
    public $usuario;
    public $password;
    public $foto;

    public function __construct()
    {
        $conexion = new Conexion();
        $this->con = $conexion ->Conectar();
    }

    public function AuthUsuario(){
        $query = "SELECT * FROM usuario WHERE usuario = :usuario";
        $pdo = $this->con->prepare($query);
        $pdo->bindParam(":usuario",$this->usuario,PDO::PARAM_STR);
        $pdo->execute();
        return $pdo->fetch();

    }

    public function getObtenerUsuario()
    {
        $query = "SELECT * FROM usuario WHERE id_usuario = :usuario";
        $pdo = $this->con->prepare($query);
        $pdo->bindParam(":usuario",$this->codigo,PDO::PARAM_INT);
        $pdo->execute();
        return $pdo->fetch();
    }

}