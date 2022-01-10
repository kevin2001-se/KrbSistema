<?php
    $pagina = new WebController();
    $row = $pagina->ObtenerInfoPaginaWeb();
    print_r($row);
?>
<section class="content-header">
    <h1>
        Configuración
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Configuración</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">

    <div class="row">

    <div class="col-md-6">

        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">LOGOTIPOS</h3>
            </div>

            <form role="form">

              <div class="box-body">
                <div class="form-group">
                  <label for="nombre">Logo de Sitio Web</label>
                  <p class="float-end">
                    <img src="<?php echo URLAD?>img/Logotipo/<?php echo $row["logo_pagina"] ?>" class="img-thumbnail" width="200px">
                    <input type="hidden" id="logo_actual" value="<?php echo $row["logo_pagina"] ?>">
                  </p>
                  <input type="file" name="logo" id="logo">
                  <p class="help-block">Tamaño recomendado 250px * 100px</p>
                </div>

                <div class="form-group">
                  <label for="nombre">Icono de Sitio Web</label>
                  <p class="float-end">
                    <img src="<?php echo URLAD?>img/Logotipo/<?php echo $row["logo_pestana"] ?>" class="img-thumbnail" width="50px">
                    <input type="hidden" id="icono_actual" value="<?php echo $row["logo_pestana"] ?>">
                  </p>
                  <input type="file" name="icono" id="icono">
                  <p class="help-block">Tamaño recomendado 100px * 100px</p>
                </div>

              </div>

              <div class="box-footer">
                <button type="submit" class="btn btn-primary float-end">Guardar Cambios</button>
              </div>
            </form>
        </div>

        <div class="box box-warning">
            <div class="box-header">
              <h3 class="box-title">CONTACTO</h3>
            </div>
            <div class="box-body">
              <!-- Date dd/mm/yyyy -->
              <div class="form-group">
                <label>Date masks:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <!-- Date mm/dd/yyyy -->
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <!-- phone mask -->
              <div class="form-group">
                <label>US phone mask:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <!-- phone mask -->
              <div class="form-group">
                <label>Intl US phone mask:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="text" class="form-control"
                         data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <!-- IP mask -->
              <div class="form-group">
                <label>IP mask:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-laptop"></i>
                  </div>
                  <input type="text" class="form-control" data-inputmask="'alias': 'ip'" data-mask>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

            </div>
            <!-- /.box-body -->
        </div>

    </div>

    <div class="col-md-6">

        <div class="box box-danger loaded-form">
            <div class="box-header with-border">
              <h3 class="box-title">INFORMACIÓN PRINCIPAL</h3>
            </div>

            <div autocomplete="off">
              <div class="box-body">

                <div class="form-group">
                  <label for="nombre">Nombre de Sitio Web</label>
                  <input type="text" class="form-control" id="nombre" placeholder="Ingrese Nombre de Sitio Web" value="<?php echo $row["nombre_web"] ?>">
                </div>

                <div class="form-group">
                  <label for="nombre">Titulo de Sitio Web</label>
                  <input type="text" class="form-control" id="titulo" placeholder="Ingrese Titulo de Sitio Web" value="<?php echo $row["titulo"] ?>">
                </div>

                <div class="form-group">
                  <label>Descripción de la Web</label>
                  <textarea class="form-control" rows="3" placeholder="Descripción" id="descripcion"><?php echo $row["descripcion"] ?></textarea>
                </div>

                
                <div class="form-group d-flex d-column">
                  <label>Palabras Claves</label>
                  <?php
                  $plabras_claves = (empty($row["palabras_claves"])) ? "" : $row["palabras_claves"] ;
                  ?>
                  <input type="text" value="<?php echo $plabras_claves ?>" data-role="tagsinput" class="form-control tags_palabras">
                </div>

              </div>

              <div class="box-footer">
                <button class="btn btn-primary float-end" id="guardarGeneral">Guardar Cambios</button>
              </div>
            </div>

            <div class="loaders">
                
            </div>

        </div>

        <div class="box box-warning">
            <div class="box-header">
              <h3 class="box-title">REDES SOCIALES</h3>
            </div>
            <div class="box-body">
              <!-- Date dd/mm/yyyy -->
              <div class="form-group">
                <label>Date masks:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <!-- Date mm/dd/yyyy -->
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <!-- phone mask -->
              <div class="form-group">
                <label>US phone mask:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <!-- phone mask -->
              <div class="form-group">
                <label>Intl US phone mask:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="text" class="form-control"
                         data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <!-- IP mask -->
              <div class="form-group">
                <label>IP mask:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-laptop"></i>
                  </div>
                  <input type="text" class="form-control" data-inputmask="'alias': 'ip'" data-mask>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

            </div>
            <!-- /.box-body -->
        </div>

    </div>

</section>