<section class="content-header">
    <h1>
        Productos
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Productos</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-xs-12">
            <div class="d-flex justify-content-end">
                <aside>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-agregar">Agregar Producto</button>
                </aside>
            </div>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-xs-12">
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="productosTB" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Foto Producto</th>
                        <th>Nombre Producto</th>
                        <th>Stock Producto</th>
                        <th>Precio Producto</th>
                        <th>Creado de Producto</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
    </div>

</section>

<div class="modal fade" id="modal-agregar">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Agregar Producto</h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" class="row" id="form-producto">

                    <div class="form-group col-xs-12">
                        <label>Nombre del Producto</label>
                        <input type="text" class="form-control" placeholder="Ingresa Nombre del Producto">
                    </div>

                    <div class="form-group col-xs-12 col-md-6">
                        <label>Stock del Producto</label>
                        <input type="number" class="form-control" placeholder="Ingresa Stock del Producto">
                    </div>

                    <div class="form-group col-xs-12 col-md-6">
                        <label>Precio del Producto</label>
                        <input type="number" step="any" class="form-control" placeholder="Ingresa Precio del Producto">
                    </div>

                    <div class="col-xs-12">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="contenedor_imagen_producto">
                                    <img src="<?php echo URLAD; ?>img/ilustracion-no.jpg" alt="foto de producto" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fileProducto">Foto Producto</label>
                                    <input type="file" id="fileProducto">
                                    <p class="help-block">La Foto de producto no debe pesar mas de 2MB</p>
                                </div>
                            </div>
                        </div>

                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                <button type="button" class="btn btn-primary">Guardar Producto</button>
            </div>
        </div>
            <!-- /.modal-content -->
    </div>
          <!-- /.modal-dialog -->
</div>