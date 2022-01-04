const nombre = document.querySelector("#nombre");
const celular = document.querySelector("#celular");
const correo = document.querySelector("#correo");
const mensaje = document.querySelector("#mensaje");

const enviar = document.querySelector("#enviar");

enviar.addEventListener("submit", (e) => {
    e.preventDefault();
    
    if (nombre.value === "" && celular.value === ""  && correo.value === "" && mensaje.value === "" ) {
        return console.log("vacio");
    }
    

    let formData = new FormData();
    formData.append("nombre", nombre.value)
    formData.append("celular", celular.value)
    formData.append("correo", correo.value)
    formData.append("mensaje", mensaje.value)

    $.ajax({
        type: "POST",
        url: "api/contacto.api.php",
        data: formData,
        processData: false,  
        contentType: false ,
        beforeSend: function() {
            $("#envioContacto").html("Enviando...")
        },
        success: function (response) {

            console.log(response);
            if(response == "enviado"){
                Swal.fire({
                    icon: "success",
                    title: "OK",
                    text: "Se envio Correctamente el Mensaje"
                })
            }else{
                Swal.fire({
                    icon: "error",
                    title: "Ups",
                    text: "Error al enviar el Correo"
                })
            }
            $("#envioContacto").html("Enviar")
            enviar.reset()

        }
    });



})