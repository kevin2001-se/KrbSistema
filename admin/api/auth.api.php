<?php
session_start();
require_once "../config/variables.config.php";
require_once "../config/db.config.php";
require_once "../controller/usuario.controller.php";
require_once "../model/usuario.model.php";

class AuthApiAjax {

    public $usuario;
    public $password;
    public $recordar;

    public function AutenticarUser() {

        $usuario = $this->usuario;
        $password = $this->password;
        $recordar = $this->recordar;

        if (!isset($recordar) || empty($recordar)) {
            $recordar = 0;
        }

        $auth = new UsuarioController();
        $respuesta = $auth->ctrAuthUsuario($usuario, $password, $recordar);

        echo $respuesta;

    }

}


if (isset($_POST["usuario"]) && isset($_POST["password"])) {
    
    $auth = new AuthApiAjax();
    $auth->usuario = $_POST["usuario"];
    $auth->password = $_POST["password"];
    $auth->recordar = $_POST["recordar"];
    $auth->AutenticarUser();

}