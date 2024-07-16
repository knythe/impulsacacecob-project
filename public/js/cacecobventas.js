$(document).ready(function() {

    // Crear evento, aplicando ajax aqui va en el formulario, es tipo id
    $('#create_ventacacecob').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(response) {
               
                    // Redirigir a la página de los registros hechos
                    window.location.href = "/cacecobeirl/registrar/clientes"; 
                
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

    // Editar apoderado tipo class
   

    // Eliminar rol
    /* la siguiente script va directamente ubicada en el button (submit), es de tipo class

    */

    

 
});