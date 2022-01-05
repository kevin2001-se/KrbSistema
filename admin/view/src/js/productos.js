$(document).ready(function () {
    
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
  
                  return row[1]+'<input type="hidden" class="codigoP" name="codigoP" value="'+ row[0] +'">'
  
                }},
                {"data" : "foto_producto"},
                {"data" : "nombre_producto"},
                {"data" : "stock"},
                {"data" : "precio_producto"},
                {"data" : "id_usuario"},
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

});