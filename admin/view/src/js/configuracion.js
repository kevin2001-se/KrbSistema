$(document).ready(function () {
    
    const url = document.querySelector("#url").value;

    $("#guardarGeneral").click(function (e) { 
        e.preventDefault();

        var load = $(this).parent().parent().parent().find(".loaders");

        const nombre = $("#nombre").val();
        const titulo = $("#titulo").val();
        const descripcion = $("#descripcion").val();
        const plabras_claves = $(".tags_palabras").tagsinput('items');
        
        const form = new FormData();
        form.append("nombre",nombre);
        form.append("titulo",titulo);
        form.append("descripcion",descripcion);
        form.append("palabras",plabras_claves);

        $.ajax({
            type: "POST",
            url: "api/pagina.ajax.php",
            data: form,
            contentType: false,
            processData: false,
            beforeSend: function() {
              // setting a timeout
              load.addClass("loader-form");
              load.html(`
              <div class="loader" id="loader-1"></div>
              `);
            },
            success: function (response) {
                load.removeClass("loader-form");
                load.html("");
                
                if (response == "success") {
                    
                    Swal.fire({
                        icon: "success",
                        title: "Ok",
                        text: "Se Actualizo Correctamente"
                    })

                }else if(response == "vacios"){

                    toastr.error('Los Campos no pueden estar vacios.');

                }else{
                    toastr.error('Error Inesperado');
                }

            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
              toastr.error('Error Server');
            },
        });

    });

});