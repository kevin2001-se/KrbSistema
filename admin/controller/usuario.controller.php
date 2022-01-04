<?php

class UsuarioController {

    public function ctrAuthUsuario()
    {
        if (isset($_POST["usuario"]) && isset($_POST["password"])) {

            if (empty($_POST["usuario"]) && empty($_POST["password"])) {
                return "Todos los campos son obligatorios";
            }

            $auth = new Usuario();
            $auth->usuario = $_POST["usuario"];
            $repuesta = $auth->AuthUsuario();
            if (!empty($repuesta)) {
                
                if (md5($_POST["password"]) == $repuesta["password"]) {
                    
                    // if (!isset($_POST["recordar"])) {
                    //     $_SESSION["admin"] = $repuesta;
                    //     set
                    // }

                    $_SESSION["admin"] = $repuesta["id_usuario"];
                    return "success";

                }else{

                    return "Usuario y/o Contraseña Incorrectas";

                }

            }else{

                return "Usuario y/o Contraseña Incorrectas";

            }
        }else{
            return "Todos los campos son obligatorios";
        }

    }

    public function ctrCerrarSesion()
    {
        if (isset($_POST["cerrar"])) {
            session_destroy();
            return "<script>window.location.href = '".URL."admin/auth?auth=e18b70e904caea00788d2f55724e7cd1'</script>";
        }
    }

    public function validarUsuarioCookie($usuario,$password)
    {
        if (!empty($usuario) && !empty($password)) {
            
            $auth = new Usuario();
            $auth->usuario = $usuario;
            $repuesta = $auth->AuthUsuario();

            if (!empty($repuesta)) {

                if ($password == $repuesta["password"]) {

                    $_SESSION["admin"] = $repuesta["id_usuario"];
                    return "success";

                }

            }

        }

        return "error";
    }

    public function obtenerAdministrador() {

        if (isset($_SESSION["admin"])) {
            
            $idUsuario = $_SESSION["admin"];

            $user = new Usuario();
            $user->codigo = $idUsuario;
            $respuesta = $user->getObtenerUsuario();

            return $respuesta;

        }

    }

}