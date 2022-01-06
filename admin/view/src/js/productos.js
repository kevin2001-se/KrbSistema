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
                  return `<img class="img-fluid" src="${url}${data}" style="width:150px"/>`;
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


    $("#form-producto").submit(function (e) { 
      e.preventDefault();
      
      const nombre = $("#nombre").val();
      const stock = $("#stock").val();
      const precio = $("#precio").val();
      const file = $("#fileProducto")[0].files[0]
      
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
        success: function (response) {
          console.log(response);
        }
      });

    });

});