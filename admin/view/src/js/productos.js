$(document).ready(function () {

  const url = document.querySelector("#url").value;
  
    function tablaProducto() { 
        $('#productosTB').DataTable({
            paging: true,
            searching: true,
            ordering: true,
            info: true,
            autoWidth: false,
            responsive: true,
            "ajax":{
                "url": "api/producto.ajax.php",
                "dataSrc":""
            },
            "columns":[
                {render: function(data, type,row){
  
                  return  row[0] +'<input type="hidden" class="codigoP" name="codigoP" value="'+ row[0] +'">'
  
                }},//"data" : "foto_producto"
                {"data" : "foto_producto",render: function(data, type, row){
                  return `<img class="img-fluid" src="${url}Products/${data}" style="width:150px"/>`;
                }},
                {"data" : "nombre_producto"},
                {"data" : "stock"},
                {"data" : "precio_producto"},
                {"data" : "nombre"},
                {render: function(data, type, row){
    
                    return '<button type="button" class="btn btn-primary editarPro mr-1">Editar</button><button type="button" class="btn btn-danger text-light eliminarPro">Eliminar</button>'
                    
                }}
            ],
            "order": [[ 0, "desc" ]],
                "language": {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "Mostrando registros del _START_ al _END_",
                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                      "sFirst": "Primero",
                      "sLast": "Último",
                      "sNext": "Siguiente",
                      "sPrevious": "Anterior"
                    },
                    "oAria": {
                      "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                      "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                
                  }
    
        })
     }

    tablaProducto();
    var table = $("#productosTB").DataTable();


    $(document).on("change",".changeimg", function () {
      imagenPortada = this.files[0];
      
      var remplazar = $(this).parent().parent().parent().find(".previsualizarPortada");

      /*=============================================
        VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
        =============================================*/
    
        if(imagenPortada["type"] != "image/jpeg" && imagenPortada["type"] != "image/png"){
    
          $("#fileProducto").val("");
    
          toastr.error('¡La imagen debe estar en formato JPG o PNG!')
    
        }else if(imagenPortada["size"] > 2000000){
    
          $("#fileProducto").val("");

          toastr.error('¡La imagen no debe pesar más de 2MB!')
    
        }else{
    
          var datosImagen = new FileReader;
          datosImagen.readAsDataURL(imagenPortada);
    
          $(datosImagen).on("load", function(event){
    
            var rutaImagen = event.target.result;
    
            remplazar.attr("src", rutaImagen);
    
          })
    
        }
    
    });

    $("#form-producto").submit(function (e) { 
      e.preventDefault();
      
      const nombre = $("#nombre").val();
      const stock = $("#stock").val();
      const precio = $("#precio").val();
      const file = $("#fileProducto")[0].files[0];

      if (nombre.length == "" || stock.length == "" || precio.length == "" || file == undefined) {
         toastr.error('Todos los campos son obligatorios')
         return;
      }
      
      producto = new FormData();
      producto.append("nombre", nombre);
      producto.append("stock", stock);
      producto.append("precio", precio);
      producto.append("file", file);

      $.ajax({
        type: "POST",
        url: "api/producto.ajax.php",
        data: producto,
        contentType: false,
        processData: false,
        beforeSend: function() {
          // setting a timeout
          $(".loaders").addClass("loader-form");
          $(".loaders").html(`
          <div class="loader" id="loader-1"></div>
          `);
        },
        success: function (response) {
          $(".loaders").removeClass("loader-form");
          $(".loaders").html("");
          if (response == "error-image") {
            toastr.error('Error al querer subir la imagen')
            return;
          }else if(response == "image-vacia" || response == "campo-vacio"){
            toastr.error('Todos los campos son obligatorios')
            return;
          }else if(response == "success"){

            Swal.fire({
              icon: "success",
              title: "Ok",
              text: "Producto Registrado"
            })
            
            $("#modal-agregar form")[0].reset();
            $('#modal-agregar').modal('hide');
            table.ajax.reload();
            return;
          }else{
            toastr.error('Error al querer registrar el Producto');
            return;
          }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
          toastr.error('Error Inesperado');
        },
      });

    });

    $(document).on("click",".eliminarPro", function (e) {
      e.preventDefault();

      const id = $(this).parent().parent().find(".codigoP").val() ;

      if (id !== "") {
        
        Swal.fire({
          title: '¿Está seguro de borrar el producto?',
          text: "¡Si no lo está puede cancelar la accíón!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Si, borrar producto!'
        }).then(function(result){
      
          if(result.value){
      
            $.ajax({
              type: "POST",
              url: "api/producto.ajax.php",
              data: "idProducto="+id,
              success: function (response) {
                if (response == "success") {
                  Swal.fire({
                    icon: "success",
                    title: "Ok",
                    text: "Producto Eliminado"
                  })
                  table.ajax.reload();
                }else{
                  Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "Error al Eliminar Producto"
                  })
                }
              },
              error: function (XMLHttpRequest, textStatus, errorThrown) {
                toastr.error('Error Inesperado');
              },
            });
      
          }
      
        })
      }
    });


    $(document).on("click",".editarPro", function (e) {
      e.preventDefault();

      const id = $(this).parent().parent().find(".codigoP").val();

      if (id == "" || !isNaN(id) !== true) {
        return toastr.error('Error Inesperado');
      }

      $.ajax({
        type: "POST",
        url: "api/producto.ajax.php",
        data: "obtener="+id,
        success: function (response) {

          if (response === "error") {
            return toastr.error('Error Inesperado');
          }

          var json = JSON.parse(response);

          if (json !== "") {

            $(".obtenerImg").attr("src", `${url}Products/${json.foto_producto}`);
            $("#fotoAntigua").val(json.foto_producto);
            $("#nombreEdit").val(json.nombre_producto);
            $("#stockEdit").val(json.stock);
            $("#precioEdit").val(json.precio_producto);
            $("#id_producto").val(id)

            $('#modal-editar').modal('show');

          }else{
            return toastr.error('Error Inesperado');
          }
        }
      });

    });

    $("#form-producto-edit").submit(function (e) { 
      e.preventDefault();
      
      const fotoAntigua = $("#fotoAntigua").val();
      const nombre = $("#nombreEdit").val();
      const stock = $("#stockEdit").val();
      const precio = $("#precioEdit").val();
      const id = $("#id_producto").val()
      const file = $("#fileProductoEdit")[0].files[0];

      const form = new FormData();
      form.append("fotoAntigua",fotoAntigua);
      form.append("nombreE",nombre);
      form.append("stock",stock);
      form.append("precio",precio);
      form.append("id",id);
      form.append("fotoActual",file);


      $.ajax({
        type: "POST",
        url: "api/producto.ajax.php",
        data: form,
        contentType: false,
        processData: false,        
        beforeSend: function() {
          // setting a timeout
          $(".loaders").addClass("loader-form");
          $(".loaders").html(`
          <div class="loader" id="loader-1e"></div>
          `);
        },
        success: function (response) {
          $(".loaders").removeClass("loader-form");
          $(".loaders").html("");
          console.log(response);
          if (response == "error-image") {
            toastr.error('Error al querer subir la imagen')
            return;
          }else if(response == "campo-vacio"){
            toastr.error('Todos los campos son obligatorios')
            return;
          }else if(response == "success"){

            Swal.fire({
              icon: "success",
              title: "Ok",
              text: "Producto Actualizado"
            })
            
            $("#modal-editar form")[0].reset();
            $('#modal-editar').modal('hide');
            table.ajax.reload();
            return;
          }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
          toastr.error('Error Inesperado');
        },
      });

    });

});