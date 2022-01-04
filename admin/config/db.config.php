<?php

class Conexion {

    public $servidor;
    public $db;
    public $user;
    public $pass;

    public function __construct()
    {
        $this->servidor = server;
        $this->db = DB;
        $this->user = user;
        $this->pass = pass;
    }

    public function Conectar() {

        try {
            
            $con = new PDO("mysql:host=".$this->servidor.";dbname=".$this->db , $this->user, $this->pass);

            $con->exec("set name utf8");

            return $con;

        } catch (Exception $e) {
            die($e->getMessage());
        }

    }

}