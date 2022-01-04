<?php
    $sistema = new SistemaController();
    $rows = $sistema->SistemaRegistrados();
?>
<span id="sistema"></span>

<section class="my-5">
    <div class="container glide position-relative">
        <div class="glide__track rounded  bg-dark" data-glide-el="track">
            <ul class="glide__slides">
                <?php
                    foreach ($rows as $key => $value) {
                ?>
                <li class="glide__slide">
                    <div class="row rounded text-white p-5">
                        <div class="col-md-6 p-2 order-2 order-md-1">
                            <h5 class="mb-3"><?php echo $value["titulo_sistema"] ?></h5>
                            <p class="text-desp">
                                <?php echo $value["descripcion_sistema"] ?>
                            </p>
                            <?php
                            if (!empty($value["precio_sistema"])) {
                            ?>
                            <span class="d-block">PEN <?php echo $value["precio_sistema"] ?></span>
                            <?php
                            }
                            ?>
                            <a href="https://wa.me/+51941165733/?text=Hola quiero información del <?php echo  $value['titulo_sistema']; ?>" class="btn btn-success mt-3"><i class="fab fa-whatsapp"></i> Mas información</a>
                        </div>
                        <div class="col-md-6 mb-2 d-flex align-items-center order-1 order-md-2">
                            <img src="<?php echo URL ?>view/src/img/sistema/<?php echo $value["foto_sistema"] ?>" alt="<?php echo $value["titulo_sistema"] ?>" class="img-fluid">
                        </div>
                    </div>
                </li>
                <?php    
                    }
                ?>
            </ul>
        </div>
        <div class="glide__arrows" data-glide-el="controls">
            <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><i class="far fa-chevron-circle-left"></i></button>
            <button class="glide__arrow glide__arrow--right" data-glide-dir=">"><i class="far fa-chevron-circle-right"></i></button>
        </div>
    </div>
</section>