<?php

class WebController {

    public function ObtenerInfoPaginaWeb()
    {
        $web = new WebModel();

        $respuesta = $web->getWeb();

        if (!empty($respuesta)) {
            return $respuesta;
        }else{
            die();
        }
    }

    public function EditarGeneral($datos)
    {
        
        if (!empty($datos["nombre"]) && !empty($datos["titulo"]) && !empty($datos["descripcion"]) && !empty($datos["palabras"])) {
            
            $nombre = trim($datos["nombre"]);
            $titulo = trim($datos["titulo"]);
            $descripcion = trim($datos["descripcion"]);

            $general = new WebModel();

            $data = array(
                'nombre' => $nombre,
                'titulo' => $titulo,
                'descripcion' => $descripcion,
                'claves' => $datos["palabras"]
            );

            $response = $general->ActualizarGeneralWeb($data);

            if ($response == "success") {
                return $response;
            }else{
                return "error";
            }

        }else{
            return "vacios";
        }

    }


}