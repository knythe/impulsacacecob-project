$(document).ready(function() {

    // Crear evento, aplicando ajax aqui va en el formulario, es tipo id
    $('#create_pago').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(response) {
               
                    // Redirigir a la página de los registros hechos
                    window.location.href = "/impulsa/registrar/ventas"; 
                
            },
            error: function(error) {
                console.error(error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'ERROR ESTUDIANTE YA REGISTRADO',
                });
            }
        });
    });

    // Editar estudiante tipo class
   // Editar apoderado tipo class
    
});