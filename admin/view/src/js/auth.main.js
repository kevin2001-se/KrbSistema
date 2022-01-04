// $(document).ready(function () {
    
//     $("#formAuth").submit(function (e) { 
//         e.preventDefault();
        
//         const usuario = document.querySelector("#usuario").value;
//         const password = document.querySelector("#password").value;
//         const recordar = document.querySelector(".icheckbox_square-blue");
//         let recordarAuth = 0;

//         console.log(usuario,password,recordar.classList.contains("checked"));
//         if (recordar.classList.contains("checked")) {
//             recordarAuth = 1;
//         }

//         const auth = new FormData();
//         auth.append("usuario", usuario);
//         auth.append("password", password);
//         auth.append("recordar", recordarAuth);

//         $.ajax({
//             type: "POST",
//             url: "../admin/api/auth.api.php",
//             data: auth,
//             contentType : false,
//             processData : false,
//             success: function (response) {
//                 if (response === "success") {
//                     console.log(response);
//                 }else if (response === "incorrecta") {
//                     console.log(response);
//                 }else if (response === "vacio") {
//                     console.log(response);
//                 }else {
//                     localStorage.setItem("authArray",response);
//                 }
//             }
//         });

//     });

// });