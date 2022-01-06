<?php

class ProductosController {

    public function ListarProductos()
    {
        $producto = new Productos();
        $lista = $producto->getListarProductos();
        return $lista;
    }

    public function CrearProducto($datos)
    {
        if (!empty($datos["nombre"]) && !empty($datos["stock"]) && !empty($datos["precio"])) {
            
            $nombre = trim($datos["nombre"]);

            if (!empty($datos["file"])) {
               
                list($ancho, $alto) = getimagesize($datos["file"]["tmp_name"]);

                $nuevoAncho = 227;
                $nuevoAlto = 227;

                $directorio = "../view/src/img/Products/";

                $nombreImagen = str_replace(" ","-",strtolower($nombre));

                if ($datos["file"]["type"] == "image/jpeg") {
                    
                    $fotoProducto = $nombreImagen . ".jpg";

                    $rutaAlmacenar = $directorio . $nombreImagen . ".jpg";

                    $origen = imagecreatefromjpeg($datos["file"]["tmp_name"]);

                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagejpeg($destino, $rutaAlmacenar);

                }else if ($datos["file"]["type"] == "image/png") {

                    $fotoProducto = $nombreImagen . ".png";
        
                    $rutaAlmacenar = $directorio .$nombreImagen . ".png";
        
                    $origen = imagecreatefrompng($datos["file"]["tmp_name"]);
        
                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
        
                    imagealphablending($destino, FALSE);
        
                    imagesavealpha($destino, TRUE);
        
                    imagecopyresampled($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
        
                    imagepng($destino, $rutaAlmacenar);
        
                }else {
                    return "error-image";
                }

            } else {
                return "image-vacia";
            }

            $producto = new Productos();

            $producto->nombre = $nombre;
            $producto->stock = $datos["stock"];
            $producto->precio = $datos["precio"];
            $producto->foto = $fotoProducto;
            $producto->creador = $datos["user"];

            $response = $producto->crearProductos();

            return $response;

        }
    }

}