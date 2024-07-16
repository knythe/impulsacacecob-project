$(document).ready(function() {

    // Crear evento, aplicando ajax aqui va en el formulario, es tipo id
    $('#create_cliente').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(response) {
               
                    // Redirigir a la página de los registros hechos
                    window.location.href = "/cacecobeirl/registrar/comprobantes"; 
                
            },
            error: function(error) {
                console.error(error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'APODERADO EXISTENTE.',
                });
            }
        });
    });

    // Editar cliente tipo class
    $(".edit_cliente").on("submit", function (e) {
        e.preventDefault();
        let form = $(this);
        $.ajax({
            type: "PUT",
            url: form.attr("action"),
            data: form.serialize(),
            success: function (response) {
                Swal.fire({
                    icon: "success",
                    title: "Cliente editado exitosamente",
                    showConfirmButton: false,
                    timer: 1000,
                });
                setTimeout(() => {
                    location.reload();
                }, 500);
            },
            error: function (error) {
                console.error(error);
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "No se pudo editar el cliente.",
                });
            },
        });
    });
   

    // Eliminar rol
    /* la siguiente script va directamente ubicada en el button (submit), es de tipo class

    */

    

 
});