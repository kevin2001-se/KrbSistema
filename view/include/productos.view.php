<?php
    $productos = new ProductoController();
    $rows = $productos->ProductosRegistrados();
?>
<section class="mt-5" id="productos">
    <div class="container">
        <div class="row">
            <?php
                foreach ($rows as $key => $value) { 
                    if ($value["stock"] == 0) {
            ?>
            <div class="col-6 col-md-4 col-lg-3 text-center">
                <div class="card mb-3">
                    <div class="card-body card-relative card-agotado">
                        <img src="<?php echo URL ?>view/src/img/Products/<?php echo $value["foto_producto"] ?>" alt="<?php echo $value["nombre_producto"] ?>" class="img-fluid">
                    </div>
                </div>
            </div>
            <?php  
                    } else{
            ?>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card mb-2">
                    <div class="card-body card-relative text-center">
                        <img src="<?php echo URL ?>view/src/img/Products/<?php echo $value["foto_producto"] ?>" alt="<?php echo $value["nombre_producto"] ?>" class="img-fluid">

                        <div class="card-text">
                            <h6 class="text-center"><?php echo $value["nombre_producto"] ?></h6>
                            <span class="precio_producto">PEN <?php echo $value["precio_producto"] ?></span>
                            <a href="https://wa.me/+51941165733/?text=Hola quiero información del producto <?php echo  $value['nombre_producto']; ?>" class="btn btn-success mt-3"><i class="fab fa-whatsapp"></i> <span class="d-md-inline-block icon-wsp-pro"> Por WhatsApp</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
                    }   
                }
            ?>
        </div>
    </div>

</section>